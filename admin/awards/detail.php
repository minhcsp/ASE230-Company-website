<?php
include 'awards.php';

$id = $_GET['id'];
$award = getAwardById($id);

if (!$award) {
    echo "Award not found!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Award Detail</title>
</head>
<body>
    <h1>Award Details</h1>
    <p><strong>Year:</strong> <?php echo $award['year']; ?></p>
    <p><strong>Achievement:</strong> <?php echo $award['achievement']; ?></p>
    <a href="edit.php?id=<?php echo $id; ?>">Edit</a> |
    <a href="delete.php?id=<?php echo $id; ?>">Delete</a>
</body>
</html>
