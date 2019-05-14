<?php include 'db.php';?>
<?php session_start();?>
<?php
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$username = mysqli_real_escape_string($conn,$username);
	$password = mysqli_real_escape_string($conn,$password);

	$select_query = "SELECT * FROM users WHERE username = '{$username}'";
	$select_results = mysqli_query($conn,$select_query);
	if(!$select_results){
		die("QUERY FAILED ".mysqli_error($conn));
	}
	while($rows = mysqli_fetch_array($select_results)){
		$user_id = $rows['user_id'];
		$user_username = $rows['username'];
		$user_firstname = $rows['user_firstname'];
		$user_lastname = $rows['user_lastname'];
		$user_password = $rows['user_password'];
		$user_email = $rows['user_email'];
		$user_role = $rows['user_role'];
	}
	$password = crypt($password,$user_password);
	if($username === $user_username && $password === $user_password) {
		$_SESSION['username'] = $user_username;
		$_SESSION['firstname'] = $user_firstname;
		$_SESSION['lastname'] = $user_lastname;
		$_SESSION['email'] = $user_email;
		$_SESSION['role'] = $user_role;
		header("Location: ../admin");
	} else {
		header("Location: ../index.php");
	}
}

?>