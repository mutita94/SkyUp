<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Beger Cool All Plus</title>
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
	include("head1.php");
	?>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/b_ปก.png');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.php">หน้าหลัก<i class="fa fa-chevron-right"></i></a></span><span>สินค้าตามประเภท<i class="fa fa-chevron-right"></i></span>
			<span>Beger Cool All Plus</span></p>
          </div>
        </div>
      </div>
    </section>
    <!-- END nav -->
		<section class="ftco-section">
			<div class="container" >
				<div class="row justify-content-center pb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h3> Beger Cool All Plus <br></h3>
                <span>คลิกที่รูปเฉดสีเพื่อซื้อสินค้า</span><br>
                <span>*ตัวอย่างสีนี้ใกล้เคียงกับสีจริงเท่านั้น เนื่องจากการแสดงค่าสีบนหน้าจอไม่เหมือนกัน*</span>
                
            <hr>  
          </div>
        </div>
            <div align="center">
            <?php
                include("condb.php");
                    $sql = "SELECT * FROM  product WHERE (a_brand LIKE '%Cool%')"; 
                    echo"<table border=\"0\"  cellspacing=\"1\" cellpadding=\"1\"><tr>";	
                    $intRows = 0; 
                    $result = mysqli_query($con, $sql) or die("Error in query : $sql" .mysqli_error($sql));

                    while($row = mysqli_fetch_array($result))
                    {
                      $intRows++;
                      echo "<td>";

                      echo "<table width='91' border='0' cellspacing='0' cellpadding='0'>";
                        echo "<tr>";
                        echo "<td><a href='./singin/singin.php'><img src='images/" . $row["a_images"] . "' width='190' height='100' border='1'></a></td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td><div align='center'> " . $row["a_name"] . " </div><div align='center'>ขนาด " . $row["a_size"] . " </div>
                                  <div align='center'>ประเภท " . $row["a_category"] . " </div>
                                  <div align='center'><p class='text-success'>ราคา " . $row["a_sale"] . " บาท</p></div></td>";
                            echo "</tr>";
                        echo "</table>";
                        echo"</td>";

                        if(($intRows)%6==0){
                        echo"</tr>";
                        }else{
                        echo "<td>";
                         } 
                        }
                        echo"</tr></table>";	
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>