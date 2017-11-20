<?php @include 'connect.php' ?>
<?php
//this page destroys the current session
session_start();
session_destroy();
echo "You are logged out.<br>";
echo "<a href='index.php'>Return to homepage</a>";
 ?>