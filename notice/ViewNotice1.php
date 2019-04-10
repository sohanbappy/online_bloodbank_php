<?php include "../incc/head.php"; ?> 
<?php include "../incc/design.php"; ?> 
<?php

include "../function/config.php";
include "../function/Database.php";
?>

<?php 
 $db = new Database();
 $query = "SELECT * FROM notice_tb WHERE status = 'Accepted' ORDER BY notice_id DESC";
 $read = $db->select($query);
?>
<div style=" height: 15%; margin-left: 8%;margin-right: 8%">
<center><h1 style="padding-top: 2%; color:black"><b>All Blood Request Information</b> </h1></center>
</div>
<table class="table table-striped table-bordered table-hover table-dark" cellpadding="5" style="width: 82%;margin-left:9%;" >
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
<?php include "../incc/footer.php"; ?>
