<?php

$file = 'services.json'; // File where product data is stored

// Function to retrieve all products
function getAllProducts() {
    global $file;
    $products = [];

    if (file_exists($file)) {
        $data = json_decode(file_get_contents($file), true);
        $products = $data['products_services'];
    }
    
    return $products;
}

// Function to retrieve a specific product by index
function getProductById($id) {
    $products = getAllProducts();
    return isset($products[$id]) ? $products[$id] : null;
}

// Function to create a new product
function createProduct($productData) {
    global $file;
    $products = getAllProducts();
    $products[] = $productData;
    
    file_put_contents($file, json_encode(['products_services' => $products], JSON_PRETTY_PRINT));
}

// Function to update an existing product
function updateProduct($id, $updatedData) {
    global $file;
    $products = getAllProducts();
    
    if (isset($products[$id])) {
        $products[$id] = $updatedData;
        file_put_contents($file, json_encode(['products_services' => $products], JSON_PRETTY_PRINT));
    }
}

// Function to delete a product
function deleteProduct($id) {
    global $file;
    $products = getAllProducts();
    
    if (isset($products[$id])) {
        unset($products[$id]);
        // Reindex the array
        $products = array_values($products);
        file_put_contents($file, json_encode(['products_services' => $products], JSON_PRETTY_PRINT));
    }
}
?>
