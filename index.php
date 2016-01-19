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
			<div id="mission">
				<h2>Our Mission</h2>
				<p>
				We are a society dedicated to saving the hippo. We have been active for over 3 years and embrace
				every chance we get to save one of these majestic creatures. This site is a means for you to share your 
				hippo saving activity with other hippo lovers. Please sign up and tell us a bit about the last hippo
				you saved.
				</p>
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
					$result = DB::query(
						"SELECT posts.content, posts.timestamp, users.username, posts.uid, posts.id FROM posts 
							LEFT JOIN users ON posts.uid=users.uid
							ORDER BY timestamp desc limit 20");
					foreach ($result as $row){
						$count = 0;
						$content = $row['content'];
						$user = $row['username'];
						$uid = $row['uid'];
						$postid = $row['id'];
						date_default_timezone_set('UTC');
						$time = $row['timestamp'];
						$time = strtotime($time);
						$follow = DB::query(
							"SELECT following.user_id, following.user_id_to_follow FROM following 
							WHERE user_id_to_follow=%i AND user_id=%s", $uid, $_SESSION['uid']
						);
						//code from Rob for voting
						$vote_results = DB::query("SELECT * FROM posts_votes WHERE post_id=%i", $postid);
						if(!empty($vote_results)){
							foreach ($vote_results as $vote){
								$count = $count + $vote['vote'];
							}
						 }
						print "<div class='post'><div id='left'><h4>" . $content . '</h4>
						<p>Posted: ' . date('m-d-Y, g:i a', $time) . ' by '.$user.'</p></br>';
						if($_SESSION['uid']){
							if($uid != $_SESSION['uid']){
								if($follow){
									print '<div class="text"><p class="to-follow following" uid='.$uid.'>Unfollow</p></div>';	
								}else{
									print '<div class="text"><p class="to-follow not-following" uid='.$uid.'>Follow</p></div>';
								}
							}else{
								print "<div class='text'><p style='font-style:italic'>You</p></div>";
							}
							print '<div class="error" postid="'.$postid.'"></div>';
						}
						print '</div>';
						print '<div id="right"><div class="arrows">
						<span class="glyphicon glyphicon-thumbs-up up-vote vote" aria-hidden="true" postid="'.$postid.'"vote-value="1">
						</span><p class="count" postid="'.$postid.'">'.$count.'</p>
						<span class="glyphicon glyphicon-thumbs-down down-vote vote" aria-hidden="true" postid="'.$postid.'"vote-value="-1">
						</div></div></div>';

					}
				?>
				<div id="people-you-follow">
					<h2>Posts From Hippo Lovers You Love</h2>
					<?php 


					$result = DB::query(

						"SELECT * FROM posts
						INNER JOIN following 
						ON following.user_id_to_follow=posts.uid 
						INNER JOIN users
						ON users.uid = posts.uid
						WHERE user_id=%s ORDER by timestamp desc limit 20", $_SESSION['uid']
					);
						
					if($result){
						foreach ($result as $row){
							$content = $row['content'];
							$uid = $row['uid'];
							date_default_timezone_set('UTC');
							$time = $row['timestamp'];
							$time = strtotime($time);
							$user = $row['username'];

							print "<div class='post'><h4>" . $content . '</h4><div id="left">
								<p>Posted: ' . date('m-d-Y, g:i a', $time) . '</p></br></div><div id="right">' . $user . '
								</div></div>';
						}
					}else{
						print "<h3 style='font-style:italic'>You are not currently following anyone</h3>";
					}
				?>


				</div>

			</div>
		</div>


		<?php include('inc/footer.html') ?>
	</div>
</body>

</html>