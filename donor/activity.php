

<?php


   session_start();

	include "../function/config.php";
        include "../function/Database.php";
        $db = new Database();


if (isset($_GET['activity'])) {
           $updatequery = "UPDATE donor_tb SET activity = '$_GET[activity]' where username = '$_SESSION[uid]' ";
           $read = $db->update($updatequery);
           if($read){
            header("Location: http://localhost/EUDV/donorHome.php");
           }

       }



?>           