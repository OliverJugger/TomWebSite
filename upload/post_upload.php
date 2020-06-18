<?php
	require '../db/header.php';
	$DB = new DB();

	$maxPosition = $DB->query("SELECT MAX(position) FROM photo");
	$array = $DB->query("SELECT * FROM photo WHERE page='accueil' ORDER BY position");

	$keyMaxPosition = key($maxPosition[0]);
	$valueMaxPosition = ((int)$maxPosition[0] -> $keyMaxPosition) + 1;

	$target_dir = "../img/gallery/";
	$target_file = $target_dir . basename($_FILES["fileToUploadAjouter"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		
	    $check = getimagesize($_FILES["fileToUploadAjouter"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }

		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}

		// Contrainte de memoire
		/*if ($_FILES["fileToUploadAjouter"]["size"] > 900000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		} */

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUploadAjouter"]["tmp_name"], $target_file)) {

		    	$file_name_uploaded = basename($_FILES["fileToUploadAjouter"]["name"]);
		    	$page = 'accueil';
		    	$position = $valueMaxPosition;
				$DB->queryInsert("INSERT INTO `photo`(`file_name`, `page`, `position`) VALUES ('" . $file_name_uploaded . "', '" . $page . "'," . (string)$position .")");

		    	$_SESSION['success'] = "The file ". basename( $_FILES["fileToUploadAjouter"]["name"]). " has been uploaded.";
		    	header('Location: upload.php');
		        //echo "The file ". basename( $_FILES["fileToUploadAjouter"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
	}
?>