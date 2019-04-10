 
<?php include 'incc/head.php'?>
<?php
include 'incc/design.php';
include "function/config.php";
include "function/Database.php";


 $db = new Database();

//type= Donor or Organization


$query = "select user_id,count(user_id) as btimes from donation_tb WHERE type='Donor' GROUP BY user_id ORDER BY btimes DESC LIMIT 5";

$query2 = "select user_id,count(user_id) as btimes from donation_tb WHERE type='Organization' GROUP BY user_id ORDER BY btimes DESC LIMIT 5";

 $readMax=$db->select($query);

 $readMax3=$db->select($query2);


?>


<!-- donor -->
<center>	<h1><b>View Max. Donors</b></h1></center>

<table class="table table-striped table-bordered table-hover table-dark" style="width: 50%; margin-left:25%;" > 
  <thead style="background-color: black; color:white; font-size: 18px; font-weight: bold;">
  <tr>
  <th>Sl.</th>
    <th>Name</th>
    <th>location</th>
    <th>Division</th>
    <th>Donate Times</th>
  </tr>
</thead>
 <?php
 
 if(isset($readMax)){

  if($readMax){  

$i=1;

while($count = $readMax->fetch_assoc()){

  
  $sql2="SELECT * FROM donor_tb WHERE username='$count[user_id]' ";
  $readMax2=$db->select($sql2);
  

?>

<tr>
  <td><?php echo $i++ ?></td>
  <?php if($readMax2){ while($count2 = $readMax2->fetch_assoc()){ ?>
 <td><?php echo $count2['name']; ?></td>
 <td><?php echo $count2['location']; ?></td>
  <td><?php echo $count2['division']; ?></td>
 <?php  } }else{ ?>
 <td><?php "Not Found"; ?></td>
 <td><?php echo "Not Found"; ?></td>
  <td><?php echo "Not Found"; ?></td>

<?php } ?>
 <td><?php echo $count['btimes']; ?></td>

</tr>

<?php } 
} else {



  ?>
<p>Data is not available !!</p>

<?php  
 }
}
?>
</table>



<!-- donor -->
<center>  <h1><b>View Max. Organizations</b></h1></center>

<table class="table table-striped table-bordered table-hover table-dark" style="width: 50%; margin-left:25%;" > 
  <thead style="background-color: black; color:white; font-size: 18px; font-weight: bold;">
  <tr>
  <th>Sl.</th>
    <th>Name</th>
    <th>location</th>
    <th>Division</th>
    <th>Donate Times</th>
  </tr>
</thead>
 <?php
 
 if(isset($readMax3)){

  if($readMax3){  

$i=1;
while($count3 = $readMax3->fetch_assoc()){

  
  $sql4="SELECT * FROM blood_bank_tb WHERE bank_id= '$count3[user_id]' ";
  $readMax4=$db->select($sql4);
  

?>

<tr>
  <td><?php echo $i++ ?></td>
  <?php while($count4 = $readMax4->fetch_assoc()){ ?>
 <td><?php echo $count4['bank_name']; ?></td>
 <td><?php echo $count4['location']; ?></td>
  <td><?php echo $count4['division']; ?></td>
 <?php  } ?>
 <td><?php echo $count3['btimes']; ?></td>

</tr>
<?php } 

  

} else {


  ?>

<p>Data is not available !!</p>
<?php 
 }
}
?>
</table>



<?php include('incc/footer.php'); ?>









			