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
$ticket ="";
$errors = array();
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'testingdb');
if (!$db) {
    die("Connection failed: " .mysqli_connect_error());
}
echo "Connected successfully";
// REGISTER USER
if (isset($_POST['book_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $leavingfrom = mysqli_real_escape_string($db, $_POST['leavingfrom']);
  $leavingto = mysqli_real_escape_string($db, $_POST['leavingto']);
  $departure = mysqli_real_escape_string($db, $_POST['departure']);
  $company_name = mysqli_real_escape_string($db, $_POST['company_name']);
  $coach_type = mysqli_real_escape_string($db, $_POST['coach_type']);
  $seat = mysqli_real_escape_string($db, $_POST['seat']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $payment = mysqli_real_escape_string($db, $_POST['payment']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($leavingfrom)) { array_push($errors, "leaving from is required"); }
  if (empty($leavingto)) { array_push($errors, "leaving to  is required"); }
  if (empty($departure)) { array_push($errors, "Departure time is required"); }
  if (empty($company_name)) { array_push($errors, "Bus name is required"); }
  if (empty($seat)) { array_push($errors, "Number of seat is required"); }
  if (empty($phone)) { array_push($errors, "Phone number is required"); }
  if (empty($payment)) { array_push($errors, "Payment method is required"); }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    
  	$sql = "INSERT INTO researvation(name,leavingfrom,leavingto,departure,company_name,coach_type,seat,address,phone,payment) 
  			  VALUES('$name','$leavingfrom','$leavingto','$departure','$company_name','$coach_type','$seat','$address','$phone','$payment')";
  	mysqli_query($db, $sql);
  	$_SESSION['name'] = $name;
  	$_SESSION['success'] = "researvation successfull";
  	header('location: bookindex.php');
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
  	<h2>Researve seat</h2>
  </div>
	
  <form method="post" action="bookticket.php">
  
  
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
	<div class="input-group">
  	  <label>Coach type</label>
  	  <input type="text" name="coach_type" value="<?php echo $coach_type; ?>">
  	</div>
	<div class="input-group">
  	  <label>Number of seat</label>
  	  <input type="number" name="seat" value="<?php echo $seat; ?>">
  	</div>
	<div class="input-group">
  	  <label>Address</label>
  	  <input type="text" name="address" value="<?php echo $address;?>">
  	</div>
  	<div class="input-group">
  	  <label>Phone</label>
  	  <input type="text" name="phone" value="<?php echo $phone;?>">
  	</div>
  	<div class="input-group">
  	  <label>Payment method (Bkash/Rocket/Credit card)</label>
  	  <input type="text" name="payment" value="<?php echo $payment;?>">
     </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="book_user">Confirm Researvation</button>
  	</div>
  	<p>
  		Already a member? <a href="loggin.php">Sign in</a>
  	</p>
  </form>
</body>
</html>