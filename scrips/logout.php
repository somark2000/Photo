<?php
session_start();
if($_SESSION["loggedin"]!=true){
	header('Location: /dreambig/index.html');
	exit;
}
session_destroy();
// Redirect to the login page:
header('Location: /dreambig/index.html');
exit;
?>