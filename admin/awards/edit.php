<?php
include 'awards.php';

$id = $_GET['id'];
$award = getAwardById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $year = $_POST['year'];
    $achievement = $_POST['achievement'];
    updateAward($id, ['year' => $year, 'achievement' => $achievement]);
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
    <title>Edit Award</title>
</head>
<body>
    <h1>Edit Award</h1>
    <form method="POST">
        <label>Year:</label>
        <input type="number" name="year" value="<?php echo $award['year']; ?>" required><br>
        <label>Achievement:</label>
        <textarea name="achievement" required><?php echo $award['achievement']; ?></textarea><br>
        <input type="submit" value="Save Changes">
    </form>
</body>
</html>
