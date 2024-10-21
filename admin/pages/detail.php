<?php
include 'pages.php';

$id = $_GET['id'] ?? null;
$page = getPageById($id);

if (!$page) {
    header("Location: index.php"); // Redirect if the page doesn't exist
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Detail</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Optional: Add your CSS file -->
</head>
<body>
    <header>
        <h1>Page Detail</h1>
    </header>
    <main>
        <h2><?php echo htmlspecialchars($page['title']); ?></h2>
        <p><strong>Link:</strong> <a href="<?php echo htmlspecialchars($page['href']); ?>"><?php echo htmlspecialchars($page['href']); ?></a></p>
        <a href="edit.php?id=<?php echo $id; ?>">Edit</a>
        <form action="delete.php?id=<?php echo $id; ?>" method="POST" style="display:inline;">
            <button type="submit">Delete</button>
        </form>
        <a href="index.php">Back to List</a>
    </main>
</body>
</html>
