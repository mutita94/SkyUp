<?php
session_start();
include("condb.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sky Up Painting</title>
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
	include("head1.php");
	?>
	  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('images/1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-8 ftco-animate d-flex align-items-end">
          	<div class="text w-100 text-center">
	            <h1 class="mb-4">Good <span>Color</span> At <span>SkyUpPainting</span></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
		<section class="ftco-section">
			<div class="container" >
				<div class="row justify-content-center pb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Product Recommend</span>
            <h2>สินค้าแนะนำ
			</h2>
          </div>
        </div>
			<div class="row">
					<?php
							$sql1 ="SELECT * FROM product WHERE ( a_brand LIKE '%ราคาพิเศษ') ";
							$result1 = mysqli_query($con,$sql1);
							while($data1 = mysqli_fetch_array($result1)){
							?>
					<div class="col-md-3 d-flex">
						<div class="product ftco-animate">
							<div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/<?=$data1['a_images'];?>);">
								<div class="desc">
									<p class="meta-prod d-flex">
										<a href="product-single.php?id=<?=$data1['a_id'];?>" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
									</p>
								</div>
							</div>
							<div class="text text-center">
								<span class="seller">Host Price</span>
								<span><?php echo $data1['a_name'];?></span>
								<span>ขนาด <?php echo $data1['a_size'];?></span>
								<h5 class="text-danger">ราคา <?=$data1['a_sale'];?>บาท</h5>
							</div>
						</div>
					</div>
					<?php
						}
					?>
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