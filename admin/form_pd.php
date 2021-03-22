<?php
session_start();
include("condb.php");
$id = $_SESSION['a_id'] ;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ใบรายงานสินค้า</title>

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
                  <h2>รายงานสินค้าคงเหลือ</h2>
                  <h4>ร้าน Sky Up Painting</h4>
                  <h6>319/6 หมู่ที่11 ถ.กลางเมือง ต.เมืองเก่า อ.เมือง จ.ขอนแก่น เทศบาลนครขอนแก่น 40000</h6>
        <br>

        </center>
       
			<!-- Text input-->
			<div class="form-group" >
			<label class="col-md-4 control-label"  align="right"> 
      </label>  
      <br>
      <br>
      <!--text-->
      <?php
           $sql = "SELECT * FROM product WHERE a_brand = '".$_GET['a_id']."' ";
           $query	= mysqli_query ($con,$sql)  or die ("Error in query : $sql" .mysqli_error($sql));
           $num =1; 
        ?>
        <!-- table-->
        <div class="form-group">
        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th><center>ลำดับ</center></th>
                    <th><center>รหัสสินค้า</center></th>
                    <th><center>ชื่อสินค้า</center></th>
                    <th><center>ขนาด</center></th>
                    <th><center>จำนวนสินค้าคงเหลือ</center></th>
                    <th><center>ราคาขาย</center></th>
                  </tr>
                 </thead>
                  <?php
                  while($row = mysqli_fetch_array($query))  { ?>
                      <tr>
                        <td><center><?php echo $num;?><center></td>
                        <td><center><?php echo $row ['a_id'];?></center></td>
		                    <td><center><?php echo $row ['a_name'];?></center></td>
                        <td><center><?php echo $row ['a_size'];?></center></td>
	                      <td><center><?php echo $row ['a_stock'];?></center></td>
                        <td><center><?php echo $row ['a_sale'];?></center></td>   
                      </tr>
                            <?php $num++;
                                 }
                            ?>
			            </table>
	            <div>
                <br>
                <br>
      			      <!-- Button -->
			              <div class="" id="hid" >
			                <label class="" for="Submit"   align="center" ></label>
                        <button class="btn btn-primary" onClick="window.print()">พิมพ์</button>
                          <a href="report_pd.php" class="btn btn-danger">ย้อนกลับ</a>
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