
 <?php include '../adminHeader.php';

include "../function/config.php";
include "../function/Database.php";

   
     $target_page=0;

     $db = new Database();
     // $query = "SELECT * FROM blood_bank_tb  ORDER BY serial  limit 0,10 ";

    // // }
    // if (isset($_GET['st'])) {
    //    $query = "SELECT * FROM blood_bank_tb ORDER BY serial  limit 0,10 ";
    //    $read = $db->select($query);

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
    $query = "SELECT * FROM blood_bank_tb WHERE status ='Pending' ORDER BY bank_id  limit $target_page,2 ";

    // $query ="SELECT * FROM blood_bank_tb";

    $read = $db->select($query);

  }

 $read = $db->select($query);
  
?>

 <a href="http://localhost/EUDV/bloodbank/ViewBloodBank.php?page=1" class="btn btn-warning">View All Bloodbank</a> 





<h1><b> View Organization Information</b></h1>

<table class="table table-striped table-bordered table-hover table-dark" >
  <thead style="background-color: black; color:white; font-size: 18px; font-weight: bold;">


  <tr>
  	<th>Serial</th>
    <th>Bank ID</th>
    <th>Bank Name</th>
     <th>User Name</th>
      <th>Division</th>
    <th>Location</th>
    <th>Email</th>
     
    <th>Contact</th>
     
    <th>Status</th>
    <th>Logo</th>


  
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
 <td><?php echo $row['bank_id']; ?></td>
 <td><?php echo $row['bank_name']; ?></td>
  <td><?php echo $row['username']; ?></td>
  <td><?php echo $row['division']; ?></td>
   <td><?php echo $row['location']; ?></td>
    <td><?php echo $row['email']; ?></td>
     <td><?php echo $row['contact']; ?></td>
  
        
         <td><?php echo $row['status']; ?></td>
   <td><img src="http://localhost/EUDV/<?php echo $row['logo']; ?>" height="60px" 
   width="50px"/></td>


 <td><a class="btn btn-danger" href="UpdateBloodBank.php?bank_id=<?php echo $row['bank_id']; ?>">Edit</a></td>
  <td><a class="btn btn-warning" href="DeleteBloodBank.php?bank_id=<?php echo $row['bank_id']; ?>">Delete</a></td>

 
</tr>


<?php } ?>
<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>




</table>




<span style='font-size:25px'>Page: &nbsp</span>  
<?php
$query3 = "SELECT * FROM blood_bank_tb WHERE status ='Pending' ";


 $read = $db->select($query3);
 if($read){
$count = mysqli_num_rows($read);
$i = $count/2;  //limit
$page = ceil($i);

for($target=1;$target<=$page; $target++)
{
 ?> <a href="http://localhost/EUDV/bloodbank/ViewBloodBankPending.php?page=<?php echo $target;?>"> <?php echo "<span style='font-size:25px'  >$target </span> &nbsp &nbsp &nbsp" ?></a> <?php

 }
}
?>









<!--<a href="InsertBloodBank.php" class="btn btn-danger" > ADD</a> -->
 <?php include '../adminFooter.php'; ?>