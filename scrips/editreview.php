<?php
	require("functions.php");
	$con=mysqli_connect('localhost','root','','dreambig');
	if(!$con)
	{ echo "Please try again later"; exit; }
	$uname=$_POST['user'];
	$title=$_POST['title'];
	$text=$_POST['feedback'];
	
	$insert="INSERT INTO feedback (username,title,text) values('$uname','$title','$text')";
	if (mysqli_query($con, $insert))
	{
		echo '<script>alert("Feedback added! ")</script>';
		header("Location: /dreambig/scrips/geteditfeedback.php");
	}
	else{
		echo '<script>alert("Try again! ")</script>';
		header("Location: /dreambig/profile.php");
	}


?>