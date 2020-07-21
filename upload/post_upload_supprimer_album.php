<?php
	require '../db/header.php';
	$DB = new DB();
	$_SESSION['success'] = '';

	if(isset($_POST["submit"])) {
		$numeroAlbum = $_POST['numeroAlbum'];
		$DB->queryInsert("DELETE FROM `album` WHERE `id` = '" . $numeroAlbum . "'");
		session_start();
		$_SESSION['success'] = "Album numéro " . $numeroAlbum . " supprimé";
    	header('Location: upload.php');
    }
?>