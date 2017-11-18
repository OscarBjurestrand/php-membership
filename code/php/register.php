<?php @include 'connect.php' ?>
<?php 

//store password
$post_username = $_POST['Username'];

//create password hash
$password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

//create query for username search
$query = "SELECT Username FROM users WHERE Username = '$post_username'";

//check if username exists or not
if ($result = $conn->query($query)) {

    //check if there already is a row with $_POST['Username']
    if (mysqli_num_rows($result) != 0) {
    	echo "<p>Username already exists.</p>";
		echo "<a href='index.php'>Try again</a>";
    } 
    else
    {
    	//check if the query was successful and insert username and hashed password to database
		if (mysqli_query($conn, "INSERT INTO users (`Username`, `Password`) VALUES ('$_POST[Username]', '$password')")) {
		 	echo "<p>User was succesfully created</p>";
		 	echo "<a href='login.php'>Go to login</a>";
		 } 
		 else {
		 	echo "<p>User was not added.</p>";
		 	echo "Error" . mysqli_error();
		 	echo "<a href='index.php'>Go to register</a>";
		 }
    }
    //free result memory
    $result->close();
}
?>