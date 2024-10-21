<?php
include 'team.php';
$teamMembers = getAllTeamMembers();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Team Members</title>
</head>
<body>
    <h1>Team Members</h1>
    <a href="../pages/index.php">Go Back to Dashboard</a><br>
    <a href="create.php">Create New Team Member</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Title</th>
            <th>Expertise</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($teamMembers as $id => $member): ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $member[0]; ?></td> <!-- Name -->
                <td><?php echo $member[1]; ?></td> <!-- Title -->
                <td><?php echo $member[2]; ?></td> <!-- Expertise -->
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
