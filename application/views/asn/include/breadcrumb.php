<?php
  $uri1 = $this->uri->segment(1);
  $uri2 = $this->uri->segment(2);
  $uri3 = $this->uri->segment(3);
?>
          <div class="jumbotron" data-pages="parallax">
            <div class=" container-fluid w-100  container-fixed-lg sm-p-l-0 sm-p-r-0">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">SIMPEG</a></li>
                  <li class="breadcrumb-item active"><?= str_replace("_", " ",$uri1);?></li>
                  <?php if (isset($uri2)) { ?>
                    <li class="breadcrumb-item active"><?= str_replace("_", " ",$uri2);?></li>
                  <?php }?>
                  <?php if (isset($uri3)) { ?>
                    <li class="breadcrumb-item active"><?= str_replace("_", " ",$uri3);?></li>
                  <?php }?>
                </ol>
                <!-- END BREADCRUMB -->
              </div>
            </div>
          </div>