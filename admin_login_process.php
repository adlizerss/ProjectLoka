<?php
session_start();
include 'db.php'; // Pastikan Anda mengimpor koneksi database

// Ambil dan sanitasi data dari form login
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Cek apakah username dan password cocok dengan kredensial admin
if ($username === 'admin' && $password === 'admin') {
    // Jika cocok, set session untuk admin
    $_SESSION['admin_logged_in'] = true;

    // Redirect ke halaman dashboard admin
    header('Location: admin_dashboard.php');
    exit();
} else {
    // Jika login gagal, redirect kembali ke halaman login dengan pesan error
    header('Location: admin_login.html?error=1');
    exit();
}
?>
