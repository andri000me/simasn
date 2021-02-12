<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('admin/include/metadata'); ?>
    <link href="<?= base_url(); ?>assets/admin/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/admin/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/admin/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="<?= base_url(); ?>assets/pages/css/themes/modern.css" rel="stylesheet" type="text/css" />
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <style type="text/css">
        .table tbody tr td {
            padding: 3px 10px;
            font-size: 9pt;
            background-color: transparent;
        }
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
                    <div class=" container p-l-0 p-r-0 w-100  container-fixed-lg sm-p-l-0 sm-p-r-0">
                        <div class="inner">
                            <!-- START BREADCRUMB -->
                        </div>
                    </div>
                </div>
                <!-- END JUMBOTRON -->
                <!-- START CONTAINER FLUID -->
                <div class="w-100 container container-fixed-lg">
                    <!-- BEGIN PlACE PAGE CONTENT HERE -->
                    <div class="row m-t-25">
                        <div class="col-lg-3">
                            <?php if(!empty($asn['foto']) && file_exists('assets/asn/img/profiles/'.$asn['foto'])): ?>
                                <img src="<?= base_url('assets/asn/img/profiles/'.$asn['foto']);?>" class="rounded mx-auto d-block img-thumbnail" width=100%>
                            <?php else:?>
                                <img src="<?= base_url();?>assets/img/users.png" class="rounded mx-auto d-block img-thumbnail" width=100%>
                            <?php endif;?>
                            <div class="col-md-12 text-center">
                                <h5 class="semi-bold no-margin"><?= !empty($asn['nama']) ? ($asn['gelardepan'].''.$asn['nama'].''.$asn['gelarbelakang']) : '-' ?></h5>
                                <p class="hint-text">NIP: <?= !empty($asn['nip']) ? $asn['nip'] : '-' ?></p>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="col-md-12">
                                <div class="card card-transparent">
                                    <div class="card-header bg-info p-t-10" style="min-height: 35px">
                                        <div class="card-title text-white"><strong><big>Data Utama</big></strong></div>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <address class="m-b-20 m-t-10">
                                                    <a href="#"><strong>Data Pribadi</strong></a>
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 110px;">T.T.L</td><td style="width: 23px;">:</td>
                                                                <td>
                                                                    <?= !empty($asn['tempatlahir']) ? $asn['tempatlahir'].', ' : '-, ' ?>
                                                                    <?= !empty($asn['tanggallahir']) ? date('d-m-Y', strtotime($asn['tanggallahir'])) : '-' ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Agama</td><td>:</td>
                                                                <td><?= !empty($asn['agama']) ? $agama[$asn['agama']] : '-'  ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Status Nikah</td><td>:</td>
                                                                <td><?= !empty($asn['skawin']) ? $snikah[$asn['skawin']] : '-'  ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email</td><td>:</td>
                                                                <td><?= !empty($asn['email']) ? $asn['email'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>No. Telp / HP</td><td>:</td>
                                                                <td><?= !empty($asn['notelpx']) ? $asn['notelpx'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Alamat</td><td>:</td>
                                                                <td><?= !empty($asn['alamat']) ? $asn['alamat'] : '-' ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </address>
                                                <address class="m-b-20 m-t-10">
                                                    <a href="#"><strong>Data Fisik</strong></a>
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 110px;">Tinggi Badan</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['tinggi']) ? $asn['tinggi'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Berat Badan</td><td>:</td>
                                                                <td><?= !empty($asn['berat']) ? $asn['berat'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Golongan Darah</td><td>:</td>
                                                                <td><?= !empty($asn['goldarah']) ? $asn['goldarah'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cacat Tubuh</td><td>:</td>
                                                                <td><?= !empty($asn['cacat']) ? $asn['cacat'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nomor Sepatu</td><td>:</td>
                                                                <td><?= !empty($asn['nosepatu']) ? $asn['nosepatu'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ukuran Baju</td><td>:</td>
                                                                <td><?= !empty($asn['nobaju']) ? $asn['nobaju'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kondisi Fisik</td><td>:</td>
                                                                <td><?= !empty($asn['kondisi_fisik']) ? $asn['kondisi_fisik'] : '-' ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </address>
                                            </div>
                                            <div class="col-md-6">
                                                <address class="m-b-20 m-t-10">
                                                    <a href="#"><strong>Identitas Pegawai</strong></a>
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width: 110px;">Nomor Karpeg</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['nokarpeg']) ? $asn['nokarpeg'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 110px;">NIK</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['noktp']) ? $asn['noktp'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 110px;">Nomor NPWP</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['nonpwp']) ? $asn['nonpwp'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 110px;">Nomor Arsip</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['noarsip']) ? $asn['noarsip'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 110px;">Nomor NUPTK</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['nuptk']) ? $asn['nobaju'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 110px;">Nomor Registrasi Guru</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['noregguru']) ? $asn['noregguru'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 110px;">Pemanfaatan Bapetarum</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['bapetarum']) && $asn['bapetarum']==1 ? 'Sudah' : 'Belum' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 110px;">Nomor BPJS</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['nobpjs']) ? $asn['nobpjs'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 110px;">Kepemilikan KPE</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['kepemilikan_kpe']) && $asn['kepemilikan_kpe']==1 ? 'Ya' : 'Tidak' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 110px;">Nomor Karis/Karsu</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['nokariskarsu']) ? $asn['nokariskarsu'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 110px;">Status Sertifikat</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['status_sertifikasi']) && $asn['status_sertifikasi']==1 ? 'Ya' : 'Tidak' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 110px;">Status PNS</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['status_pegawai']) && $asn['status_pegawai']==1 ? '<span class="label label-success m-l-5 inline">Aktif</span>' : '<span class="label label-danger m-l-5 inline">Tidak Aktif</span>' ?></td>
                                                            </tr>
                                                            <?php if(!empty($asn['status_pegawai']) && $asn['status_pegawai']==2){?>
                                                            <tr>
                                                                <td style="width: 110px;">Nomor SK PNS Tidak Aktif</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['no_statuspns']) ? $asn['no_statuspns'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 110px;">Tanggal SK PNS Tidak Aktif</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['tglsk_statuspns']) ? date('d-m-Y', strtotime($asn['tglsk_statuspns'])) : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 110px;">TMT SK PNS Tidak Aktif</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['tmt_statuspns']) ? date('d-m-Y', strtotime($asn['tmt_statuspns'])) : '-' ?></td>
                                                            </tr>
                                                            <?php }?>
                                                            <tr>
                                                                <td style="width: 110px;">Kedudukan</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['nm_kedudukan']) ? $asn['nm_kedudukan'] : '-' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 110px;">PNS/CPNS/PPPK</td><td style="width: 23px;">:</td>
                                                                <td><?= !empty($asn['jenis_pegawai']) ? $asn['jenis_pegawai'] : '-' ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header bg-info p-t-10" style="min-height: 35px">
                                        <div class="card-title text-white"><strong><big>Data Riwayat</big></strong></div>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <address class="m-b-20 m-t-10">
                                                    <a href="#"><strong>Riwayat Kepangkatan</strong></a>
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <?php foreach($pangkat as $p): ?>
                                                            <tr>
                                                                <td><span class="label label-success m-l-5 inline"><?= !empty($p['golongan']) ? $p['golongan'] : '-' ?></span></td>
                                                                <td><?= !empty($p['tmt_pangkat']) ? date('d-m-Y',strtotime($p['tmt_pangkat'])) : '-' ?></td>
                                                                <td><?= !empty($p['pangkat']) ? $p['pangkat'] : '-' ?></td>
                                                                <td><?= !empty($p['sk_nomor']) ? $p['sk_nomor'] : '-' ?></td>
                                                            </tr>
                                                            <?php endforeach;?>
                                                        </tbody>
                                                    </table>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <address class="m-b-20 m-t-10">
                                                    <a href="#"><strong>Riwayat Jabatan</strong></a>
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <?php foreach($jabatan as $j): ?>

                                                            <tr>
                                                                <td><span class="label label-success m-l-5 inline"><?= !empty($j['eselon']) ? $j['eselon'] : '-' ?></span></td>
                                                                <td><?= !empty($j['tmt_jabatan']) ? date('d-m-Y',strtotime($j['tmt_jabatan'])) : '-' ?></td>
                                                                <td>
                                                                    <?php 
                                                                        if($j['jenis_jabatan_id']==2){
                                                                            if($j['eselon_id']==7){
                                                                                echo $j['nm_jabatan'];
                                                                            }elseif($j['jabatan_id']==706){
                                                                                echo  $j['nm_jabatan'].' '.$j['nm_unitkerja'] ; 
                                                                            }else{
                                                                                if($j['subbagian_id']!=0){
                                                                                    echo $j['nm_jabatan'].' '.$j['nm_subbidang'];
                                                                                }else{
                                                                                    echo $j['nm_jabatan'].' '.$j['nm_bidang'];
                                                                                }
                                                                            }
                                                                            
                                                                        }elseif($j['jenis_jabatan_id']==1){
                                                                            echo  $j['nm_jabatan'].' '.$j['nm_unitkerja'] ; 
                                                                        }else{
                                                                            if(!empty($j['jenjang_jabatan'])){
                                                                                $jj = explode('/',$j['jenjang_jabatan']);
                                                                                echo !empty($j['nm_jabatan']) ? $j['nm_jabatan'].' '.$jj[0] : 'Jabatan belum ada';
                                                                            }else{
                                                                                echo !empty($j['nm_jabatan']) ? $j['nm_jabatan'] : 'Jabatan belum ada';
                                                                            }
                                                                        }
                                                                    ?>

                                                                </td>
                                                                <td>
                                                                    <?= !empty($j['nm_subbidang']) ? $j['nm_subbidang'].'<br>' : '' ?>
                                                                    <?= !empty($j['nm_bidang']) ? $j['nm_bidang'].'<br>' : '' ?>
                                                                    <?= !empty($j['nm_unitkerja']) ? $j['nm_unitkerja'] : '' ?>
                                                                </td>
                                                                <td><?= !empty($j['no_sk']) ? $j['no_sk'] : '-' ?></td>
                                                            </tr>
                                                            <?php endforeach;?>
                                                        </tbody>
                                                    </table>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <address class="m-b-20 m-t-10">
                                                    <a href="#"><strong>Riwayat Pendidikan</strong></a>
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <?php foreach($edu as $edu): ?>
                                                            <tr>
                                                                <td><span class="label label-success m-l-5 inline"><?= !empty($edu['nm_jpendidikan']) ? $edu['nm_jpendidikan'] : '-' ?></span></td>
                                                                <td><?= !empty($edu['tgl_lulus']) ? date('d-m-Y', strtotime($edu['tgl_lulus'])) : '-' ?></td>
                                                                <td><?= !empty($edu['jurusan']) ? $edu['jurusan'] : '-' ?></td>
                                                                <td><?= !empty($edu['nm_lembaga']) ? $edu['nm_lembaga'] : '-' ?></td>
                                                            </tr>
                                                            <?php endforeach;?>
                                                        </tbody>
                                                    </table>
                                                </address>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- START CONTAINER FLUID -->
    <?php $this->load->view('admin/include/footer'); ?>
    <!-- END COPYRIGHT -->
    
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
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?= base_url(); ?>assets/admin/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    <!--  Generate a password string -->
</body>

</html>