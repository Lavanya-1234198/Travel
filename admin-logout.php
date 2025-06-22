<?php
session_start();
unset($_SESSION["admin"]);  // Remove only admin session
session_destroy();  // Destroy session
header("Location: login.html"); // Redirect to login page
exit();
?>
