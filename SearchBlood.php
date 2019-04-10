<?php include 'incc/head.php';?>

<?php

include "function/config.php";
include "function/Database.php";
?>




<!DOCTYPE html>
<html>
<style>
input[type=text], input[type=password], input[type=number],select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

 .form {
  width:40%;
  border-radius: 10px;
  background-color: #f2f2f2;
  padding-top: 20px;
  padding-left: 50px;
  padding-right:50px;
  padding-bottom:40px;
  height: auto;
  margin-top: 15px;
  margin-left: 27%;
  margin-bottom: 25px;

  
}
</style>
<body>






<div class="form">
  <form action="ViewSearchBlood.php" method="POST">
   <h2><center>Search Blood in organization </center></h2>
   
    
    <label for="bloodgroup"><b>Blood Group:</b></label>
    <select id="bloodgroup" name="bloodgroup">
      <option selected="" disabled="">..Select..</option>
      <option value="a_positive">A+</option>
      <option value="a_negative">A-</option>
      <option value="b_positive">B+</option>
      <option value="b_negative">B-</option>
      <option value="ab_positive">AB+</option>
      <option value="ab_negative">AB-</option>
      <option value="o_positive+">O+</option>
      <option value="o_negative">O-</option>
    
    </select>

     <label for="division"><b>Division:<b></label>
    <select id="division" name="division">
        <option value="">..Select..</option>
      <option value="Barisal">Barisal</option>
      <option value="Chittagong">Chittagong</option>
      <option value="Dhaka">Dhaka</option>
      <option value="Mymensingh">Mymensingh </option>
      <option value="Khulna">Khulna</option>
      <option value="Rajshahi">Rajshahi</option>
      <option value="Rangpur">Rangpur</option>
      <option value="Sylhet ">Sylhet </option>
    
    
    </select>


   

    <input type="submit" name="submit" value="Submit">
  </form>
</div>




</body>
<?php include "incc/footer.php"; ?>