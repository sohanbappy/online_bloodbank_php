

<?php 

session_start();

if($_SESSION["type"]!="Organization"){
  header('Location:http://localhost/EUDV/login.php');
}



include "organizationHeader.php";
  include "function/config.php";
        include "function/Database.php";



        if($_SESSION['type']==null)
        {

          header("Location: http://localhost/EUDV/login.php ");
        }



 ?>




<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>



<style>

#panel{

  background: #868b93;
}

.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}
  
</style>
<script type="text/javascript">
    $(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
});
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<?php 


        $db = new Database();

         $query = "SELECT * FROM blood_bank_tb where  bank_id = '$_SESSION[uid]' ";
         $read = $db->select($query)->fetch_assoc();

?>

<div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
          <!--  <a href="http://localhost/EUDV/bloodbank/UpdateBloodBank.php?serial=<?php echo $_SESSION['usl']; ?>" >Edit Profile</a> -->
       <br>

      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info" id="panel">
            <div class="panel-heading">
                <h2 class="panel-title"><b><?php echo $read['bank_name'] ?></b></h2>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://localhost/EUDV/<?php echo $read['logo'] ?>" class="img-circle img-responsive"> </div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Bank ID:</td>
                        <td><?php echo $read['bank_id'] ?></td>
                      </tr>

                        <tr>
                        <td>Bank Name:</td>
                        <td><?php echo $read['bank_name'] ?></td>
                      </tr>

                      <tr>
                        <td>Division:</td>
                        <td><?php echo $read['division'] ?></td>
                      </tr>
                      
                     
                        <tr>
                        <td>Address:</td>
                        <td><?php echo $read['location'] ?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><?php echo $read['email'] ?></td>
                      </tr>
                        <td>Contact</td>
                        <td><?php echo $read['contact'] ?></td>  
                      </tr>
                      
                      
                    </tbody>
                  </table>
                  
                <!--   <a href="index.jsp#car" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="select a car">Hire Car</a>
                  <a href="index.jsp#bike" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="select a bike">Hire Bike</a>
                  <a href="viewAllTrainingGallery.jsp" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="enroll a course">Enroll Course</a>
                  <a href="viewUserallRecords.jsp" class="btn btn-info"   data-toggle="tooltip" data-placement="top" title="view sent requests" >Requests</a> -->
                  
                </div>
              </div>
            </div>
                
            
          </div>
        </div>
      </div>
    </div>


<?php include "organizationFooter.php"; ?>