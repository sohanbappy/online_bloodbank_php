 
 
 
 <?php include '../adminHeader.php'; ?>
 
 
<?php

include "../function/config.php";
include "../function/Database.php";




?>

<?php 
 $db = new Database();
 $query = "SELECT * FROM admin_tb";
 $read = $db->select($query);
?>















	


<h1><b>View Admin Info</b></h1>
<table class="table table-striped table-bordered table-hover table-dark" >
  <thead style="background-color: black; color:white; font-size: 18px; font-weight: bold;">


  <tr>

    <th>Name</th>
    <th>Username</th>
    <th>Password</th>
    <th>Email</th>
   <th>Occupation</th>
      <th>Address</th>
       <th colspan="2">Actions</th>
   
  
  
  </tr>
</thead>

 <?php if($read){?>
<?php 

while($row = $read->fetch_assoc()){
?>

<tr>

 <td><?php echo $row['name']; ?></td>
 <td><?php echo $row['username']; ?></td>
 <td><?php echo $row['password']; ?></td>
 <td><?php echo $row['email']; ?></td>
  <td><?php echo $row['occupation']; ?></td>
   <td><?php echo $row['address']; ?></td>
  

 <td><a href="UpdateAdmin.php?aid=<?php echo $row['aid']; ?>">Edit</a></td>
  <td><a href="DeleteAdmin.php?aid=<?php echo $row['aid']; ?>">Delete</a></td>

 
</tr>

</table>


<?php } ?>
<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>
















</table>




<?php include '../adminFooter.php'; ?>
