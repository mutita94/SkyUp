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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">รายงานสรุปสินค้าคงเหลือ</h1>

                    <form class="form-horizontal" method="post"  action = "report.php"enctype="multipart/form-data">
                <div class="content-wrapper">
             <div class="container-fluid">
    
         <!-- Example DataTables Card-->
     <div class="card mb-3">
        <div class="card-header">
         
        <div class="card-body">
          <div class="table-responsive">
              

               <!-- Text input-->
               <center> <div class="form-group">
			        <label class="col-md-3 control-label" align="center" for="a_brand" >สินค้าตามแบรนด์</label> 
                <div class="col-md-3">	
                    <select name ="a_brand" class="form-control" aria-label=".form-select-lg example" >
                        <option selected >กรุณาเลือกแบรนด์สินค้า</option>
                        <option value="toa">TOA</option>
                        <option value="beger">Beger</option>
                        <option value="Toa Supermatex">Toa Supermatex</option>
                        <option value="Beger Cool All Plus">Beger Cool All Plus</option>
                        <option value="TOA ราคาพิเศษ">TOA ราคาพิเศษ</option>
                        <option value="Beger ราคาพิเศษ">Beger ราคาพิเศษ</option>
                        </select>
                </div> </center> 
                <div class="col-15 col-md-15" align="center"> 
                    <button type="submit" class="btn btn-outline-primary">ค้นหา</button>
                </div>
			</div>
         </div>
	    </div>
     </div>
	</div>
        </div>
			</div>
               </form>
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