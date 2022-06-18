<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SoDrO</title>
	<link rel="stylesheet" href="style.css">
	<title></title>
</head>
<body>
<div class="container">
	<div class="topnav">
		<img src="images/logo.png" class="logo">
		<h1>SoDrO</h1>
		<nav>
			<ul>
				<li><a href="startPage.php">Home</a></li>
				<?php
				if (isset($_SESSION["userid"])){
					echo "<li><a href='profile.php'>Profile</a></li>";
					echo "<li><a href='includes/logout-inc.php'>Log out</a></li>";
				}
				else {
					echo "<li><a href='register.php'>Register</a></li>";
					echo "<li><a href='login.php'>Log in</a></li>";
				}
				?>
			</ul>
		</nav>
		<img src="images/userpic_logo.png" class="logo_user">
	</div>
	