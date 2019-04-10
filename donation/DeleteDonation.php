<?php

include "../function/config.php";
include "../function/Database.php";
?>


<?php 
 $serial = $_GET['serial'];
 $db = new Database();
 $query = "DELETE FROM donation_tb WHERE serial=$serial";
$delete = $db->delete($query);
  if($delete){
    header("Location:http://localhost/EUDV/donation/ViewDonationPending.php?page=1");
  }
  
?>