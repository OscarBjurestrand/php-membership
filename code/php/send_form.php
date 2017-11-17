<?php @include 'connect.php' ?>
<?php 

//create password hash
$password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

//insert username and hash into table
mysqli_query($conn, "INSERT INTO users (`Username`, `Password`) VALUES ('$_POST[Username]', '$password')"); $conn->close(); 

?>
<p>User was added.</p>
<a href="login.php">Test login</a>

