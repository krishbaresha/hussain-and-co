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
    echo json_encode(array('status' => 'error', 'message' => 'We apologize for the inconvenience, please try again later.'));
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form values
    $title = sanitizeInput($_POST['postTitle']);
    $metaDescription = sanitizeInput($_POST['metaDescription']);
    $metaKeywords = sanitizeInput($_POST['metaKeywords']);
    $excerpt = sanitizeInput($_POST['postExcerpt']);
    $content = sanitizeHTML($_POST['postContent']);
    $postDate = sanitizeInput($_POST['postDate']);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO blog_posts (title, meta_description, meta_keywords, excerpt, content, post_date) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $title, $metaDescription, $metaKeywords, $excerpt, $content, $postDate);

    if ($stmt->execute()) {
        // Get the inserted blog post ID
        $postId = $stmt->insert_id;

        // Upload Full Image
        $fullImage = uploadImage('fullImage', 'uploads/full_images/', $postId);
        // Upload Thumbnail Image
        $thumbnailImage = uploadImage('postThumbnail', 'uploads/thumbnails/', $postId);

        if ($fullImage && $thumbnailImage) {
            // Update the database with image paths
            $stmt = $conn->prepare("UPDATE blog_posts SET full_image = ?, thumbnail_image = ? WHERE id = ?");
            $stmt->bind_param("ssi", $fullImage, $thumbnailImage, $postId);

            if ($stmt->execute()) {
                // Fetch the blog post details for generating the HTML content
                $stmt = $conn->prepare("SELECT * FROM blog_posts WHERE id = ?");
                $stmt->bind_param("i", $postId);
                $stmt->execute();
                $result = $stmt->get_result();
                $post = $result->fetch_assoc();

                // Generate HTML page for the blog post
                createBlogPage($post);

                echo json_encode(array('status' => 'success', 'message' => 'Blog post submitted successfully!'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Failed to update the database with image paths.'));
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'We apologize for the inconvenience, please try again later.'));
        }

        $stmt->close();
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'We apologize for the inconvenience, please try again later.'));
    }
}

// Sanitize plain text input
function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Sanitize HTML content
function sanitizeHTML($html) {
    $allowedTags = '<p><b><i><u><a><ul><ol><li><img><strong><em>';
    // Remove <p>&nbsp;</p> tags
    $html = str_replace('<p>&nbsp;</p>', '', $html);
    return strip_tags($html, $allowedTags);
}

function uploadImage($inputName, $targetDirectory, $postId) { 
    if (!isset($_FILES[$inputName])) {
        return false;
    }

    // Get file extension
    $imageFileType = strtolower(pathinfo($_FILES[$inputName]["name"], PATHINFO_EXTENSION));
    
    // Generate a unique file name by combining post ID and timestamp
    $uniqueName = $postId . '_' . time() . '_' . rand(1000, 9999) . '.' . $imageFileType;

    // Combine the target directory and unique file name
    $targetFile = $targetDirectory . $uniqueName;

    // Check if the uploaded file is a valid image
    if (!getimagesize($_FILES[$inputName]["tmp_name"])) {
        return false;
    }

    // Check file size (5MB max)
    if ($_FILES[$inputName]["size"] > 5000000) {
        return false;
    }

    // Allow certain file formats (jpg, jpeg, png, gif)
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        return false;
    }

    // Try to upload the file
    if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $targetFile)) {
        return $targetFile; // Return the file path if successful
    } else {
        return false;
    }
}



