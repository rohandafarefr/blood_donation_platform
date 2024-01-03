<?php
session_start();

if (!isset($_SESSION['admin_username'])) {
    header("Location: ../public/login.php");
    exit();
}

include('../database/config.php');

$sql = "SELECT * FROM donors";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $donors = mysqli_fetch_all($result, MYSQLI_ASSOC);
}


if (isset($_GET['search'])) {
    $searchQuery = mysqli_real_escape_string($conn, $_GET['search']);
    $sqlSearch = "SELECT * FROM donors 
                  WHERE first_name LIKE '%$searchQuery%' OR last_name LIKE '%$searchQuery%'
                  OR email LIKE '%$searchQuery%' OR phone_number LIKE '%$searchQuery%' 
                  OR city LIKE '%$searchQuery%' OR pin_code LIKE '%$searchQuery%'
                  OR blood_type LIKE '%$searchQuery%'";
    $resultSearch = mysqli_query($conn, $sqlSearch);

    if (mysqli_num_rows($resultSearch) > 0) {
        $donors = mysqli_fetch_all($resultSearch, MYSQLI_ASSOC);
    } else {
        $donors = []; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin Dashboard</title>
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
        .search-form {
            margin-bottom: 20px;
        }

        .search-form input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .search-form button {
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<header>
    <h1>Blood Donation ~ Admin Panel</h1>
    <nav>
        <a href="view_contacts.php">Contact Request</a>
        <a href="backend/logout.php">Logout</a>
    </nav>
</header>

<div class="admin-dashboard">
    <form class="search-form" method="GET">
        <input type="text" name="search" placeholder="Search donors">
        <button type="submit">Search</button>
    </form>

    <div class="donor-management">
        <h1>Donor Management</h1>

        <?php if (isset($donors) && count($donors) > 0): ?>
            <table class="donor-table">
                <thead>
                    <tr>
                        <th>Donor ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Date of Birth</th>
                        <th>Blood Type</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>PIN Code</th>
                        <th>Body Weight (kg)</th>
                        <th>Height (cm)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($donors as $donor): ?>
                        <tr>
                            <td><?php echo $donor['donor_id']; ?></td>
                            <td><?php echo $donor['first_name'] . ' ' . $donor['last_name']; ?></td>
                            <td><?php echo $donor['email']; ?></td>
                            <td><?php echo $donor['phone_number']; ?></td>
                            <td><?php echo $donor['date_of_birth']; ?></td>
                            <td><?php echo $donor['blood_type']; ?></td>
                            <td><?php echo $donor['address']; ?></td>
                            <td><?php echo $donor['city']; ?></td>
                            <td><?php echo $donor['pin_code']; ?></td>
                            <td><?php echo $donor['body_weight']; ?></td>
                            <td><?php echo $donor['height_cm']; ?></td>
                            <td>
                                <a href="edit_donor.php?donor_id=<?php echo $donor['donor_id']; ?>" class="edit">Edit</a>
                                <a href="delete_donor.php?donor_id=<?php echo $donor['donor_id']; ?>" class="delete">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No donors found in the database.</p>
        <?php endif; ?>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
</body>
</html>
