<?php
session_start();
include("condb.php");
$id = $_SESSION['m_id'] ;
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
                    <h1 class="h3 mb-2 text-gray-800">ข้อมูลสมาชิก</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ตารางข้อมูลสมาชิก</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                                <th><center>ลำดับ</center></th>
                                                <th><center>ชื่อผู้ใช้งาน</center></th>
                                                <th><center>รหัสผ่าน</center></th>
                                                <th><center>อีเมล</center></th>
                                                <th><center>เบอร์โทร</center></th>
                                                <th><center>การจัดการ</center></th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                                    $str = "SELECT * FROM member";
                                                    $rs = mysqli_query($con,$str);
                                                    $num=1;
                                                    while ($data = mysqli_fetch_array($rs)) {
                                                ?>
                                             <tr>
                                          <td><center><?php echo $num;?><center></td>
		                                <td><center><?php echo $data['m_name'];?></center></td>
                                        <td><center><?php echo $data['m_pass'];?></center></td>
	                                	<td><center><?php echo $data['m_mail'];?></center></td>
                                        <td><center><?php echo $data['m_phone'];?></center></td>   
	                                	<td><center><a href="update_member.php?stdid=<?=$data['m_id'];?>"><center>แก้ไข</center></a> 
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