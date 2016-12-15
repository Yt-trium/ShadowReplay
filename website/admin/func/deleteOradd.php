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

function addDataTable()
{	// Include database connection.
	include("func/connection.php");

	// If data are posted, try to register someone
	// Init all vars to ""
	$username = $password = $email = $lastname = $firstname = "";
	$birthday = $nationality = $newsletter = "";
	$return = "";
	$error_str = "<h1  style='color:#ff0000'>- Erreur lors de l'inscription du nouvel utilisateur -</h1></br>";

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) and isset($_POST['lastname'])
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email    = $_POST['email'];
			$lastname = $_POST['lastname'];
			$firstname= $_POST['firstname'];
			$birthday = $_POST['birthday'];
			$nationality=  $_POST['nationality'];
			$newsletter =  $_POST['newsletter'];

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
				$password_hash = sha1($password);

				$q = $conn->prepare("SELECT max(idUser) FROM Users");
				$r = false;
				$r = $q->execute();

				$id = $q->fetch();
				$id = $id[0]+1;

				$q = $conn->prepare("INSERT INTO Users(idUser, login, password, lastname, firstname, birth, email, newsletter, nationality) VALUES(:id, :username, :password, :lastname, :firstname, :birthday, :email, :newsletter, :nationality)");

				$q->bindParam(':id',$id);
				$q->bindParam(':username',$username);
				$q->bindParam(':password',$password_hash);
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

}
