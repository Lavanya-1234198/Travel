<?php
session_start();  // Start session at the top

// Database connection
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbase = "travel";

$conn = mysqli_connect($servername, $db_username, $db_password, $dbase);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Check if all form fields are set
if (isset($_POST["name"], $_POST["username"], $_POST["password"], $_POST["gender"], $_POST["country"])) {
    
    // Retrieve and sanitize user input
    $name = trim($_POST["name"]);
    $username = trim($_POST["username"]);  // No encryption applied
    $password = trim($_POST["password"]);  // Directly storing password (⚠️ Not recommended)
    $gender = trim($_POST["gender"]);
    $country = trim($_POST["country"]);

    // Check if name and username are correctly received
    if (empty($name) || empty($username) || empty($password)) {
        echo "<script>
                alert('Error: Name, Username, or Password is missing.');
                window.location.href = 'register.html';
              </script>";
        exit();
    }

    // Prepare SQL statement to insert data safely
    $sql = "INSERT INTO register (name, username, password, gender, country) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $name, $username, $password, $gender, $country);
        
        if (mysqli_stmt_execute($stmt)) {
            // Set session variables after successful registration
            $_SESSION["username"] = $username;
            $_SESSION["name"] = $name;
            
            echo "<script>
                    alert('Registration Successful! Redirecting to Login Page...');
                    window.location.href = 'login.html';
                  </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error in preparing SQL statement.";
    }
} else {
    echo "<script>
            alert('Error: Required fields are missing.');
            window.location.href = 'register.html';
          </script>";
}

mysqli_close($conn);
?>
