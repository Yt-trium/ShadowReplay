<?php

$db_servername = "*";
$db_username   = "+";
$db_password   = "-";

try
{
  $conn = new PDO("mysql:host=$db_servername;dbname=shadow_replay", $db_username, $db_password);
  // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}


?>
