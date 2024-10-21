<?php
include 'products.php';

$id = $_GET['id'];
$product = getProductById($id);

if (!$product) {
    echo "Product not found!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Detail</title>
</head>
<body>
    <h1>Product Details</h1>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($product['name']); ?></p>
    <p><strong>Description:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
    <p><strong>Applications:</strong></p>
    <ul>
        <?php foreach ($product['applications'] as $application): ?>
            <li><?php echo htmlspecialchars($application); ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="edit.php?id=<?php echo $id; ?>">Edit</a> |
    <a href="delete.php?id=<?php echo $id; ?>">Delete</a>
</body>
</html>
