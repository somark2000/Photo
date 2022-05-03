<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update</title>
<link href="CSS/login.css" rel="stylesheet" type="text/css">
</head>

<?php
	session_start();
	require("functions.php");
	if(isset($_SESSION['Username']))
		{
			$userdata=saveuserdata(getID($_SESSION['Username']));
?>
	
<body>
	<form action="update_result.php" method="post">
	  <h1 align="center">Update!</h1>
		<div class="imgcontainer">
		<img src="images/avatar.png" alt="Avatar" class="avatar">
	  </div>

	  <div class="container">
		<label for="uname"><b>Username</b></label>
		<input type="text" value="<?php echo $userdata['Username'] ?>" name="uname" required><br>
		  
		<label for="email"><b>E-mail</b></label>
		<input type="email" value="<?php echo $userdata['Email'] ?>" name="email" required>
			
		<label for="tipus"><b>Travel Type</b></label>
		<select name="tipus" required>
			<option name="tipus" <?php if($userdata['Type']=="Backpack")  echo 'selected' ?> value="Backpack">Backpack</option>
			<option name="tipus" <?php if($userdata['Type']=="City-break")  echo 'selected' ?> value="City-break">City-break</option>
			<option name="tipus" <?php if($userdata['Type']=="All-inclusive")  echo 'selected' ?> value="All-inclusive">All-inclusive</option>
			<option name="tipus" <?php if($userdata['Type']=="Mid-range")  echo 'selected' ?> value="Mid-range">Mid-range</option>
			<option name="tipus" <?php if($userdata['Type']=="Extreme")  echo 'selected' ?> value="Extreme">Extreme</option>
		</select>
		<br>
		<label for="acc"><b>Account Type</b></label>
		<select name="acc" required>
			<option name="acc" value="Traveller">Traveller</option>  
			<option name="acc" value="Blogger">Blogger</option>
		</select>
		<button type="submit">Update</button>
	  </div>
	</form>
</body>
	<?php } ?>
</html>