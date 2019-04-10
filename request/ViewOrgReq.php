 
<?php

include "../function/config.php";
include "../function/Database.php";
 include "../organizationHeader.php";
?>

<?php 
 $db = new Database();
 $query = "SELECT * FROM request_tb WHERE sender = '$_SESSION[uid]' ";
 $read = $db->select($query);

    if(isset($_GET["st"])){

          $st = $_GET["st"];

    $sql = "SELECT * FROM request_tb WHERE sender = '$_SESSION[uid]' AND status = '$st' ORDER BY req_id DESC ";
      $read = $db->select($sql);


    }

?>








<a href="ViewOrgReq.php?st=Accepted" class="btn btn-success">Accepted</a>
<a href="ViewOrgReq.php?st=Pending" class="btn btn-success">Pending</a>





<table class="table table-striped table-bordered table-hover table-dark" >
  <thead style="background-color: black; color:white; font-size: 18px; font-weight: bold;">
  <tr>
    <th>Serial</th>
    <th>Request ID</th>
  
    <th>Receiver</th>
      <th>Request Date</th>
    <th>status</th>
  
  
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
 <td><?php echo $row['req_id']; ?></td>

 <td><a href="http://localhost/EUDV/request/viewDonor.php?uid=<?php echo $row['receiver']; ?>"> <?php echo $row['receiver']; ?> </a></td>
  <td><?php echo $row['req_date']; ?></td>
   <td><?php echo $row['status']; ?></td>

 <!-- <td><a href="UpdateRequest.php?serial=<?php echo $row['serial']; ?>">Edit</a></td> -->
  <td><a href="DeleteRequest.php?req_id=<?php echo $row['req_id']; ?>">Delete</a></td>

 
</tr>


<?php } ?>
<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>
















</table>


</body>
</html>