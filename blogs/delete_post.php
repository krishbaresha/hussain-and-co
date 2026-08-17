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
    die(json_encode(['status' => 'error', 'message' => 'Database connection failed']));
}


// Check if the ID is provided
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Decode the JSON input
    $input = json_decode(file_get_contents("php://input"), true);
    $postId = isset($input['id']) ? (int)$input['id'] : 0;

    if ($postId > 0) {
        // Fetch post details (including title) from the database
        $stmt = $conn->prepare("SELECT title, thumbnail_image, full_image FROM blog_posts WHERE id = ?");
        $stmt->bind_param("i", $postId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $postTitle = $row['title'];
            $thumbnailPath = $row['thumbnail_image'];
            $fullImagePath = $row['full_image'];


            
// Sanitize the title for use in the file name
$sanitizedTitle = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $postTitle)));

// Construct the path to the associated HTML file using the sanitized title
$htmlFilePath = "posts/{$sanitizedTitle}.html";  // Use sanitized title without postId

            // Delete the thumbnail image file if it exists
            if (!empty($thumbnailPath) && file_exists($thumbnailPath)) {
                unlink($thumbnailPath);
            }

            // Delete the full image file if it exists
            if (!empty($fullImagePath) && file_exists($fullImagePath)) {
                unlink($fullImagePath);
            }

            // Delete the HTML file if it exists
            if (file_exists($htmlFilePath)) {
                unlink($htmlFilePath);
            }

            // Delete the database entry
            $stmt = $conn->prepare("DELETE FROM blog_posts WHERE id = ?");
            $stmt->bind_param("i", $postId);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Post, images, and HTML file deleted successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to delete the post from the database']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Post not found']);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid post ID']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

// Close the connection
$conn->close();
?>