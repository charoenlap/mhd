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
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">ชื่อโปรแกรม</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" value="<?php echo $list->name;?>" required autofocus="on" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">ตัวย่อ</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="code" class="form-control" value="<?php echo $list->code;?>" required />
                                        <small>ใช้สำหรับจับชื่อไฟล์ที่อัพโหลด (ตัวพิมพ์ใหญ่)</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">ราคา</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="price" class="form-control" value="<?php echo (int)$list->price;?>" required />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10 offset-sm-2">
                                        <input type="submit" class="btn btn-primary" value="บันทึก" />
                                        <button type="button" class="btn btn-default" onclick="window.history.back(1);">กลับ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php /*
                        <div class="row">
                            <div class="col-5">
                                <div class="card">
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="">ชื่อตัวเลือก (name)</label>
                                                        <input type="text" id="op_name" class="form-control" placeholder="ชื่อตัวเลือก">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="">เพิ่มค่า</label>
                                                    <table class="table table-bordered" id="options">
                                                        <thead>
                                                            <tr>
                                                                <th width="25%">ค่า (value)</th>
                                                                <th>ตัวเลือก (text)</th>
                                                                <th>ค่าตั้งต้น</th>
                                                                <th><button type="button" id="option_add" class="btn btn-success btn-sm">เพิ่ม</button></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input type="text" class="inputvalue form-control form-control-sm" /></td>
                                                                <td><input type="text" class="inputtext form-control form-control-sm" placeholder="ชื่อ" /></td>
                                                                <td>
                                                                    <select id="" class="inputselected form-control form-control-sm">
                                                                        <option value="0">ไม่</option>
                                                                        <option value="1">ใช่</option>
                                                                    </select>
                                                                </td>
                                                                <td><button type="button" class="option_del btn btn-danger btn-sm">ลบ</button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-12">
                                                    <button type="button" id="new_option" class="btn btn-success">เพิ่มตัวเลือก</button>
                                                    <small class="text-danger">เมื่อจัดการเสร็จแล้วต้องบันทึกด้านบนอีกครั้ง</small>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="card">
                                    <div class="card-body">
                                        <input type="hidden" name="structure" id="allvalue" value='<?php echo $result->structure;?>' />
                        <table class="table table-bordered" id="data_option">
                            <thead>
                                <tr>
                                    <td width="30%">ตัวเลือก</td>
                                    <td>ค่า</td>
                                    <td width="10%">ลบ</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                                if (count($json = json_decode($result->structure, true))>0) {
                                                    foreach ($json as $value) {
                                                        $option = array(); $more5 = false; $optionall = array();
                                                        foreach ($value['option'] as $k => $op) { if ($k<=5) { $option[] = $op['name']; } else { $more5 = true; } $optionall[] = $op; }
                                                        $option = implode(', ', $option) . ($more5 ? '... <a href="#" data-toggle="modal" data-target="#modaloptions" data-title="'.$value['name'].'" data-options=\''.json_encode($optionall).'\'>ดูทั้งหมด</a>' : '');
                                                ?>
                                <tr>
                                    <td><?php echo $value['name'];?></td>
                                    <td><?php echo $option;?></td>
                                    <td><button type="button" class="data_del btn btn-danger btn-sm">ลบ</button></td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
</div>
*/?>


