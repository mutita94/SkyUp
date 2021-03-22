
<?php
session_start();
//include("condb.php");
    $host = "localhost" ;				
    $user = "root" ;				
    $pwd="12345678" ;					
    $dbName = "skyup" ;			
	mysql_connect($host , $user, $pwd) or die ("ติดต่อฐานข้อมูลล้มเหลว") ;				
	mysql_select_db("$dbName") or die ("เลือกฐานข้อมูลล้มเหลว") ;							
    mysql_query("SET NAMES utf8") ;

                    //หลักฐานการโอน
                    $result = mysql_query("SELECT * FROM add_order WHERE o_status = 'ชำระแล้ว' ");
                    $num_rows = mysql_num_rows($result) or die("Error in query : $result" .mysqli_error($result));
                    //สถานะการจัดส่ง
                    $result1 = mysql_query("SELECT * FROM payment WHERE pay_status = 'เตรียมจัดส่งสินค้า' ");
                    $num_rows1 = mysql_num_rows($result1) or die("Error in query : $result1" .mysqli_error($result1));
                //echo $result;
                //exit;
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
                       <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="h3 mb-0 text-gray-800">
                                <a href ="index.php"><button type="button" class="btn btn-info ">ชำระเงิน
                                <span class="badge rounded-pill bg-dark"><?php echo $num_rows; ?></span></button></a>
            
                                <button type="button" class="btn btn-success ">คำสั่งซื้อ
                                <span class="badge rounded-pill bg-dark"><?php echo $num_rows1; ?></span></button>
                        </div>
                    </div>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">คำสั่งซื้อ</h1>
                    <p class="mb-4"> 

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">คำสั่งซื้อ</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                                <th><center>ลำดับ</center></th>
                                                <th><center>เลขที่คำสั่งซื้อ</center></th>
                                                <th><center>วันที่สั่งซื้อ</center></th>
                                                <th><center>ที่อยู่ในการจัดส่ง</center></th>
                                                <th><center>ราคารวมทั้งสิ้น</center></th>
                                                <th><center>สถานะการจัดส่ง</center></th>
                                                <th><center>รหัสสมาชิก</center></th> 
                                                <th><center>รายละเอียดคำสั่งซื้อ</center></th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php   
                                            $sql1 = "SELECT * FROM add_order
                                            INNER JOIN order_detail ON add_order.o_id = order_detail.o_id 
                                            INNER JOIN payment ON add_order.o_id = payment.o_id  ";  
                                            $result1 = mysqli_query($con, $sql1) or die("Error in query : $sql" .mysqli_error($sql));
                                            while ($row = mysqli_fetch_array($result1)) {
                                                $i++;
                                                if( ($i % 3) == 1) {
                                                }
                                                ?>
                                        <tr>
                                                <td><center><?php echo $i;?><center></td>
                                                <td><center><?php echo $row['o_id'];?></center></td>
                                                <td><center><?php echo $row['o_dttm'];?></center></td>
                                                <td>
                                                            ผู้รับ :<?php echo $row['o_name'];?><br> 
                                                            ที่อยู่ :<?php echo $row['o_addr'];?><br>
                                                            เบอร์ :<?php echo $row['o_phone'];?> 
                                                </td>
                                                <td><center><?php echo $row['o_total'];?> บาท</center></td> 
                                                <td><center><?php echo $row['pay_status'];?></center></td>
                                                <td><center><?php echo $row['m_id'];?></center></td> 
                                                <td><center><a href="update_tran.php?o_id=<?=$row['o_id'];?>">รายละเอียด| 
                                                    <a href="bill.php?o_id=<?=$row['o_id'];?>">พิมพ์ใบเสร็จ </center></td>
                                        </tr>
                                    <?php 
                                        if ( ($i % 3 ) == 0){	
                                            }
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