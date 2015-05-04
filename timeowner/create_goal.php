<?php include "connectdb.php";?>
<!DOCTYPE html>
<html>
<title> create_goal</title>
<body>

<?php
include "function.php";
$u_id = $g_id = 0;
$g_name = "";
$g_name_error = "";
$iserr = 0;
 if(empty($_POST["g_name"]))
 {
 	$iserr = 1;
 	$g_name_error = "goal name is empty";
 }
else
{
	$g_name = test_input($_POST["g_name"]);
}
if($iserr == 0 && isset($_POST["g_name"]))
{
	echo "here";
	if ($stmt = $mysqli->prepare("select * from Goal,Progress where Goal.g_id = Progress.g_id and Goal.g_name = ? and Progress.u_id = ?"))
	{
		echo "here1";

		$stmt->bind_param("si", $_POST["g_name"],$_SESSION["u_id"]);
		$stmt->execute();
		
		if($stmt->fetch())
		{
			echo "The goal name has exist in your task , please choose another goal.<br>";
			echo " you will be redirected in 1 seconds or click <a href = \"create_goal.php\">here</a>. <br>";
			header("refresh:1; create_goal.php");
			$stmt->close();
		}
		else
		{
			echo "here2";
			$stmt->close();
			if($stmt = $mysqli->prepare("select g_id from Goal where g_name = ?"))
			{
				$stmt->bind_param("s",$_POST["g_name"]);
				$stmt->execute();
				$stmt->bind_result($g_id);
				
				while($stmt->fetch());
				// 	{echo " record exist";
				// 		echo $g_id;
				// 	}

				// echo $g_id."wo ye henwunai a ";
			}
			
			$stmt->close();
			if($stmt = $mysqli->prepare("insert into Progress(u_id,g_id) value(?,?)"))
			{
				$stmt->bind_param("ii",$_SESSION["u_id"],$g_id);
				$stmt->execute();
				echo "you have successully created a goal named".$g_name."<br>";
				echo "you will be redirected in 1 second or click <a href = \"goal.php\">here</a>";
				header("refresh:1; goal.php");

			}
		}
	}

}
?>
<form method = "post" action = "create_goal.php">
<select name = "g_name">
<?php
$g_name = "";
if($stmt = $mysqli->prepare("select g_name from Goal"))
{
	$stmt->execute();
	$stmt->bind_result($g_name);
	while($stmt->fetch())
	{
		echo "<option value = \"".$g_name."\">".$g_name."</option>";
	}
}
?>
<input type = "submit" name = "submit" value = "assign goal">
</form>








</body>
</html>