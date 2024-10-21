<?php
include 'awards.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $year = $_POST['year'];
    $achievement = $_POST['achievement'];
    createAward(['year' => $year, 'achievement' => $achievement]);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Award</title>
</head>
<body>
    <h1>Create New Award</h1>
    <form method="POST">
        <label>Year:</label>
        <input type="number" name="year" required><br>
        <label>Achievement:</label>
        <textarea name="achievement" required></textarea><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
