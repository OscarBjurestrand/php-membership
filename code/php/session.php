<?php 
/*
MIT License
Copyright (c) 2017 Oscar Bjurestrand
https://github.com/OscarBjurestrand/php-membership/blob/master/LICENSE
*/
 ?>
<?php 
//this file checks if an user is logged in and then redirects to the members-area.
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	header('Location: members.php');
}
else {
	echo "<!-- this is displayed when an user is not logged in -->";
}
 ?>
