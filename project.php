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
<title>BUS TICKET BUY ONLINE</title>
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
.header {
    background-image: url("back.JPG");
    padding: 10px;
    text-align: center;
	font-size:50px;
}
.header1 {
     background-color: #008080;
    padding: 5px;
    text-align: center;
	font-size:10px;
}

/* Style the top navigation bar */
.topnav {
    overflow: hidden;
    background-color: #333;
}
#container ul li:hover{
	 background-color:#388222;
	 }
	 #container ul ul{
	 display:none;
	 }
	 #container ul li:hover > ul{ 
	 
	 display:block;
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
.topnav a:hover {
    background-color: #ddd;
    color: black;
}
.column {
    float: left;
    width: 50%;
    padding: 15px;
}

.row:after {
    content: "";
    display: table;
    clear: both;
}
#footer_link{

			text-align: center;
			width: 100%;
			padding: 4px 0px;
			color: white;
			background-color: black;
			margin-top: 20px;
		}
/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media (max-width:800px) {
    .column {
        width: 100%;
    }
}

body {
    
    background-image: url("busswall.JPG");
}
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    
    padding: 5px;
    background-color: DimGray;
}

#customers tr:nth-child{background-color: #008080;}

#customers tr:hover{background-color: #008080;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #008080;
    color: white;
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
.section{ 
   width:auto;
   height:500px;
   margin:20px;
	}
</style>
</head>
<body>

<div class="header">
  <h1><b><strong> JATAYAT.com</strong></b></h1>
</div>

<div class="topnav">
  <a href="http://localhost/example/register.php">Create an account </a>
  <a href="http://localhost/example/loggin.php">Sign in</a>
  <a href="http://localhost/example/adminlogin.php">Admin </a>
  <a href="http://localhost/example/bookticket.php">Book Ticket</a>
  <a href="http://localhost/example/cancel.php">Cancel Ticket</a>
</div>
<div class="header1">
  <h5><marquee><b>Routes : Dhaka->Rajshahi,Dhaka->Chapainawabganj,Dhaka->Kansat,Rajshahi->Dhaka,Kansat->Mohakhali,Chapainawabganj->Dhaka,Kansat->Dhaka( by pass ),Dhaka->Rahanpur</b></marquee></h5>
</div>
<body>
<div class="row">
  <div class="column">
    <?php 
				 
                 $user = 'root';
                 $pass = '';
                 $db = 'testingdb';
                 // Create connection
                 $db = new mysqli('localhost', $user, $pass ,$db) or die ("unable to connect");
                  
				  $conn= mysqli_connect('localhost','root','','testingdb');
				  if(isset($_POST['Leaving_from']) ){
					  $searchkey =$_POST['Leaving_from'];
					  $sql ="select * from table3 Where departure_from LIKE '$searchkey'";
					  
				  }
				  else if(isset($_POST['Leaving_to'])){
					  $searchkey =$_POST['Leaving_to'];
					  $sql ="select * from table3 Where departure_to LIKE '$searchkey'";
				  }
				  else if(isset($_POST['departure_time'])){
					  $searchkey =$_POST['departure_time'];
					  $sql ="select * from table3 Where departure_time LIKE '$searchkey'";
				  }
				  else if(isset($_POST['coach_type'])){
					  $searchkey =$_POST['coach_type'];
					  $sql ="select * from table3 Where coach_type LIKE '$searchkey'";
				  }
				  else
				  $sql ="select * from table3";
				  $result=mysqli_query($conn,$sql);
	?>
    <br/>
	<br/>
	<br/>
    <div class="w3-container w3-red">
      <h2><i class="fa fa-bus w3-margin-right"></i>Search bus</h2>
    </div>
	<form action="" method="POST"> 
    <div class="w3-container w3-white w3-padding-16">
      <form action="/action_page.php" target="_blank">
        <div class="w3-row-padding" style="margin:0 -16px;">
          <div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-map-marker"></i> Leaving from</label><br/>
			<input class="w3-input w3-border" name="Leaving_from" type="search" class='form-control' placeholder="Search By Name" value="" required>
          </div>
          <div class="w3-half">
            <label><i class="fa fa-map-marker"></i> Leaving to </label>
            <input class="w3-input w3-border" name="Leaving_to" type="search" class='form-control' placeholder="Search By Name" value="" >
          </div>
        </div>
        <div class="w3-row-padding" style="margin:8px -16px;">
          <div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-calendar-o"></i> Departure time</label>
            <input class="w3-input w3-border" name="Departure_time" type="search" class='form-control' placeholder="DD MM YYYY" value=""  >
          </div>
          <div class="w3-half">
            <label><i class="fa fa-bus"></i> Coach type</label>
          <input class="w3-input w3-border"  name="Coach_type" type="search" class='form-control' placeholder="Search By Name" value="" >
          </div>
		  <br>
        <button class="w3-button w3-dark-grey" type="submit"><i class="fa fa-search w3-margin-right"></i> Search availability</button>
      </form>
    </div>
	</div>
	</form>
	<br/>
    <br/>
	<br/>
    <br/>
	</div>
	<div class="column">
	</div>
	</div>
	
	</div>
	<div>
	
	<table id="bus">
                        <tr>
						<th>Departure from</th>
						<th>Departure to</th>
						<th>Departure Date</th>
						<th>Coach type</th>
						<th>Company name</th>
						<th>Departing time</th>
						<th>Arrival time</th>
						<th>Fare</th>
						<th>Distance</th>
						<th>Available seats</th>
					</tr>
					<?php while($row=mysqli_fetch_object($result)){?>
					<tr>
						
						<td><?php echo $row->departure_from?></td>
						<td><?php echo $row->departure_to?></td>
						<td><?php echo $row->departure_time?></td>
						<td><?php echo $row->coach_type?></td>
						<td><?php echo $row->company_name?></td>
						<td><?php echo $row->departing_time?></td>
						<td><?php echo $row->arrival_time?></td>
						<td><?php echo $row->fare?></td>
						<td><?php echo $row->distance?></td>
						<td><?php echo $row->available_seats?></td>
					</tr>
					<?php } ?>
				</table>
 </div>
  </div>
</div>
</body>
<br/>
<br/>
<br/>
<br/>
<div class="after-box"><b>BUS OPERATORS</b></div>
<table id="customers">
  <tr>
    <th>Desh Travels</th>
    <th>Shyamoli Paribahan</th>
    <th>Surovi Paribahan</th>
	<th>Silk Line</th>
  </tr>
  <tr>
    <th>National Travels </th>
    <th>Sonartori Paribahan</th>
    <th>Kuakata Express</th>
	<th>Grameen Travels</th>
  </tr>
  <tr>
    <th> SaintMartin Paribahan</th>
    <th>Saintmartin Service</th>
    <th>Manik Express</th>
	<th>Century Travels</th>
  </tr>
  <tr>
    <th> AK Travels</th>
    <th>Baghdad Express</th>
    <th>Aqib Enterprise	</th>
	<th>Shanti Paribahan</th>
  </tr>
  <tr>
    <th> S.Alam Service</th>
    <th>S.Alam Service</th>
    <th>Dhaka Express</th>
	<th>Seven Star Paribahan</th>
  </tr>
  <tr>
    <th> </th>
    <th></th>
    <th></th>
	<th></th>
  </tr>
  
  
</table>
<div id="footer_link">
		<p>Copyright @JATAYAT.COM 
		All Rights Reserved
		</p> 
		<p><a href="feedbacknew.php">Feedback  </a><a href="map.php">   Google map</a></p>
	</div>
</body>
</html>
