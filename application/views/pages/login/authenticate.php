<?php
	//Start session
	session_start();
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$conn = mysqli_connect('localhost','root','@Password123','pharmxpress');
	if(!$conn) {
		die('Failed to connect to server: ' . mysqli_error());
	}
	
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str, $conn) {
		$str = trim($str);
		return mysqli_real_escape_string($conn, $str);
	}
	
	//Sanitize the POST values
	$login = clean($_POST['username'], $conn);
	$password = clean($_POST['password'], $conn);
	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: /dashboard/login");
		exit();
	}
	
	//Create query
	$query = "SELECT * FROM user WHERE username='$login'";
	$result = mysqli_query($conn, $query);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			$user = mysqli_fetch_assoc($result);
			if($user['password'] != $password) {
				$errmsg_arr[] = 'Password is incorrect';
				$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
				session_write_close();
				header("location: /dashboard/login");
				exit();
			} else {
        
				session_regenerate_id();
				$_SESSION['SESS_MEMBER_ID'] = $user['id'];
				$_SESSION['SESS_FIRST_NAME'] = $user['name'];
				$_SESSION['SESS_MEMBER_POSITION'] = $user['position'];
				session_write_close();
				header("location: ../");
				exit();
			}
		}else {
			$errmsg_arr[] = 'Username is incorrect';
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			session_write_close();
			header("location: /dashboard/login");
			exit();
		}
	}else {
		die("Query failed");
	}
?>