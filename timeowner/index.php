<!DOCTYPE html>
<html id="welcome" lang="en">

<?php 
  include "connectdb.php";
  if(isset($_SESSION["u_name"]))
  {
    echo " you are login";
  }
  else 
  {
    echo " you need to login first";
    header("refresh:1; login.php");

  }
?>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
      	<link href="app_styles.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	<title>Welcome to Achieve</title>

</head>
<body>

<div class="container">
<div class="jumbotron">
	<h1>My goal is FOCUS</h1>
    <p>Let's get ready to Achieve!</p>
</div>
</div>


<div class="container">
	<img src="park.jpg">
</div>


<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <p>My Progress</p>
            <img src="pie_more.png">
            <p>My Expected Earnings</p>
            <p>$1</p>
        </div>
        <div class="col-xs-6">
            <p>Peer Group Progess</p>
            <img src="pie_less.png">
            <p>Peer Expected Earnings</p>
            <p>($2)</p>
        </div>
    </div>
</div>

<div class="container">
  <button type="button" class="btn btn-primary btn-lg" onclick="javascript:window.location.href='goal.php';">My Goal</button>
</div>

<div class="container">
  <button type="button" class="btn btn-primary btn-lg" onclick="javascript:window.location.href='myprofile.php';">My profile</button>
</div>

<div class="container">
 <button type="button" class="btn btn-primary btn-lg">My achievement</button>
</div>

<form align = "right" action = "logout.php" method = "post">
<input type = "submit" name = "logout" value = "logout">
</form>


</body>
</html>
