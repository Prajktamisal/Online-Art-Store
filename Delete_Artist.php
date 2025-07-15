<?php
require_once('connection.php');

    $id= $_GET['Id'];   
    //Delete data
    $delete_sql = "DELETE FROM `artist` WHERE artist_id = $id"; 
        // execute query
    mysqli_query($con, $delete_sql);
    
    $sql = "SELECT * FROM artist WHERE artist_id = $id";   

	$data = mysqli_query($con,$sql);

    if($data->num_rows <= 0){
            echo '<script language="javascript">';
            echo 'alert("User Deleted Successfully.");';
            echo '</script>';
        }else{
            echo '<script language="javascript">';
            echo 'alert("There was a problem deleting the User.\nUser Delete Unsuccessful.");';
            echo '</script>';
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

        window.location = "./a_Show_Admin.php";
    
    </script>
    
  </body>

</html>
