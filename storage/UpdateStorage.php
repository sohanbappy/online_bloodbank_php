

<?php

include "../function/config.php";
include "../function/Database.php";
?>


<?php 
 $storage_id = $_GET['storage_id'];
 $db = new Database();
 $query = "SELECT * FROM storage_tb WHERE storage_id=$storage_id";
 $getData = $db->select($query)->fetch_assoc();

if(isset($_POST['submit'])){
 $bank_id = mysqli_real_escape_string($db->link, $_POST['bank_id']);
 $a_positive = mysqli_real_escape_string($db->link, $_POST['a_positive']);
  $a_negative=mysqli_real_escape_string($db->link,$_POST['a_negative']);
 $b_positive = mysqli_real_escape_string($db->link, $_POST['b_positive']);
  $b_negative = mysqli_real_escape_string($db->link, $_POST['b_negative']);
   $ab_positive = mysqli_real_escape_string($db->link, $_POST['ab_positive']);
    $ab_negative = mysqli_real_escape_string($db->link, $_POST['ab_negative']);
     $o_positive = mysqli_real_escape_string($db->link, $_POST['o_positive']);
      $o_negative = mysqli_real_escape_string($db->link, $_POST['o_negative']);
    
 if($bank_id == '' || $a_positive == '' || $a_negative == '' || $b_positive == '' || $b_negative == '' || $ab_positive == '' || $ab_negative == '' || $o_positive == '' || $o_negative == '' ){
  $error = "Field must not be Empty !!";
 } else {
  $query = "UPDATE storage_tb
  SET
   bank_id  = '$bank_id',
  a_positive = '$a_positive',
  a_negative = '$a_negative',
    b_positive  = '$b_positive',
  b_negative = '$b_negative',
  ab_positive = '$ab_positive',
    ab_negative  = '$ab_negative',

  o_positive = '$o_positive',
  o_negative = '$o_negative'


  WHERE storage_id =$storage_id";

  $update = $db->update($query);
   if($update){
    header("Location:ViewStorage.php");
  }
 }
}
?>


<?php include "../organizationHeader.php";?>

<div class="container">
  <div class="row">
    <div class="col-sm-8">

  
<form action="UpdateStorage.php?storage_id=<?php echo $storage_id;?>" method="POST">
  
     
<div class="form-group">

   <label for="bank_id"><b>Bank Id:</b></label>
    <input type="text" name="bank_id" class="form-control" value="<?php echo $getData['bank_id'] ?>">
</div>
   
<div class="form-group">

    <label for="a_positive"><b> A Positive:</b></label>
    <input type="number" name="a_positive" class="form-control" value="<?php echo $getData['a_positive'] ?>">
</div>
   
<div class="form-group">

    <label for="a_negative"><b>A Negetive:</b></label>
   
    <input type="number" name="a_negative" class="form-control" value="<?php echo $getData['a_negative'] ?>">
</div>



   
<div class="form-group">
    <label for="b_positive"><b>B Positive:</b></label>
    <input type="number" name="b_positive" class="form-control" value="<?php echo $getData['b_positive'] ?>" >
</div>

   
<div class="form-group">
    <label for="b_negative"><b> B Negative:</b></label>
    <input type="number" name="b_negative" class="form-control" value="<?php echo $getData['b_negative'] ?>" >
</div>


   
<div class="form-group">

    <label for="ab_positive"><b>AB Positive:</b></label>
    <input type="number" name="ab_positive" class="form-control" value="<?php echo $getData['ab_positive'] ?>">
  </div>


<div class="form-group">
    <label for="ab_negative"><b> AB Negative:</b></label>
    <input type="number" name="ab_negative" class="form-control" value="<?php echo $getData['ab_negative'] ?>" >
</div>

   
<div class="form-group">
    <label for="o_positive"><b>O Positive:</b></label>
    <input type="number" name="o_positive" class="form-control" value="<?php echo $getData['o_positive'] ?>" >

</div>

   
<div class="form-group">

    <label for="o_negative"><b>O Negative:</b></label>
    <input type="number" name="o_negative" class="form-control" value="<?php echo $getData['o_negative'] ?>" >
</div>

    <input type="submit" name="submit" value="Submit">
   

     </form>
</div>
<!--<div class="joy">
 <a href="ViewStorage.php"><b>Go Back</b></a>-->

</div>
</div>
