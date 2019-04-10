
<?php

include "../function/config.php";
include "../function/Database.php";

   session_start(); 

   


?>

<?php 
 $db = new Database();
if(isset($_POST['submit'])){
 $bank_id  = mysqli_real_escape_string($db->link, $_POST['bank_id']);
 $a_positive = mysqli_real_escape_string($db->link, $_POST['a_positive']);
  $a_negative =mysqli_real_escape_string($db->link,$_POST['a_negative']);
 $b_positive = mysqli_real_escape_string($db->link, $_POST['b_positive']);
  $b_negative = mysqli_real_escape_string($db->link, $_POST['b_negative']);
   $ab_positive = mysqli_real_escape_string($db->link, $_POST['ab_positive']);
    $ab_negative = mysqli_real_escape_string($db->link, $_POST['ab_negative']);
     $o_positive = mysqli_real_escape_string($db->link, $_POST['o_positive']);
      $o_negative = mysqli_real_escape_string($db->link, $_POST['o_negative']);
     
        
 if($bank_id == '' || $a_positive == ''  ){
  $error = "Field must not be Empty !!";
 } else {
  $query = "INSERT INTO storage_tb(bank_id, a_positive, a_negative, b_positive, b_negative, ab_positive, ab_negative, o_positive, o_negative) 
   Values('$bank_id', '$a_positive', '$a_negative', '$b_positive', '$b_negative', '$ab_positive', '$ab_negative', '$o_positive', '  $o_negative')";
  $create = $db->insert($query);
   if($create){
    header("Location: http://localhost/EUDV/storage/ViewStorage.php");
    
      }
 }
}

  include "../organizationHeader.php";


?>






<div class="container">
  <div class="row">
    <div class="col-sm-8">



  <form action="" method="POST">
   <div class="form-group">


    <label for="bank_id"><b>Bank Id:</b></label>
    <input type="text" name="bank_id" class="form-control" value="<?php echo $_SESSION['uid']; ?>" readonly  >
</div>

    <div class="form-group">
    <label for="a_positive"><b> A Positive:</b></label>
    <input type="number" name="a_positive" class="form-control" placeholder="Enter quantity">
     </div>
     
     <div class="form-group">
    <label for="a_negative"><b>A Negetive:</b></label>
   
    <input type="number" name="a_negative" class="form-control" placeholder="Enter quantity.">
    </div>


    <div class="form-group">

    <label for="b_positive"><b>B Positive:</b></label>
    <input type="number" name="b_positive" class="form-control" placeholder="Enter quantity" >
     </div>
     <div class="form-group">
    <label for="b_negative"><b> B Negative:</b></label>
    <input type="number" name="b_negative" class="form-control" placeholder="Enter quantity" >
    </div>



    <div class="form-group">
    <label for="ab_positive"><b>AB Positive:</b></label>
    <input type="number" name="ab_positive" class="form-control" placeholder="Enter quantity" >
    </div>
    <div class="form-group">
    <label for="ab_negative"><b> AB Negative:</b></label>
    <input type="number" name="ab_negative" class="form-control" placeholder="Enter quantity" >
      </div>

    <div class="form-group">
    <label for="o_positive"><b>O Positive:</b></label>
    <input type="number" name="o_positive" class="form-control" placeholder="Enter quantity" >
   </div>
   <div class="form-group">
    <label for="o_negative"><b> O Negative:</b></label>
    <input type="number" name="o_negative" class="form-control" placeholder="Enter quantity">

    </div>



    <input class="btn btn-danger" type="submit" name="submit" value="Submit">
  </form>
</div>

<div class="joy">
 <a href="ViewStorage.php"><b>Go Back</b></a>

</div>

</body>
</html>