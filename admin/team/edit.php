<?php
include 'team.php';

$id = $_GET['id'];
$member = getTeamMemberById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $expertise = $_POST['expertise'];
    $biography = $_POST['biography'];
    updateTeamMember($id, [$name, $title, $expertise, $biography]);
    header('Location: index.php');
}

if (!$member) {
    echo "Member not found!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Team Member</title>
</head>
<body>
    <h1>Edit Team Member</h1>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $member[0]; ?>" required><br>
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $member[1]; ?>" required><br>
        <label>Expertise:</label>
        <input type="text" name="expertise" value="<?php echo $member[2]; ?>" required><br>
        <label>Biography:</label>
        <textarea name="biography" required><?php echo $member[3]; ?></textarea><br>
        <input type="submit" value="Save Changes">
    </form>
</body>
</html>
