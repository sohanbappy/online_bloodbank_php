<?php

include "../function/config.php";
include "../function/Database.php";
?>


<?php 
 $donor_id = $_GET['donor_id'];
 $db = new Database();
 $query = "DELETE FROM donor_tb WHERE donor_id='$donor_id'";
$delete = $db->delete($query);
if($delete){
	header("Location:http://localhost/EUDV/donor/ViewDonor.php?page=1");
             
}

?>