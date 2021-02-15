<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('asn/include/metadata'); ?>
        <script type="text/javascript">
            window.onload = function()
            {
            // fix for windows 8
            if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
            document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
        }
        </script>
        <link href="<?= base_url(); ?>assets/asn/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/asn/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/asn/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/asn/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?= base_url(); ?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url(); ?>assets/asn/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
        <link class="main-stylesheet" href="<?= base_url(); ?>assets/pages/css/themes/modern.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="fixed-header ">
        <div class="login-wrapper ">
            <!-- START Login Background Pic Wrapper-->
            <div class="bg-pic">
                <!-- START Background Pic-->
                <img src="<?= base_url()?>assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg" data-src="<?= base_url()?>assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg" data-src-retina="<?= base_url()?>assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg" alt="" class="lazy">
                <!-- END Background Pic-->
                <!-- START Background Caption-->
                <!-- <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
                <h2 class="semi-bold text-white">
                Pages make it easy to enjoy what matters the most in the life</h2>
                <p class="small">
                    images Displayed are solely for representation purposes only, All work copyright of respective owner, otherwise © 2013-2014 REVOX.
                </p>
                </div> -->
                <!-- END Background Caption-->
            </div>
            <!-- END Login Background Pic Wrapper-->
            <!-- START Login Right Container-->
            <div class="login-container bg-white">
                <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-30 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
                    <center>
                        <img width="70%" src="<?= base_url()?>assets/img/logo_log_maros.png" alt="logo" data-src="<?= base_url()?>assets/img/logo_log_maros.png" data-src-retina="<?= base_url()?>assets/img/logo_log_maros.png" width="200">
                    </center>
                    <!-- <p class="p-t-35">Sign into your wanua account</p> -->
                    <!-- START Login Form -->
                    <form id="form-login" action="<?= base_url().'login' ?>" class="p-t-50" role="form" action="index.html">
                        <!-- START Form Control-->
                        <?php echo $this->session->flashdata('alert');?>
                        <br>
                        <div class="form-group form-group-default">
                            <label>Username</label>
                            <div class="controls">
                                <input type="text" name="username" placeholder="Userame" class="form-control" onchange="cekusername(this.value)" autocomplete="off" autofocus>
                                <small class="text-danger" id="warning_username"></small>
                            </div>
                        </div>
                        <!-- END Form Control-->
                        <!-- START Form Control-->
                        <div class="form-group form-group-default">
                            <label>Password</label>
                            <div class="controls">
                                <input id="pass" type="password" class="form-control" name="password" placeholder="Password" disabled="disabled" onchange="getpassword(this.value)" required>
                                <small class="text-danger" id="warning_password"></small>
                            </div>
                        </div>
                        <!-- START Form Control-->
                        <div class="row">
                            <div class="col-md-6 no-padding sm-p-l-10">
                                <div class="checkbox ">
                                    <input type="checkbox" value="1" id="checkbox1">
                                    <label for="checkbox1">Ingat Saya</label>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex align-items-center justify-content-end m-b-10">
                                <a href="<?= base_url().'send_email/permohonan_password_baru'; ?>" class="text-info small">Lupa Password</a>
                            </div>
                        </div>
                        <!-- END Form Control-->
                        <a href="<?= base_url().'dashboard';?>" class="btn btn-block btn-primary" type="button">
                            <span class="pull-left"><i class="fa fa-user"></i></span>
                            <span class="bold">Sign In</span>
                        </a>

                        <!-- <button class="btn btn-block btn-complete active" type="button">
                        <span class="pull-left"><i class="fa fa-facebook"></i></span>
                        <span class="bold">Login with Facebook</span>
                        </button>
                        <button class="btn btn-block btn-danger" type="button">
                        <span class="pull-left"><i class="fa fa-google-plus"></i></span>
                        <span class="bold">Login with Google+</span>
                        </button> -->
                        <!-- <center><label class="m-t-10">Klik tombol daftar jika belum terdaftar</label></center>
                        <a href="<?= base_url()?>daftar" class="btn btn-block btn-primary" type="button">
                        <span class="pull-left"><i class="fa fa-user"></i></span>
                        <span class="bold">Daftar</span>
                        </a> -->
                        <div class="row">
                            <!-- <div class="col-md-6 no-padding sm-p-l-10"> -->
                            <div class="col-md-6 m-t-5 m-b-15 sm-p-l-10">
                                <label for="checkbox1">by Suryaproject</label>
                            </div>
                        </div>
                    </form>
                    <!--END Login Form-->
                    <!-- <div class="pull-bottom sm-pull-bottom">
                        <div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20">
                            <div class="col-sm-3 col-md-2 no-padding">
                            <img alt="" class="m-t-5" data-src="<?= base_url()?>assets/img/d memo/pages_icon.png" data-src-retina="<?= base_url()?>assets/img/demo/pages_icon_2x.png" height="60" src="<?= base_url()?>assets/img/demo/pages_icon.png" width="60"> 
                            </div>
                            <div class="col-sm-9 no-padding m-t-10">
                            <p>
                                <small>
                                by <a href="#" class="text-info">suryaproject</a> <a href="#" class="text-info"></a>
                            </small>
                            </p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- END Login Right Container-->
        </div>
        <!-- START OVERLAY -->
        <!-- END OVERLAY -->
        <!-- BEGIN VENDOR JS -->
        <!-- <script src="<?= base_url(); ?>assets/asn/plugins/pace/pace.min.js" type="text/javascript"></script> -->
        <script src="<?= base_url(); ?>assets/asn/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/asn/plugins/modernizr.custom.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/asn/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/asn/plugins/tether/js/tether.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/asn/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/asn/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/asn/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>assets/asn/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?= base_url(); ?>assets/asn/plugins/select2/js/select2.full.min.js"></script>
        <script src="<?= base_url(); ?>assets/asn/plugins/jquery-actual/jquery.actual.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/bootstrap-typehead/typeahead.bundle.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugins/bootstrap-typehead/typeahead.jquery.min.js"></script>
        <script src="<?= base_url(); ?>assets/asn/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
        <!-- END VENDOR JS -->
        <!-- BEGIN CORE TEMPLATE JS -->
        <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
        <!-- END CORE TEMPLATE JS -->
        <script>
            $(function()
            {
                $('#form-login').validate()
            })
        </script>
        <script type="text/javascript">
            function cekusername(user) {
                $.ajax({
                    url: "<?php echo base_url();?>login/cek_username",
                    method: "POST",
                    data: {username: user},
                    dataType: 'json',
                    success : function(data){
                        var i;
                        for(i=0; i<data.length; i++){
                            if(data[i].username > 0){
                                $('#warning_username').html('');
                                $('#pass').removeAttr("disabled");
                            }else{
                                $('#warning_username').html('This username not found!');
                            }
                        }
                    }
                });
            }

            function getpassword(pass){
                $.ajax({
                    url: "<?php echo base_url();?>login/cek_password",
                    method: "POST",
                    data: {password: pass},
                    dataType: 'json',
                    success : function(login){
                        if(login == 1){
                            window.location.href = "<?php echo base_url();?>dashboard";
                        }else{
                            $('#warning_password').html('Wrong password bro!');
                        }
                    }
                });
            }
        </script>
    </body>
</html>