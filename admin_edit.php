<?php
include 'db.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Style CSS tetap sama -->
</head>
<body>
    <div class="edit-container">
        <h2>Edit User</h2>
        <form action="admin_update.php" method="POST">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="text" name="username" value="<?= $row['username'] ?>" required>
            <input type="password" name="password" value="<?= $row['password'] ?>" required>
            <input type="email" name="email" value="<?= $row['email'] ?>" required>
            <button type="submit" class="btn-submit">Update</button>
        </form>
    </div>
</body>
</html>
