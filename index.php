<?php


$databaseHost = 'localhost';
$databaseName = 'todo';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Single Page To Do Application</title>
  </head>
  <body>
    <?php

if(isset($_POST['Submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $asby = $_POST['asby'];
    $subto = $_POST['subto'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $result = mysqli_query($mysqli, "INSERT INTO task(id,name,asby,subto,date,time) VALUES('$id','$name','$asby','$subto','$date','$time')");   
  }
  ?>
  
    <div class="container">
      <div class="jumbotron">
     <div class="text-center"> 
      <h6>Task/Appointment Details</h6>
    </div>
    <div class="container">
      <div class="jumbotron">
        <form action="" method="post" name="form1">
    <table width="25%" border="0">
      <tr>
        <td>ID</td>
        <td><input type="text" name="id"></td>
      </tr>
      <tr>
        <td>Task Name</td>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <td>Assign By</td>
        <td><input type="text" name="asby"></td>
      </tr>
       <tr>
        <td>Submit To</td>
        <td><input type="text" name="subto"></td>
      </tr>
       <tr>
        <td>Date</td>
        <td><input type="text" name="date"></td>
      </tr>
       <tr>
        <td>Time</td>
        <td><input type="text" name="time"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="Submit" value="Create Task"></td>
      </tr>
    </table>
  </form>
      </div>
    </div>
    <br>
 <table class="w3-table-all">

    <tr>
        <th>ID</th> <th>TaskName</th> <th>Assign By</th> <th>Submit To</th><th>Date</th><th>Time</th><th>Edit</th><th>Delete</th>
    </tr>
    <?php
    $result = mysqli_query($mysqli, "SELECT * FROM task ORDER BY id ASC");
    while($user_data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$user_data['id']."</td>";
        echo "<td>".$user_data['name']."</td>";
        echo "<td>".$user_data['asby']."</td>";
        echo "<td>".$user_data['subto']."</td>";
        echo "<td>".$user_data['date']."</td>";
        echo "<td>".$user_data['time']."</td>";
        echo "<td>Edit</td>";
        echo "<td>Delete</td>";
        
    }
    ?>
    </table>

 

</div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