function createBlogPage($post) {
    $postId = $post['id'];
    $title = htmlspecialchars($post['title']);
    $metaDescription = htmlspecialchars($post['meta_description']);
    $metaKeywords = htmlspecialchars($post['meta_keywords']);
    $excerpt = $post['excerpt'];
    $content = $post['content']; // Already sanitized
    $postDate = $post['post_date'];
    $fullImage = $post['full_image'];
    $thumbnailImage = $post['thumbnail_image'];
    // Sanitize the title for use in the file name
$sanitizedTitle = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));

    $htmlContent = "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='description' content='" . htmlspecialchars($metaDescription) . "'>
    <meta name='keywords' content='" . htmlspecialchars($metaKeywords) . "'>
     <link rel='preload' as='image' href='../$fullImage'>
    <link rel='icon' href='../images/hussain-and-co-logo.png' type='image/png'>
    <title>" . htmlspecialchars($title) . " | Hussain & Co.</title>
    <link rel='stylesheet' href='../blogstyle.css'>
     <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    <!-- Schema.org JSON-LD Structured Data -->
    
    
     <!-- Open Graph Meta Tags -->
    <meta property='og:title' content='" . htmlspecialchars($title) . "'>
    <meta property='og:description' content='" . htmlspecialchars($metaDescription) . "'>
    <meta property='og:image' content='" . htmlspecialchars($fullImage) . "'>
    <meta property='og:url' content='https://www.hussainnco.com/blogs/posts/" . $sanitizedTitle . "'>
    <meta property='og:type' content='article'>
    <meta property='og:site_name' content='Hussain & Co.'>

    <!-- Twitter Card Meta Tags -->
    <meta name='twitter:card' content='summary_large_image'>
    <meta name='twitter:title' content='" . htmlspecialchars($title) . "'>
    <meta name='twitter:description' content='" . htmlspecialchars($metaDescription) . "'>
    <meta name='twitter:image' content='" . htmlspecialchars($fullImage) . "'>
    <meta name='twitter:url' content='https://www.hussainnco.com/blogs/posts/" . $sanitizedTitle . "'>
    
    <script type='application/ld+json'>
        {
            '@context': 'http://schema.org',
            '@type': 'BlogPosting',
            'headline': '" . htmlspecialchars($title) . "',
            'alternativeHeadline': '" . htmlspecialchars($metaKeywords) . "',
            'image': '" . htmlspecialchars($fullImage) . "',
            'author': {
                '@type': 'Organization',
                'name': 'Hussain & Co.'
            },
            'publisher': {
                '@type': 'Organization',
                'name': 'Hussain & Co.',
                'logo': {
                    '@type': 'ImageObject',
                    'url': 'https://hussainnco.com/logo.png'
                }
            },
            'datePublished': '" . htmlspecialchars($postDate) . "',
            'dateModified': '" . htmlspecialchars($postDate) . "',
            'description': '" . htmlspecialchars($metaDescription) . "',
            'mainEntityOfPage': {
                '@type': 'WebPage',
                '@id': 'https://hussainnco.com/blogs/posts/" . $sanitizedTitle . "'
            }
        }
    </script>
</head>
<body>
    <div>
        <a href='/blogs/' class='custom-back-button'>←</a>
    </div>
    <section class='single-post'>
        <h1>$title</h1>
        <p class='date'>Published on " . date('F j, Y', strtotime($postDate)) . "</p>
        <div class='image-container'>
            <img src='../$fullImage' alt='$title'>
        </div>
        <div class='content'>
            $content
        </div>
        <p class='centered'>
            Stay tuned for more tips on making tax filing easier and less stressful. Visit <a href='https://hussainnco.com' target='_blank'>Hussain & Co.</a> for more information.
        </p> 
    </section>

    <!-- Comments Section -->
    <section class='comments'>
        <h2>Leave a Comment</h2>
        <div class='comment-count'>
            <span id='commentCount' class='count'>3</span> Comments
        </div>
        <div id='alertContainer'></div>

        <form class='comment-form' id='commentForm'>
            <input type='hidden' name='action' value='submit_comment'>
            <input type='hidden' name='post_id' id='postId' value='$postId'>
            <div class='form-row'>
                <input type='text' name='name' placeholder='Your Name' required>
                <input type='email' name='email' placeholder='Your Email' required>
            </div>
            <textarea name='message' placeholder='Write your comment here...' required></textarea>
            <button type='submit'>Submit Comment</button>
        </form>

        <!-- Comments List -->
        <div class='comment-list' id='commentsSection'></div>

        <!-- Load More Button -->
        <button id='loadMoreButton' class='btn btn-primary' style='display:none;'>Load More</button>
    </section>

    <script src='../comments.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>";

   // Sanitize the title for use in the file name
$sanitizedTitle = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
 // Use sanitized title without post ID
 $filePath = 'posts/' . $sanitizedTitle . '.html';

 if (!file_exists('posts')) {
     mkdir('posts', 0777, true);
 }

 file_put_contents($filePath, $htmlContent);
}

$conn->close();
?>
