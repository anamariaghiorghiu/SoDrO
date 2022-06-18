<?php
 include_once 'header.php';
?>
	<div class="registerContent">
		<h2>Soft Drink Organizer</h2>
		<h3>a sip of ingeniosity.</h3>
		<div class="register-form">
				<h4>Register</h4>
				<form class="input-boxes" action="includes/register-inc.php" method="post">
					<div class="input-box">
						<img src="images/userReg_logo.png" class="reg-logo">
						<input type="text" name="name" placeholder=" Full name" required>
					</div>
					<div class="input-box">
						<img src="images/email_logo.png" class="reg-logo">
						<input type="text" name="email" placeholder=" Email address" required>
					</div>
					<div class="input-box">
						<img src="images/userReg_logo.png" class="reg-logo">
						<input type="text" name="uid" placeholder=" Username" required>
					</div>
					<div class="input-box">
						<img src="images/pass_logo.png" class="reg-logo">
						<input type="password" name="pwd" placeholder=" Password" required>
					</div>
					<div class="input-box">
						<img src="images/pass_logo.png" class="reg-logo">
						<input type="password" name="pwdRepeat" placeholder=" Repeat Password" required>
					</div>
						<button class="submit-button" type="submit" name="submit">Sign me in!</button>
				</form>
				
				<?php
				if(isset($_GET["error"])){
					if($_GET["error"] == "emptyInput"){
						echo "<p> Fill in all fields! </p>";
					}
					else if($_GET["error"] == "invalidUid"){
						echo "<p> Invalid username! </p>";
					}
					else if($_GET["error"] == "invalidEmail"){
						echo "<p> Invalid email! </p>";
					}
					else if($_GET["error"] == "pwdMatchFalse"){
						echo "<p> Passwords don't match! </p>";
					}
					else if($_GET["error"] == "stmtFailed"){
						echo "<p> Something went wrong, try again! </p>";
					}
					else if($_GET["error"] == "uidOrEmailExists"){
						echo "<p> Username or Email already exists! </p>";
					}
					else if($_GET["error"] == "none"){
						echo "<p> Signup succesful! </p>";
					}
				}
				?>

		</div>
		<img src="images/Pahar.png" class="pahar">
	</div>
<?php
 include_once 'footer.php';
?>