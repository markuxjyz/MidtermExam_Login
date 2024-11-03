<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
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
	<?php $getEmployeeByID = getEmployeeByID($pdo, $_GET['staff_id']); ?>
	<h1>Edit the Categories!</h1>
	<form action="core/handleForms.php?staff_id=<?php echo $_GET['staff_id']; ?>" method="POST">
		<p>
			<label for="productCategory">Product Category</label> 
			<input type="text" name="productCategory" value="<?php echo $getEmployeeByID['product_category']; ?>">
		</p>
		<p>
			<label for="productType">Product Type</label> 
			<input type="text" name="productType" value="<?php echo $getEmployeeByID['product_type']; ?>">
		</p>
		<p>
			<label for="productDes">Description</label> 
			<input type="text" name="productDes" value="<?php echo $getEmployeeByID['product_des']; ?>">
			<input type="submit" name="editEmployeeBtn">
		</p>
	</form>
</body>
</html>
