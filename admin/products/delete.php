<?php
include 'products.php';

$id = $_GET['id'];
$product = getProductById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    deleteProduct($id);
    header('Location: index.php');
}

if (!$product) {
    echo "Product not found!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Product</title>
</head>
<body>
    <h1>Are you sure you want to delete this product?</h1>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($product['name']); ?></p>
    <p><strong>Description:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
    <form method="POST">
        <input type="submit" value="Confirm Deletion">
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
