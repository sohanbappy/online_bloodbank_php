
<?php include 'incc/head.php';?>
<?php

include "function/config.php";
include "function/Database.php";
?>

<?php 
 $db = new Database();
if(isset($_POST['submit'])){

             // "org-".
$autoGenKey = "org-".date("m").date("s").date("Y").date("d").date("H");

 $bank_id  = $autoGenKey;
 $bank_name = mysqli_real_escape_string($db->link, $_POST['bank_name']);
  $username = mysqli_real_escape_string($db->link, $_POST['username']);
  $password = mysqli_real_escape_string($db->link,$_POST['password']);
 $division = mysqli_real_escape_string($db->link, $_POST['division']);
  $location = mysqli_real_escape_string($db->link, $_POST['location']);
   $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $contact = mysqli_real_escape_string($db->link, $_POST['contact']);
     $status = mysqli_real_escape_string($db->link, $_POST['status']);
    
$filename = $_FILES["uploadfile"] ["name"];
$tempname = $_FILES["uploadfile"] ["tmp_name"];
//$folder = "BloodBank_logo/".$filename;
 $folder = "bloodbank/BloodBank_logo/".$filename;
move_uploaded_file($tempname, $folder);
        
 if($bank_id == '' || $bank_name == '' || $password == '' || $division == '' || $location == '' || $email == '' || $contact == '' || $status == '' ){
  $error = "Field must not be Empty !!";
 } else {
  $query = "INSERT INTO blood_bank_tb(bank_id, bank_name, username, password, division, location, email, contact, status,logo) 
   Values('$bank_id', '$bank_name', '$username', '$password', '$division', '$location',  '$email', '$contact', '$status', '$folder')";
  $create = $db->insert($query);

  $sql="INSERT INTO storage_tb(bank_id,a_positive,a_negative,b_positive,b_negative,ab_positive,ab_negative,o_positive,o_negative) VALUES('$bank_id',0,0,0,0,0,0,0,0)";
  $result=$db->insert($sql);


    if($create){
        echo "<SCRIPT type='text/javascript'> 
        alert('Successfully Registered!! Plz wait for approval');
        window.location.replace(\"http://localhost/EUDV/login.php\");
    </SCRIPT>";
   // header("Location:http://localhost/EUDV/index.php");
  }
 }
}

?>






<!DOCTYPE html>
<html>
<style>
input[type=text], input[type=password], input[type=number], select {
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

 .form {
  width:40%;
  border-radius: 10px;
  background-color: #f2f2f2;
  padding-top: 20px;
  padding-left: 50px;
  padding-right:50px;
  padding-bottom:40px;
  height: auto;
  margin-top: 15px;
  margin-left: 27%;
  margin-bottom: 50px;

  
}
</style>
<body>



<div class="form">
  <form action="" method="POST" enctype="multipart/form-data">
   <h2><center>Organization Registration Form</center></h2>

    

    <label for=""><b>Bank Name:</b></label>
    <input type="text" name="bank_name">


    <label for=""><b>User Name:</b></label>
    <input type="text" name="username">

  <label for=""><b>Password:</b></label>
    <input type="password" name="password">

    
 
     <label for="division"><b>Division:<b></label>
    <select id="division" name="division">
        <option value="">..Select..</option>
      <option value="Barisal">Barisal</option>
      <option value="Chittagong">Chittagong</option>
       <option value="Dhaka">Dhaka</option>
      <option value="B+">Mymensingh </option>
      <option value="Khulna">Khulna</option>
      <option value="Rajshahi">Rajshahi</option>
      <option value="Rangpur">Rangpur</option>
      <option value="Sylhet ">Sylhet </option>
    
    
    </select>


 <label for=""><b>Location:</b></label>
    <input type="text" name="location" >

    <label for=""><b>Email:</b></label>
    <input type="text" name="email">




   
    <label for=""><b>Contact:</b></label>
   <input type="number" name="contact" maxlength="11">
  
    
    

    <label for=""><b>Status:</b></label>
    <input type="text" name="status" value="Pending" readonly="">


              <label for="uploadfile"><b>Logo:</b></label><br><br>
         Upload Image  <input type="file" name="uploadfile" />
           <br>
           <br>
         

    <input type="submit" name="submit" onclick="return confirm('Are u Sure?\n Remember Username and Password Plz')" value="Submit">
  </form>
</div>

<!--<div class="joy">
 <a href="ViewBloodBank.php"><b>Go Back</b></a>
-->
</div>

</body>
</html>

<?php include 'incc/footer.php'; ?>