<?php 
  session_start(); 

  if (isset($_GET['cancel_user'])) {
  	session_destroy();
  	unset($_SESSION['name']);
  	header("location: cancelindex.php");
  }
?>
<!DOCTYPE html>
<html>
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
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['name']; ?> </strong></p>
		<p> successfully deleted researvation </p>
    	<p> <a href="bookticket.php?logout='1'" style="color: red;">Book ticket?</a> </p>
		<p> <a href="project.php?logout='1'" style="color: red;">Back to home</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>