<?php
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
				<a href="/LMS3/admi/admin.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Admin Home</a>
				<a href="/LMS3/admi/adduc.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Add User Accountse</a>
				<a href="/LMS3/admi/bookman.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Book Management</a>
				<a href="/LMS3/admi/uas.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">User Accounts</a>
				<a href="/LMS3/admi/msgs.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Messages</a>
				<a href="/LMS3/home.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Logout</a>
				<a href="/LMS3/admi/lmsp.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">LMS Profile</a>
			</div>
		</div>
<?php
	$conn=mysqli_connect("localhost","root","","LMS3");
	$query="select * from guest where status='lended'";
	$requests=mysqli_query($conn,$query);
	$query1="select * from booklnd where status='lended'";
  	$request=mysqli_query($conn,$query1);
	echo"
		<div class='w3-container w3-card-4 w3-green' style='margin-top:13%; margin-bottom:5%; margin-left:5%; margin-right:5%'>";
	while($row = mysqli_fetch_array($requests)){
		$query2="select * from books where id='".$row['bookid']."'";
  		$requestt=mysqli_query($conn,$query2);
  		$row1=mysqli_fetch_array($requestt);
  		echo"
			<div class='w3-container w3-pale-blue w3-card-4 w3-margin'>
				<p>Guest - ".$row['name'].", Checked in @ ".$row['checkin']." lended Book  = ".$row1['name'].". BookID =  ".$row['bookid']."</p>
				<table><tr><td class='actions'>
  				<form method='POST'>
  					<input type='hidden' value='".$row['bookid']."' name='bbid' />
  					<input type='hidden' value='".$row['id']."' name='bid' />
  					<input class='w3-btn w3-margin-bottom w3-pale-yellow' type='submit' value='Return' name='Return'>
  				</form>
  				</td></tr></table>
			</div>";
	}
	while($roww = mysqli_fetch_array($request)){
		$query2="select * from books where id='".$roww['bookid']."'";
  		$requestt=mysqli_query($conn,$query2);
  		$row1=mysqli_fetch_array($requestt);
		echo"
			<div class='w3-container w3-pale-blue w3-card-4 w3-margin'>
			<p>Student - ".$roww['uname'].", Checked in @ ".$roww['checkin']." lended Book = ".$row1['name'].". BookID =  ".$roww['bookid']."</p>
			<table><tr><td class='actions'>
  				<form method='POST'>
  					<input type='hidden' value='".$row['bookid']."' name='bbid' />
  					<input type='hidden' value='".$roww['id']."' name='bid' />
  					<input class='w3-btn w3-margin-bottom w3-pale-yellow' type='submit' value='Return' name='RReturn'>
  				</form>
  				</td></tr></table>
			</div>";
	}
	if(isset($_POST['Return'])){
		$query11="update guest set checkout='".date("d/m/y")."', status='received' where id='".$_POST['bid']."'";
		mysqli_query($conn,$query11);
		$query2="select * from books where id='".$_POST['bbid']."'";
  		$requesttt=mysqli_query($conn,$query2);
  		$row3=mysqli_fetch_array($requesttt);
  		$quan=$row3['quantity']+1;
  		$query11="update books set quantity='".$quan."' where id='".$_POST['bbid']."'";
		mysqli_query($conn,$query11);
		echo"<script>window.location.href='/LMS3/admi/booklnds.php'</script>";
	}
	if(isset($_POST['RReturn'])){
		$query11="update booklnd set checkout='".date("d/m/y")."', status='received' where id='".$_POST['bid']."'";
		mysqli_query($conn,$query11);
		$query2="select * from books where id='".$_POST['bbid']."'";
  		$requesttt=mysqli_query($conn,$query2);
  		$row3=mysqli_fetch_array($requesttt);
  		$quan=$row3['quantity']+1;
  		$query11="update books set quantity='".$quan."' where id='".$_POST['bbid']."'";
		mysqli_query($conn,$query11);
		echo"<script>window.location.href='/LMS3/admi/booklnds.php'</script>";
	}
	echo "
		</div>
	</body>
</html>";
?>