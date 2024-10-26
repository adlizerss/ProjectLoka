<?php
include 'db.php';

$id = $_GET['id'];
$query = "DELETE FROM users WHERE id = $id";

if (mysqli_query($conn, $query)) {
    header("Location: admin_dashboard.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>
