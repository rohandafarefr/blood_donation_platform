<?php
include('../database/config.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone_number = mysqli_real_escape_string($conn, $_POST["phone_number"]);
    $date_of_birth = mysqli_real_escape_string($conn, $_POST["date_of_birth"]);
    $blood_type = mysqli_real_escape_string($conn, $_POST["blood_type"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $city = mysqli_real_escape_string($conn, $_POST["city"]);
    $pin_code = mysqli_real_escape_string($conn, $_POST["pin_code"]);
    $body_weight = mysqli_real_escape_string($conn, $_POST["body_weight"]);
    $height_cm = mysqli_real_escape_string($conn, $_POST["height_cm"]);

    $sql = "INSERT INTO donors (first_name, last_name, email, phone_number, date_of_birth, blood_type, address, city, pin_code, body_weight, height_cm)
            VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$date_of_birth', '$blood_type', '$address', '$city', '$pin_code', '$body_weight', '$height_cm')";
    

    if (mysqli_query($conn, $sql)) {
        $donor_id = mysqli_insert_id($conn); 
        header("Location: certify.php?donor_id=$donor_id");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
