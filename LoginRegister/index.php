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
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="header">
        <div class="right">
            <a href="core/handleForms.php?logoutAUser=1" class="logoutBtn">Logout</a>
        </div>
    </div>
    <div class="container">
        <div class="sidebar">
            <h3>User List</h3>
            <ul>
                <?php $getAllUsers = getAllUsers($pdo); ?>
                <?php foreach ($getAllUsers as $user) { ?>
                    <li><a href="viewuser.php?user_id=<?php echo $user['user_id']; ?>"><?php echo $user['username']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
		<div class="main-content">
			<h1>FILIPINA COSMETICS INVENTORY MONITORING SYSTEM</h1>
			<form action="core/handleForms.php" method="POST">
			<div class="input-container">
				<p> Register your account first, before you encode the inventory. </p>
				<p>
					<label for="productCategory">Product Category</label> 
					<input type="text" name="productCategory" required>
				</p>
				<p>
					<label for="productType">Product Type</label> 
					<input type="text" name="productType" required>
				</p>
				<p>
					<label for="productDes">Description</label> 
					<input type="text" name="productDes" required>
					<input type="submit" name="insertEmployeeBtn" value="Add Employee">
				</p>
			</div>
			</form>
		
			<?php $getAllEmployee = getAllEmployee($pdo); ?>
			<?php foreach ($getAllEmployee as $row) { ?>
			<div class="employee-container">
				<h3>Product Category: <?php echo $row['product_category']; ?></h3>
				<h3>Product Type: <?php echo $row['product_type']; ?></h3>
				<p><?php echo $row['product_des']; ?></p>
				<h3>Date Added: <?php echo $row['date_added']; ?></h3>
				<h3>Added By: <?php echo getUserByID($pdo, $row['added_by'])['username']; ?></h3>
                <h3>Last Updated: <?php echo $row['last_updated']; ?></h3>
                <h3>Last Updated By: <?php echo getUserByID($pdo, $row['last_updated_by'])['username']; ?></h3>

				<div class="editAndDelete">
					<a href="viewproduct.php?staff_id=<?php echo $row['staff_id']; ?>">View Stocks</a>
					<a href="editstaff.php?staff_id=<?php echo $row['staff_id']; ?>">Edit</a>
					<a href="deletestaff.php?staff_id=<?php echo $row['staff_id']; ?>">Delete</a>
				</div>
			</div>
			<?php } ?>
		</div>
	</div> 
</body>
</html>