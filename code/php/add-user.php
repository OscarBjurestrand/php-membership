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
	//create query for username search
	$query = "SELECT Username FROM users WHERE Username = '$post_username'";

	//check if username exists or not
	if ($result = $conn->query($query)) {

	    //check if there already is a row with $post_username
	    if (mysqli_num_rows($result) != 0) {
	    	echo "<p>Username already exists.</p>";
			echo "<a href='register.php'>Try again</a>";
	    } 
	    else
	    {
	    	//check if the query was successful and insert username and hashed password to database
			if (mysqli_query($conn, "INSERT INTO users (`Username`, `Password`) VALUES ('$post_username', '$hashed_post_password')")) {
			 	echo "<p>User was succesfully created</p>";
			 	echo "<a href='login.php'>Go to login</a>";
			 } 
			 else {
			 	echo "<p>User was not added.</p>";
			 	echo "Error" . mysqli_error();
			 	echo "<a href='register.php'>Return</a>";
			 }
	    }
	    //free result memory
	    $result->close();
	}
}
?>