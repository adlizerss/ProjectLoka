<?php
session_start(); // Mulai sesi
include 'db.php'; // Hubungkan ke file koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input
    if (!empty($username) && !empty($password)) {
        // Cek apakah username terdaftar di database
        $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $hashedPassword);
        $stmt->fetch();

        if ($stmt->num_rows > 0) {
            // Verifikasi password
            if (password_verify($password, $hashedPassword)) {
                // Jika password benar, mulai sesi untuk pengguna
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                echo "Login berhasil! Selamat datang, " . $username;
                // Redirect pengguna ke halaman setelah login, misalnya dashboard atau home
                header("Location: welcome.php");
                exit;
            } else {
                echo "Password salah!";
            }
        } else {
            echo "Username tidak terdaftar!";
        }
        $stmt->close();
    } else {
        echo "Silakan isi semua field!";
    }

    $conn->close(); // Tutup koneksi ke database
}