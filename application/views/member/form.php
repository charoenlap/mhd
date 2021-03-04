<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">ข้อมูลสมาชิก</h1>

    <!-- DataTales Example -->
    <?php if (!empty($success)) { ?>
    <div class="card shadow mb-4">
        <div class="card-body border-left-success text-success"><i class="fas fa-check-circle text-success"></i> <?php echo $success;?></div>
    </div>
    <?php } ?>
    <?php if (!empty($error)) { ?>
    <div class="card shadow mb-4">
        <div class="card-body border-left-danger text-danger"><i class="fas fa-times-circle text-danger"></i> <?php echo $error;?></div>
    </div>
    <?php } ?>
    <form class="user">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">จัดการข้อมูล</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label>ชื่อ</label>
                                <input type="text" class="form-control" id="exampleFirstName" placeholder="First Name">
                            </div>
                            <div class="col-md-4">
                                <label>นามสกุล</label>
                                <input type="text" class="form-control" id="exampleLastName" placeholder="Last Name">
                            </div>
                            <div class="col-md-4">
                                <label>อีเมล</label>
                                <input type="email" class="form-control" id="exampleInputEmail" placeholder="Email Address">
                            </div>
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">เปลี่ยนรหัส</h6>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-3 col-sm-12">
                    <label>รหัสผ่านเก่า</label>
                    <input type="password" class="form-control" id="" placeholder="Old Password">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3 col-sm-12">
                    <label>รหัสผ่านใหม่</label>
                    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                </div>
                <div class="col-md-3 col-sm-12">
                    <label>ยืนยันรหัสผ่านใหม่</label>
                    <input type="password" class="form-control" id="exampleRepeatPassword" placeholder="Repeat Password">
                </div>
                <div class="col-md-12 mt-3">
                    <input type="submit" class="btn btn-primary" value="เปลี่ยนรหัสผ่าน" />
                </div>
            </div>
        </div>
    </div>


    </form>

</div>