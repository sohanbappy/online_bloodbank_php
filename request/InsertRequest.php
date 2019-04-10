

 <?php include "../organizationHeader.php"; ?>


<?php

include "../function/config.php";
include "../function/Database.php";
?>

<?php 
 $db = new Database();
if(isset($_POST['submit'])){
 $req_id  = mysqli_real_escape_string($db->link, $_POST['req_id']);
 $sender = mysqli_real_escape_string($db->link, $_POST['sender']);
  $receiver =mysqli_real_escape_string($db->link,$_POST['receiver']);
 $req_date = mysqli_real_escape_string($db->link, $_POST['req_date']);
  $status = mysqli_real_escape_string($db->link, $_POST['status']);

       
        
 if($req_id == '' || $sender == '' || $receiver == '' || $req_date == '' || $status == ''){
  $error = "Field must not be Empty !!";
 } else {
  $query = "INSERT INTO request_tb(req_id, sender, receiver, req_date, status) 
   Values('$req_id', ' $sender', '$receiver', '$req_date', '$status')";
  $create = $db->insert($query);
   if($create){
    header("Location:ViewRequest.php");
  }
 }
}
?>






<div class="container">
  <div class="row">
    <div class="col-sm-8">




  <form action="" method="POST">
 

<div class="form-group">

    <label for=""><b>Request ID:</b></label>
    <input type="text" name="req_id" class="form-control">
</div>
<div class="form-group">
    <label for=""><b>Sender:</b></label>
   
    <input type="text" name="sender" class="form-control"  required="">


</div>


<div class="form-group">
    <label for=""><b>Receiver:</b></label>
    <input type="text" name="receiver" class="form-control"  required="">

 
</div>

<div class="form-group">

    <label for=""><b>Request Date</b></label>
    <input type="date" name="req_date" class="form-control" required="">

 


</div>


    <div class="form-group">
  

    <label for="status"><b>Status:</b></label>
    <input type="text" name="status" class="form-control"  value="Pending" readonly="">
        </div>

    <input type="submit" name="submit" class="btn btn-danger" value="Submit">
  </form>
</div>

<!--<div class="joy">
 <a href="ViewRequest.php"><b>Go Back</b></a>-->

</div>
</div>
