<?php
include 'contacts.php';

$id = $_GET['id'];
$contact = getContactById($id);

if (!$contact) {
    echo "Contact request not found!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Request Detail</title>
</head>
<body>
    <h1>Contact Request Details</h1>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($contact['name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($contact['email']); ?></p>
    <p><strong>Subject:</strong> <?php echo htmlspecialchars($contact['subject']); ?></p>
    <p><strong>Comments:</strong> <?php echo nl2br(htmlspecialchars($contact['comments'])); ?></p>
    <p><strong>Timestamp:</strong> <?php echo htmlspecialchars($contact['timestamp']); ?></p>
    <a href="index.php">Back to Contact Requests</a>
</body>
</html>
