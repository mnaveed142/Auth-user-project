<?php
include "db.php";
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirm'];

    if ($password != $confirm) {
        $msg = "Passwords do not match.";
    } else {
        $check = $conn->query("SELECT * FROM users WHERE username='$username'");
        if ($check->num_rows > 0) {
            $msg = "Username already exists.";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $conn->query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed')");
            header("Location: login.php");
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Sign Up</title><link rel="stylesheet" href="style.css"></head>
<body>
<h2>Signup</h2>
<form method="POST">
    <input type="text" name="username" required placeholder="Username"><br>
    <input type="email" name="email" required placeholder="Email"><br>
    <input type="password" name="password" required placeholder="Password"><br>
    <input type="password" name="confirm" required placeholder="Confirm Password"><br>
    <button type="submit">Register</button>
    <p style="color:red;"><?php echo $msg; ?></p>
</form>
<a href="login.php">Already have an account?</a>
</body></html>