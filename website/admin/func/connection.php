<?php
$db_servername = "localhost";

try
{
  $conn = new PDO("mysql:host=$db_servername;dbname=shadow_replay", $db_username, $db_password
  ,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}

?>
