 
<?php

// Database configuration
define('DB_HOST', 'localhost'); // Replace with your database host (e.g., 'localhost')
define('DB_USER', 'root'); // Replace with your database username
define('DB_PASSWORD', ''); // Replace with your database password
define('DB_NAME', 'blood_donation_platform'); // Replace with your database name

// Create a connection to the database
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
