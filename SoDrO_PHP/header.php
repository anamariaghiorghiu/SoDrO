<?php
	session_start();
?>

<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SoDrO</title>
	<link rel="stylesheet" href="style.css">
	<title></title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>

<section id="header">
        <div id = "navbar_start">
            <img src="images/logo.png" class="logo" alt="logo">
            <h1>SoDrO</h1>
        </div>
        <div>
            <ul id="navbar">
		<?php
		if (isset($_SESSION["userid"])){
			echo "<li><a href='homepageLogin.php'>Home</a></li>";
                	echo "<li><a href='manage-account.php'>Profile</a></li>";
                	echo "<li><a href='includes/logout-inc.php'>Logout</a></li>";
		}else{
			echo "<li><a href='startPage.php'>Home</a></li>";
			echo "<li><a href='register.php'>Register</a></li>";
			echo "<li><a href='login.php'>Log in</a></li>";
			echo "<li><a href='profile.php'><img src='images/userpic_logo.png' class='userpiclogo' alt='userpiclogo'></a></li>";
		}
        ?>     
            </ul>
        </div>
        
        <div id="mobile">
            <img src="images/close.png" id="close" class="close_size" alt="close">
            <img src="images/bar.png" id="bar" class="bar_size" alt="bar">
        </div>
    </section>
    
    <script src="script.js"></script>
</body>
</html>