<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
?>
<?php

echo"<a href='/Projects/slapp/index.php'>Go Back to Home</a><br><br>";
$con=mysqli_connect("localhost", "sarathkumar", "sarath@2332", "cse");
/*if (!$con)
{
    die("unable to connect");
}
else{
    echo"connected successfully";
}*/
echo"<style>table,th,td{border:1px solid black;}</style>";

$qry="SELECT * FROM `student`";
$res=mysqli_query($con, $qry);
if (mysqli_num_rows($res)>0) {
    echo'<table style="width:100%"><tr><th>ID</th><th>Name</th><th>Regno</th><th>Mark</th></tr>';
    $id=0;
    while ($row=mysqli_fetch_assoc($res)) {
        //echo "id : ".$row["Id"]."<br>"." Name : ".$row["Name"]."<br>"." Regno : ".$row["Regno"]."<br>"." Mark : ".$row["Mark"];
        $id+=1;
        echo"<tr><td>"."$id"."</td><td>".$row["Name"]."</td><td>".$row["Regno"]."</td><td>".$row["Mark"]."</td>";
    }
    echo"</table>";
} else {
    echo "No Data";
}
mysqli_close($con);
?>
<?php
}else{
	header("Location:http://localhost/projects/slapp/login.php");
}
?>
