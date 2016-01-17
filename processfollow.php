<?php

	include 'inc/db_connect.php';

	if ($_POST['action'] == 'follow'){
		try{
			DB::insert('following', array(
				'user_id' => $_SESSION['uid'],
				'user_id_to_follow' => $_POST['uid']
			));
		}catch(MeekroDBException $e){
			header('Location: /follow.php?error=true');
			exit;
		}
		print json_encode("success");
	}
	 else{
	 	// DB::query("DELETE FROM following WHERE user_id_to_follow = $_POST['uid] AND user_id = $_SESSION['uid']");
		try{
			DB::delete('following', "user_id_to_follow=%i AND user_id=%i", $_POST['uid'], $_SESSION['uid']);

		}catch(MeekroDBException $e){
			header('Location: /follow.php?error=true');
			exit;
		}
	 }

?>

