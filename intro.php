<!DOCTYPE html>
<html>
<head>
	<?php include('inc/head.php') ?>
</head>

<body>

	<script>
		setTimeout(function(){
			var windowHeight = window.innerHeight;
			$('#intro-page-wrapper').css('height', windowHeight + 'px');
			var contentHeight = $('#intro-page').height();
			var paddingAdjust = parseInt((windowHeight - contentHeight-25)/2);
			$('#logo').css('padding-top', paddingAdjust + 'px');
		},10);

	</script>	

<div id="intro-page-wrapper">
	<div id="intro-page">
		<img id="logo" src="img/logo.png">
		<h1>Save a Hippo</h1>
		<p>This site is built using PHP with MySQL for the database. It is intended to be a bit of a 
		Yik Yak clone. Users can register or login and after doing so they can post. They will see the 20
		most recent posts and can up-vote posts or follow other users. If they follow users they will
		see those posts at the bottom of the main page.
		</p>
		<a href="/"><button id="intro-button">View Project</button></a>
	</div>
</div>

</body>