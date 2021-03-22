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
                    <div class="table-responsive">

                            <center><h3><a>รายงานการสั่งซื้อสินค้า</a> ร้าน Sky Up Painting<p></h3></center>
                            <?
                               
                                $sql = "SELECT * FROM add_order 
                                INNER JOIN payment ON add_order.o_id = payment.o_id
                                WHERE payment.pay_status = 'ส่งสินค้าสำเร็จ' ";
		                        $query	= mysqli_query ($con,$sql)  or die ("Error in query : $sql" .mysqli_error($sql));
                                $sum = $row['o_total'] + $row['o_total'] ;
                                $total += $sum;
                            ?>
                            <div class="col-15 col-md-15" align="center"> 
                                <a href="od_print.php" class="btn btn-outline-primary">ออกรายงาน</a> 
                            </div></center><br>
                            <table class="table table-bordered" id="add_order" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th><center>ลำดับ</center></th>
                                    <th><center>เลขที่คำสั่งซื้อ</center></th>
                                    <th><center>วันที่สั่งซื้อ</center></th>
                                    <th><center>สถานะการจัดส่ง</center></th>
                                    <th><center>ราคารวมต่อคำสั่งซื้อ</center></th>
                                </tr>
                                </thead>
            <?php
                $num=1;
                while($row = mysqli_fetch_array($query))
               
                {
            ?> 
                <tr>
                    <td><center><?php echo $num;?><center></td>
                    <td><center><?php echo $row["o_id"];?></center></td>
                    <td><center><?php echo $row["o_dttm"];?></center></td>
                    <td><center><?php echo $row["pay_status"];?></center></td>
                    <td><center><?php echo $row["o_total"];?> บาท</center></td>
                </tr>

            <?php
                    $totalmoney = $totalmoney + $row["o_total"];
                    $num++;
            }
                ?>
                <tr>
                    <td colspan='3' align='right' class='text'><b>ยอดรวมสุทธิ</b></td>
                    <td class='text' ><center><?=$totalmoney?> บาท</center></td>
                </tr>
        </table>
                                  </tbody>
                                </table>
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