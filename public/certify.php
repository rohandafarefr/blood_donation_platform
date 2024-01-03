<?php
include('../database/config.php');

if (isset($_GET['donor_id'])) {
    $donor_id = $_GET['donor_id'];

    $sql = "SELECT first_name, last_name FROM donors WHERE donor_id = $donor_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
    } else {
        die("Donor not found");
    }
} else {
    die("Donor ID not provided");
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>
    <style type='text/css'>
        body, html {
            margin: 0;
            padding: 0;
        }
        body {
            color: black;
            display: flex;
            flex-direction: column;
            justify-content: center;
            font-family: Georgia, serif;
            font-size: 24px;
            text-align: center;
            align-items: center;
        }
        #container {
            border: 20px solid #111;
            width: 750px;
            height: 563px;
            margin-top: 20px;
            display: table-cell;
            vertical-align: middle;
            background: #ddd;
        }
        .logo img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            margin-top: 70px;
        }
        .marquee {
            color: #111;
            font-size: 48px;
            margin: 20px;
        }
        .assignment {
            margin: 20px;
        }
        .person {
            border-bottom: 2px solid black;
            font-size: 32px;
            font-style: italic;
            margin: 20px auto;
            width: 400px;
            color: #3498db;
        }
        .reason {
            margin: 20px;
        }
        button {
            width: 200px;
            margin-top: 15px;
            padding: 10px;
            background: #fff;
            color: #000;
            border: 1px solid #000;
            border-radius: 7px;
        }
    </style>
</head>
<body>
    <div id="container">
        <div class="logo">
            <img src="../images/logo.png">
        </div>
        <div class="marquee">
            Certificate of Appreciation
        </div>
        <div class="assignment">
            This certificate is presented to
        </div>
        <div class="person">
            <?php echo $first_name . ' ' . $last_name; ?>
        </div>
        <div class="reason">
            has successfully registered as a Blood Donor<br/>
            on the Blood Donation Platform
        </div>
    </div>
    <button onclick="generateCertificate()">Generate Certificate</button>
    <script>
        function generateCertificate() {
            var element = document.getElementById('container');
            var styles = `
                @page {
                    size: A4 landscape;
                    margin: 0;
                    padding: 0;
                }
                body {
                    width: 100%;
                    margin: 0;
                    padding: 0;
                }
                #container {
                    width: 297mm;
                    height: 210mm;
                    background: #dddddd;
                    box-sizing: border-box;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border: 20px solid #111;
                    padding: 20px;
                }
                .logo img {
                    width: 60px;
                    height: 60px;
                    border-radius: 50%;
                }
                .marquee,
                .assignment,
                .person,
                .reason {
                    text-align: center;
                    margin: 20px;
                }
            `;
            html2pdf(element, {
                margin: 20,
                filename: 'certificate.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' },
                width: 297,
                height: 210,
                background: styles
            });
        }
    </script>
</body>
</html>
