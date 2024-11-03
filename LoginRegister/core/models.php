<?php 

require_once 'dbConfig.php';

function insertNewUser($pdo, $username, $password, $first_name, $last_name, $gender, $department, $position) {
    $checkUserSql = "SELECT * FROM USER WHERE username = ?";
    $checkUserSqlStmt = $pdo->prepare($checkUserSql);
    $checkUserSqlStmt->execute([$username]);

    if ($checkUserSqlStmt->rowCount() == 0) {
        $sql = "INSERT INTO USER (username, password, first_name, last_name, gender, department, position) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $executeQuery = $stmt->execute([$username, $password, $first_name, $last_name, $gender, $department, $position]);

        if ($executeQuery) {
            $_SESSION['message'] = "User successfully registered";
            return true;
        } else {
            $_SESSION['message'] = "An error occurred during registration";
        }
    } else {
        $_SESSION['message'] = "Username already exists";
    }
}

function loginUser($pdo, $username, $password) {
    $sql = "SELECT * FROM USER WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);

    if ($stmt->rowCount() == 1) {
        $userInfoRow = $stmt->fetch();
        $usernameFromDB = $userInfoRow['username']; 
        $passwordFromDB = $userInfoRow['password'];

        if (password_verify($password, $passwordFromDB)) {
            $_SESSION['username'] = $usernameFromDB;
            $_SESSION['user_id'] = $userInfoRow['user_id'];
            $_SESSION['message'] = "Login successful!";
            return true;
        } else {
            $_SESSION['message'] = "Password is invalid, but user exists";
        }
    } else {
        $_SESSION['message'] = "Username doesn't exist in the database. You may consider registering first";
    }
} 

function insertEmployee($pdo, $product_category, $product_type, $product_des) {

	$sql = "INSERT INTO employee (product_category, product_type, product_des) VALUES(?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$product_category, $product_type, $product_des]);

	if ($executeQuery) {
		return true;
	}
}

function getAllEmployee($pdo) {
	$sql = "SELECT * FROM employee";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getEmployeeByID($pdo, $staff_id) {
	$sql = "SELECT * FROM employee WHERE staff_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$staff_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateEmployee($pdo, $product_category, $product_type, $product_des, $staff_id, $user_id) {

	$sql = " UPDATE employee
				SET product_category = ?,
					product_type = ?,
					product_des = ?,
					last_updated = NOW(), 
					last_updated_by = ? 
				WHERE staff_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$product_category, $product_type, $product_des, $user_id, $staff_id]);
	
	if ($executeQuery) {
		return true;
	}

}

function deleteEmployee($pdo, $staff_id) {
	$deleteEmployProd = "DELETE FROM product WHERE staff_id = ?";
	$deleteStmt = $pdo->prepare($deleteEmployProd);
	$executeDeleteQuery = $deleteStmt->execute([$staff_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM employee WHERE staff_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$staff_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}


function insertProduct($pdo, $item_name, $item_shade, $price, $date_expired, $staff_id) {
	$sql = "INSERT INTO product (item_name, item_shade, price, date_expired, staff_id) VALUES (?,?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$item_name, $item_shade, $price, $date_expired, $staff_id,]);
	if ($executeQuery) {
		return true;
	}

}

function getProductByEmployee($pdo, $staff_id) {
	
	$sql = "SELECT 
				product.stock_id AS stock_id,
				product.item_name AS item_name,
				product.item_shade AS item_shade,
				product.price AS price,
				product.date_expired AS date_expired,
				product.date_added AS date_added

			FROM product
			JOIN employee ON product.staff_id = employee.staff_id
			WHERE product.staff_id = ? 
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$staff_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getAllInfoByEmployeeID($pdo, $staff_id) {
	$sql = "SELECT * FROM employee WHERE staff_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$staff_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function getAllUsers($pdo) {
    $sql = "SELECT * FROM USER";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getUserByID($pdo, $user_id) {
    $sql = "SELECT * FROM USER WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$user_id]);

    if ($executeQuery) {
        return $stmt->fetch();
    }
}



function getProductByID($pdo, $stock_id) {
	$sql = "SELECT 
				product.stock_id AS stock_id,
				product.item_name AS item_name,
				product.item_shade AS item_shade,
				product.price AS price,
				product.date_expired AS date_expired
				
			FROM product
			JOIN employee ON product.staff_id = employee.staff_id
			WHERE product.stock_id  = ? 
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$stock_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}


function updateProduct($pdo, $item_name, $item_shade, $price, $date_expired, $stock_id, ) {
	$sql = "UPDATE product
			SET item_name = ?,
				item_shade = ?,
				price = ?,
				date_expired = ?
			WHERE stock_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$item_name, $item_shade, $price, $date_expired, $stock_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteProduct($pdo, $stock_id) {
	$sql = "DELETE FROM product WHERE stock_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$stock_id]);

	if ($executeQuery) {
		return true;
	}
}

?>