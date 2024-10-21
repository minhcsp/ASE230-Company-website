<?php
include 'awards.php';
$awards = getAllAwards();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Awards</title>
</head>
<body>
    <h1>Awards</h1>
    <a href="../pages/index.php">Go Back to Dashboard</a><br>
    <a href="create.php">Create New Award</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Year</th>
            <th>Achievement</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($awards as $id => $award): ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $award['year']; ?></td>
                <td><?php echo $award['achievement']; ?></td>
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
