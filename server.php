<?php
	
	$username ="";
	$email ="";
	$errors = array();

	//connection to the database
	$db = mysqli_connect('localhost','root','','registration');


	//after clicking register button

	if(isset($_POST['register'])){
		$username = mysql_real_escape_string($_POST['username']);
		$email = mysql_real_escape_string($_POST['email']);
		$password_1 = mysql_real_escape_string($_POST['password_1']);
		$password_2 = mysql_real_escape_string($_POST['password_2']);
	
		//checking form fields are filled
		if(empty($username)){
			array_push($errors, "Username is required");
		}
		if(empty($email)){
			array_push($errors, "Email is required");
		}
		if(empty($password_1)){
			array_push($errors, "Password is required");
		}
		if($password_1 != $password_2){
			array_push($errors, "Passwords does not match");
		}

		if(count($errors)== 0){
			//encrypting password
			$password = md5($password_1);

			//sql
			$sql = "INSERT INTO users (username,email,password) 
						VALUES('$username', '$email', '$password'))";
			mysqli_query($db, $sql);
		}
	}

?>