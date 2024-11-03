<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
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
        <div class="left">
            <a href="index.php">Return to Home</a>
        </div>
        <div class="right">
            <a href="core/handleForms.php?logoutAUser=1">Logout</a>
        </div>
    </div>
	<h1>Are you sure you want to delete this employee record?</h1>
	<?php $getEmployeeByID = getEmployeeByID($pdo, $_GET['staff_id']); ?>
	<div class="delete-confimation-container">
		<h2>Product Category: <?php echo $getEmployeeByID['product_category']; ?></h2>
		<h2>Product Type: <?php echo $getEmployeeByID['product_type']; ?></h2>
		<h2>Description: <?php echo $getEmployeeByID['product_des']; ?></h2>
		<h2>Date Added: <?php echo $getEmployeeByID['date_added']; ?></h2>

		<div class="deleteBtn" >
			<form action="core/handleForms.php?staff_id=<?php echo $_GET['staff_id']; ?>" method="POST">
				<input type="submit" name="deleteEmployeeBtn" value="Delete">
			</form>			
		</div>
	</div>
</body>
</html>
