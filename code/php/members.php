<?php @include 'connect.php' ?>
<?php 

$query = "SELECT Password FROM users WHERE Username = '$_POST[Username]'";

/* get hash from database */
if ($result = $conn->query($query)) {

    /* fetch object array */
    while ($row = $result->fetch_row()) {
        $fetched_hash = $row[0];
    }

    /* free result set */
    $result->close();
}

/* compare user-input password with correct password */
if ($_POST['Password'] == password_verify($_POST['Password'], $fetched_hash)) {
	echo "<p>You successfully logged in!</p>";
	echo "<a href='index.php'>Register another user</a>";
}
else {
	echo "<p>Incorrect username or password.</p>";
	echo "<a href='login.php'>Try again</a>";
}
?>