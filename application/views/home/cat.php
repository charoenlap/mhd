<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="col-sm-12 col-md-9 col-lg-10">
  <div id="content" class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-md-9">
                <img src="<?php echo base_url();?>assets/img/headerblack.png" class="img-fluid my-4 px-4" />
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-8 col-lg-8">
        <div class="card mx-3">
            <div class="card-body">
                <h4><?php echo $result->name; ?></h4>
                <?php if ($result->detail != "") {
                    echo $result->detail . "<br>";
                } ?>
                <?php if ($result->picture1 != "") : ?>
                    ดาวน์โหลดไฟล์ : <a href="<?php echo base_url() . 'upload/content/' . $result->picture1; ?>" target="new" class="text-decoration-none">คลิ๊ก</a>
                <?php endif; ?>

                <ul>
                <?php foreach ($contents as $content) : ?>
                <li><a href="<?php echo base_url('home/content/'.$content->id);?>"><?php echo $content->name;?></a></li>
                <?php endforeach; ?>
                </ul>

                <!-- view/home/content.php Content here -->
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4" style="padding:15px 15px;">
        <ul class="list-group" style="margin-right:15px;margin-left:15px;">
        <?php foreach ($sub_menu as $menu) : ?>
        <li class="list-group-item bg-blue">
            <a href="<?php echo $menu->link;?>" class="text-write"><i class="fas fa-arrow-right"></i> <?php echo $menu->name;?></a>
        </li>
        <?php endforeach;?>
        </ul>
    </div>
</div>