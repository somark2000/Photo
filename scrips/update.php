<?php
	$con=mysqli_connect('localhost','root','','dreambig');
	if(!$con)
	{ echo "Please try again later"; exit; }
	$id=$_REQUEST["id"];
	$ti=$_REQUEST["ti"];
	$te=$_REQUEST["te"];
	echo $id." ";
	echo $ti." ";
	echo $te." ";
	$update="update `feedback` set `title`= '$ti',`text`='$te' where `IDfeedback`=".$id;
	if (mysqli_query($con, $update))
	{
		echo '<script>alert("Feedback updated! ")</script>';
		echo $update;
		header("Location: /dreambig/scrips/geteditfeedback.php");
	}
	else{
		echo '<script>alert("Try again! ")</script>';
		header("Location: /dreambig/admib_profile.php");
	}
?>