<?php
session_start();
include("condb.php");	
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ใบเสร็จรับเงิน</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style type ="text/css">
    @media print{
      #hid{
        display:none;
      }
    }
  </style>

</head>
<body>

  <form class="form-horizontal" method="POST"  enctype="multipart/form-data">
    <div class="container-fluid">
    <div align="center">


<br>
<br>
<img src="../images/logo1.png" >
            <h1>บริษัท สกายอัพ เพ้นติ้ง จำกัด (สำนักงานใหญ่)</h1>
            <h6>319/6 หมู่ที่11 ถ.กลางเมือง ต.เมืองเก่า อ.เมือง จ.ขอนแก่น เทศบาลนครขอนแก่น 40000</h6>
            <h6>เลขประจำตัวผู้เสียภาษี 0405562001361 </h6>
            <h6>โทรศัพท์ 080-3294664</h6>
            <h4>ใบเสร็จรับเงิน/ใบกำกับภาษีอย่างย่อ </h6> 
            <?php
            $query = "SELECT MAX(bill_no) as lastbill FROM tbl_bill1"; 
            $resultlastbill = mysqli_query($con, $query); 
            $row = mysqli_fetch_array($resultlastbill);
            //3 ถ้า bill no เป็นค่าว่างให้เท่ากับ 1  ถ้าไม่ใช่ค่าว่าง ให้เอาเลขบิลล่าสุดไป +1
            $lastbill = $row['lastbill'];
            if($lastbill==''){
              $lastbill=1;
            }else{
              $lastbill = ($lastbill + 1);
            }
                        $sqlinsert = "INSERT INTO tbl_bill1 (bill_no) VALUES ($lastbill) ";
                        $resultinsert = mysqli_query($con, $sqlinsert);
        
                        $querydata = "SELECT * FROM tbl_bill1 ORDER BY bill_no DESC";
                        $rs = mysqli_query($con, $querydata); 
                        $row = mysqli_fetch_array($rs);
                        echo "<h6>เลขที่ CAV".$row['bill_no']." วันที่ ".$row['bill_date']." (VAT Inculded)</h6>";

            ?>
<br>
</center>
    <?php
    $sql = "SELECT * FROM add_order
    INNER JOIN payment ON add_order.o_id = payment.o_id
    WHERE add_order.o_id ='".$_GET['o_id']."'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_BOTH);
    ?>
			<!-- Text input-->
			<div class="form-group" >
			<label class="col-md-4 control-label"  align="left"> 
      <?php
        echo "ชื่อ : ".$row ['o_name']."<br>";
        echo "ที่อยู่ : ".$row ['o_addr']."<br>";
        echo "โทรศัพท์ : ".$row ['o_phone']."<br>";
        //echo "โอนชำระ : ".$row['o_status']."";
      ?>
      </label>  
      <br>
      <br>
    <!-- table-->
    <?php
    $sql = "SELECT * FROM order_detail
    INNER JOIN add_order ON order_detail.o_id = add_order.o_id
    INNER JOIN product ON  order_detail.a_id = product.a_id
    WHERE order_detail.o_id ='".$_GET['o_id']."'";
    $result = mysqli_query($con,$sql);
    ?>
        <div class="form-group">
		<div class="col-sm-5"> </div>
  		<div class="col-sm-7">
		  
      <table class="table table-bordered"  width="100%" cellspacing="1">
                  <thead>
                  <tr>
                    <th><center>รายการสินค้า</center></th>
                    <th><center>จำนวน</center></th>
                    <th><center>ราคาต่อรายการ</center></th>
                  </tr>
                 </thead>
				 <?php
				 	  while($row = mysqli_fetch_array($result,MYSQLI_BOTH))  { ?>
              <tr>
              <td><center><?php echo $row ['a_name'];?><?php echo $row ['a_size'];?></center>&nbsp;
              <td><center><?php echo $row ['od_qty'];?><?php echo $row ['a_unit'];?></center></td>
              <td><center><?php echo $row ['od_subtotal'];?></center></td>
              </tr>

              <tr>
                    <td colspan='3' align='right'><b>ค่าส่ง</b> <b>180 บาท</b><br>
                    <b>รวมสุทธิ</b> <?php echo $row['o_total'];?> บาท</td>
              </tr>
				<?  
          } 
        ?>
              
			</table>
		</div>
	<div>
  <h6>เปิดให้บริการวันจันทร์ - เสาร์ เวลา 08.00 - 17.00 น.</h6>
  <h6>"ขอบคุณที่ใช้บริการ"</h6>

      <label class="col-md-4 control-label"  align="right"> 
      <?php
     
      ?>  
      </label>

<br>
        <br>
             <button class="btn btn-primary" onClick="window.print()">พิมพ์</button>
             <a href="statustran.php" class="btn btn-danger">ย้อนกลับ</a>
             </div>
      </center>
          </div>
        </div>
      </div>
    </div>
	</form>
  
  </body>
</html>