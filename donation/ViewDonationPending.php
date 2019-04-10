



<?php

include "../function/config.php";
include "../function/Database.php";
session_start();


  
include "../adminHeader.php";




// $db = new Database();

    $target_page=0;

     $db = new Database();
   

    if(isset($_GET["page"])){

    $get_page = $_GET["page"];


    if($get_page == "1")
    {
      $target_page = 0;
    }
    else
    {
      $target_page = ($get_page*2)-2;
    }
    $query = "SELECT * FROM donation_tb WHERE status ='Pending' ORDER BY serial  limit $target_page,2 ";

    // $query ="SELECT * FROM blood_bank_tb";

    $read = $db->select($query);

  }

 $read = $db->select($query);
?>


 <a href="http://localhost/EUDV/donation/ViewDonation.php?page=1" class="btn btn-warning">View All Donation</a> 


<table class="table table-striped table-bordered table-hover table-dark" >
  <thead style="background-color: black; color:white; font-size: 18px; font-weight: bold;">
  <tr>
  	<th>Serial</th>
   <th> Name</th>
     <th>Username</th>
    <th>Blood Group</th>
    <th>Unit</th>
    <th>Donation Date</th>
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

<tr style="font-size: 18px">
  <td><?php echo $i++ ?></td>
<?php
  if($row['type']=="Donor"){
    $sql2="SELECT name,username FROM donor_tb WHERE username='$row[user_id]' ";
  }else{
    $sql2="SELECT bank_name,username FROM blood_bank_tb WHERE bank_id='$row[user_id]' ";
  }
  $readMax2=$db->select($sql2);
  if($readMax2){
  while($count2 = $readMax2->fetch_assoc()){ ?>

    <?php if($row['type']=="Donor"){ ?>
 <td><?php echo $count2['name']; ?></td>
 <td><?php echo $count2['username']; ?></td>
 <?php }else{ ?>
 <td><?php echo $count2['bank_name']; ?></td>
 <td><?php echo $count2['username']; ?></td>
 
  <?php } }  } else{ ?>

  <td><?php echo "Not Found"; ?></td>
 <td><?php echo "Not Found"; ?></td>
 <?php } ?>
  <td><?php echo $row['bl_group']; ?></td>
 
   <td><?php echo $row['unit']; ?></td>

 <td><?php echo $row['donation_date']; ?></td>

  <td><?php echo $row['recipient_address']; ?></td>
 <td><?php echo $row['confirmed_by']; ?></td>
   <td><?php echo $row['status']; ?></td>


 <td><a class="btn btn-warning" href="UpdateDonation.php?serial=<?php echo $row['serial']; ?>">Edit</a></td>
  <td><a class="btn btn-danger" href="DeleteDonation.php?serial=<?php echo $row['serial']; ?>">Delete</a></td>

 
</tr>
<?php }
} 
   
 else { ?>
<p>Data is not available !!</p> 
<?php } ?>

</table>



<span style='font-size:25px'>Page: &nbsp</span>  
<?php
$query3 = "SELECT * FROM donation_tb WHERE status ='Pending' ";


 $read = $db->select($query3);
 if($read){
$count = mysqli_num_rows($read);
$i = $count/2;  //limit
$page = ceil($i);

for($target=1;$target<=$page; $target++)
{
 ?> <a href="http://localhost/EUDV/donation/ViewDonationPending.php?page=<?php echo $target;?>"> <?php echo "<span style='font-size:25px'  >$target </span> &nbsp &nbsp &nbsp" ?></a> <?php

 }
}
?>





<?php include '../adminFooter.php';  ?>

