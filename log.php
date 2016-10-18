<?php
include("dodavanje.php");

session_start();
if(isset($_POST['submit'])){
	$username = $conn->real_escape_string($_POST['user']);
	$password = $_POST['pass'];
	if(!empty($username) && !empty($password)){
		if(proveraKorisnika($username, $password)){
			$_SESSION['username']=$username;
		}
		else{
			echo "Pogresan username ili password";
		}
	}
	else{
		echo "Niste uneli sve podatke";
	}
}

if(isset($_SESSION['username'])){
	echo "Ulogovani ste kao: ". $_SESSION['username'];
	echo '<a href="logout.php">Odjavi se</a></h2>';
}
?>
