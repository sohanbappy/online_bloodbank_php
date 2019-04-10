 
<?php

include "../function/config.php";
include "../function/Database.php";
?>

<?php 
 $db = new Database();
 $query = "SELECT * FROM request_tb";
 $read = $db->select($query);
?>















<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">




		#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
  margin-top: 1%;
  margin-left: 3%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;





}

h1{
	margin-left:30%;
}

.joy a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin-left:10%;
  margin-top: 2%;
}


	</style>
</head>
<body>

<h1><b>CRUD in OOP</b></h1>

<table id="customers">
  <tr>
  	<th>Serial</th>
    <th>Request ID</th>
    <th> Sender</th>
    <th>Receiver</th>
      <th>Request Date</th>
    <th>status</th>
  
  
    <th colspan="2">Action</th>
  </tr>

 <?php if($read){?>
<?php 
$i=1;
while($row = $read->fetch_assoc()){
?>

<tr>
  <td><?php echo $i++ ?></td>
 <td><?php echo $row['req_id']; ?></td>
 <td><?php echo $row['sender']; ?></td>
 <td><?php echo $row['receiver']; ?></td>
  <td><?php echo $row['req_date']; ?></td>
   <td><?php echo $row['status']; ?></td>

 <td><a href="UpdateRequest.php?serial=<?php echo $row['serial']; ?>">Edit</a></td>
  <td><a href="DeleteRequest.php?serial=<?php echo $row['serial']; ?>">Delete</a></td>

 
</tr>


<?php } ?>
<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>
















</table>
<div class="joy">
 <a href="InsertRequest.php"><b>create</b></a>

</div>

</body>
</html>