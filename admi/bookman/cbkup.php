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
				<a href="/LMS3/admi/bookman/adnbk.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Add new Books</a>
				<a href="/LMS3/home.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Logout</a>
			</div>
		</div>
		<div class="w3-container w3-card-4 w3-pale-blue w3-round-xlarge" style="margin-left:10%; margin-right:10%; margin-top:13%;">
			<h3>Update selected Library Book Details</h3>
<?php
	$conn=mysqli_connect("localhost","root","","LMS3");
	$query="select * from books where id=".$_GET['bid']." ";
	$requests=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($requests);
 	echo"
 				<form class='w3-container' action = '' method=POST>
 					<h4 class='w3-left w3-margin-left'>Name of the Book:</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' value='".$row['name']."' name='name' required>
    				<h4 class='w3-left w3-margin-left'>Author:</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' value='".$row['author']."' name='author' required>
    				<h4 class='w3-left w3-margin-left'>ISBN no.:</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' value='".$row['isbn']."' name='isbn' required>
    				<h4 class='w3-left w3-margin-left'>Price:</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' value='".$row['price']."' name='price' required>
    				<h4 class='w3-left w3-margin-left'>Quantity:</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' value='".$row['quantity']."' name='quantity' required>
    				<h4 class='w3-left w3-margin-left'>Book ID:</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' value='".$row['bookid']."' name='bookid' required>
    				<input class='w3-btn w3-green w3-round-xxlarge w3-margin' type='submit' value='Update' name='Update'>
 				</form>
			</div>
		</div>";
	if(isset($_POST['Update'])){
		$query="update books set name='".$_POST['name']."', author='".$_POST['author']."', isbn='".$_POST['isbn']."', price='".$_POST['price']."', quantity='".$_POST['quantity']."', bookid='".$_POST['bookid']."' where id=".$_GET['bid']."";
		mysqli_query($conn,$query);
		echo "<script>alert('Book: ".$_POST['name']." Has been updated !'); window.location.href='/LMS3/admi/bookman/cbk.php'</script>";
	}
	echo"</body>
	</html>";
?>