<?php include 'incc/head.php';?>

<?php

include "function/config.php";
include "function/Database.php";
?>




<?php 
 $db = new Database();
if(isset($_POST['submit'])){
 $name  = mysqli_real_escape_string($db->link, $_POST['name']);
 $username = mysqli_real_escape_string($db->link, $_POST['username']);
  $password=mysqli_real_escape_string($db->link,$_POST['password']);
 $bloodgroup = mysqli_real_escape_string($db->link, $_POST['bloodgroup']);
  $division = mysqli_real_escape_string($db->link, $_POST['division']);
   $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $location = mysqli_real_escape_string($db->link, $_POST['location']);
     $weight = mysqli_real_escape_string($db->link, $_POST['weight']);
      $age = mysqli_real_escape_string($db->link, $_POST['age']);
       $phone = mysqli_real_escape_string($db->link, $_POST['phone']);
        $status = mysqli_real_escape_string($db->link, $_POST['status']);
          $gender = mysqli_real_escape_string($db->link, $_POST['gender']);



$filename = $_FILES["uploadfile"] ["name"];
$tempname = $_FILES["uploadfile"] ["tmp_name"];
//$folder = "BloodBank_logo/".$filename;
 $folder = "donor/donor_img/".$filename;
move_uploaded_file($tempname, $folder);
       
        
 if($name == '' || $username == '' || $password == '' || $bloodgroup == '' || $division == '' || $email == '' || $location == '' || $age == '' || $phone == '' || $status == '' || $gender == '' ){
  $error = "Field must not be Empty !!";
 } else {
    $query1="SELECT username from donor_tb where username= '$username' ";
    $res=$db->select($query1);

  if($res){

      echo "<script>alert('Username already taken!!')</script>";
 }else{

  // $filename = $_FILES["uploadfile"] ["name"];
//$tempname = $_FILES["uploadfile"] ["tmp_name"];
//$folder = "bloodbank/BloodBank_logo/".$filename;
//move_uploaded_file($tempname, $folder);


  
  $query = "INSERT INTO donor_tb(name, username, password, bl_group, division, email, location, age, phone, activity, status, gender,img) 
   Values('$name', '$username', '$password', '$bloodgroup', '$division', '$email', '$location', '$age', '$phone', 'active' ,'$status', '$gender','$folder')";
  $create = $db->insert($query);
  if($create){
    echo "<SCRIPT type='text/javascript'> 
        alert('Successfully Registered!! Plz wait for approval');
        window.location.replace(\"http://localhost/EUDV/login.php\");
    </SCRIPT>";
 // header("Location: http://localhost/EUDV/index.php");
   }
 }

 }
}
?>






<!DOCTYPE html>
<html>
<style>
input[type=text], input[type=password], input[type=number],select {
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
  margin-bottom: 25px;

  
}
</style>
<body>






<div class="form">
  <form action="" method="POST" enctype="multipart/form-data">
   <h2><center>Donor Registration Form</center></h2>
    <label for="name"><b>Name:</b></label>
    <input type="text" id="name" name="name" placeholder="Your name..">

    <label for="lname"><b>User name:</b></label>
    <input type="text" id="username" name="username" placeholder="Your username..">


    <label for="lname"><b>Password:</b></label>
   
    <input type="password" id="password" name="password" class="" placeholder="Enter your Password.." required="">


    
    <label for="bloodgroup"><b>Blood Group:</b></label>
    <select id="bloodgroup" name="bloodgroup">
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

     <label for="division"><b>Division:<b></label>
    <select id="division" name="division">
        <option value="">..Select..</option>
      <option value="Barisal">Barisal</option>
      <option value="Chittagong">Chittagong</option>
      <option value="Dhaka">Dhaka</option>
      <option value="Mymensingh">Mymensingh </option>
      <option value="Khulna">Khulna</option>
      <option value="Rajshahi">Rajshahi</option>
      <option value="Rangpur">Rangpur</option>
      <option value="Sylhet ">Sylhet </option>
    
    
    </select>


    <label for="email"><b>Email:</b></label>
    <input type="text" id="email" name="email" class="" placeholder="Enter your email.." required="">

    <label for="location"><b>Location:</b></label>
    <input type="text" id="location" name="location" class="" placeholder="Enter your location.." required="">



  <!--   <label for="weight"><b>Weight (kg):</b></label>
     <input type="number" id="weight" name="weight" min="45" max="100" placeholder="Enter your weight.. kg" >
 
 -->




    <label for="age"><b>Age:</b></label>
 <input type="number" id="age" name="age" min="17" max="45" placeholder="Enter your age.." required="">


   
    <label for="phone"><b>Phone:</b></label>
   <input type="number" id="phone" name="phone" maxlength="11" minlength="11" placeholder="Enter your Phone.." required="">

    <label for="status"><b>Status:</b></label>
    <input type="text" id="status" value="Pending" name="status" class="" placeholder="Enter your status.." readonly="" >




          <br>
           <br>

<label for="gender"><b>Gender:</b></label>
     <input type="radio" id="gender" name="gender" value="male">Male
       <input type="radio" id="gender" name="gender" value="female">Female



          <br>
           <br>

        <label for="uploadfile"><b>Picture:</b></label><br><br>
         Upload Image  <input type="file" name="uploadfile" />
           <br>
           <br>

    <input type="submit" name="submit" onclick="return confirm('Are u Sure?\n Remember Username and Password Plz')" value="Submit">
  </form>
</div>

<!--<div class="joy">
 <a href="ViewDonor.php"><b>Go Back</b></a>

</div>-->
<script type="text/javascript">


</script>



</body>
</html>

<?php include 'incc/footer.php';?>