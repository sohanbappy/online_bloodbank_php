
<?php

include "../function/config.php";
include "../function/Database.php";
?>

<?php 
 $db = new Database();
 $query = "SELECT * FROM notice_tb WHERE status = 'Accepted' ";
 $read = $db->select($query);
 $row = $read->fetch_assoc()
?>








  <!--<tr>
  	<th>Serial:</th>
      <td><?php echo $i++ ?></td>
    <td>Blood Group:</td>

    <td>Blood Unit:</td>
      <td>Name:</td>
    <td>Division:</td>
    <td>Contact:</td>
      <td>Patient Location:</td>
      <td>Status:</td>
    <td>Response:</td>
 
  </th>
-->

 <?php if($read){?>
<?php 
$i=1;

?>

  <tr>
    <th>Serial:</th>
  <td><?php echo $i++ ?></td>
</tr>
<br>
<tr>
    <td>Blood Group:</td>
 <td><?php echo $row['bl_group']; ?></td>
</tr>
<br>
 
 <tr>
      <td>Notice ID:</td>
 <td><?php echo $row['notice_id']; ?></td>
</tr>
<br>
<tr>
       <td>Blood Unit:</td>
 <td><?php echo $row['bl_unit']; ?></td>
</tr>
<br>
<tr>
       <td>Name:</td>
  <td><?php echo $row['rqst_name']; ?></td>
</tr>
<br>
<tr>
       <td>Division:</td>
   <td><?php echo $row['division']; ?></td>
 </tr>
<br>
 <tr>
       <td>Contact:</td>
    <td><?php echo $row['contact']; ?></td>
  </tr>
  <br>
  <tr>
         <td>Location:</td>
     <td><?php echo $row['p_location']; ?></td>
   </tr>
   <br>
   <tr>
         <td>status:</td>
     <td><?php echo $row['status']; ?></td>
   </tr>
   <br>
   <tr>
         <td>Response:</td>
      <td><?php echo $row['response']; ?></td>
</tr>
 
</tr>



<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>
















<!--</table>
<div class="joy">
 <a href="InsertNotice.php"><b>create</b></a>
-->

</div>

</body>
</html>