<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
?>
<html>

<head>
	<title>search details</title>
	<?php echo"<style>table,th,td{border:1px solid black;}</style>";?>
	<?php echo"<style>.formtable{border:0px;}</style>";?>
	<style>
		h1,
		p {
			text-align: center;
		}
	</style>
</head>

<body>
	<h1>SEARCH STUDENT</h1>
	<p><i>Note: Search student details through any of these three field</i>
	<p>
	<form
		action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"
		method="POST">
		<table class="formtable">
			<tr>
				<th class="formtable">Name :</th>
				<th class="formtable"><input type="text" name="name" placeholder="name as you registerted"></th>
				<th class="formtable">Register No :</th>
				<th class="formtable"><input type="text" name="regno" placeholder="ex: AC20UCSxxx"></th>
				<th class="formtable">Mark :</th>
				<th class="formtable"><input type="text" name="mark" placeholder="eg: 45-100 (or) 100"></th>
				<th class="formtable"><input type="submit" name="search" value="Search"></th>
				<th class="formtable"><a href="/Projects/slapp/index.php">Go Back to Home</a></th>
			</tr>

		</table>

	</form>
	<?php
    if (isset($_POST["search"])) {
        $con=mysqli_connect("localhost", "sarathkumar", "sarath@2332", "cse");
        /*if (!$con)
        {
            die("unable to connect");
        }
        else{
            echo"connected successfully";
        }*/
        $id=0;
        if (!empty($_POST["name"])) {
            if (isset($_POST["name"])) {
                $name=strtoupper($_POST["name"]);
                $qry="SELECT * FROM student WHERE Name='$name'";
                $res=mysqli_query($con, $qry);
                if (mysqli_num_rows($res)>0) {
                    echo'<table style="width:100%"><tr><th>ID</th><th>Name</th><th>Regno</th><th>Mark</th></tr>';
                    while ($row=mysqli_fetch_assoc($res)) {
                        $id+=1;
                        echo"<tr><td>".$id."</td><td>".$row["Name"]."</td><td>".$row["Regno"]."</td><td>".$row["Mark"]."</td></tr>";
                    }
                    echo"</table>";
                } else {
                    echo"<p>No Data for $name </p>";
                }
            }
        } elseif (!empty($_POST["regno"])) {
            if (isset($_POST["regno"])) {
                $regno=$_POST["regno"];
                $qry="SELECT * FROM student WHERE Regno='$regno'";
                $res=mysqli_query($con, $qry);
                if (mysqli_num_rows($res)>0) {
                    echo'<table style="width:100%"><tr><th>ID</th><th>Name</th><th>Regno</th><th>Mark</th></tr>';
                    while ($row=mysqli_fetch_assoc($res)) {
                        $id+=1;
                        echo"<tr><td>".$id."</td><td>".$row["Name"]."</td><td>".$row["Regno"]."</td><td>".$row["Mark"]."</td>";
                    }
                    echo"</table>";
                } else {
                    echo"<p>No Data for $regno </p>";
                }
            }
        } elseif (!empty($_POST["mark"]) || $_POST["mark"]=='0') {
            if (isset($_POST["mark"])) {
                $mark=explode('-', $_POST["mark"]);//array
                if (empty($mark[1])) {
                    $qry="SELECT * FROM student WHERE Mark BETWEEN $mark[0] AND $mark[0]";
                } else {
                    $qry="SELECT * FROM student WHERE Mark BETWEEN $mark[0] AND $mark[1]";
                }

                $res=mysqli_query($con, $qry);

                if (mysqli_num_rows($res)>0) {
                    echo'<table style="width:100%"><tr><th>ID</th><th>Name</th><th>Regno</th><th>Mark</th></tr>';
                    while ($row=mysqli_fetch_assoc($res)) {
                        $id+=1;
                        echo"<tr><td>".$id."</td><td>".$row["Name"]."</td><td>".$row["Regno"]."</td><td>".$row["Mark"]."</td></tr>       ";
                    }
                    echo"</table>";
                } else {
                    echo"No Data for mark = $mark[0] ";
                }
            }
        } else {
            echo "<p>Enter Name (0r) Regno (or) Mark</p>";
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