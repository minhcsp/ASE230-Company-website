<?php
include 'team.php';

$id = $_GET['id'];
$member = getTeamMemberById($id);

if (!$member) {
    echo "Member not found!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Team Member Detail</title>
</head>
<body>
    <h1>Detail for Team Member #<?php echo $id; ?></h1>
    <p><strong>Name:</strong> <?php echo $member[0]; ?></p>
    <p><strong>Title:</strong> <?php echo $member[1]; ?></p>
    <p><strong>Expertise:</strong> <?php echo $member[2]; ?></p>
    <p><strong>Biography:</strong> <?php echo $member[3]; ?></p>
    <a href="edit.php?id=<?php echo $id; ?>">Edit</a> |
    <a href="delete.php?id=<?php echo $id; ?>">Delete</a>
</body>
</html>
