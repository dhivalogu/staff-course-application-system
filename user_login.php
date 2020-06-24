<?php
session_start();
if(isset($_SESSION['username']))
{	
	if($_SESSION['username']=='principal')
		header('Location:principal.php');
	else if($_SESSION['username']=='hod_it')
		header('Location:hod.php');
	else
		header('Location:staff.php');
}
else
{

$conn=mysqli_connect("localhost","root","","company");
if(!$conn)
 die("connection failed:".mysqli_connect_error());

else{
$a=$_POST['username'];
$b=$_POST['password']; 
$sql="SELECT * FROM login WHERE username='$a' AND password='$b' ";
$result=mysqli_query($conn,$sql); 

if(mysqli_num_rows($result)==1)
{
	$row=mysqli_fetch_assoc($result);
	$user=$row['username'];
	$_SESSION["username"]=$row['username'];
	
	if($user=="principal")
		header("Location:principal.php");

	else if($user=="hod_it")
		header("Location:hod.php");	
	else
		header("Location:staff.php");
	
}
else
{
	?>
	<body onload="fun()">
	<script>
	function fun()
	{
	alert("Account Not Found");
	}
	</script>
	</body>
	<?php
	header("Location:index.html");
	
}
mysqli_close($conn);
}
}
?>