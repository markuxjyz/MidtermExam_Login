<?php 
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="left">
            <a href="index.php">Return to Home</a>
        </div>
        <div class="right">
            <a href="core/handleForms.php?logoutAUser=1">Logout</a>
        </div>
    </div>
    <h1> User Information </h1>
    <div class="view-user-container">
        <?php $getUserByID = getUserByID($pdo, $_GET['user_id']); ?>
        <h1>First Name: <?php echo $getUserByID['first_name']; ?></h1>
        <h1>Last Name: <?php echo $getUserByID['last_name']; ?></h1>
        <h1>Gender: <?php echo $getUserByID['gender']; ?></h1>
        <h1>Department: <?php echo $getUserByID['department']; ?></h1>
        <h1>Position: <?php echo $getUserByID['position']; ?></h1>
        <h1>Date Joined: <?php echo $getUserByID['date_added']; ?></h1>
</div>
</body>
</html>