</form>
</div>
</div>
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="modaloptions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaloptionslabel">แสดงตัวเลือกทั้งหมด</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ค่า</th>
                            <th>ตัวเลือก</th>
                            <th>ค่าตั้งต้น</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {

    $('#modaloptions').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var title = button.data('title');
        var options = button.data('options');

        var modal = $(this)

        var html = '';
        $.each(options, function(index, value) {
            html += '<tr>';
            html += '<td>' + value.value + '</td>';
            html += '<td>' + value.name + '</td>';
            html += '<td>' + value.selected + '</td>';
            html += '<td><button type="button" class="removeOption btn btn-danger btn-sm" data-index="' + index + '">ลบ</button></td>';
            html += '</tr>';
        });

        modal.find('table tbody').html(html);
        modal.find('#modaloptionslabel').html('แสดงตัวเลือกทั้งหมดของ ' + title);
    });

    $('#modaloptions').on('click', '.removeOption', function() {
        var index = $(this).data('index');
        getJsonToTable(null, index);
        $('#modaloptions').modal('hide');
    });

    $('#new_option').click(function() {
        var old = jQuery.parseJSON($('#allvalue').val());
        var newobj = new Object();
        newobj.name = $('#op_name').val();
        newobj.option = new Array();

        $('#options tbody').children('tr').each(function(index, ele) {
            var optionvalue = new Object();
            optionvalue.value = $(this).children('td').children('.inputvalue').val();
            optionvalue.name = $(this).children('td').children('.inputtext').val();
            optionvalue.selected = $(this).children('td').children('.inputselected').val();
            newobj.option.push(optionvalue);
        });

        old.push(newobj);
        $('#allvalue').val(JSON.stringify(old));
        getJsonToTable();
    });

    $('#data_option').on('click', '.data_del', function() {
        var old = jQuery.parseJSON($('#allvalue').val());
        var thisindex = $(this).parent('td').parent('tr').index(); // ? Find Index of TR Table#data_option
        $('#data_option tbody tr:eq(' + thisindex + ')').remove(); // ? Remove TR
        getJsonToTable(thisindex); // ? Send index to remove in array
    });

    function getJsonToTable(popindex = null, optionindex = null) {
        var old = jQuery.parseJSON($('#allvalue').val());
        var data_option = ''; // ? html tr td
        var newarray = new Array(); // ? if has popindex, this return new array.
        $.each(old, function(index, value) {
            if (popindex == null || popindex != index) { // ? Check index for remove
                var newobj = new Object();
                newobj.name = value.name; // ? set name in json
                newobj.option = new Array(); // ? set all option in json

                // ? for show <tr> option1, option2 </tr>
                var optionshow = new Array();
                var newoption = new Array();
                var optionmore = false;
                $.each(value.option, function(i, v) {
                    if (i <= 5) {
                        optionshow.push(v.name);
                    } else {
                        optionmore = true;
                    }
                    if (optionindex == null || optionindex != i) {
                        newoption.push(v);
                    }
                });
                newobj.option = newoption;

                optionshow = optionshow.join(', ');
                data_option += '<tr>';
                data_option += '<td>' + value.name + '</td>';
                data_option += '<td>' + optionshow + (optionmore ? '... <a href="#" data-toggle="modal" data-target="#modaloptions" data-title="' + value.name + '" data-options=\'' + JSON.stringify(newoption) + '\'>ดูทั้งหมด</a>' : '') + '</td>';
                data_option += '<td><button type="button" class="data_del btn btn-danger btn-sm">ลบ</button></td>';
                data_option += '</tr>';

                newarray.push(newobj);
            }
        });
        console.log(newarray);
        // $('#allvalue').val(JSON.stringify(newarray));
        $('#data_option tbody').html(data_option);
        initInput();
    }

    function initInput() {
        $('#options tbody').html('');
        $('#option_add').trigger('click');
        $('#op_name').val('').focus();
    }


    $('#option_add').click(function() {

        var html = '<tr>' +
            '    <td><input type="text" class="inputvalue form-control form-control-sm" /></td>' +
            '    <td><input type="text" class="inputtext form-control form-control-sm" placeholder="ชื่อ" /></td>' +
            '    <td>' +
            '        <select class="inputselected form-control form-control-sm">' +
            '            <option value="0">ไม่</option>' +
            '            <option value="1">ใช่</option>' +
            '        </select>' +
            '    </td>' +
            '    <td><button type="button" class="option_del btn btn-danger btn-sm">ลบ</button></td>' +
            '</tr>';


        $('#options tbody').append(html);
        $('#options tbody tr:last-child td:eq(0) input').focus();
    });

    $('#options').on('change', '[name="selected[]"]', function() {
        if ($(this).val() == 1) {
            $('#options [name="selected[]"]').val(0);
            $(this).val(1);
        }
    });

    $('#options').on('click', '.option_del', function() {
        $(this).parents('tr').remove();
    });
});
</script>