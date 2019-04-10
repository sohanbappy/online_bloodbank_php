<?php
require_once('dbconfig.php');

class checkLogin{
	
	//Database Connection
	public function con(){
		$connect = new dbconfig();
		return $connect->connection();
	}

	//login check
	public function checkAdmin($username,$password){
		$result = $this->con()->query("Select * from admin_tb where username='$username' password='$password' ");
		return $result;
	}

	}
?>
	