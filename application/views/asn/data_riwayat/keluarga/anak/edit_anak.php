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
                                <?= form_open_multipart('data_riwayat/update_anak/rubah/'.$id, 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                <input type="text" name="enabledank" class="form-control" value="<?= $mgk['status_aktif'] ?>" hidden>        
                                <div class="form-group row">
                                        <label class="col-md-3 ">Status pasangan</label>
                                        <div class="col-md-9">
                                            <select class="full-width select2-hidden-accessible" name="anak" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                                <option value="">--- Pilih ---</option>
                                                <optgroup label="Pilih Status pasangan">
                                                    <?php foreach($mkeluarga as $o): ?>
                                                        <option value="<?= $o['id_anak'] ?>" <?= $mgk['anak_id']==$o['id_anak'] ? 'selected' : '' ?>><?= $o['nm_anak'] ?></option>
                                                    <?php endforeach;?>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-3 ">Nama Anak</label>
                                        <div class="col-md-9">
                                            <input type="text" name="anaknm" class="form-control" value="<?= $mgk['nama'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 ">Jenis Kelamin</label>
                                        <div class="col-md-9">
                                            <select class="full-width select2-hidden-accessible" name="anakjenkel" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                                <option value="">--- Pilih ---</option>
                                                <optgroup label="Pilih Status pasangan">
                                                    <?php foreach($mkelamin as $k): ?>
                                                        <option value="<?= $k['id_kelamin'] ?>" <?= $mgk['kelamin_id']==$k['id_kelamin'] ? 'selected' : '' ?>><?= $k['nm_kelamin'] ?></option>
                                                    <?php endforeach;?>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-3 ">Nomor Akte Lahir</label>
                                        <div class="col-md-9">
                                            <input type="text" name="anaknoaktalahir" class="form-control" value="<?= $mgk['noaktalahir'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-3 ">Nomor BPJS</label>
                                        <div class="col-md-9">
                                            <input type="text" name="anaknobpjs" class="form-control" value="<?= $mgk['nobpjs'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-3 ">Tempat Lahir</label>
                                        <div class="col-md-9">
                                            <input type="text" name="anaktl" class="form-control" value="<?= $mgk['tempat_lahir'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 ">Tanggal Lahir</label>
                                        <div class="col-md-9">
                                            <div id="datepicker-component" class="input-group date">
                                                <input type="text" name="anaktgll" class="form-control" id="tgllahir" value="<?= !empty($mgk['tanggal_lahir']) && !empty($mgk['tanggal_lahir']) ? date('d-m-Y', strtotime($mgk['tanggal_lahir'])) : '' ?>">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-3 ">Pekerjaan</label>
                                        <div class="col-md-9">
                                            <input type="text" name="anakpekerjaan" class="form-control" value="<?= $mgk['pekerjaan'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-3 ">Nama Ibu</label>
                                        <div class="col-md-9">
                                            <input type="text" name="ibunm" class="form-control" value="<?= $mgk['nama_ibu'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group form-group-default mt-2">
                                        <label>File Akte Lahir Anak <small class="text-danger">[pdf | Max 500Kb] </small></label>
                                        <p><i><?= !empty($mgk['file_akta_lahir']) ? $mgk['file_akta_lahir'] : 'Belum ada File Akta Lahir Anak' ?></p>
                                        <input type="file" class="form-control-file" name="file_akta_lahir" value="<?= $mgk['file_akta_lahir'] ?>">
                                    </div>
                                    <div class="form-group form-group-default mt-2">
                                        <label>File BPJS Anak <small class="text-danger">[pdf | Max 500Kb] </small></label>
                                        <p><i><?= !empty($mgk['file_bpjs_anak']) ? $mgk['file_bpjs_anak'] : 'Belum ada File BPJS Anak' ?></p>
                                        <input type="file" class="form-control-file" name="file_bpjs_anak">
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
            }else{
                $('#bercerai').prop('hidden', true);
                $('#bercerai input').prop('readonly', true).prop('value', null).prop('required', false);
                $('#bercerai select').prop('readonly', true).prop('value', null).prop('required', false);
            }
        }
    </script>
</body>

</html>