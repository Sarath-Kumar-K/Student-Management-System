<!DOCTYPE html>
<html>

<head>
	<title>Signup</title>
    <style>
		.form{
			margin-left: 450px;
			margin-top: 100px;
		}
		h1{
			text-align:center;
			margin-top: 15px;
			position:absolute;
			margin-left: 520px;

		}
		.bttn{
			background-color: #357ecc;
			color:white;
			border-radius:7px;
			border:1px solid black;
			font-size:20px;
			padding:5px;

		}
		.bttn:hover{
			background-color:#205185;
		}
		table tr td p{
			color:red;
		}
	</style>
</head>

<body>
<h1>SIGNUP</h1>
	<div class="form">
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <table>
			<tr>
				<td>Username :</td>
				<td><input type="text" name="username" placeholder="create user"></td><br><br>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" name="password" placeholder="create password"></td><br><br>
			</tr>
			<tr>
				<td><input class="bttn" type="submit" name="submit" value="Signup"></td>
			</tr>
            <tr>
            <td><p>Already a user ?</p><a href='/Projects/slapp/login.php'>Login</a></td>
            </tr>
		</table>
		</form>


	</div>
	<?php
	if (isset($_POST["submit"]))
	{
        session_start();
		$con=mysqli_connect("localhost", "sarathkumar", "sarath@2332", "cse");
        if (isset($_POST["username"]) && isset($_POST["password"])) {
	$username=$_POST["username"];
	$password=$_POST["password"];
	if (empty($username)) {
        echo"enter username";
        exit();
    } elseif (empty($password)) {
        echo"enter a password";
        exit();
    }else{
		$qry="INSERT INTO login (username,password) VALUES ('$username','$password')";
		$res=mysqli_query($con, $qry);
		if($res){
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
			header("Location:http://localhost/projects/slapp/index.php");
            exit();
		}else{
			echo"Register failed";
		}

	}
}
	}
	?>


</body>

</html>