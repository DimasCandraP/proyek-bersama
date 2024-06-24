<?php
session_start();
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {
        if (!getUserByUsername($username)) {
            addUser($fullname, $username, $email, $password);
            $_SESSION['message'] = "Registrasi berhasil. Silakan login.";
            header('Location: login.html');
            exit();
        } else {
            header('Location: daftar.html?error=Username sudah digunakan.');
            exit();
        }
    } else {
        header('Location: daftar.html?error=Password tidak cocok.');
        exit();
    }
}
?>
