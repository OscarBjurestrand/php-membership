<?php 
/*
MIT License
Copyright (c) 2017 Oscar Bjurestrand
https://github.com/OscarBjurestrand/php-membership/blob/master/LICENSE
*/
 ?>
<?php @include 'connect.php' ?>
<?php 
//this page checks if an user is logged in or not
session_start();
if (isset($_SESSION['session_username'])) {
	echo "You are logged in, welcome to the members-only area, ". $_SESSION['session_username'] . ".<br>";
	echo "<a href='logout.php'>Log out</a>";	
}
else {
	echo "You can't view this page without logging in. <br>";
	echo "<a href='login.php'>Log in</a> or <a href='register.php'>Register</a>";
}
?>
