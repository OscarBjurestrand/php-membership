<?php @include 'connect.php' ?>
<?php
//change to safe character set
mysqli_query($conn,'SET NAMES utf8mb4');

//grab the posted username and password
$post_username = $_POST['Username'];
$post_password = $_POST['Password'];

//secure the username and password
$post_username = mysqli_real_escape_string($conn, $post_username);
$post_password = mysqli_real_escape_string($conn, $post_password);

//checks if the username or password fields are empty
if (empty($post_username)) {
    echo "<p>The username field cannot be empty!</p>";
    echo "<a href='index.php'>Return</a>";
}
elseif (empty($post_password)) {
    echo "<p>The password field cannot be empty!</p>";
    echo "<a href='index.php'>Return</a>";
}
else {
    //create query to grab the hashed password from the username matching $post_username
    $query = "SELECT Password FROM users WHERE Username = '$post_username'";

    //declare $fetched_hash
    $fetched_hash = '';

    //grab the result object from the database
    if ($result = $conn->query($query)) {

        //fetch the password from the object array
        while ($row = $result->fetch_row()) {
            $fetched_hash = $row[0];
        }

        //free the memory stored in $result
        $result->close();
    }

    //compare $post_password with the hashed password
    if ($post_password == password_verify($post_password, $fetched_hash)) {
        echo "<p>You successfully logged in!</p>";
        echo "<a href='register.php'>Register another user</a>";
    }
    else {
        echo "<p>Incorrect username or password.</p>";
        echo "<a href='login.php'>Try again</a>";
    }
}
?>