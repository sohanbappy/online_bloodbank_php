 
<?php

include "../function/config.php";
include "../function/Database.php";
 session_start();
?>

<?php 
 $db = new Database();
 $query = "SELECT * FROM request_tb WHERE receiver = '$_SESSION[uid]' AND status = 'Pending'  ";
 $read = $db->select($query);


    if(isset($_GET['req_id']))
    {
      $id = $_GET['req_id'];

        $sql = "UPDATE request_tb SET status='Accepted' where req_id='$id' ";
        $read2=$db->update($sql);
        header("Location: http://localhost/EUDV/donor/ViewRequest.php");
    }

    if(isset($_GET['sl']))
    {
      $id = $_GET['sl'];

        $sql = "DELETE from request_tb where req_id ='$id' ";
        $read2=$db->delete($sql);
        header("Location: http://localhost/EUDV/donor/ViewRequest.php");
    }


  
  include "../donorHeader.php";
?>














<table class="table table-striped table-bordered table-hover table-dark" >
  <thead style="background-color: black; color:white; font-size: 18px; font-weight: bold;">
  <tr>
    <th>Serial</th>

    <th> Sender ID</th>
           <th>Bankname</th>
                <th>Contact</th>
                 <th>Location</th>
      <th>Request Date</th>
    <th>status</th>

  
    <th colspan="2">Action</th>
  </tr>
  </thead>

 <?php if($read){?>
<?php 
$i=1;
while($row = $read->fetch_assoc()){

$sq="SELECT * FROM blood_bank_tb WHERE bank_id ='$row[sender]' ";
$fec = $db->select($sq);
$row2 = $fec->fetch_assoc();

?>

<tr>
  <td><?php echo $i++ ?></td>
 
 <td><?php echo $row['sender']; ?></td>
   <td><?php echo $row2['bank_name']; ?></td>
    <td><?php echo $row2['contact']; ?></td> 
       <td><?php echo $row2['location']; ?></td>  
  <td><?php echo $row['req_date']; ?></td>
   <td><?php echo $row['status']; ?></td>
 
 <td><a href="ViewRequest.php?req_id=<?php echo $row['req_id']; ?>">Accept</a></td>
  <td><a href="ViewRequest.php?sl=<?php echo $row['req_id']; ?>">Delete</a></td>

 
</tr>


<?php } ?>
<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>
















</table>


</body>
</html>