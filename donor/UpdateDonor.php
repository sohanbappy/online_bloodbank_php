<?php

include "../function/config.php";
include "../function/Database.php";
session_start();

 

?>




<?php 
 $donor_id = $_GET['donor_id'];
 $db = new Database();
 $query = "SELECT * FROM donor_tb WHERE donor_id = $donor_id";
 $getData = $db->select($query)->fetch_assoc();

if(isset($_POST['submit'])){


  if($_SESSION["type"]=='Donor'){

       $name  = mysqli_real_escape_string($db->link, $_POST['name']);
 $username = mysqli_real_escape_string($db->link, $_POST['username']);
  $password=mysqli_real_escape_string($db->link,$_POST['password']);
 $bloodgroup = mysqli_real_escape_string($db->link, $_POST['bloodgroup']);
  $division = mysqli_real_escape_string($db->link, $_POST['division']);
   $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $location = mysqli_real_escape_string($db->link, $_POST['location']);
     // $weight = mysqli_real_escape_string($db->link, $_POST['weight']);
      $age = mysqli_real_escape_string($db->link, $_POST['age']);
       $phone = mysqli_real_escape_string($db->link, $_POST['phone']);
         $gender = mysqli_real_escape_string($db->link, $_POST['gender']);

   // $filename = $_FILES["uploadfile"] ["name"];
   // $tempname = $_FILES["uploadfile"] ["tmp_name"];
   // $folder = "student/".$filename;

   // move_uploaded_file($tempname, $folder);      

    $filename = $_FILES["uploadfile"] ["name"];
    $tempname = $_FILES["uploadfile"] ["tmp_name"];

    if($tempname==""){
   //   echo $getData["img"];exit();
      $tempfolder=$getData["img"];
       $folder = $tempfolder;
    }
    else{

    $tempfolder = "donor_img/".$filename;
     $folder = "donor/donor_img/".$filename;
      }
    move_uploaded_file($tempname, $tempfolder);
 
 


  $query = "UPDATE donor_tb
  SET
   name  = '$name',
  username = '$username',
  password = '$password',
    bl_group  = '$bloodgroup',
  division = '$division',
  email = '$email',
  location  = '$location',


    age  = '$age',
  phone = '$phone',
  gender = '$gender',
  img = '$folder'

  WHERE donor_id = $donor_id";
}
else{
  $status = mysqli_real_escape_string($db->link, $_POST['status']);
  $query = "UPDATE donor_tb SET status='$status' where donor_id='$donor_id' ";
}

  $update = $db->update($query);
  if($update){
   if($_SESSION["type"]=="Admin"){
       echo "<SCRIPT type='text/javascript'> 
     
        window.location.replace(\"http://localhost/EUDV/donor/ViewDonorPending.php?page=1\");
    </SCRIPT>";
        }else{
          echo "<SCRIPT type='text/javascript'> 
        
        window.location.replace(\"http://localhost/EUDV/donorHome.php\");
    </SCRIPT>";
        }ation: http://localhost/EUDV/donor/ViewDonor.php");
  }
 
}

  if($_SESSION["type"]=='Donor'){
  
include "../donorHeader.php";

}
else{
  
  include "../adminHeader.php";
}


?>

<div class="container">
  <div class="row">
    <div class="col-sm-8">




<form action="" method="POST" enctype="multipart/form-data">
  

    <?php 

      if($_SESSION["type"]=='Donor'){

    ?>


   <div class="form-group">
    <label for="name"><b>Name:</b></label>
    <input type="text" name="name" class="form-control" value="<?php echo $getData['name'] ?>">
</div>
<div class="form-group">

    <label for="lname"><b>User name:</b></label>
    <input type="text" name="username" class="form-control" value="<?php echo $getData['username'] ?>"   readonly="" >
</div>
<div class="form-group">

    <label for="lname"><b>Password:</b></label>
   
    <input type="password" name="password" class="form-control" value="<?php echo $getData['password'] ?>">
</div>
   




    <div class="form-group">
 <label for="bloodgroup"><b>Blood Group:</b></label>
    <select name="bloodgroup" class="form-control" value="<?php echo $getData['bl_group'] ?>">
      <option value="">..Select..</option>
   
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
    <label for="email"><b>Email:</b></label>
    <input type="text" name="email" class="form-control" value="<?php echo $getData['email'] ?>">
    </div>
    <div class="form-group">
    <label for="location"><b>Location:</b></label>
    <input type="text" name="location" class="form-control" value="<?php echo $getData['location'] ?>">

   </div>







<div class="form-group">
    <label for="age"><b>Age:</b></label>
 <input type="number" name="age" class="form-control" value="<?php echo $getData['age'] ?>">
   </div>
   <div class="form-group">
    <label for="phone"><b>Phone:</b></label>
   <input type="number" name="phone" class="form-control" value="<?php echo $getData['phone'] ?>">
  
   </div>


   <div class="form-group">

         <label for="gender"><b>Gender:</b></label>
     <input type="radio" name="gender" value="male"
    <?php 

    $gender = $getData['gender'];


    if( $gender == "male"){
      echo "checked";
    }

?>
 >Male


       <input type="radio" name="gender" value="female"
  <?php 
    if($gender == "female"){
      echo "checked";
    }

?>

 >Female
   
</div>

<div class="form-group">




  <label for=""><b>Picture:</b></label><br><br>
    <img src="http://localhost/EUDV/<?php echo $getData['img']; ?>" height="100px" 
   width="100px"/> <br>


   <input type="checkbox" id="myCheck" onclick="show()" > Want to change?<br>


   <div id="divtemp" style="display: none" >
     <input type="file" id="chImg" name="uploadfile" />
           
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


        

    <input type="submit" name="submit" onclick="return confirm('Are You Sure to Change Info?')" value="Submit">
   

     </form>
<!--</div>
<div class="joy">
 <a href="ViewDonor.php"><b>Go Back</b></a>-->

</div>
