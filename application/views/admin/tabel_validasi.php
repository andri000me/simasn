<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('admin/include/metadata'); ?>

    <link href="<?= base_url(); ?>assets/admin/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/admin/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/admin/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link class="main-stylesheet" href="<?= base_url(); ?>assets/pages/css/themes/modern.css" rel="stylesheet" type="text/css" />
    <style>
        .table tbody tr td{
            padding: 2px 5px;
        }
        .card-group .card-header .card-title > a::after{color: #fff;}
        .card-header a:not(.btn){color: #fff !important;}
        .bg-warna-abu{background-color:#f5f6f7;}
        .label-info{background-color:#1f3953;}
        .modal .modal-dialog{width: 100%; height: 100%;}
        .modal-lg{max-width: 100%;}
        .modal.fade.fill-in.show{background-color:rgba(255, 255, 255);}
        .nav-tabs-fillup > li > a.active span{display:inline;}
        .nav-tabs-fillup > li > a span{display: inline;}
        .nav-tabs-fillup > li > a.active span.bola{display:inline;}
        .nav-tabs-fillup > li > a span.bola{display: inline;}
        .badge.bola{font-size: 6px; vertical-align: middle;}
        .bg-barumpung{background-color: rgb(232, 233, 234);}
    </style>

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
                
                
                    <div class="col-md-12 row">
                        
                        <div class="col-md-12">
                            <!-- ====================== DATA UTAMA =========================== -->
                            <div class=" col-lg container container-fixed-lg bg-white p-3">
                                <!-- BEGIN PlACE PAGE CONTENT HERE -->    
                                
                                <div class="row">
                                
                                    <div class="col-lg-12">
                                        <div class="card bg-info text-center">
                                            <center>
                                                <img class="rounded-circle mt-2" height="100px" width="100px" src="<?= base_url('assets/asn/img/profiles/'.$dpv['foto']) ?>" alt="">
                                            </center>
                                            <h6 class="text-white"><?= !empty($dpv['nip']) ? '<b>'.$dpv['nama'].' ('.$dpv['nip'].') </b>' : '' ; ?></h6>
                                        </div>
                                        
                                        <h3>
                                            Data <span class="semi-bold">Utama</span>
                                        </h3>
                                        <div class="card card-borderless">
                                            <ul class="nav nav-tabs nav-tabs-fillup" role="tablist" data-init-reponsive-tabs="dropdownfx">
                                                <li class="nav-item">
                                                    <a class="active" data-toggle="tab" role="tab" data-target="#tab2hellowWorld" href="#">
                                                        Data Pribadi &nbsp;
                                                        <?= !empty($dpt) ? '<span class="badge badge-important bola"> </span>' : '' ?>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="tab" role="tab" data-target="#tab2FollowUs">
                                                        Data Identitas
                                                        <?= !empty($idpt) ? '<span class="badge badge-important bola"> </span>' : '' ?>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="tab" role="tab" data-target="#tab2Inspire">
                                                        Data Fisik
                                                        <?= !empty($mft) ? '<span class="badge badge-important bola"> </span>' : '' ?>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="tab" role="tab" data-target="#tab2Cpns">
                                                        Data CPNS &nbsp;
                                                        <?= !empty($cpnst) ? '<span class="badge badge-important bola"> </span>' : '' ?>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="tab" role="tab" data-target="#tab2Pns">
                                                        Data PNS &nbsp;
                                                        <?= !empty($pnst) ? '<span class="badge badge-important bola"> </span>' : '' ?>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div style="background-color: #f5f6f7 !important;" class="tab-content">
                                                <!-- ====================== DATA UTAMA PRIBADI =========================== -->
                                                <div class="tab-pane active" id="tab2hellowWorld">
                                                    <div class="row column-seperation bg-default">
                                                        <?php if(!empty($dpt)): ?>
                                                        <div class="col-lg-6">
                                                            <h6>
                                                                <span class="semi-bold">Data</span> Pribadi 
                                                                <?php if($dpt['status_validasi_moddp'] ==1){ ?>
                                                                    <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                <?php }else{?>
                                                                    <span class="label label-danger"><small>Menunggu perubahan data tidak valid dari user Asn</small></span>
                                                                <?php }?>
                                                            </h6>
                                                            <table class="table table-sm table-hover table-striped w-100">
                                                                <tbody>
                                                                    <!-- <?php //foreach($dpv as $key => $value){
                                                                        //echo '<tr><td><code>'.$key.'</code></td> <td> '.$value.'</td></tr>';
                                                                    //} ?> -->
                                                                        <tr>
                                                                            <td><code>Unit Kerja</code></td> 
                                                                            <td> <?= !empty($dpt['nm_unitkerja']) ? $dpt['nm_unitkerja'] :'-' ?></td>
                                                                            <td>
                                                                                <?php if(!empty($dpt['nm_unitkerja']) && $dpt['unitkerja_id']!=$dpv['unitkerja_id']): ?>
                                                                                    <span class="label label-warning m-l-5 inline">Update</span>
                                                                                <?php else: ?>
                                                                                    <span class="label label-success m-l-5 inline">Valid</span>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><code>NIP</code></td> 
                                                                            <td> <?= !empty($dpt['nip']) ? $dpt['nip'] : '-' ?></td>
                                                                            <td>
                                                                                <?php if(!empty($dpt['nip']) && $dpt['nip']!=$dpv['nip']): ?>
                                                                                    <span class="label label-warning m-l-5 inline">Update</span>
                                                                                <?php else: ?>
                                                                                    <span class="label label-success m-l-5 inline">Valid</span>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><code>Nama</code></td> 
                                                                            <td> <?= !empty($dpt['nama']) ? $dpt['nama'] : '-' ?></td>
                                                                            <td>
                                                                                <?php if(!empty($dpt['nama']) &&$dpt['nama']!=$dpv['nama']): ?>
                                                                                    <span class="label label-warning m-l-5 inline">Update</span>
                                                                                <?php else: ?>
                                                                                    <span class="label label-success m-l-5 inline">Valid</span>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><code>Gelar Depan</code></td> 
                                                                            <td> <?= !empty($dpt['gelardepan']) ? $dpt['gelardepan'] : '-' ?></td>
                                                                            <td>
                                                                                <?php if(!empty($dpt['gelardepan']) && $dpt['gelardepan']!=$dpv['gelardepan']): ?>
                                                                                    <span class="label label-warning m-l-5 inline">Update</span>
                                                                                <?php else: ?>
                                                                                    <span class="label label-success m-l-5 inline">Valid</span>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><code>Gelar Belakang</code></td> 
                                                                            <td> <?= !empty($dpt['gelarbelakang']) ? $dpt['gelarbelakang'] : '-' ?></td>
                                                                            <td>
                                                                                <?php if(!empty($dpt['gelarbelakang']) && $dpt['gelarbelakang']!=$dpv['gelarbelakang']): ?>
                                                                                    <span class="label label-warning m-l-5 inline">Update</span>
                                                                                <?php else: ?>
                                                                                    <span class="label label-success m-l-5 inline">Valid</span>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><code>Tempat lahir</code></td> 
                                                                            <td> <?= !empty($dpt['tempatlahir']) ? $dpt['tempatlahir'] : '-' ?></td>
                                                                            <td>
                                                                                <?php if(!empty($dpt['tempatlahir']) && $dpt['tempatlahir']!=$dpv['tempatlahir']): ?>
                                                                                    <span class="label label-warning m-l-5 inline">Update</span>
                                                                                <?php else: ?>
                                                                                    <span class="label label-success m-l-5 inline">Valid</span>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><code>Tanggal Lahir</code></td> 
                                                                            <td> <?= !empty($dpt['tanggallahir']) ? date('d-m-Y', strtotime($dpt['tanggallahir'])) : '-' ?></td>
                                                                            <td>
                                                                                <?php if(!empty($dpt['tanggallahir']) && $dpt['tanggallahir']!=$dpv['tanggallahir']): ?>
                                                                                    <span class="label label-warning m-l-5 inline">Update</span>
                                                                                <?php else: ?>
                                                                                    <span class="label label-success m-l-5 inline">Valid</span>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><code>Alamat</code></td> 
                                                                            <td> <?= !empty($dpt['alamat']) ? $dpt['alamat'] : '-' ?></td>
                                                                            <td>
                                                                                <?php if(!empty($dpt['alamat']) && $dpt['alamat']!=$dpv['alamat']): ?>
                                                                                    <span class="label label-warning m-l-5 inline">Update</span>
                                                                                <?php else: ?>
                                                                                    <span class="label label-success m-l-5 inline">Valid</span>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><code>Kode Pos</code></td> 
                                                                            <td> <?= !empty($dpt['kodepos']) ? $dpt['kodepos'] :'-' ?></td>
                                                                            <td>
                                                                                <?php if(!empty($dpt['kodepos']) && $dpt['kodepos']!=$dpv['kodepos']): ?>
                                                                                    <span class="label label-warning m-l-5 inline">Update</span>
                                                                                <?php else: ?>
                                                                                    <span class="label label-success m-l-5 inline">Valid</span>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><code>Email</code></td> 
                                                                            <td> <?= !empty($dpt['email']) ? $dpt['email'] :'-' ?></td>
                                                                            <td>
                                                                                <?php if(!empty($dpt['email']) &&$dpt['email']!=$dpv['email']): ?>
                                                                                    <span class="label label-warning m-l-5 inline">Update</span>
                                                                                <?php else: ?>
                                                                                    <span class="label label-success m-l-5 inline">Valid</span>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><code>No. Telp</code></td> 
                                                                            <td> <?= !empty($dpt['notlpx']) ? $dpt['notlpx'] : '-' ?></td>
                                                                            <td>
                                                                                <?php if(!empty($dpt['notlpx']) &&$dpt['notlpx']!=$dpv['notlpx']): ?>
                                                                                    <span class="label label-warning m-l-5 inline">Update</span>
                                                                                <?php else: ?>
                                                                                    <span class="label label-success m-l-5 inline">Valid</span>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><code>Agama</code></td> 
                                                                            <td> <?= !empty($dpt['nm_agama']) ? $dpt['nm_agama'] :'-' ?></td>
                                                                            <td>
                                                                                <?php if(!empty($dpt['agama']) && $dpt['agama']!=$dpv['agama']): ?>
                                                                                    <span class="label label-warning m-l-5 inline">Update</span>
                                                                                <?php else: ?>
                                                                                    <span class="label label-success m-l-5 inline">Valid</span>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><code>Jenis Kelamin</code></td> 
                                                                            <td> <?= !empty($dpt['nm_kelamin']) ? $dpt['nm_kelamin'] :'-' ?></td>
                                                                            <td>
                                                                                <?php if(!empty($dpt['kelamin_id']) && $dpt['kelamin_id']!=$dpv['kelamin_id']): ?>
                                                                                    <span class="label label-warning m-l-5 inline">Update</span>
                                                                                <?php else: ?>
                                                                                    <span class="label label-success m-l-5 inline">Valid</span>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><code>Status Nikah</code></td> 
                                                                            <td> <?= !empty($dpt['nm_skawin']) ? $dpt['nm_skawin'] : '-' ?></td>
                                                                            <td>
                                                                                <?php if(!empty($dpt['skawin']) && $dpt['nm_skawin']!=$dpv['nm_skawin']): ?>
                                                                                    <span class="label label-warning m-l-5 inline">Update</span>
                                                                                <?php else: ?>
                                                                                    <span class="label label-success m-l-5 inline">Valid</span>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><code>NIP Lama</code></td> 
                                                                            <td> <?= !empty($dpt['nip_lama']) ? $dpt['nip_lama'] : '-' ?></td>
                                                                            <td>
                                                                                <?php if(!empty($dpt['nip_lama']) && $dpt['nip_lama']!=$dpv['nip_lama']): ?>
                                                                                    <span class="label label-warning m-l-5 inline">Update</span>
                                                                                <?php else: ?>
                                                                                    <span class="label label-success m-l-5 inline">Valid</span>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        </tr>
                                                                </tbody>
                                                            </table>
                                                            <h6>
                                                                <span class="semi-bold">Fiel</span> Pendukung
                                                            </h6>
                                                            <a href="javascript:;" onclick="fileFunctiondptf()"><span class="label label-info m-l-5 inline">Foto</span></a>
                                                            <script>
                                                                function fileFunctiondptf() {
                                                                    // var url = "<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($dpt['foto']) ? $dpt['foto'] : $dpv['foto']  ?>";
                                                                    // var http = new XMLHttpRequest();
                                                                    // http.open('HEAD', url, false); 
                                                                    // http.send();
                                                                    function doesFileExist(urlToFile) {
                                                                        var xhr = new XMLHttpRequest();
                                                                        xhr.open('HEAD', urlToFile, false);
                                                                        xhr.send();
                                                                        
                                                                        if (xhr.status == "404") {
                                                                            return false;
                                                                        } else {
                                                                            return true;
                                                                        }
                                                                    }
                                                                    var result = doesFileExist("<?= base_url() ?>assets/asn/img/profiles/<?= !empty($dpt['foto']) ? $dpt['foto'] : (!empty($dpv['foto']) ? $dpv['foto'] : 'ups.pdf')  ?>");

                                                                    if(result == true){
                                                                        document.getElementById("filedp").innerHTML = '<img src="<?= base_url() ?>assets/asn/img/profiles/<?= !empty($dpt['foto']) ? $dpt['foto'] : (!empty($dpv['foto']) ? $dpv['foto']  : '')  ?>" width=400px>';
                                                                    }else{
                                                                        document.getElementById("filedp").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                    }
                                                                }
                                                            </script>
                                                            <a href="javascript:;" onclick="fileFunctiondpt()"><span class="label label-info m-l-5 inline">File KTP</span></a>
                                                            <script>
                                                                function fileFunctiondpt() {
                                                                    // var url = "<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($dpt['file_ktp']) ? $dpt['file_ktp'] : $dpv['file_ktp']  ?>";
                                                                    // var http = new XMLHttpRequest();
                                                                    // http.open('HEAD', url, false); 
                                                                    // http.send();
                                                                    function doesFileExist(urlToFile) {
                                                                        var xhr = new XMLHttpRequest();
                                                                        xhr.open('HEAD', urlToFile, false);
                                                                        xhr.send();
                                                                        
                                                                        if (xhr.status == "404") {
                                                                            return false;
                                                                        } else {
                                                                            return true;
                                                                        }
                                                                    }
                                                                    var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($dpt['file_ktp']) ? $dpt['file_ktp'] : (!empty($dpv['file_ktp']) ? $dpv['file_ktp'] : 'ups.pdf')  ?>");

                                                                    if(result == true){
                                                                        document.getElementById("filedp").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($dpt['file_ktp']) ? $dpt['file_ktp'] : (!empty($dpv['file_ktp']) ? $dpv['file_ktp']  : '')  ?>" width="100%" height="100%"></embed>';
                                                                    }else{
                                                                        document.getElementById("filedp").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                    }
                                                                }
                                                            </script>
                                                            <hr>

                                                            <a <?= $dpt['status_validasi_moddp'] ==1 ?'href="#" data-toggle="modal" data-target="#dpvalid'.$dpt['nip'].'"' : 'href="javascript:;"'?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                            <a <?= $dpt['status_validasi_moddp'] ==1 ?'href="#" data-toggle="modal" data-target="#dptvalid'.$dpt['nip'].'"' : 'href="javascript:;"'?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                            <div class="modal fade slide-up disable-scroll" id="dptvalid<?=$dpt['nip']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                <div class="modal-dialog ">
                                                                    <div class="modal-content-wrapper">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header clearfix text-left">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <?= form_open('admin/validasi_data/validasi_opd_dp/tidak_valid/'.$dpt['nip'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                    <div class="form-group-attached m-b-5">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group form-group-default">
                                                                                                    <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                    <textarea name="alasan_notvalid_dpt" class="w-100" rows="10"></textarea>
                                                                                                    <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                                    <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                    <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                <?= form_close(); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="modal fade slide-up disable-scroll" id="dpvalid<?=$dpt['nip']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                <div class="modal-dialog modal-sm">
                                                                    <div class="modal-content-wrapper">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body text-center m-t-20">
                                                                                <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <a href="<?= base_url('admin/validasi_data/validasi_opd_dp/valid/'.$dpt['nip']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="filedp" class="col-lg-6"></div>
                                                        <?php else: ?>
                                                            <p class="m-l-20">List validasi Data Pribadi tidak diketemukan</p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <!-- ====================== DATA UTAMA IDENTITAS =========================== -->
                                                <div class="tab-pane " id="tab2FollowUs">
                                                    <div class="row bg-default">
                                                        <?php if(!empty($idpt)): ?>
                                                        <div class="col-lg-6">
                                                            <h6>
                                                                <span class="semi-bold">Data</span> Identitas 
                                                                <?php if($idpt['status_validasi_modidpt'] ==1){ ?>
                                                                    <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                <?php }else{?>
                                                                    <span class="label label-danger"><small>Menunggu perubahan data tidak valid dari user Asn</small></span>
                                                                <?php }?>
                                                            </h6>
                                                            <table class="table table-sm table-hover table-striped w-100">
                                                                <tbody>
                                                                    <tr>
                                                                        <td><code>Unit Kerja</code></td> 
                                                                        <td> <?= !empty($dpv['nm_unitkerja']) ? $dpv['nm_unitkerja'] :'-' ?></td>
                                                                        <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>NIP</code></td> 
                                                                        <td> <?= !empty($dpv['nip']) ? $dpv['nip'] : '-' ?></td>
                                                                        <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Nama</code></td> 
                                                                        <td> <?= !empty($dpv['nama']) ? $dpv['nama'] : '-' ?></td>
                                                                        <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Status Pegawai</code></td> 
                                                                        <td> <?= !empty($idpt['status_pegawai']) ? ($idpt['status_pegawai']==1 ? 'Aktif' : 'Nonaktif') : '-' ?></td>
                                                                        <?php if(!empty($idpt['status_pegawai']) && $idpt['status_pegawai']!=$idpv['status_pegawai']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>No. Kartu Pegawai</code></td> 
                                                                        <td> <?= !empty($idpt['nokarpeg']) ? $idpt['nokarpeg'] : '-' ?></td>
                                                                        <?php if(!empty($idpt['nokarpeg']) && $idpt['nokarpeg']!=$idpv['nokarpeg'] && !empty($idpv['nokarpeg'])): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>No. Arsip</code></td> 
                                                                        <td> <?= !empty($idpt['noarsip']) ? $idpt['noarsip'] : '-' ?></td>
                                                                        <?php if(!empty($idpt['noarsip']) && $idpt['noarsip']!=$idpv['noarsip']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>No. KTP</code></td> 
                                                                        <td> <?= !empty($idpt['noktp']) ? $idpt['noktp'] : '-' ?></td>
                                                                        <?php if(!empty($idpt['noktp']) && $idpt['noktp']!=$idpv['noktp']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>No. Taspen</code></td> 
                                                                        <td> <?= !empty($idpt['notaspen']) ? $idpt['notaspen'] : '-' ?></td>
                                                                        <?php if(!empty($idpt['notaspen']) && $idpt['notaspen']!=$idpv['notaspen']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>No. NPWP</code></td> 
                                                                        <td> <?= !empty($idpt['nonpwp']) ? $idpt['nonpwp'] : '-' ?></td>
                                                                        <?php if(!empty($idpt['nonpwp']) && $idpt['nonpwp']!=$idpv['nonpwp']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>No. Kartu Suami/Istri</code></td> 
                                                                        <td> <?= !empty($idpt['nokariskarsu']) ? $idpt['nokariskarsu'] : '-' ?></td>
                                                                        <?php if(!empty($idpt['nokariskarsu']) &&$idpt['nokariskarsu']!=$idpv['nokariskarsu']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>No.NUPTK</code></td> 
                                                                        <td> <?= !empty($idpt['nonuptk']) ? $idpt['nonuptk'] : '-' ?></td>
                                                                        <?php if(!empty($idpt['nonuptk']) && $idpt['nonuptk']!=$idpv['nonuptk']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>No. Registrasi Guru</code></td> 
                                                                        <td> <?= !empty($idpt['noregguru']) ? $idpt['noregguru'] : '-' ?></td>
                                                                        <?php if(!empty($idpt['noregguru']) && $idpt['noregguru']!=$idpv['noregguru']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>No. BPJS</code></td> 
                                                                        <td> <?= !empty($idpt['nobpjs']) ? $idpt['nobpjs'] : '-' ?></td>
                                                                        <?php if(!empty($idpt['nobpjs']) && $idpt['nobpjs']!=$idpv['nobpjs']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Kepemilikan KPE</code></td> 
                                                                        <td> <?= !empty($idpt['kepemilikan_kpe']) ? ($idpt['kepemilikan_kpe']==1 ? 'Ya' : 'Tidak') : '-' ?></td>
                                                                        <?php if(!empty($idpt['kepemilikan_kpe']) && $idpt['kepemilikan_kpe']!=$idpv['kepemilikan_kpe']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Bapetarum</code></td> 
                                                                        <td> <?= !empty($idpt['bapetarum']) ? ($idpt['bapetarum']==1 ? 'Sudah' : 'Belum') : '-' ?></td>
                                                                        <?php if(!empty($idpt['bapetarum']) && $idpt['bapetarum']!=$idpv['bapetarum']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Status Sertifikasi</code></td> 
                                                                        <td> <?= !empty($idpt['status_sertifikasi']) ? ($idpt['status_sertifikasi']==1 ? 'Ya' : 'Tidak') : '-' ?></td>
                                                                        <?php if(!empty($idpt['status_sertifikasi']) && $idpt['status_sertifikasi']!=$idpv['status_sertifikasi']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <?php if($idpt['status_pegawai']==2 || $idpv['status_pegawai']==2): ?>
                                                                    <tr>
                                                                        <td><code>Nomor SK PNS Nonaktif</code></td> 
                                                                        <td> <?= !empty($idpt['no_statuspns']) ? $idpt['no_statuspns'] : '-' ?></td>
                                                                        <?php if(!empty($idpt['no_statuspns']) && $idpt['no_statuspns']!=$idpv['no_statuspns']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Tanggal SK PNS Nonaktif</code></td> 
                                                                        <td> <?= !empty($idpt['tglsk_statuspns']) ? date('d-m-Y', strtotime($idpt['tglsk_statuspns'])) : '-' ?></td>
                                                                        <?php if(!empty($idpt['tglsk_statuspns']) && $idpt['tglsk_statuspns']!=$idpv['tglsk_statuspns']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>TMT PNS Nonaktif</code></td> 
                                                                        <td> <?= !empty($idpt['tmt_statuspns']) ? date('d-m-Y', strtotime($idpt['tmt_statuspns'])) : '-' ?></td>
                                                                        <?php if(!empty($idpt['tmt_statuspns']) && $idpt['tmt_statuspns']!=$idpv['tmt_statuspns']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <?php endif;?>
                                                                </tbody>
                                                            </table>
                                                            <h6>
                                                                <span class="semi-bold">File</span> Pendukung
                                                            </h6>
                                                            <?php 
                                                                $kariskarsu = $dpv['kelamin_id'] ==1 ? 'Kartu Suami' : 'Kartu Istri';
                                                                $file = array('file_karpeg'=>'Karpeg','file_nuptk'=>'NUPTK','file_taspen'=>'Kartu Taspen','file_npwp'=>'NPWP','file_kariskarsu'=>$kariskarsu,'file_bpjs'=>'BPJS','file_kpe'=>'KPE','file_sertifikasi'=>'Sertifikasi');
                                                                foreach($file as $idk => $idv){?>
                                                                    <a href="javascript:;" onclick="fileFunction<?= $idk?>()"><span class="label label-info m-l-5 inline"><?= $idv ?></span></a>
                                                                    <script>
                                                                        function fileFunction<?= $idk?>() {
                                                                            // var url = "<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($idpt[$idk]) ? $idpt[$idk] : $idpv[$idk]  ?>";
                                                                            // var http = new XMLHttpRequest();
                                                                            // http.open('HEAD', url, false); 
                                                                            // http.send();
                                                                            function doesFileExist(urlToFile) {
                                                                                var xhr = new XMLHttpRequest();
                                                                                xhr.open('HEAD', urlToFile, false);
                                                                                xhr.send();
                                                                                
                                                                                if (xhr.status == "404") {
                                                                                    return false;
                                                                                } else {
                                                                                    return true;
                                                                                }
                                                                            }
                                                                            var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($idpt[$idk]) ? $idpt[$idk] : (!empty($idpv[$idk]) ? $idpv[$idk] : 'ups.pdf')  ?>");

                                                                            if(result == true){
                                                                                document.getElementById("fileid").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($idpt[$idk]) ? $idpt[$idk] : (!empty($idpv[$idk]) ? $idpv[$idk] : '')  ?>" width="100%" height="100%"></embed>';
                                                                            }else{
                                                                                document.getElementById("fileid").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                            }
                                                                        }
                                                                    </script>
                                                            
                                                            <?php }?> 
                                                            <?php if($idpt['status_pegawai']==2 || $idpv['status_pegawai']==2): ?>
                                                                <a href="javascript:;" onclick="fileFunctiondptfile_sk_pnsnonaktif()"><span class="label label-info m-l-5 inline">File SK PNS Nonaktif</span></a>
                                                                <script>
                                                                    function fileFunctiondptfile_sk_pnsnonaktif() {
                                                                        // var url = "<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($idpt['file_sk_pnsnonaktif']) ? $idpt['file_sk_pnsnonaktif'] : $idpv['file_sk_pnsnonaktif']  ?>";
                                                                        // var http = new XMLHttpRequest();
                                                                        // http.open('HEAD', url, false); 
                                                                        // http.send();
                                                                        function doesFileExist(urlToFile) {
                                                                            var xhr = new XMLHttpRequest();
                                                                            xhr.open('HEAD', urlToFile, false);
                                                                            xhr.send();
                                                                            if (xhr.status == "404") {
                                                                                return false;
                                                                            } else {
                                                                                return true;
                                                                            }
                                                                        }
                                                                        var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($idpt['file_sk_pnsnonaktif']) ? $idpt['file_sk_pnsnonaktif'] : (!empty($idpv['file_sk_pnsnonaktif']) ? $idpv['file_sk_pnsnonaktif'] : 'ups.pdf')  ?>");
                                                                        if(result == true){
                                                                            document.getElementById("fileid").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($idpt['file_sk_pnsnonaktif']) ? $idpt['file_sk_pnsnonaktif'] : (!empty($idpv['file_sk_pnsnonaktif']) ? $idpv['file_sk_pnsnonaktif'] : '')  ?>" width="100%" height="100%"></embed>';
                                                                        }else{
                                                                            document.getElementById("fileid").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                        }
                                                                    }
                                                                </script>
                                                            <?php endif;?>
                                                            <hr>
                                                            <a <?= $idpt['status_validasi_modidpt'] ==1 ? ' data-toggle="modal" data-target="#idpvalid'.$idpt['nip'].'"' : 'href="javascript:;"'?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                            <a <?= $idpt['status_validasi_modidpt'] ==1 ? 'href="#" data-toggle="modal" data-target="#idptvalid'.$idpt['nip'].'"' : 'href="javascript:;"'?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                        
                                                            <div class="modal fade slide-up disable-scroll" id="idptvalid<?=$idpt['nip']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                <div class="modal-dialog ">
                                                                    <div class="modal-content-wrapper">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header clearfix text-left">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <?= form_open('admin/validasi_data/validasi_opd_id/tidak_valid/'.$idpt['nip'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                    <div class="form-group-attached m-b-5">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group form-group-default">
                                                                                                    <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                    <textarea name="alasan_notvalid_idpt" class="w-100" rows="10"></textarea>
                                                                                                    <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                                    <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                    <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                <?= form_close(); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal fade slide-up disable-scroll" id="idpvalid<?=$idpt['nip']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                <div class="modal-dialog modal-sm">
                                                                    <div class="modal-content-wrapper">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body text-center m-t-20">
                                                                                <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <a href="<?= base_url('admin/validasi_data/validasi_opd_id/valid/'.$idpt['nip']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div id="fileid" class="col-lg-6"></div>
                                                        <?php else: ?>
                                                            <p class="m-l-20">List validasi Data Identitas tidak diketemukan</p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <!-- ====================== DATA UTAMA FISIK =========================== -->
                                                <div class="tab-pane" id="tab2Inspire">
                                                    <div class="row">
                                                        <?php if(!empty($mft)): ?>
                                                        <div class="col-lg-12">
                                                            <h6>
                                                                <span class="semi-bold">Data</span> Fisik 
                                                                <?php if($mft['status_validasi_modmft'] ==1){ ?>
                                                                    <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                <?php }else{?>
                                                                    <span class="label label-danger"><small>Menunggu perubahan data tidak valid dari user Asn</small></span>
                                                                <?php }?>
                                                            </h6>
                                                            <table class="table table-sm table-hover table-striped w-100">
                                                                <tbody>
                                                                    <tr>
                                                                        <td><code>Unit Kerja</code></td> 
                                                                        <td> <?= !empty($dpv['nm_unitkerja']) ? $dpv['nm_unitkerja'] :'-' ?></td>
                                                                        <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>NIP</code></td> 
                                                                        <td> <?= !empty($dpv['nip']) ? $dpv['nip'] : '-' ?></td>
                                                                        <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Nama</code></td> 
                                                                        <td> <?= !empty($dpv['nama']) ? $dpv['nama'] : '-' ?></td>
                                                                        <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Golongan Darah</code></td> 
                                                                        <td> <?= !empty($mft['goldarah']) ? $mft['goldarah'] : '-' ?></td>
                                                                        <?php if(!empty($mft['goldarah']) && $mft['goldarah']!=$mfv['goldarah']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Tinggi Badan</code></td> 
                                                                        <td> <?= !empty($mft['tinggi']) ? $mft['tinggi'] : '-' ?></td>
                                                                        <?php if(!empty($mft['tinggi']) && $mft['tinggi']!=$mfv['tinggi']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Berat Badan</code></td> 
                                                                        <td> <?= !empty($mft['berat']) ? $mft['berat'] : '-' ?></td>
                                                                        <?php if(!empty($mft['berat']) && $mft['berat']!=$mfv['berat']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Cacat</code></td> 
                                                                        <td> <?= !empty($mft['cacat']) ? $mft['cacat'] : '-' ?></td>
                                                                        <?php if(!empty($mft['cacat']) && $mft['cacat']!=$mfv['cacat']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Ukuran Sepatu</code></td> 
                                                                        <td> <?= !empty($mft['nosepatu']) ? $mft['nosepatu'] : '-' ?></td>
                                                                        <?php if(!empty($mft['nosepatu']) && $mft['nosepatu']!=$mfv['nosepatu']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Ukuran Baju</code></td> 
                                                                        <td> <?= !empty($mft['nobaju']) ? $mft['nobaju'] : '-' ?></td>
                                                                        <?php if(!empty($mft['nobaju']) && $mft['nobaju']!=$mfv['nobaju']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Kondisi Fisik</code></td> 
                                                                        <td> <?= !empty($mft['kondisi_fisik']) ? $mft['kondisi_fisik'] : '-' ?></td>
                                                                        <?php if(!empty($mft['kondisi_fisik']) &&$mft['kondisi_fisik']!=$mfv['kondisi_fisik']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                            <a <?= $mft['status_validasi_modmft'] ==1 ? 'href="#" data-toggle="modal" data-target="#mfvalid'.$mft['nip'].'"' : 'href="#"'?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                            <a <?= $mft['status_validasi_modmft'] ==1 ? 'href="#" data-toggle="modal" data-target="#mftvalid'.$mft['nip'].'"' : 'href="#"'?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                            <div class="modal fade slide-up disable-scroll" id="mftvalid<?=$mft['nip']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                <div class="modal-dialog ">
                                                                    <div class="modal-content-wrapper">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header clearfix text-left">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <?= form_open('admin/validasi_data/validasi_opd_mf/tidak_valid/'.$mft['nip'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                    <div class="form-group-attached m-b-5">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group form-group-default">
                                                                                                    <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                    <textarea name="alasan_notvalid_mft" class="w-100" rows="10"></textarea>
                                                                                                    <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                                    <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                    <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                <?= form_close(); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal fade slide-up disable-scroll" id="mfvalid<?=$mft['nip']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                <div class="modal-dialog modal-sm">
                                                                    <div class="modal-content-wrapper">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body text-center m-t-20">
                                                                                <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <a href="<?= base_url('admin/validasi_data/validasi_opd_mf/valid/'.$mft['nip']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col-lg-6">

                                                        </div>
                                                        <?php else: ?>
                                                            <p class="m-l-20">List validasi Data Fisik tidak diketemukan</p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <!-- ====================== DATA UTAMA CPNS =========================== -->
                                                <div class="tab-pane" id="tab2Cpns">
                                                    <div class="row">
                                                        <?php if(!empty($cpnst)): ?>
                                                        <div class="col-lg-6">
                                                            <h6>
                                                                <span class="semi-bold">Data</span> CPNS 
                                                                <?php if($cpnst['status_validasi_modcpns'] ==1){ ?>
                                                                    <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                <?php }else{?>
                                                                    <span class="label label-danger"><small>Menunggu perubahan data tidak valid dari user Asn</small></span>
                                                                <?php }?>
                                                            </h6>
                                                            <table class="table table-sm table-hover table-striped w-100">
                                                                <tbody>
                                                                    <tr>
                                                                        <td><code>Unit Kerja</code></td> 
                                                                        <td> <?= !empty($dpv['nm_unitkerja']) ? $dpv['nm_unitkerja'] :'-' ?></td>
                                                                        <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>NIP</code></td> 
                                                                        <td> <?= !empty($dpv['nip']) ? $dpv['nip'] : '-' ?></td>
                                                                        <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Nama</code></td> 
                                                                        <td> <?= !empty($dpv['nama']) ? $dpv['nama'] : '-' ?></td>
                                                                        <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Golongan</code></td> 
                                                                        <td> <?= !empty($cpnst['golongan']) ? $cpnst['golongan'] : '-' ?></td>
                                                                        <?php if(!empty($cpnst['golongan']) && $cpnst['golongan']!=$cpnsv['golongan']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>TMT CPNS</code></td> 
                                                                        <td> <?= !empty($cpnst['tmt_cpns']) ? date('d-m-Y', strtotime($cpnst['tmt_cpns'])) : '-' ?></td>
                                                                        <?php if(!empty($cpnst['tmt_cpns']) && $cpnst['tmt_cpns']!=$cpnsv['tmt_cpns']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Masa Kerja Golongan Tahun</code></td> 
                                                                        <td> <?= !empty($cpnst['masa_kerja_golongan_tahun']) ? $cpnst['masa_kerja_golongan_tahun'] : '-' ?></td>
                                                                        <?php if(!empty($cpnst['masa_kerja_golongan_tahun']) && $cpnst['masa_kerja_golongan_tahun']!=$cpnsv['masa_kerja_golongan_tahun']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Masa Kerja Golongan Bulan</code></td> 
                                                                        <td> <?= !empty($cpnst['masa_kerja_golongan_bulan']) ? $cpnst['masa_kerja_golongan_bulan'] : '-' ?></td>
                                                                        <?php if(!empty($cpnst['masa_kerja_golongan_bulan']) && $cpnst['masa_kerja_golongan_bulan']!=$cpnsv['masa_kerja_golongan_bulan']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Jenis Pengadaan</code></td> 
                                                                        <td> <?= !empty($cpnst['nm_pengadaan']) ? $cpnst['nm_pengadaan'] : '-' ?></td>
                                                                        <?php if(!empty($cpnst['nm_pengadaan']) && $cpnst['nm_pengadaan']!=$cpnsv['nm_pengadaan']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Nomor BKN</code></td> 
                                                                        <td> <?= !empty($cpnst['no_bkn']) ? $cpnst['no_bkn'] : '-' ?></td>
                                                                        <?php if(!empty($cpnst['no_bkn']) && $cpnst['no_bkn']!=$cpnsv['no_bkn']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Tanggal BKN</code></td> 
                                                                        <td> <?= !empty($cpnst['tgl_bkn']) ? date('d-m-Y',strtotime($cpnst['tgl_bkn'])) : '-' ?></td>
                                                                        <?php if(!empty($cpnst['tgl_bkn']) && $cpnst['tgl_bkn']!=$cpnsv['tgl_bkn']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Nomor SK</code></td> 
                                                                        <td> <?= !empty($cpnst['sk_nomor']) ? $cpnst['sk_nomor'] : '-' ?></td>
                                                                        <?php if(!empty($cpnst['sk_nomor']) && $cpnst['sk_nomor']!=$cpnsv['sk_nomor']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Tanggal SK</code></td> 
                                                                        <td> <?= !empty($cpnst['sk_tanggal']) ? date('d-m-Y',strtotime($cpnst['sk_tanggal'])) : '-' ?></td>
                                                                        <?php if(!empty($cpnst['sk_tanggal']) && $cpnst['sk_tanggal']!=$cpnsv['sk_tanggal']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Pejabat Yang Menetapkan</code></td> 
                                                                        <td> <?= !empty($cpnst['sk_pejabat']) ? $cpnst['sk_pejabat'] : '-' ?></td>
                                                                        <?php if(!empty($cpnst['sk_pejabat']) && $cpnst['sk_pejabat']!=$cpnsv['sk_pejabat']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Nomor SPMT</code></td> 
                                                                        <td> <?= !empty($cpnst['spmt_nomor']) ? $cpnst['spmt_nomor'] : '-' ?></td>
                                                                        <?php if(!empty($cpnst['spmt_nomor']) && $cpnst['spmt_nomor']!=$cpnsv['spmt_nomor']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Tanggal SPMT</code></td> 
                                                                        <td> <?= !empty($cpnst['spmt_tanggal']) ? date('d-m-Y',strtotime($cpnst['spmt_tanggal'])) : '-' ?></td>
                                                                        <?php if(!empty($cpnst['spmt_tanggal']) && $cpnst['spmt_tanggal']!=$cpnsv['spmt_tanggal']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                            <h6>
                                                                <span class="semi-bold">File</span> Pendukung
                                                            </h6>
                                                            <?php 
                                                                $filecpns = array('file_sk','file_spmt');
                                                                for($i=0; $i < count($filecpns); $i++){?>
                                                                    <a href="javascript:;" onclick="fileFunctioncpns<?= $filecpns[$i]?>()"><span class="label label-info m-l-5 inline"><?= ucwords(str_replace('_',' ',$filecpns[$i])) ?></span></a>
                                                                    <script>
                                                                        function fileFunctioncpns<?= $filecpns[$i]?>() {
                                                                            // var url = "<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($cpnst[$filecpns[$i]]) ? $cpnst[$filecpns[$i]] : $cpnsv[$filecpns[$i]]  ?>";
                                                                            // var http = new XMLHttpRequest();
                                                                            // http.open('HEAD', url, false); 
                                                                            // http.send();
                                                                            function doesFileExist(urlToFile) {
                                                                                var xhr = new XMLHttpRequest();
                                                                                xhr.open('HEAD', urlToFile, false);
                                                                                xhr.send();
                                                                                
                                                                                if (xhr.status == "404") {
                                                                                    return false;
                                                                                } else {
                                                                                    return true;
                                                                                }
                                                                            }
                                                                            var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($cpnst[$filecpns[$i]]) ? $cpnst[$filecpns[$i]] : (!empty($cpnsv[$filecpns[$i]]) ? $cpnsv[$filecpns[$i]] : 'ups.pdf')  ?>");

                                                                            if(result == true){
                                                                                document.getElementById("filecpns").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($cpnst[$filecpns[$i]]) ? $cpnst[$filecpns[$i]] : (!empty($cpnsv[$filecpns[$i]]) ? $cpnsv[$filecpns[$i]] : '')  ?>" width="100%" height="100%"></embed>';
                                                                            }else{
                                                                                document.getElementById("filecpns").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                            }
                                                                        }
                                                                    </script>
                                                            
                                                            <?php }?>
                                                            <hr>
                                                            <a <?= $cpnst['status_validasi_modcpns'] ==1 ? 'href="#" data-toggle="modal" data-target="#cpnsvalid'.$cpnst['nip'].'"' : 'href="#"'?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                            <a <?= $cpnst['status_validasi_modcpns'] ==1 ? 'href="#" data-toggle="modal" data-target="#cpnstvalid'.$cpnst['nip'].'"' : 'href="#"'?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                            <div class="modal fade slide-up disable-scroll" id="cpnstvalid<?=$cpnst['nip']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                <div class="modal-dialog ">
                                                                    <div class="modal-content-wrapper">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header clearfix text-left">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <?= form_open('admin/validasi_data/validasi_opd_cpns/tidak_valid/'.$cpnst['nip'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                    <div class="form-group-attached m-b-5">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group form-group-default">
                                                                                                    <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                    <textarea name="alasan_notvalid_cpnst" class="w-100" rows="10"></textarea>
                                                                                                    <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                                    <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                    <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                <?= form_close(); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal fade slide-up disable-scroll" id="cpnsvalid<?=$cpnst['nip']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                <div class="modal-dialog modal-sm">
                                                                    <div class="modal-content-wrapper">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body text-center m-t-20">
                                                                                <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <a href="<?= base_url('admin/validasi_data/validasi_opd_cpns/valid/'.$cpnst['nip']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div id="filecpns" class="col-lg-6"></div>
                                                        <?php else: ?>
                                                            <p class="m-l-20">List validasi Data CPNS tidak diketemukan</p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <!-- ====================== DATA UTAMA PNS =========================== -->
                                                <div class="tab-pane" id="tab2Pns">
                                                    <div class="row">
                                                        <?php if(!empty($pnst)): ?>
                                                        <div class="col-lg-6">
                                                            <h6>
                                                                <span class="semi-bold">Data</span> PNS 
                                                                <?php if($pnst['status_validasi_modpns'] ==1){ ?>
                                                                    <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                <?php }else{?>
                                                                    <span class="label label-danger"><small>Menunggu perubahan data tidak valid dari user Asn</small></span>
                                                                <?php }?>
                                                            </h6>
                                                            <table class="table table-sm table-hover table-striped w-100">
                                                                <tbody>
                                                                    <tr>
                                                                        <td><code>Unit Kerja</code></td> 
                                                                        <td> <?= !empty($dpv['nm_unitkerja']) ? $dpv['nm_unitkerja'] :'-' ?></td>
                                                                        <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>NIP</code></td> 
                                                                        <td> <?= !empty($dpv['nip']) ? $dpv['nip'] : '-' ?></td>
                                                                        <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Nama</code></td> 
                                                                        <td> <?= !empty($dpv['nama']) ? $dpv['nama'] : '-' ?></td>
                                                                        <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Golongan</code></td> 
                                                                        <td> <?= !empty($pnst['golongan']) ? $pnst['golongan'] : '-' ?></td>
                                                                        <?php if(!empty($pnst['golongan']) && $pnst['golongan']!=$pnsv['golongan']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>TMT CPNS</code></td> 
                                                                        <td> <?= !empty($pnst['tmt_pns']) ? date('d-m-Y', strtotime($pnst['tmt_pns'])) : '-' ?></td>
                                                                        <?php if(!empty($pnst['tmt_pns']) && $pnst['tmt_pns']!=$pnsv['tmt_pns']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Masa Kerja Golongan Tahun</code></td> 
                                                                        <td> <?= !empty($pnst['masa_kerja_golongan_tahun']) ? $pnst['masa_kerja_golongan_tahun'] : '-' ?></td>
                                                                        <?php if(!empty($pnst['masa_kerja_golongan_tahun']) && $pnst['masa_kerja_golongan_tahun']!=$pnsv['masa_kerja_golongan_tahun']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Masa Kerja Golongan Bulan</code></td> 
                                                                        <td> <?= !empty($pnst['masa_kerja_golongan_bulan']) ? $pnst['masa_kerja_golongan_bulan'] : '-' ?></td>
                                                                        <?php if(!empty($pnst['masa_kerja_golongan_bulan']) && $pnst['masa_kerja_golongan_bulan']!=$pnsv['masa_kerja_golongan_bulan']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Nomor BKN</code></td> 
                                                                        <td> <?= !empty($pnst['no_bkn']) ? $pnst['no_bkn'] : '-' ?></td>
                                                                        <?php if(!empty($pnst['no_bkn']) && $pnst['no_bkn']!=$pnsv['no_bkn']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Tanggal BKN</code></td> 
                                                                        <td> <?= !empty($pnst['tgl_bkn']) ? date('d-m-Y',strtotime($pnst['tgl_bkn'])) : '-' ?></td>
                                                                        <?php if(!empty($pnst['tgl_bkn']) && $pnst['tgl_bkn']!=$pnsv['tgl_bkn']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Nomor SK</code></td> 
                                                                        <td> <?= !empty($pnst['sk_nomor']) ? $pnst['sk_nomor'] : '-' ?></td>
                                                                        <?php if(!empty($pnst['sk_nomor']) && $pnst['sk_nomor']!=$pnsv['sk_nomor']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Tanggal SK</code></td> 
                                                                        <td> <?= !empty($pnst['sk_tanggal']) ? date('d-m-Y',strtotime($pnst['sk_tanggal'])) : '-' ?></td>
                                                                        <?php if(!empty($pnst['sk_tanggal']) && $pnst['sk_tanggal']!=$pnsv['sk_tanggal']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Pejabat Yang Menetapkan</code></td> 
                                                                        <td> <?= !empty($pnst['sk_pejabat']) ? $pnst['sk_pejabat'] : '-' ?></td>
                                                                        <?php if(!empty($pnst['sk_pejabat']) && $pnst['sk_pejabat']!=$pnsv['sk_pejabat']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Nomor SPMT</code></td> 
                                                                        <td> <?= !empty($pnst['sttpl_nomor']) ? $pnst['sttpl_nomor'] : '-' ?></td>
                                                                        <?php if(!empty($pnst['sttpl_nomor']) && $pnst['sttpl_nomor']!=$pnsv['sttpl_nomor']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Tanggal SPMT</code></td> 
                                                                        <td> <?= !empty($pnst['sttpl_tanggal']) ? date('d-m-Y',strtotime($pnst['sttpl_tanggal'])) : '-' ?></td>
                                                                        <?php if(!empty($pnst['sttpl_tanggal']) && $pnst['sttpl_tanggal']!=$pnsv['sttpl_tanggal']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Nomor Ket Dokter</code></td> 
                                                                        <td> <?= !empty($pnst['nomor_kdokter']) ? $pnst['nomor_kdokter'] : '-' ?></td>
                                                                        <?php if(!empty($pnst['nomor_kdokter']) && $pnst['nomor_kdokter']!=$pnsv['nomor_kdokter']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><code>Tanggal Ket Dokter</code></td> 
                                                                        <td> <?= !empty($pnst['tanggal_kdokter']) ? date('d-m-Y',strtotime($pnst['tanggal_kdokter'])) : '-' ?></td>
                                                                        <?php if(!empty($pnst['tanggal_kdokter']) && $pnst['tanggal_kdokter']!=$pnsv['tanggal_kdokter']): ?>
                                                                            <td><span class="label label-warning m-l-5 inline">Update</span></td>
                                                                        <?php else: ?>
                                                                            <td><span class="label label-success m-l-5 inline">Valid</span></td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                            <h6>
                                                                <span class="semi-bold">File</span> Pendukung
                                                            </h6>
                                                            <?php 
                                                                $filepns = array('file_sk','file_sttpl', 'file_sumpah');
                                                                for($i=0; $i < count($filepns); $i++){?>
                                                                    <a href="javascript:;" onclick="fileFunctionpns<?= $filepns[$i]?>()"><span class="label label-info m-l-5 inline"><?= ucwords(str_replace('_',' ',$filepns[$i])) ?></span></a>
                                                                    <script>
                                                                        function fileFunctionpns<?= $filepns[$i]?>() {
                                                                            // var url = "<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($pnst[$filepns[$i]]) ? $pnst[$filepns[$i]] : $pnsv[$filepns[$i]]  ?>";
                                                                            // var http = new XMLHttpRequest();
                                                                            // http.open('HEAD', url, false); 
                                                                            // http.send();
                                                                            function doesFileExist(urlToFile) {
                                                                                var xhr = new XMLHttpRequest();
                                                                                xhr.open('HEAD', urlToFile, false);
                                                                                xhr.send();
                                                                                
                                                                                if (xhr.status == "404") {
                                                                                    return false;
                                                                                } else {
                                                                                    return true;
                                                                                }
                                                                            }
                                                                            var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($pnst[$filepns[$i]]) ? $pnst[$filepns[$i]] : (!empty($pnsv[$filepns[$i]]) ? $pnsv[$filepns[$i]] : 'ups.pdf')  ?>");

                                                                            if(result == true){
                                                                                document.getElementById("filepns").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($pnst[$filepns[$i]]) ? $pnst[$filepns[$i]] : (!empty($pnsv[$filepns[$i]]) ? $pnsv[$filepns[$i]] : '')  ?>" width="100%" height="100%"></embed>';
                                                                            }else{
                                                                                document.getElementById("filepns").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                            }
                                                                        }
                                                                    </script>
                                                            
                                                            <?php }?>
                                                            <hr>
                                                            <a <?= $pnst['status_validasi_modpns'] ==1 ? 'href="#" data-toggle="modal" data-target="#pnsvalid'.$pnst['nip'].'"' : 'href="#"'?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                            <a <?= $pnst['status_validasi_modpns'] ==1 ? 'href="#" data-toggle="modal" data-target="#pnstvalid'.$pnst['nip'].'"' : 'href="#"'?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                            <div class="modal fade slide-up disable-scroll" id="pnstvalid<?=$pnst['nip']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                <div class="modal-dialog ">
                                                                    <div class="modal-content-wrapper">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header clearfix text-left">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <?= form_open('admin/validasi_data/validasi_opd_pns/tidak_valid/'.$pnst['nip'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                    <div class="form-group-attached m-b-5">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group form-group-default">
                                                                                                    <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                    <textarea name="alasan_notvalid_pnst" class="w-100" rows="10"></textarea>
                                                                                                    <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                
                                                                                    <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                    <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                <?= form_close(); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal fade slide-up disable-scroll" id="pnsvalid<?=$pnst['nip']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                <div class="modal-dialog modal-sm">
                                                                    <div class="modal-content-wrapper">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body text-center m-t-20">
                                                                                <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <a href="<?= base_url('admin/validasi_data/validasi_opd_pns/valid/'.$pnst['nip']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div id="filepns" class="col-lg-6"></div>
                                                        <?php else: ?>
                                                            <p class="m-l-20">List validasi Data PNS tidak diketemukan</p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                            
                                            </div>
                                        </div>
                                        
                                    </div>

                                </div>
                                <!-- END PLACE PAGE CONTENT HERE -->

                            </div>
                            
                            <!-- ====================== DATA RIWAYAT =========================== -->
                            <div class=" col-lg container container-fixed-lg bg-white p-3">
                                <!-- BEGIN PlACE PAGE CONTENT HERE -->    
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h3>
                                            Data <span class="semi-bold">Riwayat</span>
                                        </h3>
                                        <!-- START card -->
                                        <div class="sm-m-l-5 sm-m-r-5">
                                            <div class="card-group horizontal" id="accordion" role="tablist" aria-multiselectable="true">
                                                <!-- ====================== DATA RIWAYAT JABATAN =========================== -->
                                                <div class="card card-default m-b-0 bg-warna-abu">
                                                    <div class="card-header bg-success" role="tab" id="headingOne">
                                                        <h4 class="card-title">
                                                            <a data-toggle="collapse" class="p-0" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                Riwayat Jabatan
                                                                <?= count($jab) > 0 ? '<span class="badge badge-important">'.count($jab).'</span>' : '' ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne" class="collapse show" role="tabcard" aria-labelledby="headingOne">
                                                        <div class="card-block">
                                                            <div class="row">
                                                                <?php if(!empty($jab)): ?>
                                                                <div class="col-lg-12">
                                                                    <table class="table table-sm table-hover table-striped w-100 table-responsive">
                                                                        <thead>
                                                                            <tr>
                                                                                <td class="text-nowrap text-center"><code>#</code></td>
                                                                                <td class="text-nowrap"><code>Unit Kerja</code></td> 
                                                                                <td class="text-nowrap"><code>Eselon</code></td> 
                                                                                <td class="text-nowrap"><code>Jabatan</code></td> 
                                                                                <td class="text-nowrap"><code>Jenis Jabatan</code></td> 
                                                                                <td class="text-nowrap"><code>Jenjang Jabatan</code></td> 
                                                                                <td class="text-nowrap"><code>TMT Jabatan</code></td> 
                                                                                <td class="text-nowrap"><code>No.SK Jabatan</code></td>
                                                                                <td class="text-nowrap"><code>Tgl.SK Jabatan</code></td>
                                                                                <td class="text-nowrap"><code>Status</code></td>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach($jab as $j): ?>
                                                                                <tr>
                                                                                    <td><a href="javascript:;" data-toggle="modal" data-target="#jabatan<?=$j['id']?>"><span class="label label-info m-l-5 inline">validasi</span></a></td> 
                                                                                    <td class="text-nowrap"><?= $j['nm_unitkerja'] ?></td> 
                                                                                    <td class="text-nowrap"><?= $j['eselon'] ?></td> 
                                                                                    <td class="text-nowrap"><?= $j['nm_jabatan'] ?></td> 
                                                                                    <td class="text-nowrap"><?= $j['jenis_jabatan'] ?></td> 
                                                                                    <td class="text-nowrap"><?= $j['jenjang_jabatan'] ?></td> 
                                                                                    <td class="text-nowrap"><?= date('d-m-Y', strtotime($j['tmt_jabatan'])) ?></td> 
                                                                                    <td class="text-nowrap"><?= $j['no_sk'] ?></td> 
                                                                                    <td class="text-nowrap"><?= date('d-m-Y', strtotime($j['tgl_sk'])) ?></td> 
                                                                                    <td class="text-nowrap">
                                                                                        <?php if($j['status_validasi_modjabatan'] ==1){ ?>
                                                                                            <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                        <?php }else{?>
                                                                                            <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                        <?php }?>
                                                                                    </td> 
                                                                                </tr>
                                                                                
                                                                                <div class="modal fade fill-in" id="jabatan<?=$j['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                                        <i class="pg-close"></i>
                                                                                    </button>
                                                                                    <div class="modal-dialog modal-lg m-0">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header"></div>
                                                                                            <div class="modal-body" >
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-6 ">
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-12 text-nowrap">
                                                                                                                <h5 class="text-left p-b-5"><span class="semi-bold">Riwayat</span> Jabatan</h5>
                                                                                                                <span class="semi-bold">Data</span> Riwayat Jabatan &nbsp;
                                                                                                                    <?php if($j['status_validasi_modjabatan'] ==1){ ?>
                                                                                                                        <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                                                    <?php }else{?>
                                                                                                                        <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                                                    <?php }?>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-6 text-nowrap"><code>Eselon</code></div>
                                                                                                            <div class="col-md-6 text-nowrap"><?= !empty($j['eselon']) ? $j['eselon'] : '-' ?></div>
                                                                                                            <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-6 text-nowrap"><code>Nama Jabatan</code></div>
                                                                                                            <div class="col-md-6 text-nowrap"><?= !empty($j['nm_jabatan']) ? $j['nm_jabatan'] : '-' ?></div>
                                                                                                            <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-6 text-nowrap"><code>Jenis Jabatan</code></div>
                                                                                                            <div class="col-md-6 text-nowrap"><?= !empty($j['jenis_jabatan']) ? $j['jenis_jabatan'] : '-' ?></div>
                                                                                                            <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-6 text-nowrap"><code>Jenjang Jabatan</code></div>
                                                                                                            <div class="col-md-6 text-nowrap"><?= !empty($j['jenjang_jabatan']) ? $j['jenjang_jabatan'] : '-' ?></div>
                                                                                                            <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-6 text-nowrap"><code>TMT Jabatan</code></div>
                                                                                                            <div class="col-md-6 text-nowrap"><?= !empty($j['tmt_jabatan']) ? date('d-m-Y', strtotime($j['tmt_jabatan'])) : '-' ?></div>
                                                                                                            <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-6 text-nowrap"><code>Tanggal Pelantikan</code></div>
                                                                                                            <div class="col-md-6 text-nowrap"><?= !empty($j['tmt_pelantikan']) ? date('d-m-Y', strtotime($j['tmt_pelantikan'])) : '-' ?></div>
                                                                                                            <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-6 text-nowrap"><code>Nomor SK Jabatan</code></div>
                                                                                                            <div class="col-md-6 text-nowrap"><?= !empty($j['no_sk']) ? $j['no_sk'] : '-' ?></div>
                                                                                                            <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-6 text-nowrap"><code>Tanggal SK Jabatan</code></div>
                                                                                                            <div class="col-md-6 text-nowrap"><?= !empty($j['tgl_sk']) ? date('d-m-Y', strtotime($j['tgl_sk'])) : '-' ?></div>
                                                                                                            <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-6 text-nowrap"><code>Pejabat Penetap</code></div>
                                                                                                            <div class="col-md-6 text-nowrap"><?= !empty($j['pejabat_sk']) ? $j['pejabat_sk'] : '-' ?></div>
                                                                                                            <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                        </div>

                                                                                                        <div class="row">
                                                                                                            <div class="col-md-12 text-nowrap">
                                                                                                                <a href="javascript:;" onclick="fileFunctionjab<?= $j['id'] ?>()"><span class="label label-info m-l-5 inline">File SK</span></a>
                                                                                                                <script>
                                                                                                                    function fileFunctionjab<?= $j['id'] ?>() {
                                                                                                                        function doesFileExist(urlToFile) {
                                                                                                                            var xhr = new XMLHttpRequest();
                                                                                                                            xhr.open('HEAD', urlToFile, false);
                                                                                                                            xhr.send();
                                                                                                                            if (xhr.status == "404") {
                                                                                                                                return false;
                                                                                                                            } else {
                                                                                                                                return true;
                                                                                                                            }
                                                                                                                        }
                                                                                                                        var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($j['file_sk_jabatan']) ? $j['file_sk_jabatan'] :  'ups.pdf' ?>");
                                                                                                                        if(result == true){
                                                                                                                            document.getElementById("fjabatan<?=$j['id']?>").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($j['file_sk_jabatan']) ? $j['file_sk_jabatan'] : ''  ?>" width="100%" height="100%"></embed>';
                                                                                                                        }else{
                                                                                                                            document.getElementById("fjabatan<?=$j['id']?>").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                                                                        }
                                                                                                                    }
                                                                                                                </script>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div id="fjabatan<?=$j['id']?>" class="col-lg-6 no-padding sm-m-t-10 sm-text-center">
                                                                                                        <p class="text-center align-middle text-danger bold" style="margin-top:25%;">Tampilkan File!</p>
                                                                                                    </div>
                                                                                                    
                                                                                                    <hr>
                                                                                                </div>
                                                                                                <hr>
                                                                                                <!-- <p class="text-right sm-text-center hinted-text p-t-10 p-r-10">What is it? Terms and conditions</p> -->
                                                                                                <a href="#" <?= $j['status_validasi_modjabatan']==1 ? 'data-toggle="modal" data-target="#jabvalid'.$j['id'].'"':''?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                                                                <a href="#" <?= $j['status_validasi_modjabatan']==1 ? 'data-toggle="modal" data-target="#jabtvalid'.$j['id'].'"':''?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                                                            </div>
                                                                                            <div class="modal-footer"></div>
                                                                                        </div>
                                                                                        <!-- /.modal-content -->
                                                                                    </div>
                                                                                    <!-- /.modal-dialog -->
                                                                                    
                                                                                </div>
                                                                                
                                                                                <div class="modal fade slide-up disable-scroll" id="jabtvalid<?=$j['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                    <div class="modal-dialog ">
                                                                                        <div class="modal-content-wrapper">
                                                                                            <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                <div class="modal-header clearfix text-left">
                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                                    <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                                    <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                                                </div>
                                                                                                <div class="modal-body">
                                                                                                    <?= form_open('admin/validasi_data/validasi_opd_riwayat/jabatan/tidak_valid/'.$j['nip'].'/'.$j['id'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                                        <div class="form-group-attached m-b-5">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12">
                                                                                                                    <div class="form-group form-group-default p-0">
                                                                                                                        <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                                        <textarea name="alasan_notvalid_jabatan" class="w-100" rows="10"></textarea>
                                                                                                                        <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                                        <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?= form_close(); ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal fade slide-up disable-scroll" id="jabvalid<?=$j['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                    <div class="modal-dialog modal-sm">
                                                                                        <div class="modal-content-wrapper">
                                                                                            <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                <div class="modal-body text-center m-t-20">
                                                                                                    <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                                    <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                                    <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                                    
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <a href="<?= base_url('admin/validasi_data/validasi_opd_riwayat/jabatan/valid/'.$j['nip'].'/'.$j['id']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                                    <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- /.modal-content -->
                                                                                    </div>
                                                                                </div>

                                                                            <?php endforeach;?>
                                                                        </tbody>
                                                                    </table>
                                                                    
                                                                </div>
                                                                <div class="col-lg-6"></div>
                                                                <?php else: ?>
                                                                    <p class="m-l-20">List validasi Data Riwayat Jabatan tidak diketemukan</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ====================== DATA RIWAYAT PANGKAT =========================== -->
                                                <div class="card card-default m-b-0 bg-warna-abu">
                                                    <div class="card-header bg-success" role="tab" id="headingTwo">
                                                        <h4 class="card-title" style="color: white;">
                                                            <a  style="color: white;" class="collapsed p-0 text-white" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                Riwayat Kepangkatan
                                                                <?= count($pkt) > 0 ? '<span class="badge badge-important">'.count($pkt).'</span>' : '' ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseTwo" class="collapse" role="tabcard" aria-labelledby="headingTwo">
                                                        <div class="card-block" >
                                                            <div class="row">
                                                                <?php if(!empty($pkt)): ?>
                                                                    <div class="col-lg-12">
                                                                        <h6>
                                                                            <span class="semi-bold">Data Riwayat</span> Pangkat
                                                                        </h6>
                                                                        <table class="table table-sm table-hover table-striped table-responsive w-100">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="text-nowrap text-center"><code>#</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Golongan</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>TMT</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Jenis Pangkat</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>MKG Tahun</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>MKG Bulan</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>No. BAKN</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Tgl. BAKN</code></td>
                                                                                    <td class="text-nowrap text-center"><code>No. SK</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Tanggal SK</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Pejabat Penetap</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Status</code></td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach($pkt as $p): ?>
                                                                                    <tr>
                                                                                        <td><a href="javascript:;" data-toggle="modal" data-target="#pangkat<?=$p['id']?>"><span class="label label-info m-l-5 inline">validasi</span></a></td> 
                                                                                        <td><?= $p['golongan'] ?></td> 
                                                                                        <td><?= date('d-m-Y', strtotime($p['tmt_pangkat'])) ?></td> 
                                                                                        <td><?= $p['nm_kepangkatan'] ?></td> 
                                                                                        <td><?= $p['masa_kerja_golongan_tahun'].' Tahun' ?></td> 
                                                                                        <td><?= $p['masa_kerja_golongan_bulan'].' Bulan' ?></td> 
                                                                                        <td><?= $p['no_bakn'] ?></td> 
                                                                                        <td><?= date('d-m-Y', strtotime($p['tgl_bakn'])) ?></td> 
                                                                                        <td><?= $p['sk_nomor'] ?></td> 
                                                                                        <td><?= date('d-m-Y', strtotime($p['sk_tanggal'])) ?></td> 
                                                                                        <td><?= $p['pejabat_penetap'] ?></td> 
                                                                                        <td>
                                                                                            <?php if($p['status_validasi_modpangkat'] ==1){ ?>
                                                                                                <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                            <?php }else{?>
                                                                                                <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                            <?php }?>
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade fill-in" id="pangkat<?=$p['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                                            <i class="pg-close"></i>
                                                                                        </button>
                                                                                        <div class="modal-dialog modal-lg m-0">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    
                                                                                                </div>
                                                                                                <div class="modal-body" >
                                                                                                    <div class="row">
                                                                                                        <div class="col-lg-6 ">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h5 class="text-left p-b-5"><span class="semi-bold">Riwayat</span> Kepangkatan</h5>
                                                                                                                    <span class="semi-bold">Data</span> Riwayat Pangkat &nbsp;
                                                                                                                        <?php if($p['status_validasi_modpangkat'] ==1){ ?>
                                                                                                                            <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                                                        <?php }else{?>
                                                                                                                            <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                                                        <?php }?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Golongan</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($p['golongan']) ? $p['golongan'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>TMT Pangkat</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($p['tmt_pangkat']) ? date('d-m-Y', strtotime($p['tmt_pangkat'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Jenis Kepangkatan</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($p['nm_kepangkatan']) ? $p['nm_kepangkatan'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Masa Kerja Gol. Tahun</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($p['masa_kerja_golongan_tahun']) ? $p['masa_kerja_golongan_tahun'].' Tahun' : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Masa Kerja Gol. Bulan</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($p['masa_kerja_golongan_bulan']) ? $p['masa_kerja_golongan_bulan'].' Bulan' : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nomor BAKN</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($p['no_bakn']) ? $p['no_bakn'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal BAKN</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($p['tgl_bakn']) ? date('d-m-Y', strtotime($p['tgl_bakn'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nomor SK</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($p['sk_nomor']) ? $p['sk_nomor'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal SK</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($p['sk_tanggal']) ? date('d-m-Y', strtotime($p['sk_tanggal'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Pejabat Penetap</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($p['pejabat_penetap']) ? $p['pejabat_penetap'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h6 class="text-left p-b-5"><span class="semi-bold">File</span> Pendukung</h6>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <a href="javascript:;" onclick="fileFunctionpkt<?= $p['id'] ?>()"><span class="label label-info m-l-5 inline">File SK</span></a>
                                                                                                                    <script>
                                                                                                                        function fileFunctionpkt<?= $p['id'] ?>() {
                                                                                                                            function doesFileExist(urlToFile) {
                                                                                                                                var xhr = new XMLHttpRequest();
                                                                                                                                xhr.open('HEAD', urlToFile, false);
                                                                                                                                xhr.send();
                                                                                                                                if (xhr.status == "404") {
                                                                                                                                    return false;
                                                                                                                                } else {
                                                                                                                                    return true;
                                                                                                                                }
                                                                                                                            }
                                                                                                                            var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($p['file_sk_pangkat']) ? $p['file_sk_pangkat'] :  'ups.pdf' ?>");
                                                                                                                            if(result == true){
                                                                                                                                document.getElementById("fpangkat<?=$p['id']?>").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($p['file_sk_pangkat']) ? $p['file_sk_pangkat'] : ''  ?>" width="100%" height="100%"></embed>';
                                                                                                                            }else{
                                                                                                                                document.getElementById("fpangkat<?=$p['id']?>").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                                                                            }
                                                                                                                        }
                                                                                                                    </script>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div id="fpangkat<?=$p['id']?>" class="col-lg-6 no-padding sm-m-t-10 sm-text-center">
                                                                                                            <p class="text-center align-middle text-danger bold" style="margin-top:25%;">Tampilkan File!</p>
                                                                                                        </div>
                                                                                                        
                                                                                                        <hr>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                    <!-- <p class="text-right sm-text-center hinted-text p-t-10 p-r-10">What is it? Terms and conditions</p> -->
                                                                                                    <a href="#" <?= $p['status_validasi_modpangkat']==1 ? 'data-toggle="modal" data-target="#pkvalid'.$p['id'].'"':''?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                                                                    <a href="#" <?= $p['status_validasi_modpangkat']==1 ? 'data-toggle="modal" data-target="#pktvalid'.$p['id'].'"':''?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                                                                </div>
                                                                                                <div class="modal-footer"></div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                        <!-- /.modal-dialog -->
                                                                                        
                                                                                    </div>
                                                                                    
                                                                                    <div class="modal fade slide-up disable-scroll" id="pktvalid<?=$p['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog ">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-header clearfix text-left">
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                                        <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                                        <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <?= form_open('admin/validasi_data/validasi_opd_riwayat/pangkat/tidak_valid/'.$p['nip'].'/'.$p['id'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                                            <div class="form-group-attached m-b-5">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-12">
                                                                                                                        <div class="form-group form-group-default p-0">
                                                                                                                            <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                                            <textarea name="alasan_notvalid_pangkat" class="w-100" rows="10"></textarea>
                                                                                                                            <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                                            <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <?= form_close(); ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal fade slide-up disable-scroll" id="pkvalid<?=$p['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog modal-sm">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-body text-center m-t-20">
                                                                                                        <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                                        <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                                        <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                                        
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <a href="<?= base_url('admin/validasi_data/validasi_opd_riwayat/pangkat/valid/'.$p['nip'].'/'.$p['id']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                                        <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endforeach;?>
                                                                            </tbody>
                                                                        </table>
                                                                        
                                                                    </div>
                                                                <?php else: ?>
                                                                    <p class="m-l-20">List validasi Data Riwayat Pangkat tidak diketemukan</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ====================== DATA RIWAYAT PENDIDIAKN =========================== -->
                                                <div class="card card-default m-b-0 bg-warna-abu">
                                                    <div class="card-header bg-success" role="tab" id="headingThree">
                                                        <h4 class="card-title">
                                                            <a class="collapsed p-0" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                Riwayat Pendidikan
                                                                <?= count($edu) > 0 ? '<span class="badge badge-important">'.count($edu).'</span>' : '' ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree" class="collapse" role="tabcard" aria-labelledby="headingThree">
                                                        <div class="card-block" >
                                                            <div class="row">
                                                                <?php if(!empty($edu)): ?>
                                                                    <div class="col-lg-12">
                                                                        <h6>
                                                                            <span class="semi-bold">Data Riwayat</span> Pendidikan
                                                                        </h6>
                                                                        <table class="table table-sm table-hover table-striped table-responsive w-100">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="text-nowrap text-center"><code>#</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Jenis Pendidikan</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Jenjang Pendidiakn</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Jurusan</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Nama Lembaga</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Nama Kepala</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Nomor Ijazah</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Tanggal Lulus</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Status</code></td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach($edu as $e): ?>
                                                                                    <tr>
                                                                                        <td><a href="javascript:;" data-toggle="modal" data-target="#pendidikan<?=$e['id']?>"><span class="label label-info m-l-5 inline">validasi</span></a></td> 
                                                                                        <td><?= !empty($e['jenis_pendidikan']) ? ($e['jenis_pendidikan']==1 ? 'Akademik' : 'Profesi') : '-' ?></td> 
                                                                                        <td><?= $e['nm_jpendidikan'] ?></td> 
                                                                                        <td><?= $e['jurusan'] ?></td> 
                                                                                        <td class="text-nowrap"><?= $e['nm_lembaga'] ?></td> 
                                                                                        <td class="text-nowrap"><?= $e['nm_kepala'] ?></td> 
                                                                                        <td><?= $e['no_ijazah'] ?></td> 
                                                                                        <td><?= date('d-m-Y', strtotime($e['tgl_lulus'])) ?></td> 
                                                                                        <td class="text-nowrap">
                                                                                            <?php if($e['status_validasi_modpendidikan'] ==1){ ?>
                                                                                                <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                            <?php }else{?>
                                                                                                <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                            <?php }?>
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade fill-in" id="pendidikan<?=$e['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                                            <i class="pg-close"></i>
                                                                                        </button>
                                                                                        <div class="modal-dialog modal-lg m-0">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    
                                                                                                </div>
                                                                                                <div class="modal-body" >
                                                                                                    <div class="row">
                                                                                                        <div class="col-lg-6 ">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h5 class="text-left p-b-5"><span class="semi-bold">Riwayat</span> Pendidikan</h5>
                                                                                                                    <span class="semi-bold">Data</span> Riwayat Pendidikan &nbsp;
                                                                                                                        <?php if($e['status_validasi_modpendidikan'] ==1){ ?>
                                                                                                                            <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                                                        <?php }else{?>
                                                                                                                            <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                                                        <?php }?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Jenis Pendidiakn</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($e['jenis_pendidikan']) ? ($e['jenis_pendidikan']==1 ? 'Akademik' : 'Profesi') : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Jenjang Pendidikan</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($e['nm_jpendidikan']) ? $e['nm_jpendidikan'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Jurusan</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($e['jurusan']) ? $e['jurusan'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nama Lembaga</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($e['nm_lembaga']) ? $e['nm_lembaga'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nama Kepala</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($e['nm_kepala']) ? $e['nm_kepala'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nomor Ijazah</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($e['no_ijazah']) ? $e['no_ijazah'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal Lulus</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($e['tgl_lulus']) ? date('d-m-Y', strtotime($e['tgl_lulus'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h6 class="text-left p-b-5"><span class="semi-bold">File</span> Pendukung</h6>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <a href="javascript:;" onclick="fileFunctionedu<?= $e['id'] ?>()"><span class="label label-info m-l-5 inline">File Ijazah/Sertifikat</span></a>
                                                                                                                    <script>
                                                                                                                        function fileFunctionedu<?= $e['id'] ?>() {
                                                                                                                            function doesFileExist(urlToFile) {
                                                                                                                                var xhr = new XMLHttpRequest();
                                                                                                                                xhr.open('HEAD', urlToFile, false);
                                                                                                                                xhr.send();
                                                                                                                                if (xhr.status == "404") {
                                                                                                                                    return false;
                                                                                                                                } else {
                                                                                                                                    return true;
                                                                                                                                }
                                                                                                                            }
                                                                                                                            var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($e['file_ijazah_pendidikan']) ? $e['file_ijazah_pendidikan'] :  'ups.pdf' ?>");
                                                                                                                            if(result == true){
                                                                                                                                document.getElementById("fedu<?=$e['id']?>").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($e['file_ijazah_pendidikan']) ? $e['file_ijazah_pendidikan'] : ''  ?>" width="100%" height="100%"></embed>';
                                                                                                                            }else{
                                                                                                                                document.getElementById("fedu<?=$e['id']?>").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                                                                            }
                                                                                                                        }
                                                                                                                    </script>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div id="fedu<?=$e['id']?>" class="col-lg-6 no-padding sm-m-t-10 sm-text-center">
                                                                                                            <p class="text-center align-middle text-danger bold" style="margin-top:25%;">Tampilkan File!</p>
                                                                                                        </div>
                                                                                                        <hr>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                    <!-- <p class="text-right sm-text-center hinted-text p-t-10 p-r-10">What is it? Terms and conditions</p> -->
                                                                                                    <a href="#" <?= $e['status_validasi_modpendidikan']==1 ? 'data-toggle="modal" data-target="#eduvalid'.$e['id'].'"':''?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                                                                    <a href="#" <?= $e['status_validasi_modpendidikan']==1 ? 'data-toggle="modal" data-target="#edutvalid'.$e['id'].'"':''?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                                                                </div>
                                                                                                <div class="modal-footer"></div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                        <!-- /.modal-dialog -->
                                                                                        
                                                                                    </div>
                                                                                    
                                                                                    <div class="modal fade slide-up disable-scroll" id="edutvalid<?=$e['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog ">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-header clearfix text-left">
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                                        <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                                        <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <?= form_open('admin/validasi_data/validasi_opd_riwayat/pendidikan/tidak_valid/'.$e['nip'].'/'.$e['id'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                                            <div class="form-group-attached m-b-5">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-12">
                                                                                                                        <div class="form-group form-group-default p-0">
                                                                                                                            <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                                            <textarea name="alasan_notvalid_pendidikan" class="w-100" rows="10"></textarea>
                                                                                                                            <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                                            <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <?= form_close(); ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal fade slide-up disable-scroll" id="eduvalid<?=$e['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog modal-sm">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-body text-center m-t-20">
                                                                                                        <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                                        <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                                        <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                                        
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <a href="<?= base_url('admin/validasi_data/validasi_opd_riwayat/pendidikan/valid/'.$e['nip'].'/'.$e['id']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                                        <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endforeach;?>
                                                                            </tbody>
                                                                        </table>
                                                                        
                                                                    </div>
                                                                <?php else: ?>
                                                                    <p class="m-l-20">List validasi Data Riwayat Pendidikan tidak diketemukan</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ====================== DATA RIWAYAT DIKLAT =========================== -->
                                                <div class="card card-default m-b-0 bg-warna-abu">
                                                    <div class="card-header bg-success" role="tab" id="headingFor">
                                                        <h4 class="card-title">
                                                            <a class="collapsed p-0" data-toggle="collapse" data-parent="#accordion" href="#collapseFor" aria-expanded="false" aria-controls="collapseFor">
                                                                Riwayat Diklat
                                                                <?= count($dik) > 0 ? '<span class="badge badge-important">'.count($dik).'</span>' : '' ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseFor" class="collapse" role="tabcard" aria-labelledby="headingFor">
                                                        <div class="card-block" >
                                                            <div class="row">
                                                                <?php if(!empty($dik)): ?>
                                                                    <div class="col-lg-12">
                                                                        <h6>
                                                                            <span class="semi-bold">Data Riwayat</span> Diklat 
                                                                        </h6>
                                                                        <table class="table table-sm table-hover table-striped table-responsive w-100">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="text-nowrap text-center"><code>#</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Diklat</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Jenis Diklat</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Nama Diklat</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Penyelenggara</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Jam</code></td> 
                                                                                    <!-- <td class="text-nowrap text-center"><code>Nama Kepala</code></td>  -->
                                                                                    <td class="text-nowrap text-center"><code>Nomor Sertifikat</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Tanggal Sertifikat</code></td>
                                                                                    <!-- <td class="text-nowrap text-center"><code>Diklat Pertama</code></td> -->
                                                                                    <td class="text-nowrap text-center"><code>Status</code></td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach($dik as $d): ?>
                                                                                    <tr>
                                                                                        <td><a href="javascript:;" data-toggle="modal" data-target="#diklat<?=$d['id']?>"><span class="label label-info m-l-5 inline">validasi</span></a></td> 
                                                                                        <td><?= $d['diklat'] ?></td> 
                                                                                        <td><?= $d['jenis_diklat'] ?></td> 
                                                                                        <td><?= $d['nm_diklat'] ?></td> 
                                                                                        <td><?= $d['penyelenggara'] ?></td> 
                                                                                        <td><?= $d['jam'] ?></td> 
                                                                                        <td><?= $d['no_sertifikat'] ?></td> 
                                                                                        <td><?= date('d-m-Y', strtotime($d['tgl_sertifikat'])) ?></td> 
                                                                                        <td class="text-nowrap">
                                                                                            <?php if($d['status_validasi_moddiklat'] ==1){ ?>
                                                                                                <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                            <?php }else{?>
                                                                                                <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                            <?php }?>
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade fill-in" id="diklat<?=$d['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                                            <i class="pg-close"></i>
                                                                                        </button>
                                                                                        <div class="modal-dialog modal-lg m-0">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    
                                                                                                </div>
                                                                                                <div class="modal-body" >
                                                                                                    <div class="row">
                                                                                                        <div class="col-lg-6 ">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h5 class="text-left p-b-5"><span class="semi-bold">Riwayat</span> Diklat</h5>
                                                                                                                    <span class="semi-bold">Data</span> Riwayat Diklat &nbsp;
                                                                                                                    <?php if($d['status_validasi_moddiklat'] ==1){ ?>
                                                                                                                        <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                                                    <?php }else{?>
                                                                                                                        <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                                                    <?php }?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Diklat</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($d['diklat']) ? $d['diklat'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Jenis Diklat</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($d['jenis_diklat']) ? $d['jenis_diklat'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nama Diklat</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($d['nm_diklat']) ? $d['nm_diklat'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Penyelenggara</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($d['penyelenggara']) ? $d['penyelenggara'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Jam</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($d['jam']) ? $d['jam'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nomor Sertifikat</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($d['no_sertifikat']) ? $d['no_sertifikat'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal Sertifikat</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($d['tgl_sertifikat']) ? date('d-m-Y', strtotime($d['tgl_sertifikat'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h6 class="text-left p-b-5"><span class="semi-bold">File</span> Pendukung</h6>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <a href="javascript:;" onclick="fileFunctionedik<?= $d['id'] ?>()"><span class="label label-info m-l-5 inline">File Sertifikat Diklat</span></a>
                                                                                                                    <script>
                                                                                                                        function fileFunctionedik<?= $d['id'] ?>() {
                                                                                                                            function doesFileExist(urlToFile) {
                                                                                                                                var xhr = new XMLHttpRequest();
                                                                                                                                xhr.open('HEAD', urlToFile, false);
                                                                                                                                xhr.send();
                                                                                                                                if (xhr.status == "404") {
                                                                                                                                    return false;
                                                                                                                                } else {
                                                                                                                                    return true;
                                                                                                                                }
                                                                                                                            }
                                                                                                                            var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($d['file_sertifikat_diklat']) ? $d['file_sertifikat_diklat'] :  'ups.pdf' ?>");
                                                                                                                            if(result == true){
                                                                                                                                document.getElementById("fdik<?=$d['id']?>").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($d['file_sertifikat_diklat']) ? $d['file_sertifikat_diklat'] : ''  ?>" width="100%" height="100%"></embed>';
                                                                                                                            }else{
                                                                                                                                document.getElementById("fdik<?=$d['id']?>").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                                                                            }
                                                                                                                        }
                                                                                                                    </script>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div id="fdik<?=$d['id']?>" class="col-lg-6 no-padding sm-m-t-10 sm-text-center">
                                                                                                            <p class="text-center align-middle text-danger bold" style="margin-top:25%;">Tampilkan File!</p>
                                                                                                        </div>
                                                                                                        <hr>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                    <!-- <p class="text-right sm-text-center hinted-text p-t-10 p-r-10">What is it? Terms and conditions</p> -->
                                                                                                    <a href="#" <?= $d['status_validasi_moddiklat']==1 ? 'data-toggle="modal" data-target="#dikvalid'.$d['id'].'"':''?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                                                                    <a href="#" <?= $d['status_validasi_moddiklat']==1 ? 'data-toggle="modal" data-target="#diktvalid'.$d['id'].'"':''?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                                                                </div>
                                                                                                <div class="modal-footer"></div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                        <!-- /.modal-dialog -->
                                                                                        
                                                                                    </div>
                                                                                    
                                                                                    <div class="modal fade slide-up disable-scroll" id="diktvalid<?=$d['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog ">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-header clearfix text-left">
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                                        <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                                        <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <?= form_open('admin/validasi_data/validasi_opd_riwayat/diklat/tidak_valid/'.$d['nip'].'/'.$d['id'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                                            <div class="form-group-attached m-b-5">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-12">
                                                                                                                        <div class="form-group form-group-default p-0">
                                                                                                                            <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                                            <textarea name="alasan_notvalid_diklat" class="w-100" rows="10"></textarea>
                                                                                                                            <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                                            <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <?= form_close(); ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal fade slide-up disable-scroll" id="dikvalid<?=$d['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog modal-sm">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-body text-center m-t-20">
                                                                                                        <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                                        <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                                        <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                                        
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <a href="<?= base_url('admin/validasi_data/validasi_opd_riwayat/diklat/valid/'.$d['nip'].'/'.$d['id']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                                        <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endforeach;?>
                                                                            </tbody>
                                                                        </table>
                                                                        
                                                                    </div>
                                                                <?php else: ?>
                                                                    <p class="m-l-20">List validasi Data Riwayat Diklat tidak diketemukan</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ====================== DATA RIWAYAT SEMINAR =========================== -->
                                                <div class="card card-default m-b-0 bg-warna-abu">
                                                    <div class="card-header bg-success" role="tab" id="headingFive">
                                                        <h4 class="card-title">
                                                            <a class="collapsed p-0" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                                Riwayat Seminar
                                                                <?= count($smr) > 0 ? '<span class="badge badge-important">'.count($smr).'</span>' : '' ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseFive" class="collapse" role="tabcard" aria-labelledby="headingFive">
                                                        <div class="card-block" >
                                                            <div class="row">
                                                                <?php if(!empty($smr)): ?>
                                                                    <div class="col-lg-12">
                                                                        <h6>
                                                                            <span class="semi-bold">Data Riwayat</span> Seminar 
                                                                        </h6>
                                                                        <table class="table table-sm table-hover table-striped table-responsive w-100">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="text-nowrap text-center"><code>#</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Nama Seminar</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Peran dalam Seminar</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Tanggal Seminar</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Penyelenggara</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Jam Seminar</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Status</code></td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach($smr as $sr): ?>
                                                                                    <tr>
                                                                                        <td><a href="javascript:;" data-toggle="modal" data-target="#seminar<?=$sr['id']?>"><span class="label label-info m-l-5 inline">validasi</span></a></td> 
                                                                                        <td><?= $sr['nm_seminar'] ?></td> 
                                                                                        <td><?= $sr['penyelenggara'] ?></td> 
                                                                                        <td><?= date('d-m-Y', strtotime($sr['tgl_seminar'])) ?></td> 
                                                                                        <td><?= $sr['nm_peranan'] ?></td> 
                                                                                        <td><?= $sr['jam_seminar'] ?></td> 
                                                                                        <td class="text-nowrap">
                                                                                            <?php if($sr['status_validasi_modseminar'] ==1){ ?>
                                                                                                <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                            <?php }else{?>
                                                                                                <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                            <?php }?>
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade fill-in" id="seminar<?=$sr['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                                            <i class="pg-close"></i>
                                                                                        </button>
                                                                                        <div class="modal-dialog modal-lg m-0">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    
                                                                                                </div>
                                                                                                <div class="modal-body" >
                                                                                                    <div class="row">
                                                                                                        <div class="col-lg-6 ">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h5 class="text-left p-b-5"><span class="semi-bold">Riwayat</span> Seminar</h5>
                                                                                                                    <span class="semi-bold">Data</span> Riwayat Seminar &nbsp;
                                                                                                                        <?php if($sr['status_validasi_modseminar'] ==1){ ?>
                                                                                                                            <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                                                        <?php }else{?>
                                                                                                                            <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                                                        <?php }?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nama Semianr</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($sr['nm_seminar']) ? $sr['nm_seminar'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Penyelenggara</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($sr['penyelenggara']) ? $sr['penyelenggara'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal Seminar</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($sr['tgl_seminar']) ? date('d-m-Y', strtotime($sr['tgl_seminar'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Peran dalam Seminar</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($sr['nm_peranan']) ? $sr['nm_peranan'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Jam</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($sr['jam_seminar']) ? $sr['jam_seminar'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h6 class="text-left p-b-5"><span class="semi-bold">File</span> Pendukung</h6>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <a href="javascript:;" onclick="fileFunctionsmr<?= $sr['id'] ?>()"><span class="label label-info m-l-5 inline">File Sertifikat Sminar</span></a>
                                                                                                                    <script>
                                                                                                                        function fileFunctionsmr<?= $sr['id'] ?>() {
                                                                                                                            function doesFileExist(urlToFile) {
                                                                                                                                var xhr = new XMLHttpRequest();
                                                                                                                                xhr.open('HEAD', urlToFile, false);
                                                                                                                                xhr.send();
                                                                                                                                if (xhr.status == "404") {
                                                                                                                                    return false;
                                                                                                                                } else {
                                                                                                                                    return true;
                                                                                                                                }
                                                                                                                            }
                                                                                                                            var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($sr['file_sertifikat_seminar']) ? $sr['file_sertifikat_seminar'] :  'ups.pdf' ?>");
                                                                                                                            if(result == true){
                                                                                                                                document.getElementById("fmsr<?=$sr['id']?>").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($sr['file_sertifikat_seminar']) ? $sr['file_sertifikat_seminar'] : ''  ?>" width="100%" height="100%"></embed>';
                                                                                                                            }else{
                                                                                                                                document.getElementById("fmsr<?=$sr['id']?>").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                                                                            }
                                                                                                                        }
                                                                                                                    </script>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div id="fmsr<?=$sr['id']?>" class="col-lg-6 no-padding sm-m-t-10 sm-text-center">
                                                                                                            <p class="text-center align-middle text-danger bold" style="margin-top:25%;">Tampilkan File!</p>
                                                                                                        </div>
                                                                                                        
                                                                                                        <hr>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                    <!-- <p class="text-right sm-text-center hinted-text p-t-10 p-r-10">What is it? Terms and conditions</p> -->
                                                                                                    <a href="#" <?= $sr['status_validasi_modseminar']==1 ? 'data-toggle="modal" data-target="#smrvalid'.$sr['id'].'"':''?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                                                                    <a href="#" <?= $sr['status_validasi_modseminar']==1 ? 'data-toggle="modal" data-target="#smrtvalid'.$sr['id'].'"':''?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                                                                </div>
                                                                                                <div class="modal-footer"></div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                        <!-- /.modal-dialog -->
                                                                                        
                                                                                    </div>
                                                                                    
                                                                                    <div class="modal fade slide-up disable-scroll" id="smrtvalid<?=$sr['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog ">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-header clearfix text-left">
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                                        <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                                        <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <?= form_open('admin/validasi_data/validasi_opd_riwayat/seminar/tidak_valid/'.$sr['nip'].'/'.$sr['id'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                                            <div class="form-group-attached m-b-5">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-12">
                                                                                                                        <div class="form-group form-group-default p-0">
                                                                                                                            <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                                            <textarea name="alasan_notvalid_seminar" class="w-100" rows="10"></textarea>
                                                                                                                            <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                                            <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <?= form_close(); ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal fade slide-up disable-scroll" id="smrvalid<?=$sr['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog modal-sm">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-body text-center m-t-20">
                                                                                                        <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                                        <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                                        <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                                        
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <a href="<?= base_url('admin/validasi_data/validasi_opd_riwayat/seminar/valid/'.$sr['nip'].'/'.$sr['id']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                                        <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endforeach;?>
                                                                            </tbody>
                                                                        </table>
                                                                        
                                                                    </div>
                                                                <?php else: ?>
                                                                    <p class="m-l-20">List validasi Data Riwayat Seminar tidak diketemukan</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ====================== DATA RIWAYAT HUKUMAN =========================== -->
                                                <div class="card card-default m-b-0 bg-warna-abu">
                                                    <div class="card-header bg-success" role="tab" id="headingSix">
                                                        <h4 class="card-title">
                                                            <a class="collapsed p-0" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                                Riwayat Hukuman
                                                                <?= count($huk) > 0 ? '<span class="badge badge-important">'.count($huk).'</span>' : '' ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseSix" class="collapse" role="tabcard" aria-labelledby="headingSix">
                                                        <div class="card-block" >
                                                            <div class="row">
                                                                <?php if(!empty($huk)): ?>
                                                                    <div class="col-lg-12">
                                                                        <h6>
                                                                            <span class="semi-bold">Data Riwayat</span> Hukuman 
                                                                        </h6>
                                                                        <table class="table table-sm table-hover table-striped table-responsive w-100">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="text-nowrap text-center"><code>#</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Jenis Hukuman</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Hukuman</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>No. SK Hukuman</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Tgl. SK Hukuman</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>TMT Hukuman</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Masa Hukuman Tahun</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Masa Hukuman Bulan</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>No. SK Pembatalan</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Tgl. SK Pembatalan</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Status</code></td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach($huk as $h): ?>
                                                                                    <tr>
                                                                                        <td><a href="javascript:;" data-toggle="modal" data-target="#hukuman<?=$h['id']?>"><span class="label label-info m-l-5 inline">validasi</span></a></td> 
                                                                                        <td><?= $h['jenis_hukuman'] ?></td> 
                                                                                        <td><?= $h['nm_hukuman'] ?></td> 
                                                                                        <td><?= $h['no_sk'] ?></td> 
                                                                                        <td><?= $h['tgl_sk'] ?></td> 
                                                                                        <td><?= $h['tmt_hukuman'] ?></td> 
                                                                                        <td><?= $h['masa_hukuman_tahun'] ?></td> 
                                                                                        <td><?= $h['masa_hukuman_bulan'] ?></td> 
                                                                                        <td><?= $h['no_sk_pembatalan'] ?></td> 
                                                                                        <td><?= $h['tgl_sk_pembatalan'] ?></td> 
                                                                                        <td><?= $h['alasan_hukuman'] ?></td> 
                                                                                        <td class="text-nowrap">
                                                                                            <?php if($h['status_validasi_modhukuman'] ==1){ ?>
                                                                                                <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                            <?php }else{?>
                                                                                                <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                            <?php }?>
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade fill-in" id="hukuman<?=$h['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                                            <i class="pg-close"></i>
                                                                                        </button>
                                                                                        <div class="modal-dialog modal-lg m-0">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    
                                                                                                </div>
                                                                                                <div class="modal-body" >
                                                                                                    <div class="row">
                                                                                                        <div class="col-lg-6 ">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h5 class="text-left p-b-5"><span class="semi-bold">Riwayat</span> Hukuman</h5>
                                                                                                                    <span class="semi-bold">Data</span> Riwayat Hukuman &nbsp;
                                                                                                                        <?php if($h['status_validasi_modhukuman'] ==1){ ?>
                                                                                                                            <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                                                        <?php }else{?>
                                                                                                                            <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                                                        <?php }?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Jenis Hukuman</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($h['jenis_hukuman']) ? $h['jenis_hukuman'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nama Hukuman</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($h['nm_hukuman']) ? $h['nm_hukuman'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nomor SK Hukuman</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($h['no_sk']) ? $h['no_sk'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal SK Hukuman</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($h['tgl_sk']) ? $h['tgl_sk'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>TMT Hukuman</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($h['tmt_hukuman']) ? $h['tmt_hukuman'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Masa Hukuman Tahun</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($h['masa_hukuman_tahun']) ? $h['masa_hukuman_tahun'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Masa Hukuman Bulan</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($h['masa_hukuman_bulan']) ? $h['masa_hukuman_bulan'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>No SK Batal Hukuman</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($h['no_sk_pembatalan']) ? $h['no_sk_pembatalan'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal SK Batal Hukuman</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($h['tgl_sk_pembatalan']) ? date('d-m-Y', strtotime($h['tgl_sk_pembatalan'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h6 class="text-left p-b-5"><span class="semi-bold">File</span> Pendukung</h6>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <a href="javascript:;" onclick="fileFunctionhuk<?= $h['id'] ?>()"><span class="label label-info m-l-5 inline">File SK Hukuman</span></a>
                                                                                                                    <script>
                                                                                                                        function fileFunctionhuk<?= $h['id'] ?>() {
                                                                                                                            function doesFileExist(urlToFile) {
                                                                                                                                var xhr = new XMLHttpRequest();
                                                                                                                                xhr.open('HEAD', urlToFile, false);
                                                                                                                                xhr.send();
                                                                                                                                if (xhr.status == "404") {
                                                                                                                                    return false;
                                                                                                                                } else {
                                                                                                                                    return true;
                                                                                                                                }
                                                                                                                            }
                                                                                                                            var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($h['file_sk_hukuman']) ? $h['file_sk_hukuman'] :  'ups.pdf' ?>");
                                                                                                                            if(result == true){
                                                                                                                                document.getElementById("fhuk<?=$h['id']?>").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($h['file_sk_hukuman']) ? $h['file_sk_hukuman'] : ''  ?>" width="100%" height="100%"></embed>';
                                                                                                                            }else{
                                                                                                                                document.getElementById("fhuk<?=$h['id']?>").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                                                                            }
                                                                                                                        }
                                                                                                                    </script>
                                                                                                                    <a href="javascript:;" onclick="fileFunctionhukbatal<?= $h['id'] ?>()"><span class="label label-info m-l-5 inline">File SK Pembatalan Hukuman</span></a>
                                                                                                                    <script>
                                                                                                                        function fileFunctionhukbatal<?= $h['id'] ?>() {
                                                                                                                            function doesFileExist(urlToFile) {
                                                                                                                                var xhr = new XMLHttpRequest();
                                                                                                                                xhr.open('HEAD', urlToFile, false);
                                                                                                                                xhr.send();
                                                                                                                                if (xhr.status == "404") {
                                                                                                                                    return false;
                                                                                                                                } else {
                                                                                                                                    return true;
                                                                                                                                }
                                                                                                                            }
                                                                                                                            var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($h['file_sk_pembatalan_hukuman']) ? $h['file_sk_pembatalan_hukuman'] :  'ups.pdf' ?>");
                                                                                                                            if(result == true){
                                                                                                                                document.getElementById("fhuk<?=$h['id']?>").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($h['file_sk_pembatalan_hukuman']) ? $h['file_sk_pembatalan_hukuman'] : ''  ?>" width="100%" height="100%"></embed>';
                                                                                                                            }else{
                                                                                                                                document.getElementById("fhuk<?=$h['id']?>").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                                                                            }
                                                                                                                        }
                                                                                                                    </script>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div id="fhuk<?=$h['id']?>" class="col-lg-6 no-padding sm-m-t-10 sm-text-center">
                                                                                                            <p class="text-center align-middle text-danger bold" style="margin-top:25%;">Tampilkan File!</p>
                                                                                                        </div>
                                                                                                        
                                                                                                        <hr>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                    <!-- <p class="text-right sm-text-center hinted-text p-t-10 p-r-10">What is it? Terms and conditions</p> -->
                                                                                                    <a href="#" <?= $h['status_validasi_modhukuman']==1 ? 'data-toggle="modal" data-target="#hukvalid'.$h['id'].'"':''?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                                                                    <a href="#" <?= $h['status_validasi_modhukuman']==1 ? 'data-toggle="modal" data-target="#huktvalid'.$h['id'].'"':''?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                                                                </div>
                                                                                                <div class="modal-footer"></div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                        <!-- /.modal-dialog -->
                                                                                        
                                                                                    </div>
                                                                                    
                                                                                    <div class="modal fade slide-up disable-scroll" id="huktvalid<?=$h['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog ">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-header clearfix text-left">
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                                        <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                                        <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <?= form_open('admin/validasi_data/validasi_opd_riwayat/hukuman/tidak_valid/'.$h['nip'].'/'.$h['id'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                                            <div class="form-group-attached m-b-5">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-12">
                                                                                                                        <div class="form-group form-group-default p-0">
                                                                                                                            <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                                            <textarea name="alasan_notvalid_hukuman" class="w-100" rows="10"></textarea>
                                                                                                                            <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                                            <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <?= form_close(); ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal fade slide-up disable-scroll" id="hukvalid<?=$h['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog modal-sm">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-body text-center m-t-20">
                                                                                                        <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                                        <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                                        <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                                        
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <a href="<?= base_url('admin/validasi_data/validasi_opd_riwayat/hukuman/valid/'.$h['nip'].'/'.$h['id']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                                        <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endforeach;?>
                                                                            </tbody>
                                                                        </table>
                                                                        
                                                                    </div>
                                                                <?php else: ?>
                                                                    <p class="m-l-20">List validasi Data Riwayat Hukuman tidak diketemukan</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ====================== DATA RIWAYAT KGB =========================== -->
                                                <div class="card card-default m-b-0 bg-warna-abu">
                                                    <div class="card-header bg-success" role="tab" id="headingSeven">
                                                        <h4 class="card-title">
                                                            <a class="collapsed p-0" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                                Riwayat KGB
                                                                <?= count($kgb) > 0 ? '<span class="badge badge-important">'.count($kgb).'</span>' : '' ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseSeven" class="collapse" role="tabcard" aria-labelledby="headingSeven">
                                                        <div class="card-block" >
                                                            <div class="row">
                                                                <?php if(!empty($kgb)): ?>
                                                                    <div class="col-lg-12">
                                                                        <h6>
                                                                            <span class="semi-bold">Data Riwayat</span> KGB 
                                                                        </h6>
                                                                        <table class="table table-sm table-hover table-striped table-responsive w-100">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="text-nowrap text-center"><code>#</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Golongan</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Nomor SK</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Tanggal SK</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>TMT KGB</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Masa Kerja KGB Tahun</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Masa Kerja KGB Bulan</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Gaji Pokok</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Gaji Bersih</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Status</code></td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach($kgb as $kg): ?>
                                                                                    <tr>
                                                                                        <td><a href="javascript:;" data-toggle="modal" data-target="#kgb<?=$kg['id']?>"><span class="label label-info m-l-5 inline">validasi</span></a></td> 
                                                                                        <td><?= $kg['golongan'] ?></td> 
                                                                                        <td><?= $kg['no_sk'] ?></td> 
                                                                                        <td><?= !empty($kg['tgl_sk']) ? date('d-m-Y', strtotime($kg['tgl_sk'])) : '-' ?></td> 
                                                                                        <td><?= !empty($kg['tmt_kgb']) ? date('d-m-Y', strtotime($kg['tmt_kgb'])) : '-' ?></td> 
                                                                                        <td><?= $kg['masa_kerja_kgb_tahun'].' Tahun' ?></td> 
                                                                                        <td><?= $kg['masa_kerja_kgb_bulan'].' Bulan' ?></td> 
                                                                                        <td>Rp <?= number_format($kg['gaji_pokok'],0,',','.'); ?></td> 
                                                                                        <td>Rp <?= number_format($kg['gaji_bersih'],0,',','.'); ?></td> 
                                                                                        <td class="text-nowrap">
                                                                                            <?php if($kg['status_validasi_modkgb'] ==1){ ?>
                                                                                                <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                            <?php }else{?>
                                                                                                <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                            <?php }?>
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade fill-in" id="kgb<?=$kg['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                                            <i class="pg-close"></i>
                                                                                        </button>
                                                                                        <div class="modal-dialog modal-lg m-0">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    
                                                                                                </div>
                                                                                                <div class="modal-body" >
                                                                                                    <div class="row">
                                                                                                        <div class="col-lg-6 ">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h5 class="text-left p-b-5"><span class="semi-bold">Riwayat</span> KGB</h5>
                                                                                                                    <span class="semi-bold">Data</span> Riwayat KGB &nbsp;
                                                                                                                        <?php if($kg['status_validasi_modkgb'] ==1){ ?>
                                                                                                                            <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                                                        <?php }else{?>
                                                                                                                            <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                                                        <?php }?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Golongan</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($kg['golongan']) ? $kg['golongan'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nomor SK</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($kg['no_sk']) ? $kg['no_sk'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal SK</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($kg['tgl_sk']) ? date('d-m-Y', strtotime($kg['tgl_sk'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>TMT KGB</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($kg['tmt_kgb']) ? date('d-m-Y', strtotime($kg['tmt_kgb'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Masa Kerja KGB Tahun</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($kg['masa_kerja_kgb_tahun']) ? $kg['masa_kerja_kgb_tahun'].' Tahun' : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Masa Kerja KGB Bulan</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($kg['masa_kerja_kgb_bulan']) ? $kg['masa_kerja_kgb_bulan']. ' Bulan' : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Gaji Pokok</code></div>
                                                                                                                <div class="col-md-6 text-nowrap">Rp <?= !empty($kg['gaji_pokok']) ? number_format($kg['gaji_pokok'],0,',','.') : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Gaji Bersih</code></div>
                                                                                                                <div class="col-md-6 text-nowrap">Rp <?= !empty($kg['gaji_bersih']) ? number_format($kg['gaji_bersih'],0,',','.') : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h6 class="text-left p-b-5"><span class="semi-bold">File</span> Pendukung</h6>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <a href="javascript:;" onclick="fileFunctionkgb<?= $kg['id'] ?>()"><span class="label label-info m-l-5 inline">File SK KGB</span></a>
                                                                                                                    <script>
                                                                                                                        function fileFunctionkgb<?= $kg['id'] ?>() {
                                                                                                                            function doesFileExist(urlToFile) {
                                                                                                                                var xhr = new XMLHttpRequest();
                                                                                                                                xhr.open('HEAD', urlToFile, false);
                                                                                                                                xhr.send();
                                                                                                                                if (xhr.status == "404") {
                                                                                                                                    return false;
                                                                                                                                } else {
                                                                                                                                    return true;
                                                                                                                                }
                                                                                                                            }
                                                                                                                            var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($kg['file_sk_kgb']) ? $kg['file_sk_kgb'] :  'ups.pdf' ?>");
                                                                                                                            if(result == true){
                                                                                                                                document.getElementById("fkgb<?=$kg['id']?>").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($kg['file_sk_kgb']) ? $kg['file_sk_kgb'] : ''  ?>" width="100%" height="100%"></embed>';
                                                                                                                            }else{
                                                                                                                                document.getElementById("fkgb<?=$kg['id']?>").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                                                                            }
                                                                                                                        }
                                                                                                                    </script>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div id="fkgb<?=$kg['id']?>" class="col-lg-6 no-padding sm-m-t-10 sm-text-center">
                                                                                                            <p class="text-center align-middle text-danger bold" style="margin-top:25%;">Tampilkan File!</p>
                                                                                                        </div>
                                                                                                        
                                                                                                        <hr>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                    <!-- <p class="text-right sm-text-center hinted-text p-t-10 p-r-10">What is it? Terms and conditions</p> -->
                                                                                                    <a href="#" <?= $kg['status_validasi_modkgb']==1 ? 'data-toggle="modal" data-target="#kgbvalid'.$kg['id'].'"':''?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                                                                    <a href="#" <?= $kg['status_validasi_modkgb']==1 ? 'data-toggle="modal" data-target="#kgbtvalid'.$kg['id'].'"':''?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                                                                </div>
                                                                                                <div class="modal-footer"></div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                        <!-- /.modal-dialog -->
                                                                                        
                                                                                    </div>
                                                                                    
                                                                                    <div class="modal fade slide-up disable-scroll" id="kgbtvalid<?=$kg['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog ">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-header clearfix text-left">
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                                        <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                                        <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <?= form_open('admin/validasi_data/validasi_opd_riwayat/kgb/tidak_valid/'.$kg['nip'].'/'.$kg['id'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                                            <div class="form-group-attached m-b-5">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-12">
                                                                                                                        <div class="form-group form-group-default p-0">
                                                                                                                            <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                                            <textarea name="alasan_notvalid_kgb" class="w-100" rows="10"></textarea>
                                                                                                                            <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                                            <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <?= form_close(); ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal fade slide-up disable-scroll" id="kgbvalid<?=$kg['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog modal-sm">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-body text-center m-t-20">
                                                                                                        <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                                        <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                                        <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                                        
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <a href="<?= base_url('admin/validasi_data/validasi_opd_riwayat/kgb/valid/'.$kg['nip'].'/'.$kg['id']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                                        <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endforeach;?>
                                                                            </tbody>
                                                                        </table>
                                                                        
                                                                    </div>
                                                                <?php else: ?>
                                                                    <p class="m-l-20">List validasi Data Riwayat KGB tidak diketemukan</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ====================== DATA RIWAYAT KREDIT =========================== -->
                                                <div class="card card-default m-b-0 bg-warna-abu">
                                                    <div class="card-header bg-success" role="tab" id="headingEight">
                                                        <h4 class="card-title">
                                                            <a class="collapsed p-0" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                                Riwayat Kredit
                                                                <?= count($kre) > 0 ? '<span class="badge badge-important">'.count($kre).'</span>' : '' ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseEight" class="collapse" role="tabcard" aria-labelledby="headingEight">
                                                        <div class="card-block" >
                                                            <div class="row">
                                                                <?php if(!empty($kre)): ?>
                                                                    <div class="col-lg-12">
                                                                        <h6>
                                                                            <span class="semi-bold">Data Riwayat</span> Kredit 
                                                                        </h6>
                                                                        <table class="table table-sm table-hover table-striped table-responsive w-100">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="text-nowrap text-center"><code>#</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Kredit Utama</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Kredit Penunjang</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Nomor SK</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Tanggal SK</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Tanggal Awal</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Tanggal Akhir</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Nama Jabatan</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Status</code></td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach($kre as $kr): ?>
                                                                                    <tr>
                                                                                        <td><a href="javascript:;" data-toggle="modal" data-target="#kredit<?=$kr['id']?>"><span class="label label-info m-l-5 inline">validasi</span></a></td> 
                                                                                        <td><?= $kr['kredit_utama'] ?></td> 
                                                                                        <td><?= $kr['kredit_penunjang'] ?></td> 
                                                                                        <td><?= $kr['no_sk'] ?></td> 
                                                                                        <td><?= !empty($kr['tgl_sk']) ? date('d-m-Y', strtotime($kr['tgl_sk'])) : '-' ?></td> 
                                                                                        <td><?= !empty($kr['tgl_awal']) ? date('d-m-Y', strtotime($kr['tgl_awal'])) : '-' ?></td> 
                                                                                        <td><?= !empty($kr['tgl_akhir']) ? date('d-m-Y', strtotime($kr['tgl_akhir'])) : '-' ?></td> 
                                                                                        <td><?= $kr['nm_jabatan'] ?></td> 
                                                                                        <td class="text-nowrap">
                                                                                            <?php if($kr['status_validasi_modkredit'] ==1){ ?>
                                                                                                <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                            <?php }else{?>
                                                                                                <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                            <?php }?>
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade fill-in" id="kredit<?=$kr['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                                            <i class="pg-close"></i>
                                                                                        </button>
                                                                                        <div class="modal-dialog modal-lg m-0">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    
                                                                                                </div>
                                                                                                <div class="modal-body" >
                                                                                                    <div class="row">
                                                                                                        <div class="col-lg-6 ">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h5 class="text-left p-b-5"><span class="semi-bold">Riwayat</span> Kredit</h5>
                                                                                                                    <span class="semi-bold">Data</span> Riwayat Kredit&nbsp;
                                                                                                                        <?php if($kr['status_validasi_modkredit'] ==1){ ?>
                                                                                                                            <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                                                        <?php }else{?>
                                                                                                                            <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                                                        <?php }?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Kredit Utama</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($kr['kredit_utama']) ? $kr['kredit_utama'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Kredit Penunjang</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($kr['kredit_penunjang']) ? $kr['kredit_penunjang'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nomor SK</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($kr['no_sk']) ? $kr['no_sk'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal SK</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($kr['tgl_sk']) ? date('d-m-Y', strtotime($kr['tgl_sk'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal Awal</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($kr['tgl_awal']) ? date('d-m-Y', strtotime($kr['tgl_awal'])): '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal Akhir</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($kr['tgl_akhir']) ? date('d-m-Y', strtotime($kr['tgl_akhir'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nama Jabatan</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($kr['nm_jabatan']) ? $kr['nm_jabatan'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h6 class="text-left p-b-5"><span class="semi-bold">File</span> Pendukung</h6>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <a href="javascript:;" onclick="fileFunctionkre<?= $kr['id'] ?>()"><span class="label label-info m-l-5 inline">File SK PAK Kredit</span></a>
                                                                                                                    <script>
                                                                                                                        function fileFunctionkre<?= $kr['id'] ?>() {
                                                                                                                            function doesFileExist(urlToFile) {
                                                                                                                                var xhr = new XMLHttpRequest();
                                                                                                                                xhr.open('HEAD', urlToFile, false);
                                                                                                                                xhr.send();
                                                                                                                                if (xhr.status == "404") {
                                                                                                                                    return false;
                                                                                                                                } else {
                                                                                                                                    return true;
                                                                                                                                }
                                                                                                                            }
                                                                                                                            var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($kr['file_sk_kredit']) ? $kr['file_sk_kredit'] :  'ups.pdf' ?>");
                                                                                                                            if(result == true){
                                                                                                                                document.getElementById("fkre<?=$kr['id']?>").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($kr['file_sk_kredit']) ? $kr['file_sk_kredit'] : ''  ?>" width="100%" height="100%"></embed>';
                                                                                                                            }else{
                                                                                                                                document.getElementById("fkre<?=$kr['id']?>").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                                                                            }
                                                                                                                        }
                                                                                                                    </script>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div id="fkre<?=$kr['id']?>" class="col-lg-6 no-padding sm-m-t-10 sm-text-center">
                                                                                                            <p class="text-center align-middle text-danger bold" style="margin-top:25%;">Tampilkan File!</p>
                                                                                                        </div>
                                                                                                        
                                                                                                        <hr>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                    <!-- <p class="text-right sm-text-center hinted-text p-t-10 p-r-10">What is it? Terms and conditions</p> -->
                                                                                                    <a href="#" <?= $kr['status_validasi_modkredit']==1 ? 'data-toggle="modal" data-target="#kreditvalid'.$kr['id'].'"':''?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                                                                    <a href="#" <?= $kr['status_validasi_modkredit']==1 ? 'data-toggle="modal" data-target="#kredittvalid'.$kr['id'].'"':''?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                                                                </div>
                                                                                                <div class="modal-footer"></div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                        <!-- /.modal-dialog -->
                                                                                        
                                                                                    </div>
                                                                                    
                                                                                    <div class="modal fade slide-up disable-scroll" id="kredittvalid<?=$kr['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog ">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-header clearfix text-left">
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                                        <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                                        <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <?= form_open('admin/validasi_data/validasi_opd_riwayat/kredit/tidak_valid/'.$kr['nip'].'/'.$kr['id'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                                            <div class="form-group-attached m-b-5">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-12">
                                                                                                                        <div class="form-group form-group-default p-0">
                                                                                                                            <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                                            <textarea name="alasan_notvalid_kredit" class="w-100" rows="10"></textarea>
                                                                                                                            <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                                            <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <?= form_close(); ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal fade slide-up disable-scroll" id="kreditvalid<?=$kr['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog modal-sm">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-body text-center m-t-20">
                                                                                                        <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                                        <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                                        <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                                        
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <a href="<?= base_url('admin/validasi_data/validasi_opd_riwayat/kredit/valid/'.$kr['nip'].'/'.$kr['id']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                                        <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endforeach;?>
                                                                            </tbody>
                                                                        </table>
                                                                        
                                                                    </div>
                                                                <?php else: ?>
                                                                    <p class="m-l-20">List validasi Data Riwayat Kredit tidak diketemukan</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ====================== DATA RIWAYAT PENGHARGAAN =========================== -->
                                                <div class="card card-default m-b-0 bg-warna-abu">
                                                    <div class="card-header bg-success" role="tab" id="headingNine">
                                                        <h4 class="card-title">
                                                            <a class="collapsed p-0" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                                Riwayat Penghargaan
                                                                <?= count($tdj) > 0 ? '<span class="badge badge-important">'.count($tdj).'</span>' : '' ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseNine" class="collapse" role="tabcard" aria-labelledby="headingNine">
                                                        <div class="card-block" >
                                                            <div class="row">
                                                                <?php if(!empty($tdj)): ?>
                                                                    <div class="col-lg-12">
                                                                        <h6>
                                                                            <span class="semi-bold">Data Riwayat</span> Penghargaan 
                                                                        </h6>
                                                                        <table class="table table-sm table-hover table-striped table-responsive w-100">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="text-nowrap text-center"><code>#</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Nama Penghargaan</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Nomor SK</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Tanggal SK</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Pejabat</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Instansi</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Status</code></td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach($tdj as $tj): ?>
                                                                                    <tr>
                                                                                        <td><a href="javascript:;" data-toggle="modal" data-target="#penghargaan<?=$tj['id']?>"><span class="label label-info m-l-5 inline">validasi</span></a></td> 
                                                                                        <td><?= $tj['tandajasa'] ?></td> 
                                                                                        <td><?= $tj['sk_nomor'] ?></td> 
                                                                                        <td><?= !empty($tj['sk_tanggal']) ? date('d-m-Y', strtotime($tj['sk_tanggal'])) : '-' ?></td> 
                                                                                        <td><?= $tj['sk_pejabat'] ?></td> 
                                                                                        <td><?= $tj['instansi'] ?></td> 
                                                                                        <td class="text-nowrap">
                                                                                            <?php if($tj['status_validasi_modtandajasa'] ==1){ ?>
                                                                                                <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                            <?php }else{?>
                                                                                                <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                            <?php }?>
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade fill-in" id="penghargaan<?=$tj['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                                            <i class="pg-close"></i>
                                                                                        </button>
                                                                                        <div class="modal-dialog modal-lg m-0">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    
                                                                                                </div>
                                                                                                <div class="modal-body" >
                                                                                                    <div class="row">
                                                                                                        <div class="col-lg-6 ">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h5 class="text-left p-b-5"><span class="semi-bold">Riwayat</span> Penghargaan</h5>
                                                                                                                    <span class="semi-bold">Data</span> Riwayat Penghargaan &nbsp;
                                                                                                                        <?php if($tj['status_validasi_modtandajasa'] ==1){ ?>
                                                                                                                            <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                                                        <?php }else{?>
                                                                                                                            <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                                                        <?php }?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nama Penghargaan</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($tj['tandajasa']) ? $tj['tandajasa'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Pejabat</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($tj['sk_pejabat']) ? $tj['sk_pejabat'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nomor SK</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($tj['sk_nomor']) ? $tj['sk_nomor'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal SK</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($tj['sk_tanggal']) ? date('d-m-Y', strtotime($tj['sk_tanggal'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Instansi</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($tj['instansi']) ? $tj['instansi'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h6 class="text-left p-b-5"><span class="semi-bold">File</span> Pendukung</h6>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <a href="javascript:;" onclick="fileFunctiontdj<?= $tj['id'] ?>()"><span class="label label-info m-l-5 inline">File Sertifikat/Piagam Penghargaan</span></a>
                                                                                                                    <script>
                                                                                                                        function fileFunctiontdj<?= $tj['id'] ?>() {
                                                                                                                            function doesFileExist(urlToFile) {
                                                                                                                                var xhr = new XMLHttpRequest();
                                                                                                                                xhr.open('HEAD', urlToFile, false);
                                                                                                                                xhr.send();
                                                                                                                                if (xhr.status == "404") {
                                                                                                                                    return false;
                                                                                                                                } else {
                                                                                                                                    return true;
                                                                                                                                }
                                                                                                                            }
                                                                                                                            var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($tj['file_sk_tandajasa']) ? $tj['file_sk_tandajasa'] :  'ups.pdf' ?>");
                                                                                                                            if(result == true){
                                                                                                                                document.getElementById("ftdj<?=$tj['id']?>").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($tj['file_sk_tandajasa']) ? $tj['file_sk_tandajasa'] : ''  ?>" width="100%" height="100%"></embed>';
                                                                                                                            }else{
                                                                                                                                document.getElementById("ftdj<?=$tj['id']?>").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                                                                            }
                                                                                                                        }
                                                                                                                    </script>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div id="ftdj<?=$tj['id']?>" class="col-lg-6 no-padding sm-m-t-10 sm-text-center">
                                                                                                            <p class="text-center align-middle text-danger bold" style="margin-top:25%;">Tampilkan File!</p>
                                                                                                        </div>
                                                                                                        
                                                                                                        <hr>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                    <!-- <p class="text-right sm-text-center hinted-text p-t-10 p-r-10">What is it? Terms and conditions</p> -->
                                                                                                    <a href="#" <?= $tj['status_validasi_modtandajasa']==1 ? 'data-toggle="modal" data-target="#tdjvalid'.$tj['id'].'"':''?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                                                                    <a href="#" <?= $tj['status_validasi_modtandajasa']==1 ? 'data-toggle="modal" data-target="#tdjtvalid'.$tj['id'].'"':''?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                                                                </div>
                                                                                                <div class="modal-footer"></div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                        <!-- /.modal-dialog -->
                                                                                        
                                                                                    </div>
                                                                                    
                                                                                    <div class="modal fade slide-up disable-scroll" id="tdjtvalid<?=$tj['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog ">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-header clearfix text-left">
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                                        <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                                        <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <?= form_open('admin/validasi_data/validasi_opd_riwayat/tandajasa/tidak_valid/'.$tj['nip'].'/'.$tj['id'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                                            <div class="form-group-attached m-b-5">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-12">
                                                                                                                        <div class="form-group form-group-default p-0">
                                                                                                                            <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                                            <textarea name="alasan_notvalid_tandajasa" class="w-100" rows="10"></textarea>
                                                                                                                            <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                                            <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <?= form_close(); ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal fade slide-up disable-scroll" id="tdjvalid<?=$tj['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog modal-sm">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-body text-center m-t-20">
                                                                                                        <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                                        <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                                        <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                                        
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <a href="<?= base_url('admin/validasi_data/validasi_opd_riwayat/tandajasa/valid/'.$tj['nip'].'/'.$tj['id']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                                        <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endforeach;?>
                                                                            </tbody>
                                                                        </table>
                                                                        
                                                                    </div>
                                                                <?php else: ?>
                                                                    <p class="m-l-20">List validasi Data Riwayat Penghargaan tidak diketemukan</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ====================== DATA RIWAYAT KELUARGA ORANGTUA =========================== -->
                                                <div class="card card-default m-b-0 bg-warna-abu">
                                                    <div class="card-header bg-success" role="tab" id="headingOrtu">
                                                        <h4 class="card-title">
                                                            <a class="collapsed p-0" data-toggle="collapse" data-parent="#accordion" href="#collapseOrtu" aria-expanded="false" aria-controls="collapseOrtu">
                                                                Riwayat Orangtua
                                                                <?= count($ot) > 0 ? '<span class="badge badge-important">'.count($ot).'</span>' : '' ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOrtu" class="collapse" role="tabcard" aria-labelledby="headingOrtu">
                                                        <div class="card-block" >
                                                            <div class="row">
                                                                <?php if(!empty($ot)): ?>
                                                                    <div class="col-lg-12">
                                                                        <h6>
                                                                            <span class="semi-bold">Data Riwayat</span> Orangtua 
                                                                        </h6>
                                                                        <table class="table table-sm table-hover table-striped table-responsive w-100">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="text-nowrap text-center"><code>#</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Nama Orangtua</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Status Orangtua</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Tempat Lahir</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Tanggal Lahir</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Pekerjaan</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Alamat</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Status Dasar</code></td> 
                                                                                    <!-- <td class="text-nowrap text-center"><code>Tanggal Meninggal</code></td>
                                                                                    <td class="text-nowrap text-center"><code>No. Akte Meninggal</code></td> -->
                                                                                    <td class="text-nowrap text-center"><code>Status</code></td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach($ot as $o): ?>
                                                                                    <tr>
                                                                                        <td><a href="javascript:;" data-toggle="modal" data-target="#orangtua<?=$o['id']?>"><span class="label label-info m-l-5 inline">validasi</span></a></td> 
                                                                                        <td><?= $o['nama'] ?></td> 
                                                                                        <td><?= $o['nm_orangtua'] ?></td> 
                                                                                        <td><?= $o['tempatlahir'] ?></td> 
                                                                                        <td><?= !empty($o['tanggallahir']) ? date('d-m-Y', strtotime($o['tanggallahir'])) : '-' ?></td> 
                                                                                        <td><?= $o['pekerjaan'] ?></td> 
                                                                                        <td><?= $o['alamat'] ?></td> 
                                                                                        <td><?= $o['status_dasar'].'<br>' ?>
                                                                                            <?php
                                                                                                if(!empty($o['status_dasar']) && $o['status_dasar']==3){
                                                                                                    echo 'No. Akta Meninggal : '.!empty($o['no_akte_meninggal']) ? $o['no_akte_meninggal'].'<br>' : '- <br>';
                                                                                                    echo 'Tanggal Meninggal  : '.!empty($o['tanggalmeninggal']) ? $o['tanggalmeninggal'] : '-';
                                                                                                }
                                                                                            ?>
                                                                                        </td> 
                                                                                        <td class="text-nowrap">
                                                                                            <?php if($o['status_validasi_modorangtua'] ==1){ ?>
                                                                                                <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                            <?php }else{?>
                                                                                                <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                            <?php }?>
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade fill-in" id="orangtua<?=$o['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                                            <i class="pg-close"></i>
                                                                                        </button>
                                                                                        <div class="modal-dialog modal-lg m-0">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    
                                                                                                </div>
                                                                                                <div class="modal-body" >
                                                                                                    <div class="row">
                                                                                                        <div class="col-lg-6 ">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h5 class="text-left p-b-5"><span class="semi-bold">Riwayat</span> Orangtua</h5>
                                                                                                                    <span class="semi-bold">Data</span> Riwayat Orangtua &nbsp;
                                                                                                                        <?php if($o['status_validasi_modorangtua'] ==1){ ?>
                                                                                                                            <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                                                        <?php }else{?>
                                                                                                                            <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                                                        <?php }?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nama Orangtua</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($o['nama']) ? $o['nama'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Status Orang Tua</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($o['nm_orangtua']) ? $o['nm_orangtua'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tempat Lahir</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($o['tempatlahir']) ? $o['tempatlahir'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal Lahir</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($o['tanggallahir']) ? date('d-m-Y', strtotime($o['tanggallahir'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Pekerjaan</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($o['pekerjaan']) ? $o['pekerjaan'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Alamat</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($o['alamat']) ? $o['alamat'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Status Dasar</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($o['status_dasar']) ? $o['status_dasar'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <?php if($o['status_dasar']==3): ?>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>No. Akte Meninggal</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($o['no_akte_meninggal']) ? $o['no_akte_meninggal'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal Meninggal</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($o['tanggal_meninggal']) ? date('d-m-Y', strtotime($o['tanggal_meninggal'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <?php endif;?>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h6 class="text-left p-b-5"><span class="semi-bold">File</span> Pendukung</h6>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <a href="javascript:;" onclick="fileFunctionot<?= $o['id'] ?>()"><span class="label label-info m-l-5 inline">File Kartu Keluarga</span></a>
                                                                                                                    <script>
                                                                                                                        function fileFunctionot<?= $o['id'] ?>() {
                                                                                                                            function doesFileExist(urlToFile) {
                                                                                                                                var xhr = new XMLHttpRequest();
                                                                                                                                xhr.open('HEAD', urlToFile, false);
                                                                                                                                xhr.send();
                                                                                                                                if (xhr.status == "404") {
                                                                                                                                    return false;
                                                                                                                                } else {
                                                                                                                                    return true;
                                                                                                                                }
                                                                                                                            }
                                                                                                                            var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($o['file_kartu_keluarga']) ? $o['file_kartu_keluarga'] :  'ups.pdf' ?>");
                                                                                                                            if(result == true){
                                                                                                                                document.getElementById("fot<?=$o['id']?>").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($o['file_kartu_keluarga']) ? $o['file_kartu_keluarga'] : ''  ?>" width="100%" height="100%"></embed>';
                                                                                                                            }else{
                                                                                                                                document.getElementById("fot<?=$o['id']?>").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                                                                            }
                                                                                                                        }
                                                                                                                    </script>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div id="fot<?=$o['id']?>" class="col-lg-6 no-padding sm-m-t-10 sm-text-center">
                                                                                                            <p class="text-center align-middle text-danger bold" style="margin-top:25%;">Tampilkan File!</p>
                                                                                                        </div>
                                                                                                        
                                                                                                        <hr>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                    <!-- <p class="text-right sm-text-center hinted-text p-t-10 p-r-10">What is it? Terms and conditions</p> -->
                                                                                                    <a href="#" <?= $o['status_validasi_modorangtua']==1 ? 'data-toggle="modal" data-target="#otvalid'.$o['id'].'"':''?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                                                                    <a href="#" <?= $o['status_validasi_modorangtua']==1 ? 'data-toggle="modal" data-target="#ottvalid'.$o['id'].'"':''?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                                                                </div>
                                                                                                <div class="modal-footer"></div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                        <!-- /.modal-dialog -->
                                                                                        
                                                                                    </div>
                                                                                    
                                                                                    <div class="modal fade slide-up disable-scroll" id="ottvalid<?=$o['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog ">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-header clearfix text-left">
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                                        <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                                        <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <?= form_open('admin/validasi_data/validasi_opd_riwayat/orangtua/tidak_valid/'.$o['nip'].'/'.$o['id'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                                            <div class="form-group-attached m-b-5">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-12">
                                                                                                                        <div class="form-group form-group-default p-0">
                                                                                                                            <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                                            <textarea name="alasan_notvalid_orangtua" class="w-100" rows="10"></textarea>
                                                                                                                            <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                                            <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <?= form_close(); ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal fade slide-up disable-scroll" id="otvalid<?=$o['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog modal-sm">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-body text-center m-t-20">
                                                                                                        <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                                        <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                                        <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                                        
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <a href="<?= base_url('admin/validasi_data/validasi_opd_riwayat/orangtua/valid/'.$o['nip'].'/'.$o['id']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                                        <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endforeach;?>
                                                                            </tbody>
                                                                        </table>
                                                                        
                                                                    </div>
                                                                <?php else: ?>
                                                                    <p class="m-l-20">List validasi Data Riwayat Orangtua tidak diketemukan</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ====================== DATA RIWAYAT KELUARGA PASANGAN =========================== -->
                                                <div class="card card-default m-b-0 bg-warna-abu">
                                                    <div class="card-header bg-success" role="tab" id="headingPasangan">
                                                        <h4 class="card-title">
                                                            <a class="collapsed p-0" data-toggle="collapse" data-parent="#accordion" href="#collapsePasangan" aria-expanded="false" aria-controls="collapsePasangan">
                                                                Riwayat Pasangan
                                                                <?= count($pas) > 0 ? '<span class="badge badge-important">'.count($pas).'</span>' : '' ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapsePasangan" class="collapse" role="tabcard" aria-labelledby="headingPasangan">
                                                        <div class="card-block" >
                                                            <div class="row">
                                                                <?php if(!empty($pas)): ?>
                                                                    <div class="col-lg-12">
                                                                        <h6>
                                                                            <span class="semi-bold">Data Riwayat</span> Orangtua 
                                                                        </h6>
                                                                        <table class="table table-sm table-hover table-striped table-responsive w-100">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="text-nowrap text-center"><code>#</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Nama Pasangan</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Status Pasangan</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Tempat Lahir</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Tanggal Lahir</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Tanggal Nikah</code></td>  
                                                                                    <td class="text-nowrap text-center"><code>Pekerjaan</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Status Kepegawaian</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Status Dasar</code></td> 
                                                                                    <!-- <td class="text-nowrap text-center"><code>Tanggal Meninggal</code></td>
                                                                                    <td class="text-nowrap text-center"><code>No. Akte Meninggal</code></td> -->
                                                                                    <td class="text-nowrap text-center"><code>Status</code></td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach($pas as $rs): ?>
                                                                                    <tr>
                                                                                        <td><a href="javascript:;" data-toggle="modal" data-target="#pasangan<?=$rs['id']?>"><span class="label label-info m-l-5 inline">validasi</span></a></td> 
                                                                                        <td><?= $rs['nama'] ?></td> 
                                                                                        <td><?= $rs['nm_pasangan'] ?></td> 
                                                                                        <td><?= $rs['tempat_lahir'] ?></td> 
                                                                                        <td><?= !empty($rs['tanggal_lahir']) ? date('d-m-Y', strtotime($rs['tanggal_lahir'])) : '-' ?></td> 
                                                                                        <td><?= !empty($rs['tanggal_nikah']) ? date('d-m-Y', strtotime($rs['tanggal_nikah'])) : '-' ?></td> 
                                                                                        <td><?= $rs['pekerjaan'] ?></td> 
                                                                                        <td><?= $rs['nip_pasangan'] == 0 ? 'Non PNS' : 'PNS <br> NIP : '.$rs['nip_pasangan']; ?></td>
                                                                                        <td><?= $rs['status_dasar'].'<br>' ?>
                                                                                            <?php
                                                                                                if(!empty($rs['status_dasar']) && $rs['status_dasar']==3){
                                                                                                    echo 'No. Akta Meninggal : '.!empty($rs['no_akte_meninggal']) ? $rs['no_akte_meninggal'].'<br>' : '- <br>';
                                                                                                    echo 'Tanggal Meninggal  : '.!empty($rs['tanggalmeninggal']) ? $rs['tanggalmeninggal'] : '-';
                                                                                                }
                                                                                            ?>
                                                                                        </td> 
                                                                                        <td class="text-nowrap">
                                                                                            <?php if($rs['status_validasi_modpasangan'] ==1){ ?>
                                                                                                <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                            <?php }else{?>
                                                                                                <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                            <?php }?>
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade fill-in" id="pasangan<?=$rs['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                                            <i class="pg-close"></i>
                                                                                        </button>
                                                                                        <div class="modal-dialog modal-lg m-0">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    
                                                                                                </div>
                                                                                                <div class="modal-body" >
                                                                                                    <div class="row">
                                                                                                        <div class="col-lg-6 ">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h5 class="text-left p-b-5"><span class="semi-bold">Riwayat</span> Pasangan</h5>
                                                                                                                    <span class="semi-bold">Data</span> Riwayat Pasangan &nbsp;
                                                                                                                        <?php if($rs['status_validasi_modpasangan'] ==1){ ?>
                                                                                                                            <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                                                        <?php }else{?>
                                                                                                                            <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                                                        <?php }?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nama Pasangan</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($rs['nama']) ? $rs['nama'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Status Pasangan</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($rs['nm_pasangan']) ? $rs['nm_pasangan'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tempat Lahir</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($rs['tempat_lahir']) ? $rs['tempat_lahir'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal Lahir</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($rs['tanggal_lahir']) ? date('d-m-Y', strtotime($rs['tanggal_lahir'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal Nikah</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($rs['tanggal_nikah']) ? date('d-m-Y',strtotime($rs['tanggal_nikah'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Status Kepegawaian</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= $rs['nip_pasangan'] == 0 ? 'NON PNS' : 'PNS' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <?php if($rs['nip_pasangan'] != 0){ ?>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>NIP Pasangan</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= $rs['nip_pasangan'] ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <?php } ?>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Status Dasar</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($rs['status_dasar']) ? $rs['status_dasar'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <?php if($rs['status_dasar']==3): ?>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>No. Akte Meninggal</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($rs['no_akte_meninggal']) ? $rs['no_akte_meninggal'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal Meninggal</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($rs['tanggal_meninggal']) ? date('d-m-Y', strtotime($rs['tanggal_meninggal'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <?php endif;?>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h6 class="text-left p-b-5"><span class="semi-bold">File</span> Pendukung</h6>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <?php 
                                                                                                                        $filepas = array('file_ktp_pasangan','file_buku_nikah','file_akta_cerai');
                                                                                                                        for($i=0; $i < count($filepas); $i++){?>
                                                                                                                            <?php if(!empty($rs[$filepas[$i]])): ?>
                                                                                                                                <a href="javascript:;" onclick="fileFunctionrs<?= $filepas[$i].$rs['id']?>()"><span class="label label-info m-l-5 inline"><?= ucwords(str_replace('_',' ',$filepas[$i]))?></span></a>
                                                                                                                            <?php endif;?>
                                                                                                                            <script>
                                                                                                                                function fileFunctionrs<?= $filepas[$i].$rs['id']?>() {
                                                                                                                                    function doesFileExist(urlToFile) {
                                                                                                                                        var xhr = new XMLHttpRequest();
                                                                                                                                        xhr.open('HEAD', urlToFile, false);
                                                                                                                                        xhr.send();
                                                                                                                                        
                                                                                                                                        if (xhr.status == "404") {
                                                                                                                                            return false;
                                                                                                                                        } else {
                                                                                                                                            return true;
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                    var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($rs[$filepas[$i]]) ? $rs[$filepas[$i]] :  'ups.pdf'  ?>");

                                                                                                                                    if(result == true){
                                                                                                                                        document.getElementById("fpas<?= $rs['id'] ?>").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($rs[$filepas[$i]]) ? $rs[$filepas[$i]] : null  ?>" width="100%" height="100%"></embed>';
                                                                                                                                    }else{
                                                                                                                                        document.getElementById("fpas<?= $rs['id'] ?>").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            </script>
                                                                                                                    
                                                                                                                    <?php }?> 
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div id="fpas<?=$rs['id']?>" class="col-lg-6 no-padding sm-m-t-10 sm-text-center">
                                                                                                            <p class="text-center align-middle text-danger bold" style="margin-top:25%;">Tampilkan File!</p>
                                                                                                        </div>
                                                                                                        
                                                                                                        <hr>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                    <!-- <p class="text-right sm-text-center hinted-text p-t-10 p-r-10">What is it? Terms and conditions</p> -->
                                                                                                    <a href="#" <?= $rs['status_validasi_modpasangan']==1 ? 'data-toggle="modal" data-target="#pasvalid'.$rs['id'].'"':''?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                                                                    <a href="#" <?= $rs['status_validasi_modpasangan']==1 ? 'data-toggle="modal" data-target="#pastvalid'.$rs['id'].'"':''?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                                                                </div>
                                                                                                <div class="modal-footer"></div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                        <!-- /.modal-dialog -->
                                                                                        
                                                                                    </div>
                                                                                    
                                                                                    <div class="modal fade slide-up disable-scroll" id="pastvalid<?=$rs['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog ">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-header clearfix text-left">
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                                        <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                                        <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <?= form_open('admin/validasi_data/validasi_opd_riwayat/pasangan/tidak_valid/'.$rs['nip'].'/'.$rs['id'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                                            <div class="form-group-attached m-b-5">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-12">
                                                                                                                        <div class="form-group form-group-default p-0">
                                                                                                                            <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                                            <textarea name="alasan_notvalid_pasangan" class="w-100" rows="10"></textarea>
                                                                                                                            <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                                            <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <?= form_close(); ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal fade slide-up disable-scroll" id="pasvalid<?=$rs['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog modal-sm">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-body text-center m-t-20">
                                                                                                        <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                                        <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                                        <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                                        
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <a href="<?= base_url('admin/validasi_data/validasi_opd_riwayat/pasangan/valid/'.$rs['nip'].'/'.$rs['id']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                                        <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endforeach;?>
                                                                            </tbody>
                                                                        </table>
                                                                        
                                                                    </div>
                                                                <?php else: ?>
                                                                    <p class="m-l-20">List validasi Data Riwayat Pasangan tidak diketemukan</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ====================== DATA RIWAYAT KELUARGA ANAK =========================== -->
                                                <div class="card card-default m-b-0 bg-warna-abu">
                                                    <div class="card-header bg-success" role="tab" id="headingAnak">
                                                        <h4 class="card-title">
                                                            <a class="collapsed p-0" data-toggle="collapse" data-parent="#accordion" href="#collapseAnak" aria-expanded="false" aria-controls="collapseAnak">
                                                                Riwayat Anak
                                                                <?= count($ank) > 0 ? '<span class="badge badge-important">'.count($ank).'</span>' : '' ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseAnak" class="collapse" role="tabcard" aria-labelledby="headingAnak">
                                                        <div class="card-block" >
                                                            <div class="row">
                                                                <?php if(!empty($ank)): ?>
                                                                    <div class="col-lg-12">
                                                                        <h6>
                                                                            <span class="semi-bold">Data Riwayat</span> Anak 
                                                                        </h6>
                                                                        <table class="table table-sm table-hover table-striped table-responsive w-100">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="text-nowrap text-center"><code>#</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Nama Anak</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Status Anak</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Jenis Kelamin</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Tempat Lahir</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Tanggal Lahir</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Pekerjaan</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Alamat</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Status Dasar</code></td> 
                                                                                    <!-- <td class="text-nowrap text-center"><code>Tanggal Meninggal</code></td>
                                                                                    <td class="text-nowrap text-center"><code>No. Akte Meninggal</code></td> -->
                                                                                    <td class="text-nowrap text-center"><code>Status</code></td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach($ank as $an): ?>
                                                                                    <tr>
                                                                                        <td><a href="javascript:;" data-toggle="modal" data-target="#anak<?=$an['id']?>"><span class="label label-info m-l-5 inline">validasi</span></a></td> 
                                                                                        <td><?= $an['nama'] ?></td> 
                                                                                        <td><?= $an['nm_anak'] ?></td> 
                                                                                        <td><?= $an['nm_kelamin'] ?></td> 
                                                                                        <td><?= $an['tempat_lahir'] ?></td> 
                                                                                        <td><?= !empty($an['tanggal_lahir']) ? date('d-m-Y', strtotime($an['tanggal_lahir'])):'-' ?></td> 
                                                                                        <td><?= $an['pekerjaan'] ?></td> 
                                                                                        <td><?= $an['nama_ibu'] ?></td> 
                                                                                        <td><?= $an['noaktalahir'] ?></td> 
                                                                                        <td><?= $an['nobpjs'] ?></td> 
                                                                                        <td class="text-nowrap">
                                                                                            <?php if($an['status_validasi_modanak'] ==1){ ?>
                                                                                                <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                            <?php }else{?>
                                                                                                <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                            <?php }?>
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade fill-in" id="anak<?=$an['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                                            <i class="pg-close"></i>
                                                                                        </button>
                                                                                        <div class="modal-dialog modal-lg m-0">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    
                                                                                                </div>
                                                                                                <div class="modal-body" >
                                                                                                    <div class="row">
                                                                                                        <div class="col-lg-6 ">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h5 class="text-left p-b-5"><span class="semi-bold">Riwayat</span> Anak</h5>
                                                                                                                    <span class="semi-bold">Data</span> Riwayat Anak &nbsp;
                                                                                                                        <?php if($an['status_validasi_modanak'] ==1){ ?>
                                                                                                                            <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                                                        <?php }else{?>
                                                                                                                            <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                                                        <?php }?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nama Anak</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($an['nama']) ? $an['nama'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Status Anak</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($an['nm_anak']) ? $an['nm_anak'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tempat Lahir</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($an['tempat_lahir']) ? $an['tempat_lahir'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Tanggal Lahir</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($an['tanggal_lahir']) ? date('d-m-Y', strtotime($an['tanggal_lahir'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Pekerjaan</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($an['pekerjaan']) ? $an['pekerjaan'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nama Ibu</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($an['nama_ibu']) ? $an['nama_ibu'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nomor Akte Lahir</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($an['noaktalahir']) ? $an['noaktalahir'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-6 text-nowrap"><code>Nomor BPJS</code></div>
                                                                                                                <div class="col-md-6 text-nowrap"><?= !empty($an['nobpjs']) ? $an['nobpjs'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h6 class="text-left p-b-5"><span class="semi-bold">File</span> Pendukung</h6>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <a href="javascript:;" onclick="fileFunctionank<?= $an['id'] ?>()"><span class="label label-info m-l-5 inline">File Akta Lahir</span></a>
                                                                                                                    <script>
                                                                                                                        function fileFunctionank<?= $an['id'] ?>() {
                                                                                                                            function doesFileExist(urlToFile) {
                                                                                                                                var xhr = new XMLHttpRequest();
                                                                                                                                xhr.open('HEAD', urlToFile, false);
                                                                                                                                xhr.send();
                                                                                                                                if (xhr.status == "404") {
                                                                                                                                    return false;
                                                                                                                                } else {
                                                                                                                                    return true;
                                                                                                                                }
                                                                                                                            }
                                                                                                                            var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($an['file_akta_lahir']) ? $an['file_akta_lahir'] :  'ups.pdf' ?>");
                                                                                                                            if(result == true){
                                                                                                                                document.getElementById("fank<?=$an['id']?>").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($an['file_akta_lahir']) ? $an['file_akta_lahir'] : ''  ?>" width="100%" height="100%"></embed>';
                                                                                                                            }else{
                                                                                                                                document.getElementById("fank<?=$an['id']?>").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                                                                            }
                                                                                                                        }
                                                                                                                    </script>
                                                                                                                    <a href="javascript:;" onclick="fileFunctionankbpjs<?= $an['id'] ?>()"><span class="label label-info m-l-5 inline">File BPJS Anak</span></a>
                                                                                                                    <script>
                                                                                                                        function fileFunctionankbpjs<?= $an['id'] ?>() {
                                                                                                                            function doesFileExist(urlToFile) {
                                                                                                                                var xhr = new XMLHttpRequest();
                                                                                                                                xhr.open('HEAD', urlToFile, false);
                                                                                                                                xhr.send();
                                                                                                                                if (xhr.status == "404") {
                                                                                                                                    return false;
                                                                                                                                } else {
                                                                                                                                    return true;
                                                                                                                                }
                                                                                                                            }
                                                                                                                            var result = doesFileExist("<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($an['file_bpjs_anak']) ? $an['file_bpjs_anak'] :  'ups.pdf' ?>");
                                                                                                                            if(result == true){
                                                                                                                                document.getElementById("fank<?=$an['id']?>").innerHTML = '<embed type="application/pdf" src="<?= base_url() ?>assets/asn/dokumen/arsip/<?= !empty($an['file_bpjs_anak']) ? $an['file_bpjs_anak'] : ''  ?>" width="100%" height="100%"></embed>';
                                                                                                                            }else{
                                                                                                                                document.getElementById("fank<?=$an['id']?>").innerHTML = '<p class="text-center align-middle text-danger bold" style="margin-top:25%;">File tidak ditemukan!</p>';
                                                                                                                            }
                                                                                                                        }
                                                                                                                    </script>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div id="fank<?=$an['id']?>" class="col-lg-6 no-padding sm-m-t-10 sm-text-center">
                                                                                                            <p class="text-center align-middle text-danger bold" style="margin-top:25%;">Tampilkan File!</p>
                                                                                                        </div>
                                                                                                        
                                                                                                        <hr>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                    <!-- <p class="text-right sm-text-center hinted-text p-t-10 p-r-10">What is it? Terms and conditions</p> -->
                                                                                                    <a href="#" <?= $an['status_validasi_modanak']==1 ? 'data-toggle="modal" data-target="#ankvalid'.$an['id'].'"':''?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                                                                    <a href="#" <?= $an['status_validasi_modanak']==1 ? 'data-toggle="modal" data-target="#anktvalid'.$an['id'].'"':''?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                                                                </div>
                                                                                                <div class="modal-footer"></div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                        <!-- /.modal-dialog -->
                                                                                        
                                                                                    </div>
                                                                                    
                                                                                    <div class="modal fade slide-up disable-scroll" id="anktvalid<?=$an['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog ">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-header clearfix text-left">
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                                        <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                                        <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <?= form_open('admin/validasi_data/validasi_opd_riwayat/anak/tidak_valid/'.$an['nip'].'/'.$an['id'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                                            <div class="form-group-attached m-b-5">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-12">
                                                                                                                        <div class="form-group form-group-default p-0">
                                                                                                                            <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                                            <textarea name="alasan_notvalid_anak" class="w-100" rows="10"></textarea>
                                                                                                                            <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                                            <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <?= form_close(); ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal fade slide-up disable-scroll" id="ankvalid<?=$an['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog modal-sm">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-body text-center m-t-20">
                                                                                                        <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                                        <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                                        <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                                        
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <a href="<?= base_url('admin/validasi_data/validasi_opd_riwayat/anak/valid/'.$an['nip'].'/'.$an['id']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                                        <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endforeach;?>
                                                                            </tbody>
                                                                        </table>
                                                                        
                                                                    </div>
                                                                <?php else: ?>
                                                                    <p class="m-l-20">List validasi Data Riwayat Orangtua tidak diketemukan</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ====================== DATA RIWAYAT CUTI =========================== -->
                                                <div class="card card-default m-b-0 bg-warna-abu">
                                                    <div class="card-header bg-success" role="tab" id="headingCuti">
                                                        <h4 class="card-title">
                                                            <a class="collapsed p-0" data-toggle="collapse" data-parent="#accordion" href="#collapseCuti" aria-expanded="false" aria-controls="collapseCuti">
                                                                Riwayat Cuti
                                                                <?= count($cut) > 0 ? '<span class="badge badge-important">'.count($cut).'</span>' : '' ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseCuti" class="collapse" role="tabcard" aria-labelledby="headingCuti">
                                                        <div class="card-block" >
                                                            <div class="row">
                                                                <?php if(!empty($cut)): ?>
                                                                    <div class="col-lg-12">
                                                                        <h6>
                                                                            <span class="semi-bold">Data Riwayat</span> Anak 
                                                                        </h6>
                                                                        <table class="table table-sm table-hover table-striped table-responsive w-100">
                                                                            <thead>
                                                                                <tr>
                                                                                    <td class="text-nowrap text-center"><code>#</code></td>
                                                                                    <td class="text-nowrap text-center"><code>Jenis Cuti</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Tanggal Cuti</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Lama Cuti</code></td> 
                                                                                    <td class="text-nowrap text-center"><code>Alasan Cuti</code></td> 
                                                                                    <!-- <td class="text-nowrap text-center"><code>Tanggal Meninggal</code></td>
                                                                                    <td class="text-nowrap text-center"><code>No. Akte Meninggal</code></td> -->
                                                                                    <td class="text-nowrap text-center"><code>Status</code></td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach($cut as $c): ?>
                                                                                    <tr>
                                                                                        <td><a href="javascript:;" data-toggle="modal" data-target="#cuti<?=$c['id']?>"><span class="label label-info m-l-5 inline">validasi</span></a></td> 
                                                                                        <td><?= $c['nm_cuti'] ?></td> 
                                                                                        <td><?= !empty($c['tgl_surat_cuti']) ? date('d-m-Y', strtotime($c['tgl_surat_cuti'])) : '-' ?></td> 
                                                                                        <td><?= $c['lama_cuti'] ?></td> 
                                                                                        <td><?= $c['alasan_cuti'] ?></td> 
                                                                                        <td class="text-nowrap">
                                                                                            <?php if($c['status_validasi_modcuti'] ==1){ ?>
                                                                                                <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                            <?php }else{?>
                                                                                                <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                            <?php }?>
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <!-- Modal -->
                                                                                    <div class="modal fade fill-in" id="cuti<?=$c['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                                            <i class="pg-close"></i>
                                                                                        </button>
                                                                                        <div class="modal-dialog modal-lg m-0">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    
                                                                                                </div>
                                                                                                <div class="modal-body" >
                                                                                                    <div class="row">
                                                                                                        <div class="col-lg-12 ">
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-12 text-nowrap">
                                                                                                                    <h5 class="text-left p-b-5"><span class="semi-bold">Riwayat</span> Cuti</h5>
                                                                                                                    <span class="semi-bold">Data</span> Riwayat Cuti &nbsp;
                                                                                                                        <?php if($c['status_validasi_modcuti'] ==1){ ?>
                                                                                                                            <span class="label label-success"><small>User asn telah memperbaharui data</small></span>
                                                                                                                        <?php }else{?>
                                                                                                                            <span class="label label-danger"><small>Menunggu perubahan data</small></span>
                                                                                                                        <?php }?>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-4 text-nowrap"><code>Jenis Cuti</code></div>
                                                                                                                <div class="col-md-8 text-nowrap"><?= !empty($c['nm_cuti']) ? $c['nm_cuti'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-4 text-nowrap"><code>Tanggal Cuti</code></div>
                                                                                                                <div class="col-md-8 text-nowrap"><?= !empty($c['tgl_surat_cuti']) ? date('d-m-Y', strtotime($c['tgl_surat_cuti'])) : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-4 text-nowrap"><code>Lama Cuti</code></div>
                                                                                                                <div class="col-md-8 text-nowrap"><?= !empty($c['lama_cuti']) ? $c['lama_cuti'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                            <div class="row">
                                                                                                                <div class="col-md-4 text-nowrap"><code>Alasan Cuti</code></div>
                                                                                                                <div class="col-md-8 text-nowrap"><?= !empty($c['alasan_cuti']) ? $c['alasan_cuti'] : '-' ?></div>
                                                                                                                <!-- <div class="col-md-6 text-nowrap">Unit Kerja</div> -->
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div id="fcut<?=$c['id']?>" class="col-lg-6 no-padding sm-m-t-10 sm-text-center">
                                                                                                        </div>
                                                                                                        
                                                                                                        <hr>
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                    <!-- <p class="text-right sm-text-center hinted-text p-t-10 p-r-10">What is it? Terms and conditions</p> -->
                                                                                                    <a href="#" <?= $c['status_validasi_modcuti']==1 ? 'data-toggle="modal" data-target="#ankvalid'.$c['id'].'"':''?> type="button" class="btn btn-sm btn-succes mt-3"> Valid </a>
                                                                                                    <a href="#" <?= $c['status_validasi_modcuti']==1 ? 'data-toggle="modal" data-target="#anktvalid'.$c['id'].'"':''?> type="button" class="btn btn-sm btn-danger mt-3"> Tidak Valid </a>
                                                                                                </div>
                                                                                                <div class="modal-footer"></div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                        <!-- /.modal-dialog -->
                                                                                        
                                                                                    </div>
                                                                                    
                                                                                    <div class="modal fade slide-up disable-scroll" id="anktvalid<?=$c['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog ">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-header clearfix text-left">
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                                                                        <h5>Alasan <span class="semi-bold">Tidak Valid</span></h5>
                                                                                                        <!-- <p class="p-b-10">We need payment information inorder to process your order</p> -->
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                                                                                        <?= form_open('admin/validasi_data/validasi_opd_riwayat/cuti/tidak_valid/'.$c['nip'].'/'.$c['id'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                                                                            <div class="form-group-attached m-b-5">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-12">
                                                                                                                        <div class="form-group form-group-default p-0">
                                                                                                                            <!-- <label>Alasan File Tidak Falid</label> -->
                                                                                                                            <textarea name="alasan_notvalid_cuti" class="w-100" rows="10"></textarea>
                                                                                                                            <!-- <input type="text" class="form-control-file" name=""> -->
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <button type="submit" class="btn btn-xs btn-primary btn-cons  pull-left inline">Kirim</button>
                                                                                                            <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <?= form_close(); ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal fade slide-up disable-scroll" id="ankvalid<?=$c['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                                                        <div class="modal-dialog modal-sm">
                                                                                            <div class="modal-content-wrapper">
                                                                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                                                                    <div class="modal-body text-center m-t-20">
                                                                                                        <h4 class="no-margin p-b-10">Apa anda yakin ingin menvalidasi data ini</h4>
                                                                                                        <!-- <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button>
                                                                                                        <button type="button" class="btn btn-xs btn-primary btn-cons" data-dismiss="modal">Continue</button> -->
                                                                                                        
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <a href="<?= base_url('admin/validasi_data/validasi_opd_riwayat/cuti/valid/'.$c['nip'].'/'.$c['id']); ?>" type="button" class="btn btn-xs btn-primary btn-cons  pull-left inline">Ya</a>
                                                                                                        <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- /.modal-content -->
                                                                                        </div>
                                                                                    </div>
                                                                                <?php endforeach;?>
                                                                            </tbody>
                                                                        </table>
                                                                        
                                                                    </div>
                                                                <?php else: ?>
                                                                    <p class="m-l-20">List validasi Data Riwayat Orangtua tidak diketemukan</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- END card -->
                                    </div>
                                </div>
                                <!-- END PLACE PAGE CONTENT HERE -->

                            </div>
                        </div>
                        
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
    <script src="<?= base_url(); ?>assets/admin/plugins/pace/pace.min.js" type="text/javascript"></script>
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
    <script type="text/javascript" src="<?= base_url(); ?>assets/admin/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/admin/plugins/classie/classie.js"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/bootstrap-collapse/bootstrap-tabcollapse.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="assets/admin/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    
</body>

</html>