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
				<a href="/LMS3/admi/bookman.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Book Manager</a>
				<a href="/LMS3/admi/bookman/adnbk.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Add new Books</a>
				<a href="/LMS3/admi/bookman/cbk.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Current Books in the Library</a>
				<a href="/LMS3/home.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Logout</a>
			</div>
		</div>
<?php
	$conn=mysqli_connect("localhost","root","","LMS3");
	$query1="select * from provmsg";
	$request1=mysqli_query($conn,$query1);
	echo"<div class='w3-container w3-card-4 w3-blue w3-round-large' style ='margin-left:10%; margin-right:10%; margin-top:13%; '>
			<h4>Request for a new book: <h4>
			<form class='w3-container' action = '' method=POST>
 					<h4 class='w3-left w3-margin-left'>Name of the Book:</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='name' required>
    				<h4 class='w3-left w3-margin-left'>Author:</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='author' required>
    				<h4 class='w3-left w3-margin-left'>Quantity:</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='quantity' required>
    				<input class='w3-btn w3-green w3-round-xxlarge w3-margin' type='submit' value='request' name='request'>
 				</form>
 		</div>
	";
	echo "
		<div class='w3-container w3-card-4 w3-pale-blue w3-round-large' style ='margin-left:5%; margin-right:5%; margin-top:1%'>";
	while($row=mysqli_fetch_array($request1)){
		echo "
		<div class='w3-container w3-blue w3-card-4 w3-margin w3-round-xxlarge'>
  					<p>Sr.no. : ".$row['id']." | Name : ".$row['name']." | Author : ".$row['author']." | Quantity: ".$row['quantity']." </p>
  			<div class=''>
  				<table><tr><td class='actions'>
  					<form method='POST'>
  						<input type='hidden' value='".$row['id']."' name='id' />
  						<input class='w3-btn w3-round-xxlarge w3-margin-bottom w3-red' type='submit' value='Delete Request' name='delete'>
  					</form>
  				</td><tr></table>
  			</div>
  		</div>";
	}
	if (isset($_POST['request'])) {
		$query="insert into provmsg (name,author,quantity) values ('".$_POST['name']."','".$_POST['author']."','".$_POST['quantity']."')";
		mysqli_query($conn,$query);
		echo "<script>alert('Your request has been send to the provider please wiat for a while !'); window.location.href='/LMS3/admi/bookman/reqnbk.php'<script>";
	}
	if (isset($_POST['delete'])) {
		$query="delete from provmsg where id=".$_POST['id']." ";
		mysqli_query($conn,$query);
		echo "<script>alert('Your request has been deleted !!'); window.location.href='/LMS3/admi/bookman/reqnbk.php'</script>";
	}
	echo "</div>";
?>