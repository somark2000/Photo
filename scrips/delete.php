<?php
	$con=mysqli_connect('localhost','root','','dreambig');
	if(!$con)
	{ echo "Please try again later"; exit; }
	$id=$_REQUEST["id"];
	echo $id;
	$delete="delete from feedback where IDfeedback=".$id;
	if (mysqli_query($con, $delete))
	{
		echo '<script>alert("Feedback deleted! ")</script>';
		header("Location: /dreambig/scrips/geteditfeedback.php");
	}
	else{
		echo '<script>alert("Try again! ")</script>';
		header("Location: /dreambig/profile.php");
	}
?>