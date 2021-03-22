<?php
session_start();
include("condb.php");
?>
<!DOCTYPE html>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fab fa-accusoft"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Sky Up Painting </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-chart-pie"></i>
                    <span>หน้าแรก</span></a>
            </li>
         
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="member.php">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>ข้อมูลสมาชิก</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="product-single.php">
                <i class="fas fa-fw fa-folder"></i>
                    <span>ข้อมูลสินค้า</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="insert_pd.php">
                    <i class="fas fa-fw fa-cart-plus"></i>
                    <span>เพิ่มสินค้า</span></a>
            </li>
   <!-- Divider -->
   <hr class="sidebar-divider my-0">

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder-open"></i>
        <span>ออกรายงาน</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="report_od.php">รายงานการสั่งซื้อสินค้า</a>
            <a class="collapse-item" href="report_pd.php">รายงานสินค้าคงเหลือ</a> 
    </div>
</li>
          

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
             

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                        <div class="reg">
		        	<p class="mb-1" >
					<a ><?php echo"ยินดีต้อนรับ : ".$_SESSION['adname'] ; ?>&nbsp;</a> 
					<a href="../index.php">ออกจากระบบ</a> &nbsp;&nbsp;&nbsp;
		            </div>       
                    </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
