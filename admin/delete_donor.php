<?php
session_start();

if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}

include('../database/config.php');
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['donor_id'])) {
    $donor_id = $_GET['donor_id'];
    $delete_query = "DELETE FROM donors WHERE donor_id = '$donor_id'";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error deleting donor: " . mysqli_error($conn);
    }
} else {
    header("Location: dashboard.php");
    exit();
}
?>
