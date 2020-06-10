<?php

$user = 'root';
$pass='';
$db='course_diary_digitization';
$no_of_attempts=0;
$connect = mysqli_connect('localhost',$user, $pass, $db) or die("unable to connect");
if (!empty($_POST['save']))
{
$fac_username=$_POST['fac_Username'];
$fac_Password=$_POST['fac_Password'];
$no_of_attempts=$_POST['hidden'];
if($no_of_attempts<4){
$pwd_verify="select * from faculty_basic where fac_username='$fac_username' and fac_Password='$fac_Password'";
$result=mysqli_query($connect,$pwd_verify);
$count=mysqli_num_rows($result);
if($count>0)
{
	echo "<script> alert ('Login Successful !');</script>";
}
else
{
	$no_of_attempts++;
	echo "<script> alert (' Your username and password does not match ! Attempts utilised : ".$no_of_attempts."');</script>";
}

}
else 
{
	echo "<script> alert ('Login limit exceeded !');</script>";
}
}
?>

<html>
<head>
	<title>Faculty Login page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="utf-8">
</head>
<body>
	<div class="box">
		<h2>Faculty Login Page</h2>
		<form method="post">
			<div class="inputbox">
				<i class="fa fa-user-o"></i> 
				<input type="text" name="fac_Username" required="" placeholder="Username">
			</div>
			<div class="inputbox">
				<i class="fa fa-key"></i>
				<input type="Password" name="fac_Password" required="" placeholder="Password" id="fac_Password">
				<span class ="eye" onclick="toggle_pwd()"> 
					<i id="eye_hide1" class="fa fa-eye" ></i>
					<i id="eye_hide2" class="fa fa-eye-slash" ></i>
				</span>

				<?php 
					echo"<input type='hidden' name='hidden' value='".$no_of_attempts."'>";
				?>
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


<script>
	
	function toggle_pwd(){
		var x=document.getElementById('fac_Password');
		var y=document.getElementById('eye_hide1');
		var z=document.getElementById('eye_hide2');

		if (x.type==="Password")
		{
			x.type="text";
			y.style.display="block";
			z.style.display="none";

		}
		else
		{
			x.type="Password";
			y.style.display="none";
			z.style.display="block";
		}
	}

</script>

</body>
</html>