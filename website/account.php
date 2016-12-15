<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Shadow Replay - Compte</title>
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
    <ul class="nav navbar-nav">
      <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
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

<div class="container-fluid text-center">
  <!-- main page -->
  <?php
    // Include database connection.
    include("func/connection.php");

    $username = $password = $email = $lastname = $firstname = "";
    $birthday = $nationality = $newsletter = "";

    $q = $conn->prepare("SELECT * FROM Users WHERE idUser = ".($_SESSION['id'])."");
    $r = $q->execute();
    $row = $q->fetch();

    $username    = $row[1];
    $password    = $row[2];
    $lastname    = $row[3];
    $firstname   = $row[4];
    $birthday    = $row[5];
    $email       = $row[6];
    $newsletter  = $row[7];
    $nationality = $row[8];
  ?>

  <div class="row main">
    <div class="col-sm-1 sidenav"></div>
    <div class="col-sm-9 vidcol">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nom du champ</th>
            <th>Informations Utilisateurs</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Login</td>
            <td><?php echo $username ?></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><?php echo $password ?></td>
          </tr>
          <tr>
            <td>Last Name</td>
            <td><?php echo $lastname ?></td>
          </tr>
          <tr>
            <td>First Name</td>
            <td><?php echo $firstname ?></td>
          </tr>
          <tr>
            <td>Birthday</td>
            <td><?php echo $birthday ?></td>
          </tr>
          <tr>
            <td>Email</td>
            <td><?php echo $email ?></td>
          </tr>
          <tr>
            <td>Nationality</td>
            <td><?php echo $nationality ?></td>
          </tr>
          <tr>
            <td>Newsletter</td>
            <td><?php echo $newsletter ?></td>
          </tr>
        </tbody>
      </table>
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
</div>

<!-- footer -->
<footer class="container-fluid text-center">
  <p>© 2016-2017 ShadowReplay - Cyril Meyer - Julien Hetzlen</p>
</footer>

</body>
</html>
