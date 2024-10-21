<?php
include 'team.php';

$id = $_GET['id'];
$member = getTeamMemberById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    deleteTeamMember($id);
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
    <title>Delete Team Member</title>
</head>
<body>
    <h1>Are you sure you want to delete Team Member #<?php echo $id; ?>?</h1>
    <p><strong>Name:</strong> <?php echo $member[0]; ?></p>
    <p><strong>Title:</strong> <?php echo $member[1]; ?></p>
    <form method="POST">
        <input type="submit" value="Confirm Deletion">
    </form>
    <a href="index.php">Cancel</a>
</body>
</html>
