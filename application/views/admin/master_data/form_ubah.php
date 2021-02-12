<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view('admin/include/metadata'); ?>

  <link href="<?= base_url(); ?>assets/admin/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/admin/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/admin/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="<?= base_url(); ?>assets/admin/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="<?= base_url(); ?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
  <link class="main-stylesheet" href="<?= base_url(); ?>assets/pages/css/themes/modern.css" rel="stylesheet" type="text/css" />
</head>

<body class="fixed-header horizontal-menu horizontal-app-menu ">
  <!-- START PAGE-CONTAINER -->
  <?php $this->load->view('admin/include/header'); ?>
  <div class="page-container ">
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper ">
      <!-- START PAGE CONTENT -->
      <div class="content ">
        <?php $this->load->view('admin/include/breadcrumb'); ?>

        <!-- START JUMBOTRON -->
        <div class="jumbotron">
          <div class=" container p-l-0 p-r-0   container-fixed-lg sm-p-l-0 sm-p-r-0">
            <div class="inner">
              <!-- START BREADCRUMB -->
            </div>
          </div>
        </div>
        <!-- END JUMBOTRON -->
        <!-- START CONTAINER FLUID -->
        <div class=" container    container-fixed-lg">
          <!-- BEGIN PlACE PAGE CONTENT HERE -->


          <div class="col-md-12">
            <?php echo $this->session->flashdata('alert');?>
            <a type="button" href="<?= base_url().'admin/master_data/'.$uri3 ?>" class="btn btn-info float-left text-white"><i class="fa fa-arrow-left"></i> Daftar <?= ucwords(str_replace('_',' ',$uri3)) ?></a>
            <br><hr>
            <?= form_open('admin/master_data/aksi_'.$uri3.'/ubah_'.$uri3.'/'.$id);?>
              <div class="form-group row">
                <label for="fname" class="col-md-3 control-label">Nama <?= ucwords(str_replace('_',' ',$uri3)) ?></label>
                <div class="col-md-6">
                  <div class="input-group">
                    <!-- <span class="input-group-addon danger">
                      <i class="fa fa-download"></i>
                    </span> -->
                    <input type="text" name="nma_<?= $uri3 ?>" class="form-control" value="<?php if($url==$uri3){echo $master;} ?>">
                  </div>
                </div>
              </div>
              <br>
              <button type="submit" class="btn btn-succes">Simpan</button>
              <button type="reset" class="btn btn-danger">Batal</button>
              
            <?= form_close(); ?>
          </div>



        </div>

      </div>
    </div>
  </div>

  </div> <!-- END PLACE PAGE CONTENT HERE -->
  </div>
  <!-- END CONTAINER FLUID -->
  </div>
  <!-- END PAGE CONTENT -->
  <!-- START COPYRIGHT -->
  <!-- START CONTAINER FLUID -->
  <!-- START CONTAINER FLUID -->
  <?php $this->load->view('admin/include/footer'); ?>
  <!-- END COPYRIGHT -->
  </div>
  <!-- END PAGE CONTENT WRAPPER -->
  </div>
  <!-- END PAGE CONTAINER -->

  <!-- BEGIN VENDOR JS -->
  <!-- <script src="<?= base_url(); ?>assets/admin/plugins/pace/pace.min.js" type="text/javascript"></script> -->
  <script src="<?= base_url(); ?>assets/admin/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/admin/plugins/modernizr.custom.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/admin/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/admin/plugins/tether/js/tether.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/admin/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/admin/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/admin/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/admin/plugins/jquery-actual/jquery.actual.min.js"></script>
  <script src="<?= base_url(); ?>assets/admin/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
  <!-- END VENDOR JS -->
  <!-- BEGIN CORE TEMPLATE JS -->
  <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
  <!-- END CORE TEMPLATE JS -->
  <!-- BEGIN PAGE LEVEL JS -->
  <script src="<?= base_url(); ?>assets/admin/js/scripts.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS -->
</body>

</html>