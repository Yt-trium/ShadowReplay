

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>admin Replay - Navigation</title>
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
      <a class="navbar-brand" href="index.php">AdminReplay</a>
    </div>
    <!-- navbar menu -->
    <ul class="nav navbar-nav">
    <?php
    session_start();
		if (isset($_SESSION['id']))
		{
			include("tablemanagement.php") ;
		}
    ?>
  </div>
</nav>

<div class="container-fluid text-center">
  <!-- main page -->
<?php include("connect.php") ; ?>

<?php

	if (!isset($_GET['table']) && !isset($_SESSION['id']) )
	{
		include("connexion.php") ;
	}
	else
	{
		if (isset($_GET['table']))
		{
			include("func/deleteOradd.php") ;
			include("func/print_table.php") ;
			$t=$_GET['table'] ;
			if($t==0)
			{
				include("users.php") ;
			}
			if($t==1)
			{
				include("vid.php") ;
			}
			if($t==2)
			{
				include("fav.php") ;
			}
			if($t==3)
			{
				include("emmi.php") ;
			}
			if($t==4)
			{
				include("cat.php") ;
			}
		}
	}

?>

</div>
<!-- footer -->
<footer class="container-fluid text-center">
  <p>© 2016-2017 ShadowReplay - Cyril Meyer - Julien Hetzlen</p>
</footer>

</body>
</html>
