<?php

include "../function/config.php";
include "../function/Database.php";
?>


<?php 
 $storage_id = $_GET['storage_id'];
 $db = new Database();
 $query = "DELETE FROM storage_tb WHERE storage_id=$storage_id";
$delete = $db->delete($query);
 if($delete){
    header("Location:ViewStorage.php");
  }
?>