<?php
session_start();

// initializing variables
$name = "";
$leavingfrom = "";
$leavingto= "";
$departure= "";
$company_name = "";
$coach_type= "";
$seat = "";
$address= "";
$phone= "";
$payment= "";
$errors = array();
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'testingdb');
if (!$db) {
    die("Connection failed: " .mysqli_connect_error());
}

// REGISTER USER
if (isset($_POST['cancel_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $leavingfrom = mysqli_real_escape_string($db, $_POST['leavingfrom']);
  $leavingto = mysqli_real_escape_string($db, $_POST['leavingto']);
  $departure = mysqli_real_escape_string($db, $_POST['departure']);
  $company_name = mysqli_real_escape_string($db, $_POST['company_name']);
  $seat = mysqli_real_escape_string($db, $_POST['seat']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
   

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($leavingfrom)) { array_push($errors, "leaving from is required"); }
  if (empty($leavingto)) { array_push($errors, "leaving to  is required"); }
  if (empty($departure)) { array_push($errors, "Departure time is required"); }
  if (empty($company_name)) { array_push($errors, "Bus name is required"); }
  if (empty($phone)) { array_push($errors, "Phone number is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if ($name != $name) {
	array_push($errors, "Name does not match");
  }
  if ($leavingto != $leavingto) {
	array_push($errors, "Leaving to does not match");
  }
  if ($leavingfrom != $leavingfrom) {
	array_push($errors, "Leaving from does not match");
  }
  if ($departure!= $departure) {
	array_push($errors, "Departure do not match");
  }
  if ($company_name != $company_name) {
	array_push($errors, "company_name does not match");
  }
  
  if ($phone != $phone) {
	array_push($errors, "Phone number  do not match");
  }
  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    
  	$sql = "DELETE FROM researvation
           WHERE name ='$name'";
  	mysqli_query($db, $sql);
  	$_SESSION['name'] = $name;
  	$_SESSION['success'] = "deletion successfull";
  	header('location: cancelindex.php');
  }
} ?>
<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
*{
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 120%;
  background: #F8F8FF;
}

.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
</style>
<body>
  <div class="header">
  	<h2>CANCEL RESEARVATION</h2>
  </div>
	
  <form method="post" action="cancel.php">
  
  
  	<div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name" value="<?php echo $name; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Leaving from</label>
  	  <input type="text" name="leavingfrom" value="<?php echo $leavingfrom; ?>">
  	</div>
  	<div class="input-group">
  	  <label>leaving to</label>
  	  <input type="text" name="leavingto" value="<?php echo $leavingto; ?>">
	  </div>
	<div class="input-group">
  	  <label>Departure date</label>
  	  <input type="date" name="departure" value="<?php echo $departure; ?>">
  	</div>
	<div class="input-group">
  	  <label>Bus name </label>
  	  <input type="text" name="company_name" value="<?php echo $company_name; ?>">
  	</div>
  	  <label>Phone</label>
  	  <input type="text" name="phone" value="<?php echo $phone;?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="cancel_user">DELETE Researvation</button>
  	</div>
  	<p>
  		BOOK TICKET AGAIN? <a href="bookticket.php">BOOK TICKET</a>
  	</p>
  </form>
</body>
</html>