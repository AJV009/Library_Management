<?php
	session_start();
	if($_SESSION['checksession']=='provider1' OR $_SESSION['checksession']=='admin1'){

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
				<a href="/LMS3/prov/sdbkad.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Send Books</a>
				<a href="/LMS3/home.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Logout</a>
				<a href="/LMS3/prov/prof.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Profile</a>
			</div>
		</div>
<?php
	$conn=mysqli_connect("localhost","root","","LMS3");
	$query="select * from provmsg";
	$requests=mysqli_query($conn,$query);
	echo"
		<div class='w3-container w3-card-4 w3-green' style='margin-top:13%; margin-bottom:5%; margin-left:5%; margin-right:5%'>
			<p>These are the requests from Administrator !!!</p>
	";
	while($row=mysqli_fetch_array($requests)){
		echo "
			<div class='w3-container w3-pale-blue w3-card-4 w3-margin'>
				<p>Book Name: ".$row['name']." | Book Author: ".$row['author']." | Quantity: ".$row['quantity']."</p>
				<table><tr><td class='actions'>
  				<form method='POST'>
  					<input type='hidden' value='".$row['id']."' name='id' />
  					<input class='w3-btn w3-margin-bottom w3-pale-yellow' type='submit' value='Accept' name='done'>
  				</form>
  				</td></tr></table>
			</div>";
	}
	if (isset($_POST['done'])) {
		$query="delete from provmsg where id=".$_POST['id']." ";
		mysqli_query($conn,$query);
		echo"<script>alert('Message Deleted'); window.location.href='/LMS3/prov/provider.php'</script>";
	}
?>