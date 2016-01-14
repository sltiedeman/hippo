<?php
	include('inc/db_connect.php');
	$content = $_POST['newPost'];
	if($_SESSION['uid']){
		try{
			DB:: insert('posts', array(
				'uid'=> $_SESSION['uid'],
				'content'=> $content
			));
			header('Location: posts.php?success=yes');
			exit;
		}catch(MeekroDBException $e){
			header('Location: /posts.php?error=yes');
			exit;
		}
	}else{
		header('Location: /posts.php?error=mustlogin');
		exit;
	}

?>