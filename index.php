<?php 

	include('inc/db_connect.php');
	$_SESSION['page'] = 'active';
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
	<div id="total-wrapper">
		<?php include('inc/header.php') ?>
		<div id="index-wrapper">
			<div id="hero-image">
				<h1 id="hero-text">Save the Hippo</h1>
			</div>
			<div id="posts">
				<div id="posts-left">
					<h2>Recent Posts</h2>
				</div>
				<div id="posts-right">
					<span class='glyphicon glyphicon-plus' id='plus' aria-hidden='true'></span>
				</div>
				<?php
					if($_SESSION['uid']){
						print '<div id="make-post"><form action="processposts.php" method="post">';
						print '<div class="form-group"><label for="new-post">POST</label>';
						print '<textarea class="form-control" rows="5" name="newPost" id="new-post">';
						print '</textarea></div><button type="submit" class="btn btn-primary">';
						print 'Post it!</button></form></div>';
					}else{
						print '<div style="text-align:center" id="make-post"><div style="padding-top:100px"><h2 >';
						print 'Sorry. You must be logged in to post</h2></div>';
						print '<a href="login.php"><button class="btn btn-success btn-lg">Login</button></a></div>';
					}
				?>
		
				<?php

					if($success){
						print ('<h3>Thank you for posting!</h3>');
					}
				?>
				<?php 
					$result = DB::query("SELECT * FROM posts ORDER BY timestamp desc limit 30");
					foreach ($result as $row){
						$content = $row['content'];
						date_default_timezone_set('UTC');
						$time = $row['timestamp'];
						$time = strtotime($time);
						print "<div class='post'><h4>" . $content . '</h4><p>Posted: ' . date('m-d-Y, g:i a', $time) . '</p>' . "</div>";	
					}

				?>
			</div>
		</div>


		<?php include('inc/footer.html') ?>
	</div>
</body>

</html>