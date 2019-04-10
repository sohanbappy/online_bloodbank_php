
<?php

include "../function/config.php";
include "../function/Database.php";
session_start();
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
$folder = "donor_img/".$filename;

move_uploaded_file($tempname, $folder);
       
        
 if($name == '' || $username == '' || $password == '' || $bloodgroup == '' || $division == '' || $email == '' || $location == '' || $weight == '' || $age == '' || $phone == '' || $status == '' || $gender == '' ){
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


  
  $query = "INSERT INTO donor_tb(name, username, password, bl_group, division, email, location, weight, age, phone, activity, status, gender,img) 
   Values('$name', '$username', '$password', '$bloodgroup', '$division', '$email', '$location', '$weight', '$age', '$phone', 'active' ,'$status', '$gender','$folder')";
  $create = $db->insert($query);
  if($create){
    echo "<SCRIPT type='text/javascript'> 
        alert('Successfully Registered!!');
        window.location.replace(\"http://localhost/EUDV/organizationHome.php\");
    </SCRIPT>";
 // header("Location: http://localhost/EUDV/index.php");
   }
 }

 }
}


include "../organizationHeader.php";

?>










<div class="container">
  <div class="row">
    <div class="col-sm-8">




  <form action="" method="POST" enctype="multipart/form-data">
 <div class="form-group">
   <h2><center>Donor Registration Form</center></h2>
    <label for="name"><b>Name:</b></label>
    <input type="text" class="form-control" name="name" placeholder="Your name..">
  </div>
       <div class="form-group">
    <label for="lname"><b>User name:</b></label>
    <input type="text" class="form-control" name="username" placeholder="Your username..">
   </div>
 <div class="form-group">
    <label for="lname"><b>Password:</b></label>
   
    <input type="password" class="form-control" name="password" class="" placeholder="Enter your Password.." required="">
</div>

     <div class="form-group">
    <label for="bloodgroup"><b>Blood Group:</b></label>
    <select class="form-control" name="bloodgroup">
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
  </div>

   <div class="form-group">

     <label for="division"><b>Division:<b></label>
    <select class="form-control" name="division">
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
</div>
      <div class="form-group">
    <label for="email"><b>Email:</b></label>
    <input type="text" class="form-control" name="email" class="" placeholder="Enter your email.." required="">
  </div>
   <div class="form-group">
    <label for="location"><b>Location:</b></label>
    <input type="text" class="form-control" name="location" class="" placeholder="Enter your location.." required="">
</div>

 <div class="form-group">
    <label for="weight"><b>Weight (kg):</b></label>
     <input type="number" class="form-control" name="weight" class="" placeholder="Enter your weight.. kg" >
 </div>




 <div class="form-group">
    <label for="age"><b>Age:</b></label>
 <input type="number" class="form-control" name="age" class="" placeholder="Enter your age.." required="">
</div>


    <div class="form-group">
    <label for="phone"><b>Phone:</b></label>
   <input type="number" class="form-control" name="phone" class="" placeholder="Enter your Phone.." required="">
 </div>

     <div class="form-group">
    <label for="status"><b>Status:</b></label>
    <input type="text" class="form-control" value="Pending" name="status" class="" placeholder="Enter your status.." readonly="" >

</div>

 <div class="form-group">

<label for="gender"><b>Gender:</b></label>
     <input type="radio" id="gender" name="gender" value="male">Male
       <input type="radio" name="gender" value="female">Female

</div>
         
          <div class="form-group">
        <label for="uploadfile"><b>Picture:</b></label><br><br>
         Upload Image  <input type="file"class="form-control" name="uploadfile" />
         </div>

    <input type="submit" name="submit" onclick="return confirm('Are You Sure create an account for donor?')" value="Submit">
  </form>
</div>

<!--<div class="joy">
 <a href="ViewDonor.php"><b>Go Back</b></a>

</div>-->
<script type="text/javascript">


</script>



</body>
</html>

