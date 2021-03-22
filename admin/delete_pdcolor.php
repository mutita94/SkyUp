<meta charset="utf-8">
<?php
	if(isset($_GET['aid'])){
		include("condb.php");
		$sql2 = "delete from product where a_id ='".$_GET['aid']."'";
		mysqli_query($con ,$sql2) or die ("ไม่สามารถลบข้อมูลไม่ได้"); 
	 echo"<script>";
	 echo"window.location='product-color.php';";
	 echo"</script>";
	}
?>