<?php
include("dodavanje.php");

if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['ime']) && !empty($_POST['prezime']) && !empty($_POST['email']) && !empty($_POST['telefon'])) {
	$ime=$_POST['ime'];
	$prezime=$_POST['prezime'];
	$email=$_POST['email'];
	$telefon=$_POST['telefon'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	
	dodavanjeKorisnika($user, $pass, $ime, $prezime, $email, $telefon);
	header("Location: index.html");
	
}
else{	
	echo "Podaci nisu validni";
}
}
?>