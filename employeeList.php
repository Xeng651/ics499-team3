<?php

include '../config/database.php';
include '../includes/autoLoader.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Colleagues</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style>
    .bg-1 {
      background-color: rgb(238, 232, 232);
      color: #ffffff;
    }

    .bg-2 {
      background-color: rgb(238, 232, 232);
      color: #000000;
    }

    .bg-3 {
      background-color: rgb(238, 232, 232);
      color: #555555;
    }

    .container-fluid {
      padding-top: 5px;
      padding-bottom: 5px;
    }
  </style>
</head>

<body>
<div class="container-fluid bg-1 text-center">
    <h1 style="color:rgb(0, 0, 7)">Your Colleagues </h1>
    <!-- <img src="" class="img-circle" alt="Bird" width="200" height="200"> -->

  </div>
<table class="table table-striped">
<!--  <?php

$employeeContr = new EmployeeContr();
$employees = $employeeContr->selectAllEmployees();
foreach ($employees as $employee) {
    echo $employee['employee_id']. " - ". $employee['first_name']. " - ". $employee['last_name']. " - ". $employee['dept_id']. " - ". $employee['role']. " - ". $employee['phone']
    . " - ". $employee['photo']. " - ". $employee['gender']. " - ". $employee['email_address'];
    echo "<br>";}


 ?>   -->

<table id="editableTable" class="table table-bordered">
	<thead>
		<tr>
			<th>Employee ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Dept ID</th>
            <th>Role</th>	
            <th>Phone</th>		
            <th>Photo</th>	
            <th>Gender</th>
            <th>Email Address</th>												
		</tr>
	</thead>
	<tbody>
    <td><?php echo $employee['employee_id']; ?></td>
		   <td><?php echo $employee['first_name']; ?></td>
		   <td><?php echo $employee['last_name']; ?></td>
		   <td><?php echo $employee['dept_id']; ?></td>
		   <td><?php echo $employee['role']; ?></td>  		
           <td><?php echo $employee['phone']; ?></td>  	
           <td><?php echo $employee['photo']; ?></td>  	
           <td><?php echo $employee['gender']; ?></td>  	
           <td><?php echo $employee['email_address']; ?></td>  			   				   				  
		   </tr>
		
	</tbody>
</table>

</body>

</html>