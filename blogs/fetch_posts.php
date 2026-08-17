<?php




// Include the configuration file
include('config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(array('status' => 'error', 'message' => 'We apologize for the inconvenience, please try again later.'));
    exit();
}

// Query to fetch all blog posts
$sql = "SELECT id, title, post_date, thumbnail_image, excerpt FROM blog_posts ORDER BY post_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $posts = [];
    
    // Fetch all posts and store them in an array
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }

    echo json_encode(array('status' => 'success', 'posts' => $posts));
} else {
    echo json_encode(array('status' => 'error', 'message' => 'No posts found.'));
}

$conn->close();
?>
