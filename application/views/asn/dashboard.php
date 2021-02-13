<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view('asn/include/metadata');?>

        <link href="<?= base_url();?>assets/asn/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/asn/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/asn/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/asn/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?= base_url();?>assets/asn/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?= base_url();?>assets/asn/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="<?= base_url();?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
        <link class="main-stylesheet" href="<?= base_url();?>assets/pages/css/themes/corporate.css" rel="stylesheet" type="text/css" />

        <style type="text/css">
          .table tbody tr td {
            padding: 3px 10px;
            font-size: 9pt;
            background-color: transparent;
          }
          .jumbotron.lg {
              height: 300px;
          }
        </style>
    </head>
    <body class="fixed-header">
        <!-- <body class="fixed-header menu-pin"> -->
        <!-- BEGIN SIDEBPANEL-->
        <?php $this->load->view('asn/include/nav');?>
        <!-- END SIDEBAR -->
        <!-- END SIDEBPANEL-->
        <!-- START PAGE-CONTAINER -->
        <div class="page-container ">
            <!-- START HEADER -->
            <?php $this->load->view('asn/include/header');?>
            <!-- END HEADER -->
            <!-- START PAGE CONTENT WRAPPER -->
            <div class="page-content-wrapper ">
                <!-- START PAGE CONTENT -->
                <div class="content">
                    <!-- START JUMBOTRON -->
                    <div class="jumbotron lg vertical center column-w4 vertical-bottom" data-pages="parallax">
                        <div class=" container-fluid w-100 bg-white container-fixed-lg sm-p-l-0 sm-p-r-0 full-height">
                            <div class="inner text-center p-t-10 m-t-80 full-height" style="align-content: center;">
                                <br>
                                <h4 class="m-b-10 p-t-10 inline text-complete">Selamat Datang di Sistem Informasi Manajemen Kepegawaian Kabupaten Maros</h4>
                                <div class="col-md-12 text-center">
                                   
                                <img class="m-b-20 sm-image-responsive-height" src="<?= base_url()?>assets/asn/img/demo/icons_hero.png" data-src="<?= base_url()?>assets/asn/img/demo/icons_hero.png" data-src-retina="<?= base_url()?>assets/asn/img/demo/icons_hero2x.png" alt="" width="612" height="69">
                                    
                                </div>
                                <div class="col-md-6 offset-md-3">
                                    <div class="container-xs-height">
                                        <div class="row-xs-height">
                                            <div class="social-user-profile col-xs-height text-center col-top">
                                                <div class="thumbnail-wrapper d48 circular bordered b-white" style="width: 100px; height:100px;">
                                                    <?php if(!empty($user['foto']) && file_exists('assets/asn/img/profiles/'.$user['foto'])): ?>
                                                        <img alt="Avatar" data-src-retina="<?= base_url('assets/asn/img/profiles/'.$user['foto'])?>" data-src="<?= base_url('assets/asn/img/profiles/'.$user['foto'])?>" src="<?= base_url('assets/asn/img/profiles/'.$user['foto'])?>">
                                                    <?php else:?>
                                                        <img src="<?= base_url('assets/img/users.png') ?>" alt="" data-src="<?= base_url('assets/img/users.png'); ?>" data-src-retina="<?= base_url('assets/img/users.png'); ?>" width="200px">
                                                    <?php endif;?>  
                                                </div>
                                              <br>
                                              <!-- <i class="fa fa-check-circle text-success fs-16 m-t-10"></i> -->
                                            </div>
                                            <div class="col-xs-height p-l-20 p-b-5">
                                                <h5 class="no-margin"><strong><?= (!empty($asn['gelardepan']) ? $asn['gelardepan'].' ' : '') . strtoupper($user['nama'] . (!empty($asn['gelarbelakang']) ? $asn['gelarbelakang'] : '')) ?></strong></h5>
                                                <p class="no-margin fs-16"><?= $user['nip'] > 0 ? 'NIP :  '.$user['nip'] : ''; ?></p>
                                                <p class="hint-text m-t-5 m-b-5 small"><td>
                                                    <?php    
                                                        if(!empty($asn['jenis_jabatan_id'])){
                                                            if($asn['jenis_jabatan_id']==2){
                                                                if($asn['eselon_id']==7){
                                                                    echo $asn['nm_jabatan'];
                                                                }elseif($asn['jabatan_id']==706){
                                                                    echo  $asn['nm_jabatan'].' '.$asn['nm_unitkerja'] ; 
                                                                }else{
                                                                    if($asn['subbagian_id']!=0){
                                                                        echo $asn['nm_jabatan'].' '.$asn['nm_subbidang'];
                                                                    }else{
                                                                        echo $asn['nm_jabatan'].' '.$asn['nm_bidang'];
                                                                    }
                                                                }
                                                            
                                                            }elseif($asn['jenis_jabatan_id']==1){
                                                                echo  $asn['nm_jabatan'].' '.$asn['nm_unitkerja'] ; 
                                                            }else{
                                                                if(!empty($asn['jenjang_jabatan'])){
                                                                    $asnj = explode('/',$asn['jenjang_jabatan']);
                                                                    echo !empty($asn['nm_jabatan']) ? $asn['nm_jabatan'].' '.$asnj[0] : 'Jabatan belum ada' ;
                                                                }else{
                                                                    echo !empty($asn['nm_jabatan']) ? $asn['nm_jabatan'] : 'Jabatan belum ada';
                                                                }

                                                            }
                                                        }else{
                                                            echo 'Belum ada jabatan (Pegawai Baru CPNS)';
                                                        }
                                                    ?>

                                                    | <?= !empty($asn['pangkat']) ? $asn['pangkat'] : 'Superadmin' ?> [<?= !empty($asn['golongan']) ?$asn['golongan'] : '0'  ?>]<br><?= !empty($asn['nm_unitkerja']) ? $asn['nm_unitkerja'] : 'Superadmin' ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <!-- END JUMBOTRON -->
                    <!-- START CONTAINER FLUID -->
                    <div class=" container-fluid w-100   container-fixed-lg ">
                        <!-- BEGIN PlACE PAGE CONTENT HERE -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-transparent">
                                    <div class="card-block">
                                        <?php if($this->session->userdata('level_id')!=1): ?>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="card card-default bg-complete">
                                                    <?php 
                                                        if(!empty($asn['tmt_pangkat'])):
                                                            $kpangkatthn =  date('Y', strtotime($asn['tmt_pangkat'])) + 4; 
                                                            $kpangkatbln =  date('m', strtotime($asn['tmt_pangkat'])); 

                                                            $kgbthn =  2019 + 2; 
                                                            // $kgbthn =  date('Y', strtotime($kgbm['tgl_sk'])) + 2; 
                                                            $kgbbln =  date('m', strtotime($kgbm['tgl_sk'])); 
                                                            // $tmt =  date('Y-m-d', strtotime('-'.$asn['mkg_cpns_bulan'].' month', strtotime($tmt))); 
                                                        endif;
                                                        if(!empty($asn['tmt_cpns'])):
                                                            $mkg = new DateTime($asn['tmt_cpns']);
                                                            $today = new DateTime("today");

                                                            $y = $today->diff($mkg)->y;
                                                            $m = $today->diff($mkg)->m;
                                                            $d = $today->diff($mkg)->d;
                                                        endif;


                                                    
                                                    ?>
                                                    <div class="card-header ">
                                                        <div class="card-title">Masa Kerja <i class="fa fa-chevron-right"></i></div>
                                                    </div>
                                                    <div class="card-block text-center">
                                                        <h4 class="text-white"><span class="bold"><?= !empty($asn['tmt_cpns']) ? $y : '0' ?> </span><small>Tahun</small> <span class="bold"><?=!empty($asn['tmt_cpns']) ? $m : '0' ?> </span><small>Bulan</small></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card card-default bg-success">
                                                    
                                                    <div class="card-header ">
                                                        <div class="card-title">Kenaikan Pangkat <i class="fa fa-chevron-right"></i></div>
                                                    </div>
                                                    <div class="card-block text-center">
                                                        <h4 class="text-white">Bulan <span class="bold"><?= !empty($asn['tmt_pangkat'])  ? bulan($kpangkatbln) : 0 ?> </span>Tahun <span class="bold"><?= !empty($asn['tmt_pangkat']) ? $kpangkatthn : '' ?></span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card card-default bg-warning">
                                                    <div class="card-header ">
                                                        <div class="card-title">KGB <i class="fa fa-chevron-right"></i></div>
                                                    </div>
                                                    <div class="card-block text-center">
                                                        <h4 class="text-white">Bulan <span class="bold"><?= !empty($asn['tmt_pangkat']) ? bulan($kgbbln) : 0 ?> </span>Tahun <span class="bold"><?= !empty($asn['tmt_pangkat']) ? $kgbthn  : '' ?></span></h4>
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                        <?php endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PLACE PAGE CONTENT HERE -->
                    </div>
                    <!-- END CONTAINER FLUID -->
                </div>
                <!-- END PAGE CONTENT -->
                <!-- START COPYRIGHT -->
                <!-- START CONTAINER FLUID -->
                <!-- START CONTAINER FLUID -->
                <?php $this->load->view('asn/include/footer');?>
                <!-- END COPYRIGHT -->
            </div>
            <!-- END PAGE CONTENT WRAPPER -->
        </div>
        <!-- END PAGE CONTAINER -->
        <!-- BEGIN VENDOR JS -->
        <!-- <script src="<?= base_url();?>assets/asn/plugins/pace/pace.min.js" type="text/javascript"></script> -->
        <script src="<?= base_url();?>assets/asn/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="<?= base_url();?>assets/asn/plugins/modernizr.custom.js" type="text/javascript"></script>
        <script src="<?= base_url();?>assets/asn/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?= base_url();?>assets/asn/plugins/tether/js/tether.min.js" type="text/javascript"></script>
        <script src="<?= base_url();?>assets/asn/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?= base_url();?>assets/asn/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
        <script src="<?= base_url();?>assets/asn/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
        <script src="<?= base_url();?>assets/asn/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
        <script src="<?= base_url();?>assets/asn/plugins/jquery-actual/jquery.actual.min.js"></script>
        <script src="<?= base_url();?>assets/asn/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/asn/plugins/select2/js/select2.full.min.js"></script>
        <script type="text/javascript" src="<?= base_url();?>assets/asn/plugins/classie/classie.js"></script>
        <script src="<?= base_url();?>assets/asn/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
        <!-- END VENDOR JS -->
        <!-- BEGIN CORE TEMPLATE JS -->
        <script src="<?= base_url();?>assets/pages/js/pages.min.js"></script>
        <!-- END CORE TEMPLATE JS -->
        <!-- BEGIN PAGE LEVEL JS -->
        <script src="<?= base_url();?>assets/asn/js/scripts.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL JS -->
    </body>
</html>