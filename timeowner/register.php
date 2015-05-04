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
echo "here";
if(isset($_SESSION["u_name"]))
{
  echo "you have already logged in.\n";
  echo "you will be redirected in 1 seconds. or click <a href = \"index.php\">here</a>.";
  header("refresh:1; index.php");
}
else
{
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
    echo "here2";
    if($stmt = $mysqli->prepare("select u_name from User where u_name = ?"))
    {
      echo "here3";
        $stmt->bind_param("s", $_POST["u_name"]);
        $stmt->execute();
        $stmt->bind_result($u_name);
        if($stmt->fetch())
        {
            echo "This username has already existed.<br>\n";
            echo "you will be directed in 3 seconds or click <a href = \"register.php\">here</a>.";
            header("refresh: 1; register.php");
            $stmt->close();
        }
        else
        {
            $stmt->close();
            if($stmt = $mysqli->prepare("insert into User(u_name,password,Email) value(?,?,?)"))
            {
                $stmt->bind_param("sss",$_POST["u_name"],$_POST["password"],$_POST["Email"]);
                $stmt->execute();
                $stmt->close();
                echo "register successfully";
                echo "you will be redirected in 1 seconds or click <a href = \"login.php\">here </a>";
                header("refresh:1; login.php");
            }
        }
    }
  }     
}
?>
<p>please type your information</p>
<form method="post" action="register.php">
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














