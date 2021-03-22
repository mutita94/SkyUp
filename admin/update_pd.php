﻿<?php
session_start();
include("condb.php");
$sql = "SELECT * FROM product WHERE a_id ='".$_GET['stdid']."'";
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_array($result,MYSQLI_BOTH);

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

    <title>Admin</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <?php
	include("adhead.php");
	?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">แก้ไขข้อมูลสินค้า</h1>

            </div>
            <!-- End of Main Content -->

<form class="form-horizontal" method="post" enctype="multipart/form-data">
  <div class="content-wrapper">
    <div class="container-fluid">
    
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
         
        <div class="card-body">
          <div class="table-responsive">
              <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="aid">รหัสสินค้า	</label>  
            <div class="col-md-4">
            <input id="a_id" name="a_id" type="text" placeholder="" class="form-control input-md" value="<?=$data['a_id'];?>" readonly>		
            </div>
            </div>
              <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="aname">ชื่อสินค้า	</label>  
            <div class="col-md-4">
            <input id="a_name" name="a_name" type="text" placeholder="" class="form-control input-md" value="<?=$data['a_name'];?>"readonly>		
            </div>
            </div>
              <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="abase">เบส</label>  
            <div class="col-md-4">
            <input id="a_base" name="a_base" type="text" placeholder="" class="form-control input-md" value="<?=$data['a_base'];?>" readonly>		
            </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="acategory">ประเภท</label>  
            <div class="col-md-4">
            <input id="a_category" name="a_category" type="text" placeholder="" class="form-control input-md" value="<?=$data['a_category'];?>"readonly>		
            </div>
            </div>
             <!-- Text input-->
             <div class="form-group">
            <label class="col-md-4 control-label" for="asize">ขนาด</label>  
            <div class="col-md-4">
            <input id="a_size" name="a_size" type="text" placeholder="" class="form-control input-md" value="<?=$data['a_size'];?>"readonly>		
            </div>
            </div>
             <!-- Text input-->
             <div class="form-group">
            <label class="col-md-4 control-label" for="atotalsale">ราคาขายรวม</label>  
            <div class="col-md-4">
            <input id="a_totalsale" name="a_totalsale" type="text" placeholder="" class="form-control input-md" value="<?=$data['a_totalsale'];?>"readonly>		
            </div>
            </div>
             <!-- Text input-->
             <div class="form-group">
            <label class="col-md-4 control-label" for="atotalcost">ต้นทุนรวม</label>  
            <div class="col-md-4">
            <input id="a_totalcost	" name="a_totalcost	" type="text" placeholder="" class="form-control input-md" value="<?=$data['a_totalcost'];?>"readonly>		
            </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="astock">จำนวน : หน่วย<?php echo $data['a_unit'];?></label>  
            <div class="col-md-4">
            <input id="a_stock" name="a_stock" type="text" placeholder="" class="form-control input-md" value="<?=$data['a_stock'];?>">		
            </div>
            </div>
            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="acost">ต้นทุน</label>  
            <div class="col-md-4">
            <input id="a_cost" name="a_cost" type="text" placeholder="" class="form-control input-md" value="<?=$data['a_cost'];?>">		
            </div>
            </div>
             <!-- Text input-->
             <div class="form-group">
            <label class="col-md-4 control-label" for="asale">ราคาขาย</label>  
            <div class="col-md-4">
            <input id="a_sale" name="a_sale" type="text" placeholder="" class="form-control input-md" value="<?=$data['a_sale'];?>">		
            </div>
            </div>
            <!-- Button -->
            <div class="form-group">
            <label class="col-md-4 control-label" for="Submit"></label>
            <div class="col-md-4">
            <button id="Submit" name="Submit" class="btn btn-success">แก้ไขข้อมูล</button>
            <a href="product-single.php" class="btn btn-primary">ย้อนกลับ</a>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</form>
      <?php
          if(isset($_POST['Submit'])){ 

            $sql = "UPDATE product SET a_stock = '".$_POST['a_stock']."', a_cost = '".$_POST['a_cost']."', a_sale = '".$_POST['a_sale']."' WHERE a_id = '".$_GET['stdid']."' ";
		        $query	= mysqli_query ($con,$sql)  or die ("Error in query : $sql" .mysqli_error($sql));

            $sql1 = "UPDATE product SET a_totalcost = a_stock * a_cost WHERE a_id = '".$_GET['stdid']."' ";
            $query1	= mysqli_query ($con,$sql1)  or die ("Error in query : $sql1" .mysqli_error($sql1));

            $sql2 = "UPDATE product SET a_totalsale = a_stock * a_sale WHERE a_id = '".$_GET['stdid']."' ";
            $query2	= mysqli_query ($con,$sql1)  or die ("Error in query : $sql2" .mysqli_error($sql2));
            
            echo"<script>";
            echo"alert('แก้ไขข้อมูลสำเร็จ');";
            echo"window.location='product-single.php';";
            echo"</script>";
        }
    ?>

  
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
