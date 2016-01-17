<?php include 'inc/db_connect.php'; ?>

<?php 
	$results = DB::query(
		"SELECT users.uid, users.username FROM users");
	$notFollowing = true;
?>


<!DOCTYPE html>
<html>
<head>
	<?php include('inc/head.php') ?>
</head>
<body>
	<?php include('inc/header.php') ?>

	<div class="container following-page">
		<h1>Manage Users You Are Following:</h1>
		<?php 
			foreach($results as $user){
				if($user['uid'] != $_SESSION['uid']){
					$follow = DB::query(
						"SELECT following.user_id, following.user_id_to_follow FROM following WHERE user_id_to_follow=%i AND user_id=%s", $user['uid'], $_SESSION['uid']
					);
					if($follow){
						print '<div class="row">';
						print '<div class="user">'.$user['username'].'</div>';
						print '<div class="follow-user">
						 <button class="btn btn-danger follow unfollow-button" uid='.$user['uid'].'>Unfollow</button>';
						print '</div>';
						$notFollowing = false;
					}
					// else{				
					// 	print '<div class="follow-user">
					// 	 <button class="btn btn-success follow follow-button" uid='.$user['uid'].'>Follow</button>';
					// 	print '</div>';
					// }
				}			
			}
			if($notFollowing){
				print '<h3>You are not currently following anyone</h3>';
			}
		?>
		</div>
	</div>

	<?php include('inc/footer.html') ?>
	
</body>
</html>