<?php
   require '../db/header.php';
   $DB = new DB();
   header('content-type: text/css');
   ob_start('ob_gzhandler');
   header('Cache-Control: max-age=31536000, must-revalidate');

   $array = $DB->query("SELECT * FROM photo WHERE page='photo' ORDER BY position");

	// La photo principale de la page d'accueil
	$photoPrincipaleAccueil = $DB->query("SELECT * FROM photo WHERE page='principaleAccueil'");

	// La photo principale de la page des photos
	$photoPrincipalePhotos = $DB->query("SELECT * FROM photo WHERE page='principalePhotos'");


  // La photo principale de la page des photos
  $photoPrincipaleVideos = $DB->query("SELECT * FROM photo WHERE page='principaleVideos'");
?>

.bradcam_bg_1 {
  background-image: url(../img/gallery/<?= $photoPrincipalePhotos[0] -> {'file_name'} ?> );
}

.slider_bg_1 {
  background-image: url(../img/gallery/<?= $photoPrincipaleAccueil[0] -> {'file_name'} ?>);
}

.slider_bg_2 {
  background-image: url(../img/gallery/<?= $photoPrincipaleVideos[0] -> {'file_name'} ?>);
}

.carrousselImageDescription {
	color : #fff;
}