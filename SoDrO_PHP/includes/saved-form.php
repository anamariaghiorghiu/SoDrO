<?php
	include_once 'header.php';
?>
	<div class="viewListContent">

		<form action=includes/update-list.php method="post">
			<input type="hidden" name="send-id"value=<?php echo $_GET['id'];?>>
			<input type="text" name="update-list-value"value="">
			<button type="submit" name="update-list">Edit</button>
		</form>

	</div>
<?php
 include_once 'footer.php';
?>