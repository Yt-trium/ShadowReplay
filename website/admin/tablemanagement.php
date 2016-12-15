<li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
	<span class="glyphicon glyphicon-list"></span> Management Tables
	<span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><a href="index.php?table=0"> User</a></li>
		<li><a href="index.php?table=1"> Video</a></li>
		<li><a href="index.php?table=2"> Favoris</a></li>
		<li><a href="index.php?table=3"> emission</a></li>
		<li><a href="index.php?table=4"> categorie</a></li>
	</ul>
	<?php
	  session_start();
	  if (isset($_SESSION['id']))
	  {
	    echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>';
	  }
		?>
</li>
