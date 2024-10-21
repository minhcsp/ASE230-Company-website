<?php
include 'contacts.php';
$contacts = getAllContacts();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Requests</title>
</head>
<body>
    <h1>Contact Requests</h1>
    <a href="../pages/index.php">Go Back to Dashboard</a><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Comments</th>
            <th>Timestamp</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($contacts as $id => $contact): ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo htmlspecialchars($contact['name']); ?></td>
                <td><?php echo htmlspecialchars($contact['email']); ?></td>
                <td><?php echo htmlspecialchars($contact['subject']); ?></td>
                <td><?php echo htmlspecialchars($contact['comments']); ?></td>
                <td><?php echo htmlspecialchars($contact['timestamp']); ?></td>
                <td>
                    <a href="detail.php?id=<?php echo $id; ?>">View</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
