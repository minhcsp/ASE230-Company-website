<?php

$file = 'contacts.json'; // File where contact requests are stored

// Function to retrieve all contact requests
function getAllContacts() {
    global $file;
    $contacts = [];

    if (file_exists($file)) {
        $contacts = json_decode(file_get_contents($file), true);
    }
    
    return $contacts;
}

// Function to retrieve a specific contact request by index
function getContactById($id) {
    $contacts = getAllContacts();
    return isset($contacts[$id]) ? $contacts[$id] : null;
}
?>
