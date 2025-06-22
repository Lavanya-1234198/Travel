<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredOtp = $_POST['otp'];
    $actualOtp = $_SESSION['otp'];

    if ($enteredOtp == $actualOtp) {
        $_SESSION['email'] = $_SESSION['email'];
        header("Location: booking-details.php");
        exit();
    } else {
        echo "<script>alert('Invalid OTP. Try again.'); window.location.href='verify-otp.php';</script>";
    }
}
?>
