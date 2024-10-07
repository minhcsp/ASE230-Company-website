<?php

function readJSON($filePath) {
    if (file_exists($filePath)) {
        $jsonData = file_get_contents($filePath);
        return json_decode($jsonData, true);
    } else {
        return "File not found.";
    }
}

?>
