<?php
include 'database.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            setcookie("user", $user['name'], time() + (86400 * 30), "/");
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container login-container">
        <h1>User Login</h1>
        <form method="POST" action="index.php">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required placeholder="Enter your email">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required placeholder="Enter your password">
            <button type="submit" class="btn-primary">Login</button>
        </form>
        
    </div>
</body>
</html>