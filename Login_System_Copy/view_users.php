<?php
session_start();
include 'config.php';

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$sql = "SELECT id, username, email, created_at FROM users ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: linear-gradient(135deg, #a29bfe 0%, #6c5ce7 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }
        .container {
            max-width: 1200px;
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
            margin-bottom: 30px;
        }
        .back-btn {
            background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%);
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 8px;
            display: inline-block;
            font-weight: bold;
            transition: transform 0.2s;
        }
        .back-btn:hover {
            transform: translateY(-2px);
        }
        h2 {
            color: #333;
            margin: 0;
            font-size: 28px;
        }
        .user-count {
            background: #00b894;
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        th {
            background: linear-gradient(135deg, #a29bfe 0%, #6c5ce7 100%);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: bold;
        }
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        tr:hover {
            background-color: #f8f9fa;
        }
        tr:last-child td {
            border-bottom: none;
        }
        .no-users {
            text-align: center;
            padding: 50px;
            color: #666;
            font-size: 18px;
        }
        .user-id {
            font-weight: bold;
            color: #6c5ce7;
        }
        .user-email {
            color: #0984e3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>👥 All Registered Users</h2>
            <a href="dashboard.php" class="back-btn">← Back to Dashboard</a>
        </div>
        
        <?php if ($result->num_rows > 0): ?>
            <div class="user-count">
                <h3>Total Users: <?php echo $result->num_rows; ?></h3>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>🆔 ID</th>
                        <th>👤 Username</th>
                        <th>📧 Email</th>
                        <th>📅 Registration Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td class="user-id"><?php echo $row["id"]; ?></td>
                            <td><?php echo htmlspecialchars($row["username"]); ?></td>
                            <td class="user-email"><?php echo htmlspecialchars($row["email"]); ?></td>
                            <td><?php echo date('d-m-Y H:i', strtotime($row["created_at"])); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-users">
                <h3>😔 No users found</h3>
                <p>There are no registered users in the system yet.</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

<?php $conn->close(); ?>
