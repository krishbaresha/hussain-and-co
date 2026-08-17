<?php
// Get the post name from the query parameter
$post_name = isset($_GET['post']) ? $_GET['post'] : '';

// Check if the post file exists in the /posts directory
$file_path = __DIR__ . '/' . $post_name . '.html';

if (file_exists($file_path)) {
    // Include the HTML file if it exists
    include($file_path);
} else {
    // If the file doesn't exist, show a 404 error page or redirect
    header("HTTP/1.0 404 Not Found");
    echo "Sorry, the page you're looking for doesn't exist.";
}
?>
