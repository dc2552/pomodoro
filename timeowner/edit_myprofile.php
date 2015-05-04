<?php include "connectdb.php";?>
<!DOCTYPE html>
<html>
<title>register</title>
<body>
<?php
include "function.php";
$u_name=$password=$Email="";
$u_name_error=$password_error="";
$iserr=0;

  if(count($_POST)!=0)
    {
        if(empty($_POST["u_name"]))
        {
            $user_name_error="user name is required.";
            $iserr=1;
        }
       
        else
        {
            $user_name = test_input($_POST["u_name"]);
        }
         echo "here1";
        if(empty($_POST["password"]))
        {
            $password_error="passwod is required.";
            $iserr=1;
        }
        else
        {
            $password = test_input($_POST["password"]);
        }
        if(empty($_POST["Email"]))
        {
            $Email="";
        }
        else
        {
            $Email = test_input($_POST["Email"]);
        }
    }
   if($iserr==0&&isset($_POST["u_name"])&&isset($_POST["password"]))
  {
    if($stmt= $mysqli->prepare("update User set u_name = ?, password =? , Email = ? where u_id = ?"))
    {
        $stmt->bind_param("sssi",$_POST["u_name"],$_POST["password"],$_POST["Email"],$_SESSION["u_id"]);
        $stmt->execute();
        while($stmt->fetch());
        echo "you have successfully change your profile , you will be redirected in 1 seconds";
        header("refresh:1; myprofile.php");
    }
  }
    

?>
<p>please type your information</p>
<form method="post" action="edit_myprofile.php">
USER NAME:<input type="text" name = "u_name" value = "laoliu" >
          <span >* <?php echo $u_name_error;?></span>
PASSWORD:<input type = "text" name = "password" value = "123456" >
          <span >* <?php echo $password_error;?></span>
EMAIL:<input type = "text" name = "Email" value = "laoliu@qq.com">
      <input type = "submit" name = "submit" value = "submit">
</form>

<?php
  
  
?>

</body>
</html>














