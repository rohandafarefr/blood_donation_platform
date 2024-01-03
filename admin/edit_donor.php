<?php
session_start();

if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}

include('../database/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $donor_id = $_POST['donor_id'];

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $date_of_birth = $_POST['date_of_birth'];
    $blood_type = $_POST['blood_type'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pin_code = $_POST['pin_code'];
    $body_weight = $_POST['body_weight'];
    $height_cm = $_POST['height_cm'];

    $update_query = "UPDATE donors SET 
        first_name = '$first_name',
        last_name = '$last_name',
        email = '$email',
        phone_number = '$phone_number',
        date_of_birth = '$date_of_birth',
        blood_type = '$blood_type',
        address = '$address',
        city = '$city',
        pin_code = '$pin_code',
        body_weight = '$body_weight',
        height_cm = '$height_cm'
        WHERE donor_id = '$donor_id'";

    $result = mysqli_query($conn, $update_query);

    if ($result) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error updating donor: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['donor_id'])) {
    $donor_id = $_GET['donor_id'];

    $select_query = "SELECT * FROM donors WHERE donor_id = '$donor_id'";
    $result = mysqli_query($conn, $select_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $donor = mysqli_fetch_assoc($result);
    } else {
        echo "Error retrieving donor details: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Edit Donor Information</title>
</head>
<body>
    <style>
                header {
            background-color: #3498db;
            padding: 10px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            background-color: #2980b9;
            border-radius: 5px;
            margin: 0 10px;
        }

        header h1{
            color: #fff;
            margin-bottom: 10px;
        }
    </style>
    <header>
        <h1>Blood Donation ~ Admin Panel</h1>
        <nav>
            <a href="view_contacts.php">Contact Request</a>
            <a href="backend/logout.php">Logout</a>
        </nav>
    </header>

    <div class="content">
        <h1>Edit Donor Information</h1>
        <form action="edit_donor.php" method="post">
            <input type="hidden" name="donor_id" value="<?php echo $donor['donor_id']; ?>">

            <input type="text" name="first_name" placeholder="First Name" value="<?php echo $donor['first_name']; ?>" required>

            <input type="text" name="last_name" placeholder="Last Name" value="<?php echo $donor['last_name']; ?>" required>

            <input type="email" name="email" placeholder="Email" value="<?php echo $donor['email']; ?>" required>

            <input type="tel" name="phone_number" placeholder="Phone Number" value="<?php echo $donor['phone_number']; ?>" required>

            <input type="date" name="date_of_birth" placeholder="Date of Birth" value="<?php echo $donor['date_of_birth']; ?>" required>

            <select name="blood_type" required>
                <option value="A+" <?php echo ($donor['blood_type'] == 'A+') ? 'selected' : ''; ?>>A RhD positive (A+)</option>
                <option value="A-" <?php echo ($donor['blood_type'] == 'A-') ? 'selected' : ''; ?>>A RhD negative (A-)</option>
                <option value="B+" <?php echo ($donor['blood_type'] == 'B+') ? 'selected' : ''; ?>>B RhD positive (B+)</option>
                <option value="B-" <?php echo ($donor['blood_type'] == 'B-') ? 'selected' : ''; ?>>B RhD negative (B-)</option>
                <option value="O+" <?php echo ($donor['blood_type'] == 'O+') ? 'selected' : ''; ?>>O RhD positive (O+)</option>
                <option value="O-" <?php echo ($donor['blood_type'] == 'O-') ? 'selected' : ''; ?>>O RhD negative (O-)</option>
                <option value="AB+" <?php echo ($donor['blood_type'] == 'AB+') ? 'selected' : ''; ?>>AB RhD positive (AB+)</option>
                <option value="AB-" <?php echo ($donor['blood_type'] == 'AB-') ? 'selected' : ''; ?>>AB RhD negative (AB-)</option>
            </select>

            <input type="text" name="address" placeholder="Address" value="<?php echo $donor['address']; ?>" required>

            <input type="text" name="city" placeholder="City" value="<?php echo $donor['city']; ?>" required>

            <input type="text" name="pin_code" placeholder="PIN Code" value="<?php echo $donor['pin_code']; ?>" required>

            <input type="number" name="body_weight" step="0.1" placeholder="Body Weight (kg)" value="<?php echo $donor['body_weight']; ?>" required>

            <input type="number" name="height_cm" placeholder="Height (cm)" value="<?php echo $donor['height_cm']; ?>" required>

            <button type="submit" name="submit">Save Changes</button>
        </form>
    </div>

    <?php include('../includes/footer.php'); ?>
</body>
</html>
