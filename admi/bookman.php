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
				<a href="/LMS3/admi/bookman/reqnbk.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Request for a new Book</a>
				<a href="/LMS3/admi/bookman/reqnbkt.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Requested Book Table</a>
				<a href="/LMS3/admi/bookman/adnbk.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Add new Books</a>
				<a href="/LMS3/admi/bookman/cbk.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Current Books in the Library</a>
				<a href="/LMS3/home.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Logout</a>
			</div>
		</div>
		<div class='w3-container w3-card-4 w3-green' style='margin-top:13%; margin-bottom:5%; margin-left:5%; margin-right:5%'>
			<div class='w3-container w3-pale-blue w3-card-4 w3-margin'>
				<p>This is the Book Manager page. Please advance through the above menu.</p>
			</div>
			<div class='w3-container w3-pale-blue w3-card-4 w3-margin'>
				<p>Books from Publishers</p>
<?php
	$conn=mysqli_connect("localhost","root","","LMS3");
	$query="select * from provadn";
	$requests=mysqli_query($conn,$query);
	while ($row=mysqli_fetch_array($requests)) {
	echo"	<div class='w3-container w3-blue w3-card-4 w3-margin'>
				<p>Book Name: ".$row['name']." | Author: ".$row['author']." | ISBN: ".$row['isbn']." | Price: ".$row['price']." | Quantity: ".$row['quantity']." | BookID: ".$row['bookid']."</p>
				 <table><tr><td class='actions'>
  					<form method='POST'>
  						<input type='hidden' value='".$row['id']."' name='bid' />
  						<input class='w3-btn w3-margin-bottom w3-pale-yellow' type='submit' value='Delete Book' name='delete'>
  						<input class='w3-btn w3-margin-bottom w3-pale-yellow' type='submit' value='Add to library' name='addlib'>
  					</form>
  				</td></tr></table>
			</div>";
	}
	if(isset($_POST['delete'])){
		$query="delete from provadn where id=".$_POST['bid']." ";
		mysqli_query($conn,$query);
		echo"<script>alert('The Selected book has benn deleted !!!'); window.location.href='/LMS3/admi/bookman.php'</script>";
	}
	if(isset($_POST['addlib'])){
		$query="select * from provadn where id=".$_POST['bid']." ";
		$request=mysqli_query($conn,$query);
		$row1=mysqli_fetch_array($request);
		$query="insert into books (name,author,isbn,price,quantity,bookid) values ('".$row1['name']."', '".$row1['author']."', '".$row1['isbn']."', '".$row1['price']."', '".$row1['quantity']."', '".$row1['bookid']."') ";
		mysqli_query($conn,$query);
		$query="delete from provadn where id=".$_POST['bid']." ";
		mysqli_query($conn,$query);
		echo"<script>alert('The Selected book has benn added to the Library !!!'); window.location.href='/LMS3/admi/bookman.php'</script>";	
	}
	echo"	</div>
		</div>
	</body>
</html>";
?>