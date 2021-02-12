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
                                    <?php $mcpt ? $aksi='ubah' : $aksi='insert' ?>
                                    <?= form_open_multipart('data_cpns_pns/update_cpns/'.$aksi, 'role="form"', 'novalidate="novalidate"', 'autocomplete="off"');?>

                                        <?php if( !empty($mcpt['nip']) && $mcpt['status_validasi_modcpns'] == 1): ?>
                                            <div id="alert_sedang_tinjau" class="alert alert-warning">
                                                <strong>Perhatian!</strong>  Data sementara sedang dalam proses validasi  <?= !empty($mcpt['validator_modcpns']) ? ($mcpt['validator_modcpns']==1 ? 'Tahap 1 (Admin OPD)' : 'Tahap 2 (Admin BKPSDM)')  : '' ?>. Form saat ini masih terkunci dan tidak bisa diedit... 
                                            </div>
                                        <?php endif;?>

                                        <?php if( !empty($mcpt['nip']) && $mcpt['status_validasi_modcpns'] == 0): ?>
                                            <div id="alert_tolak_tinjau" class="alert alert-danger">
                                                <strong>Gagal validasi <?= !empty($mcpt['validator_modcpns']) ? ($mcpt['validator_modcpns']==1 ? 'Tahap 1 (Admin OPD)' : 'Tahap 2 (Admin BKPSDM)')  : '' ?>: </strong>Terdapat kesalahan data saat penginputan, mohon untuk mengkoreksi kembali data yang telah dinput... <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#cpns<?= $mcpt['nip'] ?>">Lihat list perbaikan <i class="fa fa-arrow-right"></i></button>
                                            </div>
                                        <?php endif;?>

                                        <div id="form-cpns">
                                            <div class="row clearfix">
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-default form-group-default-select2 ">
                                                        <label class="">Golongan</label>
                                                        <select name="golongan" class="full-width" data-init-plugin="select2">
                                                            <?php if(!empty($mcpt['nip'])):  ?>
                                                                <?php if(!empty($mcpt['golongan_id'])): ?>
                                                                    <?php if($mcpt['status_validasi_modcpns'] > 0):  ?>
                                                                        <option value="<?= $mcpt['golongan_id'] ?>"><?= $kvgol[$mcpt['golongan_id']]  ?></option>
                                                                    <?php else:?>
                                                                        <option value="">-- Pilih --</option>
                                                                        <?php foreach ($mgolongan as $a): ?>
                                                                            <option value="<?= $a['id_golongan'] ?>" <?= $mcpt['golongan_id'] == $a['id_golongan'] ? 'selected' : ''; ?>><?= $a['golongan'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                <?php else:?>
                                                                    <?php if($mcpt['status_validasi_modcpns'] > 0):  ?>
                                                                        <option value="<?= $mcp['golongan_id'] ?>"><?= $kvgol[$mcp['golongan_id']]  ?></option>
                                                                    <?php else:?>
                                                                        <option value="">-- Pilih --</option>
                                                                        <?php foreach ($mgolongan as $a): ?>
                                                                            <option value="<?= $a['id_golongan'] ?>" <?= $mcp['golongan_id'] == $a['id_golongan'] ? 'selected' : ''; ?>><?= $a['golongan'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <option value="">-- Pilih --</option>
                                                                <?php foreach ($mgolongan as $g): ?>
                                                                    <option value="<?= $g['id_golongan']?>" <?= !empty($mcp['golongan_id']) && $mcp['golongan_id'] == $g['id_golongan'] ? 'selected' : null; ?>><?= $g['golongan']?></option>
                                                                <?php endforeach;?>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-default input-group col-md-12">
                                                        <div class="form-input-group">
                                                            <label>TMT CPNS</label>
                                                            <input type="text" name="tmt_cpns" class="form-control" id="datepicker-component2" 
                                                                value="
                                                                    <?php 
                                                                        if(!empty($mcpt['tmt_cpns'])):
                                                                            if(!empty($mcpt['tmt_cpns'])):echo date('d-m-Y', strtotime($mcpt['tmt_cpns']));endif;
                                                                        else: 
                                                                            if(!empty($mcp['tmt_cpns'])):echo date('d-m-Y', strtotime($mcp['tmt_cpns']));endif; 
                                                                        endif;
                                                                    ?>"
                                                            >
                                                        </div>
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-default ">
                                                        <label>Masa Kerja Golongan Tahun</label>
                                                        <input type="text" class="form-control" name="mk_tahun" <?= !empty($mcpt['masa_kerja_golongan_tahun']) ? 'value="'.$mcpt['masa_kerja_golongan_tahun'].'"' : (!empty($mcp['masa_kerja_golongan_tahun']) ? 'value="'.$mcp['masa_kerja_golongan_tahun'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-default ">
                                                        <label>Masa Kerja Golongan Bulan</label>
                                                        <input type="text" class="form-control" name="mk_bulan" <?= !empty($mcpt['masa_kerja_golongan_bulan']) ? 'value="'.$mcpt['masa_kerja_golongan_bulan'].'"' : (!empty($mcp['masa_kerja_golongan_bulan']) ? 'value="'.$mcp['masa_kerja_golongan_bulan'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default form-group-default-select2 ">
                                                        <label class="">Jenis Pengadaan</label>
                                                        <select name="jenis_pengadaan" class="full-width" data-init-plugin="select2">
                                                            <?php if(!empty($mcpt['nip'])):  ?>
                                                                <?php if(!empty($mcpt['pengadaan_id'])): ?>
                                                                    <?php if($mcpt['status_validasi_modcpns'] > 0):  ?>
                                                                        <option value="<?= $mcpt['pengadaan_id'] ?>"><?= $kvpengadaan[$mcpt['pengadaan_id']]  ?></option>
                                                                    <?php else:?>
                                                                        <option value="">-- Pilih --</option>
                                                                        <?php foreach ($mpengadaan as $a): ?>
                                                                            <option value="<?= $a['id_pengadaan'] ?>" <?= $mcpt['pengadaan_id'] == $a['id_pengadaan'] ? 'selected' : ''; ?>><?= $a['nm_pengadaan'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                <?php else:?>
                                                                    <?php if($mcpt['status_validasi_modcpns'] > 0):  ?>
                                                                        <option value="<?= $mcp['pengadaan_id'] ?>"><?= $kvpengadaan[$mcp['pengadaan_id']]  ?></option>
                                                                    <?php else:?>
                                                                        <option value="">-- Pilih --</option>
                                                                        <?php foreach ($mpengadaan as $a): ?>
                                                                            <option value="<?= $a['id_pengadaan'] ?>" <?= $mcp['pengadaan_id'] == $a['id_pengadaan'] ? 'selected' : ''; ?>><?= $a['nm_pengadaan'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <option value="">-- Pilih --</option>
                                                                <?php foreach ($mpengadaan as $p): ?>
                                                                    <option value="<?= $p['id_pengadaan']?>" <?= !empty($mcp['pengadaan_id']) && $mcp['pengadaan_id'] == $p['id_pengadaan'] ? 'selected' : '-'; ?> ><?= $p['nm_pengadaan']?></option>
                                                                <?php endforeach;?>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default " aria-required="true">
                                                        <label>Nomor BKN</label>
                                                        <input type="text" class="form-control" name="nomor_bkn"  <?= !empty($mcpt['no_bkn']) ? 'value="'.$mcpt['no_bkn'].'"' : (!empty($mcp['no_bkn']) ? 'value="'.$mcp['no_bkn'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default input-group col-md-12">
                                                        <div class="form-input-group">
                                                            <label>Tanggal BKN</label>
                                                            <input type="text" name="tanggal_bkn" class="form-control" id="datepicker-component2"
                                                                value="
                                                                    <?php 
                                                                        if(!empty($mcpt['tgl_bkn'])):
                                                                            if(!empty($mcpt['tgl_bkn']) && !empty($mcpt['tgl_bkn'])):echo date('d-m-Y', strtotime($mcpt['tgl_bkn']));endif;
                                                                        else: 
                                                                            if(!empty($mcp['tgl_bkn']) && !empty($mcp['tgl_bkn'])):echo date('d-m-Y', strtotime($mcp['tgl_bkn']));endif; 
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
                                                    <div class="form-group form-group-default " aria-required="true">
                                                        <label>Pejabat yang menetapkan</label>
                                                        <input type="text" class="form-control" name="pejabat_penetap" <?= !empty($mcpt['sk_pejabat']) ? 'value="'.$mcpt['sk_pejabat'].'"' : (!empty($mcp['sk_pejabat']) ? 'value="'.$mcp['sk_pejabat'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default " aria-required="true">
                                                        <label>Nomor SK</label>
                                                        <input type="text" class="form-control" name="nosk" <?= !empty($mcpt['sk_nomor']) ? 'value="'.$mcpt['sk_nomor'].'"' : (!empty($mcp['sk_nomor']) ? 'value="'.$mcp['sk_nomor'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default input-group col-md-12">
                                                        <div class="form-input-group">
                                                            <label>Tanggal SK</label>
                                                            <input type="text" name="tglsk" class="form-control" id="datepicker-component2" 
                                                                value="
                                                                    <?php 
                                                                        if(!empty($mcpt['sk_tanggal'])):
                                                                            if(!empty($mcpt['sk_tanggal']) && !empty($mcpt['sk_tanggal'])):echo date('d-m-Y', strtotime($mcpt['sk_tanggal']));endif;
                                                                        else: 
                                                                            if(!empty($mcp['sk_tanggal']) && !empty($mcp['sk_tanggal'])):echo date('d-m-Y', strtotime($mcp['sk_tanggal']));endif; 
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
                                                    <div class="form-group form-group-default " aria-required="true">
                                                    <label>Nomor SPMT</label>
                                                    <input type="text" class="form-control" name="nomor_spmt" <?= !empty($mcpt['spmt_nomor']) ? 'value="'.$mcpt['spmt_nomor'].'"' : (!empty($mcp['spmt_nomor']) ? 'value="'.$mcp['spmt_nomor'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-default input-group col-md-12">
                                                        <div class="form-input-group">
                                                            <label>Tanggal SPMT</label>
                                                            <input type="text" name="tanggal_spmt" class="form-control" id="datepicker-component2" 
                                                                value="
                                                                    <?php 
                                                                        if(!empty($mcpt['spmt_tanggal'])):
                                                                            if(!empty($mcpt['spmt_tanggal']) && !empty($mcpt['spmt_tanggal'])):echo date('d-m-Y', strtotime($mcpt['spmt_tanggal']));endif;
                                                                        else: 
                                                                            if(!empty($mcp['spmt_tanggal']) && !empty($mcp['spmt_tanggal'])):echo date('d-m-Y', strtotime($mcp['spmt_tanggal']));endif; 
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
                                                        <label>File SK CPNS <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                        <p><i><?= !empty($mcpt['file_sk'])&& file_exists('assets/asn/dokumen/arsip/'.$mcpt['file_sk']) ? $mcpt['file_sk'] : (!empty($mcp['file_sk'])&& file_exists('assets/asn/dokumen/arsip/'.$mcp['file_sk']) ? $mcp['file_sk'] : 'Belum ada File SK CPNS') ?></i></p>
                                                        <input type="file" class="form-control-file" name="file_sk_cpns" ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg">
                                                    <div class="form-group form-group-default ">
                                                        <label>File SK SPMT <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                        <p><i><?= !empty($mcpt['file_spmt']) && file_exists('assets/asn/dokumen/arsip/'.$mcpt['file_spmt']) ? $mcpt['file_spmt'] : (!empty($mcp['file_spmt'])&& file_exists('assets/asn/dokumen/arsip/'.$mcp['file_spmt']) ? $mcp['file_spmt'] : 'Belum ada File SPMT CPNS') ?></i></p>
                                                        <input type="file" class="form-control-file" name="file_spmt_cpns" ?>
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
                                            <button id="form_mcp" class="btn btn-success btn-block btn-lg" <?= !empty($mcpt['nip']) && $mcpt['status_validasi_modcpns']==1 ? 'data-toggle="modal" data-target="#edit'.$mcpt['nip'].'"':'' ?> type="submit">Update</button>
                                        </div>
                                    <?= form_close(); ?>
                                    <?php if(!empty($mcpt['nip'])): ?>
                                    <!-- MODAL -->
                                    <div class="modal fade slide-up disable-scroll" id="cpns<?= $mcpt['nip'] ?>" tabindex="-1" role="dialog" aria-hidden="false">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content-wrapper">
                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                    <div class="modal-body text-center m-t-20">
                                                        <h6 class="no-margin p-b-10"><b>Keterangan Validasi : </b> <?= $mcpt['ket_validasi_modcpns'] ?></h6>
                                                        <button type="button" class="btn btn-xs btn-success btn-cons" data-dismiss="modal">Tutup</button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <div class="modal fade slide-up disable-scroll" id="edit<?= $mcpt['nip'] ?>" tabindex="-1" role="dialog" aria-hidden="false">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content-wrapper">
                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                    <div class="modal-body text-center m-t-20">
                                                        <h6 class="no-margin p-b-10">Data sementara dalam proses validasi tahap <?= $mcpt['validator_modcpns'] ?>, Data tdiak bisa diedit</h6>
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
    <script src="<?= base_url(); ?>assets/asn/js/scripts.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(function($) {
            $("input[name=tmt_cpns]").mask("99-99-9999");
            $("input[name=tanggal_bkn]").mask("99-99-9999");
            $("input[name=tglsk]").mask("99-99-9999");
            $("input[name=tanggal_spmt]").mask("99-99-9999");
        });

        
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            if(<?= count($mcpt) ?> > 0 ){
                if(<?= $mcpt['status_validasi_modcpns'] ?> > 0){
                    $('#form-cpns input').prop('readonly', true);
                    // $('#form-cpns select').prop('disabled', true);
                    $('#form_mcp').attr('type', 'button');
                    $('#foto_profil').prop('hidden', true);
                }else{
                    $('#form-cpns input').prop('readonly', false);
                    // $('#form-cpns select').prop('disabled', false);
                    $('#form_mcp').attr('type', 'submit');
                    $('#foto_profil').prop('hidden', false);
                }
            }else{
                $('#form-cpns input').prop('readonly', false);
                // $('#form-cpns select').prop('disabled', true);
                $('#form_mcp').attr('type', 'submit');
                $('#foto_profil').prop('hidden', false);
            }
        });
    </script>
    
</body>

</html>