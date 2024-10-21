<?php
include 'pages.php';

$id = $_GET['id'] ?? null;
$page = getPageById($id);

if (!$page) {
    header("Location: index.php"); // Redirect if the page doesn't exist
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    deletePage($id);
    header("Location: index.php"); // Redirect to the index page after deletion
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Page</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Optional: Add your CSS file -->
</head>
<body>
    <header>
        <h1>Delete Page</h1>
    </header>
    <main>
        <p>Are you sure you want to delete the page "<?php echo htmlspecialchars($page['title']); ?>"?</p>
        <form action="" method="POST">
            <button type="submit">Yes, Delete</button>
        </form>
        <a href="index.php">Cancel</a>
    </main>
</body>
</html>
