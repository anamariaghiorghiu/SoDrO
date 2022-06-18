<?php
 include_once 'header.php';
?>
	<div class="loginContent">
		<h2>Soft Drink Organizer</h2>
		<h3>a sip of ingeniosity.</h3>
		<div class="login-form">
				<h4>Log In</h4>
				<form class="input-boxes" action="includes/login-inc.php" method="post">
					<div class="input-box">
						<img src="images/email_logo.png" class="reg-logo">
						<input type="text" name="uid" placeholder=" Email or Username" required>
					</div>
					<div class="input-box">
						<img src="images/pass_logo.png" class="reg-logo">
						<input type="password" name= "pwd" placeholder=" Password" required>
					</div>
					<div class="forgot-password"><a href="forgot_pasword.html">Forgot password?</a></div>
						<button class="submit-button" name="submit" type="submit">Log me in!</button>
				</form>

				<?php
				if(isset($_GET["error"])){
					if($_GET["error"] == "emptyInput"){
						echo "<p> Fill in all fields! </p>";
					}
					else if($_GET["error"] == "wrongUsername"){
						echo "<p> Invalid Email or Username! </p>";
					}
					else if($_GET["error"] == "wrongPassword"){
						echo "<p> Invalid password! </p>";
					}
				}
				?>
				
		</div>
		<img src="images/Pahar.png" class="pahar">

	</div>
<?php
 include_once 'footer.php';
?>