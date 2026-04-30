<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
                                                                                                                                                    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_login"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contact_messages (name, email, phone, course, message) VALUES ('$name', '$email', '$phone', '$course', '$message')";
    if ($conn->query($sql) === TRUE) {
        

        echo '<div style="
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Full viewport height */
">
    <h2 style="
        font-size: 2.5rem;
        color: #22cc55;
        font-family: Arial, sans-serif;
        text-align: center;
        margin: 0;
        padding: 20px;
        background: #d2d8e1ea;
        border-radius: 12px;
        box-shadow: 0 0 12px #aaaaaa33;
    ">
       📧 Message sent successfully!<br><br>
        Thank you for submitting your details! <br>Our team will review your inquiry and get back to you within 24-48 hours.
    </h2>

</div>';



    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
