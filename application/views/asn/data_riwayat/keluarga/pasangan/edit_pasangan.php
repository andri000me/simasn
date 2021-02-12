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
    
    <link href="<?= base_url(); ?>assets/asn/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen">
    <link href="<?= base_url(); ?>assets/asn/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" media="screen">
    <link href="<?= base_url(); ?>assets/asn/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">
    <link class="main-stylesheet" href="<?= base_url(); ?>assets/pages/css/themes/corporate.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .form-horizontal .form-group {
            /*border-bottom: 1px solid #e1e1e1;*/
            padding-top: 5px;
            padding-bottom: 5px;
            /*margin-bottom: 0;*/
        }
    </style>
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
                    <!-- <div class="card card-transparent">
                        <div class="card-header ">
                            <div class="card-title"> TAMBAH JABATAN
                            </div>
                            <div class="pull-right">
                                <div class="col-xs-12">
                                    <a href="<?= base_url("data_riwayat/jabatan") ?>" type="button" id="show-modal" class="btn btn-danger btn-cons"><i class="fa fa-plus"></i> Batal </a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div> -->
                    <center>
                        <h5 class="semi-bold"><?= strtoupper(str_replace('_', ' ', $this->uri->segment(3)));?></h5>
                    </center>
                    
                    <div class="col-lg-12">
                        <div class="row column-seperation">
                            <div class="col-lg-12">
                                <?= form_open_multipart('data_riwayat/update_pasangan/rubah/'.$id, 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                <input type="text" name="enabledpas" class="form-control" value="<?= $mgk['status_aktif'] ?>" hidden>     
                                <div class="form-group row">
                                        <label class="col-md-3 ">Status pasangan</label>
                                        <div class="col-md-9">
                                            <select class="full-width select2-hidden-accessible" name="pasangan" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                                <option value="">--- Pilih ---</option>
                                                <optgroup label="Pilih Status pasangan">
                                                    <?php foreach($mkeluarga as $o): ?>
                                                        <option value="<?= $o['id_pasangan'] ?>" <?= $mgk['pasangan_id']==$o['id_pasangan'] ? 'selected' : '' ?>><?= $o['nm_pasangan'] ?></option>
                                                    <?php endforeach;?>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-3 ">Nama Pasangan</label>
                                        <div class="col-md-9">
                                            <input type="text" name="pasangannm" class="form-control" value="<?= $mgk['nama'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-3 ">Tempat Lahir</label>
                                        <div class="col-md-9">
                                            <input type="text" name="pasangantl" class="form-control" value="<?= $mgk['tempat_lahir'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 ">Tanggal Lahir</label>
                                        <div class="col-md-9">
                                            <div id="datepicker-component" class="input-group date">
                                                <input type="text" name="pasangantgll" class="form-control" id="tgllahir" value="<?= isset($mgk['tanggal_lahir']) && !empty($mgk['tanggal_lahir']) ? date('d-m-Y', strtotime($mgk['tanggal_lahir'])) : '' ?>">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 ">Tanggal Nikah</label>
                                        <div class="col-md-9">
                                            <div id="datepicker-component" class="input-group date">
                                                <input type="text" name="pasangantgln" class="form-control" id="tglnikah" value="<?= isset($mgk['tanggal_nikah']) && !empty($mgk['tanggal_nikah']) ? date('d-m-Y', strtotime($mgk['tanggal_nikah'])) : '' ?>">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-3 ">Nomor Akte Nikah</label>
                                        <div class="col-md-9">
                                            <input type="text" name="pasanganaktenikah" class="form-control" value="<?= $mgk['no_akte_nikah'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-3 ">NIP Pasangan</label>
                                        <div class="col-md-9">
                                            <input type="text" name="pasangannip" class="form-control" value="<?= $mgk['nip_pasangan'] ?>">
                                            <small class="text-danger"><i>Hanya diisi jika status pegawai PNS</i></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-3 ">Pekerjaan</label>
                                        <div class="col-md-9">
                                            <input type="text" name="pasanganpekerjaan" class="form-control" value="<?= $mgk['pekerjaan'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 ">Status Cerai</label>
                                        <div class="col-md-9">
                                            <select class="full-width select2-hidden-accessible" name="cerai" data-init-plugin="select2" tabindex="-1" onchange="getcerai($(this).val())" aria-hidden="true">
                                                <option value="1" <?= isset($mgk['no_akte_cerai']) && !empty($mgk['no_akte_cerai']) ? 'selected' : '' ?>>Ya</option>
                                                <option value="2" <?= isset($mgk['no_akte_cerai']) && !empty($mgk['no_akte_cerai']) ? '' : 'selected' ?>>Tidak</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="bercerai" <?= isset($mgk['no_akte_cerai']) && !empty($mgk['no_akte_cerai']) ? '' : 'hidden' ?>>
                                        <div class="form-group row">
                                            <label  class="col-md-3 ">Nomor Akte Cerai</label>
                                            <div class="col-md-9">
                                                <input type="text" name="pasanganaktecerai" class="form-control" value="<?= $mgk['no_akte_cerai'] ?>">
                                                <small class="text-danger"><i>Hanya diisi jika sudah bercerai</i></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 ">Tanggal Cerai</label>
                                            <div class="col-md-9">
                                                <div id="datepicker-component" class="input-group date">
                                                    <input type="text" name="pasangantglc" class="form-control" id="tglcerai" value="<?= isset($mgk['tanggal_cerai']) && !empty($mgk['tanggal_cerai']) ? date('d-m-Y', strtotime($mgk['tanggal_cerai'])) : '' ?>">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <small class="text-danger"><i>Hanya diisi jika sudah bercerai</i></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 ">Status Dasar</label>
                                        <div class="col-md-9">
                                            <select class="full-width select2-hidden-accessible" name="statusdasar" data-init-plugin="select2" tabindex="-1" onchange="getstatus($(this).val())" aria-hidden="true">
                                                <?php foreach($mstatusdasar as $ms): ?>
                                                    <option value="<?= $ms['id_status_dasar'] ?>" <?= $mgk['status_dasar_id']==$ms['id_status_dasar'] ? 'selected' : '' ?>> <?= $ms['status_dasar'] ?> </option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="smeninggal" <?= $mgk['status_dasar_id'] != 3 ? 'hidden' : '' ?>>
                                        <div class="form-group row">
                                            <label  class="col-md-3 ">Nomor Akte Meninggal</label>
                                            <div class="col-md-9">
                                                <input type="text" name="pasanganmeninggalnokate" class="form-control" value="<?= $mgk['no_akte_meninggal'] ?>">
                                                <small class="text-danger"><i>Hanya diisi jika pasangan sudah meninggal</i></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 ">Tanggal Meninggal</label>
                                            <div class="col-md-9">
                                                <div id="datepicker-component" class="input-group date">
                                                    <input type="text" name="pasangantglm" class="form-control" id="tglmeninggal" value="<?= isset($mgk['tanggal_meninggal']) && !empty($mgk['tanggal_meninggal']) ? date('d-m-Y', strtotime($mgk['tanggal_meninggal'])) : '' ?>">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                                <small class="text-danger"><i>Hanya diisi jika pasangan sudah meninggal</i></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-default mt-2">
                                        <label>File KTP Pasangan <small class="text-danger">[pdf | Max 500Kb] </small></label>
                                        <p><i> <?= !empty($mgk['file_ktp_pasangan']) && file_exists('assets/asn/dokumen/arsip/'.$mgk['file_ktp_pasangan']) ? $mgk['file_ktp_pasangan'] : 'Belum ada File KTP Pasangan' ?></i></p>
                                        <input type="file" class="form-control-file" name="file_ktp_pasangan" value="<?= $mgk['file_ktp_pasangan'] ?>">
                                    </div>
                                    <div id="bukunikah" class="form-group form-group-default mt-2" <?= !empty($mgk['no_akte_cerai']) ? 'hidden' : '' ?>>
                                        <label>File Buku Nikah <small class="text-danger">[pdf | Max 500Kb] </small></label>
                                        <p><i><?= !empty($mgk['file_buku_nikah']) && file_exists('assets/asn/dokumen/arsip/'.$mgk['file_buku_nikah']) ? $mgk['file_buku_nikah'] : 'Belum ada File Buku Nikah' ?></i></p>
                                        <input type="file" class="form-control-file" name="file_buku_nikah">
                                    </div>
                                    <div id="aktacerai" class="form-group form-group-default mt-2" <?= !empty($mgk['no_akte_cerai']) ? '' : 'hidden' ?>>
                                        <label>File Akta Cerai <small class="text-danger">[pdf | Max 500Kb] </small></label>
                                        <p><i><?= !empty($mgk['file_akta_cerai']) && file_exists('assets/asn/dokumen/arsip/'.$mgk['file_akta_cerai']) ? $mgk['file_akta_cerai'] : 'Belum ada File Akta Cerai' ?></i></p>
                                        <input type="file" class="form-control-file" name="file_akta_cerai">
                                    </div>
                                    <br>
                                    <div class="row">
                                        <!-- <div class="col-md-3">
                                        <p>I hereby certify that the information above is true and accurate. </p>
                                        </div> -->
                                        <div class="col-md-9">
                                            <button class="btn btn-success" type="submit">Submit</button>
                                            <button class="btn btn-default"><i class="pg-close"></i> Clear</button>
                                        </div>
                                    </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTAINER FLUID -->
                </div>
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
            $("#tgllahir").mask("99-99-9999");
            $("#tglnikah").mask("99-99-9999");
            $("#tglcerai").mask("99-99-9999");
        });

        function getstatus(ids){
            if(ids == 3){
                $('#smeninggal').prop('hidden', false);
                $('#smeninggal input').prop('readonly', false).prop('required', true);
                $('#smeninggal select').prop('readonly', false).prop('required', true);
            }else{
                $('#smeninggal').prop('hidden', true);
                $('#smeninggal input').prop('readonly', true).prop('value', null).prop('required', false);
                $('#smeninggal select').prop('readonly', true).prop('value', null).prop('required', false);
            }
        }

        function getcerai(idc){
            if(idc == 1){
                $('#bercerai').prop('hidden', false);
                $('#bercerai input').prop('readonly', false).prop('required', true);
                $('#bercerai select').prop('readonly', false).prop('required', true);
                $('#bukunikah').prop('hidden', true).prop('required', false);
                $('#aktacerai').prop('hidden', false).prop('required', true);
            }else{
                $('#bercerai').prop('hidden', true);
                $('#bercerai input').prop('readonly', true).prop('value', null).prop('required', false);
                $('#bercerai select').prop('readonly', true).prop('value', null).prop('required', false);
                $('#bukunikah').prop('hidden', false).prop('required', true);
                $('#aktacerai').prop('hidden', true).prop('required', false);
            }
        }
    </script>
</body>

</html>