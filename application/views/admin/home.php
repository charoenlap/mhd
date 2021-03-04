<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $heading_title;?></h1>
                </div>
                <div class="col-sm-6">
                    <?php if ($breadcrumbs) : ?>
                    <ol class="breadcrumb float-sm-right">
                        <?php foreach ($breadcrumbs as $title => $link) { ?>
                        <li class="breadcrumb-item"><a href="<?php echo $link;?>"><?php echo $title; ?></a></li>
                        <?php } ?>
                    </ol>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-sign-in-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">รายงานที่สมาชิกแจ้งมา</span>
                            <span class="info-box-number">2</span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fas fa-file-invoice-dollar"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">แจ้งชำระเงิน</span>
                            <span class="info-box-number">1,410</span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">จำนวนสมาชิกทั้งหมด</span>
                            <span class="info-box-number">1,410</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->