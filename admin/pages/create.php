<?php
include 'pages.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $href = $_POST['href'] ?? '';

    if ($title && $href) {
        createPage($title, $href);
        header("Location: index.php"); // Redirect to the index page after creation
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Page</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Optional: Add your CSS file -->
</head>
<body>
    <header>
        <h1>Create New Page</h1>
    </header>
    <main>
        <form action="" method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <br>
            <label for="href">Link:</label>
            <input type="text" id="href" name="href" required>
            <br>
            <button type="submit">Create Page</button>
        </form>
        <a href="index.php">Back to List</a>
    </main>
</body>
</html>
