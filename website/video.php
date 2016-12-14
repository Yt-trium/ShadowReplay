<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Shadow Replay - Visionnage</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>

<!-- navbar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- navbar header -->
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">ShadowReplay</a>
    </div>
    <!-- navbar menu -->
    <ul class="nav navbar-nav">4
      <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <span class="glyphicon glyphicon-list"></span> Catégories
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <?php
          include("func/miscellaneous.php");
          showCategorieList();
        ?>
        </ul>
      </li>
    </ul>
    <!-- navbar login -->
    <ul class="nav navbar-nav navbar-right">
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
    </ul>
  </div>
</nav>

<div class="container-fluid text-center">
  <!-- main page -->
  <div class="row main">
    <div class="col-sm-1 sidenav"></div>
    <div class="col-sm-9 vidcol">
      <?php
        // Include database connection.
        include("func/connection.php");

        $id = "";

        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
          $id = $_GET['id'];
        }
      ?>
      <video width="100%" height="100%" controls>
       <source src="vid/<?php echo $id ?>.mp4" type="video/mp4">
     Your browser does not support the video tag.
     </video>
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <img class="img-responsive center-block" src="img/ads/halter.png" alt="ads h">
      </div>
      <div class="well">
        <img class="img-responsive center-block" src="img/ads/halter.png" alt="ads h">
      </div>
    </div>
  </div>

</div>

<!-- footer -->
<footer class="container-fluid text-center">
  <p>© 2016-2017 ShadowReplay - Cyril Meyer - Julien Hetzlen</p>
</footer>

</body>
</html>
