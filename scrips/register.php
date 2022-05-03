<?php
require("functions.php");
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$uname=$_POST['username'];
$pass=$_POST['password'];
$email=$_POST['email'];
$lastID=lastID()+1;
mkdir("profile_pic",0777,true);
mkdir("profile_pic/$lastID",0777,true);
$target = "profile_pic/$lastID/";
$target = $target . basename( $_FILES['photo']['name']); 

$photo=($_FILES['photo']['name']); 
$connect=mysqli_connect('localhost','root','','dreambig');
if(!$connect)
{ echo "Please try again later"; exit; }
$insert="INSERT INTO userdata (firstname,lastname,username,password,email,photo,IDuser)  VALUES('$fname','$lname','$uname','$pass','$email','$photo','')";
if(move_uploaded_file($_FILES['photo']['tmp_name'],$target))
{
	if (mysqli_query($connect, $insert))
	{
		send_registration_mail($lastID);
		echo '<script>alert("Registration Successful! ")</script>';
		header('Location: /dreambig/index.html');
		sleep(2);
	}
}
	else 
	{
		//header('Location: /DreamBig/profile.html');
		sleep(2);
	}
?>