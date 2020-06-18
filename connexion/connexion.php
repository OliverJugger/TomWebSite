<?php
if(!isset($_SESSION)){session_start();}
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

    <title>Authentification</title>

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


    <!-- Custom styles for this template -->
    <link href="connexion.css" rel="stylesheet">
  </head>

  <body class="text-center">

    <div class="container">
    <?php session_destroy(); 
    if(isset($_SESSION['SUCCESS'])) { ?>
    <div id="divSuccess" class="alert alert-success" role="alert">
    <?=  $_SESSION['SUCCESS'] ?>
    </div>
    <?php } ?>

    <?php if(isset($_SESSION['ERROR'])){ ?>
    <div id="divAlert" class="alert alert-danger" role="alert">
      <?=  $_SESSION['ERROR'] ?>
    </div>
    <?php } ?>

    <form class="form-signin" action="post_connexion.php" method="post">
      <!-- <img class="mb-4" src="../img/oeuvres/sculpture3.jpg" alt="" width="72" height="72"> -->
      <h1 class="h3 mb-3 font-weight-normal">Connectez Vous</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Adresse mail" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="password"  placeholder="Mot de passe" required>
      <button id="authentification" class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
      <p class="mt-5 mb-3 text-muted">&copy; Tom NL Site Officiel - 2020</p>
    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="connexion.js"></script>
  </body>
</html>