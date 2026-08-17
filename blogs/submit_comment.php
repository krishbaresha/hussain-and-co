<?php




// Set the timezone to GMT+5 (Asia/Karachi)
date_default_timezone_set('Asia/Karachi');

include('config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]);
    exit();
}

// Handle Comment Submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'submit_comment') {
    $postId = $_POST['post_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $date = date('Y-m-d g:i A');   // Corrected to 24-hour format

    // Check if the post_id exists in the blog_posts table
    $stmt = $conn->prepare("SELECT id FROM blog_posts WHERE id = ?");
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // The post_id exists, insert the comment
        $stmt->close(); // Close the first statement here
        
        $stmt = $conn->prepare("INSERT INTO comments (post_id, name, email, message, date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $postId, $name, $email, $message, $date);

        if ($stmt->execute()) {
            // Fetch the new comment
            $commentId = $stmt->insert_id;  // Get the last inserted comment ID
            $stmt->close();

            // Fetch the new comment from the database
            $stmt = $conn->prepare("SELECT * FROM comments WHERE id = ?");
            $stmt->bind_param("i", $commentId);
            $stmt->execute();
            $result = $stmt->get_result();
            $newComment = $result->fetch_assoc();
            $stmt->close();

            // Get the total count of comments for the post
            $stmt = $conn->prepare("SELECT COUNT(*) AS comment_count FROM comments WHERE post_id = ?");
            $stmt->bind_param("i", $postId);
            $stmt->execute();
            $result = $stmt->get_result();
            $count = $result->fetch_assoc();
            $stmt->close();

            // Return the success response along with comment count and the new comment
            echo json_encode([
                "status" => "success",
                "message" => "Your comment has been submitted successfully!",
                "newComment" => [
                    "author" => $newComment['name'],
                    "createdAt" => $newComment['date'],
                    "content" => $newComment['message']
                ],
                "commentCount" => $count['comment_count']
            ]);
        } else {
            $response = [
                "status" => "error",
                "message" => "An error occurred while submitting your comment. Please try again."
            ];
            echo json_encode($response);
        }
    } else {
        // The post_id does not exist in the blog_posts table
        $response = [
            "status" => "error",
            "message" => "The post you are trying to comment on does not exist."
        ];
        echo json_encode($response);
    }
    exit();
}

// Handle Comment Fetching with Pagination
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action']) && $_GET['action'] == 'fetch_comments') {
    $postId = $_GET['post_id'];
    $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;  // Default offset is 0
    $limit = 5;  // Show 5 comments per request

    // Fetch the total comment count for the post
    $stmt = $conn->prepare("SELECT COUNT(*) AS comment_count FROM comments WHERE post_id = ?");
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $commentCount = $row['comment_count'];

    // Fetch comments with pagination (5 at a time)
    $stmt = $conn->prepare("SELECT * FROM comments WHERE post_id = ? ORDER BY date DESC LIMIT ?, ?");
    $stmt->bind_param("iii", $postId, $offset, $limit);
    $stmt->execute();
    $result = $stmt->get_result();

    $comments = [];
    while ($row = $result->fetch_assoc()) {
        $comments[] = [
            "author" => $row['name'],
            "createdAt" => $row['date'],
            "content" => $row['message']
        ];
    }

    $stmt->close();
    echo json_encode([
        "status" => "success",
        "comments" => $comments,
        "commentCount" => $commentCount, // Send the total number of comments
        "loadedCount" => count($comments) // Send the number of comments loaded in this request
    ]);
    exit();
}

// Close the database connection
$conn->close();

?>
