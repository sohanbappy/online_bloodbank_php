<?php
	class dbconfig{
		public function connection(){
			$conn = new mysqli("localhost","root","","onlinebloodbank");
			return $conn;
		}
	}
?>
