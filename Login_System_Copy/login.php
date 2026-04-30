<?php
session_start();
include 'config.php';
include 'google_oauth.php';

$message = "";

if (isset($_GET['google_login'])) {
    header('Location: ' . getGoogleAuthUrl());
    exit;
}

if (isset($_GET['msg'])) {
    $msgs = [
        'google_cancelled'    => 'Google sign-in was cancelled.',
        'google_failed'       => 'Google sign-in failed. Please try again.',
        'google_token_error'  => 'Could not get token from Google. Please try again.',
        'google_profile_error'=> 'Could not fetch your Google profile.',
        'google_db_error'     => 'Database error during Google sign-in.',
    ];
    $message = $msgs[$_GET['msg']] ?? '';
}

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: index.php");
    exit;
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $message = "Invalid CSRF token!";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (!empty($username) && !empty($password)) {
            $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username = ? OR email = ?");
            $stmt->bind_param("ss", $username, $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"]       = $row['id'];
                    $_SESSION["username"] = $row['username'];
                    $_SESSION["role"]     = $row['role'];
                    unset($_SESSION['csrf_token']);
                    header("Location: " . ($row['role'] === 'admin' ? 'dashboard.php' : 'index.php'));
                    exit;
                } else {
                    $message = "Invalid username or password!";
                }
            } else {
                $message = "Invalid username or password!";
            }
            $stmt->close();
        } else {
            $message = "Please fill all fields!";
        }
    }
}
if (isset($conn)) $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in — ITI Kubernagar</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ── CLASSIC SLATE THEME (Theme 4) — High Contrast ── */
        :root {
            --bg-color:              #080c14;   /* Very deep navy-black page bg */
            --card-bg:               #1e2438;   /* Noticeably lighter slate card */
            --border-color:          rgba(99, 102, 241, 0.25);
            --input-bg:              #111827;   /* Distinct input depth */
            --input-focus:           rgba(99, 102, 241, 0.35);
            --button-gradient-start: #6366f1;
            --button-gradient-end:   #4f46e5;
            --text-primary:          #f1f5f9;
            --text-secondary:        #94a3b8;
            --divider-color:         rgba(255, 255, 255, 0.08);
            --hover-color:           rgba(99, 102, 241, 0.15);
            --accent:                #818cf8;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg-color);
            padding: 24px;
            color: var(--text-primary);
        }

        /* Subtle ambient glow */
        body::before {
            content: '';
            position: fixed;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(99,102,241,0.08) 0%, transparent 70%);
            top: -180px; right: -180px;
            pointer-events: none;
        }

        .card {
            display: flex;
            width: 1100px;
            max-width: 100%;
            min-height: 640px;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            overflow: hidden;
            box-shadow:
                0 32px 64px rgba(0, 0, 0, 0.7),
                0 0 0 1px rgba(99, 102, 241, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.06);
            animation: cardEnter 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes cardEnter {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── LEFT PANEL ── */
        .left-panel {
            flex: 1.1;
            position: relative;
            background: url('https://images.unsplash.com/photo-1542401886-65d6c61db217?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=100') center/cover no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 48px;
            color: #fff;
        }

        .left-panel::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(160deg, rgba(26,29,35,0.15) 0%, rgba(26,29,35,0.85) 100%);
            z-index: 1;
        }

        .left-panel > * { position: relative; z-index: 2; }

        .top-bar { display: flex; justify-content: space-between; align-items: center; }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        .logo-icon {
            width: 38px; height: 38px;
            background: linear-gradient(135deg, var(--button-gradient-start), var(--button-gradient-end));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .back-link {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.15);
            padding: 9px 18px;
            border-radius: 30px;
            color: #fff;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            backdrop-filter: blur(8px);
            transition: all 0.25s;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .back-link:hover { background: rgba(255,255,255,0.18); }

        .bottom-text { }
        .bottom-text h2 {
            font-size: 34px;
            font-weight: 600;
            line-height: 1.25;
            letter-spacing: -0.03em;
            margin-bottom: 24px;
        }

        .dots { display: flex; gap: 8px; margin-bottom: 8px; }
        .dot {
            height: 4px;
            border-radius: 10px;
            background: rgba(255,255,255,0.25);
            transition: all 0.4s;
            width: 28px;
        }
        .dot.active { width: 44px; background: #fff; box-shadow: 0 0 12px rgba(255,255,255,0.4); }

        /* ── RIGHT PANEL ── */
        .right-panel {
            flex: 0.9;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 64px 72px;
        }

        h1 {
            font-size: 30px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 10px;
            letter-spacing: -0.02em;
        }

        .subtitle {
            font-size: 14px;
            color: var(--text-secondary);
            margin-bottom: 36px;
        }
        .subtitle a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            transition: opacity 0.2s;
        }
        .subtitle a:hover { opacity: 0.8; text-decoration: underline; }

        /* Error message */
        .alert {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 10px;
            color: #f87171;
            font-size: 14px;
            margin-bottom: 24px;
        }

        /* Input */
        .field { position: relative; margin-bottom: 16px; }

        .field input {
            width: 100%;
            padding: 15px 18px;
            background: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 14px;
            font-family: inherit;
            color: var(--text-primary);
            outline: none;
            transition: border-color 0.25s, box-shadow 0.25s, transform 0.2s;
        }
        .field input::placeholder { color: var(--text-secondary); font-size: 14px; }
        .field input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px var(--input-focus);
            transform: translateY(-1px);
        }

        .toggle-pw {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            padding: 4px;
            transition: color 0.2s;
        }
        .toggle-pw:hover { color: var(--text-primary); }

        /* Row */
        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0 28px;
            font-size: 13px;
        }

        .check-label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-secondary);
            cursor: pointer;
        }

        .check-label input[type="checkbox"] {
            appearance: none;
            width: 17px; height: 17px;
            border: 1.5px solid var(--border-color);
            border-radius: 5px;
            background: var(--input-bg);
            cursor: pointer;
            position: relative;
            transition: all 0.2s;
        }
        .check-label input[type="checkbox"]:checked {
            background: var(--accent);
            border-color: var(--accent);
        }
        .check-label input[type="checkbox"]:checked::after {
            content: '✓';
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
        }

        .forgot-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 13px;
            transition: color 0.2s;
        }
        .forgot-link:hover { color: var(--text-primary); }

        /* Button */
        .btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--button-gradient-start), var(--button-gradient-end));
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 8px 20px -6px rgba(99,102,241,0.35);
            letter-spacing: 0.1px;
        }
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 32px -8px rgba(99,102,241,0.5);
        }
        .btn:active { transform: translateY(0); box-shadow: none; }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 14px;
            margin: 28px 0;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--divider-color);
        }
        .divider span {
            font-size: 12px;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 1px;
            white-space: nowrap;
        }

        /* Social */
        .social { display: flex; gap: 14px; }
        .social-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 13px;
            background: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            color: var(--text-primary);
            font-size: 14px;
            font-weight: 500;
            font-family: inherit;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.25s;
        }
        .social-btn:hover {
            background: var(--hover-color);
            border-color: var(--accent);
            transform: translateY(-2px);
        }

        @media (max-width: 960px) {
            .right-panel { padding: 48px 40px; }
        }
        @media (max-width: 720px) {
            .card { flex-direction: column; }
            .left-panel { min-height: 260px; padding: 32px; }
            .right-panel { padding: 40px 28px; }
        }
    </style>
