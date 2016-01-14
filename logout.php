<?php

	include('inc/db_connect.php');
	session_unset();
	session_destroy();
	header('Location: index.php');

?>