<?php
// Database creation query
$create_db_query = "CREATE DATABASE IF NOT EXISTS woodpulp";

// Table creation query
$create_table_query = "CREATE TABLE IF NOT EXISTS woodpulp.users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255),
    phone VARCHAR(20),
    message TEXT
)";

// Assuming you have a MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "woodpulp";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
if ($conn->query($create_db_query) === false) {
    echo "Error creating database: " . $conn->error;
}

// Close connection after creating the database
$conn->close();

// Reconnect to the database after creating it
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection again
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
if ($conn->query($create_table_query) === false) {
    echo "Error creating table: " . $conn->error;
}

// Get form data

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Prepare and bind the insert query
$stmt = $conn->prepare("INSERT INTO users (name, email, subject, phone, message) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $subject, $phone, $message);

// Execute the query
if ($stmt->execute() === false) {
    echo "Error: " . $conn->error;
}



// Close statement and connection
$stmt->close();
$conn->close();
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap');

    html,
    body {
        font-family: 'Raleway', sans-serif;
    }

    .thankyou-page ._header {
        background: #fee028;
        padding: 100px 30px;
        text-align: center;
        background: #fee028 url(https://codexcourier.com/images/main_page.jpg) center/cover no-repeat;
    }

    .thankyou-page ._header .logo {
        max-width: 200px;
        margin: 0 auto 50px;
    }

    .thankyou-page ._header .logo img {
        width: 100%;
    }

    .thankyou-page ._header h1 {
        font-size: 65px;
        font-weight: 800;
        color: white;
        margin: 0;
    }

    .thankyou-page ._body {
        margin: -70px 0 30px;
    }

    .thankyou-page ._body ._box {
        margin: auto;
        max-width: 80%;
        padding: 50px;
        background: white;
        border-radius: 3px;
        box-shadow: 0 0 35px rgba(10, 10, 10, 0.12);
        -moz-box-shadow: 0 0 35px rgba(10, 10, 10, 0.12);
        -webkit-box-shadow: 0 0 35px rgba(10, 10, 10, 0.12);
    }

    .thankyou-page ._body ._box h2 {
        font-size: 32px;
        font-weight: 600;
        color: #4ab74a;
    }

    .thankyou-page ._footer {
        text-align: center;
        padding: 50px 30px;
    }

    .thankyou-page ._footer .btn {
        background: #4ab74a;
        color: white;
        border: 0;
        font-size: 14px;
        font-weight: 600;
        border-radius: 0;
        letter-spacing: 0.8px;
        padding: 20px 33px;
        text-transform: uppercase;
    }
</style>
<div class="thankyou-page">
    <div class="_header">
        <h1>Thank You!</h1>
    </div>
    <div class="_body">
        <div class="_box">
            <h2>
                <strong>Please check your email</strong> for further instructions on how to complete your account setup.
            </h2>
            <p>
                Thanks a bunch for filling that out. It means a lot to us, just like you do! We really appreciate you giving us a moment of your time today. Thanks for being you.
            </p>
        </div>
    </div>
    <div class="_footer">
        <p>Having trouble? <a href="">Contact us</a> </p>
        <a class="btn" href="../html/company-profile.html">Back to homepage</a>
    </div>
</div>