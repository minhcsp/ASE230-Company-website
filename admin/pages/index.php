<?php
include 'pages.php';

$pages = getAllPages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Pages Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Optional: Add your CSS file -->
</head>
<body>
    <h1>Manage Pages</h1>
    <a href="create.php">Create New Page</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($pages as $id => $page): ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td>
                    <a href="<?php echo htmlspecialchars($page['href']); ?>">
                        <?php echo htmlspecialchars($page['title']); ?>
                    </a>
                </td>
                <td>
                    <a href="detail.php?id=<?php echo $id; ?>">View</a> |
                    <a href="edit.php?id=<?php echo $id; ?>">Edit</a> |
                    <a href="delete.php?id=<?php echo $id; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="../../index.php">Exit Dashboard</a><br>
    
</body>
</html>
