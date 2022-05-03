<?php
require("functions.php");
$personal_first_name=$_POST['personal_first_name'];
$personal_last_name=$_POST['personal_last_name'];
$personal_county=$_POST['personal_county'];
$personal_city=$_POST['personal_city'];
$personal_adress=$_POST['personal_adress'];
$personal_mail=$_POST['personal_mail'];
$personal_phone=$_POST['personal_phone'];
$fiscal_first_name=$_POST['fiscal_first_name'];
$fiscal_last_name=$_POST['fiscal_last_name'];
$fiscal_county=$_POST['fiscal_county'];
$fiscal_city=$_POST['fiscal_city'];
$fiscal_adress=$_POST['fiscal_adress'];
$fiscal_mail=$_POST['fiscal_mail'];
$fiscal_phone=$_POST['fiscal_phone'];
$notes=$_POST['notes'];
$location=$_POST['location'];
$dress=$_POST['dress'];
$tipes="";
foreach ($_POST['type'] as $type)
{
	$tipes .= " ";
	$types .= $type;
}

$connect=mysqli_connect('localhost','root','','dreambig');
if(!$connect)
{ echo "Please try again later"; exit; }
$insert="INSERT INTO guest_booking (IDbooking,personal_first_name,personal_last_name,personal_county,personal_city,personal_adress,personal_mail,personal_phone,fiscal_first_name,fiscal_last_name,fiscal_county,fiscal_city,fiscal_adress,fiscal_mail,fiscal_phone,notes,location,dress,type)  VALUES('','$personal_first_name','$personal_last_name','$personal_county','$personal_city','$personal_adress','$personal_mail','$personal_phone','$fiscal_first_name','$fiscal_last_name','$fiscal_county','$fiscal_city','$fiscal_adress','$fiscal_mail','$fiscal_phone','$notes','$location','$dress','$types')";
if (mysqli_query($connect, $insert))
{
	echo $insert;
	send_booking_mail();
	echo '<script>alert("Booking Successful! ")</script>';
	//header('Location: /dreambig/index.html');
	sleep(2);
}
else 
{
	//header('Location: /DreamBig/profile.html');
	sleep(2);
}
?>