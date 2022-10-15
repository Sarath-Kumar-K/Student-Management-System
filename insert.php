<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
?>
<html>

<head>
	<title>Student Details</title>
	<style>
		.insert-form{
			margin-left: 450px;
			margin-top: 100px;
		}
	</style>
</head>

<body>
	<div class="insert-form">
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
		<table>
			<tr>
				<td>Name :</td>
				<td><input type="text" name="name"></td><br><br>
			</tr>
			<tr>
				<td>Register No :</td>
				<td><input type="text" name="regno" placeholder="ex:AC20UCSxxx"></td><br><br>
			</tr>
			<tr>
				<td>Mark :</td>
				<td><input type="number" name="mark"></td><br><br>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="submit"></td>
				<td><a href='/Projects/slapp/index.php'>Go Back to Home</a></td>
			</tr>
		</table>
		
	</form>
	</div>
    <?php
	if (isset($_POST["submit"]))
	{
		$name=strtoupper($_POST["name"]);
		$regno=$_POST["regno"];
		$mark=$_POST["mark"];
	
		$con=mysqli_connect("localhost", "sarathkumar", "sarath@2332", "cse");
		/*if (!$con)
		{
			die("unable to connect");
		}
		else{
			echo"connected successfully";
		}*/
		$qry="INSERT INTO student (Name, Regno, Mark) VALUES ('$name', '$regno', '$mark')";
		$res=mysqli_query($con, $qry);
		if($res)
		{
			echo"Data inserted successfully";
		}
		mysqli_close($con);
	
	
	
	
	}
	?>

</body>

</html>
<?php
}else{
	header("Location:http://localhost/projects/slapp/login.php");
}
?>