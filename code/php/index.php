<?php 
/*
MIT License
Copyright (c) 2017 Oscar Bjurestrand
https://github.com/OscarBjurestrand/php-membership/blob/master/LICENSE
*/
 ?>
<?php @include 'connect.php' ?>
<?php require_once('session.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome!</title>
</head>
<body>
	<h1>Welcome to php-membership</h1>
	<p><a href="members.php">Members-only area</a></p>
	<p><a href="login.php">Login</a> or <a href="register.php">Register an user</a>.</p>
</body>
</html>