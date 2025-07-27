<?php
include 'database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container login-container">
        <h1>User Registration</h1>
        <form method="POST" action="register.php">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required placeholder="Enter your name">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required placeholder="Enter your email">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required placeholder="Create a password">
            <button type="submit" class="btn-primary">Register</button>
        </form>
        <div class="form-footer">
            <a href="index.php">Already have an account? Login</a>
        </div>
        <a href="dashboard.php" class="btn-primary" style="margin-top: 20px; text-align: center;">Back to Dashboard</a>
    </div>
</body>
</html>