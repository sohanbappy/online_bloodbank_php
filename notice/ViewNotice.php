 <?php include '../adminHeader.php'; ?> 
<?php

include "../function/config.php";
include "../function/Database.php";
?>

<?php 
 $db = new Database();
 $query = "SELECT * FROM notice_tb ORDER BY notice_id DESC";
 $read = $db->select($query);
?>







<table class="table table-striped table-bordered table-hover table-dark" >
  <thead style="background-color: black; color:white; font-size: 18px; font-weight: bold;">
  <tr>
  	<th>Serial</th>
    <th>Blood Group</th>
   
    <th>Amount</th>
    <th>Needed Date </th>
      <th>Name</th>
    <th>Division</th>
    <th>Contact</th>
      <th>Patient Location</th>
      <th>Status</th>

 
    <th colspan="2">Action</th>
  </tr>
</thead>

 <?php if($read){?>
<?php 
$i=1;
while($row = $read->fetch_assoc()){
?>

<tr>
  <td><?php echo $i++ ?></td>
 <td><?php echo $row['bl_group']; ?></td>

 <td><?php echo $row['bl_unit']; ?></td>
 <td><?php echo $row['needed_date']; ?></td>
  <td><?php echo $row['rqst_name']; ?></td>
   <td><?php echo $row['division']; ?></td>
    <td><?php echo $row['contact']; ?></td>
     <td><?php echo $row['p_location']; ?></td>
     <td><?php echo $row['status']; ?></td>



 <td><a class="btn btn-danger" href="UpdateNotice.php?notice_id=<?php echo $row['notice_id']; ?>">Edit</a></td>

  <?php if(date("Y-m-d") > $row['needed_date'] ){ ?>

  <td><a class="btn btn-danger" href="DeleteNotice.php?notice_id=<?php echo $row['notice_id']; ?>">Delete</a></td>
 <?php } ?> 
 
</tr>


<?php } ?>
<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>
</table>
<!--
<div class="joy">
 <a href="InsertNotice.php"><b>create</b></a>
-->

</div>

</body>
</html>