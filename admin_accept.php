<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel";

if (!isset($_SESSION["admin"])) {
    header("Location: login.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"])) {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    mysqli_query($conn, "UPDATE booking SET accepted = 1 WHERE name = '$name'");

    $result = mysqli_query($conn, "SELECT * FROM booking WHERE name = '$name' LIMIT 1");
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $to = $row['email'];
        $customerName = $row['name'];
        $from = $row['location'];
        $toPlace = $row['destination'];
        $arrival = $row['arrivals'];
        $leaving = $row['leaving'];

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'durisetilavanyasri@gmail.com';
            $mail->Password   = 'pbrs yejl gsad cjzp';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('durisetilavanyasri@gmail.com', 'TripNChill');
            $mail->addAddress($to);

            $mail->isHTML(true);
            $mail->Subject = 'Your Trip is Confirmed! - TripNChill';
            $mail->Body = "
                <p>Dear <strong>$customerName</strong>,</p>
                <p>We are pleased to inform you that your travel booking with <strong>TripNChill</strong> has been successfully confirmed.</p>
                <p><strong>Booking Summary:</strong></p>
                <ul>
                    <li><strong>Departure Location:</strong> $from</li>
                    <li><strong>Destination:</strong> $toPlace</li>
                    <li><strong>Arrival Date:</strong> $arrival</li>
                    <li><strong>Departure Date:</strong> $leaving</li>
                    <li><strong>Number of Guests:</strong> {$row['guests']}</li>
                    <li><strong>Trip Duration:</strong> {$row['days']} days</li>
                </ul>
                <p>We sincerely thank you for choosing <strong>TripNChill</strong>. Our team is committed to ensuring you have a safe, comfortable, and memorable journey.</p>
                <p>If you have any questions or require further assistance, feel free to contact us at <a href='mailto:support@tripnchill.com'>support@tripnchill.com</a>.</p>
                <br>
                <p>Best Regards,<br><strong>The TripNChill Team</strong></p>
            ";

            $mail->send();
        } catch (Exception $e) {
            echo "<script>alert('❌ Email could not be sent. Error: {$mail->ErrorInfo}');</script>";
        }
    }

    mysqli_close($conn);
    echo "<script>
        alert('Booking confirmed and email sent successfully!');
        window.location.href = 'admin_dashboard.php';
    </script>";
    exit();
}
?>
