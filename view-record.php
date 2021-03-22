<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ประวัติการสั่งซื้อ</title>
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
            	<h2 class="mb-0 bread">ข้อมูลการสั่งซื้อ</h2>
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
                      <td width="193"><center>ลำดับ</center></td>
                      <td width="400"><center>สินค้า</center></td>
					            <td width="193"><center>ราคาต่อหน่วย</center></td>
                      <td width="193"><center>จำนวน</center></td>
					            <td width="193"><center>ราคารวมค่าส่ง</center></td>
                  </tr>
                    <?php
                      include("condb.php");
                      $o_id = $_GET['o_id'];

                      $sql = "SELECT * FROM add_order
                      INNER JOIN order_detail ON add_order.o_id = order_detail.o_id 
                      INNER JOIN product ON order_detail.a_id =  product.a_id 
                      WHERE add_order.o_id = '".$_GET['o_id']."' ";  
                      $result = mysqli_query($con, $sql);
                   
                    
                      while ($row = mysqli_fetch_array($result)) {
                        $i++;
                        if( ($i % 3) == 1) {
                        }
                    ?>
                <tbody>
                <tr> 
                    <td><center><?=$i;?></center></td>
                    <td><?=$row['a_brand']; ?> <?=$row['a_name']; ?><br>ขนาด <?=$row['a_size']; ?>
                        ประเภท <?=$row['a_category']; ?></td>    
                    <td><center><?=$row['a_sale']; ?> บาท</center></td>  
                    <td><center><?=$row['od_qty']; ?> <?=$row['a_unit']; ?></center></td>    
                    <td><center><?=$row['o_total']; ?> บาท</center></td>         
                </tr>
              </div>
            </div>
                <?php
                
                    if ( ($i % 3 ) == 0){
                      echo "</div>";	
                    }
                  } 
                ?>   
          </tbody>
        </table>		    
		  </div>
      <br>
              <center><a href="record.php" class="btn btn-primary">ย้อนกลับ</a><center>
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