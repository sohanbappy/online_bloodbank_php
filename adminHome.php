<?php 

session_start();

if($_SESSION["type"]!="Admin"){
  header('Location:http://localhost/EUDV/login.php');
}



include "function/config.php";
include "function/Database.php";
  
        if( ($_SESSION["uid"]==null) )
{

  header('Location:http://localhost/EUDV/index.php');
}



  $db = new Database();


$sql = "SELECT count(*) as total from donor_tb";
$data = $db->select($sql)->fetch_assoc();
//echo $data['total'];

$sql = "SELECT count(*) as total from blood_bank_tb";
$databank = $db->select($sql)->fetch_assoc();

  include('adminHeader.php');


?>
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h2> <b><?php echo $data['total']; ?></b></h2>


              <h1><b>Donors</b></h1>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
          <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>



        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <h2><b><?php echo $databank['total']; ?></b></h2>

              <h1><b>Organigations</b></h1>
            </div>
            <div class="icon">
              <i class="ion   
ion-ios-home"></i>
            </div>    
          <!--  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        <!-- ./col -->
      
      </div> 
                      <!--<?php  echo $_SESSION["uid"]; ?>
                      <?php  echo $_SESSION["type"]; ?>-->
        </section>
        <?php include('adminFooter.php');




         ?>