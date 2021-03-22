<?php
session_start();
include("condb.php");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>รายละเอียดสินค้า</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
	include("head1.php");
	?>
    
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/sky11.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
            <h2 class="mb-0 bread">รายละเอียดสินค้า</h2>
          </div>
        </div>
      </div>
    </section>

		
    <section class="ftco-section">
    	<div class="container">
    		<div class="row">

			<?php
			
				$sql = "select * from product where a_id ='".$_GET['id']."' ";
				$rs = mysqli_query($con, $sql) ;
				$data = mysqli_fetch_array($rs, MYSQLI_BOTH);	
				$id = $_GET['id'] ;

			if(isset($_GET['id'])) {
					$_SESSION['aid'][$id] = $data['a_id'];
					$_SESSION['aname'][$id] = $data['a_name'];
					$_SESSION['asale'][$id] = $data['a_sale'];
					$_SESSION['asize'][$id] = $data['a_size'];
					$_SESSION['acategory'][$id] = $data['a_category'];
					$_SESSION['aproperty'][$id] = $data['a_property'];
					$_SESSION['astock'][$id] = $data['a_stock'];
					$_SESSION['aimages'][$id] = $data['a_images'];
					@$_SESSION['aitem'][$id]++;
			}	

			?>
		
		<div class="col-lg-6 mb-5 ftco-animate">
			<img src="images/<?=$_SESSION['aimages'][$id];?>" class="img-fluid" alt="Colorlib Template"></a>
		</div>
		<div class="col-lg-6 product-details pl-md-5 ftco-animate">
			<h4><?=$_SESSION['aname'][$id];?></h4>
			<h3>ราคา <?=number_format($_SESSION['asale'][$id],0);?> บาท ขนาด <?=$_SESSION['asize'][$id];?></h3>
			<span><?=$_SESSION['aproperty'][$id];?><span>
			
				<div class="row mt-4">
					<div class="w-100"></div>
	          				<div class="col-md-12">
	          					<p style="color: #000;">จำนวนคงเหลือ : <?=$_SESSION['astock'][$id];?></p>
								<p><a href="./singin/singin.php"  onclick="alert('กรุณาเข้าสู่ระบบหรือสมัครสมาชิกเพื่อซื้อสินค้า');" class="btn btn-primary py-3 px-5">สั่งซื้อ</a></p>
	          			</div>
    				</div>
    			</div>		
              </div>
            </div>
          </div>
        </div>
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

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>    
  </body>
</html>