<?php

$file = 'awards.json';

// Function to retrieve all awards
function getAllAwards() {
    global $file;
    $awards = [];

    if (file_exists($file)) {
        $data = json_decode(file_get_contents($file), true);
        $awards = $data['awards'];
    }
    
    return $awards;
}

// Function to retrieve a specific award by ID
function getAwardById($id) {
    $awards = getAllAwards();
    return isset($awards[$id]) ? $awards[$id] : null;
}

// Function to create a new award
function createAward($awardData) {
    global $file;
    $awards = getAllAwards();
    $awards[] = $awardData;
    
    file_put_contents($file, json_encode(['awards' => $awards], JSON_PRETTY_PRINT));
}

// Function to update an existing award
function updateAward($id, $updatedData) {
    global $file;
    $awards = getAllAwards();
    
    if (isset($awards[$id])) {
        $awards[$id] = $updatedData;
        file_put_contents($file, json_encode(['awards' => $awards], JSON_PRETTY_PRINT));
    }
}

// Function to delete an award
function deleteAward($id) {
    global $file;
    $awards = getAllAwards();
    
    if (isset($awards[$id])) {
        unset($awards[$id]);
        // Reindex the array
        $awards = array_values($awards);
        file_put_contents($file, json_encode(['awards' => $awards], JSON_PRETTY_PRINT));
    }
}
?>
