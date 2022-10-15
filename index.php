<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
?>
<!Doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="SARATH KUMAR">
	<title>Ace Portal</title>
	<script src="https://use.fontawesome.com/11d928607d.js"></script>
	<link rel="stylesheet" type="text/css" href="/Projects/slapp/_templates/pricing.css" />
	<style>
		h1{
			color:#024052;
		}
		.lout-b{
			right:7%;
			width:8%;
			position:absolute;
			height:30px;
		}
		.lout-b a{
			text-decoration:none;
			background-color:#e3051b;
			border-radius:8px;
			color:white;
			width:5%;
			font-size:20px;
			padding:3px;
			border:1px solid #0a0001;
		}
		
	</style>
</head>

<body>
	<div class="lout-b">
	<!--<i class="fa fa-user-circle" aria-hidden="true"></i>-->
	    <p>USER : <?php echo $_SESSION['username'];?></p>
		<a href="/Projects/slapp/logout.php">Logout</a>
	</div>

	
        
		<div class="header">
			<div id="banner">
				<img src="/Projects/slapp/_templates/images/adhiyamaan.png" alt="banner">
			</div>
		</div>
		<div class="block">
			<h1>Student Management System</h1>

			<div class="menu" id="insert">
				<h4>Enter: Details</h4>
				<div class="button"><p><a href="/Projects/slapp/insert.php">Insert</a></p></div>
			</div>
			<div class="menu" id="display">
				<h4>Display: Details</h4>
				<div class="button">
				<p><a href="/Projects/slapp/display.php">Display</a></p></div>

			</div>
			<div class="menu" id="search">
				<h4>Search: Details</h4>
				<div class="button"><p><a href="/Projects/slapp/search.php">Search</a></p></div>

			</div>
		</div>
		<div id="footer">
			<p>©copyright: Sarath Kumar</p>

		</div>
	



</body>

</html>
<?php
}else{
	header("Location:http://localhost/projects/slapp/login.php");
}
?>