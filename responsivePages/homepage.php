<!DOCTYPE html>
<html>
<style>
body {
  background-color: lightgrey;
}

</style>
<body>

<center>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="w3-container w3-cyan">
  <h1>Welcome to the Homepage</h1> 
</div>

<?php
session_start();
if(isset($_SESSION['username'])){
	echo "Hello " . $_SESSION['username'] . ", where would you like to go?<br><br>";

	?>
<div class="w3-half">
	<form action="./checkUserExist.php">
    	Find Profile Page by Username: <input type="text" placeholder="Username" name="username"> 
	<input type="submit" value="Search" name="profileSearch"<br>
	</form>
</div>   
<div class="w3-half ">
<?php

	if(isset($_GET['check'])){
		echo "<br><b>Username does not exist. Please try again.</b><br>";
	}

	echo '<div class="w3-quarter "> <br><a href="profile.php">Your Profile</a></div>';

	echo '<div class="w3-quarter"> <a href="songDiscovery.php">Song Discovery</a></div>';

	echo '<div class="w3-quarter "><a href="songSearcher.php">Song Search</a></div>';

	echo '<div class="w3-quarter"> <a href="logout.php?logout">Logout</a></div>';
}
else{
	header("location:../loginPage.php");
}

?>
</div>
</center>

</body>
</html>
