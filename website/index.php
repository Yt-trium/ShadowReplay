<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Shadow Replay - Navigation</title>
  <?php include("include/head.php"); ?>
</head>
<body>

<?php include("include/navbar.php");?>

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

<div class="container-fluid text-center">
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

  include("include/showVideo.php");
?>
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

<?php include("include/footer.php");?>

</body>
</html>
