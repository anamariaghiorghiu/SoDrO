<?php
 include_once 'header.php';
?>

	<div class="manage-account-content">
		<h2>Soft Drink Organizer</h2>
		<h3>a sip of ingeniosity.</h3>
		<h4>Manage account</h4>
		<div>
			<ul>
				<li> </li>
				<li> 
					<img src="images/userPic_logo.png" alt="userPic_logo" class="user-logo"> 
				</li>	
			</ul>
			<ul>
				<li>
					<img src="images/userReg_logo.png" alt="userReg_logo" class="reg-logo">
					<input type="text" name="uid" placeholder="Change your first name" required>
				</li>
				<li> <button class="Bio"> No bio yet </button> </li>
			</ul>
			<ul>
				<li>	
					<img src="images/userReg_logo.png" alt="userReg_logo" class="reg-logo">
					<input type="text" name="uid" placeholder="Change your last name" required>
				</li>
				<li> <button type="upload_button"> Upload a profile picture </button> </li>
			</ul>
			<ul>
				<li>
					<img src="images/pass_logo.png" class="reg-logo">
					<input type="password" name= "pwd" placeholder="Change your password" required>
				</li>
				<li> <input type="text" name= "uid" placeholder="Change your bio" required> </li>
			</ul>
			<button class="save_button">Save changes</button>	
		</div>
	</div>
<?php
 include_once 'footer.php';
?>