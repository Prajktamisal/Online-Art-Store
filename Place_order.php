<?php
	session_start();

	include('connection.php');
  include("a_function.php");

  $user_data = check_login($con);
  $id= $user_data['artist_id'];
	$sql = "SELECT * FROM image";

	$result = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>All Products</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Art Store</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
 
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $user_data['artist_name']; ?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container">

	<div class="row">
    <fieldset>         
    <h2>Shiping Address</h2>
    <div class="col-sm-6">
    <div class="form-group">
    <label for="formGroupExampleInput">First Name</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="First Name" require>
  </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
    <label for="formGroupExampleInput">Last Name</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Last Name">
    </div>
    </div>
  
    <div class="col-sm-6">
    <div class="form-group">
    <br>
    <label for="formGroupExampleInput">Email</label>
    <input type="email" class="form-control" id="formGroupExampleInput" placeholder="Email">
    </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
    <br>
    <label for="formGroupExampleInput">Phone Number</label>
    <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Phoen Number">
    </div>
    </div>
    
    <div class="col-sm-6">
    <div class="form-group">
    <br>
    <label for="formGroupExampleInput">Address Line 1</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Address Line 1">
    </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
    <br>
    <label for="formGroupExampleInput">Address Line 2</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Address Line 2">
    </div>
    </div>

    <div class="col-sm-6">
    <div class="form-group">
    <br>
    <label for="formGroupExampleInput">Country</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Country">
    </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
    <br>
    <label for="formGroupExampleInput">State</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="State">
    </div>
    </div>
    
    <div class="col-sm-6">
    <div class="form-group">
    <br>
    <label for="formGroupExampleInput">City</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="City">
    </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group">
    <br>
    <label for="formGroupExampleInput">Zip/Postal Code</label>
    <input type="Number" class="form-control" id="formGroupExampleInput" placeholder="Zip/Postal code">
    </div>
    <div class ="col-sm-3 btn-group">
    <a class = 'btn btn-success' href ='BuyProductAlert.php' >Buy Product</a>
    </div>
    </div>

</div>
</div>
