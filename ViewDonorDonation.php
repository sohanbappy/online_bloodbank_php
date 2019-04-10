
<?php

include "function/config.php";
include "function/Database.php";
session_start();

include "donorHeader.php";
?>

<?php 
 $db = new Database();
 $query = "SELECT * FROM donation_tb WHERE user_id = '$_SESSION[uid]' ";
 $read = $db->select($query);
?>


<body>
<table class="table table-striped table-bordered table-hover table-dark" >
  <thead style="background-color: black; color:white; font-size: 18px; font-weight: bold;">
  <tr>
    <th>Serial</th>
    <th>Blood Group</th>
    <th>Unit</th>
    <th>Donation Date</th>
    <th> Donated To</th>
    <th>Recipient Address</th>
    <th>Confirmed By</th>
    <th>status</th>
    <th colspan="2">Action</th>
  </tr>
</thead>

<?php if($read){
  $i=1;
  while($row = $read->fetch_assoc()){
?>

<tr>
  <td><?php echo $i++ ?></td>
  <td><?php echo $row['bl_group']; ?></td>
   <td><?php echo $row['unit']; ?></td>
 <td><?php echo $row['donation_date']; ?></td>
  <td><?php echo $row['donated_to']; ?></td>
  <td><?php echo $row['recipient_address']; ?></td>
 <td><?php echo $row['confirmed_by']; ?></td>
   <td><?php echo $row['status']; ?></td>
<!--  <td><a class="btn btn-warning" href="http://localhost/EUDV/donation/UpdateDonation.php?serial=<?php echo $row['serial']; ?>">Edit</a></td> -->
  <td><a class="btn btn-danger" href="DeleteDonation.php?serial=<?php echo $row['serial']; ?>">Delete</a></td>
</tr>


<?php } 
   }
 else { ?>

<p>Data is not available !!</p> 

 <?php } ?>
</table>
</body>
</html>
<?php if($_SESSION["type"]!='Admin'){ ?>
<a class="btn btn-warning" href = "http://localhost/EUDV/donation/InsertDonation.php">ADD Donation</a>
<?php }

  include "donorFooter.php";

 ?>


