<?php

$user = 'root';
$pass='';
$db='course_diary_digitization';
$connect = mysqli_connect('localhost',$user, $pass, $db) or die("unable to connect");
$attempts=3;
if (!empty($_POST['save']))
{
$fac_username=$_POST['fac_Username'];
$fac_Password=$_POST['fac_Password'];
$pwd_verify="select * from faculty_basic where fac_username='$fac_username' and fac_Password='$fac_Password'";
$result=mysqli_query($connect,$pwd_verify);
$count=mysqli_num_rows($result);
if($count>0)
{
	echo "<script> alert ('Login Successful !');</script>";
}
else
{
	$attempts--;
	echo "<script> alert ('Your username and password does not match !. More '.$attempts .' number of atempts left');</script>";
}

}
?>

<html>
<head>
	<title>Faculty Login page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<meta charset="utf-8">
</head>
<body>
	<div class="box">
		<h2>Faculty Login Page</h2>
		<form method="post">
			<div class="inputbox">
				<input type="text" name="fac_Username" required="" placeholder="Username">
			</div>
			<div class="inputbox">
				<input type="Password" name="fac_Password" required="" placeholder="Password">
			</div>
			<input type="submit" name="save" value="Submit">
			<a href="Forgotpassword.php" style="color: white">Forgot Password?</a>
		</form>
	</div>
	<header>
	<div class="main">
		<div class="logo">
			<img src="download.png">
		</div>
		<ul>
			<li class="active"><a href="Homepage.php"> Home</a></li>
			<li><a href="#"> About us</a></li>
			<li><a href="#"> Contact us</a></li>
		</ul>
	</div>
</header>

</body>
</html>

