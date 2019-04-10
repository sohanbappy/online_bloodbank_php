<?php

include "../function/config.php";
include "../function/Database.php";

session_start();



?>

<?php 
 $db = new Database();
if(isset($_POST['submit'])){

  $full_bl_group="";
   $bl_group = "";
   $unit = "";
   $donated_to ="";




 $user_id  = mysqli_real_escape_string($db->link, $_POST['user_id']);

 if($_SESSION['type']=="Organization"){
 $full_bl_group = mysqli_real_escape_string($db->link, $_POST['bl_group']);
  
    if($full_bl_group=="a_positive"){$bl_group="A+";}
      else if($full_bl_group=="a_negative"){$bl_group="A-";}
        else if($full_bl_group=="b_positive"){$bl_group="B+";}
          else if($full_bl_group=="b_negative"){$bl_group="B-";}
            else if($full_bl_group=="ab_positive"){$bl_group="AB+";}
              else if($full_bl_group=="ab_negative"){$bl_group="AB-";}
                else if($full_bl_group=="o_positive"){$bl_group="O+";}
                  else{$bl_group="O-";}

   $unit = mysqli_real_escape_string($db->link, $_POST['unit']);
}



 $donation_date = mysqli_real_escape_string($db->link, $_POST['donation_date']);
 if($_SESSION['type']=="Donor"){
  $donated_to =mysqli_real_escape_string($db->link,$_POST['donated_to']);
  }
 $recipient_address = mysqli_real_escape_string($db->link, $_POST['recipient_address']);
  $confirmed_by= mysqli_real_escape_string($db->link, $_POST['confirmed_by']);
  $status = mysqli_real_escape_string($db->link, $_POST['status']);

       
        
 if($user_id == '' || $donation_date == ''  || $recipient_address == '' || $status == ''){
  $error = "Field must not be Empty !!";
 } else {

    if($_SESSION["type"]=="Donor"){
      $blquery ="SELECT bl_group from donor_tb WHERE username ='$_SESSION[uid]' ";
      $blres = $db->select($blquery);
      $al_bl_group = $blres->fetch_assoc();
      $bl_group=$al_bl_group['bl_group'];


        $query = "INSERT INTO donation_tb(user_id, bl_group, donation_date, donated_to, recipient_address, confirmed_by, status,type) 
   Values('$user_id', '$bl_group', ' $donation_date', '$donated_to', '$recipient_address', '$confirmed_by', '$status', 'Donor')";
  $create = $db->insert($query);

  $updateDonor = "UPDATE donor_tb SET donation_last_date ='$donation_date' WHERE username = '$user_id' ";
  $upResult = $db->update($updateDonor);

  header("Location:http://localhost/EUDV/ViewDonorDonation.php");  

    }else{


    $sql = "SELECT storage_tb.$full_bl_group as quantity from storage_tb WHERE bank_id ='$user_id' ";
    $res = $db->select($sql);
    $row = $res->fetch_assoc();
    // echo $row['quantity']; exit();

      if($unit<=$row['quantity'])
      {
        //deduct quantity
        $lastQty = $row['quantity'] - $unit;


  $query = "INSERT INTO donation_tb(user_id, bl_group, unit, donation_date, recipient_address, confirmed_by, status, type) 
   Values('$user_id', '$bl_group', '$unit', ' $donation_date', '$recipient_address', '$confirmed_by', '$status', 'Organization')";
  $create = $db->insert($query);

//update quantity
  $updateQty = "UPDATE storage_tb SET storage_tb.$full_bl_group = '$lastQty' WHERE bank_id ='$user_id' ";
  $res2 = $db->update($updateQty);


    if($create){

      if($_SESSION["type"]=="Organization"){
       echo "<SCRIPT type='text/javascript'> 
        alert('Donation Request Successfully Sent!! Plz wait for approval');
        window.location.replace(\"http://localhost/EUDV/ViewOrgDonation.php\");
    </SCRIPT>";
        }else{
          echo "<SCRIPT type='text/javascript'> 
        alert('Donation Request Successfully Sent!! Plz wait for approval');
        window.location.replace(\"http://localhost/EUDV/ViewDonorDonation.php\");
    </SCRIPT>";
        }
   // header("Location:ViewDonation.php");
  }
}
else{
    echo "<script>alert('Unit not available!!')</script>";
}

 }
//insert
 }




}

 if($_SESSION["type"]=='Organization'){
  
include "../organizationHeader.php";

}
  else{
  include "../donorHeader.php";
}



?>





<div class="container">
  <div class="row">
    <div class="col-sm-8">




  <form action="" method="POST">



    <label for=""><b>User ID:</b></label>
    <input type="text" name="user_id" class="form-control" value="<?php echo $_SESSION['uid']; ?>" readonly>


     <?php  if($_SESSION['type']=="Organization"){ ?>

   <label for="bloodgroup"><b>Blood Group:</b></label>
    <select name="bl_group" class="form-control">
      <option value="">..Select..</option>
      <option value="a_positive">A+</option>
      <option value="a_negative">A-</option>
      <option value="b_positive">B+</option>
      <option value="b_negative">B-</option>
      <option value="ab_positive">AB+</option>
      <option value="ab_negative">AB-</option>
      <option value="o_positive">O+</option>
      <option value="o_negative">O-</option>
    
    </select>

  <label for=""><b>Unit:</b></label>
    <input type="number" name="unit" class="form-control" min="1" max="5" required="">
<?php } ?>

    <label for=""><b>Donation Date:</b></label>
    <input type="date" name="donation_date" class="form-control"  required="">



    <?php  if($_SESSION['type']=="Donor"){ ?>
    
    <label for=""><b>Donated To:</b></label>
    <select id="donated_to" name="donated_to" class="form-control">
      <option value="">Select..</option>
      <option value="Direct to patient">Direct to patient</option>
      <option value="To a blood bank">To a blood bank</option>
    </select>
   <?php } ?>

    <label for=""><b>Recipient Address:</b></label>
    <input type="text" name="recipient_address" class="form-control" placeholder="Enter recipient address." required="">

<br>

    
    <label for=""><b>Confirmed By:</b></label>
    <input type="text" name="confirmed_by" class="form-control" placeholder="Enter  contact--ex: doctor's number" required="">

  

    <label for="status"><b>Status:</b></label>
    <input type="text" name="status" class="form-control" value="Pending" readonly="">
          <br>
           <br>

    <input type="submit" name="submit" class="btn btn-danger" onclick="return confirm('Are You Want To Sent Request?')"  value="Submit">
  </form>
</div>
</div>

<!--<div class="joy">
 <a href="ViewDonation.php"><b>Go Back</b></a>
-->
</div>

</body>
</html>


