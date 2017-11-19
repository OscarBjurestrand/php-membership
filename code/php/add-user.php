<?php 
/*
MIT License
Copyright (c) 2017 Oscar Bjurestrand
https://github.com/OscarBjurestrand/php-membership/blob/master/LICENSE
*/
 ?>
<?php @include 'connect.php' ?>
<?php require_once('session.php') ?>
<?php
//change to safe character set
mysqli_query($conn,'SET NAMES utf8mb4');

//grab the posted username and password
$post_username = $_POST['Username'];
$post_password = $_POST['Password'];

//secure the username and password
$post_username = stripslashes($post_username);
$post_password = stripslashes($post_password);
$post_username = mysqli_real_escape_string($conn, $post_username);
$post_password = mysqli_real_escape_string($conn, $post_password);

//create password hash
$hashed_post_password = password_hash($post_password, PASSWORD_DEFAULT);

//checks if the username or password fields are empty.
if (empty($post_username)) {
	echo "<p>The username field cannot be empty!</p>";
	echo "<a href='register.php'>Return</a>";
}
elseif (empty($post_password)) {
	echo "<p>The password field cannot be empty!</p>";
	echo "<a href='register.php'>Return</a>";
}
//checks if the username is allowed (only letters and numbers)
elseif (!ctype_alnum($post_username)) {
    echo "<p>Username must only contain letters and numbers.</p>";
    echo "<a href='login.php'>Try again</a>";
}
else {
	/* Prepared statement, stage 1: prepare */
	if (!($stmt = mysqli_prepare($conn, "SELECT Username FROM users WHERE Username = (?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}

	/* Prepared statement, stage 2: bind and execute */
	if (!$stmt->bind_param('s', $post_username)) {
	    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}

	//check if username exists or not
	if ($result = $stmt->execute()) {

		//if the statement fetches anything but zero, then another user with the same username exists
		if ($stmt->fetch() != 0) {
			echo "<p>Username already exists.</p>";
			echo "<a href='register.php'>Try again</a>";
			//close statement
	    	$stmt->close();
		}
	    else
	    {
	    	/* Prepared statement, stage 1: prepare */
			if (!($stmt = mysqli_prepare($conn, "INSERT INTO users (`Username`, `Password`) VALUES ((?), (?))"))) {
		    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
			}

			/* Prepared statement, stage 2: bind and execute */
			if (!$stmt->bind_param('ss', $post_username, $hashed_post_password)) {
			    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
			}

	    	//check if the query was successful and insert username and hashed password to database
			if ($stmt->execute()) {
			 	echo "<p>User was succesfully created</p>";
			 	echo "<a href='login.php'>Go to login</a>";
			 } 
			 else {
			 	echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
			 }
	    }
	}
	else {
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
}
?>