</head>
<body>
<div class="card">

    <!-- LEFT PANEL -->
    <div class="left-panel">
        <div class="top-bar">
            <div class="logo">
                <div class="logo-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/>
                    </svg>
                </div>
                ITI Kubernagar
            </div>
            <a href="index.php" class="back-link">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Back to website
            </a>
        </div>
        <div class="bottom-text">
            <h2>Capturing Moments,<br>Creating Memories</h2>
            <div class="dots">
                <div class="dot active"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>
    </div>

    <!-- RIGHT PANEL -->
    <div class="right-panel">
        <h1>Welcome back</h1>
        <p class="subtitle">New here? <a href="register.php">Create an account</a></p>

        <?php if (!empty($message)): ?>
        <div class="alert">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <?php echo htmlspecialchars($message); ?>
        </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="field">
                <input type="text" name="username" placeholder="Username or Email" required autocomplete="username">
            </div>

            <div class="field">
                <input type="password" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                <button type="button" class="toggle-pw" onclick="togglePw()">
                    <svg id="eye-icon" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                    </svg>
                </button>
            </div>

            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

            <div class="row">
                <label class="check-label">
                    <input type="checkbox" id="remember">
                    Stay logged in
                </label>
                <a href="#" class="forgot-link">Forgot password?</a>
            </div>

            <button type="submit" class="btn">Sign in to account</button>
        </form>

        <div class="divider"><span>or continue with</span></div>

        <div class="social">
            <a href="?google_login=1" class="social-btn">
                <svg width="19" height="19" viewBox="0 0 24 24">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                Google
            </a>
            <a href="#" class="social-btn">
                <svg width="19" height="19" viewBox="0 0 24 24" fill="#e2e8f0">
                    <path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.19 2.31-.88 3.5-.88 1.5 0 2.86.58 3.73 1.6-3.13 1.92-2.58 5.92.54 7.21-.76 1.83-1.8 3.38-2.85 4.24zM12.03 7.25c-.15-2.23 1.66-4.07 3.72-4.25.33 2.37-1.8 4.25-3.72 4.25z"/>
                </svg>
                Apple
            </a>
        </div>
    </div>

</div>
<script>
    function togglePw() {
        const p = document.getElementById('password');
        p.type = p.type === 'password' ? 'text' : 'password';
    }
</script>
</body>
</html>