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

?>
