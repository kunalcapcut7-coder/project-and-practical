<?php
session_start();
include 'config.php';
include 'google_oauth.php';

// ── Error / cancel from Google ──────────────────────────────
if (isset($_GET['error'])) {
    header('Location: login.php?msg=google_cancelled');
    exit;
}

// ── No authorization code ───────────────────────────────────
if (!isset($_GET['code'])) {
    header('Location: login.php?msg=google_failed');
    exit;
}

// ── Exchange code for access token ──────────────────────────
$tokenData = getGoogleAccessToken($_GET['code']);

if (!$tokenData || empty($tokenData['access_token'])) {
    header('Location: login.php?msg=google_token_error');
    exit;
}

// ── Get Google user profile ─────────────────────────────────
$googleUser = getGoogleUserInfo($tokenData['access_token']);

if (!$googleUser || empty($googleUser['email'])) {
    header('Location: login.php?msg=google_profile_error');
    exit;
}

$googleId = $googleUser['sub'];           // Google unique user ID
$email    = $googleUser['email'];
$name     = $googleUser['name'] ?? $email;
// Build a clean username from name (spaces → underscores, lowercase)
$username = strtolower(preg_replace('/\s+/', '_', $name));

// ── Check if user already exists by google_id OR email ──────
$stmt = $conn->prepare("SELECT id, username, role FROM users WHERE google_id = ? OR email = ? LIMIT 1");
$stmt->bind_param("ss", $googleId, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // ── Existing user: update google_id if missing, then log in ──
    $row = $result->fetch_assoc();

    // Ensure google_id is stored (for users who first registered normally)
    $update = $conn->prepare("UPDATE users SET google_id = ? WHERE id = ?");
    $update->bind_param("si", $googleId, $row['id']);
    $update->execute();
    $update->close();

    $_SESSION['loggedin']  = true;
    $_SESSION['id']        = $row['id'];
    $_SESSION['username']  = $row['username'];
    $_SESSION['role']      = $row['role'];

} else {
    // ── New user: auto-register with Google info ──────────────
    // Make username unique if it already exists
    $baseUsername = $username;
    $counter = 1;
    while (true) {
        $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $check->bind_param("s", $username);
        $check->execute();
        $check->store_result();
        if ($check->num_rows === 0) { $check->close(); break; }
        $check->close();
        $username = $baseUsername . $counter++;
    }

    $stmt2 = $conn->prepare("INSERT INTO users (username, email, password, google_id, role) VALUES (?, ?, NULL, ?, 'user')");
    $stmt2->bind_param("sss", $username, $email, $googleId);

    if ($stmt2->execute()) {
        $newId = $conn->insert_id;
        $_SESSION['loggedin']  = true;
        $_SESSION['id']        = $newId;
        $_SESSION['username']  = $username;
        $_SESSION['role']      = 'user';
        $stmt2->close();
    } else {
        $stmt2->close();
        $conn->close();
        header('Location: login.php?msg=google_db_error');
        exit;
    }
}

$stmt->close();
$conn->close();

// ── Redirect based on role ───────────────────────────────────
if ($_SESSION['role'] === 'admin') {
    header('Location: dashboard.php');
} else {
    header('Location: index.php');
}
exit;
