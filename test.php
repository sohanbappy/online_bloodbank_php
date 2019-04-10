
<?php
include "function/Database.php";
  include "function/config.php";


  $db = new Database();



  	if(isset($_POST['submit']))
{

	$name = $_POST['name'];
  $query = "SELECT * FROM test WHERE name = '$name' ";
  $read = $db->select($query)->fetch_assoc();

}


if(isset($_POST['update']))
{

	$quantity = $_POST['quantity'];
		$extra = $_POST['extra'];
		 $name = $_POST['name'];


//calculation
		 	$qty = $quantity + $extra; 


		 	


  $query2 = "UPDATE test SET quantity = '$qty' WHERE name = '$name' ";
  $read2 = $db->update($query2);
  if($read2)
  header("Location: http://localhost/EUDV/test.php");

}


?>


<form action="" method="POST">
		<input type="text" name="name">
		<input type="submit" name="submit" value="Search">
	</form>




	<form action="" method="POST">
			<input type="text" name="name" value="<?php if(isset($read)) echo $read['name']; ?>"readonly >
		<input type="text" name="quantity" value="<?php if(isset($read)) echo $read['quantity']; ?>" readonly >
		<input type="text" name="extra">

		<input type="submit" name="update" value="ADD">
	</form>


   


