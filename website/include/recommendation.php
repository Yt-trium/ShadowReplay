
<?php
  // Gestion du numéro de page
  $page = 0;
  if($_SERVER["REQUEST_METHOD"] == "GET")
  {
    $page = $_GET['page'];
  }
  if($page == "")
    $page = 0;
  include("func/connection.php");

  $query = ("SELECT Favorite.idEpisode, title FROM Episodes
             INNER JOIN Favorite ON Episodes.idEpisode = Favorite.idEpisode
             INNER JOIN Users ON Favorite.idUser = Users.idUser
             WHERE Users.idUser = ".$_SESSION['id']." LIMIT 15;");

  $q = $conn->prepare($query);
  $r = false;
  $r = $q->execute();

  $dataToShow = [];
  $i = 0;

?>
