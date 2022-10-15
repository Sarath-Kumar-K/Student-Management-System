<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
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
<h1>LOGIN</h1>
	<div class="form">
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
		
		<table>
			<tr>
				<td>Username :</td>
				<td><input type="text" name="username"></td>
			</tr><br><br>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password"></td>
			</tr><br><br>
			<tr>
				<td><input class="bttn" type="submit" name="submit" value="LOGIN"></td>
			</tr>
			<tr>
			<td><p>Not a user ?</p><a href='/Projects/slapp/signup.php'>Create account</a></td>
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
		$qry="SELECT * FROM login WHERE username='$username' AND password='$password'";
		$res=mysqli_query($con, $qry);
		if(mysqli_num_rows($res)==1){
			$row=mysqli_fetch_assoc($res);
			if($row["username"]==$username && $row["password"]==$password){
				
				$_SESSION['username']=$row["username"];
				$_SESSION['password']=$row["password"];
				header("Location:http://localhost/projects/slapp/index.php");
				
			}else{
				echo"not verified";
				exit();
			}
			
		}else{
			echo"no user found";
			exit();
		}

	}
}
	}
	?>


</body>

</html>