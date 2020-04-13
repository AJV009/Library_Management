<?php
	#error_reporting(0);
	session_start();
	session_unset();
	session_destroy();
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
		<div class="w3-container w3-card-4 w3-pale-blue w3-round-xlarge" style="margin-left:10%; margin-right:10%; margin-top:10%;">
<?php
	session_start();
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
  					<table>
  					<tr><th>-</th></tr>
  					<tr>
  					<td class='actions'>
  						<form method='POST'>
  							<input type='hidden' value='".$row['id']."' name='bid' />
  							<input class='w3-btn w3-round-xxlarge w3-margin-bottom w3-pale-yellow' type='submit' value='Select and Lend it right now' name='lend'>
  						</form></td>";
  			if(isset($_POST['lend'])){  
            	$_SESSION['UNI']=$_POST['bid'];
              echo "<script>window.location.href='/LMS3/gust/greg.php'</script>";
          	}
  			echo "<tr></table></div></div>";
  		}
      echo"</div>";
  	}
  	else {
  		echo " Unfortunatly their are no books!!! Why dont you write some and donate to LMS. That would be cool ";
  	}
?>