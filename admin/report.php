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

                    <!-- DataTales Example -->
                        <div class="card-body">

                        <?php
                            $sql = "SELECT * FROM product ";
                            $query	= mysqli_query ($con,$sql)  or die ("Error in query : $sql" .mysqli_error($sql)); 
                            $row = mysqli_fetch_array($query);                                          
                        ?>


                            <h1><a>รายงานสรุปสินค้าคงเหลือ</a></h1>
                                  <h2><p>ร้านSky Up Painting<p></h2>
                                  <div class="col-15 col-md-15" align="right"> 
                                        <a href="form_pd.php?a_id=<?=$_POST['a_brand'];?>" class="btn btn-outline-success">ออกรายงาน</a> 
                                        <a href="report_pd.php" class="btn btn-outline-danger">ย้อนกลับ</a>
                                  </div><br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
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
                                    
                                    <tbody>
                                            <?php 
                                                    $sql1 = "SELECT * FROM product WHERE a_brand = '".$_POST['a_brand']."'";
                                                    $result = mysqli_query($con,$sql1);
                                                    $num=1;
                                                    while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                             <tr>
                                          <td><center><?php echo $num;?><center></td>
                                          <td><center><?php echo $row ['a_id'];?></center></td>
		                                <td><center><?php echo $row['a_name'];?></center></td>
                                        <td><center><?php echo $row['a_size'];?></center></td>
	                                	<td><center><?php echo $row['a_stock'];?></center></td>
                                        <td><center><?php echo $row['a_sale'];?></center></td>   
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