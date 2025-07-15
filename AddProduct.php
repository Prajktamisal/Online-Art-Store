<?php
session_start();

include('connection.php');
include("a_function.php");
	$user_data = check_login($con);
  $a_id = $user_data['artist_id'];
    // If upload button is clicked ...
    if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    
    // Get text
    $description = mysqli_real_escape_string($con, $_POST['description']);

    $price = mysqli_real_escape_string($con, $_POST['price']);

    $name = mysqli_real_escape_string($con, $_POST['pname']);

    // image file directory
    $target = "images/".basename($image);

    $sql = "INSERT IGNORE INTO image (artist_id,image, description, price, name) VALUES ('$a_id','$image', '$description', '$price', '$name')";
    // execute query
    mysqli_query($con, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      echo '<script language="javascript">';
      echo 'alert("Product Uploaded Successfully.");';
      echo '</script>';
    }else{
      echo '<script language="javascript">';
      echo 'alert("There was a problem uploading the Product.\nProduct Upload Unsuccessful.");';
      echo '</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Product Information</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

</style>
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
<script type = "text/javascript">

function buttonClick()
{
    window.location = "./Show_Artist.php";
}

</script>

<div class="page-header">
    <h1 class = "text-center">
      Add New Product
    </h1>
  </div>

  <div class="container">
    <div class="row align-item-center">
      <div class = "col-md-8 offset-md-3 col-sm-12">
        <form method="POST" action="AddProduct.php" enctype="multipart/form-data">
          <div class = "form-group">
            <label for="image">Select Product Image</label>
            <input type="file" class = 'form-control' name="image" id="image" accept="image/jpeg,image/jpg,image/png" required="true">
          </div>

          <div class = "form-group">
            <label for="pname">Product Name</label>
            <input type="text" class = 'form-control' name="pname" id="pname" required="true">
          </div>

          <div class = "form-group">
            <label for="description">Product Description</label>
            <textarea class = 'form-control' name="description" id="description" required="true"></textarea>
          </div>

          <div class = "form-group">
            <label for="price">Product Price</label>
            <input type="number" class = 'form-control' name="price" id="price" required>
          </div>

          <div class="">
  		    <button type="submit" class = 'btn btn-success' name="upload" >Add to Sell</button>
          <input type ="button"  class = 'btn btn-primary' name="back" onclick = "buttonClick()" value = "Back"></input>
          </div>


    </div>
        </form>
      </div>
    </div>
  </div>
  
  </body>

</html>
