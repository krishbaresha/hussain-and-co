<?php
// Strip referral tracking params and redirect cleanly
$tracking_params = ['fbclid', 'gclid', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'];
$query = $_GET;
$has_tracking = false;

foreach ($tracking_params as $param) {
    if (isset($query[$param])) {
        unset($query[$param]);
        $has_tracking = true;
    }
}

if ($has_tracking) {
    $clean_url = strtok($_SERVER['REQUEST_URI'], '?');
    $new_query = !empty($query) ? '?' . http_build_query($query) : '';
    header('Location: https://www.hussainnco.com' . $clean_url . $new_query, true, 301);
    exit;
}

// Set up base URL (for live hosting)
$baseUrl = 'https://www.hussainnco.com/'; // Update to your live domain
// Get the requested URI
$requestUri = trim($_SERVER['REQUEST_URI'], '/');
// Define the base directories
$baseDir = __DIR__ . '/blogs/'; // Path to your blog directory
$imagesDir = __DIR__ . '/images/'; // Path to your images directory
// Define allowed static file extensions
$staticFiles = ['jpg', 'jpeg', 'png', 'gif', 'css', 'js', 'ico', 'svg', 'pdf', 'txt', 'mp4', 'webp'];
$fileExtension = pathinfo($requestUri, PATHINFO_EXTENSION);
if (in_array(strtolower($fileExtension), $staticFiles)) {
    // Serve static files directly (e.g., images, CSS, JS)
    $fileToServe = __DIR__ . '/' . $requestUri;
} elseif ($requestUri === '' || $requestUri === 'index') {
    // Default page, serve index.html
    $fileToServe = __DIR__ . '/index.html';
} elseif ($requestUri === 'blogs') {
    // If the URL is just /blogs, serve blogs.html
    $fileToServe = $baseDir . 'blogs.html';
} elseif (strpos($requestUri, '/blogs/posts/') === 0) {
    // For specific blog posts, like /blogs/posts/some-post-name
    $fileToServe = $baseDir . str_replace('blogs/posts/', '', $requestUri) . '.html';  // Assuming blog posts are .html files
} elseif ($fileExtension === '') {
    // Handle requests without extensions
    if (file_exists(__DIR__ . '/' . $requestUri . '.html')) {
        $fileToServe = __DIR__ . '/' . $requestUri . '.html';
    } elseif (file_exists(__DIR__ . '/' . $requestUri . '.php')) {
        $fileToServe = __DIR__ . '/' . $requestUri . '.php';
    } else {
        // Redirect to 404 if no .html or .php file exists
        $fileToServe = __DIR__ . '/404.html';
    }
} else {
    // Redirect to 404 for unsupported extensions or unknown paths
    $fileToServe = __DIR__ . '/404.html';
}
// Serve the content if the file exists
if (file_exists($fileToServe)) {
    // SEO fix: if we've fallen back to the 404 page, the response must carry
    // a real 404 status — otherwise search engines see "200 OK" on broken
    // URLs and may index them as valid pages ("soft 404").
    if (basename($fileToServe) === '404.html') {
        http_response_code(404);
    }
    include($fileToServe);
} else {
    // If the file doesn't exist, show a 404 error
    http_response_code(404);
    include(__DIR__ . '/404.html'); // Ensure 404 page is included if exists
}
?>