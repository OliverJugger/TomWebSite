<?php
	require '../db/header.php';
	$DB = new DB();

	$maxPosition = $DB->query("SELECT MAX(position) FROM video");
	$array = $DB->query("SELECT * FROM video WHERE page='accueil' ORDER BY position");

	$keyMaxPosition = key($maxPosition[0]);
	$valueMaxPosition = ((int)$maxPosition[0] -> $keyMaxPosition) + 1;


	if(isset($_POST["submit"])) {	   
    	$video = $_POST['videoURL'];
    	$titre = $_POST['titre'];
    	$description = $_POST['description'];
		$page = 'video';
		$position = $valueMaxPosition;

		parse_str( parse_url( $video, PHP_URL_QUERY ), $my_array_of_vars );
		$videoID = $my_array_of_vars['v'];


		$DB->queryInsert("INSERT INTO `video`(`video_name`, `titre`, `description`, `page`, `position`) VALUES ('" . $videoID . "', '" . $titre . "', '" . $description . "', '" . $page . "'," . (string)$position .")");

    	$_SESSION['success'] = "Video upload avec succes";
    	header('Location: upload.php');
	}
?>