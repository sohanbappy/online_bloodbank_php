<?php

include "function/config.php";
include "function/Database.php";
 session_start();
 
 $db = new Database();

        $uname = addslashes("$_POST[uname]");
        $password = addslashes("$_POST[password]");
		    $type = addslashes("$_POST[type]");



 

		//for admin
		if($type=="Admin"){
			
		
        $query = "Select * from admin_tb WHERE username = '$uname' AND password='$password' ";
        $read = $db->select($query);
        if($read) 
        {
        $row = mysqli_fetch_array($read);
      $_SESSION["usl"]=$row['serial'];
      $_SESSION["uid"]=$row['username'];
       $_SESSION["type"]=$type;
      
      
      header('Location:http://localhost/EUDV/adminHome.php');
    }
    else{
      include "incc/head.php";
     echo "<center><span style='padding:500px';><h1>Not Correct Info!!!</h1></span></center>";
     //<a href='index.php'>Home</a></span></center>";
     include "incc/footer.php";
    }
  }
  

	//for Donor
	else if($type=="Donor")

	{
			
        $query = "Select * from donor_tb WHERE username='$uname' AND password='$password' AND status = 'Accepted' ";
        $read = $db->select($query); 
        if($read) 
        {
       $row = mysqli_fetch_array($read);
      $_SESSION["usl"]=$row['donor_id'];
      $_SESSION["uid"]=$row['username'];
       $_SESSION["type"]=$type;
      
      header('Location:http://localhost/EUDV/donorHome.php');
    }
    else{

      include "incc/head.php";
    // echo "<span style='padding:100px;'>Not Correct Info!!!<a href='index.php'>Home</a></span>";
         echo "<center><span style='padding:500px';><h1>Not Correct Info!!!</h1></span></center>";
     include "incc/footer.php";
    }
		
	}



	//for Organization
	else if($type == "Organization")
	{
		
		
			
        $query = "Select * from blood_bank_tb WHERE username ='$uname' AND password='$password' AND status = 'Accepted' ";
        $read = $db->select($query);
        if($read) 
        {
   
     $row = mysqli_fetch_array($read);
      //$_SESSION["usl"]=$row['bank_id'];
      $_SESSION["uid"]=$row['bank_id'];
      $_SESSION["division"]=$row['division'];
      
        $_SESSION["bank_name"]=$row['bank_name'];
       $_SESSION["type"]=$type;
      
      
      header('Location:http://localhost/EUDV/organizationHome.php');
    }
    else{
      include "incc/head.php";
    // echo "<span style='padding:100px;'>Not Correct Info!!!<a href='index.php'>Home</a></span>";
         echo "<center><span style='padding:500px';><h1>Not Correct Info!!!</h1></span></center>";
     include "incc/footer.php";
    }
	}






?>