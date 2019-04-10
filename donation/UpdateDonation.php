<?php

include "../function/config.php";
include "../function/Database.php";
session_start();

?>




<?php 


 $serial = $_GET['serial'];
 $db = new Database();
 $query = "SELECT * FROM donation_tb WHERE serial=$serial";
 $getData = $db->select($query)->fetch_assoc();



if(isset($_POST['submit'])){
   if($_SESSION["type"]=='Organization' || $_SESSION["type"]=='Donor'){

 $user_id  = mysqli_real_escape_string($db->link, $_POST['user_id']);
 $unit  = mysqli_real_escape_string($db->link, $_POST['unit']);
 $donation_date = mysqli_real_escape_string($db->link, $_POST['donation_date']);
 $recipient_address = mysqli_real_escape_string($db->link, $_POST['recipient_address']);
  
$confirmed_by = mysqli_real_escape_string($db->link, $_POST['confirmed_by']);
    $bl_group = mysqli_real_escape_string($db->link, $_POST['bl_group']);
  
 
//org
                  if($_SESSION["type"]=='Organization'){

    if($bl_group=="A+"){$full_bl_group="a_positive";}
      else if($bl_group=="A-"){$full_bl_group="a_negative";}
        else if($bl_group=="B+"){$full_bl_group="b_positive";}
          else if($bl_group=="B-"){$full_bl_group="b_negative";}
            else if($bl_group=="AB+"){$full_bl_group="ab_positive";}
              else if($bl_group=="AB-"){$full_bl_group="ab_negative";}
                else if($bl_group=="O+"){$full_bl_group="o_positive";}
                  else{$full_bl_group="o_negative";}

                    //requested quantity
                    $req_qty=$unit;

                    $tempSql="SELECT * FROM storage_tb WHERE bank_id = '$user_id'  ";
                    $tempQty=$db->select($tempSql)->fetch_assoc();
                    $avQty=$tempQty[$full_bl_group]; //av quantity


                    $tempSql2 ="SELECT bl_group,unit FROM donation_tb WHERE serial='$serial' ";
                    $tempQty2=$db->select($tempSql2)->fetch_assoc();
                    $lastQty=$tempQty2['unit']; //last quantity

                    $diff=$lastQty-$req_qty;
                    //add or substract  storage
                      $stQty=$avQty+$diff;
                    

              //        echo "Req: ".$req_qty."Av: ".$avQty."Last: ".$lastQty."Diff: ".$diff."Storage: ".$stQty;exit();

                       if($stQty<0){
                        echo "<script>alert('Unit Quantity is not available!!')</script>";

                       }
                       else{
                                     $query = "UPDATE donation_tb
              SET
               user_id  = '$user_id',
               bl_group = '$bl_group',
               unit = '$unit',
              donation_date = '$donation_date',
                recipient_address  = '$recipient_address',
               confirmed_by = '$confirmed_by'
              WHERE serial = $serial";

                        $update = $db->update($query);
                        $updateStorageSql="UPDATE storage_tb SET storage_tb.$full_bl_group='$stQty' WHERE bank_id = '$user_id' ";
                        $upRead=$db->update($updateStorageSql);
                       }
                    

              }else{
                           $query = "UPDATE donation_tb
            SET
             user_id  = '$user_id',
             bl_group = '$bl_group',
             unit = '$unit',
            donation_date = '$donation_date',
              recipient_address  = '$recipient_address',
             confirmed_by = '$confirmed_by'
            WHERE serial = $serial";
                  $update = $db->update($query);

              }

if(isset($update)){
if($_SESSION["type"]=='Organization'){
  //for Organization
 header("Location:http://localhost/EUDV/ViewOrgDonation.php");
}
else{

header("Location:http://localhost/EUDV/ViewDonorDonation.php");
 }
}

} else{
    $status = mysqli_real_escape_string($db->link, $_POST['status']);
       $query = "UPDATE donation_tb SET status='$status' where serial='$serial' ";

     
  $update = $db->update($query);
    if($update){
    header("Location:http://localhost/EUDV/donation/ViewDonationPending.php?page=1");
}

}

}
 if($_SESSION["type"]=='Organization'){
  
include "../organizationHeader.php";

} else if($_SESSION["type"]=='Donor'){
  include "../donorHeader.php";

}
else{
  
  include "../adminHeader.php";
}

?>





<div class="container">
  <div class="row">
    <div class="col-sm-8">


  
<form action="UpdateDonation.php?serial=<?php echo $serial;?>" method="POST">
  
<div class="form-group">
<?php  if($_SESSION["type"]=='Organization' || $_SESSION["type"]=='Donor'){ ?>
 <label for=""><b>User ID:</b></label>
    <input type="text" name="user_id" class="form-control" readonly="" value="<?php echo $getData['user_id'] ?>">
</div>
 <div class="form-group">
 <label for="bloodgroup"><b>Blood Group:</b></label>
    <select name="bl_group" class="form-control" value="<?php echo $getData['bl_group'] ?>">
      <option value="">..Select..</option>
   
      <option value ="A+"<?php
     if($getData['bl_group'] =='')
      {
        echo "selected";
         }?> 
      >A+</option>

    
    <option value ="A-" <?php
      if($getData['bl_group'] =='A-')
      {
        echo "selected";
         }?>
       >A-</option>


       <option value ="B+"
      <?php
      if($getData['bl_group'] =='B+')
      {
        echo "selected";
         }?> 
    
      >B+</option>


      <option value="B-"
      <?php
      if($getData['bl_group'] =='B-')
      {
        echo "selected";
         }?> 
      >B-</option>


     <option value ="AB+"
      <?php
      if($getData['bl_group'] =='AB+')
      {
        echo "selected";
         }?> 
      >AB+</option>

      <option value="AB-"
 <?php
      if($getData['bl_group'] =='AB-')
      {
        echo "selected";
         }?> 

      >AB-</option>

      <option value="O+"
 <?php
      if($getData['bl_group'] =='O+')
      {
        echo "selected";
         }?> 
      >O+</option>

      <option value="O-"
 <?php
      if($getData['bl_group'] =='O-')
      {
        echo "selected";
         }?> 
      >O-</option>
    </select>

</div>
<div class="form-group">
  <label for=""><b>Unit:</b></label>
   
    <input type="number" name="unit" class="form-control" min="1" max="5" required="" value="<?php echo $getData['unit'] ?>">

</div>





<div class="form-group">

    <label for=""><b>Donation Date:</b></label>
   
    <input type="date" name="donation_date" class="form-control" value="<?php echo $getData['donation_date'] ?>" readonly="">
</div>




<div class="form-group">
    <label for=""><b>Recipient Address:</b></label>
    <input type="text" name="recipient_address" class="form-control" value="<?php echo $getData['recipient_address'] ?>">
</div>
   <div class="form-group">
    <label for=""><b>Confirmed By:</b></label>
    <input type="number" name="confirmed_by" class="form-control" value="<?php echo $getData['confirmed_by'] ?>">
</div>



<?php } else{ ?>

    <div class="form-group">
  <label for=""><b>Status:<b></label>
    <select name="status" class="form-control" value="<?php echo $getData['status'] ?>">
        <option value="">..Select..</option>
     
  <option value ="Pending"
       <?php
     if($getData['status'] =='Pending')
      {
        echo "selected";
         }?> 
      >Pending</option>





      <option value="Accepted"
           <?php
     if($getData['status'] =='Accepted')
      {
        echo "selected";
         }?> 
      >Accepted</option>
     
      
       
</select>


</div>

<?php } ?>

    <input type="submit" name="submit" value="Submit">
   

     </form>
</div>


</div>
</div>