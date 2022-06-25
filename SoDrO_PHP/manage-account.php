<?php
 	include_once 'header.php';
 	include "classes/DatabaseHandler.php";
    include "classes/Users.php";
    include "classes/UsersView.php";

    if(isset($_SESSION["userid"])){
    	$usersView = new UsersView($_SESSION["userid"]);
    	$name = $usersView->getUsersName();
    	$uid = $usersView->getUsersUid();
    	$email = $usersView->getUsersEmail();
    	$bio = $usersView->getUsersBio(); 
    }
    else{
    	header("location: login.php?error=notLoggedIn");
        exit();
    }

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
					<?php
					echo "<input type='text' name='uid' value='".$name['name']."' placeholder='Change your first name' required>";
					?>
				</li>
				<li> <button class="Bio"> 
					<?php 
						if($bio['bio']==null){
							echo "No bio yet";
						}
						else{
							echo $bio['bio'];
						}
					?>
			 	</button> </li>
			</ul>
			<ul>
				<li>	
					<img src="images/userReg_logo.png" alt="userReg_logo" class="reg-logo">
					<?php 
					echo "<input type='text' name='uid' value='".$uid['uid']."' required>"
					?>
				</li>
				<li> <button type="upload_button"> Upload a profile picture </button> </li>
			</ul>
			<ul>
				<li>
					<img src="images/pass_logo.png" class="reg-logo">
					<input type="text" name= "pwd" value="Change your password" required>
				</li>
				<li> <input type="text" name= "uid" value="Change your bio..."> </li>
			</ul>
			<button class="save_button">Save changes</button>	
		</div>
	</div>
<?php
 include_once 'footer.php';
?>