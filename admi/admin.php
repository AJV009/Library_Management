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
				<a href="/LMS3/admi/adduc.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Add User Accounts</a>
				<a href="/LMS3/admi/booklnds.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Book Lending Service</a>
				<a href="/LMS3/admi/bookman.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Book Management</a>
				<a href="/LMS3/admi/uas.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">User Accounts</a>
				<a href="/LMS3/admi/msgs.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Messages</a>
				<a href="/LMS3/home.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Logout</a>
				<a href="/LMS3/admi/lmsp.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">LMS Profile</a>
			</div>
		</div>
<?php
	$conn=mysqli_connect("localhost","root","","LMS3");
	$query2="select * from books";
 	$requests=mysqli_query($conn,$query2);
 	$bkcount=mysqli_num_rows($requests);
 	$query2="select * from users where acctype='STUDENT'";
 	$requests=mysqli_query($conn,$query2);
 	$stcount=mysqli_num_rows($requests);
 	$query2="select * from booklnd where status='lended'";
 	$requests=mysqli_query($conn,$query2);
 	$lbkcount=mysqli_num_rows($requests);
 	$query2="select * from guest where status='lended'";
 	$requests=mysqli_query($conn,$query2);
 	$gbkcount=mysqli_num_rows($requests);
 	$query2="select * from guest";
 	$requests=mysqli_query($conn,$query2);
 	$query2="select * from booklnd";
 	$requestss=mysqli_query($conn,$query2);
 	$tbkcount=mysqli_num_rows($requests)+mysqli_num_rows($requestss);
 	$query2="select * from users where acctype='PROVIDER'";
 	$requests=mysqli_query($conn,$query2);
 	$pbkcount=mysqli_num_rows($requests);
 	echo "
 		<div class='w3-container w3-card-4 w3-round-large w3-pale-green' style=' margin-bottom:5%; margin-left:5%; margin-right:5%; margin-top:13%'>
 			<h4 class='w3-left w3-margin-left'> Books in the library= ".$bkcount."</h4><br><br><br>
 			<h4 class='w3-left w3-margin-left'> Students Registered= ".$stcount."</h4><br><br><br>
 			<h4 class='w3-left w3-margin-left'> Lended books (Students) = ".$lbkcount."</h4><br><br><br>
 			<h4 class='w3-left w3-margin-left'> Lended books (Guests) = ".$gbkcount."</h4><br><br><br>
 			<h4 class='w3-left w3-margin-left'> Book transactions (Students + Guests) = ".$tbkcount."</h4><br><br><br>
 			<h4 class='w3-left w3-margin-left'> Book Providers = ".$pbkcount."</h4><br><br><br>
 		</div>";
 ?>