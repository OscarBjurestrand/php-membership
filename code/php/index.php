<?php @include 'connect.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add data</title>
</head>
<body>
	<div style="display: inline-block;">
		<fieldset>
			<legend>Add user to database</legend>
			<form method="post" action="send_form.php" autocomplete="off">
				<input type="text" name="Username" placeholder="Name" autofocus="" pattern="[a-zA-Z0-9-]+" title="Only numbers and letters are allowed." required="">
				<input type="password" name="Password" placeholder="Password" required="">
				<input type="submit">
				<input type="reset">
			</form>
		</fieldset>
	</div>
</body>
</html>