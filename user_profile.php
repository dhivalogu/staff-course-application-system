<?php
session_start();
if($_SESSION['username']=='principal')
{
	?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<style>
header{width:100%; height:50px;background-color:dodgerblue; }
</style>
</head>
<body>
<header>
    <div class="container" style="background:rgba(51,51,51,1); height:100px;">
        <div class="row">
            <div class="col-md-1">
				<h1 align="center"> Welcome&nbsp;<?php  echo $_SESSION['username']; ?> </h1>
                <a href="#" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
            </div>      
        </div>
    </div>
</header>
<section>
    
    
</section>

</body>
</html>
<?
else
{
	echo header('Location:index.html');
}