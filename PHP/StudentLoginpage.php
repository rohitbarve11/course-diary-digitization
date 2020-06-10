<?php

$user = 'root';
$pass='';
$db='course_diary_digitization';
$connect = mysqli_connect('localhost',$user, $pass, $db) or die("unable to connect");
if (!empty($_POST['save']))
{
$roll_number=$_POST['roll_number'];
$stud_password=$_POST['stud_password'];
$pwd_verify="select * from student_basic where roll_number='$roll_number' and stud_password='$stud_password'";
$result=mysqli_query($connect,$pwd_verify);
$count=mysqli_num_rows($result);
if($count>0)
{
	echo "<script> alert ('Login Successful !');</script>";
}
else
{
	echo "<script> alert (' Your username and password does not match !');</script>";
}
}
?>

<html>
<head>
	<title>Student Login page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<meta charset="utf-8">
</head>
<body>
	<div class="box">
		<h2>Student Login Page</h2>
		<form method="post">
			<div class="inputbox">
				<input type="text" name="roll_number" required="" placeholder="Roll no.">
			</div>
			<div class="inputbox">
				<input type="Password" name="stud_password" required="" placeholder="Password">
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