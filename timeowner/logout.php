<?php session_start(); ?>
<!DOCTYPE html>

<htlm>
<title>logout</title>

<?php
	session_destroy();
	echo "you are logged out.<br>";
	echo "you will be redirected in 3 seconds or click <a href = \"login.php\"> here </a>";
	header("refresh:3; login.php")
?>
</htlm>