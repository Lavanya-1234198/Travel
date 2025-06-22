<?php
session_start(); // Start the session

unset($_SESSION["username"]);  // Remove only user session
unset($_SESSION["name"]);
session_destroy();

// Redirect to login page with a logout message
echo "<script>
        alert('Logout Successful!');
        window.location.href = 'login.html';
      </script>";
exit();
?>
