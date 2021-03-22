<?php
session_start();
include("condb.php");
    
    $sql = "SELECT * FROM order_detail
    INNER JOIN add_order ON order_detail.o_id  = add_order.o_id 
    INNER JOIN product ON  product.a_id = order_detail.a_id
    WHERE order_detail.o_id ='".$_GET['o_id']."'";
    $result = mysqli_query($con, $sql) or die("Error in query : $sql" .mysqli_error($sql));
    $row = mysqli_fetch_array($result);
    $o_id = $_GET['o_id'];

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
                    <h1 class="h3 mb-2 text-gray-800">รายละเอียดคำสั่งซื้อ</h1>

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
                          <label class="col-md-4 control-label" for="aid">เลขที่คำสั่งซื้อ</label>  
                          <div class="col-md-4">
                          <input id="o_id" name="o_id" type="text" placeholder="" class="form-control input-md" value="<?=$row['o_id'];?>" readonly>		
                          </div>
                          </div>
                            <!-- Text input-->
                          <div class="form-group">
                          <label class="col-md-4 control-label">ชื่อสินค้า</label>  
                          <div class="col-md-4">
                          <input id="a_name" name="a_name" type="text" class="form-control input-md" value="<?=$row ['a_brand'];?><?=$row ['a_name'];?>">		
                          </div>
                          </div>
                            <!-- Text input-->
                          <div class="form-group">
                          <label class="col-md-4 control-label">ประเภทสินค้า</label>  
                          <div class="col-md-4">
                          <input id="a_category" name="a_category" type="text" class="form-control input-md" value="<?=$row ['a_category'];?>" readonly>		
                          </div>
                          </div>
                          <!-- Text input-->
                          <div class="form-group">
                          <label class="col-md-4 control-label">ขนาด</label>  
                          <div class="col-md-4">
                          <input id="a_size" name="a_size" type="text" class="form-control input-md" value="<?=$row ['a_size'];?>"readonly>		
                          </div>
                          </div>
                          <!-- Text input-->
                          <div class="form-group">
                          <label class="col-md-4 control-label">จำนวน</label>  
                          <div class="col-md-4">
                          <input id="od_qty" name="od_qty" type="text"class="form-control input-md" value="<?=$row ['od_qty'];?><?=$row ['a_unit'];?>"readonly>		
                          </div>
                          </div>
                          <!-- Text input-->
                          <div class="form-group">
                          <label class="col-md-4 control-label">ราคาต่อหน่วย</label>  
                          <div class="col-md-4">
                          <input id="a_sale" name="a_sale" type="text" class="form-control input-md" value="<?=$row['a_sale'];?>"readonly>		
                          </div>
                          </div>
                          <!-- Text input-->
                          <div class="form-group">
                          <label class="col-md-4 control-label">ราคาต่อรายการ</label>  
                          <div class="col-md-4">
                            <input id="od_subtotal" name="od_subtotal" type="text" class="form-control input-md" value="<?=$row['od_subtotal'];?>"readonly>		
                          </div>
                          </div>
                          <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-4 control-label"  for="req_status">สถานะการจัดส่ง</label> 
                                <div class="col-md-2">	
                                    <select name="pay_status" class="form-control" aria-label=".form-select-lg example">
                                        <option value="">แก้ไขสถานะ</option>
                                        <option value="เตรียมจัดส่งสินค้า">เตรียมจัดส่งสินค้า</option>
                                        <option value="กำลังส่งสินค้า">กำลังส่งสินค้า</option>
                                        <option value="ส่งสินค้าสำเร็จ">ส่งสินค้าสำเร็จ</option>
                                  </select>
                              </div>
                              </div>
                          <!-- Button -->
                              <div class="form-group">
                                  <label class="col-md-4 control-label" for="Submit"></label>
                                  <div class="col-md-4">
                                  <button id="Submit" name="Submit" class="btn btn-success">แก้ไขข้อมูล</button>
                                  <a href="statustran.php" class="btn btn-primary">ย้อนกลับ</a>
                              </div>
                              </div>
                        </div>
                      </div>
                    </div>
                  </div>
	            </form>
                <?php
                      if(isset($_POST['Submit'])){ 

                      $sql1 = "UPDATE payment SET pay_status = '".$_POST['pay_status']."' WHERE o_id = '".$_GET['o_id']."';";
                      mysqli_query($con,$sql1)or die("แก้ไขข้อมูลไม่สำเร็จ");
                      
                      echo"<script>";
                      echo"alert('แก้ไขสถานะการจัดส่งสำเร็จ');";
                      echo"window.location='statustran.php';";
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
