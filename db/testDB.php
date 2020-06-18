<?php     
require 'header.php';
$tout = $DB->query("SELECT * FROM oeuvres");
var_dump($tout);

foreach($tout as $item){
echo $item->nom;
}
?>