<?php
	require '../db/header.php';
	$DB = new DB();
	$_SESSION['success'] = '';

	var_dump($_POST);

	// On créer l'album
	if(isset($_POST["submit"])) {
		$titreAlbum = $_POST['titreAlbum'];
		$descriptionAlbum = $_POST['descriptionAlbum'];
		$DB->queryInsert("INSERT INTO `album`(`titre`, `description`) VALUES ('" . $titreAlbum . "', '" . $descriptionAlbum . "')");

    	// On récupère l'id pour relier les photos à l'album
    	$querylastAlbumId = $DB->query("SELECT MAX(id) FROM album");
		$lastAlbumId = $querylastAlbumId[0] -> {'MAX(id)'};
	} else {
	 session_start();
	 $_SESSION['error'] = "Erreur, pas de post";

	 //header('Location: upload.php');
	}


	// On relie les photos à l'album
	if (isset($_FILES['photosAlbum']) && isset($lastAlbumId)) {	  
    $file_ary = reArrayFiles($_FILES['photosAlbum']);

    $position = 0;
    foreach ($file_ary as $file) {

    	$position = $position + 1 ;
		$uploadOk = 1;
    	$target_dir = "../img/gallery/albums/";
		$target_file = $target_dir . basename($file['name']);
		$imageFileType = strtolower(pathinfo($file['name'] ,PATHINFO_EXTENSION));

    	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		    echo "Désolé, seulement les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
		    $uploadOk = 0;
		} else {
		    if (move_uploaded_file($file['tmp_name'], $target_file)) {
		    	$file_name_uploaded = basename($file['name']);
		    	$page = 'photos';
				$DB->queryInsert("INSERT INTO `photo`(`file_name`, `page`, `position`, `album`) VALUES ('" . $file_name_uploaded . "', '" . $page . "'," . (string)$position ."," . (string)$lastAlbumId . ")");
				session_start();
		    	$_SESSION['success'] = $_SESSION['success'] . "Le fichier". basename($file_name_uploaded). " a bien été upload. \n";
		    	header('Location: upload.php');
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
   	 }
	}


	function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;

	}

?>