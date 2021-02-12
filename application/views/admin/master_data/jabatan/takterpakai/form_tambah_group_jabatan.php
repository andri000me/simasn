<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view('include/metadata'); ?>

  <link href="<?= base_url(); ?>assets/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
  <link href="<?= base_url(); ?>assets/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="<?= base_url(); ?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url(); ?>assets/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="<?= base_url(); ?>pages/css/pages-icons.css" rel="stylesheet" type="text/css">
  <link class="main-stylesheet" href="<?= base_url(); ?>assets/pages/css/themes/modern.css" rel="stylesheet" type="text/css" />
</head>

<body class="fixed-header horizontal-menu horizontal-app-menu ">
  <!-- START PAGE-CONTAINER -->
  <?php $this->load->view('include/header'); ?>
  <div class="page-container ">
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper ">
      <!-- START PAGE CONTENT -->
      <div class="content ">
        <?php $this->load->view('include/breadcrumb'); ?>

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
            <a type="button" href="<?= base_url().'master_data/'.$uri2.'/'.$uri3 ?>" class="btn btn-info float-left text-white"><i class="fa fa-arrow-left"></i> Daftar <?= ucwords(str_replace('_',' ',$uri3)) ?></a>
            <br><hr>
            <?= form_open('master_data/aksi_group_jabatan/tamba_'.$uri3);?>

              <div class="form-group row">
                <label for="fname" class="col-md-3 control-label">Nama <?= ucwords(str_replace('_',' ',$uri3)) ?></label>
                <div class="col-md-6">
                  <div class="input-group">
                    <!-- <span class="input-group-addon danger">
                      <i class="fa fa-download"></i>
                    </span> -->
                    <input type="text" name="nma_<?= $uri3 ?>" placeholder="Nama <?= ucwords(str_replace('_',' ',$uri3)) ?>" class="form-control" required>
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
  <?php $this->load->view('include/footer'); ?>
  <!-- END COPYRIGHT -->
  </div>
  <!-- END PAGE CONTENT WRAPPER -->
  </div>
  <!-- END PAGE CONTAINER -->

  <!-- BEGIN VENDOR JS -->
  <!-- <script src="<?= base_url(); ?>assets/assets/plugins/pace/pace.min.js" type="text/javascript"></script> -->
  <script src="<?= base_url(); ?>assets/assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/assets/plugins/modernizr.custom.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/assets/plugins/tether/js/tether.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
  <script src="<?= base_url(); ?>assets/assets/plugins/jquery-actual/jquery.actual.min.js"></script>
  <script src="<?= base_url(); ?>assets/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
  <!-- END VENDOR JS -->
  <!-- BEGIN CORE TEMPLATE JS -->
  <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
  <!-- END CORE TEMPLATE JS -->
  <!-- BEGIN PAGE LEVEL JS -->
  <script src="<?= base_url(); ?>assets/assets/js/scripts.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS -->
</body>

</html>