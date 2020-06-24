<?php
session_start();
if($_SESSION['username']=='hod_it')
{$servername="localhost";
$username="root";
$password="";
$dbname="company";
$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
	die("Connection Error:".mysqli_connect_error());
$roll=$_SESSION['username'];   
$sql="SELECT * FROM course WHERE status=0";
$result=mysqli_query($conn,$sql);
	?>
<html>
<head>
<title>HOD</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
<style> 
* {box-sizing: border-box;}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}
body { 
  margin: 0;
  
    font-family: 'Noto Sans TC', sans-serif;
    
  
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 12px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
.button3 {
  background-color: red; 
  color: white; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}
.button4 {
  background-color: green; 
  color: white; 
  
}

.button4:hover {
  background-color: #f44336;
  color: white;
}
</style>
</head>
<body>

<div class="header">
  <a href="#default" class="logo">Welcome&nbsp;<?php  echo $_SESSION['username']; ?></a>
  <div class="header-right">
    <a href="user_logout.php"><button class="button button3">Log Out</button></a>
  </div>
</div>

<div style="padding-left:20px">
 <?php
if(mysqli_num_rows($result)>0)
{
	?>
	<h1 align="center">Pending Requests</h1>
	<table align="center" >
	<tr>
	<th>Staff Name</th><th>Course Name</th>
	<th>Duration(In Days)</th>
	<th>Institution</th>
	<th>Action</th>
	</tr>
	
	<?php
	
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<tr><td>".$row["name"]."</td><td>".$row["cname"]."</td><td>".$row["duration"]."</td><td>".$row["ins"]."</td><td>";
		?>
		
		<form action="approve.php" method="post">
		<input type="hidden"  name="i" value="<?php echo $row["name"]?>">
		<input type="hidden"  name="d" value="<?php echo $row["cname"]?>">
		<input type="submit" class="button button4" value="Approve"></form>
		<form action="reject.php" method="post">
		<input type="hidden"  name="i" value="<?php echo $row["name"]?>">
		<input type="hidden"  name="d" value="<?php echo $row["cname"]?>">
	<input type="submit" class="button button3" value="Reject"></form>
		<?php
				echo "</td></tr>";
			
	}
}
else{
	echo "<br><br><br><br><br><br><br><br><center>No Pending Course Requests!</center>";
}
mysqli_close($conn);
?>
   
</div>

</body>
</html>
<?php
}
else
{
	echo header('Location:index.php');
}
?>