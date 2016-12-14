
<?php
$return = "";
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    // Include database connection.
    include("func/connection.php");
    $username = $password = "";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = sha1($password);
    $q = $conn->prepare('SELECT idUser FROM Users WHERE login = :login AND password = :password');
    $q->bindParam(':login',$username);
    $q->bindParam(':password',$password);

    $q->execute();
    $r = $q->fetch();

    if (!$r)
    {
      $return = "<h1  style='color:#ff0000'>- Erreur lors de la connexion -</h1></br>";
    }
    else
    {
      session_start();
      $_SESSION['id'] = $r['idUser'];
      $_SESSION['login'] = $username;
      $return = "<h1  style='color:#009933'>- Vous êtes connecté -</h1></br>";
    }
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Shadow Replay - Connexion</title>
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
  <div class="row main">
    <div class="col-sm-1 sidenav"></div>
    <div class="col-sm-9 vidcol">
      <?php
        echo $return;
      ?>
    <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="form-group">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" class="form-control" id="username" name="username">
      </div>
      <div class="form-group">
        <label for="password">Mot de passe:</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <div class="checkbox">
        <label><input type="checkbox"> Se rappeler de moi</label>
      </div>
      <button type="submit" class="btn btn-default">Connexion</button>
    </form>
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
