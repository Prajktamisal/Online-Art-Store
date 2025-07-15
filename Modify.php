<?php
require_once('connection.php');

    $id= $_GET['Id'];
    
    //Update data

    // If upload button is clicked ...
    if (isset($_POST['update'])) {
        // Get image name
        $image = $_FILES['image']['name'];
        // Get text
        $description = mysqli_real_escape_string($con, $_POST['description']);
    
        $price = mysqli_real_escape_string($con, $_POST['price']);
    
        $name = mysqli_real_escape_string($con, $_POST['pname']);
    
        // image file directory
        $target = "images/".basename($image);
        
        $update_sql = "UPDATE `image` SET 
        `image`='$image',
        `description`='$description',
        `price`='$price',
        `name`='$name'
         WHERE id = '$id'";
        // execute query
        mysqli_query($con, $update_sql);
    
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo '<script language="javascript">';
            echo 'alert("Product Updated Successfully.");';
            echo '</script>';
        }else{
            echo '<script language="javascript">';
            echo 'alert("There was a problem updating the Product.\nProduct Update Unsuccessful.");';
            echo '</script>';
        }
    }
 
?>

<!DOCTYPE html>
<html>
<head>
<title>Product Delete</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <script type = "text/javascript">
        window.location = "./Show_Artist.php";
        
    </script>
    
  </body>

</html>