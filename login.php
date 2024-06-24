<?php
session_start();
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (verifyUser($username, $password)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        header('Location: index (2).html');
        exit();
    } else {
        $_SESSION['error'] = "Username atau password salah. Silakan coba lagi.";
        header('Location: login.html?error=Username atau password salah. Silakan coba lagi.');
        exit();
    }
}
?>
