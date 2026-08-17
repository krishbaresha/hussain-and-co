<?php


session_start();
// Check if the session role is set and is either 'employee' or 'user'
if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'employee' && $_SESSION['role'] !== 'user')) {
    // Redirect to login.html if the role is not 'employee' or 'user'
    header('Location: login.html');
    exit();
}

// Database connection parameters
include('config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    header('Content-Type: application/json');
    echo json_encode(array('status' => 'error', 'message' => 'Database connection failed.'));
    exit();
}

// Determine HTTP method
$method = $_SERVER['REQUEST_METHOD'];

// Handle requests based on the method
if ($method === 'GET') {
    // Fetch all comments
    $sql = "SELECT * FROM comments ORDER BY date DESC";
    $result = $conn->query($sql);

    $comments = [];
    while ($comment = $result->fetch_assoc()) {
        $comments[] = $comment;
    }

    header('Content-Type: application/json');
    echo json_encode(array('status' => 'success', 'comments' => $comments));
} elseif ($method === 'DELETE') {
    // Delete comment
    $data = json_decode(file_get_contents("php://input"), true);
    $commentId = $data['id'] ?? null;

    if ($commentId) {
        $sql = "DELETE FROM comments WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $commentId);

        if ($stmt->execute()) {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 'success', 'message' => 'Comment deleted.'));
        } else {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 'error', 'message' => 'Failed to delete comment.'));
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'error', 'message' => 'Invalid comment ID.'));
    }
} elseif ($method === 'PUT') {
    // Edit comment
    $data = json_decode(file_get_contents("php://input"), true);
    $commentId = $data['id'] ?? null;
    $newText = $data['message'] ?? null;

    if ($commentId && $newText) {
        $sql = "UPDATE comments SET message = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $newText, $commentId);

        if ($stmt->execute()) {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 'success', 'message' => 'Comment updated.'));
        } else {
            header('Content-Type: application/json');
            echo json_encode(array('status' => 'error', 'message' => 'Failed to update comment.'));
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(array('status' => 'error', 'message' => 'Invalid comment data.'));
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method.'));
}

$conn->close();
?>
