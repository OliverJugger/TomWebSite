<?php
require '../db/header.php';
$DB = new DB();
if(!isset($_SESSION)){session_start();}

// Le message d'accueil de la page d'accueil
$message1 = $DB->query("SELECT * FROM message WHERE page='accueil' ORDER BY position");

// La photo principale de la page d'accueil
$photoPrincipaleAccueil = $DB->query("SELECT * FROM photo WHERE page='principaleAccueil'");
// La photo principale de la page des photos
$photoPrincipalePhotos = $DB->query("SELECT * FROM photo WHERE page='principalePhotos'");
// La photo principale de la page des videos
$photoPrincipaleVideos = $DB->query("SELECT * FROM photo WHERE page='principaleVideos'"); 

// La position des photos dans la page d'accueil
$maxPosition = $DB->query("SELECT MAX(position) FROM photo");

$array = $DB->query("SELECT * FROM photo WHERE page='accueil' ORDER BY position");

$array2 = $DB->query("SELECT * FROM video WHERE page='video' ORDER BY position");

// Pour ajouter photos à un album
$arrayAlbums = $DB->query("SELECT distinct(album) FROM photo");


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

     <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <title>Page d'administration</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

      <!-- Custom styles for this template -->
    <link href="theme_connexion.css" rel="stylesheet">
    <link href="uploadStyleVideos.css" rel="stylesheet">    
  </head>

  <body>

    <div id="formUpload" class="container text-center">
      
    <h1 class="h1 mb-1 font-weight-normal">Administration des photos du site</h1>
    <h2 class="text-success"><?php if(isset($_SESSION['success'])){echo ($_SESSION['success']); session_destroy();} ?></h2>
    <br/>

    <a href="../index.php" target="_blank"> <i class="fa fa-arrow-left"></i> Retour au site</a>

    <h3> Page d'accueil </h3>

    <div class="container upload_container">
      <h4> 1- Message d'accueil </h4>
        <div class="row text-center">
          <div class="col-md-12">
            <form class="form-signin" action="post_message_accueil.php" method="post" enctype="multipart/form-data">
                    <textarea style="width : 100%;" name="nouveauMessage" type="text"><?= $message1[0] -> {'message'} ?></textarea>
                    <input class="btn btn-primary submitButton" type="submit" name="submit" value="Mettre à jour">
              </form>
          </div>
        </div>
      </div>

      <div class="container upload_container">
      <h4> 2 - Changer de photo d'accueil principale </h4>
        <div class="row text-center">
          <div class="col-md-12">
            <p style="text-decoration: underline;"> Photo principale actuelle </p>
            <img src="<?="../img/gallery/" . $photoPrincipaleAccueil[0] -> {'file_name'}?>" alt="" loading="lazy">
            <form class="form-signin" action="post_upload_photo_principale.php" method="post" enctype="multipart/form-data">
                  <input type="file" name="fileToUploadAjouter" id="fileToUploadAjouter">
                  <br/>
                  <input class="btn btn-primary submitButton" type="submit" name="submit" value="Upload">
            </form>
          </div>
        </div>
      </div>

      <div class="container upload_container">
      <h4> 3 - Ajouter une photo à l'accueil</h4>
        <div class="row text-center">
          <div class="col-md-12">
            <form class="form-signin" action="post_upload.php" method="post" enctype="multipart/form-data">
                  <input type="file" name="fileToUploadAjouter" id="fileToUploadAjouter">
                  <br/>
                  <input class="btn btn-primary submitButton" type="submit" name="submit" value="Upload">
                  <p> Le fichier s'ajoutera à la suite des autres (derniere position).</p>
            </form>
          </div>
        </div>
      </div>


      </div>

    <div class="fonctionnalite">
      <div class="text-center">
        <h4> 4 - Inserver une position </h4>
      </div>
          <ul id="myGallery">
              <?php 
              for ($i=0; $i < count($array); $i++) { 
              ?> 
              <li>
                 <div class="single-welcome-post bg-img item1 wow fadeInUp" data-wow-delay="300ms">
                              <!-- Play Button -->
                              <a href="#" class="video-play-btn"> <?= $array[$i] -> {'position'} ?></a>
                  </div>
                  <img src="<?="../img/gallery/" . $array[$i] -> {'file_name'}?>" alt="" loading="lazy">
                 
              </li>
              <?php
              }
              ?>
                <li></li>
          </ul>
        <div class="container upload_container inverserForm">
          <div class="row text-center">
            <div class="col-md-12">
              <form class="form-signin" action="post_inserver.php" method="post" enctype="multipart/form-data">
                    <input name="position1" type="text" placeholder="Position image 1">
                    <input name="position2" type="text" placeholder="Position image 2">
                    <br/>
                    <input class="btn btn-primary submitButton" type="submit" name="submit" value="Inverser">
                    <p> La position des deux images sera inversée (position = ordre d'apparition).</p>
              </form>
            </div>
          </div>
        </div>
      </div>

    <br/>
    <h3> Page réalisations photo </h3>
	<div class="container upload_container">
      <h4> 1 - Changer de photo principale </h4>
        <div class="row text-center">
          <div class="col-md-12">
            <p style="text-decoration: underline;"> Photo principale actuelle </p>
            <img src="<?="../img/gallery/" . $photoPrincipalePhotos[0] -> {'file_name'}?>" alt="" loading="lazy">
            <form class="form-signin" action="post_upload_photo_principale_photos.php" method="post" enctype="multipart/form-data">
                  <input type="file" name="fileToUploadAjouter" id="fileToUploadAjouter">
                  <br/>
                  <input class="btn btn-primary submitButton" type="submit" name="submit" value="Upload">
            </form>
          </div>
        </div>
      </div>

    <div class="container upload_container">
        <div class="row text-center">
          <div class="col-md-6">
      		<h4> 2 - Ajouter photo(s) à un album</h4>
            <form class="form-signin" action="post_upload_video.php" method="post" enctype="multipart/form-data">
                  <input type="file" name="fileToUploadAjouter" id="fileToUploadAjouter">
                  <br/>
                  <input name="titre" class="form-control" type="text" placeholder="Titre votre vidéo ici">
                  <input name="description" class="form-control" type="text" placeholder="Description de votre vidéo ici">
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Album
                    </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php for ($i=0;$i<count($arrayAlbums);$i++)
                          { ?>
                          <a class="dropdown-item" href="#">
                            <?= $arrayAlbums[$i] -> {'album'}?>
                          </a>
                        <?php } ?>
                      </div>
                  </div>
                  
                  </select>
                  <br/>
                  <input class="btn btn-primary submitButton" type="submit" name="submit" value="Upload">
                  <p> La/les photo(s) s'ajouteront à la suite des autres de l'album (derniere position).</p>
            </form>
          </div>
          <div class="col-md-6">
          	<h4> 3 - Créer un album</h4>
            <form class="form-signin" action="post_upload_creer_album.php" method="post" enctype="multipart/form-data">

                  <input name="titreAlbum" class="form-control" type="text" placeholder="Titre de l'album" />
                  <input name="descriptionAlbum" class="form-control" type="text" placeholder="Description de l'album" />

                  <label class="btn btn-primary submitButton" for="filesAlbum" class="btn">Sélectionner plusieurs fichiers</label><br />
  				  <input id="filesAlbum" name="photosAlbum[]" type="file" multiple style="visibility:hidden;"/><br />
                  <input class="btn btn-primary submitButton" type="submit" name="submit" value="Upload">
                  <p> Créer un album avec les photos dans l'ordre de selection. Les photos n'auront pas de description/titre</p>
            </form>
          </div>
        </div>
      </div>
    <h3> Page réalisations vidéos </h3>
    <div class="container upload_container">
      <h4> 1 - Changer de photo principale </h4>
        <div class="row text-center">
          <div class="col-md-12">
            <p style="text-decoration: underline;"> Photo principale actuelle </p>
            <img src="<?="../img/gallery/" . $photoPrincipaleVideos[0] -> {'file_name'}?>" alt="" loading="lazy">
            <form class="form-signin" action="post_upload_photo_principale_videos.php" method="post" enctype="multipart/form-data">
                  <input type="file" name="fileToUploadAjouter" id="fileToUploadAjouter">
                  <br/>
                  <input class="btn btn-primary submitButton" type="submit" name="submit" value="Upload">
            </form>
          </div>
        </div>
      </div>

    <div class="container upload_container">
      <h4> 2 - Ajouter un lien vidéo Youtube </h4>
        <div class="row text-center">
          <div class="col-md-12">
            <form class="form-signin" action="post_upload_video.php" method="post" enctype="multipart/form-data">
                  <input name="videoURL" class="form-control" type="text" placeholder="URL de votre vidéo ici">
                  <input name="titre" class="form-control" type="text" placeholder="Titre votre vidéo ici">
                  <input name="description" class="form-control" type="text" placeholder="Description de votre vidéo ici">
                  <br/>
                  <input class="btn btn-primary submitButton" type="submit" name="submit" value="Upload">
                  <p> La vidéo s'ajoutera à la suite des autres (derniere position).</p>
            </form>
          </div>
        </div>
      </div>

    <p class="mt-5 mb-3 text-muted">&copy;  Site Officiel Tom NL - 2020</p>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>    

    <script src="../js/main.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>