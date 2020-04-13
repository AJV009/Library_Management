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
				<a href="/LMS3/stud/chlenbk.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Check Lended Books</a>
				<a href="/LMS3/stud/reqnbook.php" class="w3-bar-item w3-btn w3-mobile w3-hover-pale-green">Request new Book</a>
				<a href="/LMS3/home.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Logout</a>
				<a href="/LMS3/stud/prof.php" class="w3-bar-item w3-btn w3-mobile w3-right w3-hover-pale-green">Profile</a>
			</div>
		</div>
<?php
	$conn=mysqli_connect("localhost","root","","LMS3");
	$query="select * from msgarray where touc='".$_SESSION['UNAME']."' or touc='ALLUC' ";
	$request=mysqli_query($conn,$query);
	echo"
		<div class='w3-container w3-card-4 w3-green' style='margin-top:13%; margin-bottom:5%; margin-left:5%; margin-right:5%'>
			<p>Send a message to anyone registred on LMS.</p>
			<form method='POST'>
				<h4 class='w3-left w3-margin-left'>To User:</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='touc' required>
				<h4 class='w3-left w3-margin-left'>Message:</h4><input class='w3-input w3-border w3-round-xxlarge' type='text' name='msg' required>
  				<input class='w3-btn w3-margin-bottom w3-pale-yellow w3-margin' type='submit' value='Send Message' name='send'>
  			</form>
		</div>
	";
	echo"
	<div class='w3-container w3-card-4 w3-pale-green' style='margin-top:1%; margin-bottom:5%; margin-left:5%; margin-right:5%'>";
	while($row=mysqli_fetch_array($request)){
		echo"
			<div class='w3-container w3-card-4 w3-margin w3-pale-blue'>
				<p>'".$row['msg']."'<p>
				<p>From: ".$row['fromuc']."</p>
				<table><tr><td class='actions'>
  				<form method='POST'>
  					<input type='hidden' value='".$row['id']."' name='id' />
  					<input class='w3-btn w3-margin-bottom w3-pale-yellow' type='submit' value='Delete' name='delete'>
  				</form>
  				</td></tr></table>
			</div>
		";
	}
	echo "</div>";
	if(isset($_POST['send'])) {
		$query="select * from users where username='".$_POST['touc']."'";
		$request=mysqli_query($conn,$query);
		if(mysqli_num_rows($request)>0){
			$query="insert into msgarray (fromuc,msg,touc) values ('".$_SESSION['UNAME']."', '".$_POST['msg']."', '".$_POST['touc']."')";
			mysqli_query($conn,$query);
			echo"<script>alert('Your message has been send, but the receiver has to refresh his page to see the message.'); window.location.href='/LMS3/stud/message.php'</script>";
		}
		else{
			echo"<script>alert('No such user found. Message not delivered !!!'); window.location.href='/LMS3/stud/message.php'</script>";	
		}
	}
	if(isset($_POST['delete'])){
		$query="delete from msgarray where id=".$_POST['id']."";
		mysqli_query($conn,$query);
		echo"<script>alert('Message Deleted !!!'); window.location.href='/LMS3/stud/message.php';</script>";
	}
?>