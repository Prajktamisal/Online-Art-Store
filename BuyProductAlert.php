<?php
	session_start();

	include('connection.php');
  include("a_function.php");

  $user_data = check_login($con);
  $id= $user_data['artist_id'];
  

    echo '<script language="javascript">';
    echo 'alert("You have bought the product.\nThanks for shopping with us.");';
    echo '</script>';
        
?>


<!DOCTYPE html>
<html?>
<head>
<title>Product Bought</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<script type = "text/javascript">

    window.location = "./Show_User.php";

</script>

</body>

</html>