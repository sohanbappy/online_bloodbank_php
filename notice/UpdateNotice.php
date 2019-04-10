




<?php

include "../function/config.php";
include "../function/Database.php";
session_start();
?>


<?php 
 $notice_id = $_GET['notice_id']; 
 $db = new Database();
 $query = "SELECT * FROM notice_tb WHERE notice_id = $notice_id";
 $getData = $db->select($query)->fetch_assoc();

if(isset($_POST['submit'])){
   
 $bl_group  = mysqli_real_escape_string($db->link, $_POST['bl_group']);
 
 $bl_unit = mysqli_real_escape_string($db->link, $_POST['bl_unit']);
  $needed_date = mysqli_real_escape_string($db->link, $_POST['needed_date']);
  $rqst_name=mysqli_real_escape_string($db->link,$_POST['rqst_name']);
 $division = mysqli_real_escape_string($db->link, $_POST['division']);
  $contact= mysqli_real_escape_string($db->link, $_POST['contact']);
   $p_location = mysqli_real_escape_string($db->link, $_POST['p_location']);
      $status = mysqli_real_escape_string($db->link, $_POST['status']);
    
if($bl_group == '' ||  $bl_unit == '' || $rqst_name == '' || $division == '' || $contact == '' || $p_location == ''){
  $error = "Field must not be Empty !!";
 } else {
  $query = "UPDATE notice_tb
  SET
   
   bl_group = '$bl_group',
   needed_date = '$needed_date',
  bl_unit = '$bl_unit',
    rqst_name  = '$rqst_name',
  division = '$division',
  contact = '$contact',
    p_location  = '$p_location',

    status = '$status'

  
   

  WHERE notice_id = '$notice_id' ";

  $update = $db->update($query);
  if($update){
    header("Location:ViewNotice.php");
  }
 }
}
?>
 <?php include '../adminHeader.php'; ?> 





<div class="container">
  <div class="row">
    <div class="col-sm-8">




  
<form action="UpdateNotice.php?notice_id=<?php echo $notice_id;?>" method="POST">


    
   <div class="form-group">
    <label for="bl_group"><b>Blood Group:</b></label>
    <select name="bl_group" class="form-control" value="<?php echo $getData['bl_group'] ?>">
      <option value="">..Select..</option>
      <option value="A+"
       <option value ="A+"<?php
     if($getData['bl_group'] =='A+')
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
    <label for="bl_unit"><b>Amount:</b></label>
    <input type="number" name="bl_unit" class="form-control" value="<?php echo $getData['bl_unit'] ?>">

</div>
  
 <div class="form-group">
    <label for=""><b>Needed Date:</b></label>
    <input type="date" name="needed_date" class="form-control" value="<?php echo $getData['needed_date'] ?>">

</div>

   


   <div class="form-group">
    <label for="rqst_name"><b>Name:</b></label>
    <input type="text" name="rqst_name" class="form-control" value="<?php echo $getData['rqst_name'] ?>" >

      </div>


   <div class="form-group">
  <label for="division"><b>Division:<b></label>
    <select name="division" class="form-control" value="<?php echo $getData['division'] ?>">
        <option value="">..Select..</option>
     
       <option value ="Barisal"
       <?php
     if($getData['division'] =='Barisal')
      {
        echo "selected";
         }?> 
      >Barisal</option>

      <option value="Chittagong"
       <?php
     if($getData['division'] =='Chittagong')
      {
        echo "selected";
         }?> 
         >Chittagong</option>

          <option value="Dhaka"
       <?php
     if($getData['division'] =='Dhaka')
      {
        echo "selected";
         }?> 
         >Dhaka</option>

      <option value="Mymensingh"
 <?php
     if($getData['division'] =='Mymensingh')
      {
        echo "selected";
         }?> 
      >Mymensingh </option>

      <option value="Khulna"
 <?php
     if($getData['division'] =='Khulna')
      {
        echo "selected";
         }?> 
      >Khulna</option>

      <option value="Rajshahi"
 <?php
     if($getData['division'] =='Rajshahi')
      {
        echo "selected";
         }?> 
      >Rajshahi</option>

      <option value="Rangpur"
 <?php
     if($getData['division'] =='Rangpur')
      {
        echo "selected";
         }?> 
      >Rangpur</option>

      <option value="Sylhet"
     <?php
     if($getData['division'] =='Sylhet')
      {
        echo "selected";
         }?> 
      >Sylhet </option>
    
    
    </select>

</div>

   <div class="form-group">
    <label for="contact"><b>Contact:</b></label>
     <input type="text" name="contact" class="form-control" value="<?php echo $getData['contact'] ?>" >
   </div>

   <div class="form-group">

    <label for="location"><b>Patient Location:</b></label>
    <input type="text" name="p_location" class="form-control" value="<?php echo $getData['p_location'] ?>">

</div>

 <div class="form-group">

     <label for="status"><b>Status:<b></label>
    <select id="status" name="status" class="form-control" value="<?php echo $getData['status'] ?>">
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
        




  
       

    <input type="submit" name="submit" value="Submit">
       

     </form>


</div>
</body>
</html>