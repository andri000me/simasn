<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <?php $this->load->view('include/head');?>
    
    <!-- Plugins -->
    <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/global/vendor/animsition/animsition.css"> -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/global/vendor/asscrollable/asScrollable.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/global/vendor/switchery/switchery.css"> -->
    <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/global/vendor/intro-js/introjs.css"> -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/global/vendor/slidepanel/slidePanel.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/global/vendor/flag-icon-css/flag-icon.css"> -->
        <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/examples/css/dashboard/v1.css"> -->
        <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/examples/css/pages/profile.css"> -->
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/global/fonts/font-awesome/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/global/fonts/material-design/material-design.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/global/fonts/weather-icons/weather-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    
    <style type="text/css">

        .dashboard .card{
            height: calc(300px);
        }

        .col-form-label-sm{
            padding-top: .229rem;
            padding-bottom: .229rem;
            font-size: .844rem;
        }

        .form-control-sm, .input-group-sm > .form-control, .input-group-sm > .input-group-addon, .input-group-sm > .input-group-btn > .btn{
            height: 27px;}

      
    </style>
    <!-- Scripts -->
    <script src="<?php echo base_url();?>assets/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body>

    <?php $this->load->view('include/navbar');?>
    <?php $this->load->view('include/menu');?>

    <!-- Page -->
    <div class="page">
        <div style="padding: 10px 15px 0px;" class="page-header">
            <h1 style="font-size: 20px;" class="page-title"><?php echo ucwords(str_replace('_', ' ', $this->uri->segment(2)));?></h1>
            <ol style="font-size: .95rem;" class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url();?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo ucwords(str_replace('_', ' ', $this->uri->segment(1)));?></a></li>
                <li class="breadcrumb-item active"><?php echo ucwords(str_replace('_', ' ', $this->uri->segment(2)));?></li>
            </ol>
            <div class="page-header-actions">
                <a class="btn btn-sm btn-default btn-outline btn-round" href="javascript:void(0)">
                    <i class="icon wb-book"></i>
                    <span class="hidden-sm-down">Profil Desa</span>
                </a>
                <a class="btn btn-sm btn-default btn-outline btn-round" href="<?php echo $identitas_desa->website;?>"target="_blank">
                    <i class="icon wb-link"></i>
                    <span class="hidden-sm-down">Official Website</span>
                </a>
            </div>
        </div>
        <?php echo $this->session->flashdata('alert');?>
        <div style="padding: 10px 15px 10px;" class="page-content container-fluid">
            <div class="row">
                <!-- container --> 
                <section class="showcase">
                    <div class="container">
                        <div class="pb-2 mt-4 mb-2 border-bottom">
                            <h2>Import Data to Excel and CSV file using PhpSpreadsheet library in CodeIgniter and MySQL</h2>
                        </div>
                  
                        <?php if(form_error('fileURL')) {?>    
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php print form_error('fileURL'); ?>
                            </div>       
                        <?php } ?>
                        <div class="row padall border-bottom">  
                            <div class="col-lg-12">
                                <div class="float-right">  
                                    <a href="<?php print site_url();?>assets/uploads/sample-xlsx.xlsx" class="btn btn-info btn-sm"><i class="fa fa-file-excel"></i> Sample .XLSX</a>
                                    <a href="<?php print site_url();?>assets/uploads/sample-xls.xls" class="btn btn-info btn-sm"><i class="fa fa-file-excel"></i> Sample .XLS</a>
                                    <a href="<?php print site_url();?>assets/uploads/sample-csv.csv" class="btn btn-info btn-sm" target="_blank" ><i class="fa fa-file-csv"></i> Sample .CSV</a>
                                </div> 
                            </div>
                        </div>
                  
                        <form action="<?php print site_url();?>coba/upload" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <div class="row padall">
                                <div class="col-lg-6 order-lg-1">  
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="fileURL">
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                </div>
                                <div class="col-lg-6 order-lg-2">
                                    <button type="submit" name="import" class="float-right btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- End Page -->


    <!-- Footer -->
    <?php $this->load->view('include/footer') ;?>
    <!-- Core  -->
    <script src="<?php echo base_url();?>assets/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="<?php echo base_url();?>assets/global/vendor/jquery/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/global/vendor/popper-js/umd/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/global/vendor/bootstrap/bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/global/vendor/animsition/animsition.js"></script>
    <script src="<?php echo base_url();?>assets/global/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="<?php echo base_url();?>assets/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="<?php echo base_url();?>assets/global/vendor/asscrollable/jquery-asScrollable.js"></script>
    <script src="<?php echo base_url();?>assets/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
    
    <!-- Plugins -->
    <script src="<?php echo base_url();?>assets/global/vendor/switchery/switchery.js"></script>
    <script src="<?php echo base_url();?>assets/global/vendor/intro-js/intro.js"></script>
    <script src="<?php echo base_url();?>assets/global/vendor/screenfull/screenfull.js"></script>
    <script src="<?php echo base_url();?>assets/global/vendor/slidepanel/jquery-slidePanel.js"></script>
        <script src="<?php echo base_url();?>assets/global/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    
    <!-- Scripts -->
    <script src="<?php echo base_url();?>assets/global/js/Component.js"></script>
    <script src="<?php echo base_url();?>assets/global/js/Plugin.js"></script>
    <script src="<?php echo base_url();?>assets/global/js/Base.js"></script>
    <script src="<?php echo base_url();?>assets/global/js/Config.js"></script>
    
    <script src="<?php echo base_url();?>assets/js/Section/Menubar.js"></script>
    <script src="<?php echo base_url();?>assets/js/Section/GridMenu.js"></script>
    <script src="<?php echo base_url();?>assets/js/Section/Sidebar.js"></script>
    <script src="<?php echo base_url();?>assets/js/Section/PageAside.js"></script>
    <script src="<?php echo base_url();?>assets/js/Plugin/menu.js"></script>
    
    <script src="<?php echo base_url();?>assets/global/js/config/colors.js"></script>
    <script src="<?php echo base_url();?>assets/js/config/tour.js"></script>
    <script>Config.set('assets', '../assets');</script>
    
    <!-- Page -->
    <script src="<?php echo base_url();?>assets/js/Site.js"></script>
    <script src="<?php echo base_url();?>assets/global/js/Plugin/asscrollable.js"></script>
    <script src="<?php echo base_url();?>assets/global/js/Plugin/slidepanel.js"></script>
    <script src="<?php echo base_url();?>assets/global/js/Plugin/switchery.js"></script>
        <script src="<?php echo base_url();?>assets/examples/js/dashboard/v1.js"></script>
        <script src="<?php echo base_url();?>assets/global/js/Plugin/jquery-placeholder.js"></script>
        <script src="<?php echo base_url();?>assets/global/js/Plugin/input-group-file.js"></script>
    <script>
        (function(document, window, $){
          'use strict';
      
          var Site = window.Site;
          $(document).ready(function(){
            Site.run();
          });
        })(document, window, jQuery);
    </script>
</body>
</html>
