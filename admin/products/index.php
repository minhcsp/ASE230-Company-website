<?php
include 'products.php';
$products = getAllProducts();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products and Services</title>
</head>
<body>
    <h1>Products and Services</h1>
    <a href="../pages/index.php">Go Back to Dashboard</a><br>
    <a href="create.php">Create New Product</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($products as $id => $product): ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo htmlspecialchars($product['description']); ?></td>
                <td>
                    <a href="detail.php?id=<?php echo $id; ?>">View</a> |
                    <a href="edit.php?id=<?php echo $id; ?>">Edit</a> |
                    <a href="delete.php?id=<?php echo $id; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
