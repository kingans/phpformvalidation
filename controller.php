<?php

require 'db.php';
session_start();

$error = array();// the error array holds all the errors in the form
$name = "";
$email = "";

//if user clicks on the sign up bottom this is what happens
//it checks if all the fields are empty in line 19

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$pass_2 = $_POST['pass_2'];

   // validation
	if (empty($name)){
		$error['name'] = "username required";
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error['email'] = "please put a valid email";

	}
	if (empty($email)){
		$error['email'] = "email required";
	}

	if (empty($pass)){
		$error['pass'] = "password required";
	}

	if($pass !== $pass_2){
		$error['pass'] = "the two password do not match";
	}

	// check if two users have the same email
 $emailquery = "SELECT * FROM users WHERE email=? LIMIT 1";
$stmt = $conn->prepare($emailquery);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$usercount = $result-> num_rows;

if ($usercount > 0){
	$error['email'] = "email already exists";
}

// this is what happen if there is no error, the information will be taken

if(count($error) === 0){

    $pass = password_hash($pass, PASSWORD_DEFAULT);

	$token = bin2hex(random_bytes(50));
	$verified = false;

	$sql = "INSERT INTO users(name, email, verify, token, password) VALUES('$name', '$email', '$verify', '$token', '$pass')";
	$users = mysqli_query($conn, $sql);


if($users){
  // login user, the session holds the information of the user so it can be seen on another page of the website
	$user_id = $conn->insert_id;
	$_SESSION['id'] = $user_id;
	$_SESSION['name'] = $name;
	$_SESSION['email'] = $email;
	$_SESSION['verify'] = $verify;

	//message
	$_SESSION['msg'] = "you are logged in";
	$_SESSION['alert-class'] = "alert-success";
   header('Location: homepage.php');
   exit(); 

} else {
   $error['db_error'] = 'Date failed to register';
}


}


}

//user login code
if(isset($_POST['login'])){
	$name = $_POST['name'];
	$pass = $_POST['pass'];

   // validation
	if (empty($name)){
		$error['name'] = "username required";
	}
	
	if (empty($pass)){
		$error['pass'] = "password required";
	}


	if(count($error) === 0) {
$sql = "SELECT * FROM users WHERE email=? OR name=? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $name, $name);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (password_verify($pass, $user['password'])) {
//login
	$_SESSION['id'] = $user['id'];
	$_SESSION['name'] = $user['name'];
	$_SESSION['email'] = $user['email'];
	$_SESSION['verify'] = $user['verify'];

	//message
	$_SESSION['msg'] = "you are logged in";
	$_SESSION['alert-class'] = "alert-success";
   header('Location: homepage.php');
   exit();
}
else{
	$error['login_fall'] = "wrong credential";
}
}
}


//logout

if(isset($_GET['logout'])) {
	session_destroy();

	unset($_SESSION['id']);
	unset($_SESSION['name']);
	unset($_SESSION['email']);
	unset($_SESSION['verify']);
  
  header('Location: login.php');
  exit();
}