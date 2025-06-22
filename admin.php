<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded credentials
    if ($username === "Lavanya" && $password === "Lavanya!1") {
        $_SESSION['admin'] = $username; // Store session for authentication
        header("Location: admin-dashboard.php"); // Redirect to admin page
        exit();
    } else {
        echo "Invalid username or password.";
    }
} else {
    echo "Unauthorized access!";
}
?>
