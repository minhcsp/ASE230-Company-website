<?php
include 'products.php';

$id = $_GET['id'];
$product = getProductById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $applications = $_POST['applications'];

    updateProduct($id, [
        'name' => $name,
        'description' => $description,
        'applications' => $applications,
    ]);
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
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br>
        <label>Description:</label>
        <textarea name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea><br>
        <label>Applications:</label>
        <input type="text" name="applications[]" value="<?php echo htmlspecialchars(implode(', ', $product['applications'])); ?>" required><br>
        <input type="submit" value="Save Changes">
    </form>
</body>
</html>
