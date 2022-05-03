<?php


$con=mysqli_connect('localhost','root','','dreambig');

$username=$_POST['uname'];
$passwor=$_POST['psw'];

$query=mysqli_query($con,"SELECT * FROM `userdata` WHERE `username`='$username'");
$numrow=mysqli_num_rows($query);

if($numrow>0)
{
	
	while($row=mysqli_fetch_assoc($query))
	{
		$db_username = $row['username'];
		$db_password = $row['password'];
		$db_registered=$row['registered'];
		$db_admin=$row['admin'];
	}
	//echo $db_registered;
	if($username==$db_username && $passwor==$db_password&&$db_registered==1)
	{
		session_start();
		$_SESSION['username']=$db_username;
		$_SESSION['loggedin']=true;
		echo 'as';
		if($db_registered==0)
		{
			echo $db_registered;
			echo '<script>alert("Please confirm e-mail first! ")</script>';
			header('Location: /dreambig/login.html');
		}
		if($db_admin==1)
		{
			header('Location: /dreambig/admib_profile.php');
			exit;
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