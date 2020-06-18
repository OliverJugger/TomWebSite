<?php
   require '../db/header.php';
   $DB = new DB();
   header('content-type: text/css');
   ob_start('ob_gzhandler');
   header('Cache-Control: max-age=31536000, must-revalidate');

   $array = $DB->query("SELECT * FROM photo WHERE page='photo' ORDER BY position");
?>

.bradcam_bg_1 {
  background-image: url(<?='"../img/bois.jpg"'?>);
}