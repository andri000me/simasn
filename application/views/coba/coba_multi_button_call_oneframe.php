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
                        <div id="menu" class="clb fll">
                            <strong>Videos</strong>
                            <p>
                                <a href="?video=mVLdOBijoco" title="This is the first lecture of the series ...">
                                <span> <img src="http://i.ytimg.com/vi/mVLdOBijoco/1.jpg" width="100px" alt="#" /> </span>
                                Welcome
                                </a>
                            </p>
                            <p>
                                <a href="?video=Pl23L-wsCXk" title="Topics: Stack. Heap ...">
                                <span> <img src="http://i.ytimg.com/vi/Pl23L-wsCXk/1.jpg" width="100px" alt="#" /> </span>
                                Introduction
                                </a>
                            </p>
                            <div class="col-lg-4">
                                                        <div class="form-group form-group-default ">
                                                            <label>File BPJS <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                            <p><i><?= !empty($idpt['file_bpjs']) && file_exists('assets/asn/dokumen/'.$idpt['file_bpjs']) ? $idpt['file_bpjs'] : (!empty($idp['file_bpjs']) && file_exists('assets/asn/dokumen/'.$idp['file_bpjs']) ? $idp['file_bpjs'] : 'Belum ada File BPJS') ?></i></p>
                                                            <input type="file" class="form-control-file" name="filebpjs">
                                                        </div>
                                                    </div>
                        </div>

                        <div id="video" class="fll bgs bdr"></div>
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
    <script>
        var hw = 640,
            hh = hw * 480 / 640,
            videoDiv = document.getElementById("video"),
            videoLinks = document.querySelectorAll("a[href^='?video'"),
            len = videoLinks.length,
            vStr,
            i;

        function getVideo(video){
            hw = videoDiv.offsetWidth;
            hh = hw * 480 / 640;

            vStr = '<iframe width="' + hw +'" height="' +hh+ '" ';
            vStr += ' src="https://youtube.com/embed/';
            vStr +=  video +'" frameborder="0" allowfullscreen>';
            vStr += '</iframe>';
            videoDiv.innerHTML = vStr;
        }

        function makeClickHandler() {
            return function(e){
                e.preventDefault();
                var videoIdentifier = this.getAttribute("href").replace(/^\?video=/, "");
                getVideo(videoIdentifier);
            };
        }

        for(i=0; i<len; i++) {
            videoLinks[i].addEventListener("click", makeClickHandler());
        }

    </script>
    
</body>
</html>
