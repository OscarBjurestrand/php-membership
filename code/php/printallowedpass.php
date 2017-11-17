<?php 
$username = $_POST['Username'];
$pre_username = htmlspecialchars($username, ENT_QUOTES);
echo $pre_username;
 ?>