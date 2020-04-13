<?php
//Main Tab
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
				<a href="/LMS3/admi/admin.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Home</a>
				<a href="/LMS3/admi/adduc.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Add User Accounts</a>
				<a href="/LMS3/admi/booklnds.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Book Lending Service</a>
				<a href="/LMS3/admi/bookman.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Book Management</a>
				<a href="/LMS3/admi/msgs.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Messages</a>
				<a href="/LMS3/home.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Logout</a>
				<a href="/LMS3/admi/lmsp.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">LMS Profile</a>
			</div>
		</div>
		<div class="w3-container " style="margin-top:13%">
			<div class="w3-card-4 w3-round-xxlarge w3-sand w3-center" style="margin-left:30%; margin-right:30%">
 				<h3>Update selected User Account Details</h3>
<?php
	$conn=mysqli_connect("localhost","root","","LMS3");
	$query="select * from users where id=".$_GET['userid']."";
	$requests=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($requests);
 	echo"		<h4 class='w3-left w3-margin-left'>Account Type is ".$row['acctype']."</h4>
 				<form class='w3-container' action = '' method=POST>
 					<h4 class='w3-left w3-margin-left'>Name</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' value='".$row['name']."' name='name' required>
    				<h4 class='w3-left w3-margin-left'>Username.</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' value='".$row['username']."' name='username' required>
    				<h4 class='w3-left w3-margin-left'>Password</h4><input class='w3-input w3-border w3-round-xxlarge' type='password' value='".$row['password']."' name='password' required>
    				<h4 class='w3-left w3-margin-left'>Phone no.</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' value='".$row['phone']."' name='phone' required>
    				<h4 class='w3-left w3-margin-left'>E-mail</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' value='".$row['email']."' name='email' required>
    				<h4 class='w3-left w3-margin-left'>Address</h4><input class='w3-input w3-border w3-round-xxlarge' type='textarea' value='".$row['address']."' name='address' required>
    				<input class='w3-btn w3-green w3-round-xxlarge w3-margin' type='submit' value='Update' name='Update'>
 				</form>
			</div>
		</div>";
	if(isset($_POST['Update'])){
		$query="update users set name='".$_POST['name']."', username='".$_POST['username']."', password='".$_POST['password']."', phone='".$_POST['phone']."', email='".$_POST['email']."', address='".$_POST['address']."' where id=".$_GET['userid']."";
		mysqli_query($conn,$query);
		echo "<script>alert('Account ".$_POST['username']." is updated !'); window.location.href='/LMS3/admi/uas.php'</script>";
	}
	echo"</body>
	</html>";
?>