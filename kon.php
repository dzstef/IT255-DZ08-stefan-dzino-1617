<?php

$servername="localhost";
$username="root";
$password="root";
$database="domaci8";

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
	die("Greska pri konekciji". $conn->connect_error);
}


?>