<?php
session_start();
include("condb.php");
$sql2 = "select * from member where m_id ='".$_GET['stdid']."'";
$result2 = mysqli_query($con,$sql2);
$data2 = mysqli_fetch_array($result2,MYSQLI_BOTH);

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

    <title>SB Admin 2 - Tables</title>

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
                    <h1 class="h3 mb-2 text-gray-800">แก้ไขข้อมูลสมาชิก</h1>

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
            <label class="col-md-4 control-label" for="user">ชื่อผู้ใช้งาน</label>  
            <div class="col-md-4">
            <input id="m_name" name="m_name" type="text" placeholder="" class="form-control input-md" value="<?=$data2['m_name'];?>">		
            </div>
            </div>
              <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="pass">รหัสผ่าน</label>  
            <div class="col-md-4">
            <input id="m_pass" name="m_pass" type="text" placeholder="" class="form-control input-md" value="<?=$data2['m_pass'];?>">		
            </div>
            </div>
             <!-- Text input-->
             <div class="form-group">
            <label class="col-md-4 control-label" for="email">อีเมล</label>  
            <div class="col-md-4">
            <input id="m_mail" name="m_mail" type="text" placeholder="" class="form-control input-md" value="<?=$data2['m_mail'];?>">		
            </div>
            </div>
             <!-- Text input-->
             <div class="form-group">
            <label class="col-md-4 control-label" for="phone">เบอร์โทร</label>  
            <div class="col-md-4">
            <input id="m_phone" name="m_phone" type="text" placeholder="" class="form-control input-md" value="<?=$data2['m_phone'];?>">		
            </div>
            </div>
            <!-- Button -->
            <div class="form-group">
            <label class="col-md-4 control-label" for="Submit"></label>
            <div class="col-md-4">
            <button id="Submit" name="Submit" class="btn btn-success">แก้ไขข้อมูล</button>
            <a href="member.php" class="btn btn-primary">ย้อนกลับ</a>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</form>
	<?php
	if(isset($_POST['Submit'])){ 
	 
	 $sql ="update member set m_name = '".$_POST['m_name']."', m_pass = '".$_POST['m_pass']."', m_mail = '".$_POST['m_mail']."', m_phone = '".$_POST['m_phone']."' where m_id ='".$_GET['stdid']."'";
	 mysqli_query($con,$sql)or die("แก้ไขข้อมูลไม่ได้");
	 echo"<script>";
	 echo"alert('แก้ไขข้อมูลสำเร็จ');";
	 echo"window.location='member.php';";
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
