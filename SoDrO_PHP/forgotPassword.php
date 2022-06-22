<?php
 include_once 'header.php';
?>
	<div class="forgot-password-content">
		<h2>Soft Drinks Organizer</h2>
		<h3>a sip of ingeniosity.</h3>
		<div class="forgot-password-form">
			<h4><i>Forgot password?</i></h4>
            <h5> Introduce your valid email account so we can send your account information
                and all the steps required to reset your password. </h5>
			<form class="input-boxes" action="includes/forgot-password-inc.php" method="post">
				<div class="input-box">
					<img src="images/email_logo.png" alt="email_logo" class="reg-logo">
					<input type="text" name="uid" placeholder=" Email address" required>
				</div>
				<button class="submit-button" name="submit" type="submit">Submit</button>
			</form>

			<?php
			if(isset($_GET["error"])){
				if($_GET["error"] == "emptyInput"){
					echo "<p> Fill in all fields! </p>";
				}
				else if($_GET["error"] == "invalidEmail"){
					echo "<p> Invalid Email! </p>";
				}
			}
			?>	
		</div>
		<img src="images/Pahar.png" alt="pahar" class="pahar">
	</div>
<?php
 include_once 'footer.php';
?>