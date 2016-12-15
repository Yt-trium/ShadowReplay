<?php
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']))
	{
		include("func/connection.php") ;
		// Hachage du mot de passe
    $username = $password = "";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = sha1($password);
		// Vérification des identifiants
    $q = $conn->prepare('SELECT idUser FROM Users WHERE login = :login AND password = :password');
    $q->bindParam(':login',$username);
    $q->bindParam(':password',$password);
		$q->execute();

		$resultat = $q->fetch();

		if (!$resultat)
		{
			echo '<h1  style=\'color:#009933\'>- Username or password incorrect -</h1></br>' ;
		}
		else
		{
			session_start();
			$_SESSION['id'] = $resultat[0];
			$_SESSION['login'] = $login;
			echo '<h1  style=\'color:#009933\'>-  Connected -</h1></br>' ;
			echo '<meta http-equiv="refresh" content="0; url=index.php" />';
		}
	}
?>
