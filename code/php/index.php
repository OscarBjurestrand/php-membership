<?php @include 'connect.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
	<div style="display: inline-block;">
		<fieldset>
			<legend>Add user to database</legend>
			<form method="post" action="register.php" autocomplete="off">
				<input type="text" name="Username" placeholder="Username" autofocus="" pattern="[a-zA-Z0-9-]+" title="Only numbers and letters are allowed." required="">
				<input type="password" name="Password" placeholder="Password" required="">
				<input type="submit">
			</form>
		</fieldset>
		<p>Already registred?</p>
		<a href="login.php">Log in</a>
	</div>
</body>
</html>