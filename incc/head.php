

<!DOCTYPE html>
<html>
<head>
<title>
Joyanta
</title>



<style>






.all{
margin-left: 8%;
margin-right: 8%;}

.block { height: 170px;width: auto; background: #B0C4DE; overflow: hidden; }
.block img {width:150px; height:120px; float:left; padding-top: 20px; padding-left: 20px; }

.one img{float:right; padding-right: 20px; width:60%;height:130px;}

.menu{background:#a81515;min-height: 49px;}
.menu ul{margin:0;padding:0;list-style:none;}
.menu ul li{ float:left; border-left:1px solid #fff;border-right:1px solid #fff;position:relative;}
.menu ul li:first-child{border-left:0px solid;}
.menu ul li:last-child{border-right:0px solid;}
.menu ul li a{color:#fff; display:block; padding:15px; text-decoration: none;}
.menu ul li a:hover{background:#738196;} 

/*drop down*/

.menu ul li ul{position: absolute;left:-999999px;}
.menu ul li:hover ul {left:0px;}
.menu ul li ul{background:#fff;}
.menu ul li ul li{float:none;width:100px; border-bottom:1px solid #847778;}
.menu ul li ul li:last-child{border-bottom:0px solid;}
.menu ul li ul li a{background:#324f7a;color:#fff;padding: 15px 15px }
.menu ul li ul li a:hover{}



</style>




</head>


<body>

<div class="all">       
<div class="block">

<img src="http://localhost/EUDV/incc/logo.png" alt="block_pic">

<div class="one">

<img src="http://localhost/EUDV/incc/give.jpg" alt="one_pic">

</div>
</div>

<div class="menu">
<ul>
<li><a href="http://localhost/EUDV/index.php">Home</a></li>
	<li><a href="http://localhost/EUDV/about.php">About</a></li>
		<li><a href="http://localhost/EUDV/contact.php">Contract</a></li>

			<li><a href="">Registration</a>
				<ul>
					 
				<li><a href="http://localhost/EUDV/InsertDonor.php">Donor Registration</a></li> 
					<li><a href="http://localhost/EUDV/InsertBloodBank.php">Organization Registration</a></li> 
				
				
				</ul>
				</li>
				<li><a href="http://localhost/EUDV/InsertNotice.php">Request For Blood</a></li>
				</li>
				<li><a href="http://localhost/EUDV/notice/ViewNotice1.php">All Blood Request</a></li>
				<li><a href="http://localhost/EUDV/SearchBlood.php">Search Blood</a></li>
							<li><a href="http://localhost/EUDV/topdonor.php">Top donor</a></li>	
				<li><a href="http://localhost/EUDV/login.php">Login</a></li>
				

           </ul>

       </div>


       
</div>


</body>
</html>
