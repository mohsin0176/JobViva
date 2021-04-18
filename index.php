<?php

$databaseHost = 'localhost';
$databaseName = 'todo';
$databaseUsername = 'root';
$databasePassword = '';
$mysqli = mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);
 

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Single Page To Do Application</title>
  </head>
  <body>
    <?php

if(isset($_POST['Submit'])) 
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $asby = $_POST['asby'];
    $subto = $_POST['subto'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $result = mysqli_query($mysqli, "INSERT INTO task(id,name,asby,subto,date,time) VALUES('$id','$name','$asby','$subto','$date','$time')");   
}
if(isset($_GET['id']) && isset($_GET['del']))
{
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM task WHERE id=$id");
header("Location:index.php");
}
if(isset($_GET['id']) && isset($_GET['ed']))
{
 
	$id = $_GET['id'];
    $result = mysqli_query($mysqli, "SELECT * FROM task WHERE id=$id");
    while($user_data = mysqli_fetch_array($result)) 
    {

	$id = $user_data['id'];
	$name=$user_data['name'];
	$asby=$user_data['asby'];
	$subto=$user_data['subto'];
	$date=$user_data['date'];
	$time=$user_data['time'];        
    }
    if(isset($_POST['edit'])) 
	{
	$id = $_POST['id'];
	$name=$_POST['name'];
	$asby=$_POST['asby'];
	$subto=$_POST['subto'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$query="UPDATE task SET id='$id',name='$name',asby='$asby',subto='$subto',date='$date',time='$time' WHERE id='$id'";
	$result = mysqli_query($mysqli,$query);
	if ($mysqli) 
	{
		header("Location: index.php");
	}
	else
	{
        echo "failed";
	}

	} 


    
  

?>	
	<div class="container">
    <div class="jumbotron">
  <!-- Trigger the modal with a button -->
 <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal" style="font-size: 15px;font-weight: 15px;">EDIT TASK :<?php echo "TaSk iD iS :".$id; ?></button>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      
      <!-- Modal content-->
      <div class="modal-content">
 
        <div class="modal-body">
          <!-----------------edit Body ----------------->
          <form action="" method="POST" name="form1">
    <table width="100%" border="0">
      <tr>
        <td>ID</td>
        <td><input type="text" name="id"value=<?php echo $id;?>></td>
      </tr>
      <tr>
        <td>Task Name</td>
        <td><input type="text" name="name" value=<?php echo $name;?>></td>
      </tr>
      <tr>
        <td>Assign By</td>
        <td><input type="text" name="asby"value=<?php echo $asby;?>></td>
      </tr>
       <tr>
        <td>Submit To</td>
        <td><input type="text" name="subto"value=<?php echo $subto;?>></td>
      </tr>
       <tr>
        <td>Date(Y/M/D)</td>
        <td><input type="text" name="date"value=<?php echo $date;?>></td>
      </tr>
       <tr>
        <td>Time(H/M/S)</td>
        <td><input type="text" name="time"value=<?php echo $time;?>></td>
      </tr>

      <tr>
        <td></td>
        <td><input type="submit" name="edit" class="btn btn-default"value="Done"></td>
      </tr>
    </table>
  </form>
          <!----------------  end of edit body    ------------->
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal" onClick="parent.location='index.php'">Quit Edit</button>
        </div>
      </div>
      
    </div>
  </div>
  </div>
</div>
<?php

}
 
  ?>

    <div class="container">
      <div class="jumbotron">
     <div class="text-center"> 
      <h6>Task/Appointment Details</h6>
    </div>
    <div class="container">
      <div class="jumbotron">
        <form action="index.php" method="POST" name="form1">
    <table width="100%" border="0">
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
        <td>Date(Y/M/D)</td>
        <td><input type="text" name="date"></td>
      </tr>
       <tr>
        <td>Time(H/M/S)</td>
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
        <th>ID</th> <th>TaskName</th> <th>Assign By</th> <th>Submit To</th><th>Date(Y/M/D)</th><th>Time(H/M/S)</th><th>Edit</th><th>Delete</th>
    </tr>
    <?php
    $result = mysqli_query($mysqli, "SELECT * FROM task ORDER BY id ASC");
    while($user_data = mysqli_fetch_array($result)) 
    {
        echo "<tr>";
        echo "<td>".$user_data['id']."</td>";
        echo "<td>".$user_data['name']."</td>";
        echo "<td>".$user_data['asby']."</td>";
        echo "<td>".$user_data['subto']."</td>";
        echo "<td>".$user_data['date']."</td>";
        echo "<td>".$user_data['time']."</td>";
        echo "<td><a href='index.php?id=$user_data[id]& ed=edit'>Edit</a></td>";
        echo "<td><a href='index.php?id=$user_data[id]& del=delete'>Delete</a></td>"; 
        
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
