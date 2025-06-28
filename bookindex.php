<?php 
  session_start(); 

  if (!isset($_SESSION['name'])) {
  	$_SESSION['msg'] = "You must book first";
  	header('location: bookticket.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['name']);
  	header("location: loggin.php");
  }
?>
<!DOCTYPE html>
<html>
<style>
#bus {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
	bottom:10%;
	background-size: 100px 80px;
	opacity:0.9;
	width:70%;
}

#bus td, #bus th {
    
    padding: 5px;
    background-color: DimGray;
}

#bus tr:nth-child{background-color: #008080;}

#bus tr:hover{background-color: #008080;}

#bus th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #008080;
    color: white;
}
</style>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    	<p>Welcome <strong><?php echo $_SESSION['name']; ?> your ticket id is <?php echo $_SESSION['id'];?> </strong></p>
    	<p> <a href="bookticket.php?logout='1'" style="color: red;">Book another ticket<a/></p>
		<p> <a href="project.php?logout='1'" style="color: red;">Back to home</a> </p>
</div>
		
</body>
</html>