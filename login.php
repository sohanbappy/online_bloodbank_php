
<?php include 'incc/head.php' ?>



<!DOCTYPE html>
<html>
<style>
input[type=text] ,
  input[type=password],select
  {
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
  background-color: #c40707;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #f91616;
}

.form {
  width:40%;
  border-radius: 10px;
   background-color: #f2f2f2;
  padding-top: 30px;
  padding-left: 25px;
  padding-right:25px;
  padding-bottom:40px;
  height: auto;
  margin-top: 0px;
  margin-left: 30%;
  
}

</style>
<body>


<div class="form">
  <form action="loginCheck.php" method="POST">
    <h2><center>Login Form</center></h2>
    

    <label for="uname"><b>User name:</b></label>
    <input type="text" id="uname" name="uname" placeholder="Your your username.." required="" >

   
    <label for="lname"><b>Password:</b></label>
    <input type="password" id="psw" name="password" class="" placeholder="Enter your Password.." required="">
  



        <label for=""><b>Type:</b></label>
    <select id="" name="type" required="">
      <option selected="" disabled="" value="">..Select..</option>
      <option value="Admin">Admin</option>
      <option value="Donor">Donor</option>
      <option value="Organization">Organization</option>
   
    
    </select>


  <br>
  <br>
    <input type="submit" value="Submit">
  </form>
</div>


</body>
</html>
<?php include 'incc/footer.php' ?>