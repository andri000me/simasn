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
                        <h5 class="semi-bold"><?= strtoupper(str_replace('_', ' ', $this->uri->segment(2)));?></h5>
                    </center>
                    
                    <div class="col-lg-12">
                        <div class="row column-seperation">
                            <div class="col-lg-12">
                                <?= form_open_multipart('data_riwayat/update_hukuman/tambah', 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>  
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Jenis Hukuman</label>
                                        <div class="col-md-10">
                                            <select class="full-width select2-hidden-accessible" name="hukumanj" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                                <option value="">--- Pilih ---</option>
                                                <optgroup label="Pilih Jenis Hukuman">
                                                    <?php foreach ($mjhukuman as $mjh) : ?>
                                                        <option value="<?= $mjh['id_jenis_hukuman'] ?>"><?= $mjh['jenis_hukuman'] ?></option>
                                                    <?php endforeach; ?>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Nama Hukuman</label>
                                        <div class="col-md-10">
                                            <select class="full-width select2-hidden-accessible" name="hukumannm" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                                <option value="">--- Pilih ---</option>
                                                <optgroup label="Pilih Jenis Hukuman">
                                                    <?php foreach ($mhukuman as $mh) : ?>
                                                        <option value="<?= $mh['id_hukuman'] ?>"><?= $mh['nm_hukuman'] ?></option>
                                                    <?php endforeach; ?>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-2 ">Nomor SK</label>
                                        <div class="col-md-10">
                                            <input type="text" name="nosk_huk" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Tanggal SK</label>
                                        <div class="col-md-10">
                                            <div id="datepicker-component" class="input-group date">
                                                <input type="text" name="tglsk_huk" class="form-control" id="tglsk_huk" required>
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-2 ">Masa Hukuman (Bulan)</label>
                                        <div class="col-md-10">
                                            <input type="text" name="mh_bln" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-2 ">Masa Hukuman (Tahun)</label>
                                        <div class="col-md-10">
                                            <input type="text" name="mh_thn" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">TMT Hukuman Disiplin</label>
                                        <div class="col-md-10">
                                            <div id="datepicker-component" class="input-group date">
                                                <input type="text" name="hukumantmt" class="form-control" id="hukumantmt" required>
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-2 ">Nomor SK Pembatalan</label>
                                        <div class="col-md-10">
                                            <input type="text" name="nosk_batal_huk" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Tanggal SK Pembatalan</label>
                                        <div class="col-md-10">
                                            <div id="datepicker-component" class="input-group date">
                                                <input type="text" name="tglsk_batal_huk" class="form-control" id="tglsk_batal_huk" required>
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-2 ">Alasan Hukuman</label>
                                        <div class="col-md-10">
                                            <textarea style="height: 100%;" name="alasan_huk"  class="form-control" rows="3" required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-default ">
                                        <label>File SK Hukuman <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                        <p><i>Belum ada File SK Hukuman</i></p>
                                        <input type="file" class="form-control-file" name="file_sk_hukuman">
                                    </div>
                                    <div class="form-group form-group-default ">
                                        <label>File SK Pembatalan Hukuman <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                        <p><i>Belum ada File SK Pembatalan Hukuman</i></p>
                                        <input type="file" class="form-control-file" name="file_sk_pembatalan_hukuman">
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
            $("#tglsk_huk").mask("99-99-9999");
            $("#hukumantmt").mask("99-99-9999");
            $("#tglsk_batal_huk").mask("99-99-9999");
        });

    </script>
</body>

</html>