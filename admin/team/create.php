<?php
include 'team.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $expertise = $_POST['expertise'];
    $biography = $_POST['biography'];
    createTeamMember([$name, $title, $expertise, $biography]);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Team Member</title>
</head>
<body>
    <h1>Create New Team Member</h1>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Title:</label>
        <input type="text" name="title" required><br>
        <label>Expertise:</label>
        <input type="text" name="expertise" required><br>
        <label>Biography:</label>
        <textarea name="biography" required></textarea><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
