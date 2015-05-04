<?php include "connectdb.php";?>
<!DOCTYPE html>
<html>
<head>
  <title>goal</title>
</head>
<body>
<button type="button" class="btn btn-primary btn-lg" onclick="javascript:window.location.href='create_goal.php';">Create A Goal</button>

<br>
<p>the goal I am doing </p>
<?php
$g_id = 0 ;
$g_name = "";
if( $stmt = $mysqli->prepare("select Progress.g_id,Goal.g_name from Progress,Goal where Progress.g_id = Goal.g_id and Progress.u_id = ? "))
{
	$stmt->bind_param("i",$_SESSION["u_id"]);
	$stmt->execute();
	$stmt->bind_result($g_id,$g_name);
	while($stmt->fetch())
	{
		echo $g_name;
		echo "<br>";
	}
}

?>

</body>
</html>
