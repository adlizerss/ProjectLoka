<?php
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Jika belum login, redirect ke halaman login
    header('Location: admin_login.html');
    exit();
}

// Koneksi ke database dan tampilkan halaman dashboard (seperti sebelumnya)
include 'db.php';

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk menampilkan data dari tabel 'users'
$result = mysqli_query($conn, "SELECT * FROM users");

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5; /* Latar belakang abu-abu muda */
            margin: 0;
            padding: 0;
        }
        .navbar {
            display: flex;
            justify-content: flex-end;
            padding: 10px 20px;
            background-color: #fff; /* Background putih */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Bayangan halus */
        }
        .navbar a {
            text-decoration: none;
            color: #333; /* Teks hitam */
            font-weight: 500;
            padding: 10px 15px;
            border-radius: 5px;
            margin-left: 10px;
            transition: background-color 0.3s;
        }
        .navbar a:hover {
            background-color: #f0f0f0; /* Abu-abu terang saat hover */
        }
        .admin-container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff; /* Background putih */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Efek bayangan */
        }
        h2, h3 {
            text-align: center;
            color: #333; /* Teks hitam */
            margin-bottom: 20px;
        }
        .form-container {
            margin-bottom: 20px;
            text-align: center;
        }
        input[type="text"], input[type="password"], input[type="email"] {
            width: 60%;
            max-width: 400px;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            font-size: 16px;
            background-color: #f0f0f0; /* Warna abu-abu terang */
        }
        .btn-submit {
            width: 200px;
            padding: 12px;
            background-color: #28a745; /* Hijau */
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            display: block;
            margin: 20px auto;
        }
        .btn-submit:hover {
            background-color: #218838; /* Hijau gelap saat hover */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            color: #333;
        }
        th {
            background-color: #f1f1f1; /* Header tabel abu-abu muda */
            font-weight: 500;
        }
        .btn-edit, .btn-delete {
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            margin: 0 2px;
        }
        .btn-edit {
            background-color: #28a745; /* Hijau */
        }
        .btn-edit:hover {
            background-color: #218838; /* Hijau gelap saat hover */
        }
        .btn-delete {
            background-color: #dc3545; /* Merah */
        }
        .btn-delete:hover {
            background-color: #c82333; /* Merah gelap saat hover */
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <a href="admin_logout.php">Logout</a>
    </div>

    <div class="admin-container">
        <h2>Admin Dashboard</h2>

        <!-- Form Tambah User -->
        <div class="form-container">
            <h3>Tambah User Baru</h3>
            <form action="admin_add.php" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="email" name="email" placeholder="Email" required>
                <button type="submit" class="btn-submit">Tambah User</button>
            </form>
        </div>

        <!-- Tabel Users -->
        <div class="table-container">
            <h3>Daftar Users</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td>
                                <a href="admin_edit.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
                                <a href="admin_delete.php?id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
