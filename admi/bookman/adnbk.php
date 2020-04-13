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
				<a href="/LMS3/admi/bookman/reqnbk.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Request for a Book</a>
				<a href="/LMS3/admi/bookman/cbk.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Current Books in the Library</a>
				<a href="/LMS3/home.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Logout</a>
			</div>
		</div>
<?php
	$conn=mysqli_connect("localhost","root","","LMS3");
	echo"
	<div class='w3-container w3-card-4 w3-pale-blue w3-round-xlarge' style='margin-left:10%; margin-right:10%; margin-top:13%;''>
			<form method='POST'>
				<h4 class='w3-left w3-margin-left'>Name</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='name' required>
				<h4 class='w3-left w3-margin-left'>Author</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='author' required>
				<h4 class='w3-left w3-margin-left'>ISBN</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='isbn' required>
				<h4 class='w3-left w3-margin-left'>Price</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='price' required>
				<h4 class='w3-left w3-margin-left'>Quantity</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='quantity' required>
				<h4 class='w3-left w3-margin-left'>BookID</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='bookid' required>
    			<input class='w3-btn w3-green w3-round-xxlarge w3-margin' type='submit' value='Add this new book' name='add'>
			</form>
		</div>";
	if (isset($_POST['add'])) {
		$query="select * from books where name='".$_POST['name']."' and author='".$_POST['author']."'";
		$request=mysqli_query($conn,$query);
		if (mysqli_num_rows($request)>0) {
			$row=mysqli_fetch_array($request);
			$quan=$row['quantity']+$_POST['quantity'];
			$query="update books set quantity='".$quan."' where name='".$_POST['name']."' and author='".$_POST['author']."'";
			mysqli_query($conn,$query);
			echo"<script>alert('The book = ".$row['name']." quantity has been updated !'); window.location.href='/LMS3/admi/bookman/adnbk.php'</script>";
		}
		else{
			$query="insert into books (name,author,isbn,price,quantity,bookid) values ('".$_POST['name']."','".$_POST['author']."','".$_POST['isbn']."','".$_POST['price']."','".$_POST['quantity']."','".$_POST['bookid']."')";
			mysqli_query($conn,$query);
			echo"<script>alert('The book = ".$_POST['name']." has been added to Library book collection !'); window.location.href='/LMS3/admi/bookman/adnbk.php'</script>";	
		}
	}
?>