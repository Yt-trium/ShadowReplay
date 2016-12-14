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

?>
