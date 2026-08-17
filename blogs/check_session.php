<?php  
session_start();

// Check if user_id exists in the session
$response = ['status' => 'error', 'message' => 'No valid session found'];

if (isset($_SESSION['user_id']) && isset($_SESSION['role']) && isset($_SESSION['unique_id'])) {
    // Session exists, send the session details
    $response = [
        'status' => 'success',
        'user_id' => $_SESSION['user_id'],
        'role' => $_SESSION['role'], // Role helps differentiate between user and employee
        'unique_id' => $_SESSION['unique_id'], // Include unique ID in the response
        'session_id' => session_id() // Include current session ID
    ];
}

echo json_encode($response);
?>
