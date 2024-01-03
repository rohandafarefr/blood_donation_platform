<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Blood Donation Platform - Donor Registration</title>
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <div class="content">
        <h1>Donor Registration</h1>
        <form action="process_registration.php" method="post">
            <input type="text" name="first_name" placeholder="First Name" required>

            <input type="text" name="last_name" placeholder="Last Name" required>

            <input type="email" name="email" placeholder="Email" required>

            <input type="tel" name="phone_number" placeholder="Phone Number" required>

            <input type="date" name="date_of_birth" placeholder="Date of Birth" required>

            <input type="number" name="body_weight" step="0.1" placeholder="Body Weight (kg)" required>

            <input type="number" name="height_cm" placeholder="Height (cm)" required>

            <select name="blood_type" required>
                <option value="A+">A RhD positive (A+)</option>
                <option value="A-">A RhD negative (A-)</option>
                <option value="B+">B RhD positive (B+)</option>
                <option value="B-">B RhD negative (B-)</option>
                <option value="O+">O RhD positive (O+)</option>
                <option value="O-">O RhD negative (O-)</option>
                <option value="AB+">AB RhD positive (AB+)</option>
                <option value="AB-">AB RhD negative (AB-)</option>
            </select>

            <input type="text" name="address" placeholder="Address" required>

            <input type="text" name="city" placeholder="City" required>

            <input type="text" name="pin_code" placeholder="PIN Code" required>

            <label>
                <input type="checkbox" name="accept_terms" required>
                I accept the terms and conditions
            </label>

            <label>
                <input type="checkbox" name="accept_privacy_policy" required>
                I accept the privacy policy
            </label>

            <label>
                <input type="checkbox" name="confirm_eligibility" required>
                I confirm that I am eligible to donate blood and do not have any diseases
            </label>

            <button type="submit">Register</button>
        </form>
    </div>

    <?php include('../includes/footer.php'); ?>
</body>
</html>
