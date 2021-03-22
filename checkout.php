<?php
session_start();

include("condb.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>สั่งสินค้า</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php
	include("head.php");
	?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/sky7.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="main.php">หน้าหลัก <i class="fa fa-chevron-right"></i></a></span> <span>สั่งสินค้า <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">สั่งสินค้า</h2>
          </div>
        </div>
      </div>
    </section>

	<section class="ftco-section">
    	<div class="container">
			<form  id="frmcart" name="frmcart" method="post" action="saveorder.php">
				<table width="900" border="0" align="center" >
					<tr>
						<td width="1558" colspan="4" >
							<strong>รายละเอียดการสั่งซื้อ</strong><hr></td>
					</tr>
						<?php
								$total=0;
								foreach($_SESSION['cart'] as $p_id=>$qty)
								{
									$sql	= "SELECT * FROM product WHERE a_id=$p_id";
									$query	= mysqli_query($con, $sql);
									$row	= mysqli_fetch_array($query);
									$sum	= $row['a_sale']*$qty;
									$total	+= $sum;
									$tran   = $total + 180;
										echo "<tr>";
										echo "<td>ยี่ห้อ " . $row["a_brand"] . " " . $row["a_name"] . " ประเภท " . $row["a_category"] . " </td>";
										echo "<td align='center'>$qty  " . $row["a_unit"] . "</td>";
										echo "<td align='right'> ".number_format($sum,2)." บาท</td>";
										echo "</tr>";
								}
								echo "<tr>";
									echo "<td  align='right' colspan='2' class ='text-success'><b>รวม</b></td>";
									echo "<td align='right' class ='text-success'>"."<b>".number_format($total,2)." บาท</b>"."<br></td>";	
								echo "</tr>";
								echo "<tr>";
									echo "<td  align='right' colspan='2' class ='text-success'><b>ค่าส่ง</b></td>";
									echo "<td align='right' class ='text-success'>180 บาท<br></td>";	
								echo "</tr>";
								echo "<tr>";
									echo "<td  align='right' colspan='2' class ='text-danger'><b>รวมทั้งสิ้น</b></td>";
									echo "<td align='right' class ='text-danger'>"."<b>".number_format($tran,2)." บาท</b>"."<br></td>";	
								echo "</tr>";	
								?>
							</table>	
				<h4 for="textinput">ข้อมูลการติดต่อ</h4><hr>
				<div class="form-group">
					<label class="col-md-4 control-label" for="textinput">ชื่อ - นามสกุล</label>  
						<div class="col-md-4">
							<input name="name" type="text" id="name" class="form-control" required/>	
						</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="textinput">ที่อยู่</label>  
						<div class="col-md-4">
							<textarea name="address" cols="35" rows="5" id="address" class="form-control" required></textarea>
						</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="textinput">เบอร์ติดต่อ</label>  
						<div class="col-md-4">
							<input name="phone" type="text" id="phone" class="form-control" required />
						</div>
				</div>
					<br>
						<input type="hidden" name="total"  value="<?php echo $total;?>" />	
						<input type="hidden" name="tran"  value="<?php echo $tran;?>" />
						<input type="hidden" name="status"  value="รอการชำระ" />	
						<center><input type="submit" name="Submit2" class="btn btn-success " value="สั่งสินค้า" /></center>
			</form>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>