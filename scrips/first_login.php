<?php

$con=mysqli_connect('localhost','root','','dreambig');

$username=$_POST['uname'];
$passwor=$_POST['psw'];

$query=mysqli_query($con,"SELECT * FROM `userdata` WHERE `username`='$username'");
$numrow=mysqli_num_rows($query);

if($numrow>0)
{
	echo "a";
	while($row=mysqli_fetch_assoc($query))
	{
		echo "s";
		$db_username = $row['username'];
		$db_password = $row['password'];
		$db_registered=$row['registered'];
		echo $db_username;
	}
	//echo $db_registered;
	if($username==$db_username && $passwor==$db_password&&$db_registered==0)
	{
		echo "as";
		session_start();
		$_SESSION['username']=$db_username;
		$_SESSION["loggedin"]=true;
		
		if($db_registered==0)
		{
			echo "ass";
			$update="update userdata set registered = 1 where username= '$db_username'";
			mysqli_query($con,$update);
		}
				
		header('Location: /dreambig/profile.php');	
		exit;
	}
}
else{
	echo '<script>alert("Incorrect username or password! <br> Please try again! ")</script>';
	header('Location: /dreambig/login.html');
}

mysqli_close($con);
sleep(2);

?>