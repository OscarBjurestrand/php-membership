<?php @include('connect.php') ?>
<?php @include('session.php'); ?>
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
if (strlen($post_username) === 0) {
    echo "<p>The username field cannot be empty!</p>";
    echo "<a href='register.php'>Return</a>";
}
elseif (strlen($post_password) === 0) {
    echo "<p>The password field cannot be empty!</p>";
    echo "<a href='register.php'>Return</a>";
}
//checks if the username is allowed (only letters and numbers)
elseif (!ctype_alnum($post_username)) {
    echo "<p>Username must only contain letters and numbers.</p>";
    echo "<a href='login.php'>Try again</a>";
}
else {
    //prepare stae,emt for grabbing password hash that matches $post_username
    if (!($stmt = mysqli_prepare($conn, "SELECT Password FROM users WHERE Username = (?)"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    //binding statement
    if (!$stmt->bind_param('s', $post_username)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    //execute statement
    if ($stmt->execute()) {

        //get query result and assign it to $result
        $result = $stmt->get_result();
        $stmt->free_result();
        $stmt->close();

        $row = $result->fetch_array(MYSQLI_NUM);
        if (!isset($row[0])) {
            echo "<p>Invalid password or username.</p>";
            echo "<a href='login.php'>Try again</a>";
        }
        else {
            if (password_verify($post_password, $row[0])) {
                $_SESSION['username'] = $post_username;
                $_SESSION['loggedin'] = true;
                header('Location: members.php');
            }
            else {
                echo "<p>Invalid password or username.</p>";
                echo "<a href='login.php'>Try again</a>";
            }

        }

    }
    else {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
}
?>