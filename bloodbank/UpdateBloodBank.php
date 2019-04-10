<?php

include "../function/config.php";
include "../function/Database.php";
session_start();



?>
 

<?php 
 $bank_id = $_GET['bank_id'];
 $db = new Database();
 $query = "SELECT * FROM blood_bank_tb WHERE bank_id = '$bank_id' ";
 $getData = $db->select($query)->fetch_assoc();



if(isset($_POST['submit'])){
 if($_SESSION["type"]=='Organization'){

 $bank_id  = mysqli_real_escape_string($db->link, $_POST['bank_id']);
 $bank_name = mysqli_real_escape_string($db->link, $_POST['bank_name']);
  $username = mysqli_real_escape_string($db->link, $_POST['username']);
  $password=mysqli_real_escape_string($db->link,$_POST['password']);

  $division = mysqli_real_escape_string($db->link, $_POST['division']);
  
    $location = mysqli_real_escape_string($db->link, $_POST['location']);
     $email = mysqli_real_escape_string($db->link, $_POST['email']);
     $contact = mysqli_real_escape_string($db->link, $_POST['contact']);
      

    $filename = $_FILES["uploadfile"] ["name"];
    $tempname = $_FILES["uploadfile"] ["tmp_name"];

    if($tempname==""){
      $tempfolder=$getData["logo"];
        $folder = $tempfolder;
    }
    else{

    $tempfolder = "BloodBank_logo/".$filename;
      $folder = "bloodbank/BloodBank_logo/".$filename;
      }
    move_uploaded_file($tempname, $tempfolder);
 


  $query = "UPDATE blood_bank_tb
  SET
   bank_id  = '$bank_id',
  bank_name = '$bank_name',
    username = '$username',
  password = '$password',
    division  = '$division',
  location = '$location',
  email = '$email',
    contact  = '$contact',
  
      logo = '$folder'



  WHERE bank_id = $bank_id";
}
  else{
  $status = mysqli_real_escape_string($db->link, $_POST['status']);

  

    $query = "UPDATE blood_bank_tb SET status='$status' where bank_id='$bank_id' ";}
  $update = $db->update($query);
    if($update){

      //if else 

      if($_SESSION["type"]=="Admin"){
       echo "<SCRIPT type='text/javascript'> 
     
        window.location.replace(\"http://localhost/EUDV/bloodbank/ViewBloodBankPending.php?page=1\");
    </SCRIPT>";
        }else{
          echo "<SCRIPT type='text/javascript'> 
        
        window.location.replace(\"http://localhost/EUDV/organizationHome.php\");
    </SCRIPT>";
        }

         // echo "<SCRIPT type='text/javascript'> 
       // alert('Edit Profile Successfull');
       // window.location.replace(\"http://localhost/EUDV/organizationHome.php\");
   // </SCRIPT>";
   // header("Location:http://localhost/EUDV/bloodbank/ViewBloodBank.php");
  }
 
 
}
 if($_SESSION["type"]=='Organization'){
  
include "../organizationHeader.php";

}
else{
  
  include "../adminHeader.php";
}

?>





   

<br>
<br>

<div class="container">
  <div class="row">
    <div class="col-sm-8">

  
<form action="UpdateBloodBank.php?bank_id=<?php echo $bank_id;?>" method="POST" enctype="multipart/form-data">
    <?php 

      if($_SESSION["type"]=='Organization'){

    ?>
  
    
<div class="form-group">

    <label for="bank_id"><b>Bank ID:</b></label>
    <input type="text" name="bank_id" class="form-control" value="<?php echo $getData['bank_id'] ?>" readonly>
</div>
<div class="form-group">
    <label for=""><b>Bank Name:</b></label>
    <input type="text" name="bank_name" class="form-control" value="<?php echo $getData['bank_name'] ?>">
</div>
<div class="form-group">
    <label for=""><b>User Name:</b></label>
    <input type="text" name="username" class="form-control" value="<?php echo $getData['username'] ?>">
</div>

<div class="form-group">
  <label for=""><b>Password:</b></label>
    <input type="text" name="password" class="form-control" value="<?php echo $getData['password'] ?>">
</div>
    
    <div class="form-group">
  <label for="division"><b>Division:<b></label>
    <select id="division" name="division" class="form-control" value="<?php echo $getData['division'] ?>">
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
 <label for=""><b>Location:</b></label>
    <input type="text" name="location" class="form-control" value="<?php echo $getData['location'] ?>">
</div>
<div class="form-group">
    <label for=""><b>Email:</b></label>
    <input type="text" name="email" class="form-control" value="<?php echo $getData['email'] ?>">

</div>

<div class="form-group">
   
    <label for=""><b>Contact:</b></label>
   <input type="text"  name="contact" class="form-control" value="<?php echo $getData['contact'] ?>">
  </div>
<div class="form-group">
      <label for=""><b>Logo:</b></label><br><br>
          <td><img src="http://localhost/EUDV/<?php echo $getData['logo']; ?>" height="100px" 
   width="100px"/></td><br>


</div>






<div class="form-group">
   <input type="checkbox" id="myCheck"  onclick="show()" > Want to change?<br>


   <div id="divtemp" style="display: none" >
     <input type="file" id="chImg" name="uploadfile" value="<?php echo $getData['logo'] ?>"  />
           
    </div>

    <script type="text/javascript">
      function show(){
        var val1=document.getElementById("myCheck");
         var val2=document.getElementById("divtemp");
          var val3=document.getElementById("chImg");

          if (val1.checked == true){
          val2.style.display = "block";

      
            } 
            else{
              val2.style.display = "none";
              val3.value="";

            } 
      }

    </script>
    

  </div>
       

    <?php 
      }else{

    ?>

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

   <?php 
    }
   ?>


    <input  type="submit" class="btn btn-success" name="submit"  onclick="return confirm('Are You Sure to Change Info?')"  value="Submit">
   

     </form>
</div>
</div>
</div>



<?php if($_SESSION["type"]=='Organization'){
  
include "../organizationFooter.php";

}
else{
  
  include "../adminFooter.php";
}
 ?>

