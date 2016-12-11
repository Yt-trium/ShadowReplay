<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Shadow Replay - Accueil</title>
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
          <li><a href="index.php?categorie=1">Categorie 1</a></li>
          <li><a href="index.php?categorie=2">Categorie 2</a></li>
          <li><a href="index.php?categorie=3">Categorie 3</a></li>
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
    <div class="col-sm-3 vidcol">
      <img class="img-responsive center-block center-block" src="img/vignette/video_1.png" alt="video 1">
      Text 1
      <img class="img-responsive center-block" src="img/vignette/video_1.png" alt="video 1">
      Text 2
      <img class="img-responsive center-block" src="img/vignette/video_1.png" alt="video 1">
      Text 3
      <img class="img-responsive center-block" src="img/vignette/video_1.png" alt="video 1">
      Text 4
    </div>
    <div class="col-sm-3 vidcol">
      <img class="img-responsive center-block" src="img/vignette/video_1.png" alt="video 1">
      Text 1
      <img class="img-responsive center-block" src="img/vignette/video_1.png" alt="video 1">
      Text 2
      <img class="img-responsive center-block" src="img/vignette/video_1.png" alt="video 1">
      Text 3
      <img class="img-responsive center-block" src="img/vignette/video_1.png" alt="video 1">
      Text 4
    </div>
    <div class="col-sm-3 vidcol">
      <img class="img-responsive center-block" src="img/vignette/video_1.png" alt="video 1">
      Text 1
      <img class="img-responsive center-block" src="img/vignette/video_1.png" alt="video 1">
      Text 2
      <img class="img-responsive center-block" src="img/vignette/video_1.png" alt="video 1">
      Text 3
      <img class="img-responsive center-block" src="img/vignette/video_1.png" alt="video 1">
      Text 4
    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS 1</p>
      </div>
      <div class="well">
        <p>ADS 2</p>
      </div>
      <div class="well">
        <p>ADS 3</p>
      </div>
      <div class="well">
        <p>ADS 4</p>
      </div>
      <div class="well">
        <p>ADS 5</p>
      </div>
    </div>
  </div>

  <!-- pagination row -->
  <div class="row pagination_row">
    <div class="col-sm-1 sidenav"></div>
    <div class="col-sm-9 pagination_col">
      <ul class="pagination">
        <li class="disabled"><a href=""><</a></li>
        <li class="active"><a href="index.php">1</a></li>
        <li><a href="index.php?page=2">2</a></li>
        <li><a href="index.php?page=3">3</a></li>
        <li><a href="index.php?page=2">></a></li>
      </ul>
    </div>
    <div class="col-sm-2 sidenav"></div>
  </div>

</div>

<!-- footer -->
<footer class="container-fluid text-center">
  <p>© 2016-2017 ShadowReplay - Cyril Meyer - Julien Hetzlen</p>
</footer>

</body>
</html>