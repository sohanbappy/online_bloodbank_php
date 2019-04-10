
<?php include 'incc/head.php'?>

<?php

include "function/config.php";
include "function/Database.php";
?>

<?php 
 $db = new Database();
if(isset($_POST['submit'])){
 $bl_group  = mysqli_real_escape_string($db->link, $_POST['bl_group']);
  
 $bl_unit = mysqli_real_escape_string($db->link, $_POST['bl_unit']);
  $needed_date = mysqli_real_escape_string($db->link, $_POST['needed_date']);
  $rqst_name=mysqli_real_escape_string($db->link,$_POST['rqst_name']);
 $division = mysqli_real_escape_string($db->link, $_POST['division']);
  $contact= mysqli_real_escape_string($db->link, $_POST['contact']);
   $p_location = mysqli_real_escape_string($db->link, $_POST['p_location']);
     $status = mysqli_real_escape_string($db->link, $_POST['status']);
  
   

  $query = "INSERT INTO notice_tb( bl_group, bl_unit, needed_date,rqst_name, division, contact, p_location, status) 
   Values('$bl_group', '$bl_unit', '$needed_date', '$rqst_name', '$division', ' $contact', '$p_location', '$status')";
  $create = $db->insert($query);
  if($create){
    header("Location:http://localhost/EUDV/index.php");
  }
 }

?>






<!DOCTYPE html>
<html>
<style>
input[type=text], input[type=password], input[type=number], input[type=date], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

 form {
  width:40%;
  border-radius: 10px;
  background-color: #f2f2f2;
  padding-top: 40px;
  padding-left: 100px;
  padding-right:100px;
  padding-bottom:40px;
  height: auto;
  margin-top: 10px;
  margin-left: 24%;
  margin-bottom: 10px;

  
}
</style>
<body>



<div class="form">
  <form action="" method="POST">

 <h2><center>Request for blood</center></h2>
      

 <label for="bl_group"><b>Blood Group:</b></label>
    <select id="bl_group" name="bl_group">
      <option value="">..Select..</option>
      <option value="A+">A+</option>
      <option value="A-">A-</option>
      <option value="B+">B+</option>
      <option value="B-">B-</option>
      <option value="AB+">AB+</option>
      <option value="AB-">AB-</option>
      <option value="O+">O+</option>
      <option value="O-">O-</option>
    
    </select>


    <label for="bl_unit"><b>Blood Amount:</b></label>
    <input type="number" name="bl_unit" placeholder="Enter Blood Unit..">

<label for=""><b>Needed Date:</b></label>
    <input type="date" name="needed_date" ">


  


   


    <label for="rqst_name"><b>Request From(name):</b></label>
    <input type="text" id="rqst_name" name="rqst_name" class="" placeholder="Enter your name.." >

      

 <label for="division"><b>Division:<b></label>
    <select id="division" name="division">
        <option value="">..Select..</option>
      <option value="Barisal">Barisal</option>
      <option value="Chittagong">Chittagong</option>
            <option value="Chittagong">Dhaka</option>
      <option value="Mymensingh">Mymensingh </option>
      <option value="Khulna">Khulna</option>
      <option value="Rajshahi">Rajshahi</option>
      <option value="Rangpur">Rangpur</option>
      <option value="Sylhet ">Sylhet </option>
    
    
    </select>


    <label for="contact"><b>Contact:</b></label>
     <input type="number" id="contact" name="contact" class="" placeholder="Enter your number.." >
   

    <label for="location"><b>Patient Location:</b></label>
    <input type="text" id="p_location" name="p_location" class="" placeholder="Enter patient location.." >

   

    <label for="location"><b>Status:</b></label>
    <input type="text" name="status" class="" value="Pending" readonly="">

   








    <input type="submit" name="submit" value="Submit">
  </form>
</div>

<!-- <a href="ViewNotice.php"><b>Go Back</b></a> -->

</div>

</body>
</html>

<?php include 'incc/footer.php'?>