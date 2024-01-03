 <!-- admin/login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin Login</title>
    <style>
        body {
            background-color: #ecf0f1;
        }

        .admin-login {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .admin-login h1 {
            text-align: center;
            color: #3498db; 
        }

        .admin-login form {
            display: flex;
            flex-direction: column;
        }

        .admin-login label {
            margin: 10px 0;
            color: #555; 
        }

        .admin-login input {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .admin-login button {
            padding: 10px;
            background-color: #3498db;
            color: #fff; 
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .admin-login button:hover {
            background-color: #218c53; 
        }

        @media (max-width: 600px) {
            .admin-login {
                padding: 15px;
            }
        }

    </style>
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <div class="admin-login">
        <h1>Admin Login</h1>
        <form action="../admin/backend/login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
