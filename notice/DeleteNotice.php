<?php

include "../function/config.php";
include "../function/Database.php";
?>


<?php 
 $notice=$_GET['notice_id'];
 $db = new Database();
 $query = "DELETE FROM notice_tb WHERE notice_id=$notice";
$delete = $db->delete($query);
if($delete){
	header("Location:ViewNotice.php");
}
?>