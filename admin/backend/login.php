<?php
include('../../database/config.php'); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['admin_username'] = $username;
        header("Location: ../dashboard.php"); 
        exit();
    } else {
        header("Location: ../../public/login.php?error=1");
        exit();
    }
}
mysqli_close($conn);
?>
