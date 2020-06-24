<?php
$servername="localhost";
$username="root";
$password="";
$dbname="company";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
	die("Connection Error:".mysqli_connect_error());

$a = $_REQUEST['a'];   
$b = $_REQUEST['b'];
$c = $_REQUEST['c'];
$d = $_REQUEST['d'];
$e = $_REQUEST['e'];

$sql="INSERT INTO course (name,cname,duration,ins,status) values ('$a','$b','$c','$d','$e')";


if(mysqli_query($conn, $sql))
{
	echo header("Location:staff.php");
}
else
{
   echo "Error:" . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>