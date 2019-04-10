 
<?php include 'incc/head.php'?>
<?php
include 'incc/design.php';
include "function/config.php";
include "function/Database.php";


// $db = new Database();


 //$query = "select user_id,count(user_id) as btimes from donation_tb GROUP BY user_id ORDER BY btimes DESC LIMIT 5";
// $readMax=$db->select($query);
 //$count = $readMax->fetch_assoc();
 
?>


<script type="text/javascript">
 <!---No. of variables depends on no. of Images->
 var img1=new Image()
 img1.src="image/blood1.jpg"
 
 var img2=new Image()
 img2.src="image/Blood5.jpg"
 
 
 </script>


<body>

     
  <div class="container" style="padding-top: 1.5%;">
    
<img src="" name="slider" height="600px" width="100%"/>
  
  
  <script type="text/javascript">
  
  var step=1
  function slideStart(){
  document.images.slider.src=eval("img"+step+".src")

  if(step<2)
      step++ 
  else
      step=1
    setTimeout("slideStart()",3000)
  }
  
  slideStart()
  
  </script>
  
  <hr/>
  </div>

</body>
<?php include('incc/footer.php'); ?>









			