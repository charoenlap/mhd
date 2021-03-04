<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?php echo $heading_title;?></h1>

    <div class="row">
        <div class="col-sm-12">
            <?php if (!empty($success)): ?> 
            <div class="alert alert-success" role="alert"><?php echo $success;?></div>
            <?php endif; ?>
            <?php if (!empty($error)): ?> 
            <div class="alert alert-danger" role="alert"><?php echo $error;?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
                <div class="row">
                    <div class="container-fluid">
                        <!-- <div class="text-right">
                            <a href="<?php echo $action; ?>" class="btn btn-primary">ดูกราฟ</a>
                        </div> -->
                        <table class="table table-hover">
                           <thead>
                               <tr>
                                    <th style="border: 0px;"><?php echo $heading_title;?></th>
                               </tr>
                           </thead>
                           <tbody>
                                <?php if (count($trial)>0) : ?>
                                <?php foreach ($trial as $key => $value) : ?>
                                    <tr>
                                        <td>
                                        <?php echo $value->name; ?>
                                        </td>
                                        <td class="text-right">
                                            <!-- <a href="#" class="btn btn-success">ผลการประเมิน</a> -->
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-<?php echo count($value->files)>0?'primary':'secondary';?>" data-toggle="modal" data-target="#pdf<?php echo $key;?>">
                                            ผลการประเมิน (<?php echo count($value->files);?>)
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="pdf<?php echo $key;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">ดาวน์โหลดไฟล์</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <?php foreach ($value->files as $file) :?>
                                                    <p class="mb-1"><a href="https://drive.google.com/file/d/<?php echo $file->google_id;?>/view" target="new"><?php echo $file->google_name;?></a></p>
                                                    <?php endforeach; ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php endif;?>
                             
                           </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>