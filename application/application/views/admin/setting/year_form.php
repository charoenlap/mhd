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
                <div class="col-12">
                    <?php if (!empty($success)) : ?>
                    <div class="alert alert-success alert-dismissible"><?php echo $success;?></div>
                    <?php endif;?>
                    <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger alert-dismissible"><?php echo $error;?></div>
                    <?php endif;?>
                    <div class="card">
                        <div class="card-body">

                            <form action="<?php echo $action;?>" method="POST">
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">ชื่อปี</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="year" class="form-control" value="<?php echo isset($list->year) ? $list->year : '';?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10 offset-sm-2">
                                        <input type="submit" class="btn btn-primary" value="บันทึก" />
                                        <button type="button" class="btn btn-default" onclick="window.history.back(1);">กลับ</button>
                                    </div>
                                </div>
                            </form>

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