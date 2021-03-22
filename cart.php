<?php
	session_start();
	
	include("condb.php");
	$p_id = $_GET['p_id']; 
	$act = mysqli_real_escape_string($con,$_GET['act']);

	if($act=='add' && !empty($p_id))
	{
		if(isset($_SESSION['cart'][$p_id])) //เพิ่มสินค้า
		{
			$_SESSION['cart'][$p_id]++;
		}
		else
		{
			$_SESSION['cart'][$p_id]=1;
		}
	}

	if($act=='remove' && !empty($p_id))  //ลบสินค้า
	{
		unset($_SESSION['cart'][$p_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['cart'][$p_id]=$amount;
		}
	}

	if($act=='cancel')  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart']);
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ตะกร้าสินค้า</title>
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

	<section class="hero-wrap hero-wrap-2" style="background-image: url('images/sky12.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="main.php">หน้าหลัก <i class="fa fa-chevron-right"></i></a></span> <span>ตะกร้าสินค้า <i class="fa fa-chevron-right"></i></span></p>
            <h2 class="mb-0 bread">ตะกร้าสินค้า</h2>
          </div>
        </div>
      </div>
    </section>


<form id="frmcart" name="frmcart" method="post" action="?act=update">
	<table width="100%" class="table" >
    <tr>
		<td align="center">รูป</td>
		<td align="center">สินค้า</td>
		<td align="center">ราคา/หน่วย</td>
		<td align="center">จำนวน</td>
		<td align="center">รวม</td>
		<td align="center">ลบ</td>
    </tr>
<?php
$total=0;
if(!empty($_SESSION['cart']))
{
	
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql = "SELECT * FROM product WHERE a_id='".$p_id."'";
		$query = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['a_sale'] * $qty;
		$total += $sum;
		echo "<tr>";
		echo "<td width='200'  align='center' ><img src='images/" . $row["a_images"] ." ' width='80'></td>";
		echo "<td width='400'>ยี่ห้อ " . $row["a_brand"] . "  " . $row["a_name"] . "<br>ขนาด " . $row["a_size"] . " </td>";
		echo "<td  width='200' align='center'>" .number_format($row["a_sale"],2) . " บาท</td>";
		echo "<td width='100' align='center'>";  
		echo "<input type='number' min ='0' max='" . $row["a_stock"] . "' name='amount[$p_id]' value='$qty' " . $row["a_unit"] . " size='2'/></td>";
		echo "<td width='200' align='center'>".number_format($sum,2)." บาท</td>";
		//remove product
		echo "<td width='150' align='center'><a href='cart.php?p_id=$p_id&act=remove'>ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='4' bgcolor='#CEE7FF' align='right' class='text-success'><b>ราคารวม</b></td>";
  	echo "<td align='center' bgcolor='#CEE7FF'class='text-success'>"."<b>".number_format($total,2)." บาท </b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?>
<tr>
	<td><center><a href="main.php" class="btn btn-success">กลับหน้ารายการสินค้า</a><center></td>
<td colspan="4" align="right">
	<input type="button" name="btncancel" class="btn btn-danger" value="ยกเลิกการสั่งซื้อ" onclick="window.location='cart.php?act=cancel';" />
    <input type="submit" name="button" class="btn btn-warning"  id="button" value="คำนวณราคาใหม่" />
    <input type="button" name="Submit2" class="btn btn-success" value="สั่งซื้อ" onclick="window.location='checkout.php';" />
</td>
</tr>
</table>
</form>

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