<?php
session_start(); // Start session

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbase = "travel";

// Create connection
$conn = mysqli_connect($servername, $db_username, $db_password, $dbase);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // ✅ Admin Login (HARD-CODED)
    if ($username === "Lavanya" && $password === "Lavanya!1") {
        session_unset(); // Clear session only for admin login
        $_SESSION["admin"] = $username; // Store admin session
        echo "<script>
                alert('Admin Login Successful! Redirecting to Admin Dashboard...');
                window.location.href = 'admin-dashboard.php';
              </script>";
        exit();
    } else {
        // ✅ User Login (CHECK FROM DATABASE)
        $sql = "SELECT * FROM register WHERE username=? AND password=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
            session_unset(); // Clear session only for user login
            $_SESSION["username"] = $username; // Store user session

            // Fetch user details (Assuming 'name' is in the register table)
            $user = mysqli_fetch_assoc($result);
            $_SESSION["name"] = $user["name"];

            echo "<script>
                    alert('User Login Successful! Redirecting to Home Page...');
                    window.location.href = 'home1.php';
                  </script>";
            exit();
        } else {
            echo "<script>
                    alert('Invalid Username or Password. Please try again.');
                    window.location.href = 'login.html';
                  </script>";
            exit();
        }
    }
}

mysqli_close($conn);
?>
