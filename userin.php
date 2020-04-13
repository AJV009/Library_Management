<?php
	error_reporting(0);
	session_start();
	session_unset();
	session_destroy();
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
			<div class="w3-bar w3-green w3-card-4">
				<a href="/LMS3/home.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Home</a>
				<a href="/LMS3/gust/gust.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Guest</a>
				<a href="/LMS3/userin.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Login / Sign Up</a>
			</div>
		</div>
		<div class="w3-container " style="margin-top:10%">
			<div class="w3-card-4 w3-round-xxlarge w3-sand w3-center" style="margin-left:30%; margin-right:30%">
				<h4><br>Log in</h4>
				(Only if you already have an account)
				<br>
				(All types of users can also login here e.i. Student, Providers, Admins)
				<br>
				<form class="w3-container" action = "" method=POST>
 					<h4 class="w3-left w3-margin-left">Username</h4><input class="w3-input w3-border w3-round-xxlarge" type="text" name="username" required>
    				<h4 class="w3-left w3-margin-left">Password</h4><input class="w3-input w3-border w3-round-xxlarge" type="password" name="password" required>
    				<input class="w3-btn w3-green w3-round-xxlarge w3-margin" type="submit" value="submit" name="checklogin">
 				</form>
 				<h3>OR</h3>
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
 					<h4 class="w3-left w3-margin-left">Secret Key  (It is a Key provided by the admin)</h4><input class="w3-input w3-border w3-round-xxlarge" type="password" name="skey" required>
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
	if(isset($_POST['checklogin'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query="select * from users where username = '$username' AND password = '$password'";
		$result = mysqli_query($conn,$query);
		$result1=mysqli_fetch_array($result);
		$q1="select username, password from users where acctype='ADMIN' or id=1";
		$r1=mysqli_query($conn,$q1);
		$r2=mysqli_fetch_array($r1);
		$_SESSION['PNAME']=$result1['name'];
		if($username==$r2['username'] AND $password==$r2['password']){
			$_SESSION['UNAME']=$username;
			$_SESSION['UPASS']=$password;
			$_SESSION['checksession']='admin1';
			echo"<script>alert('Welcome Administrator');</script>";
			echo "<script>window.location.href='/LMS3/admi/admin.php';</script>";
		}
		elseif ($result1['acctype']=='PROVIDER') {
			$_SESSION['UNAME']=$username;
			$_SESSION['UPASS']=$password;
			$_SESSION['checksession']='provider1';
			echo "<script>window.location.href='/LMS3/prov/provider.php';</script>";
		}
		elseif(mysqli_num_rows($result)==1) {
			$_SESSION['UNAME']=$username;
			$_SESSION['UPASS']=$password;
			$_SESSION['checksession']='student1';
			echo "<script>window.location.href='/LMS3/stud/student.php';</script>";
		}
		else{
			$_SESSION['checksession']='false';
			echo "<script>alert('Login Failed')</script>";
		}
	}
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
		$skey=$_POST['skey'];
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