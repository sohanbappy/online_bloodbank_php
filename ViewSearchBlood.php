<?php include 'incc/head.php';
include "incc/design.php";
include "function/config.php";
include "function/Database.php";

 $db = new Database();

 if(isset($_POST['submit'])){


   $bl_group = mysqli_real_escape_string($db->link, $_POST['bloodgroup']);

   $division  = mysqli_real_escape_string($db->link, $_POST['division']);

      if($bl_group!=null || $bl_group!= ""){

   $query1 = "SELECT blood_bank_tb.bank_id,blood_bank_tb.bank_name,blood_bank_tb.contact,blood_bank_tb.location,storage_tb.$bl_group as quantity FROM blood_bank_tb INNER JOIN storage_tb ON blood_bank_tb.bank_id = storage_tb.bank_id
    where division = '$division' AND storage_tb.$bl_group > 0 " ;

    $read=$db->select($query1);
     }




}

 
?>


<?php  if(isset($read)){ ?>

    <center><h1><b>All Organizations Information </b></h1></center><br>

<table class="table table-striped table-bordered table-hover table-dark" style="width: 50%; margin-left:25%;" >
  <thead style="background-color: black; color:white; font-size: 18px; font-weight: bold;">

  <tr>
  <th>Serial</th>
    <th>Bank Name</th>
    <th>Contact</th>
    <th> Blood Quantity</th>
      <th> Location</th>
     
  </tr>
</thead>

<?php 
if($read){

$i=1;
while($row = $read->fetch_assoc()){
?>
<tr>
  <td><?php echo $i++ ?></td>
 <td><?php echo $row['bank_name']; ?></td>
 <td><?php echo $row['contact']; ?></td>
 <td><?php echo $row['quantity']; ?></td>
  <td><?php echo $row['location']; ?></td>
 
</tr>

<?php } } else { ?>
<p>Data is not available </p>
<?php } 
}?>

</table>


<?php include "incc/footer.php"; ?>

