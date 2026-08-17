<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Check if the session role is set and is either 'employee' or 'user'
if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'employee' && $_SESSION['role'] !== 'user')) {
    header('Location: login.html');
    exit();
}

// Database connection parameters
include('config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(array('status' => 'error', 'message' => 'We apologize for the inconvenience, please try again later.'));
    exit();
}

$post = null;
$oldFileName = null;

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $postId = $_GET['id'];
    $sql = "SELECT * FROM blog_posts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $postId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
        $sanitizedTitle = sanitizeTitleForFileName($post['title']);
        $oldFileName = 'posts/' . $sanitizedTitle . '.html';
        echo "Old file name: " . $oldFileName . "<br>";
    } else {
        echo "Post not found!";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form values
    $postId = $_POST['postId'];
    $title = sanitizeTitleForFileName($_POST['title']);
    $metaDescription = sanitizeInput($_POST['metaDescription']);
    $metaKeywords = sanitizeInput($_POST['metaKeywords']);
    $excerpt = sanitizeInput($_POST['excerpt']);
    $oldFileName = $_POST['oldFileName']; // Retrieve the old file name

    // Update the post in the database (excluding content)
    $sql = "UPDATE blog_posts SET title = ?, meta_description = ?, meta_keywords = ?, excerpt = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $title, $metaDescription, $metaKeywords, $excerpt, $postId);

    if ($stmt->execute()) {
        // After successful database update, update the HTML file (excluding content)
        if (updateHtmlFile($title, $metaDescription, $metaKeywords, $postId, $oldFileName)) {
            // Redirect to manage-posts.html after successful update
            header("Location: manage-posts.html");
            exit();
        } else {
            echo "HTML file update failed.";
        }
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

function sanitizeTitleForFileName($postTitle) {
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $postTitle)));
}

function updateHtmlFile($title, $metaDescription, $metaKeywords, $postId, $oldFileName) {
    if (empty($oldFileName)) {
        echo "Error: Old file name not set.";
        return false;
    }

    // Define the new file name based on the sanitized title
    $sanitizedTitle = sanitizeTitleForFileName($title);
    $htmlFile = 'posts/' . $sanitizedTitle . '.html'; // Path to your HTML file

    // Check if the old file exists
    if (!file_exists($oldFileName)) {
        echo "Error: Old HTML file not found.";
        return false;
    }

    // Load the existing HTML content
    $dom = new DOMDocument();
    libxml_use_internal_errors(true); // Suppress warnings for malformed HTML
    $htmlContent = file_get_contents($oldFileName);
    $dom->loadHTML($htmlContent, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    $titleTag = $dom->getElementsByTagName('title')->item(0);
    if ($titleTag) {
        $titleTag->nodeValue = htmlspecialchars($title);
    }

    $xpath = new DOMXPath($dom);
    $h1Element = $xpath->query('//section[@class="single-post"]//h1')->item(0);
    if ($h1Element) {
        $h1Element->nodeValue = htmlspecialchars($title);
    }

    $metaTags = $dom->getElementsByTagName('meta');
    foreach ($metaTags as $meta) {
        if ($meta->getAttribute('name') === 'description') {
            $meta->setAttribute('content', htmlspecialchars($metaDescription));
        }
        if ($meta->getAttribute('name') === 'keywords') {
            $meta->setAttribute('content', htmlspecialchars($metaKeywords));
        }
    }

    echo "Saving HTML file: " . $htmlFile . "<br>";
    if ($dom->saveHTMLFile($htmlFile)) {
        if (rename($oldFileName, $htmlFile)) {
            return true;
        } else {
            echo "Error renaming HTML file.<br>";
            return false;
        }
    } else {
        echo "Error saving HTML file.<br>";
        return false;
    }
}
?>






    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post | Hussain & Co.</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/kwhuec1fjfw3ufs4sab2soqwjsypyopmq4wnqbw5zx8xrfga/tinymce/5/tinymce.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Post</h1>

        <?php if (!empty($status_message)): ?>
        <div class="alert alert-success"><?php echo $status_message; ?></div>
    <?php elseif (!empty($error_message)): ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <form method="POST" action="edit-post.php">
    <input type="hidden" name="postId" value="<?php echo $post['id']; ?>">
    <input type="hidden" name="oldFileName" value="<?php echo $oldFileName; ?>">

    <div class="form-group">
        <label for="postTitle">Post Title</label>
        <input type="text" class="form-control" id="postTitle" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
    </div>

    <!-- Meta Description -->
    <div class="form-group">
        <label for="metaDescription">Meta Description</label>
        <textarea class="form-control" id="metaDescription" name="metaDescription" rows="3" placeholder="Short description for search engines (max 160 characters)" maxlength="160" required><?php echo htmlspecialchars($post['meta_description']); ?></textarea>
    </div>

    <!-- Meta Keywords -->
    <div class="form-group">
        <label for="metaKeywords">Meta Keywords</label>
        <input type="text" class="form-control" id="metaKeywords" name="metaKeywords" placeholder="Keywords separated by commas" value="<?php echo htmlspecialchars($post['meta_keywords']); ?>" required>
    </div>

    <div class="form-group">
        <label for="postExcerpt">Post Excerpt</label>
        <input type="text" class="form-control" id="postExcerpt" name="excerpt" value="<?php echo htmlspecialchars($post['excerpt']); ?>" required>
    </div>

   <button type="submit" class="btn btn-primary">Save Changes</button>
</form>

    </div>

   
</body>
</html>
