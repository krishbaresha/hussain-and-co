<?php
session_start();

// Database connection parameters
include('config.php');

// Set the timezone to GMT+5 (Asia/Karachi)
date_default_timezone_set('Asia/Karachi');

// Try to create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    // Handle connection error and return a user-friendly message
    $response = array('status' => 'error', 'message' => 'Database connection failed. Please check your connection or try again later.');
    echo json_encode($response);
    exit(); // Stop further execution
}

// Initialize response array
$response = array('status' => 'error', 'message' => 'Invalid username or password.');

 // Generate a unique ID
 $unique_id = uniqid('', true); // Example: "5f2c27b1e4c5a0.83910717"

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values from the form
    $user_username = $_POST['username'];
    $user_password = $_POST['password'];
    $ip_address = $_POST['ip_address'];  // Get IP address from the POST data

    // Check the "users" table
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        $response = array('status' => 'error', 'message' => 'Database query failed. Please try again later.');
        echo json_encode($response);
        exit();
    }
    $stmt->bind_param("s", $user_username);
    $stmt->execute();
    $result = $stmt->get_result();

    // If user found in the "users" table, verify the password
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($user_password, $user['password'])) {
            // Successful login, store user data in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = 'user'; // Set the role as 'user'
            $_SESSION['unique_id'] = $unique_id; 
            // Generate session ID for login
            $session_id = session_id(); // Store session_id() in a variable

          // Insert login information into the user_login_info table
          $login_sql = "INSERT INTO user_login_info (user_id, employee_id, role, ip, last_activitydate, username, logged_in, session_id, unique_id) 
          VALUES (?, NULL, ?, ?, NOW(), ?, 1, ?, ?)";
$login_stmt = $conn->prepare($login_sql);
$login_stmt->bind_param("isssss", $user['id'], $_SESSION['role'], $ip_address, $user['username'], $session_id, $unique_id);
$login_stmt->execute();

            // Return successful JSON response
            $response = array('status' => 'success', 'message' => 'Login successful');
            echo json_encode($response);
            exit(); // Make sure no further code is executed after the response
        } else {
            $response = array('status' => 'error', 'message' => 'Incorrect password. Please try again.');
            echo json_encode($response);
            exit();
        }
    } else {
        // Check the "employees" table if not found in "users"
        $sql = "SELECT * FROM employees WHERE username = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            $response = array('status' => 'error', 'message' => 'Database query failed. Please try again later.');
            echo json_encode($response);
            exit();
        }
        $stmt->bind_param("s", $user_username);
        $stmt->execute();
        $result = $stmt->get_result();

        // If employee found, verify the password
        if ($result->num_rows > 0) {
            $employee = $result->fetch_assoc();
            if (password_verify($user_password, $employee['password'])) {
                // Successful login, store employee data in session
                $_SESSION['user_id'] = $employee['id']; // Store employee id in session
                $_SESSION['username'] = $employee['username'];
                $_SESSION['role'] = 'employee'; // Set the role as 'employee'
                $_SESSION['unique_id'] = $unique_id;
                // For employees
$session_id = session_id(); // Store session_id() in a variable
                
                // Insert login information into the user_login_info table
                $login_sql = "INSERT INTO user_login_info (user_id, employee_id, role, ip, last_activitydate, username, logged_in, session_id, unique_id) 
                              VALUES (NULL, ?, ?, ?, NOW(), ?, 1, ?, ?)";
                $login_stmt = $conn->prepare($login_sql);
                $login_stmt->bind_param("isssss", $employee['id'], $_SESSION['role'], $ip_address, $employee['username'], $session_id, $unique_id);
                $login_stmt->execute();

                // Return successful JSON response
                $response = array('status' => 'success', 'message' => 'Login successful');
                echo json_encode($response);
                exit(); // Make sure no further code is executed after the response
            } else {
                $response = array('status' => 'error', 'message' => 'Incorrect password. Please try again.');
                echo json_encode($response);
                exit();
            }
        } else {
            // If username is not found in either "users" or "employees"
            $response = array('status' => 'error', 'message' => 'Username not found. Please check and try again.');
            echo json_encode($response);
            exit();
        }
    }
}

// If there was an error with the request method
$response = array('status' => 'error', 'message' => 'Invalid request method.');
echo json_encode($response);

// Close the connection
$stmt->close();
$conn->close();
?>
