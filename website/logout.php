<?php
session_start();
$_SESSION = array();
session_destroy();
?>
<meta http-equiv="refresh" content="0; url=index.php" />
<p><a href="index.php">Retourner sur le site</a></p>
