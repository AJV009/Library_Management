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
				<a href="/LMS3/stud/student.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Home</a>
				<a href="/LMS3/stud/chlenbk.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Check Lended Books</a>
				<a href="/LMS3/stud/reqnbook.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Request new Book</a>
				<a href="/LMS3/stud/message.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Messenger</a>
				<a href="/LMS3/home.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Logout</a>
				<a href="/LMS3/stud/prof.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Profile</a>
			</div>
		</div>
		<div class="w3-container w3-card-4 w3-pale-blue w3-round-xlarge" style="margin-left:10%; margin-right:10%; margin-top:13%;">
<?php
	$conn=mysqli_connect("localhost","root","","LMS3");
	$query="select * from books";
	$requests=mysqli_query($conn,$query);
	if(mysqli_num_rows($requests) > 0){
		while($row = mysqli_fetch_array($requests)){
			echo "
				<div class='w3-container w3-blue w3-card-4 w3-margin w3-round-xxlarge'>
  					<p>Sr.no. : ".$row['id']."</p>
  					<img src='/LMS3/asset/book/".$row['id'].".jpg'>
  					<p>Name : ".$row['name']."</p>
  					<p>Author : ".$row['author']."</p>
  					<p>ISBN no. : ".$row['isbn']."</p>
  					<p>Book ID : ".$row['bookid']."</p>
  					<div class=''>
  					<table><tr><td class='actions'>
  						<form method='POST'>
  							<input type='hidden' value='".$row['id']."' name='bid' />
  							<input class='w3-btn w3-round-xxlarge w3-margin-bottom w3-pale-yellow' type='submit' value='Select and Lend it right now' name='lend'>
  						</form></td><tr></table>
  					</div>
  				</div>";
  		}
  		if(isset($_POST['lend'])){
			$query3="select * from books where id='".$_POST['bid']."' ";
			$requests=mysqli_query($conn,$query3);
			$row01=mysqli_fetch_array($requests);
			$query3="select * from users where username='".$_SESSION['UNAME']."' ";
			$requests=mysqli_query($conn,$query3);
			$row02=mysqli_fetch_array($requests);
			$query2="select * from booklnd where uname='".$_SESSION['UNAME']."' and status='lended'";
 			$requests=mysqli_query($conn,$query2);
 			$bookcount=mysqli_num_rows($requests);
			if($bookcount<3){
				if($row01['quantity']>0){
					$quan=$row01['quantity']-1;
					$query3="update books set quantity='".$quan."' where id='".$_POST['bid']."'";
					mysqli_query($conn,$query3);
					$query3="insert into booklnd (uname,bookid,checkin,status) values ('".$_SESSION['UNAME']."','".$_POST['bid']."','".date("d/m/y")."','lended')";
					mysqli_query($conn,$query3);
					// FIX UNIQUE ID
					echo "<script>alert('Dear ".$_SESSION['PNAME'].", Your Book - ".$row01['name']." has been given to you ! Your Unique ID is "."FIXIT"." use this to return your book. You have got at max 7 days to return the book or you will be charged a fine Rs.50 per day after the before said period. If you lose the book you will have to pay Rs.".$row01['price']." (Full price of the book).'); window.location.href='/LMS3/stud/student.php'; </script>";
				}
				else{
					echo "<script>alert('The current stock the ".$row01['name']." is over !!! Will be available next time.'); window.locaton.href='/LMS3/stud/student.php'; </script>";
				}

          	}
          	else{
        	echo "<script>alert('You have already Lended 3 books. Please return some of them to lend new ones.'); window.locaton.href='/LMS3/stud/student.php'; </script>";
        	}
        }
    echo"</div>";
  	}
  	else {
  		echo " Unfortunatly their are no books!!! Why dont you write some and donate to LMS. That would be cool ";
  	}
?>