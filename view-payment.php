<?php
session_start();
include("condb.php");
$o_id = $_GET['o_id']; 
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
				<form class="form-horizontal" method="post" action=" " enctype="multipart/form-data">
					<fieldset>	
					<?php
							$sql	= "SELECT * FROM add_order 
							INNER JOIN member ON add_order.m_id = member.m_id
							WHERE add_order.o_id  = '".$_GET['o_id']."' AND add_order.m_id  = '".$_SESSION['mid']."' ";
							$query	= mysqli_query($con, $sql);
							$row	= mysqli_fetch_array($query);
								
					?>
					<h4 for="textinput"><center>ธนาคารกรุงไทย หมายเลขบัญชี 414-0-45747-3 มุทิตา พรหมแสนจันทร์</center></h4><hr>
						<!-- total -->
		   					<div class="form-group">
								<div class="col-sm-4" > ยอดชำระทั้งหมด </div>
									<div class="col-sm-3" >
										<input id="tran1" type="text" name="tran1" readonly value = "<?php echo $row['o_total']; ?>" class="form-control" />
								</div>	
							</div>
						<!-- date-->
						<div class="form-group">
							<div class="col-lg-4"> วันที่โอนชำระ &nbsp;</div>
								<div class="col-lg-4" >
									<input type="ddate" name="ddate" required 
                   			 		placeholder="วัน/เดือน/ปี" value=""
                    		 		min ="2020-01-01" max="2021-12-31">
								</div>
							</div>
					<!-- Text input-->
						<div class="form-group">
  							<label class="col-md-4 control-label" for="textinput">หมายเลขบัญชีธนาคาร(4ตัวท้าย) </label>  
							  	<div class="col-sm-3" >
  									<input id="pbank" name="pbank" type="text"  class="form-control" required>
   								</div>
						</div>
					<!-- File img --> 
						<div class="form-group">
							<label class="col-md-4 control-label" for="filebutton">หลักฐานการชำระเงิน</label>
								<div class="col-md-4">
								<input id="images" name="images" class="input-file" type="file" required>
							</div>
						</div>
							<!--<input type="hidden" id="statuss" name="statuss" rows="3"  value = "ชำระแล้ว" class="form-control input-md">-->
							<input type="hidden" id="o_id" name="o_id" rows="3"  value = "<?=$row['o_id'];?>" >
							<input type="hidden" id="m_id" name="m_id" rows="3"  value = "<?=$_SESSION['mid'];?>" >
						<!-- submit -->
							 <center><input type="submit" name="Submit" class="btn btn-success " value="ชำระเงิน" /></center>
					</fieldset>
				</form>

				<?php

					$o_id = $_POST["o_id"];
					$m_id = $_POST["m_id"];
					$tran1 = $_POST["tran1"];
					$pbank = $_POST["pbank"];
					//$images = $_POST["images"];
					$ddate = Date("Y-m-d G:i:s");

					if(isset($_POST['Submit'])){
						
						$sql= "INSERT INTO payment VALUES(null, '$tran1', '$ddate', '$pbank','".$_FILES['images']['name']."', 'เตรียมจัดส่งสินค้า', $m_id, $o_id)";
						mysqli_query($con,$sql) or die('ชำระเงินไม่สำเร็จ');
						copy($_FILES['images']['tmp_name'],"images/".$_FILES['images']['name']);
						echo"<script>";
						echo"alert('ชำระเงินสำเร็จ');";
						echo"window.location ='main.php'";
						echo"</script>";

						$sql1 = "UPDATE add_order SET o_status = 'ชำระแล้ว' WHERE o_id = '".$_GET['o_id']."' ";
						mysqli_query($con,$sql1)  or die("Error in query : $sql1" .mysqli_error($sql1));
						
					}
					
				
				?>
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