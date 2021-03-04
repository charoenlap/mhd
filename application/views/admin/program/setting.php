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
                    <form action="<?php echo $action;?>" method="POST">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button type="button" class="btn btn-default" onclick="window.history.back(1);">กลับ</button>
                                        <input type="submit" class="btn btn-primary" value="บันทึก" />
                                    </div>
                                </div>
                                <ul class="nav nav-tabs" id="TabSetting" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="tool_tab" data-toggle="tab" href="#tool" role="tab" aria-controls="tool" aria-selected="true">Tool</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="instruments_tab" data-toggle="tab" href="#instruments" role="tab" aria-controls="instruments" aria-selected="false">Instruments</a>
                                    </li>
                                    <?php 
                                    if (in_array($id, $show_principle)): ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="principle_tab" data-toggle="tab" href="#principle" role="tab" aria-controls="instruments" aria-selected="false">Principle</a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                                <div class="tab-content" id="TabSettingContent">
                                    <div class="tab-pane fade show active" id="tool" role="tabpanel" aria-labelledby="tool_tab">
                                        <table class="table table-bordered mb-3">
                                            <thead>
                                                <tr>
                                                    <th width="20%">Tool Code</th>
                                                    <th>Tool Name</th>
                                                    <th width="20%">Tool Section</th>
                                                    <th width="10%"">
                                                        <a href=" #" type="button" id="add_tool" class="btn btn-sm btn-success">Add</a>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (count($tools)>0){ 
                                                    foreach ($tools as $tool) { ?>
                                                <tr>
                                                    <td><input type="text" name="tool[code][<?php echo $tool->id;?>]" class="form-control" value="<?php echo $tool->code;?>" /></td>
                                                    <td><input type="text" name="tool[name][<?php echo $tool->id;?>]" class="form-control" value="<?php echo $tool->name;?>" /></td>
                                                    <td><input type="text" name="tool[section][<?php echo $tool->id;?>]" class="form-control" value="<?php echo $tool->section;?>" /></td>
                                                    <td><button type="button" class="del_tool btn btn-sm btn-danger">Del</button></td>
                                                    
                                                </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class=" tab-pane fade" id="instruments" role="tabpanel" aria-labelledby="instruments_tab">
                                        <table class="table table-bordered mb-3">
                                            <thead>
                                                <tr>
                                                    <th width="25%">Instruments Code</th>
                                                    <th>Instruments Name</th>
                                                    <th width="20%">Instruments Section</th>
                                                    <th width="10%""><button type=" button" class="btn btn-sm btn-success">Add</button></th>
                                                    <?php if ($id==1) : // Only ID:EQAC ?>
                                                    <th width="20%"></th>
                                                    <?php endif; // Only ID:EQAC ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (count($instruments)>0){ 
                                                    foreach ($instruments as $instrument) { ?>
                                                <tr>
                                                    <td><input type="text" name="instrument[code][<?php echo $instrument->id;?>]" class="form-control" value="<?php echo $instrument->code;?>" /></td>
                                                    <td><input type="text" name="instrument[name][<?php echo $instrument->id;?>]" class="form-control" value="<?php echo $instrument->name;?>" /></td>
                                                    <td><input type="text" name="instrument[section][<?php echo $instrument->id;?>]" class="form-control" value="<?php echo $instrument->section;?>" /></td>
                                                    <td><button type="button" class="del_tool btn btn-sm btn-danger">Del</button></td>
                                                    <?php if ($id==1) : // Only ID:EQAC ?>
                                                    <td>
                                                        <?php $saved = json_decode($instrument->event, true); ?>
                                                        <select class="form-control select2multi" multiple="multiple">
                                                            <?php foreach ($tools_eqac as $value): ?>
                                                            <option value="<?php echo $value->id;?>"
                                                                    <?php echo in_array($value->code, $saved) ? 'selected' : '';?>>
                                                                <?php echo $value->name;?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                    <?php endif; // Only ID:EQAC ?>
                                                </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php if (in_array($id, $show_principle)): ?>
                                    <div class=" tab-pane fade" id="principle" role="tabpanel" aria-labelledby="principle_tab">
                                        <table class="table table-bordered mb-3">
                                            <thead>
                                                <tr>
                                                    <th width="25%">Principle Code</th>
                                                    <th>Principle name</th>
                                                    <th width="10%""><button type=" button" class="btn btn-sm btn-success">Add</button></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (count($principles)>0){ 
                                                    foreach ($principles as $principle) { ?>
                                                <tr>
                                                    <td><input type="text" name="principle[code][<?php echo $principle->id;?>]" class="form-control" value="<?php echo $principle->code;?>" /></td>
                                                    <td><input type="text" name="principle[name][<?php echo $principle->id;?>]" class="form-control" value="<?php echo $principle->name;?>" /></td>
                                                    <td><button type="button" class="del_tool btn btn-sm btn-danger">Del</button></td>
                                                </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php endif; ?>
                                </div>

                                <div class="position-fixed" style="bottom:25px; right:25px;"><button type="button" class="btn btn-default shadow" id="scrollup">Up</button></div>

                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<style>
.select2 { width:100% !important; }
</style>
<script>
$(document).ready(function() {

    // Tool Function
    let addtr_tool = () => {
        let html = '<tr>';
        html += '   <td><input type="text" name="tool[code][]" class="form-control" /></td>';
        html += '   <td><input type="text" name="tool[name][]" class="form-control" /></td>';
        html += '   <td><input type="text" name="tool[section][]" class="form-control" /></td>';
        html += '   <td><button type="button" class="del_tool btn btn-sm btn-danger" >Del</button></td>';
        html += '</tr>';
        bodytool.append(html);   
        scrollto(".main-footer");
    }

    let deltr_tool = (element) => {
        $(element).parents('tr').remove();
        console.log('Remove tr success.');
    }

    let scrollto = (ele) => {
        $('html, body').animate({scrollTop: $(ele).offset().top}, 300); // scroll down
    };

    let autohideBtnUp = () => {
        let now = $(window).scrollTop();
        if (now>0) 
            btnscroll.fadeIn('fast');
        else 
            btnscroll.fadeOut('fast');
    }
    
    let initPage = () => {
        let now = $(window).scrollTop();
        if (now==0) 
            btnscroll.hide();
    }

    // Varliable default
    let btnscroll = $('#scrollup');
    let btntool_add = $('#add_tool');
    let bodytool = $('#tool table tbody');
    let btntool_del = $('#tool table tbody button.del_tool');

    // Event
    initPage();
    btntool_add.click((event) => { addtr_tool(); });
    bodytool.on('click', '.del_tool', function () {
        deltr_tool(this);
    });
    // bodytool.on('click', '.del_tool', (event) => {  });
    btnscroll.click((event) => { scrollto("body"); });
    $(window).scroll((event) => { autohideBtnUp(); });






    // $('#add_tool').click(function() {
    //     let html = '<tr>';
    //     html += '   <td><input type="text" name="tool[code][]" class="form-control" /></td>';
    //     html += '   <td><input type="text" name="tool[name][]" class="form-control" /></td>';
    //     html += '   <td><input type="text" name="tool[section][]" class="form-control" /></td>';
    //     html += '   <td><button type="button" class="del_tool btn btn-sm btn-danger">Del</button></td>';
    //     html += '</tr>';
    //     $('#tool table tbody').append(html);
    // });
    // $('#tool table tbody').on('click', '.del_tool', function() {
    //     $(this).parent('td').parent('tr').remove();
    // });

    
    $('.select2multi').select2({
        tags: true,
        tokenSeparators: [',', ' ']
    })
});
</script>