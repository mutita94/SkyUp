<?php
@session_start();
$mid =$_SESSION['mid']; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ชำระเงิน</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

  <?php
	include("head.php");
	?>
<!-- --->  
	<div class="hero-wrap hero-wrap-2" style="background-image: url('images/sky8.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
	  	<div class="row no-gutters slider-text align-items-end justify-content-center">
		  	<div class="col-md-9 ftco-animate mb-5 text-center">
			  <p class="breadcrumbs mb-0"><span class="mr-2"><a href="main.php">หน้าหลัก<i class="fa fa-chevron-right"></i></a></span><span>ชำระเงิน<i class="fa fa-chevron-right"></i></span></p>
            	<h2 class="mb-0 bread">ชำระเงิน</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- END nav -->
	<section class="ftco-section">
			<div class="container">
      <h4 for="textinput"><center>ข้อมูลการสั่งซื้อ</center></h4><hr>
          <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" >
                <thead>
                  <tr>
                      <td width="153"><center>เลขที่คำสั่งซื้อ</center></td>
                      <td width="193"><center>วันที่สั่งสินค้า</center></td>
                      <td width="193"><center>สถานะการชำระ</center></td>
                      <td width="153"><center>ชำระเงิน</center></td>
                  </tr>
                    <?php
                   
                      include("condb.php");
                      $sql = "SELECT * FROM add_order 
                      WHERE m_id = $mid";  
                      $result = mysqli_query($con, $sql)or die("Error in query : $sql" .mysqli_error($sql));
                      while ($row = mysqli_fetch_array($result)) {
                        $i++;
                        if( ($i % 3) == 1) {
                        }
                ?>
                <tbody>
                  <tr>
                    <td><center><?=$row['o_id'];?></center></td>
                    <td><center><?=$row['o_dttm'];?></center></td>    
                    <td><center><?=$row['o_status'];?></center></td> 
                    <td><center><a href="view-payment.php?o_id=<?=$row['o_id'];?>">ส่งหลักฐานการชำระเงิน</center></td>         
                </tr>
              </div>
              </div>
                 <?              
                    if ( ($i % 3 ) == 0){
                                  echo "</div>";	
                    }
                  } 
                ?>   
              </tbody>
          </table>
		  </div>
	</section>
    	<?php
    		include("foot.php");
  		?>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>