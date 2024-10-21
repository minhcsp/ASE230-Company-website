<?php
include 'pages.php';

$id = $_GET['id'] ?? null;
$page = getPageById($id);

if (!$page) {
    header("Location: index.php"); // Redirect if the page doesn't exist
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $href = $_POST['href'] ?? '';

    if ($title && $href) {
        modifyPage($id, $title, $href);
        header("Location: index.php"); // Redirect to the index page after modification
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Optional: Add your CSS file -->
</head>
<body>
    <header>
        <h1>Edit Page</h1>
    </header>
    <main>
        <form action="" method="POST">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($page['title']); ?>" required>
            <br>
            <label for="href">Link:</label>
            <input type="text" id="href" name="href" value="<?php echo htmlspecialchars($page['href']); ?>" required>
            <br>
            <button type="submit">Save Changes</button>
        </form>
        <a href="index.php">Back to List</a>
    </main>
</body>
</html>
