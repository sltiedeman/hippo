<?php
	
	include 'inc/db_connect.php';
	$voteCount = 0;
	$results = DB::query("SELECT * FROM posts_votes WHERE voter_user_id=%i AND post_id=%i", $_SESSION['uid'],$_POST['postid']);
	foreach ($results as $row){
		$voteCount += $row['vote'];
	}
	// if($counter > 0){
	// 	print "already voted";
	// }else{
	if((($voteCount < 1)&&($_POST['voteValue']==1)) || (($voteCount > -1)&&($_POST['voteValue']==-1))){
		try{
			DB::insert('posts_votes', array(
				'post_id' => $_POST['postid'],
				'voter_user_id' => $_SESSION['uid'],
				'vote' => $_POST['voteValue']
			));
		}catch(MeekroDBException $e){
			header('Location: /follow.php?error=true');
			exit;
		}
	}
	if(($voteCount < 1)&&($_POST['voteValue']==1)){
		print "add-one";
	}else if(($voteCount > -1)&&($_POST['voteValue']==-1)){
		print "subtract-one";
	}else if(($voteCount == 1)&&($_POST['voteValue']==1)){
		print "no-more-up-votes";
	}else if(($voteCount == -1)&&($_POST['voteValue']==-1)){
		print "no-more-down-votes";
	}


?>