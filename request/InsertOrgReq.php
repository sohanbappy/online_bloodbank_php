 
<?php

include "../function/config.php";
include "../function/Database.php";


session_start();
?>

<?php 
 $db = new Database();

    if (isset($_GET['search'])) {
     $bloodgroup = $_GET['bloodgroup'];
     $division = $_SESSION['division'];
     $lim =$_GET['limit'];

     // echo $bloodgroup.$division.$lim;exit();

     $avDate=date('Y-m-d', strtotime('-3 month', time()));

    //  $query = "SELECT * FROM donor_tb WHERE bl_group = '$bloodgroup' AND division ='$division' AND activity='Active' LIMIT $lim ";
     
       $query="SELECT username,name,location,age,gender FROM donor_tb  WHERE bl_group = '$bloodgroup' AND division = '$division' AND activity = 'active' AND donation_last_date <= '$avDate' LIMIT $lim ";

      $read = $db->select($query);


    }

    else if (isset($_GET['uname'])) {
       $donorUname = $_GET['uname'];

        $ranDom = rand(1,100);
                  //"U-".
         $autoId = date("s").date("i").date("d").$ranDom;

          $sql = "SELECT * from request_tb WHERE sender='$_SESSION[uid]' AND receiver= '$donorUname' AND status='Pending' " ;
          $res = $db->select($sql);
          if($res){
                  
                  echo "<script>
                  alert('Already Sent!!');
                  history.go(-1);
                  </script>"; 

                  }   
                        
    else{


       $query = "INSERT INTO request_tb (req_id,sender,receiver,status) VALUES ('$autoId','$_SESSION[uid]','$donorUname','Pending') ";
       $result = $db->insert($query);
       if($result)
       {
             echo "<script>
                  alert('Request Sent Successfully!!');
                  history.go(-1);
                  </script>"; 
       }

     }

     
    }
    include "../organizationHeader.php";

?>

  <form action="" method="get">

    <select id="bloodgroup" name="bloodgroup" >
      <option value="">..Select..</option>
      <option value="A+">A+</option>
      <option value="A-">A-</option>
      <option value="B+">B+</option>
      <option value="B-">B-</option>
      <option value="AB+">AB+</option>
      <option value="AB-">AB-</option>
      <option value="O+">O+</option>
      <option value="O-">O-</option>
    </select>

    <input type="number" id="limit"  name="limit" min="1" max="500"  >
    <input class="btn btn-danger" type="submit" name="search" onclick="return checkDetails();" value="Search">
  </form>

<script>
  function checkDetails(){
    if(document.getElementById('limit').value==""){
      alert('You must choose any number!!');
      return false;
    }
  }


</script>
  


<table class="table table-striped table-bordered table-hover table-dark" >
  <thead style="background-color: black; color:white; font-size: 18px; font-weight: bold;">
   <tr>
    <th>Serial</th>
    <th>User Name</th>
      <th>Location</th>
      <th>Age</th>
    <th>Gender</th>
  
    <th colspan="">Actions</th>
</tr>
  </thead>

 <?php 

  if(isset($read)){

 if($read){?>
<?php 
$i=1;

 while($row = $read->fetch_assoc()){
 
?>

<tr>
  <td><?php echo $i++ ?></td>
 <td><?php echo $row['username']; ?></td>
     <td><?php echo $row['location']; ?></td>
       <td><?php echo $row['age']; ?></td>
        <td><?php echo $row['gender']; ?></td>
 
<td>
  <a  class="btn btn-danger" href="InsertOrgReq.php?uname=<?php echo $row['username']; ?>"  > Send Request </a>
</td>
</tr>

<?php 

  }
}
else{
  echo "Donor is not available";

}

} else { ?>
<p>Data is not available !!</p>
<?php } ?>

</table>

 






