<?php

/*
File for all short function which are usefull on the project.
*/

function validateDate($date, $format = 'Y-m-d H:i:s')
{
  $d = DateTime::createFromFormat($format, $date);
  return $d && $d->format($format) == $date;
}

function showCategorieList()
{
  include("func/connection.php");
  $q = $conn->prepare("SELECT * FROM Categories");
  $r = $q->execute();

  while ($row = $q->fetch())
  {
      echo '<li><a href="index.php?categorie=' . $row[0] . '">' . $row[1] . '</a></li>';
  }
}

function showUserSection()
{
  session_start();
  if (isset($_SESSION['id']) AND isset($_SESSION['login']))
  {
    echo '<li><a href="account.php"><span class="glyphicon glyphicon-user"></span> ' . $_SESSION['login'] .'</a></li>';
    echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>';
  }
  else
  {
    echo '<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>';
    echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>';
  }
}

function showVideoLikeSusbscribe($idVideo)
{
  include("func/connection.php");
  session_start();

  $idEmission = 0;
  $querry = 'SELECT idEmission FROM Episodes WHERE idEpisode = '.$idVideo;
  $q = $conn->prepare($querry);
  $q->execute();
  $row = $q->fetch();
  $idEmission = $row[0];

  if (isset($_SESSION['id']) AND isset($_SESSION['login']))
  {
    if(!isXSubOfY($_SESSION['id'],$idEmission))
      echo '<a href="preference.php?id='.$idEmission.'&a=1" type="button" class="btn btn-success">S\'abonner à l\'émission</a>';
    else
      echo '<a href="preference.php?id='.$idEmission.'&a=2" type="button" class="btn btn-warning">Se désabonner de l\'émission</a>';

    echo '     ';


    if(!isXFanOfY($_SESSION['id'],$idVideo))
      echo '<a href="preference.php?id='.$idVideo.'&a=3" type="button" class="btn btn-primary">Ajouter la vidéo aux favoris</a>';
    else
      echo '<a href="preference.php?id='.$idVideo.'&a=4" type="button" class="btn btn-danger">Supprimé la vidéo des favoris</a>';
  }
}

function isXSubOfY($idUser, $idEmission)
{
  include("func/connection.php");
  $querry = "SELECT * FROM Subscribe WHERE idUser = ".$idUser." AND idEmission = ".$idEmission;
  $q = $conn->prepare($querry);
  $q->execute();

  if($q->rowCount() > 0)
    return true;
  else
    return false;
}

function isXFanOfY($idUser, $idVideo)
{
  include("func/connection.php");
  $querry = "SELECT * FROM Favorite WHERE idUser = ".$idUser." AND idEpisode = ".$idVideo;
  $q = $conn->prepare($querry);
  $q->execute();

  if($q->rowCount() > 0)
    return true;
  else
    return false;
}

?>
