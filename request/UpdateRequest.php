<?php

include "../function/config.php";
include "../function/Database.php";
?>


<?php 
 $req_id = $_GET['req_id'];
 $db = new Database();
 $query = "SELECT * FROM request_tb WHERE req_id=$req_id";
 $getData = $db->select($query)->fetch_assoc();

if(isset($_POST['submit'])){
 $req_id  = mysqli_real_escape_string($db->link, $_POST['req_id']);
 $sender = mysqli_real_escape_string($db->link, $_POST['sender']);
  $receiver =mysqli_real_escape_string($db->link,$_POST['receiver']);
 $req_date = mysqli_real_escape_string($db->link, $_POST['req_date']);
  $status = mysqli_real_escape_string($db->link, $_POST['status']);

 if($req_id == '' || $sender == '' || $receiver == '' || $req_date == '' || $status == ''){
  $error = "Field must not be Empty !!";
 } else {
  $query = "UPDATE request_tb
  SET
   req_id  = '$req_id',
 sender = '$sender',
  receiver = '$receiver',
    req_date  = '$req_date',

  status = '$status'

  WHERE req_id = $req_id";

  $update = $db->update($query);
   if($update){
    header("Location:ViewRequest.php");
  }
 }
}
?>





<!DOCTYPE html>
<html>
<style>
input[type=text], input[type=password],input[type=date],input[type=number], select {
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

 div {
  width:40%;
  border-radius: 10px;
  background-color: #f2f2f2;
  padding-top: 20px;
  padding-left: 50px;
  padding-right:50px;
  padding-bottom:40px;
  height: auto;
  margin-top: 100px;
  margin-left: 27%;
  margin-bottom: 50px;

  
}
.joy a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin-left:10%;
 
}


</style>
<body>



<div>
  
<form action="UpdateRequest.php?req_id=<?php echo $req_id;?>" method="POST">
  
    <h2><center>Registration Form</center></h2>

 

 <label for=""><b>Request ID:</b></label>
    <input type="text" name="req_id" value="<?php echo $getData['req_id'] ?>" >


    <label for=""><b>Sender:</b></label>
   
    <input type="text" name="sender" class="" value="<?php echo $getData['sender'] ?>">






    <label for=""><b>Receiver:</b></label>
    <input type="text" name="receiver" class="" value="<?php echo $getData['receiver'] ?>">

 




    <label for=""><b>Request Date</b></label>
    <input type="date" name="req_date" class="" value="<?php echo $getData['req_date'] ?>">

 





    
  
  <label for="status"><b>Status:<b></label>
    <select name="status" value="<?php echo $getData['status'] ?>">
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
     
      >Accepted</option>

  
       

    <input type="submit" name="submit" value="Submit">
   

     </form>
</div>
<div class="joy">
 <a href="ViewRequest.php"><b>Go Back</b></a>

</div>

</body>
</html>