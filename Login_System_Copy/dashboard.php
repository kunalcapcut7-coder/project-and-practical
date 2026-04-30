<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: linear-gradient(135deg, #00b894 0%, #00cec9 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
        }
        h2 {
            color: #333;
            margin: 0;
            font-size: 32px;
        }
        .logout-btn {
            background: linear-gradient(135deg, #e17055 0%, #d63031 100%);
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: transform 0.2s;
        }
        .logout-btn:hover {
            transform: translateY(-2px);
        }
        .welcome-card {
            background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            text-align: center;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            border-left: 5px solid #00b894;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        .stat-card h3 {
            margin: 0 0 10px 0;
            color: #333;
        }
        .stat-card p {
            margin: 0;
            color: #666;
            font-size: 18px;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        .menu-item {
            background: white;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            color: #333;
            transition: transform 0.2s, box-shadow 0.2s;
            border: 2px solid #eee;
        }
        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border-color: #00b894;
        }
        .menu-icon {
            font-size: 40px;
            margin-bottom: 15px;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>🎯 Dashboard</h2>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
        
        <div class="welcome-card">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>! 🎉</h1>
            <p>Successfully logged in to your account dashboard</p>
        </div>
        
        <div class="stats-grid">
            <div class="stat-card">
                <h3>User ID</h3>
                <p><?php echo $_SESSION["id"]; ?></p>
            </div>
            <div class="stat-card">
                <h3>Username</h3>
                <p><?php echo htmlspecialchars($_SESSION["username"]); ?></p>
            </div>
            <div class="stat-card">
                <h3>Login Status</h3>
                <p>✅ Active</p>
            </div>
        </div>
        
        <h3>🛠️ Available Options:</h3>
        <div class="menu-grid">
            <a href="view_users.php" class="menu-item">
                <span class="menu-icon">👥</span>
                <strong>View All Users</strong>
                <p>See all registered users</p>
            </a>
            <a href="profile.php" class="menu-item">
                <span class="menu-icon">👤</span>
                <strong>Edit Profile</strong>
                <p>Update your information</p>
            </a>
            <a href="change_password.php" class="menu-item">
                <span class="menu-icon">🔐</span>
                <strong>Change Password</strong>
                <p>Update your password</p>
            </a>
        </div>
    </div>
</body>
</html>
