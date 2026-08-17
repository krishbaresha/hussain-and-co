<?php
session_start();

// Database connection parameters
include('config.php');

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch active users if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Fetch active users from the user_login_info table
    $sql = "SELECT * FROM user_login_info WHERE logged_in = 1";
    $result = $conn->query($sql);

    // Fetch the active users
    $activeUsers = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $activeUsers[] = [
                'unique_id' => $row['unique_id'], // Include unique_id here
                'role' => $row['role'],
                'username' => $row['username'],
                'ip' => $row['ip'],
                'last_activitydate' => $row['last_activitydate']
            ];
        }
    }

    // Return the data as JSON
    echo json_encode($activeUsers);
}
// Handle logout if the request method is POST
elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['unique_id'])) {
    $unique_id = $_POST['unique_id']; // Using unique_id for logout

    // Log out the user by updating the logged_in status
    $sql = "UPDATE user_login_info SET logged_in = 0 WHERE unique_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $unique_id); // Use string for unique_id
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['status' => 'success', 'message' => 'User logged out successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to log out']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}

$conn->close();
?>
