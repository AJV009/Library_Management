<?php
	session_start();
	if($_SESSION['checksession']=='student1' OR $_SESSION['checksession']=='admin1'){
		
	}
	elseif($_SESSION['checksession']=='provider1'){
		echo"<script>alert('You Book Providers are not allowed here !! we have recognized you as ".$_SESSION['PNAME']."');window.location.href='/LMS3/home.php';</script>";
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
				<a href="/LMS3/stud/booklnd.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Lend Books</a>
				<a href="/LMS3/stud/chlenbk.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Check Lended Books</a>
				<a href="/LMS3/stud/reqnbook.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Request new Book</a>
				<a href="/LMS3/stud/message.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Messenger</a>
				<a href="/LMS3/home.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Logout</a>
				<a href="/LMS3/stud/prof.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Profile</a>
			</div>
		</div>
		<div class="w3-container w3-card-4 w3-pale-green w3-margin" style="margin-top: 13%; margin-left: 10%; margin-right: 10%">
			<p>Just check out message section to find messages for you....</p>
		</div>