 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-text mx-3">
             <img src="<?php echo base_url();?>assets/img/logo.png" alt="logo" class="img-fluid">
         </div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item">
         <a class="nav-link" href="<?php echo base_url('member/dashboard');?>">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>หน้าแรก</span>
         </a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider mt-2">

     <!-- Heading -->
     <div class="sidebar-heading">จัดการผล</div>

     <li class="nav-item">
         <a class="nav-link" href="<?php echo base_url('report');?>">
             <i class="fas fa-fw fa-file-upload"></i>
             <span>แจ้งส่งผลการทดสอบ</span>
         </a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="<?php echo base_url('result');?>">
             <i class="fas fa-fw fa-chart-line"></i>
             <span>ผลการประเมิน</span>
         </a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider mt-2">

     <div class="sidebar-heading">สมาชิก</div>

     <?php if (isset($_SESSION['year']) && $_SESSION['year']!==false) : ?>
     <li class="nav-item">
         <a class="nav-link" href="<?php echo base_url('register');?>">
             <i class="fas fa-fw fa-user-plus"></i>
             <span>สมัครโปรแกรมปี <?php echo $_SESSION['year'];?></span>
         </a>
     </li>
     <?php endif;?>
     <li class="nav-item">
         <a class="nav-link" href="<?php echo base_url('payment');?>">
             <i class="fas fa-fw fa-file-invoice-dollar"></i>
             <span>แจ้งชำระเงิน</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?php echo base_url('permission');?>">
             <i class="fas fa-user-tag"></i>
             <span>จัดการสิทธิ์</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="<?php echo base_url('member');?>">
             <i class="fas fa-fw fa-user-shield"></i>
             <span>ข้อมูลส่วนตัว</span>
         </a>
     </li>



     <hr class="sidebar-divider mt-2">

     <li class="nav-item">
         <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
             <i class="fas fa-fw fa-sign-out-alt"></i>
             <span>ออกจากระบบ</span>
         </a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block mt-2">
     <small class="px-3">Version 2.0</small>

 </ul>
 <!-- End of Sidebar -->


 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

     <!-- Main Content -->
     <div id="content">
         <!-- Topbar -->
         <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

             <!-- Topbar Navbar -->
             <ul class="navbar-nav ml-auto">

                 <div class="topbar-divider d-none d-sm-block"></div>

                 <!-- Nav Item - User Information -->
                 <li class="nav-item dropdown no-arrow">
                     <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['member_info']['member_no'].' - '.$_SESSION['member_info']['email'];?></span>
                     </a>
                     <!-- Dropdown - User Information -->
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                         <a class="dropdown-item" href="<?php echo base_url('member');?>">
                             <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                             ข้อมูลส่วนตัว
                         </a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                             ออกจากระบบ
                         </a>
                     </div>
                 </li>

             </ul>

         </nav>
         <!-- End of Topbar -->