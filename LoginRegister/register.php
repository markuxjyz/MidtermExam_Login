<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if (isset($_SESSION['message'])) { ?>
        <h1 style="color: red;"><?php echo $_SESSION['message']; ?></h1>
    <?php } unset($_SESSION['message']); ?>
    <div class="center-container">
        <div class="register-container">
            <h1>Register here!</h1>
            <form action="core/handleForms.php" method="POST">
                <p>
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" placeholder="e.g. Juan" required>
                </p>
                <p>
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" placeholder="e.g. Dela Cruz" required>
                </p>
                <p>
                    <label for="gender">Gender</label>
                    <input type="text" name="gender" placeholder="e.g. Male" required>
                </p>
                <p>
                    <label for="department">Department</label>
                    <input type="text" name="department" placeholder="e.g. Marketing" required>
                </p>
                <p>
                    <label for="position">Designated Position</label>
                    <input type="text" name="position" placeholder="e.g. Encoder" required>
                </p>
                <p>
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="e.g. jdelacruz78" required>
                </p>
                <p>
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="e.g. 123" required><br><br>
                    <input type="submit" name="registerUserBtn">
                </p>
            </form>
        </div>
    </div>
</body>
</html>