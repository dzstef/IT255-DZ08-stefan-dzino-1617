<?php
include("kon.php");

function dodavanjeKorisnika($username, $pass, $ime, $prezime, $email, $telefon){
	global $conn;
	
	if(!proveraImena($username)){
		$insert = "INSERT INTO registracija(username, passw, ime, prezime, email, telefon) VALUES (?,?,?,?,?,?)";
		$query = $conn->prepare($insert);
		$query->bind_param('ssssss', $username, $pass, $ime, $prezime, $email, $telefon);
		$query->execute();
		$query->close();
		if($conn->query($insert) === TRUE){
			echo "Kreirano uspesno";
		}
		else{
			"Greska" . $conn->error;
		}
	}
	else{
		echo "Korisnicko ime postoji!";
	}
}

function proveraImena($username){
	global $conn;
	$select = "SELECT * FROM registracija where username=?";
	$query = $conn->prepare($select);
	$query->bind_param('s', $username);
	$query->execute();
	$query->store_result();
	if($query->num_rows > 0){
		return true;
	}
	else{
		return false;
	}
	$query->close();
}

function proveraKorisnika($username, $password){
	global $conn;
	$select = "SELECT * FROM registracija where username=? AND passw=?";
	$query = $conn->prepare($select);
	$query->bind_param('ss', $username, $password);
	$query->execute();
	$query->store_result();
	if($query->num_rows > 0){
		return true;
	}
	else{
		return false;
	}
	$query->close();
}
?>