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
    <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);


    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
</head>

<body id="page-top">

<?php
	include("adhead.php");
	?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="h3 mb-0 text-gray-800">
                        <a href ="insert_pd.php"><button type="button" class="btn btn-success ">เพิ่มสินค้า</span></button></a> 
                               <button type="button" class="btn btn-success ">เพิ่มเฉดสี</span></button>
                        </div>
                    </div>


                    <!-- Page Heading -->
                  <h1 class="h3 mb-2 text-gray-800">เพิ่มเฉดสีใหม่</h1>

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
               <!-- Text input
            <div class="form-group">
            <label class="col-md-4 control-label" for="a_id">รหัสสินค้า</label>  
            <div class="col-md-4">
            <input id="aid" name="aid" type="text" placeholder="" class="form-control input-md" required>		
            </div>
            </div>-->
              <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="a_name">รหัสและชื่อเฉดสี</label>  
            <div class="col-md-4">
            <input id="aname" name="aname" type="text" placeholder="" class="form-control input-md"required>		
            </div>
            </div>
             <!-- Text input-->
             <div class="form-group">
			          <label class="col-md-4 control-label"  for="a_brand" >ยี่ห้อ</label> 
                <div class="col-md-4">	
                    <select name ="abrand" class="form-control" aria-label=".form-select-lg example" >
                        <option selected >กรุณาเลือกยี่ห้อ</option>
                        <option value="TOA Supermatex">Toa Supermatex</option>
                        <option value="Beger Cool All Plus">Beger Cool All Plus</option>
                        </select>
                  </div>
			        </div>
               <!-- Text input-->
               <div class="form-group">
			          <label class="col-md-4 control-label"  for="a_base" >เบส</label> 
                <div class="col-md-4">	
                    <select name ="abase" class="form-control" aria-label=".form-select-lg example" >
                        <option selected >กรุณาเลือกเบส</option>
                        <option value="เบส A">เบส A</option>
                        <option value="เบส B">เบส B</option>
                        <option value="เบส C">เบส C</option>
                        <option value="เบส D">เบส D</option>
                        </select>
                  </div>
	              </div>
                  <!-- Text input-->
                  <div class="form-group">
			              <label class="col-md-4 control-label"  for="a_size" >ขนาด</label> 
                      <div class="col-md-4">	
                      <select name ="asize" class="form-control" aria-label=".form-select-lg example" >
                        <option selected >กรุณาเลือกขนาด</option>
                        <option value="1 gallon">1 gallon</option>
                        <option value="2 gallon">2.5 gallon</option>
                        <option value="3 gallon">5 gallon</option>
                      </select>
                      </div>
			            </div>
                  <!-- Text input
                  <div class="form-group">
                  <label class="col-md-4 control-label" for="a_stock">จำนวน</label>  
                  <div class="col-md-4">
                  <input id="astock" name="astock" type="text" placeholder="" class="form-control input-md" required>		
                  </div>
                  </div>-->
                     <!-- Text input-->
                     <div class="form-group">
			                <label class="col-md-4 control-label"  for="a_unit" >หน่วย</label> 
                       <div class="col-md-4">	
                        <select name ="aunit" class="form-control" aria-label=".form-select-lg example" >
                        <option selected >กรุณาเลือกหน่วย</option>
                        <option value="แกลลอน">แกลลอน</option>
                        <option value="ถัง">ถัง</option>
                        </select>
                      </div>
			              </div>
                    <!-- Text input-->
                    <div class="form-group">
			                <label class="col-md-4 control-label"  for="a_category" >ประเภท</label> 
                      <div class="col-md-4">	
                        <select name ="acategory" class="form-control" aria-label=".form-select-lg example" >
                        <option selected >กรุณาเลือกประเภท</option>
                        <option value="ภายนอก">สำหรับทาภายนอก</option>
                        <option value="ภายใน">สำหรับทาภายใน</option>
                        <option value="กึ่งเงา">ชนิดกึ่งเงา</option>
                        </select>
                  </div>
			        </div>
                <!-- Text input
                  <div class="form-group">
                <label class="col-md-4 control-label" for="a_property">คุณสมบัติ</label>  
                <div class="col-md-4">
                <input id="aproperty" name="aproperty" type="text" placeholder="" class="form-control input-md" required>		
                </div>
                </div>-->
                <!-- Text input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="a_total">ราคารวมเบสและแม่สี</label>  
                <div class="col-md-4">
                <input id="atotal" name="atotal" type="text" placeholder="" class="form-control input-md" required>		
                </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                <label class="col-md-4 control-label" for="a_tax">ภาษี</label>  
                <div class="col-md-4">
                <input id="atax" name="atax" type="text" placeholder="" class="form-control input-md" required>		
                </div>
                </div>
                <!-- Text input
                  <div class="form-group">
                  <label class="col-md-4 control-label" for="a_sale">ราคาขาย</label>  
                  <div class="col-md-4">
                  <input id="asale" name="asale" type="text" placeholder="" class="form-control input-md" required>		
                  </div>
                  </div>-->
             <!-- Text input
             <div class="form-group">
            <label class="col-md-4 control-label" for="a_totalcost">ต้นทุนรวม</label>  
            <div class="col-md-4">
            <input id="atotalcost" name="atotalcost" type="text" placeholder="" class="form-control input-md" required>		
            </div>
            </div>-->
            <!-- File Button --> 
            <div class="form-group">
             <label class="col-md-4 control-label"0 for="a_images">รูปภาพ</label>
            <div class="col-md-4">
             <input id="aimages" name="aimages" class="input-file" type="file">
             </div>
            </div>
            <!-- Button -->
            <div class="form-group">
            <label class="col-md-4 control-label" for="Submit"></label>
            <div class="col-md-4">
            <button id="Submit" name="Submit" class="btn btn-success">เพิ่มข้อมูล</button>
            <a href="index.php" class="btn btn-primary">ย้อนกลับ</a>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</form>
	<?php
        if(isset($_POST['Submit'])){ 

        $sql = "INSERT INTO product VALUES(null, '".$_POST['aname']."', '-' , '".$_POST['asize']."',
             '".$_POST['aunit']."', '20','0', '0', '0' , '0',
             '".$_POST['acategory']."', '-' ,'".$_POST['atotal']."','".$_POST['atax']."','".$_POST['abrand']."','".$_FILES['aimages']['name']."')";
        $query	= mysqli_query ($con,$sql)  or die ("Error in query : $sql" .mysqli_error($sql));
        copy($_FILES['aimages']['tmp_name'],"img/".$_FILES['aimages']['name']);

        $sql1 = "UPDATE product SET a_sale = '".$_POST['atax']."' + '".$_POST['atotal']."' ";
        $query1	= mysqli_query ($con,$sql1)  or die ("Error in query : $sql" .mysqli_error($sql1));
        
        echo"<script>";
        echo"alert('เพิ่มเฉดสีสำเร็จ');";
        echo"window.location='product-color.php';";
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
