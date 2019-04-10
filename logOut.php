
<?php
	session_start();
 	
	if(!empty($_SESSION["uid"]))
	{
	session_destroy();
	header('Location:http://localhost/EUDV/login.php');
    }
    else{
    	header('Location:http://localhost/EUDV/index.php');
    }
?>

