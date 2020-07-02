<?php
require '../db/header.php';
$DB = new DB();
if(!isset($_SESSION)){session_start();}

$maxPosition = $DB->query("SELECT MAX(position) FROM photo");

$array = $DB->query("SELECT * FROM photo WHERE page='accueil' ORDER BY position");

$array2 = $DB->query("SELECT * FROM video WHERE page='video' ORDER BY position");

$arrayAlbums = $DB->query("SELECT distinct(album) FROM photo");

$message1 = $DB->query("SELECT * FROM message WHERE page='accueil' ORDER BY position");


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

     <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">

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
    <h3> Page d'accueil </h3>

    <div class="container upload_container">
      <h4> Message d'accueil </h4>
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
      <h4> Ajouter </h4>
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
        <h4> Inserver une position </h4>
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
      <h4> Ajouter </h4>
        <div class="row text-center">
          <div class="col-md-12">
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
                  <p> La photo s'ajoutera à la suite des autres dans son album (derniere position).</p>
            </form>
          </div>
        </div>
      </div>
    <h3> Page réalisations vidéos </h3>
    <div class="container upload_container">
      <h4> Ajouter </h4>
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

      <h4> TEST </h4>

       <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="carousel-item">
              <img src="../img/gallery/test_2.jpg" alt="">
              <div class="carousel-caption d-none d-md-block">
                <h5>OK1</h5>
                <p>Desription1</p>
              </div>
            </div>
        </div>
        <div class="carousel-item">
          <div class="carousel-item">
              <img src="../img/gallery/test_2.jpg" alt="">
              <div class="carousel-caption d-none d-md-block">
                <h5>OK2</h5>
                <p>Description2</p>
              </div>
            </div>
        </div>
        <div class="carousel-item">
          <div class="carousel-item">
              <img src="../img/gallery/test_2.jpg" alt="">
              <div class="carousel-caption d-none d-md-block">
                <h5>OK3</h5>
                <p>Description3</p>
              </div>
            </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
      

    <p class="mt-5 mb-3 text-muted">&copy;  Site Officiel Tom NL - 2020</p>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>    

    <script src="../js/main.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>