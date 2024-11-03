<?php require_once 'core/dbConfig.php'; ?>
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
            <a href="core/handleForms.php?logoutAUser =1">Logout</a>
        </div>
    </div>
	<?php $getProductByID = getProductByID($pdo, $_GET['stock_id']); ?>
	<h1>Are you sure you want to delete this product?</h1>
	<div class="delete-confirmation-container">
		<h2>Product Name: <?php echo $getProductByID['item_name'] ?></h2>
		<h2>Product Shade: <?php echo $getProductByID['item_shade'] ?></h2>
		<h2>Product Price: <?php echo $getProductByID['price'] ?></h2>
		<h2>Expiry Date: <?php echo $getProductByID['date_expired'] ?></h2>

		<div class="deleteBtn">
			<form action="core/handleForms.php?stock_id=<?php echo $_GET['stock_id']; ?>&staff_id=<?php echo $_GET['staff_id']; ?>" method="POST">
				<input type="submit" name="deleteProductBtn" value="Delete">
			</form>	
		</div>
	</div>		
</body>
</html>