<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        [
            'fullname' => 'Dimas Candra',
            'username' => 'dimas',
            'email' => 'dimas123@gmail.com',
            'password' => password_hash('dimas123', PASSWORD_DEFAULT)
        ],
        [
            'fullname' => 'Chandra Aurian Khoirul Akbar',
            'username' => 'chaka',
            'email' => 'chaka123@gmail.com',
            'password' => password_hash('chaka123', PASSWORD_DEFAULT)
        ],
        [
            'fullname' => 'Arabin',
            'username' => 'arabin',
            'email' => 'arabin123@gmail.com',
            'password' => password_hash('arabin123', PASSWORD_DEFAULT)
        ],
        [
            'fullname' => 'User',
            'username' => 'user',
            'email' => 'user123@gmail.com',
            'password' => password_hash('user', PASSWORD_DEFAULT)
        ],
    ];
}

// Fungsi untuk mencari pengguna berdasarkan username
function getUserByUsername($username) {
    foreach ($_SESSION['users'] as $user) {
        if ($user['username'] === $username) {
            return $user;
        }
    }
    return null;
}

// Fungsi untuk menambahkan pengguna baru
function addUser($fullname, $username, $email, $password) {
    // Hash password sebelum disimpan
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // Tambahkan pengguna baru ke dalam session
    $_SESSION['users'][] = [
        'fullname' => $fullname,
        'username' => $username,
        'email' => $email,
        'password' => $hashedPassword
    ];
}

// Fungsi untuk memeriksa kecocokan username dan password
function verifyUser($username, $password) {
    $user = getUserByUsername($username);
    if ($user && password_verify($password, $user['password'])) {
        return true;
    }
    return false;
}
?>
