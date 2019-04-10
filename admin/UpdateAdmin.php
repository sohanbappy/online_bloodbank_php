
<?php
  
include "../function/config.php";
include "../function/Database.php";
?>


<?php 
 $aid = $_GET['aid'];
 $db = new Database();
 $query = "SELECT * FROM admin_tb WHERE aid=$aid";
 $getData = $db->select($query)->fetch_assoc();

if(isset($_POST['submit'])){
 $name  = mysqli_real_escape_string($db->link, $_POST['name']);
 $username = mysqli_real_escape_string($db->link, $_POST['username']);
  $password=mysqli_real_escape_string($db->link,$_POST['password']);
 $occupation = mysqli_real_escape_string($db->link, $_POST['occupation']);
  $address = mysqli_real_escape_string($db->link, $_POST['address']);
  


  $query = "UPDATE admin_tb
  SET
   name  = '$name',
  username = '$username',
  password = '$password',
    occupation  = '$occupation',
  address = '$address'
  
 
  WHERE aid = $aid";

  $update = $db->update($query);
  if($update){
    header("Location:http://localhost/EUDV/admin/ViewAdmin.php");
  }
 
}

include '../adminHeader.php';
?>



<form action="" method="POST">
  

  


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

    <label for="lname"><b>Occupation:</b></label>
   
    <input type="text" name="occupation" class="form-control" value="<?php echo $getData['occupation'] ?>">
</div>
   
   <div class="form-group">

    <label for="lname"><b>Address:</b></label>
   
    <input type="text" name="address" class="form-control" value="<?php echo $getData['address'] ?>">
</div>
   
   



    <input type="submit" name="submit" value="Submit">
   
</form>
     


</div>

</body>
</html>