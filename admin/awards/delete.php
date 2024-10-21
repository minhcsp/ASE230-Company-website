<?php
include 'awards.php';

$id = $_GET['id'];
$award = getAwardById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    deleteAward($id);
    header('Location: index.php');
}

if (!$award) {
    echo "Award not found!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Award</title>
</head>
<body>
    <h1>Are you sure you want to delete this award?</h1>
    <p><strong>Year:</strong> <?php echo $award['year']; ?></p>
    <p><strong>Achievement:</strong> <?php echo $award['achievement']; ?></p>
    <form method="POST">
        <input type="submit" value="Confirm Deletion">
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
