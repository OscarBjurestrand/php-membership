<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<fieldset style="display: inline;">
		<legend>Login</legend>
			<form action="members.php" method="post">
				<input type="text" name="Username" placeholder="Username" autofocus="" required="">
				<input type="password" name="Password" placeholder="Password" required="">
				<input type="submit">
			</form>
	</fieldset>
	<p>Not registred?</p>
	<a href="index.php">Register</a>
</body>
</html>