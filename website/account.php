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
  <?php
    // Include database connection.
    include("func/connection.php");

    // If data are posted, try to register someone
    // Init all vars to ""
    $username = $password = $email = $lastname = $firstname = "";
    $birthday = $nationality = $newsletter = "";
    $return = "";
    $error_str = "<h1  style='color:#ff0000'>- Erreur lors de l'inscription du nouvel utilisateur -</h1></br>";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email    = $_POST['email'];
      $lastname = $_POST['lastname'];
      $firstname= $_POST['firstname'];
      $birthday = $_POST['birthday'];
      $nationality=  $_POST['nationality'];
      $newsletter =  $_POST['newsletter'];

      /*
      Used for test : show all
      echo $username . " [] " . $password  . " [] " . $email . " [] " . $lastname
      . " [] " . $firstname  . " [] " . $birthday . " [] " . $nationality
      . " [] " .  $newsletter;
      */

      if(strlen($username) > 64 || $username == "")
      {
        $return = $error_str;
      }
      else if($password == "")
      {
        $return = $error_str;
      }
      else if(strlen($email) > 320 || $email == "")
      {
        $return = $error_str;
      }
      else if(strlen($lastname) > 64 || $lastname == "")
      {
        $return = $error_str;
      }
      else if(strlen($firstname) > 64 || $firstname == "")
      {
        $return = $error_str;
      }
      else if(!validateDate($birthday, 'Y-m-d'))
      {
        $return = $error_str;
      }
      else if(strlen($nationality) > 25 || $nationality == "Nationalité")
      {
        $return = $error_str;
      }
      else
      {
        if($newsletter == 'on')
        {
          $newsletter = 1;
        }
        else
        {
          $newsletter = 0;
        }

        $q = $conn->prepare("SELECT max(idUser) FROM Users");
        $r = false;
        $r = $q->execute();

        $id = $q->fetch();
        $id = $id[0]+1;

        $q = $conn->prepare("INSERT INTO Users(idUser, login, password, lastname, firstname, birth, email, newsletter, nationality) VALUES(:id, :username, :password, :lastname, :firstname, :birthday, :email, :newsletter, :nationality)");

        $q->bindParam(':id',$id);
        $q->bindParam(':username',$username);
        $q->bindParam(':password',$password);
        $q->bindParam(':lastname',$lastname);
        $q->bindParam(':firstname',$firstname);
        $q->bindParam(':birthday',$birthday);
        $q->bindParam(':email',$email);
        $q->bindParam(':newsletter',$newsletter);
        $q->bindParam(':nationality',$nationality);

        $r = false;
        $r = $q->execute();

        if($r)
        {
          $return = "<h1  style='color:#009933'>- Nouvel utilisateur inscrit -</h1></br>";
        }
        else
        {
          $return = $error_str;
        }
      }

    }
  ?>

  <div class="row main">
    <div class="col-sm-1 sidenav"></div>
    <div class="col-sm-9 vidcol">
      <?php
        echo $return;
      ?>
      <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <input type="text" class="form-control" id="username" name="username" value="<?php echo $username ?>"
          placeholder="Nom d'utilisateur"></br>
          <input type="password" class="form-control" id="password" name="password" value="<?php echo $password ?>"
          placeholder="Mot de passe"></br>

          <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>"
          placeholder="Email"></br>

          <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname ?>"
          placeholder="Nom"></br>
          <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname ?>"
          placeholder="Prénom"></br>

          <label for="birthday" align="left">Date de naissance:</label>
          <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo $birthday ?>"
          placeholder="Date de naissance (format aaaa-mm-dd exemple 1995-02-24)"></br>
          <label><input type="checkbox" id="newsletter" name="newsletter" checked>
          Inscription à la newsletter</label></br></br>

          <button type="submit" class="btn btn-default" id="submit">Inscription</button>
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
