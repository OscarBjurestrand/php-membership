<?php @include 'connect.php' ?>
<?php 

//create password hash
$password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

//check if the query was successful and insert username and hashed password to database
if (mysqli_query($conn, "INSERT INTO users (`Username`, `Password`) VALUES ('$_POST[Username]', '$password')")) {
 	echo "<p>User was succesfully created</p>";
 	echo "<a href='login.php'>Go to login</a>";
 } 
 else {
 	echo "<p>User was not added.</p>";
 	echo "Error" . mysqli_error();
 	echo "<a href='register.php'>Go to register</a>";
 }
?>