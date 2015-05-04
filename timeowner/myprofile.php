<?php include "connectdb.php";?>

<?php
$u_name = $Email = "";
$u_id = $honor = 0;
if ($stmt = $mysqli->prepare("select u_id, u_name,Email,honor from User where u_id = ?"))
{
	$stmt->bind_param("i", $_SESSION["u_id"]);
	$stmt->execute();
	$stmt->bind_result($u_id,$u_name,$Email,$honor);
	while($stmt->fetch());

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>my profile</title>
</head>
<body>
<p>my id is <?php echo $u_id; ?> </p>
<p>my name is <?php echo $u_name; ?></p>
<p>my Email is <?php echo $Email; ?></p>
<p>my honor is <?php echo $honor; ?></p>

<div class="container">
  <button type="button" class="btn btn-primary btn-lg" onclick="javascript:window.location.href='edit_myprofile.php';">edit my profile</button>
</div>


</body>
</html>