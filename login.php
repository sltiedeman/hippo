<?php
	include('inc/db_connect.php');
	$_SESSION['page'] = 'login';
?>

<!DOCTYPE html>
<html>
<head>
	<?php include('inc/head.php') ?>
</head>
<body>	
	<div id="total-wrapper">
		<?php include('inc/header.php') ?>
		<div id="login-wrapper">
			<h1 id="heading">Save the Hippo!</h1>
			<div class="login">
				<h2 id="login-heading">Login</h2>
				<form method='post' action='processlogin.php'>
					<div class="form-group">
						<label>User Name</label>
						<input type="text" class="form-control" placeholder="johndoe123" name="username">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" placeholder="At least 6 digits, letters and numbers" name="password">
					</div>	
					<div class="button-holder">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div>
		<?php include('inc/footer.html') ?>
	</div>
</body>
</html>