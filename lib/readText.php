<?php

function readPlainText($filePath) {
    if (file_exists($filePath)) {
        return file_get_contents($filePath);
    } else {
        return "File not found.";
    }
}

?>
