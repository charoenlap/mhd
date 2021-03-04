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
                <?php echo $result->name; ?><br><br>
                <?php if ($result->detail != "") {
                    echo $result->detail . "<br>";
                } ?>
                <?php if ($result->picture1 != "") : ?>
                    ดาวน์โหลดไฟล์ : <a href="<?php echo base_url() . 'upload/content/' . $result->picture1; ?>" target="new" alt="download" class="text-decoration-none">คลิ๊ก</a>
                <?php endif; ?>
                <!-- view/home/content.php Content here -->
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4 ">
        <div class="card">
        <div class="card-body">
        <ul>
        <?php foreach ($sub_menu as $menu) : ?>
        <li>
        <a href="<?php echo $menu->link;?>"><?php echo $menu->name;?></a>
        </li>
        <?php endforeach;?>
        </ul>
        </div>
        </div>
    </div>
</div>