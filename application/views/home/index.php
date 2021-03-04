<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<div class="col-sm-12 col-md-9 col-lg-10">
  <section id="content">
    <div class="row">
      <div class="col-12">
        <div class="row"><div class="col-9"><img src="<?php echo base_url();?>assets/img/header.png" class="img-fluid mt-4" alt="logo"></div></div>
      </div>

      <div class="col-sm-12 col-md-9">
        <img src="<?php echo base_url();?>upload/content/<?php echo $banner;?>" class="img-fluid" />
      </div>



      <div class="col-sm-12 col-md-3">
        <ul id="rightside" class="list-unstyled">
          <?php foreach ($right_side as $menu) : ?>
          <li>
            <a href="<?php echo $menu->link;?>">
            <div class="media">
              <div class="media-body d-inline-bloc k">
                <img class="mr-3" src="assets/img/logo-box.png" alt="imgbox">
                <?php echo $menu->name;?>
              </div>
            </div>
            </a>
          </li>
          <?php endforeach; ?>


        </ul>
      </div>


    </div>
  </section>
</div>

      