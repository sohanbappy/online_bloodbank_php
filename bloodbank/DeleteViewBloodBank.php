<?php

include "../function/config.php";
include "../function/Database.php";
?>


<?php 
 $bank_id = $_GET['bank_id'];
 $db = new Database();
 $query = "DELETE FROM blood_bank_tb WHERE bank_id='$bank_id'";
 // $query = "DELETE blood_bank_tb,storage_tb,donation_tb FROM blood_bank_tb INNER JOIN storage_tb INNER JOIN donation_tb INNER JOIN request_tb ON blood_bank_tb.bank_id = storage_tb.bank_id = donation_tb.user_id WHERE  blood_bank_tb.bank_id='$bank_id' ";
$delete = $db->delete($query);
  if($delete){
    header("Location:http://localhost/EUDV/bloodbank/ViewBloodBank.php?page=1");
 
  }
?>