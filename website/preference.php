<?php
include("func/connection.php");
session_start();
$idContent = $action = "";
if (isset($_SESSION['id']) AND isset($_SESSION['login']))
{
  if($_SERVER["REQUEST_METHOD"] == "GET")
  {
    $idContent = $_GET['id'];
    $action = $_GET['a'];

    $idUser = $_SESSION['id'];

    if($action == 1)
    {
      // Ajouter abonnement
      $querry = "INSERT INTO Subscribe (idUser, idEmission) VALUES(:idUser, :idContent)";
      $q = $conn->prepare($querry);
      $q->bindParam(':idUser',$idUser);
      $q->bindParam(':idContent',$idContent);
    }
    else if($action == 2)
    {
      // Supprimer abonnement

    }
    else if($action == 3)
    {
      // Ajouter favoris
      $querry = "INSERT INTO Favorite (idUser, idEpisode) VALUES(:idUser, :idContent)";
      $q = $conn->prepare($querry);
      $q->bindParam(':idUser',$idUser);
      $q->bindParam(':idContent',$idContent);
    }
    else if($action == 4)
    {
      // Supprimer favoris

    }

    $q->execute();

  }
  echo '<meta http-equiv="refresh" content="0; url='.$_SERVER['HTTP_REFERER'].'"/>';
  echo '<p><a href="index.php">Retourner sur le site</a></p>';
}
else
{
  echo '<meta http-equiv="refresh" content="0; url=index.php"/>';
  echo '<p><a href="index.php">Retourner sur le site</a></p>';
}
?>
