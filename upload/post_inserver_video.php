<?php
	require '../db/header.php';
	$DB = new DB();

	$maxPosition = $DB->query("SELECT MAX(position) FROM video");

	$keyMaxPosition = key($maxPosition[0]);
	$valueMaxPosition = ((int)$maxPosition[0] -> $keyMaxPosition) + 1;


	echo( $_POST['position1']);
	echo( $_POST['position2']);

	if(isset($_POST["submit"])) {	   
    	$position1 = $_POST['position1'];
    	$position2 = $_POST['position2'];

		$id = $DB->query("SELECT `id` FROM `video` WHERE `position` = '" . $position1 . "'");
		$keyid = key($id[0]);
		$valueid = ((int)$id[0] -> $keyid);

    	$DB->query("UPDATE `video` SET `position` = '" . $position1 . "' WHERE `position` = '" . $position2 . "'");
    	$DB->query("UPDATE `video` SET `position` = '" . $position2 . "' WHERE `position` = '" . $position1 . "' AND `id` = '" . $valueid . "'");

    	session_start();
    	$_SESSION['success'] = "Positions mises à jour";
    	header('Location: upload.php');
	}
?>