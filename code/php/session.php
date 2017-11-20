<?php 
//this file checks if an user is logged in and then redirects to the members-area.
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	header('Location: members.php');
}
?>
