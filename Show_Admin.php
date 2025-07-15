<?php
	require_once('connection.php');

	$sql = "SELECT * FROM users"; //Change the table name (kaustubh)

	$result = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>All Users</title>
<<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
    <li><a href="a_Show_Admin.php"><span class="glyphicon glyphicon"></span> Artist Data</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> ADMIN</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<br>

  <div class="page-header">
    <h1 class = "text-center">
       List Of User
    </h1>
  </div>
  

  <div class="container">
  	<table class="table table-striped table-borderrer">
      <tr>
        <th>User Name</th>
        <th>Actions</th>
      </tr>

      <?php
        if($result->num_rows > 0){
            while($row = mysqli_fetch_array($result)){
              echo "<tr>";
                echo "<td>".$row['user_name']."</td>"; //Change the column 'name' according to table (kaustubh)
                echo "<td>
                  <div class = 'btn-group'>
                    <a class = 'btn btn-danger' href ='./Delete_User.php?Id=".$row['id']."' >Delete User</a>
                   </td>";  //Change the column name Id according to table(kaustubh)
              echo "</tr>";
            }
        }
        else
          echo "No data Present";
      ?>
    </table>

  </body>

</html>
