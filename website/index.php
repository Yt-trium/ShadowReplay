<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Shadow Replay - Navigation</title>
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
      <?php
        showUserSection();
      ?>
    </ul>
  </div>
</nav>

<?php
  // Gestion du numéro de page
  $page = 0;
  $categ = 0;

  if($_SERVER["REQUEST_METHOD"] == "GET")
  {
    $page = $_GET['page'];
    $categ = $_GET['categorie'];
  }

  if($page == "")
    $page = 0;
  if($categ == "")
    $categ = 0;
?>

<?php
  include("func/connection.php");
  if($categ == 0)
    $query = ("SELECT idEpisode, title FROM Episodes WHERE idEpisode > ". 15*$page." LIMIT 15");
  else
    $query = (" SELECT idEpisode, title FROM Episodes
                INNER JOIN Emissions ON Emissions.idEmission = Episodes.idEmission
                WHERE Emissions.idCategory = " . $categ . " AND idEpisode > ". 15*$page." LIMIT 15;");

  $q = $conn->prepare($query);
  $r = false;
  $r = $q->execute();

  $dataToShow = [];
  $i = 0;

  while ($row = $q->fetch())
  {
    $dataToShow[] = '<a href="video.php?id=' . $row[0] . '"><img class="img-responsive center-block center-block" src="img/vignette/' . $row[0] . '.png" alt="video 1">' . '<p>' . $row[1] . '</p></a>';
    $i++;
  }

  while($i < 15)
  {
    $dataToShow[] = '<img class="img-responsive center-block" src="img/vignette/video_1.png" alt="video 1">' . 'NO VIDEO';
    $i++;
  }
?>

<div class="container-fluid text-center">
  <!-- main page -->
  <div class="row main">
    <div class="col-sm-1 sidenav"></div>
    <div class="col-sm-3 vidcol">
      <?php
        echo $dataToShow[0];
        echo $dataToShow[3];
        echo $dataToShow[6];
        echo $dataToShow[9];
        echo $dataToShow[12];
      ?>
    </div>
    <div class="col-sm-3 vidcol">
      <?php
        echo $dataToShow[1];
        echo $dataToShow[4];
        echo $dataToShow[7];
        echo $dataToShow[10];
        echo $dataToShow[13];
      ?>
    </div>
    <div class="col-sm-3 vidcol">
      <?php
        echo $dataToShow[2];
        echo $dataToShow[5];
        echo $dataToShow[8];
        echo $dataToShow[11];
        echo $dataToShow[14];
      ?>
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
        <?php
        if($page == 0)
          echo '<li class="disabled"><a href="index.php?page=' . $page . '&categorie=' . $categ . '">' . '<' . '</a></li>';
        else
          echo '<li><a href="index.php?page=' . ($page-1) . '&categorie=' . $categ . '">' . '<' . '</a></li>';

        echo '<li class="active"><a href="index.php?page=' . $page . '">' . $page . '</a></li>';
        echo '<li><a href="index.php?page=' . ($page+1) . '&categorie=' . $categ . '">' . '>' . '</a></li>';
        ?>
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
