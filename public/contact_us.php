<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Contact Us</title>
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <div class="content">
        <h1>Contact Us</h1>
        <form action="process_contact.php" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="subject">Subject:</label>
            <input type="text" name="subject" required>

            <label for="message">Message:</label>
            <textarea name="message" rows="4" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>

    <?php include('../includes/footer.php'); ?>
</body>
</html>
