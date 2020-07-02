<?php
	require '../db/header.php';
	$DB = new DB();

	if(isset($_POST["submit"])) {	   
    	$nouveauMessage = $_POST['nouveauMessage'];

    	$DB->query("UPDATE `message` SET `message` = '" . $nouveauMessage . "' WHERE `page` = 'accueil'");
    	session_start();
    	$_SESSION['success'] = "Message mis à jour";
    	header('Location: upload.php');
	}
?>