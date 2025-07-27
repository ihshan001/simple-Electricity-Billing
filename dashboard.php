<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container" style="margin-top:40px; max-width:400px;">
        <h1>Welcome, <?php echo $_COOKIE['user']; ?>!</h1>
        <div class="card">
            <a href="calculate.php"><img src="https://img.icons8.com/fluency/48/calculator.png" alt="Calculate" style="vertical-align:middle; margin-right:10px;"> Calculate Electricity Bill</a>
        </div>
        <div class="card">
            <a href="history.php"><img src="https://img.icons8.com/fluency/48/time-machine.png" alt="History" style="vertical-align:middle; margin-right:10px;"> View Bill History</a>
        </div>
        <div class="card">
            <a href="register.php"><img src="https://img.icons8.com/fluency/48/add-user-group-man-man.png" alt="Register" style="vertical-align:middle; margin-right:10px;"> Register</a>
        </div>
        <div class="card">
            <a href="logout.php"><img src="https://img.icons8.com/fluency/48/logout-rounded-left.png" alt="Logout" style="vertical-align:middle; margin-right:10px;"> Logout</a>
        </div>
    </div>
    <footer>
        <p>Electricity Billing System &copy; 2025 | Group Project</p>
    </footer>
</body>
</html>