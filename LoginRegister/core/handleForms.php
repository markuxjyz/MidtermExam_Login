<?php  

require_once 'models.php';
require_once 'dbConfig.php';

function validateFields($fields) {
    foreach ($fields as $field) {
        if (empty($field)) {
            return false;
        }
    }
    return true;
}

if (isset($_POST['registerUserBtn'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $position = $_POST['position'];

    if (validateFields([$username, $password, $first_name, $last_name, $gender, $department, $position])) {
        $insertQuery = insertNewUser($pdo, $username, $password, $first_name, $last_name, $gender, $department, $position);
        if ($insertQuery) {
            header("Location: ../login.php");
        } else {
            header("Location: ../register.php");
        }
    } else {
        $_SESSION['message'] = "Please make sure all input fields are filled out for registration!";
        header("Location: ../register.php");
    }
}

if (isset($_POST['loginUserBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (validateFields([$username, $password])) {
        $loginQuery = loginUser($pdo, $username, $password);
        if ($loginQuery) {
            header("Location: ../index.php");
        } else {
            header("Location: ../login.php");
        }
    } else {
        $_SESSION['message'] = "Please make sure all input fields are filled out for login!";
        header("Location: ../login.php");
    }
}

if (isset($_GET['logoutAUser'])) {
    unset($_SESSION['username']);
    unset($_SESSION['user_id']);
    header('Location: ../login.php');
    exit();
}


if (isset($_POST['insertEmployeeBtn'])) {

	if (!empty($_POST['productCategory']) && !empty($_POST['productType']) && !empty($_POST['productDes'])) {

		$query = insertEmployee($pdo , $_POST['productCategory'], $_POST['productType'], $_POST['productDes'], $_SESSION['user_id']);

		if ($query) {
			header("Location: ../index.php");
		}
		else {
			echo "Insertion failed";
		}

	}
	else {
		echo "Make sure that no input fields are empty!";
	}

}

if (isset($_POST['editEmployeeBtn'])) {

	if (!empty($_POST['productCategory']) && !empty($_POST['productType']) && !empty($_POST['productDes']) && !empty($_GET['staff_id'])) {

		$query = updateEmployee($pdo , $_POST['productCategory'], $_POST['productType'], $_POST['productDes'], $_GET['staff_id'], $_SESSION['user_id'] );

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Edit failed";
		}
	}

	else {
		echo "Make sure no input fields are empty before updating!";
	}

}


if (isset($_POST['deleteEmployeeBtn'])) {
	$query = deleteEmployee($pdo, $_GET['staff_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}

if (isset($_POST['insertNewProductBtn'])) {
	
	if (!empty($_POST['itemName']) && !empty($_POST['itemShade']) && !empty($_POST['price']) && !empty($_POST['dateExpired']) && !empty($_GET['staff_id'])) {

		$query = insertProduct($pdo, $_POST['itemName'], $_POST['itemShade'], $_POST['price'], $_POST['dateExpired'], $_GET['staff_id']);

		if ($query) {
			header("Location: ../viewproduct.php?staff_id=" .$_GET['staff_id']); 
		}
		else {
			echo "Insertion failed";
		}
	}
	else {
		echo "Please make sure all input fields are not empty before inserting a new project.";
	}

}


if (isset($_POST['editProductBtn'])) {

	if (!empty($_POST['itemName']) && !empty($_POST['itemShade']) && !empty($_POST['price']) && !empty($_POST['dateExpired']) && !empty($_GET['stock_id'])) {

		$query = updateProduct($pdo, $_POST['itemName'], $_POST['itemShade'], $_POST['price'], $_POST['dateExpired'], $_GET['stock_id']);

		if ($query) {
			header("Location: ../viewproduct.php?staff_id=" .$_GET['staff_id']); 
		}
		
		else {
			echo "Update failed";
		}

	}


}


if (isset($_POST['deleteProductBtn'])) {
	$query = deleteProduct($pdo, $_GET['stock_id']);

	if ($query) {
		header("Location: ../viewproduct.php?staff_id=" .$_GET['staff_id']); 
	}
	else {
		echo "Deletion failed";
	}
}


?>