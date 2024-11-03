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
	<div class="employee-container">
		<?php $getAllInfoByEmployeeID = getAllInfoByEmployeeID($pdo, $_GET['staff_id']); ?>
		<h1>Product Type: <?php echo $getAllInfoByEmployeeID['product_type']; ?></h1>
		<h1>Add a New Product in this Inventory.</h1>
		<form action="core/handleForms.php?staff_id=<?php echo $_GET['staff_id']; ?>" method="POST">
			<p>
				<label for="itemName">Product Name</label> 
				<input type="text" name="itemName">
			</p>
			<p>
				<label for="itemShade">Shade</label> 
				<input type="text" name="itemShade">
			</p>
			<p>
				<label for="price">Product Price</label> 
				<input type="number" name="price">
			</p>
			<p>
				<label for="dateExpired">Expiry Date</label> 
				<input type="text" name="dateExpired">
				<input type="submit" name="insertNewProductBtn">
			</p>
		</form>
	</div>
	
	<div class="container">
		<table style="width:100%; margin-top: 50px;">
		<tr>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Shade</th>
			<th>Product Price</th>
			<th>Expiry Date</th>
			<th>Date Added</th>
			<th>Action</th>
		</tr>
		<?php $getProductByEmployee = getProductByEmployee($pdo, $_GET['staff_id']); ?>
		<?php foreach ($getProductByEmployee as $row) { ?>
		<tr>
			<td><?php echo $row['stock_id']; ?></td>	  	
			<td><?php echo $row['item_name']; ?></td>	  	
			<td><?php echo $row['item_shade']; ?></td>	  
			<td><?php echo $row['price']; ?></td>		
			<td><?php echo $row['date_expired']; ?></td>	  	
			<td><?php echo $row['date_added']; ?></td>
			<td>
				<a href="editproduct.php?stock_id=<?php echo $row['stock_id']; ?>&staff_id=<?php echo $_GET['staff_id']; ?>">Edit</a>

				<a href="deleteproduct.php?stock_id=<?php echo $row['stock_id']; ?>&staff_id=<?php echo $_GET['staff_id']; ?>">Delete</a>
			</td>	  	
		</tr>
		<?php } ?>
	</div>
	</table>

	
</body>
</html>