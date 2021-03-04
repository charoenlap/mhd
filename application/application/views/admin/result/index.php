<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $heading_title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <?php if ($breadcrumbs): ?>
                    <ol class="breadcrumb float-sm-right">
                        <?php foreach ($breadcrumbs as $title => $link) { ?>
                        <li class="breadcrumb-item"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></li>
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
                    <?php if (!empty($success)): ?>
                    <div class="alert alert-success alert-dismissible"><?php echo $success; ?></div>
                    <?php endif; ?>
                    <?php if (!empty($error)): ?>
                    <div class="alert alert-danger alert-dismissible"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-body">
                            <a href="<?php echo $link_clear; ?>" class="btn btn-default shadow-sm" target="new" style="">
                                <img style="width:18px; height:18px; margin:3px 3px;" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                                <span style="font-size:14px; color:rgba(0,0,0,0.54); margin-left:5px; margin-right:8db;">Sign out with Google</span>
                            </a>
                            <hr />


                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">File Google Drive</th>
                                            <th colspan="6" class="text-center">System Found</th>
                                        </tr>
                                        <tr>
                                            <th>Year</th>
                                            <th>Program</th>
                                            <th>Trial</th>
                                            <th>MainUser</th>
                                            <th>SubUser</th>
                                            <th width="15%" class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($results) > 0): ?>
                                        <?php foreach ($results as $key => $value): ?>
                                        <tr>
                                            <td <?php echo ($value['type'] == 'application/vnd.google-apps.folder') ? 'colspan="7"' : ''; ?> >
                                                
                                                <a href="<?php echo $value['link']; ?>" target="<?php echo $value['target']; ?>">
                                                <?php if ($value['type'] == 'application/pdf'): ?>
                                                    <i class="fas fa-file-pdf"></i>&nbsp;
                                                    <?php echo $value['name']; ?>
                                                <?php endif; ?>
                                                <?php if ($value['type'] == 'application/vnd.google-apps.folder'): ?>
                                                    <i class="fas fa-folder"></i>&nbsp;
                                                    <?php echo $value['name']; ?>
                                                <?php endif; ?>
                                                </a>
                                                <?php if ($value['name'] != '..' && $value['type'] == 'application/pdf'): ?>
                                                &nbsp;<?php echo $value['saved']?'<i class="fas fa-check text-success"></i>':'<i class="fas fa-times text-danger"></i>';?>
                                                <?php endif; ?>
                                                <?php if ($value['name'] != '..' && $value['type'] == 'application/pdf'): ?>
                                                <!-- <a class="float-right" data-toggle="modal" data-target="#modalInfo-<?php echo $key;?>" style="cursor:pointer;">
                                                    <i class="fas fa-info-circle"></i>&nbsp;info
                                                </a> -->
                                                <?php endif; ?>
                                            </td>
                                            <?php if ($value['name'] != '..' && $value['type'] == 'application/pdf'): ?>
                                            <td><?php echo $value['data']->year_name;?></td>
                                            <td><?php echo $value['data']->program_name;?></td>
                                            <td><?php echo $value['data']->trial_name;?></td>
                                            <td><?php echo $value['data']->member_id;?></td>
                                            <td class="<?php echo $value['data']->match_sub==false?'text-danger':'';?>"><?php echo $value['data']->sub_member_id;?></td>
                                            <td class="text-center">
                                                <label class="switch float-none">
                                                    <input type="checkbox" data-id="<?php echo $value['data']->id;?>" class="ch-status primary" <?php echo $value['data']->status==1 ? 'checked="checked"' : '';?>>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="2">
                                                File not found.
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>



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


<style type="text/css">


    /* The switch - the box around the slider */
    .switch {
    position: relative;
    display: inline-block;
    width: 40px;
    height: 22px;
    margin-bottom: 0;
    float: right;
    }

    /* Hide default HTML checkbox */
    .switch input {display:none;}

    /* The slider */
    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input.default:checked + .slider {
    background-color: #444;
    }
    input.primary:checked + .slider {
    background-color: #007bff;
    }
    input.success:checked + .slider {
    background-color: #8bc34a;
    }
    input.info:checked + .slider {
    background-color: #3de0f5;
    }
    input.warning:checked + .slider {
    background-color: #FFC107;
    }
    input.danger:checked + .slider {
    background-color: #f44336;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(18px);
    -ms-transform: translateX(18px);
    transform: translateX(18px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }
    #customBtn {
        display: inline-block;
        background: white;
        color: #444;
        width: 190px;
        border-radius: 5px;
        border: thin solid #888;
        box-shadow: 1px 1px 1px grey;
        white-space: nowrap;
    }
    #customBtn:hover {
        cursor: pointer;
    }
    span.label {
        font-family: serif;
        font-weight: normal;
    }
    span.icon {
        background: url('/identity/sign-in/g-normal.png') transparent 5px 50% no-repeat;
        display: inline-block;
        vertical-align: middle;
        width: 42px;
        height: 42px;
    }
    span.buttonText {
        display: inline-block;
        vertical-align: middle;
        padding-left: 42px;
        padding-right: 42px;
        font-size: 14px;
        font-weight: bold;
        /* Use the Roboto font that is loaded in the <head> */
        font-family: 'Roboto', sans-serif;
    }
</style>


<script type="text/javascript">
$(document).ready(function () {

    let getTrial = (row,yearID,programID) => {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('admin/result/findTrial'); ?>",
            data: {year_id: yearID, program_id: programID},
            dataType: "json",
            success: function (response) {
                let html = '<option></option>' + $.map(response, (trial, index) => {
                    return ('<option>'+trial.name+'</option>');
                });
                $('.select-trial[data-row='+row+']').html(html);
            }
        });
    }

    let eventTrial = (thisElement) => {
        let row = thisElement.data('row');
        let year = $('.select-year[data-row='+row+']').val();
        let program = $('.select-program[data-row='+row+']').val();
        if (year.length>0 && program.length>0) {
            getTrial(row,year,program);
        }
    }

    $('.select-program').change(function (e) {
        e.preventDefault();
        console.log('change');
        console.log($(this).val());
        eventTrial($(this));
    });

    $('.select-year').change(function (e) {
        e.preventDefault();
        eventTrial($(this));
    });

    $('.ch-status').change(function (e) { 
        e.preventDefault();
        let obj = {id: $(this).data('id'), status: 0};
        if ($(this).is(':checked')) {
            obj.status = 1;
        } else {
            obj.status = 0;
        }
        console.log(obj);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('admin/result/saveStatus');?>",
            data: obj,
            dataType: "json",
            success: function (response) {
                console.log(response);
            }
        });
    });

});
</script>