<?php
session_start();

// initializing variables
$name = "";
$email = "";
$feedback= "";
$errors = array();
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'testingdb');
if (!$db) {
    die("Connection failed: " .mysqli_connect_error());
}
echo ".";
// REGISTER USER
if (isset($_POST['submitfeed'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $feedback = mysqli_real_escape_string($db, $_POST['feedback']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($email)) { array_push($errors, "email is required"); }
  if (empty($feedback)) { array_push($errors, "your comment  is required"); }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
 
  	$sql = "INSERT INTO feedback(email,name,feedback) 
  			  VALUES('$email','$name','$feedback')";
  	mysqli_query($db, $sql);
  	$_SESSION['name'] = $name;
  	$_SESSION['success'] = "researvation successfull";
  	header('location: feedindex.php');
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
.feedback {
  margin: 15px 15px 15px 15px;
}
.feedback label {
  display: block;
  text-align: left;
  margin: 3px;
}
.feedback input {
  height: 150px;
  width: 100%;
  padding: 25px 50px 75px 100px;
  font-size: 16px;
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
  	<h2>FEEDBACK</h2>
  </div>
	
	
  <form method="post" action="feedbacknew.php">
    <div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email;?>" required>
  	</div>
	<div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name" value="<?php echo $name;?>" required>
  	</div>
	<label>Feedback</label>
	<div class="feedback">
  	  <input type="text"  name="feedback" value= "<?php echo $feedback;?>"  required>
  	</div>
	<div class="input-group">
  	  <button type="submit" class="btn" name="submitfeed">SUBMIT</button>
  	</div>
	</form>
</body>
</html>