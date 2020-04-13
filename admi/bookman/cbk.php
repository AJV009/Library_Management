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
<?php
	$conn=mysqli_connect("localhost","root","","LMS3");
	$query="select * from books";
	$request=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($request)){
		echo "
				<div class='w3-container w3-blue w3-card-4 w3-margin w3-round-xxlarge'>
  					<p>Sr.no. : ".$row['id']."</p>
  					<img src='/LMS3/asset/book/".$row['id'].".jpg'>
  					<p>Name : ".$row['name']." | Author : ".$row['author']." | ISBN no. : ".$row['isbn']." | Price : ".$row['price']." | Quantity: ".$row['quantity']." | Book ID : ".$row['bookid']." </p>
  					<div class=''>
  					<table>
  					<tr>
  					<td class='actions'>
  						<form method='POST'>
  							<input type='hidden' value='".$row['id']."' name='bid' />
  							<input class='w3-btn w3-round-xxlarge w3-margin-bottom w3-pale-yellow' type='submit' value='Update Book Details' name='update'>
  							<input class='w3-btn w3-round-xxlarge w3-margin-bottom w3-red' type='submit' value='Delete Book' name='delete'>
  						</form></td><tr></table></div></div>";
  	}
  	if(isset($_POST['update'])){
  		echo"<script>alert('You will be redirected to the Book Details Updation page.'); window.location.href='/LMS3/admi/bookman/cbkup.php?bid=".$_POST['bid']."'</script>";
  	}
  	if (isset($_POST['delete'])) {
  		$query="delete from books where id='".$_POST['bid']."'";
  		mysqli_query($conn,$query);
  		echo "<script>alert('Your book has been deleted !'); window.location.href='/LMS3/admi/bookman/cbk.php'</script>";
  	}
    echo"</div></body></html>";
?>