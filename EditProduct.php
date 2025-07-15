<?php
require_once('connection.php');
    
    //Fetch data and display
    $id = $_GET['Id'];

    $sql = "SELECT * FROM image WHERE id = $id";

	  $result = mysqli_query($con,$sql);

    $data = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>
<head>
<title>Product Information</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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

<script type = "text/javascript">

function buttonClick()
{
    window.location = "./Show_Artist.php";
}

</script>

  <div class="jumbotron">
    <h1 class = "text-center">
    Edit Product
    </h1>
  </div>

  <div class="container">
    <div class="row">
      <div class = "col-md-6 offset-md-3 col-sm-12">
        <form method="POST" action="./Modify.php?Id=<?=$id?>" enctype="multipart/form-data">
          <div class = "form-group">
            <label for="image">Select Product Image</label>
            <input type="file" class = 'form-control' name="image" id="image" required="true" accept="image/jpeg,image/jpg,image/png" >
            </div>

          <div class = "form-group">
            <label for="pname">Product Name</label>
            <input type="text" class = 'form-control' name="pname" id="pname" required="true" value = "<?= $data['name']?>">
          </div>

          <div class = "form-group">
            <label for="description">Product Description</label>
            <textarea class = 'form-control' name="description" id="description" required="true"><?= $data['description']?></textarea>
          </div>

          <div class = "form-group">
            <label for="price">Product Price</label>
            <input type="number" class = 'form-control' name="price" id="price" required  value = "<?= $data['price']?>">
          </div>

          <div class = 'center'>
  		    <button type="submit" class = 'btn btn-secondary' name="update">Modify Product</button>
  	      <input type ="button"  class = 'btn btn-secondary' name="back" onclick = "buttonClick()" value = "Back"></input>
          </div>
    </div>
        </form>
      </div>
    </div>
  </div>
  
  </body>

</html>
