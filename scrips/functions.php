<?php

function saveuserdata($id)
{
	$con=mysqli_connect('localhost','root','','dreambig');
	$a=array();
	$q=mysqli_query($con,"SELECT * FROM `userdata` WHERE `IDuser`='$id'");
	$numrow=mysqli_num_rows($q);
	if($numrow>0)
	{
	while($row=mysqli_fetch_assoc($q))
	{ 
		$a['username']=$row['username'];
		$a['firstname']= $row['firstname'];
		$a['lastname']= $row['lastname'];
		$a['email']= $row['email'];
		$a['photo']= $row['photo'];
		$a['ID']=$id;
	}
	return $a;
	}
	else echo "save error";
}

function getmail($id)
{
	$con=mysqli_connect('localhost','root','','dreambig');
	$a=array();
	$q=mysqli_query($con,"SELECT * FROM `guest_booking` WHERE `IDbooking`='$id'");
	$numrow=mysqli_num_rows($q);
	if($numrow>0)
	{
	while($row=mysqli_fetch_assoc($q))
	{ 
		$a['firstname']= $row['personal_first_name'];
		$a['lastname']= $row['personal_last_name'];
		$a['email']= $row['personal_mail'];
		$a['phone']= $row['personal_phone'];
		$a['ID']=$id;
	}
	return $a;
	}
}

function getID($username)
{
	echo $username;
	$con=mysqli_connect('localhost','root','','dreambig');
	$qu=mysqli_query($con,"SELECT `IDuser` FROM `userdata` WHERE `username`='$username'");
	$numrow=mysqli_num_rows($qu);
	if($numrow>0){
	while($row=mysqli_fetch_assoc($qu))
	{
		return $row['IDuser'];
	}}
	else echo "id error ";
}

function lastID()
{
	$con=mysqli_connect('localhost','root','','dreambig');
	$sql="SELECT IDuser FROM userdata ORDER BY IDuser DESC LIMIT 1;";
	$lastID=0;
	if (mysqli_connect_errno()) 
	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  	exit();
	}

	if($res=mysqli_query($con,$sql))
	{
		echo "as";
		$row=mysqli_fetch_array($res);
		$lastID=$row['IDuser'];
	}
	return $lastID;
}

function last_booking_ID()
{
	$con=mysqli_connect('localhost','root','','dreambig');
	$sql="SELECT IDbooking FROM guest_booking ORDER BY IDbooking DESC LIMIT 1;";
	$lastID=0;
	if (mysqli_connect_errno()) 
	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  	exit();
	}

	if($res=mysqli_query($con,$sql))
	{
		echo "as";
		$row=mysqli_fetch_array($res);
		$lastID=$row['IDbooking'];
	}
	return $lastID;
}

function send_registration_mail($IDuser)
{
	define("SITE_NAME", "Photo!");
	$user= saveuserdata($IDuser);
	$sub = "No-reply ".SITE_NAME;
	$mail_content = $user['firstname'] . ' ' . $user['lastname'] . ', thank you for registering to ' . SITE_NAME . ' 
			Please click the following link to finish your registration and confirm your mail: http://127.0.0.1/dreambig/first_login.html';

	$rec = $user['email'];
	echo $rec;
	echo $mail_content;
	mail($rec,$sub,$mail_content);
}

function send_booking_mail()
{
	define("SITE_NAME", "Photo!");
	$id=last_booking_ID();
	$booking=getmail($id);
	$sub = "No-reply ".SITE_NAME;
	$mail_content = $booking['firstname'] . ' ' . $booking['lastname'] . ', thank you for booking! 
			Soon you will be contacted by our team for confirmation on the number provided by you '. $booking['phone'];

	$rec = $user['email'];
	echo $rec;
	echo $mail_content;
	mail($rec,$sub,$mail_content);
}


?>