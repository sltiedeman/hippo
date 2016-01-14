<?php 
	include('inc/db_connect.php');
	$error = $_GET['error'];
	if($error == 'mustlogin'){
		$mustLogin = true;
	}
	$success = $_GET['success'];
?>


<!DOCTYPE html>
<html>
<head>
	<?php include('inc/head.php') ?>
</head>
<body>
	<?php include('inc/header.php') ?>

	<div id="posts-wrapper">
		<div class="container">
			<?php
				if($mustLogin){
					print ('<h3>You must be logged in to post</h3>');
				}
				if($success){
					print ('<h3>Thank you for posting!</h3>');
				}
			?>
			<form action="processposts.php" method="post">
				<div class="form-group">
					<label for="new-post">POST</label>
					<textarea class="form-control" rows="5" name="newPost" id="new-post"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Post it!</button>
			</form>
		</div>
		<?php include('inc/footer.html') ?>
	</div>
</body>
</html>