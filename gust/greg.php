<?php
session_start();
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
			<div class="w3-container w3-light-green w3-card-4" align=center>Welsome Guest</div>
			<div class="w3-bar w3-green w3-card-4">
				<a href="/LMS3/home.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Home</a>
				<a href="/LMS3/gust/gust.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Guest</a>
				<a href="/LMS3/userin.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Login / Sign Up</a>
			</div>
		</div>
		<div class="w3-container w3-card-4 w3-pale-blue w3-round-xlarge" style="margin-left:10%; margin-right:10%; margin-top:13%;">
			<form method='POST'>
				<h4 class="w3-left w3-margin-left">Name</h4><input class="w3-input w3-border w3-round-xxlarge" type="text" name="name" required>
    			<h4 class="w3-left w3-margin-left">Phone no.</h4><input class="w3-input w3-border w3-round-xxlarge" type="text" name="phone" required>
    			<h4 class="w3-left w3-margin-left">E-mail</h4><input class="w3-input w3-border w3-round-xxlarge" name="email" required>
    			<input class="w3-btn w3-green w3-round-xxlarge w3-margin" type="submit" value="Submit & Lend" name="lend">
			</form>
		</div>
	</body>
	</html>
	<?php
	$conn=mysqli_connect("localhost","root","","LMS3");
	if(isset($_POST['lend'])){
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$cindate= date("d/m/y");
		$query1="select * from books where id='".$_SESSION['UNI']."' ";
		$requests=mysqli_query($conn,$query1);
		$row = mysqli_fetch_array($requests);
		if($row['quantity']>0){
			$query="insert into guest (name,phone,email,checkin,bookid,status) values ('$name','$phone','$email','$cindate','".$_SESSION['UNI']."','lended')";
			mysqli_query($conn,$query);
			$rq=$row['quantity']-1;
			$query2="update books SET quantity='$rq' where id='".$_SESSION['UNI']."'";
			mysqli_query($conn,$query2);
			// FIX UNIQUE ID
			echo "<script>alert('Dear $name, Your Book - ".$row['name']." has been given to you ! Your Unique ID is "."FIXIT"." use this to return your book. You have got at max 2 days to return the book or you will be charged a fine Rs.50 per day after the before said period. If you lose the book you will have to pay Rs.".$row['price']." (Full price of the book). if you want to extent the period of lending books please create a account as a student and you will have more time to keep them upto 31 days this period varies from book to book.'); window.location.href='/LMS3/home.php'; </script>";
		}
		else{
			echo "<script>alert('The current stock the ".$row['name']." is over !!! Will be available next time.'); window.locaton.href='/LMS3/gust/gust.php'; </script>";	
		}
	}
	?>