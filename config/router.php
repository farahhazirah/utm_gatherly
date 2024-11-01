<?php 
// Determine which content to load based on the `page` URL parameter
$page = isset($_GET['page']) ? $_GET['page'] : 'site';

// Sanitize the input to prevent directory traversal attacks
$page = preg_replace('/[^a-zA-Z0-9_-]/', '', $page);

// Define the path for the content file
$contentFile = "views/{$page}.php";


// Check if the content file exists; if not, load a 404 page
if (!file_exists($contentFile)) {
    header('Location: views/404.php');
}

?>