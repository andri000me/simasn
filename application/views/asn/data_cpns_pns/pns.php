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
    <link href="<?= base_url(); ?>assets/asn/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">
    <link href="<?= base_url(); ?>assets/asn/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen">
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
                <div class=" container-fluid w-100   container-fixed-lg">
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
                                        <?php $mpt ? $aksi='ubah' : $aksi='insert' ?>
                                        <?= form_open_multipart('data_cpns_pns/update_pns/'.$aksi, 'role="form"', 'novalidate="novalidate"', 'autocomplete="off"');?>
                                            <?php if(!empty($mpt['nip']) && $mpt['status_validasi_modpns'] == 1): ?>
                                                <div id="alert_sedang_tinjau" class="alert alert-warning">
                                                    <strong>Perhatian!</strong> Data sementara sedang dalam proses validasi <?= !empty($mpt['validator_modpns']) ? ($mpt['validator_modpns']==1 ? 'Tahap 1 (Admin OPD)' : 'Tahap 2 (Admin BKPSDM)')  : '' ?>. Form saat ini masih terkunci dan tidak bisa diedit... 
                                                </div>
                                            <?php endif;?>

                                            <?php if(!empty($mpt['nip']) && $mpt['status_validasi_modpns'] == 0): ?>
                                                <div id="alert_tolak_tinjau" class="alert alert-danger">
                                                    <strong>Gagal validasi <?= !empty($mpt['validator_modpns']) ? ($mpt['validator_modpns']==1 ? 'Tahap 1 (Admin OPD)' : 'Tahap 2 (Admin BKPSDM)')  : '' ?>: </strong>Terdapat kesalahan data saat penginputan, mohon untuk mengkoreksi kembali data yang telah dinput... 
                                                    <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#pns<?= $mpt['nip'] ?>">Lihat list perbaikan <i class="fa fa-arrow-right"></i></button>
                                                </div>
                                            <?php endif;?>

                                            

                                            <div id="form-pns">
                                                <div class="row clearfix">
                                                    <div class="col-md-8">
                                                        <div class="form-group form-group-default form-group-default-select2 ">
                                                            <label class="">Golongan</label>
                                                            <select name="golongan" class="full-width" data-init-plugin="select2">
                                                                <?php if(!empty($mpt['nip'])):  ?>
                                                                    <?php if(!empty($mpt['golongan_id'])): ?>
                                                                        <?php if($mpt['status_validasi_modcpns'] > 0):  ?>
                                                                            <option value="<?= $mpt['golongan_id'] ?>"><?= $kvgol[$mpt['golongan_id']]  ?></option>
                                                                        <?php else:?>
                                                                            <option value="">-- Pilih --</option>
                                                                            <?php foreach ($mgolongan as $a): ?>
                                                                                <option value="<?= $a['id_golongan'] ?>" <?= $mpt['golongan_id'] == $a['id_golongan'] ? 'selected' : ''; ?>><?= $a['golongan'] ?></option>
                                                                            <?php endforeach; ?>
                                                                        <?php endif; ?>
                                                                    <?php else:?>
                                                                        <?php if($mpt['status_validasi_modcpns'] > 0):  ?>
                                                                            <option value="<?= $mp['golongan_id'] ?>"><?= $kvgol[$mp['golongan_id']]  ?></option>
                                                                        <?php else:?>
                                                                            <option value="">-- Pilih --</option>
                                                                            <?php foreach ($mgolongan as $a): ?>
                                                                                <option value="<?= $a['id_golongan'] ?>" <?= $mp['golongan_id'] == $a['id_golongan'] ? 'selected' : ''; ?>><?= $a['golongan'] ?></option>
                                                                            <?php endforeach; ?>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <option value="">-- Pilih --</option>
                                                                    <?php foreach ($mgolongan as $g): ?>
                                                                        <option value="<?= $g['id_golongan']?>" <?= !empty($mp['golongan_id']) && $mp['golongan_id'] == $g['id_golongan'] ? 'selected' : ''; ?> ><?= $g['golongan']?></option>
                                                                    <?php endforeach;?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default input-group col-md-12">
                                                            <div class="form-input-group">
                                                                <label>TMT PNS</label>
                                                                <input type="text" name="tmt_pns" class="form-control" id="datepicker-component2" placeholder="-"
                                                                    value="
                                                                        <?php 
                                                                            if(!empty($mpt['tmt_pns'])):
                                                                                if(!empty($mpt['tmt_pns'])):echo date('d-m-Y', strtotime($mpt['tmt_pns']));endif;
                                                                            else: 
                                                                                if(!empty($mp['tmt_pns'])):echo date('d-m-Y', strtotime($mp['tmt_pns']));endif; 
                                                                            endif;
                                                                        ?>"
                                                                >
                                                            </div>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default ">
                                                            <label>Masa Kerja Golongan Tahun</label>
                                                            <input type="text" class="form-control" name="mk_tahun" <?= !empty($mpt['masa_kerja_golongan_tahun']) ? 'value="'.$mpt['masa_kerja_golongan_tahun'].'"' : (!empty($mp['masa_kerja_golongan_tahun']) ? 'value="'.$mp['masa_kerja_golongan_tahun'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default ">
                                                            <label>Masa Kerja Golongan Bulan</label>
                                                            <input type="text" class="form-control" name="mk_bulan" <?= !empty($mpt['masa_kerja_golongan_bulan']) ? 'value="'.$mpt['masa_kerja_golongan_bulan'].'"' : (!empty($mp['masa_kerja_golongan_bulan']) ? 'value="'.$mp['masa_kerja_golongan_bulan'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default " aria-required="true">
                                                            <label>Pejabat yang menetapkan</label>
                                                            <input type="text" class="form-control" name="pejabat_penetap" <?= !empty($mpt['sk_pejabat']) ? 'value="'.$mpt['sk_pejabat'].'"' : (!empty($mp['sk_pejabat']) ? 'value="'.$mp['sk_pejabat'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group form-group-default " aria-required="true">
                                                            <label>Nomor BKN</label>
                                                            <input type="text" class="form-control" name="nomor_bkn" <?= !empty($mpt['no_bkn']) ? 'value="'.$mpt['no_bkn'].'"' : (!empty($mp['no_bkn']) ? 'value="'.$mp['no_bkn'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default input-group col-md-12">
                                                            <div class="form-input-group">
                                                                <label>Tanggal BKN</label>
                                                                <input type="text" name="tanggal_bkn" class="form-control" id="datepicker-component2" placeholder="-"
                                                                    value="
                                                                        <?php 
                                                                            if(!empty($mpt['tgl_bkn'])):
                                                                                if(!empty($mpt['tgl_bkn'])):echo date('d-m-Y', strtotime($mpt['tgl_bkn']));endif;
                                                                            else: 
                                                                                if(!empty($mp['tgl_bkn'])):echo date('d-m-Y', strtotime($mp['tgl_bkn']));endif; 
                                                                            endif;
                                                                        ?>"
                                                                >
                                                            </div>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group form-group-default " aria-required="true">
                                                            <label>Nomor SK</label>
                                                            <input type="text" class="form-control" name="nomor_sk" <?= !empty($mpt['sk_nomor']) ? 'value="'.$mpt['sk_nomor'].'"' : (!empty($mp['sk_nomor']) ? 'value="'.$mp['sk_nomor'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default input-group col-md-12">
                                                            <div class="form-input-group">
                                                                <label>Tanggal SK</label>
                                                                <input type="text" name="tanggal_sk" class="form-control" id="datepicker-component2" placeholder="-"
                                                                    value="
                                                                        <?php 
                                                                            if(!empty($mpt['sk_tanggal'])):
                                                                                if(!empty($mpt['sk_tanggal'])):echo date('d-m-Y', strtotime($mpt['sk_tanggal']));endif;
                                                                            else: 
                                                                                if(!empty($mp['sk_tanggal'])):echo date('d-m-Y', strtotime($mp['tgl_bkn']));endif; 
                                                                            endif;
                                                                        ?>"
                                                                >
                                                            </div>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group form-group-default " aria-required="true">
                                                            <label>Nomor STTPL</label>
                                                            <input type="text" class="form-control" name="nomor_sttpl" <?= !empty($mpt['sttpl_nomor']) ? 'value="'.$mpt['sttpl_nomor'].'"' : (!empty($mp['sttpl_nomor']) ? 'value="'.$mp['sttpl_nomor'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default input-group col-md-12">
                                                            <div class="form-input-group">
                                                                <label>Tanggal STTPL</label>
                                                                <input type="text" name="tanggal_sttpl" class="form-control" id="datepicker-component2" placeholder="-"
                                                                    value="
                                                                        <?php 
                                                                            if(!empty($mpt['sttpl_tanggal'])):
                                                                                if(!empty($mpt['sttpl_tanggal'])):echo date('d-m-Y', strtotime($mpt['sttpl_tanggal']));endif;
                                                                            else: 
                                                                                if(!empty($mp['sttpl_tanggal'])):echo date('d-m-Y', strtotime($mp['sttpl_tanggal']));endif; 
                                                                            endif;
                                                                        ?>"
                                                                >
                                                            </div>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group form-group-default " aria-required="true">
                                                            <label>Nomor Surat Keterangan Dokter</label>
                                                            <input type="text" class="form-control" name="nomor_ket_dokter" <?= !empty($mpt['nomor_kdokter']) ? 'value="'.$mpt['nomor_kdokter'].'"' : (!empty($mp['nomor_kdokter']) ? 'value="'.$mp['nomor_kdokter'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default input-group col-md-12">
                                                            <div class="form-input-group">
                                                                <label>Tanggal Surat Keterangan Dokter</label>
                                                                <input type="text" name="tanggal_ket_dokter" class="form-control" id="datepicker-component2" placeholder="-"
                                                                    value="
                                                                        <?php 
                                                                            if(!empty($mpt['tanggal_kdokter'])):
                                                                                if(!empty($mpt['tanggal_kdokter'])):echo date('d-m-Y', strtotime($mpt['tanggal_kdokter']));endif;
                                                                            else: 
                                                                                if(!empty($mp['tanggal_kdokter'])):echo date('d-m-Y', strtotime($mp['tanggal_kdokter']));endif; 
                                                                            endif;
                                                                        ?>"
                                                                >
                                                            </div>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg">
                                                        <div class="form-group form-group-default ">
                                                            <label>File SK PNS <small class="text-danger">[pdf | Max 500Kb]</small></label>
                                                            <p><i><?= !empty($mpt['file_sk']) && file_exists('assets/asn/dokumen/arsip/'.$mpt['file_sk']) ? $mpt['file_sk'] : (!empty($mp['file_sk']) && file_exists('assets/asn/dokumen/arsip/'.$mp['file_sk']) ? $mp['file_sk'] : 'Belum ada File SK PNS') ?></i></p>
                                                            <input type="file" class="form-control-file" name="file_sk_pns" ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg">
                                                        <div class="form-group form-group-default ">
                                                            <label>File STTPL  <small class="text-danger">[pdf | Max 500Kb]</small></label>
                                                            <p><i><?= !empty($mpt['file_sttpl'])&& file_exists('assets/asn/dokumen/arsip/'.$mpt['file_sttpl']) ? $mpt['file_sttpl'] : (!empty($mp['file_sttpl']) && file_exists('assets/asn/dokumen/arsip/'.$mp['file_sttpl']) ? $mp['file_sttpl'] : 'Belum ada File STTPL PNS') ?></i></p>
                                                            <input type="file" class="form-control-file" name="file_sttpl_pns" ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg">
                                                        <div class="form-group form-group-default ">
                                                            <label>File Sumpah PNS  <small class="text-danger">[pdf | Max 500Kb]</small></label>
                                                            <p><i><?= !empty($mpt['file_sumpah'])&& file_exists('assets/asn/dokumen/arsip/'.$mpt['file_sumpah']) ? $mpt['file_sumpah'] : (!empty($mp['file_sumpah']) && file_exists('assets/asn/dokumen/arsip/'.$mp['file_sumpah']) ? $mp['file_sumpah'] : 'Belum ada File Sumpah PNS') ?></i></p>
                                                            <input type="file" class="form-control-file" name="file_sumpah_pns" ?>
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
                                                <button id="form-mp" class="btn btn-success btn-block btn-lg" <?= !empty($mpt['nip']) && $mpt['status_validasi_modpns']==1 ? 'data-toggle="modal" data-target="#edit'.$mpt['nip'].'"':'' ?> type="submit">Update</button>
                                            </div>
                                        <?= form_close(); ?>
                                        <?php if(!empty($mpt['nip'])): ?>
                                        <!-- MODAL -->
                                        <div class="modal fade slide-up disable-scroll" id="pns<?= $mpt['nip'] ?>" tabindex="-1" role="dialog" aria-hidden="false">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content-wrapper">
                                                    <div class="modal-content" style="background-color: #e2e2e2;">
                                                        <div class="modal-body text-center m-t-20">
                                                            <h6 class="no-margin p-b-10"><b>Keterangan Validasi : </b> <?= $mpt['ket_validasi_modpns'] ?></h6>
                                                            <button type="button" class="btn btn-xs btn-success btn-cons" data-dismiss="modal">Tutup</button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        </div>
                                        <div class="modal fade slide-up disable-scroll" id="edit<?= $mpt['nip'] ?>" tabindex="-1" role="dialog" aria-hidden="false">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content-wrapper">
                                                    <div class="modal-content" style="background-color: #e2e2e2;">
                                                        <div class="modal-body text-center m-t-20">
                                                            <h6 class="no-margin p-b-10">Data sementara dalam proses validasi tahap <?= $mpt['validator_modpns'] ?>, Data tdiak bisa diedit</h6>
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
  `  <script src="<?= base_url(); ?>assets/asn/plugins/modernizr.custom.js" type="text/javascript"></script>
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
    <script src="<?= base_url(); ?>assets/asn/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/asn/plugins/jquery-autonumeric/autoNumeric.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/asn/plugins/dropzone/dropzone.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/asn/plugins/bootstrap-tag/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/asn/plugins/jquery-inputmask/jquery.inputmask.min.js"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/summernote/js/summernote.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/bootstrap-typehead/typeahead.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/bootstrap-typehead/typeahead.jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/handlebars/handlebars-v4.0.5.js"></script>
    
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?= base_url(); ?>assets/asn/js/form_elements.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/js/scripts.js" type="text/javascript"></script>>

    <script type="text/javascript">
        $(function($) {
            $("input[name=tmt_pns]").mask("99-99-9999");
            $("input[name=tanggal_bkn]").mask("99-99-9999");
            $("input[name=tanggal_sk]").mask("99-99-9999");
            $("input[name=tanggal_sttpl]").mask("99-99-9999");
            $("input[name=tanggal_ket_dokter]").mask("99-99-9999");
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            if(<?= count($mpt) ?> > 0 ){
                if(<?= $mpt['status_validasi_modpns'] ?> > 0){
                    $('#form-pns input').prop('readonly', true);
                    // $('#form-pns select').prop('disabled', true);
                    $('#form-mp').attr('type', 'button');
                    $('#foto_profil').prop('hidden', true);
                }else{
                    $('#form-pns input').prop('readonly', false);
                    // $('#form-pns select').prop('disabled', false);
                    $('#form-mp').attr('type', 'submit');
                    $('#foto_profil').prop('hidden', false);
                }
            }else{
                $('#form-pns input').prop('readonly', false);
                // $('#form-pns select').prop('disabled', true);
                $('#form-mp').attr('type', 'submit');
                $('#foto_profil').prop('hidden', false);
            }
        });
    </script>
</body>

</html>