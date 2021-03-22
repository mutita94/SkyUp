<?php
	@session_start();
    include("condb.php");
	$mid =$_SESSION['mid']; 
?>
<meta charset=utf-8>
<?php
	$name = $_POST["name"];
	$address = $_POST["address"];
	$phone = $_POST["phone"];
	$total = $_POST["total"]; 
	$tran = $_POST["tran"];//ราคารวมทั้งorder
	$dttm = Date("Y-m-d G:i:s");
	$status = $total = $_POST["status"]; 
	//บันทึกการสั่งซื้อลงใน order_detail

	mysqli_query($con, "BEGIN"); 
	$sql1= "INSERT INTO add_order VALUES(null, '$dttm', '$name', '$address', '$phone', '$tran','$status',$mid)";
	$query1	= mysqli_query($con, $sql1) or die("Error in query : $sql1" .mysqli_error($sql1));

	$sql2 = "SELECT MAX(o_id) AS o_id FROM add_order WHERE o_name='$name' AND o_dttm='$dttm' ";
	$query2	= mysqli_query($con, $sql2) or die("Error in query : $sql2" .mysqli_error($sql2));
	$row = mysqli_fetch_array($query2);
	$o_id = $row["o_id"];//idล่าสุดที่อยุ่ในตาราง add_order

	//echo $sql1;
	//echo "<br>";


	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql3	= "SELECT * FROM product WHERE a_id =$p_id";
		$query3	= mysqli_query($con, $sql3) or die("Error in query : $sql3" .mysqli_error($sql3));
		$row3	= mysqli_fetch_array($query3);
		$pricetotal	= $row3['a_sale']*$qty;

		//echo $sql3;
		//echo "<br>";
		
		$sql4	= "INSERT INTO order_detail VALUES(null, $o_id, $p_id, $qty, $pricetotal)";
		$query4	= mysqli_query($con, $sql4);
		
		//echo $sql4;
		//echo "<br>";

		$sql5 = "UPDATE product SET a_stock = a_stock - $qty WHERE a_id = $p_id ";
		$query5	= mysqli_query ($con,$sql5)  or die ("Error in query : $sql5" .mysqli_error($sql5));

		//echo $sql5;
		//echo "<br>";

		$sql6 = "UPDATE product SET a_totalcost = a_stock * a_cost  WHERE a_id = $p_id ";
		$query6	= mysqli_query ($con,$sql6)  or die ("Error in query : $sql6" .mysqli_error($sql6));

		$sql7 = "UPDATE product SET a_totalsale = a_stock * a_sale  WHERE a_id = $p_id ";
		$query7	= mysqli_query ($con,$sql7)  or die ("Error in query : $sql7" .mysqli_error($sql7));

		//echo $sql6;
		//echo "<br>";

	}
	//exit;

	if($query1 && $query4){
		mysqli_query($con, "COMMIT");
		$msg = "สั่งซื้อสินค้าสำเร็จ กรุณาชำระเงิน";
		foreach($_SESSION['cart'] as $p_id)
		{	
			//unset($_SESSION['cart'][$p_id]);
			unset($_SESSION['cart']);
		}
	}
	else{
		mysqli_query($con, "ROLLBACK");  
		$msg = "สั่งซื้อสินค้าไม่สำเร็จ";	
	}

?>
<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='payment.php';
</script>

