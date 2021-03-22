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

    <title>ใบรายงานการสั่งซื้อ</title>

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
              <form class="form-horizontal" method="get"  enctype="multipart/form-data">
                <div class="container-fluid">
                <div align="center">
            <br>
            <br>
            <img src="../images/logo1.png" >
                      <h2>รายงานการสั่งซื้อสินค้า</h2>
            <br>
           
                <?php
                $sql = "SELECT * FROM add_order 
                INNER JOIN payment ON add_order.o_id = payment.o_id
                WHERE payment.pay_status = 'ส่งสินค้าสำเร็จ' ";
                $query	= mysqli_query ($con,$sql)  or die ("Error in query : $sql" .mysqli_error($sql));                                           
                ?>
              <div class="form-group">
                <div class="col-sm-5"> </div>
                  <div class="col-sm-7">
                  <table class="table table-bordered"  width="100%" cellspacing="1">
                  <thead>
                  <tr>
                  <th><center>ลำดับ</center></th>
                    <th><center>เลขที่คำสั่งซื้อ</center></th>
                    <th><center>วันที่สั่งซื้อ</center></th>
                    <th><center>ราคารวมต่อคำสั่งซื้อ</center></th>
                  </tr>
                 </thead>
				    <?php
              $num=1;
				 	    while($row = mysqli_fetch_array($query,MYSQLI_BOTH))  { ?>
              <tr>
              <td><center><?php echo $num;?><center></td>
              <td><center><?php echo $row ['o_id'];?><?php echo $row ['a_size'];?></center>&nbsp;
              <td><center><?php echo $row ['o_dttm'];?><?php echo $row ['a_unit'];?></center></td>
              <td><center><?php echo $row ['o_total'];?></center></td>
              </tr>
				    <?  
                $totalmoney = $totalmoney + $row["o_total"];
                $num++;
              } 
            ?>
             <tr>
                    <td colspan='3' align='right' class='text'><b>ยอดรวมสุทธิ</b></td>
                    <td class='text' ><center><?=$totalmoney?> บาท</center></td>
                </tr>  
			</table>
		</div>
	<div>

	<br>

      <label class="col-md-4 control-label"  align="right"> 
      <?php
     
      ?>  
      </label>

<br>
<br>
      			      <!-- Button -->
			<div class="" id="hid" >
			  <label class="" for="Submit"   align="center" ></label>
             <button class="btn btn-primary" onClick="window.print()">พิมพ์</button>
             <a href="report_od.php" class="btn btn-danger">ย้อนกลับ</a>
             </div>
			</div>
      </center>

          </div>
        </div>
      </div>
    </div>
	</form>


  </body>
</html>