<?php

$file = 'pages.json'; // Path to the JSON file

// Function to retrieve all pages
function getAllPages() {
    global $file;
    $pages = [];

    if (file_exists($file)) {
        $pages = json_decode(file_get_contents($file), true);
    }
    
    return $pages;
}

// Function to retrieve a specific page by index
function getPageById($id) {
    $pages = getAllPages();
    return isset($pages[$id]) ? $pages[$id] : null;
}

// Function to create a new page
function createPage($title, $href) {
    global $file;
    $pages = getAllPages();

    $newPage = [
        'title' => $title,
        'href' => $href
    ];

    $pages[] = $newPage; // Add the new page to the array
    file_put_contents($file, json_encode($pages, JSON_PRETTY_PRINT)); // Save to file
}

// Function to modify an existing page
function modifyPage($id, $title, $href) {
    global $file;
    $pages = getAllPages();

    if (isset($pages[$id])) {
        $pages[$id]['title'] = $title;
        $pages[$id]['href'] = $href;
        file_put_contents($file, json_encode($pages, JSON_PRETTY_PRINT)); // Save changes to file
    }
}

// Function to delete a page
function deletePage($id) {
    global $file;
    $pages = getAllPages();

    if (isset($pages[$id])) {
        unset($pages[$id]); // Remove the page from the array
        $pages = array_values($pages); // Re-index the array
        file_put_contents($file, json_encode($pages, JSON_PRETTY_PRINT)); // Save updated array to file
    }
}
?>
