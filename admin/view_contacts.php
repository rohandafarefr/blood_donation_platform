<?php
require_once('../database/config.php');
session_start();

if (!isset($_SESSION['admin_username'])) {
    header("Location: ../public/login.php");
    exit();
}


$query = "SELECT * FROM contact ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css"> 
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
        .admin-content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff; 
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .admin-content h1 {
            color: #3498db; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: #fff; 
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2; 
        }

        @media (max-width: 600px) {
            .admin-content {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Blood Donation ~ Admin Panel</h1>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="backend/logout.php">Logout</a>
    </nav>
</header>

<div class="admin-content">
    <h1>Contact Us Submissions</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . (isset($row['Name']) ? $row['Name'] : 'N/A') . "</td>";
                echo "<td>" . (isset($row['Email']) ? $row['Email'] : 'N/A') . "</td>";
                echo "<td>" . (isset($row['Subject']) ? $row['Subject'] : 'N/A') . "</td>";
                echo "<td>" . (isset($row['Message']) ? $row['Message'] : 'N/A') . "</td>";
                echo "<td>" . (isset($row['created_at']) ? $row['created_at'] : 'N/A') . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    
</div>

<?php
include('../includes/footer.php');
?>
</body>
</html>
