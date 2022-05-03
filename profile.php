<?php
	session_start();
	require("scrips/functions.php");
	if(isset($_SESSION['username']))
		{	
			
			$userdata=saveuserdata(getID($_SESSION['username']));
			//echo($username['First_name']);
			
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Profile</title>
<link href="css/profile.css" type="text/css" rel="stylesheet">
</head>

<body>
	<div class="navbar">
		<a href="index.html">Home</a>
		<div class="navbar_left">
			<a href="scrips/logout.php">Log 0ut</a>
			<a href="forum.php">Forum</a>
			<a >EN</a>
			<div class="search-container">
		    <form style="margin-right: 12px;" action="scrips/search.php" method="post">
		  	  <input type="text" placeholder="Search for a bloger" name="search">
		  	<button type="submit"><img src="images/search.png" alt="search" height="25px"></button>
		    </form>
			</div>
		</div>
	</div>
		<div name="main container" style="width: 100%;">
		<div id="profile_photo">
		  <img src="scrips/profile_pic/<?php  echo $userdata['ID'] ?>/<?php echo $userdata['photo'] ?>" alt="Profile picture" width="100%" style="text-align:center;" align="middle">
			<br><br>
			<h2>Personal info</h2><hr width="95%" align="left">
			<table cellspacing="5px;" cellpadding="3px;">
			<tr>
				<td><h3>Username: </h3></td>
				<td><?php echo $userdata['username']; ?></td>
			</tr>
			<tr>
				<td><h3>E-mail: </h3></td>
				<td><?php echo $userdata['email']; ?></td>
			</tr>
			
			<tr>
				<td colspan="2">
				<form action="dbc.php">
					<button type="submit" class="but">Edit Details</button>
				</form></td>
			</tr>
		  </table>
		</div>
		<div id="personal_data">
			<h1 style="font-size: 40pt; color: black; text-align: left;"><?php echo $userdata['firstname']." ".$userdata['lastname']; ?></h1><hr width="95%" align="left">
			<br><br>
			<a href="photoshoot.html"><button class="but">Book now!</button></a>
			<br><br>
			<h2> My Reviews:</h2>
			
			<?php
				//for list out all saved posts
				echo "tbd";
			?>
			<div id="forrm">
			<form action="scrips/review.php" method="post"  id="forrm">
				<label ><b>Title</b></label><br>
				<input type="text" name="title" placeholder="Title" required>
				<label ><b>Your feedback</b></label><br>
				<textarea name="feedback" placeholder="Your feedback message here..." required wrap="physical" cols="56" rows="9"></textarea>
				<input type="hidden" name="user" value="<?php echo $userdata['username']?>" readonly>
				<button type="submit" class="but">Submit</button>
			</form>
			</div>
			<a href="feedbacks.html"><button class="but">View Feedbacks</button></a>
			
		</div>
		
		</div>				
<?php
	
	}

?>
</div>
</body>
</html>