<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $query = "UPDATE users SET username = '$username', email = '$email' WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: admin_dashboard.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
