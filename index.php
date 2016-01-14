<?php 

	include('inc/db_connect.php');
	$_SESSION['page'] = 'active';

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
		</div>

		<?php include('inc/footer.html') ?>
	</div>
</body>

</html>