<?php
@session_start();
include("condb.php");
$sql =  "SELECT * FROM member WHERE m_id = '".$_SESSION['mid']."'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_BOTH);

	$mid =$row['mid'];
	$mname =$row['m_name'];
?>
<!DOCTYPE html>
	<div class="wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-6 d-flex align-items-center">
						<p class="mb-0 phone pl-md-2">
						<a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> 080-329-4664</a> 
							<a href="https://www.facebook.com/SKYUPPAINTING"><span class="fa fa-facebook mr-1"></span> Sky Up Painting</a>
						</p>
					</div>
					<div class="col-md-5 d-flex justify-content-md-end">
						<div class="social-media mr-4">
		        </div>
		        <div class="reg">
		        	<p class="mb-1" >
					<a href="#"><?php echo"ยินดีต้อนรับคุณ : ".$mname ; ?>&nbsp;&nbsp;</a> 
					<a href="index.php">ออกจากระบบ</a> 
		        </div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Skyup <span>Painting</span></a>
	      <div class="order-lg-last btn-group">
          <a href="#" class="btn-cart dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          	<span class="flaticon-shopping-bag"></span>
          	<div class="d-flex justify-content-center align-items-center"><small>0</small></div>
          </a>
          	<div class="dropdown-menu dropdown-menu-right">	
				    <div class="dropdown-item d-flex align-items-start" href="#">
				    	<div class="img" style="background-image: url(images/prod-3.jpg);"></div>
				    	<div class="text pl-3">
				    		<h4>Citadelle</h4>
				    		<p class="mb-0"><a href="#" class="price">$22.50</a><span class="quantity ml-3">Quantity: 01</span></p>
				    	</div>
				    </div>
				    <a class="dropdown-item text-center btn-link d-block w-100" href="cart.html">
				    	View All
				    	<span class="ion-ios-arrow-round-forward"></span>
				    </a>
				  </div>
        	</div>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
			<li class="nav-item active"><a href="main.php" class="nav-link">หน้าหลัก</a></li>
			  <li class="nav-item"><a href="detail-in.php" class="nav-link">วิธีสั่งซื้อและการจัดส่ง</a></li>
			  <li class="nav-item"><a href="payment.php" class="nav-link">ชำระ</a></li>
	          <!--<li class="nav-item"><a href="payment.php" class="nav-link">ชำระเงิน</a></li>-->
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">สินค้าตามประเภท</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
			  	<a class="dropdown-item" href="bshades-in.php">สีทาบ้าน Beger cool all plus</a>
			  	<a class="dropdown-item" href="tshades-in.php">สีทาบ้าน TOA Super matex</a>
                <a class="dropdown-item" href="product2-in.php">รองพื้นปูน</a>
				<a class="dropdown-item" href="product3-in.php">รองพื้นกันสนิม</a>
              </div>
            </li>
			<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="payment.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ตรวจสอบสถานะ</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="record.php">ประวัติการสั่งซื้อ</a>
                <a class="dropdown-item" href="status.php">สถานะการสั่งซื้อ</a>
              </div>
            </li>
	          <li class="nav-item"><a href="about-in.php" class="nav-link">เกี่ยวกับเรา</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    