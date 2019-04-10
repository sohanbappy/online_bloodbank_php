  <?php include "../organizationHeader.php";?>
<?php

include "../function/config.php";
include "../function/Database.php";



?>

<?php 
 $db = new Database();

  //validation for Session



 $query = "SELECT * FROM storage_tb WHERE bank_id = '$_SESSION[uid]' ";
 $read = $db->select($query);
?>















<!DOCTYPE html>
<html>
<head>

</head>
<body>


<table class="table table-striped table-bordered table-hover table-dark" >
  <thead style="background-color: black; color:white; font-size: 18px; font-weight: bold;">


  <tr>
  	
    <th>A Positive</th>
    <th>A Negative</th>
      <th>B Positive</th>
    <th>B Negative</th>
    <th>AB Positive </th>
      <th>AB Negative</th>
    <th>O Positive</th>
      <th>O Negative</th>
 
  
    <th colspan="">Action</th>
  </tr>
</thead>

 <?php if($read){?>
<?php 
$i=1;
while($row = $read->fetch_assoc()){
?>

<tr>
  
 <td><?php echo $row['a_positive']; ?></td>
 <td><?php echo $row['a_negative']; ?></td>
  <td><?php echo $row['b_positive']; ?></td>
   <td><?php echo $row['b_negative']; ?></td>
    <td><?php echo $row['ab_positive']; ?></td>
     <td><?php echo $row['ab_negative']; ?></td>
      <td><?php echo $row['o_positive']; ?></td>
       <td><?php echo $row['o_negative']; ?></td>
   

 <td><a class="btn btn-danger" href="UpdateStorage.php?storage_id=<?php echo $row['storage_id']; ?>">Edit</a></td>
 

 
</tr>


<?php } ?>
<?php } else { ?>
<p>Data is not available !!</p><a class="btn btn-danger" href="InsertStorage.php"><b>create</b></a>

<?php } ?>












</table>

</body>
</html>