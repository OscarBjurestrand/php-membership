<form action="test_pass.php" method="post">
	<input type="text" name="Username" placeholder="username" required="">
	<input type="text" name="Password" placeholder="password" required="">
	<input type="submit">
</form>
<button onclick="printTest()"></button>
<?php 
	function printTest() {
		echo "hello!";
	}
 ?>