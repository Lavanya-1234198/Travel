<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbase = "travel";

// Check if admin is logged in
if (!isset($_SESSION["admin"])) {
    header("Location: admin_login.php");
    exit();
}

// Create connection
$conn = mysqli_connect($servername, $db_username, $db_password, $dbase);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Delete booking when delete button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);

    $sql = "DELETE FROM booking WHERE name = '$name'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Booking deleted successfully!'); window.location.href='admin-dashboard.php';</script>";
    } else {
        echo "<script>alert('Error deleting booking: " . mysqli_error($conn) . "'); window.location.href='admin-dashboard.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='admin-dashboard.php';</script>";
}

mysqli_close($conn);
?>
