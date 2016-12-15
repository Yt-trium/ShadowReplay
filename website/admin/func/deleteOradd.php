<?php


function delDataTable($nomT,$idName,$idData)
{
	include("connection.php") ;
	$requete ='delete from '.$nomT.' where '.$idName.' = '.$idData.' ;';
	echo $requete.'<br/>' ;
	$q = $conn->prepare($requete);
	$r = $q->execute();
	echo '<h1  style=\'color:#009933\'>- DATA HAD BEEN DELETE -</h1></br>' ;
	
}

