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
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch blog posts (only title, post_date, and excerpt)
$sql = "SELECT id, title, post_date, excerpt FROM blog_posts ORDER BY post_date DESC";
$result = $conn->query($sql);

// Initialize an empty array to store posts
$posts = [];

// Check if there are posts and fetch them
if ($result->num_rows > 0) {
    while ($post = $result->fetch_assoc()) {
        // Format post date to a more readable format (optional)
        $formatted_date = date('Y-m-d', strtotime($post['post_date']));
        
        // Add each post to the posts array
        $posts[] = [
            'id' => $post['id'],
            'title' => $post['title'],
            'date' => $formatted_date, // Adjust if needed
            'excerpt' => $post['excerpt'],
        ];
    }
}

// Return the data as JSON
echo json_encode(['status' => 'success', 'posts' => $posts]);

// Close the connection
$conn->close();
?>
