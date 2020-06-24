<?php
session_start();
if(isset($_SESSION['username']))
{	
	$conn=mysqli_connect("localhost","root","","company");
if(!$conn)
 die("connection failed:".mysqli_connect_error());

else{
$a=$_POST['i'];
$b=$_POST['d']; 
$sql="UPDATE course SET STATUS=-1 WHERE name='$a' AND  cname='$b'";
$result=mysqli_query($conn,$sql); 
if(mysqli_query($conn, $sql))
{
	if($_SESSION['username']=='principal')
		echo header('Location:principal.php');
	else
		echo header('Location:hod.php');
}
else
{
   echo "Error:" . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
		
}
else
{
echo header('Location:index.html');

}
?>