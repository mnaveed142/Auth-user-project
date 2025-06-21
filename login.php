<?php
include "db.php";
session_start();
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: home.php");
        } else {
            $msg = "Incorrect password.";
        }
    } else {
        $msg = "Username not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title><link rel="stylesheet" href="style.css"></head>
<body>
<h2>Login</h2>
<form method="POST">
    <input type="text" name="username" required placeholder="Username"><br>
    <input type="password" name="password" required placeholder="Password"><br>
    <button type="submit">Login</button>
    <p style="color:red;"><?php echo $msg; ?></p>
</form>
<a href="signup.php">Create an account</a>
</body></html>