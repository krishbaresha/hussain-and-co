<?php
session_start();

// Database connection parameters
include('config.php');

// Get the current session ID and unique ID from the session
$current_session_id = session_id();
$unique_id = $_SESSION['unique_id'] ?? null;

if ($current_session_id && $unique_id) {
    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check for connection errors
    if ($conn->connect_error) {
        die(json_encode(['status' => 'error', 'message' => 'Database connection failed']));
    }

    // Query for session validation
    $sql = "SELECT logged_in, session_id, role, unique_id FROM user_login_info WHERE session_id = ? AND unique_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $current_session_id, $unique_id);

    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($logged_in, $stored_session_id, $role, $stored_unique_id);
    $stmt->fetch();

    if ($stmt->num_rows > 0) {
        // Check session validity
        if ($logged_in == 0 || $current_session_id !== $stored_session_id || $unique_id !== $stored_unique_id) {
            session_destroy();
            echo json_encode(['status' => 'error', 'message' => 'Session expired, please log in again.']);
        } else {
            echo json_encode(['status' => 'success', 'message' => 'Session is valid', 'role' => $role]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid session data']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'No valid session ID or unique ID found']);
}
?>
