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

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="h3 mb-0 text-gray-800">
                                <button type="button" class="btn btn-success ">ข้อมูลสินค้า</span></button>
                                <a href ="product-color.php"><button type="button" class="btn btn-success ">ข้อมูลสินค้าสีทาบ้าน</span></button></a> 
                        </div>
                    </div>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">ข้อมูลสินค้า</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ตารางข้อมูลสินค้า</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th><center>ลำดับ</center></th>
                                                <th><center>รหัสสินค้า</center></th>
                                                <th><center>ชื่อสินค้า</center></th>
                                                <th><center>ขนาด</center></th>
                                                <th><center>จำนวน</center></th>
                                                <th><center>ต้นทุน</center></th>
                                                <th><center>ราคาขาย</center></th>
                                                <th><center>การจัดการ</center></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                                    $str = "SELECT * FROM product WHERE (a_brand LIKE '%er') OR (a_brand LIKE '%oa') OR (a_brand LIKE '%ราคา%') ORDER BY a_id DESC ";
                                                    $rs = mysqli_query($con,$str);
                                                    $num=1;
                                                    while ($data = mysqli_fetch_array($rs)) {
                                                ?>
                                             <tr>
                                          <td><center><?php echo $num;?><center></td>
                                        <td><center><?php echo $data['a_id'];?></center></td>
		                                <td><?php echo $data['a_name'];?>
                                            <?php echo $data['a_base'];?>
                                        </td>
	                                	<td><center><?php echo $data['a_size'];?></center></td>
                                        <td><center><?php echo $data['a_stock'];?>
                                                    <?php echo $data['a_unit'];?>
                                        </center></td> 
                                        <td><center><?php echo $data['a_cost'];?> บาท</center></td>
                                        <td><center><?php echo $data['a_sale'];?> บาท</center></td>
	                                	<td><center><a href="update_pd.php?stdid=<?=$data['a_id'];?>"><center>แก้ไข</center></a>  
                                                    <a href="delete_pd.php?aid=<?=$data['a_id'];?>" onClick="return confirm('ยืนยันการลบ?');">ลบ</center></a>
                                        </td>
	                                    	</td>
                                             </tr>
                                            <?php $num++;
                                                }
                                            ?>
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

 

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