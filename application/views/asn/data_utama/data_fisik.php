<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('asn/include/metadata'); ?>

    <link href="<?= base_url(); ?>assets/asn/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/asn/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/asn/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/asn/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/asn/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/asn/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="<?= base_url(); ?>assets/pages/css/themes/corporate.css" rel="stylesheet" type="text/css" />
</head>

<body class="fixed-header menu-pin">
    <!-- BEGIN SIDEBPANEL-->
    <?php $this->load->view('asn/include/nav'); ?>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->
    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
        <!-- START HEADER -->
        <?php $this->load->view('asn/include/header'); ?>
        <!-- END HEADER -->
        <!-- START PAGE CONTENT WRAPPER -->
        <div class="page-content-wrapper ">
            <!-- START PAGE CONTENT -->
            <div class="content ">
                <!-- START JUMBOTRON -->
                <?php $this->load->view('asn/include/breadcrumb'); ?>
                <!-- END JUMBOTRON -->
                <!-- START CONTAINER FLUID -->
                <div class=" container-fluid w-100  container-fixed-lg">
                    <!-- BEGIN PlACE PAGE CONTENT HERE -->
                    <center><h5><?= strtoupper(str_replace('_', ' ', $this->uri->segment(2)));?></h5></center>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 ">
                            <!-- START card -->
                            <div class="card card-transparent">
                                <div class="card-block">
                                    <!-- <div class="alert alert-success" role="alert">
                                        <button class="close" data-dismiss="alert"></button>
                                        <strong>Berhasil! </strong>Data berhasil diupdate. Selanjutnya data akan divalidasi oleh admin sebelum diaktifkan.
                                    </div>
                                    <div class="alert alert-danger" role="alert">
                                        <button class="close" data-dismiss="alert"></button>
                                        <strong>Gagal! </strong>Update data gagal. Pastikan jaringan internet anda dalam keadaan lancar dan stabil.
                                    </div>
                                    <div class="alert alert-warning" role="alert">
                                        <button class="close" data-dismiss="alert"></button>
                                        Data sementara masih dalam peninjauan admin. Form saat ini masih terkunci dan tidak bisa diedit.
                                    </div>
                                    <div class="alert alert-danger" role="alert">
                                        <button class="close" data-dismiss="alert"></button>
                                        <strong>Hasil validasi admin: </strong>Terdapat kesalahan data saat penginputan alamat, mohon untuk mengkoreksi kembali data yang telah dinput.
                                    </div> -->
                                    <?php $mft ? $aksi='ubah' : $aksi='insert' ?>
                                    <?= form_open('data_utama/update_data_fisik/'.$aksi, 'role="form"', 'novalidate="novalidate"', 'autocomplete="off"');?>
                                        <?php if(!empty($mft['nip']) && $mft['status_validasi_modmft'] == 1): ?>
                                            <div id="alert_sedang_tinjau" class="alert alert-warning">
                                                <strong>Perhatian!</strong>  Data sementara sedang dalam proses validasi <?= !empty($mft['validator_modmft']) ? ($mft['validator_modmft']==1 ? 'Tahap 1 (Admin OPD)' : 'Tahap 2 (Admin BKPSDM)')  : '' ?>. Form saat ini masih terkunci dan tidak bisa diedit... 
                                            </div>
                                        <?php endif;?>

                                        <?php if(!empty($mft['nip']) && $mft['status_validasi_modmft'] == 0): ?>
                                            <div id="alert_tolak_tinjau" class="alert alert-danger">
                                                <strong>Gagal validasi <?= !empty($mft['validator_modmft']) ? ($mft['validator_modmft']==1 ? 'Tahap 1 (Admin OPD)' : 'Tahap 2 (Admin BKPSDM)')  : '' ?>: </strong>Terdapat kesalahan data saat penginputan, mohon untuk mengkoreksi kembali data yang telah dinput... <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#mft<?= $mft['nip'] ?>">Lihat list perbaikan <i class="fa fa-arrow-right"></i></button>
                                            </div>
                                        <?php endif;?>

                                        <div id="form-fisik">
                                            <div class="row clearfix">
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-default " aria-required="true">
                                                        <label>Tinggi Badan (cm)</label>
                                                        <input type="text" class="form-control" name="tinggi_badan" <?= !empty($mft['tinggi']) ? 'value="'.$mft['tinggi'].'"' : (!empty($mf['tinggi']) ? 'value="'.$mf['tinggi'].'"' : 'value="'.null.'" palceholder="-"') ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-default ">
                                                        <label>Berat Badan (Kg)</label>
                                                        <input type="text" class="form-control" name="berat_badan" <?= !empty($mft['berat']) ? 'value="'.$mft['berat'].'"' : (!empty($mf['berat']) ? 'value="'.$mf['berat'].'"' : 'value="'.null.'" palceholder="-"') ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-default ">
                                                        <label>Golongan Darah</label>
                                                        <input type="text" class="form-control" name="golongan_darah" <?= !empty($mft['goldarah']) ? 'value="'.$mft['goldarah'].'"' : (!empty($mf['goldarah']) ? 'value="'.$mf['goldarah'].'"' : 'value="'.null.'" palceholder="-"') ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-default ">
                                                        <label>Nomor Sepatu</label>
                                                        <input type="text" class="form-control" name="nomor_sepatu" <?= !empty($mft['nosepatu']) ? 'value="'.$mft['nosepatu'].'"' : (!empty($mf['nosepatu']) ? 'value="'.$mf['nosepatu'].'"' : 'value="'.null.'" palceholder="-"') ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default " aria-required="true">
                                                        <label>Ukuran Baju</label>
                                                        <input type="text" class="form-control" name="ukuran_baju" <?= !empty($mft['nobaju']) ? 'value="'.$mft['nobaju'].'"' : (!empty($mf['nobaju']) ? 'value="'.$mf['nobaju'].'"' : 'value="'.null.'" palceholder="-"') ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default " aria-required="true">
                                                        <label>Cacat Tubuh</label>
                                                        <input type="text" class="form-control" name="cacat_tubuh" <?= !empty($mft['cacat']) ? 'value="'.$mft['cacat'].'"' : (!empty($mf['cacat']) ? 'value="'.$mf['cacat'].'"' : 'value="'.null.'" palceholder="-"') ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default ">
                                                        <label>Kondisi Fisik</label>
                                                        <input type="text" class="form-control" name="kondisi_fisik" <?= !empty($mft['kondisi_fisik']) ? 'value="'.$mft['kondisi_fisik'].'"' : (!empty($mf['kondisi_fisik']) ? 'value="'.$mf['kondisi_fisik'].'"' : 'value="'.null.'" palceholder="-"') ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="pull-left">
                                                Kosongkan form yang tidak ada!
                                            </p>
                                            <!-- <p class="pull-right">
                                                <a href="#">Help? Contact Support</a>
                                            </p> -->
                                            <div class="clearfix"></div>
                                            <button id="form_mf" class="btn btn-success btn-block btn-lg" <?= !empty($mft['nip']) && $mft['status_validasi_modmft']==1 ? 'data-toggle="modal" data-target="#edit'.$mft['nip'].'"':'' ?> type="submit">Update</button>
                                        </div>
                                    <?= form_close(); ?>
                                    <?php if(!empty($mft['nip'])): ?>
                                    <!-- MODAL -->
                                    <div class="modal fade slide-up disable-scroll" id="mft<?= $mft['nip'] ?>" tabindex="-1" role="dialog" aria-hidden="false">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content-wrapper">
                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                    <div class="modal-body text-center m-t-20">
                                                        <h6 class="no-margin p-b-10"><b>Keterangan Validasi : </b> <?= $mft['ket_validasi_modmft'] ?></h6>
                                                        <button type="button" class="btn btn-xs btn-success btn-cons" data-dismiss="modal">Tutup</button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <div class="modal fade slide-up disable-scroll" id="edit<?= $mft['nip'] ?>" tabindex="-1" role="dialog" aria-hidden="false">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content-wrapper">
                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                    <div class="modal-body text-center m-t-20">
                                                        <h6 class="no-margin p-b-10">Data sementara dalam proses validasi tahap <?= $mft['validator_modmft'] ?>, Data tdiak bisa diedit</h6>
                                                        <button type="button" class="btn btn-xs btn-success btn-cons" data-dismiss="modal">Tutup</button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <?php endif;?>
                                </div>
                            </div>
                            <!-- END card -->
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
            <?php $this->load->view('asn/include/footer'); ?>
            <!-- END COPYRIGHT -->
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->
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
    <script src="<?= base_url(); ?>assets/asn/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/asn/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/asn/plugins/classie/classie.js"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?= base_url(); ?>assets/asn/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    <script type="text/javascript">
        $(document).ready(function(){
            if(<?= count($mft) ?> > 0 ){
                if(<?= $mft['status_validasi_modmft'] ?> > 0){
                    $('#form-fisik input').prop('readonly', true);
                    // $('#form-fisik select').prop('disabled', true);
                    $('#form_mf').attr('type', 'button');
                }else{
                    $('#form-fisik input').prop('readonly', false);
                    // $('#form-fisik select').prop('disabled', false);
                    $('#form_mf').attr('type', 'submit');
                }
            }else{
                $('#form-fisik input').prop('readonly', false);
                // $('#form-fisik select').prop('disabled', true);
                $('#form_mf').attr('type', 'submit');
            }
        });
    </script>
</body>

</html>