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
			<a href="viewproduct.php?staff_id=<?php echo $_GET['staff_id']; ?>"> 
			View The Products</a>
        </div>
    </div>
	
	<h1>Edit the Product Information</h1>
	<?php $getProductByID = getProductByID($pdo, $_GET['stock_id']); ?>
	
	<form action="core/handleForms.php?stock_id=<?php echo $_GET['stock_id']; ?>
	&staff_id=<?php echo $_GET['staff_id']; ?>" method="POST">
	<div class="input-container">
		<p>
			<label for="itemName">Product Name</label> 
			<input type="text" name="itemName" 
			value="<?php echo $getProductByID['item_name']; ?>">
		</p>
		<p>
			<label for="itemShade">Product Shade</label> 
			<input type="text" name="itemShade" 
			value="<?php echo $getProductByID['item_shade']; ?>">
		</p>
		<p>
			<label for="price">Product Shade</label> 
			<input type="number" name="price" 
			value="<?php echo $getProductByID['price']; ?>">
		</p>
		<p>
			<label for="dateExpired">Expiry Date</label> 
			<input type="text" name="dateExpired" 
			value="<?php echo $getProductByID['date_expired']; ?>">
			<input type="submit" name="editProductBtn">
		</p>
	</div>
	</form>
</body>
</html>

