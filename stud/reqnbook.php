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
<?php
	$conn=mysqli_connect("localhost","root","","LMS3");
	echo"
		<div class='w3-container w3-card-4 w3-round-large w3-pale-green' style='margin-top:13%; margin-bottom:5%; margin-left:5%; margin-right:5%'>
			<form class='w3-container' action = '' method=POST>
 					<h4 class='w3-left w3-margin-left'>Book Name</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='name' required>
    				<h4 class='w3-left w3-margin-left'>Author </h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='author' required>
    				<input class='w3-btn w3-green w3-round-xxlarge w3-margin' type='submit' value='submit' name='insert'>
 			</form>";
 	if (isset($_POST['insert'])) {
 		$query="insert into rnbook (name,author) values ('".$_POST['name']."','".$_POST['author']."')";
 		mysqli_query($conn,$query);
 		echo"<script>alert('Your Book - ".$_POST['name']." written by ".$_POST['author']." has been requested, now all you have to do is to wait for a while till the administrator checks and validates your requests and forwards it the the providers to check the availablity of the book. When the book is added to the library you will get a notification about the book on your homepage.')</script>";
 	}
?>