<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta charset="UTF-8">
	<title>PHP Search</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="margin-top: 5%;">
				<div class="row">
				<?php 
				 
                 $user = 'root';
                 $pass = '';
                 $db = 'testdb';
                 // Create connection
                 $db = new mysqli('localhost', $user, $pass ,$db) or die ("unable to connect");
                  echo "Connected successfully";
				  $conn= mysqli_connect('localhost','root','','testingdb');
				  
				  if(isset($_POST['search'])){
					  $searchkey =$_POST['search'];
					  $sql ="select * from table1 Where departure_from LIKE '$searchkey'";
				  }else
				  $sql ="select * from table1";
				  $result=mysqli_query($conn,$sql);
				 ?>
				<form action="" method="POST"> 
					<div class="col-md-6">
						<input type="text" name="search" class='form-control' placeholder="Search By Name" value="" > 
					</div>
					<div class="col-md-6 text-left">
						<button class="btn">Search</button>
					</div>
				</form>

				<br>
				<br>
				</div>
				<table class="table table-bordered">
					<tr>
						<th>departure_from</th>
						<th>departure_to</th>
						<th>departure_time</th>
						<th>coach_type</th>
					</tr>
					<?php while($row=mysqli_fetch_object($result)){?>
					<tr>
						
						<td><?php echo $row->departure_from?></td>
						<td><?php echo $row->departure_to?></td>
						<td><?php echo $row->departure_time?></td>
						<td><?php echo $row->coach_type?></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>