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
</script>

  <div class="page-header">
    <h1 class = "text-center">
      All Listed Products
    </h1>
  </div>

  <div class="container">
  	<table class="table table-striped table-borderrer">
      <tr>
        <th>Image</th>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Product Price</th>
        <th>Actions</th>
      </tr>

      <?php
        if($result->num_rows > 0){
            while($row = mysqli_fetch_array($result)){
              echo "<tr>";
                echo "<td>"."<img src='images/".$row['image']."' width = '350' height = '200'>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['description']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>
                  <div class = 'btn-group'>
                    <a class = 'btn btn-success' href ='./Place_order.php?Name=".$row['name']."' >Buy Product</a>
                   </td>";
              echo "</tr>";
            }
        }
        else
          echo "No data Present";
      ?>
    </table>

  </body>

</html>
