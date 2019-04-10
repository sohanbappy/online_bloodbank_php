<?php

include "../function/config.php";
include "../function/Database.php";
?>


<?php 
 $req_id = $_GET['req_id'];
 $db = new Database();
 $query = "DELETE FROM request_tb WHERE req_id=$req_id";
$delete = $db->delete($query);
 if($delete){
    header("Location:ViewOrgReq.php");
  }
?>