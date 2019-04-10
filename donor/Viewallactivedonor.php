 
 
 
 <?php include '../adminHeader.php'; ?>
 
 
<?php

include "../function/config.php";
include "../function/Database.php";



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



       $query = "SELECT * FROM donor_tb WHERE activity = 'active' AND status = 'Accepted' ORDER BY donor_id limit $target_page,2 ";
       $read = $db->select($query);
    

      }
     // $read = $db->select($query);

?>


<br>
<br>
<br>
<a href="http://localhost/EUDV/donor/ViewDonor.php?page=1" class="btn btn-warning">View All Donor</a>
<a href="http://localhost/EUDV/donor/Viewallactivedonor.php?page=1" class="btn btn-danger">View All Active Donor</a>

<a href="http://localhost/EUDV/donor/Viewalldeactivedonor.php?page=1" class="btn btn-success">View All Deactive Donor</a>

<!--
  <form action="" method="POST">
    <input type="text" name="srcname" placeholder="enter name">
    <input type="submit" name="search" value="Search">
  </form>

-->
  




<br>
<br>



<table class="table table-striped table-bordered table-hover table-dark" >
  <thead style="background-color: black; color:white; font-size: 18px; font-weight: bold;">
   <tr>
  	<th>Serial</th>
    <th>Name</th>
    <th>Username</th>
      <th>Blood Group</th>
    <th>Division</th>
    <th>Email</th>
      <th>Location</th>

      <th>Age</th>
    <th>Phone</th>
    <th>Status</th>
    <th>Gender</th>
    <th> Picture</th>
  
    <th colspan="3">Actions</th>
</tr>
  </thead>

 <?php if($read){?>
<?php 
$i=1;
while($row = $read->fetch_assoc()){
?>

<tr>


  
  <td><?php echo $i++ ?></td>
 <td><?php echo $row['name']; ?></td>
 <td><?php echo $row['username']; ?></td>
  <td><?php echo $row['bl_group']; ?></td>
   <td><?php echo $row['division']; ?></td>
    <td><?php echo $row['email']; ?></td>
     <td><?php echo $row['location']; ?></td>
   
       <td><?php echo $row['age']; ?></td>
        <td><?php echo $row['phone']; ?></td>
         <td><?php echo $row['status']; ?></td>
        <td><?php echo $row['gender']; ?></td>
      <td><img src="http://localhost/EUDV/<?php echo $row['img']; ?>" height="60px" 
   width="50px"/></td>

<td>
  <a  class="btn btn-danger" href="UpdateDonor.php?donor_id=<?php echo $row['donor_id']; ?>"> Edit </a>
</td>

  <td><a class="btn btn-warning" href="DeleteDonor.php?donor_id=<?php echo $row['donor_id']; ?>">Delete</a></td>

 
</tr>



<?php } ?>
<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>

</table>


 
 <span style='font-size:25px'>Page: &nbsp</span>  
<?php
  $query3 = "SELECT * FROM donor_tb WHERE activity = 'active' AND status = 'Accepted'";


 $read = $db->select($query3);
 if($read){
$count = mysqli_num_rows($read);
$i = $count/2;  //limit
$page = ceil($i);

for($target=1;$target<=$page; $target++)
{
 ?> <a href="http://localhost/EUDV/donor/Viewallactivedonor.php?page=<?php echo $target;?>"> <?php echo "<span style='font-size:25px'  >$target </span> &nbsp &nbsp &nbsp" ?></a> <?php

 }
}
?>
 

 





<?php include '../adminFooter.php'; ?>
