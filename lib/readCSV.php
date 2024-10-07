<?php

function readCSV($filePath) {
    if (!file_exists($filePath)) {
        return "File not found.";
    }

    $csvData = [];
    if (($handle = fopen($filePath, "r")) !== FALSE) {
        while (($data = fgetcsv($handle)) !== FALSE) {
            $csvData[] = $data;
        }
        fclose($handle);
    }

    return $csvData;
}

?>
