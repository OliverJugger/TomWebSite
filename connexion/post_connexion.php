<?php
require '../db/header.php';
$DB = new DB();
if (isset($_SESSION) ) {
	session_destroy();
	session_start();
}
else{
session_start();
}

$email = $_POST["email"];
$password = $_POST["password"];

$errors = array();

if(empty($email)){
	$errors['email'] = "Vous avez entré un email invalide";
}

if(empty($password)){
	$errors['password'] = "Vous avez entré un mot de passe invalide";
}

//$queryInsert = 'INSERT INTO authentification(`email`, `password`) VALUES ("' .$email. '","' .$md5Password. '");';
if(empty($errors)){
	$result = $DB->login($email,$password); 

	if($result == true){
		$_SESSION['SUCCESS'] = "Authentification réussie !";
	}
	if($result == false){
		$_SESSION['ERROR'] = "L'authentification a échoué." ;
	}
}
header('Location: upload\upload.php');
?>