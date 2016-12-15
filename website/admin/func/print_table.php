<?php
function printUserTable()
{
	include("connection.php") ;
	 if($_SERVER["REQUEST_METHOD"] == "POST")
    {
		  delDataTable("users","idUser",$_POST['del']) ;
	}
	$q = $conn->prepare("SELECT * FROM users");
	$r = $q->execute();
	echo '<table>' ;
	echo '<tr><th>Delete</th><th>idUser</th><th>Login</th><th>Password</th><th>Lastname</th><th>Firstname</th><th>Birthdate</th><th>Nationality</th><th>email</th><th>newsletter</th></tr>' ;
	while ($row = $q->fetch())
	{
		echo '<tr><td><form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?table='.$_GET['table'].'" method="post"><input type="submit" id="del" name="del" value="'.$row[0].'"> del<form></td><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[8].'</td><td>'.$row[6].'</td><td>'.$row[7].'</td></tr>' ;
	}
	
	echo '</table>' ;
}


function printVidTable()
{
	include("connection.php") ;
	if($_SERVER["REQUEST_METHOD"] == "POST")
    {
		  delDataTable("episodes","idEpisode",$_POST['del']) ;
		
	}	
	$q = $conn->prepare("SELECT * FROM episodes");
	$r = $q->execute();
	echo '<table>' ;
	echo '<tr><th>Delete</th><th>idVideo</th><th>Titre</th><th>Durée</th><th>Country</th><th>Format</th><th>FirstBroacast</th><th>LastBroadcast</th><th>idEmission</th><th>MultiLanguage</th></tr>' ;
	while ($row = $q->fetch())
	{
	echo '<tr><td><form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?table='.$_GET['table'].'" method="post"><input type="submit" id="del" name="del" value="'.$row[0].'"> del<form></td><td>'.$row[1].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[7].'</td><td>'.$row[8].'</td><td>'.$row[9].'</td></td><td>'.$row[6].'</td></tr>' ;
	}
	echo '</table>' ;
}

function printFavTable()
{
	include("connection.php") ;
	$q = $conn->prepare("SELECT * FROM favorite ");
	$r = $q->execute();
	echo '<table>' ;
	echo '<tr><th>Delete</th><th>idUser</th><th>idEpisode</th></tr>' ;
	while ($row = $q->fetch())
	{
		echo '<tr><td><form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?table='.$_GET['table'].'" method="post"><input type="submit" id="del" name="del" value="'.$row[0].'"> del<form></td><td>'.$row[0].'</td><td>'.$row[1].'</td></tr>' ;
	}
	
	echo '</table>' ;
}

function printEmmiTable()
{
	include("connection.php") ;
	if($_SERVER["REQUEST_METHOD"] == "POST")
    {
		  delDataTable("emissions","idEmission",$_POST['del']) ;
		
	}
	$q = $conn->prepare("SELECT * FROM emissions");
	$r = $q->execute();
	echo '<table>' ;
	echo '<tr><th>Delete</th><th>idEmission</th><th>Name</th><th>idCategorie</th></tr>' ;
	while ($row = $q->fetch())
	{
	echo '<tr><td><form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?table='.$_GET['table'].'" method="post"><input type="submit" id="del" name="del" value="'.$row[0].'"> del<form></td><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td></tr>' ;
	}
	
	echo '</table>' ;
}

function printCatTable()
{
	include("connection.php") ;
	if($_SERVER["REQUEST_METHOD"] == "POST")
    {
		  delDataTable("categories","idCategory",$_POST['del']) ;
		
	}
	$q = $conn->prepare("SELECT * FROM categories");
	$r = $q->execute();
	echo '<table>' ;
	echo '<tr><th>Delete</th><th>idCategory</th><th>Name</th></tr>' ;
	while ($row = $q->fetch())
	{
	echo '<tr><td><form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?table='.$_GET['table'].'" method="post"><input type="submit" id="del" name="del" value="'.$row[0].'"> del<form></td><td>'.$row[0].'</td><td>'.$row[1].'</td></tr>' ;
	}
	echo '</table>' ;
}







?>