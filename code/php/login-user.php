<?php @include 'connect.php' ?>
<?php require('session.php') ?>
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

//checks if the username or password fields are empty
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
    if (!($stmt = mysqli_prepare($conn, "SELECT Passowrd FROM users WHERE Username = (?)"))) {
    echo "Prepare failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    /* Prepared statement, stage 2: bind and execute */
    if (!$stmt->bind_param('s', $post_username)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    if($stmt->execute()) {
        echo "string";
    }
}
?>