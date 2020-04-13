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
				<a href="/LMS3/stud/booklnd.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Lend Books</a>
				<a href="/LMS3/stud/reqnbook.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Request new Book</a>
				<a href="/LMS3/stud/message.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Messenger</a>
				<a href="/LMS3/home.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Logout</a>
				<a href="/LMS3/stud/prof.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Profile</a>
			</div>
		</div>
<?php
	$conn=mysqli_connect("localhost","root","","LMS3");
	$query="select * from booklnd where uname='".$_SESSION['UNAME']."' and status='lended'";
	$request=mysqli_query($conn,$query);
	echo"
		<div class='w3-container w3-card-4 w3-green' style='margin-top:13%; margin-bottom:5%; margin-left:5%; margin-right:5%'>
			<div class='w3-container w3-blue w3-card-4 w3-margin'>
				<p>Dont forget to return the books in time !!! or you will be charged Rs.50 per day after the said valid period of keeping the lended book.</p>
			</div>";
	if (mysqli_num_rows($request)>0) {
		while($row=mysqli_fetch_array($request)){
			$query2="select * from books where id='".$row['bookid']."'";
  			$requestt=mysqli_query($conn,$query2);
  			$row1=mysqli_fetch_array($requestt);
			echo"
			<div class='w3-container w3-pale-blue w3-card-4 w3-margin'>
				<p> '".$row1['name']."' | Price = ".$row1['price']." | lended on ".$row['checkin']." </p>
			</div>";
		}
	}
	else{
		echo "You have right now lended no books, why dont you read some books man !!";
	}
?>