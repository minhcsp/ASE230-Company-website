<?php
include 'products.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $applications = $_POST['applications'];
    createProduct([
        'name' => $name,
        'description' => $description,
        'applications' => $applications,
    ]);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h1>Create New Product</h1>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Description:</label>
        <textarea name="description" required></textarea><br>
        <label>Applications:</label>
        <input type="text" name="applications[]" required><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
