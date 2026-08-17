<?php 
session_start();


// Check if the user is logged in
if (isset($_SESSION['user_id']) && isset($_SESSION['unique_id'])) {
    // Database connection parameters
    include('config.php');

    // Try to create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection is successful
    if ($conn->connect_error) {
        echo json_encode(['status' => 'error', 'message' => 'Database connection failed. Please try again later.']);
        exit();
    }

    // Get the unique ID from the session
    $unique_id = $_SESSION['unique_id'];

    // Update the user_login_info table to mark the user as logged out
    $sql = "UPDATE user_login_info SET logged_in = 0 WHERE unique_id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $unique_id);
        $stmt->execute();
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update logout status in the database.']);
        exit();
    }

    

    // Logout the user (Unset all session variables and destroy the session)
    session_unset();  // Unset all session variables
    session_destroy();  // Destroy the session

    // Send a JSON response indicating success
    echo json_encode([
        'status' => 'success',
        'message' => 'Logged out successfully'
    ]);
} else {
    // If the user is not logged in or session is invalid, send an error response
    echo json_encode([
        'status' => 'error',
        'message' => 'No user is logged in or invalid session.'
    ]);
}

// Close the database connection
$conn->close();
?>
