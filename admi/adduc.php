<?php
//Add Users
	session_start();
	if($_SESSION['checksession']=='admin1'){
	}
	elseif($_SESSION['checksession']=='provider1'){
		echo"<script>alert('You Book Providers are not allowed here !! we have recognized you as ".$_SESSION['PNAME']."');window.location.href='/LMS3/home.php';</script>";
	}
	elseif($_SESSION['checksession']=='student1'){
		echo"<script>alert('You Student are not allowed here !! we have recognized you as ".$_SESSION['PNAME']."');window.location.href='/LMS3/home.php';</script>";
	}
	elseif($_SESSION['checksession']=='false'){
		echo"<script>alert('Hey just leave the site. You are not allowed here');window.location.href='/LMS3/home.php';</script>";
	}
	else{
		echo"<script>window.location.href='/LMS3/home.php';</script>";
	}
?>
<html>
	<title>LMS-v3.0</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/LMS3/asset/w3.css">
	<style> 
		body {
			background-image: url("/LMS3/asset/home1.jpg"); }
	 </style>
	<body>
		<div class="w3-top">
			<div class="w3-container w3-teal w3-card-4" align=center>
				<h1>Library Management System (LMS v3.0)</h1>
			</div>
			<div class="w3-container w3-light-green w3-card-4" align=center>
				<?php 
					echo "<p>".$_SESSION['PNAME']."</p>";
				?>
			</div>
			<div class="w3-bar w3-green w3-card-4">
				<a href="/LMS3/admi/admin.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Admin Home</a>
				<a href="/LMS3/admi/booklnds.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Book Lending Service</a>
				<a href="/LMS3/admi/bookman.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Book Management</a>
				<a href="/LMS3/admi/uas.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">User Accounts</a>
				<a href="/LMS3/admi/msgs.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Messages</a>
				<a href="/LMS3/home.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Logout</a>
				<a href="/LMS3/admi/lmsp.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">LMS Profile</a>
			</div>
		</div>
		<div class="w3-container " style="margin-top:11%">
			<div class="w3-card-4 w3-round-xxlarge w3-sand w3-center" style="margin-left:30%; margin-right:30%">
 				<h4>Student Sign up Form</h4>
 				(For a new account)
 				<form class="w3-container" action = "" method=POST>
 					<h4 class="w3-left w3-margin-left">Name</h4><input class="w3-input w3-border w3-round-xxlarge" type="text" name="name" required>
    				<h4 class="w3-left w3-margin-left">Phone no.</h4><input class="w3-input w3-border w3-round-xxlarge" type="text" name="phone" required>
    				<h4 class="w3-left w3-margin-left">E-mail</h4><input class="w3-input w3-border w3-round-xxlarge" name="email" required>
    				<h4 class="w3-left w3-margin-left">Address</h4><textarea class="w3-input w3-border w3-round-xxlarge" type="textarea" name="address" required></textarea>
    				<h4 class="w3-left w3-margin-left">Username</h4><input class="w3-input w3-border w3-round-xxlarge" type="text" name="username" required>
    				<h4 class="w3-left w3-margin-left">Password</h4><input class="w3-input w3-border w3-round-xxlarge" type="password" name="password" required>
    				<input class="w3-btn w3-green w3-round-xxlarge w3-margin" type="submit" value="submit" name="insert">
 				</form>
 				<h3>OR</h3>
 				<h4>Provider Sign up Form</h4>
 				(For a new account)
 				<form class="w3-container" action = "" method=POST>
 					<h4 class="w3-left w3-margin-left">Name</h4><input class="w3-input w3-border w3-round-xxlarge" type="text" name="name" required>
    				<h4 class="w3-left w3-margin-left">Phone no.</h4><input class="w3-input w3-border w3-round-xxlarge" type="text" name="phone" required>
    				<h4 class="w3-left w3-margin-left">E-mail</h4><input class="w3-input w3-border w3-round-xxlarge" name="email" required>
    				<h4 class="w3-left w3-margin-left">Address</h4><textarea class="w3-input w3-border w3-round-xxlarge" type="textarea" name="address" required></textarea>
    				<h4 class="w3-left w3-margin-left">Username</h4><input class="w3-input w3-border w3-round-xxlarge" type="text" name="username" required>
    				<h4 class="w3-left w3-margin-left">Password</h4><input class="w3-input w3-border w3-round-xxlarge" type="password" name="password" required>
    				<input class="w3-btn w3-green w3-round-xxlarge w3-margin" type="submit" value="submit" name="prinsert">
 				</form>
			</div>
		</div>
	</body>
</html>
<?php
	$conn=mysqli_connect("localhost","root","","LMS3");
	session_start();
	if(isset($_POST['insert'])){
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query1="select * from users where username = '$username'";
		$checkUsername=mysqli_query($conn,$query1);
		if (mysqli_num_rows($checkUsername)<=0) {
			$query="insert into users (name,phone,email,address,username,password,acctype) values ('$name','$phone','$email','$address','$username','$password','STUDENT')";
			mysqli_query($conn,$query);
			echo "<script> alert('Student Account created'); </script>";
		}
		else
		echo "<script> alert('Username already used !!! Please try again with a diffrent username.'); </script>";
	}
	if(isset($_POST['prinsert'])){
		$skey='1p0q2o9w3i8e4u7r5y6t';
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query1="select * from users where username = '$username' or name='$name'";
		$checkUsername=mysqli_query($conn,$query1);
		if (mysqli_num_rows($checkUsername)<=0 and $skey=='1p0q2o9w3i8e4u7r5y6t') {
			$query="insert into users (name,phone,email,address,username,password,acctype) values ('$name','$phone','$email','$address','$username','$password','PROVIDER')";
			mysqli_query($conn,$query);
			echo "<script> alert('Account created'); </script>";
		}
		else
		echo "<script> alert('Name or Username already used or the entered key could be wrong !!! Account creation Failed'); </script>";
		}
?>