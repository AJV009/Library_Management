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
				<a href="/LMS3/prov/provider.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Home</a>
				<a href="/LMS3/home.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Logout</a>
				<a href="/LMS3/prov/prof.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Profile</a>
			</div>
		</div>
<?php
	$conn=mysqli_connect("localhost","root","","LMS3");
	echo "
		<div class='w3-container w3-card-4 w3-pale-green' style='margin-top:13%; margin-bottom:5%; margin-left:5%; margin-right:5%'>
			<p>Send Books to Administrator !!!</p>
			<form class='w3-container' action = '' method=POST>
 					<h4 class='w3-left w3-margin-left'>Book Name:</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='name' required>
    				<h4 class='w3-left w3-margin-left'>Author:</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='author' required>
    				<h4 class='w3-left w3-margin-left'>ISBN:</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='isbn' required>
    				<h4 class='w3-left w3-margin-left'>Price:</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='price' required>
    				<h4 class='w3-left w3-margin-left'>Quantity:</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='quantity' required>
    				<h4 class='w3-left w3-margin-left'>BookID:</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='bookid' required>
    				<input class='w3-btn w3-green w3-round-xxlarge w3-margin' type='submit' value='Send Book' name='send'>
 			</form>
 		</div>
	";
	if (isset($_POST['send'])) {
		$query="insert into provadn (name,author,isbn,price,quantity,bookid) values ('".$_POST['name']."', '".$_POST['author']."', '".$_POST['isbn']."', '".$_POST['price']."', '".$_POST['quantity']."', '".$_POST['bookid']."')";
		mysqli_query($conn,$query);
		echo "<script>alert('Your book has been send to Administrator!');window.location.href='/LMS3/prov/sdbkad.php'</script>";
	}