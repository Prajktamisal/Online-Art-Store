<?php
	require_once('connection.php');

	$sql = "SELECT * FROM artist"; //Change the table name (kaustubh)

	$result = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>All Users</title>
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
    <li><a href="Show_Admin.php"><span class="glyphicon glyphicon"></span> User Data</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> ADMIN</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<br>

  <div class="page-header">
    <h1 class = "text-center">
       List of Artist
    </h1>
  </div>
  

  <div class="container">
  	<table class="table table-striped table-borderrer">
      <tr>
        <th>User Name</th>
        <th>Email</th>
        <th>Phone number</th>
        <th>View</th>
        <th>Delete</th>

      </tr>

      <?php
        if($result->num_rows > 0){
            while($row = mysqli_fetch_array($result)){
              echo "<tr>";
                echo "<td>".$row['artist_name']."</td>"; 
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['phone_num']."</td>";
                echo "<td>
                  <div class = 'btn-group'>
                    <a class = 'btn btn-success' href ='./view_artist.php?Id=".$row['artist_id']."' >View</a>
                   </td>"; 
                   echo "<td>
                  <div class = 'btn-group'>
                    <a class = 'btn btn-danger' href ='./Delete_Artist.php?Id=".$row['artist_id']."' >Delete</a>
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
