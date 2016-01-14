<div id="header">
	<div id="float-left">
		<a href="index.php"><button class="btn btn-primary btn-lg">Home</button></a>
	</div>
	<div id="float-right">
		<?php
			if($_SESSION['uid']){
				print 'Welcome Back, ' . $_SESSION['name'] . '<a href="logout.php"><button class="btn btn-success btn-lg">Logout</button></a>';
			}elseif($_SESSION['page'] == 'login'){
				print 'Not already a user? ' . '<a href="register.php"><button class="btn btn-warning btn-lg">Register</button></a>';
			}elseif($_SESSION['page'] == 'register'){
				print 'Already a user? ' . '<a href="login.php"><button class="btn btn-warning btn-lg">Login</button></a>';
			}else{
				print ' <a href="register.php"><button class="btn btn-warning btn-lg">Register</button></a> ';
				print ' <a href="login.php"><button class="btn btn-success btn-lg">Login</button></a> ';
			}
		?>
		<!-- <a href="login.php"><button class="btn btn-success btn-lg">Login</button></a> -->
	</div>
</div>
