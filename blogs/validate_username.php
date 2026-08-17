<?php

session_start();

// Check if the session role is set and is either 'employee' or 'user'
if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'employee' && $_SESSION['role'] !== 'user')) {
    // Redirect to login.html if the role is not 'employee' or 'user'
    header('Location: login.html');
    exit();
}

include('config.php');

// Create connection with error handling
try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection is successful
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Handle POST request to validate username
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
        $username = $_POST['username'];

        // Check if the username already exists in the "users" table
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo 'exists';  // Username already exists
        } else {
            // Check if the username already exists in the "employees" table
            $sql = "SELECT * FROM employees WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo 'exists';  // Username already exists
            } else {
                echo 'unique';  // Username is unique
            }
        }

        // Close the statement
        $stmt->close();
    }
} catch (Exception $e) {
    // Log the error for debugging
    error_log($e->getMessage());

    // Return a generic error message to the user
    echo json_encode(array('status' => 'error', 'message' => 'Sorry for the inconvenience. Something went wrong, please try again later.'));
    exit();
}

// Close the connection
$conn->close();
?>
