<?php
session_start();

// initializing variables
$departure_from = "";
$departure_to= "";
$departure_time = "";
$coach_type = "";
$company_name = "";
$departing_time = "";
$arrival_time = "";
$fare = "";
$distance = "";
$available_seats = "";
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
  $departure_from = mysqli_real_escape_string($db, $_POST['departure_from']);
  $departure_to = mysqli_real_escape_string($db, $_POST['departure_to']);
  $departure_time= mysqli_real_escape_string($db, $_POST['departure_time']);
  $coach_type = mysqli_real_escape_string($db, $_POST['coach_type']);
  $company_name = mysqli_real_escape_string($db, $_POST['company_name']);
  $departing_time = mysqli_real_escape_string($db, $_POST['departing_time']);
  $arrival_time = mysqli_real_escape_string($db, $_POST['arrival_time']);
  $fare = mysqli_real_escape_string($db, $_POST['fare']);
  $distance = mysqli_real_escape_string($db, $_POST['distance']);
  $available_seats = mysqli_real_escape_string($db, $_POST['available_seats']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($departure_from)) { array_push($errors, "departure_from is required"); }
  if (empty($departure_to)) { array_push($errors, "departure_to is required"); }
  if (empty($departure_time)) { array_push($errors, "departure_time  is required"); }
  if (empty($coach_type)) { array_push($errors, "coach_type is required"); }
  if (empty($company_name)) { array_push($errors, "Bus name is required"); }
  if (empty($departing_time)) { array_push($errors, "departing_time is required"); }
  if (empty($arrival_time)) { array_push($errors, "arrival_time is required"); }
  if (empty($fare)) { array_push($errors, "fare is required"); }
  if (empty($distance)) { array_push($errors, "distance is required"); }
  if (empty($available_seats)) { array_push($errors, "available_seats is required"); }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    
  	$sql = "INSERT INTO table3(departure_from,departure_to,departure_time,coach_type,company_name,departing_time,arrival_time,fare,distance,available_seats) 
  			  VALUES('$departure_from','$departure_to','$departure_time','$coach_type','$company_name','$departing_time','$arrival_time','$fare','$distance','$available_seats')";
  	mysqli_query($db, $sql);
  	$_SESSION['name'] = $name;
  	$_SESSION['success'] = "researvation successfull";
  	header('location: adminview.php');
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
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
</style>
<body class="w3-light-grey">
<head>
<title>Adminview</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */
.header1 {
    background-image: url("back.JPG");
    padding: 10px;
    text-align: center;
	font-size:50px;
}

/* Style the top navigation bar */
.topnav {
    overflow: hidden;
    background-color: #333;
}

/* Style the topnav links */
.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

/* Change color on hover */


body {
    
    font-size: 120%;
    background: #F8F8FF;
}

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
.after-box {
    clear: left;
    border: 2px solid RosyBrown;
    background-color: #FAF0E6;
    padding:6px;
	font-size:30px;
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
</head>
<div class="header1">
  <h1><b>Customer information</b></h1>
</div>
<br/>
<body>
<div class="row">
  
    <?php 
				 
                 $user = 'root';
                 $pass = '';
                 $db = 'testingdb';
                 // Create connection
                 $db = new mysqli('localhost', $user, $pass ,$db) or die ("unable to connect");
                  
				  $conn= mysqli_connect('localhost','root','','testingdb');
				  $sql ="select * from researvation";
				  $result=mysqli_query($conn,$sql);
	?>
	
	</div>
	<div>
	
	<table id="bus">
                        <tr>
						<th>Ticket id</th>
						<th>Name</th>
						<th>Leaving from</th>
						<th>Leaving to</th>
						<th>Departure Date</th>
						<th>BUS company name </th>
						<th>Coach type</th>
						<th>Seat</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Payment</th>
					</tr>
					<?php while($row=mysqli_fetch_object($result)){?>
					<tr>
						<td><?php echo $row->id?></td>
						<td><?php echo $row->name?></td>
						<td><?php echo $row->leavingfrom?></td>
						<td><?php echo $row->leavingto?></td>
						<td><?php echo $row->departure?></td>
						<td><?php echo $row->company_name?></td>
						<td><?php echo $row->coach_type?></td>
						<td><?php echo $row->seat?></td>
						<td><?php echo $row->address?></td>
						<td><?php echo $row->phone?></td>
						<td><?php echo $row->payment?></td>
					</tr>
					<?php } ?>
				</table>
 </div>
 <br/>
<br/>
<br/>
<br/>
 <div>
 <div>
 <div class="header1">
 <h2>Bus details</h2>
 </div>
<br/>
<br/>
<br/>
<br/>
   <form method="post" action="adminview.php">

  	<div class="input-group">
  	  <label>Leaving from</label>
  	  <input type="text" name="departure_from" value="<?php echo $departure_from?>">
  	</div>
  	<div class="input-group">
  	  <label>leaving to</label>
  	  <input type="text" name="departure_to" value="<?php echo $departure_to?>">
	  </div>
	<div class="input-group">
  	  <label>Departure date</label>
  	  <input type="date" name="departure_time" value="<?php echo $departure_time?>">
  	</div>
	<div class="input-group">
  	  <label>Bus name </label>
  	  <input type="text" name="company_name" value="<?php echo $company_name; ?>">
  	</div>
	<div class="input-group">
  	  <label>Departing time</label>
  	  <input type="text" name="departing_time" value="<?php echo $departing_time?>">
  	</div>
	<div class="input-group">
  	  <label>Coach type</label>
  	  <input type="text" name="coach_type" value="<?php echo $coach_type?>">
  	</div>
	<div class="input-group">
  	  <label>Arrival time</label>
  	  <input type="text" name="arrival_time" value="<?php echo $arrival_time?>">
  	</div>
	<div class="input-group">
  	  <label>Fare</label>
  	  <input type="text" name="fare" value="<?php echo $fare?>">
  	</div>
	<div class="input-group">
  	  <label>Distance</label>
  	  <input type="text" name="distance" value="<?php echo $distance?>">
  	</div>
	<div class="input-group">
  	  <label>Available seat</label>
  	  <input type="text" name="available_seats" value="<?php echo $available_seats?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="book_user">SUBMIT</button>
  	</div>
  </form>
 </div>
 </div>
</body>
<br/>
<br/>
<br/>
<br/>


</body>
</html>
