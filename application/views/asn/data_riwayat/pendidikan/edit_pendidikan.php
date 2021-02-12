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
                                <?= form_open_multipart('data_riwayat/update_pendidikan/rubah/'.$id, 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                    <input type="text" name="enablededu" class="form-control" value="<?= $pd['status_aktif'] ?>" hidden>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Jenis Pendidikan</label>
                                        <div class="col-md-10">
                                            <select class="full-width select2-hidden-accessible" name="pendidikanjns" data-init-plugin="select2" tabindex="-1" onchange="getjnspendidikan($(this).val())" aria-hidden="true">
                                                <option value="">-- Pilih ---</option>
                                                <option value="1" <?= $pd['jenis_pendidikan']==1 ? 'selected' : '' ?>>Pendidikan Umum</option>
                                                <option value="2" <?= $pd['jenis_pendidikan']==2 ? 'selected' : '' ?>>Profesi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="jenjenp" class="form-group row" <?= empty($pd['jenis_pendidikan']) ? 'hidden' : '' ?>>
                                        <label class="col-md-2 ">Jenjang Pendidikan</label>
                                        <div class="col-md-10">
                                            <select class="full-width select2-hidden-accessible" name="pendidikanj" data-init-plugin="select2" tabindex="-1" onchange="getjjgpendidikan($(this).val())" aria-hidden="true">
                                                <option value="">--- Pilih ---</option>
                                                <optgroup label="Pilih Peran">
                                                    <?php foreach ($mjpendidikan as $mp) : ?>
                                                        <option value="<?= $mp['id_jpendidikan'] ?>" <?= $pd['jpendidikan_id']==$mp['id_jpendidikan'] ? 'selected':'' ?>><?= $mp['nm_jpendidikan'] ?></option>
                                                    <?php endforeach; ?>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="jurusan" class="form-group row" <?= $pd['jenis_pendidikan']==1 || $pd['jenis_pendidikan']==2 ? 'hidden' : '' ?>>
                                        <label  class="col-md-2 ">Jurusan</label>
                                        <div class="col-md-10">
                                            <input type="text" name="nmjurusan" class="form-control" value="<?= $pd['jurusan'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-2 ">Nama Lembaga</label>
                                        <div class="col-md-10">
                                            <input type="text" name="lembaganm" class="form-control" value="<?= $pd['nm_lembaga'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-2 ">Nama Kepala</label>
                                        <div class="col-md-10">
                                            <input type="text" name="kepalanm" class="form-control" value="<?= $pd['nm_kepala'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-md-2 ">Nomor Ijazah</label>
                                        <div class="col-md-10">
                                            <input type="text" name="ijazahno" class="form-control" value="<?= $pd['no_ijazah'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Tanggal Lulus</label>
                                        <div class="col-md-10">
                                            <div id="datepicker-component" class="input-group date">
                                                <input type="text" name="lulustgl" class="form-control" id="tgllulus" value="<?= isset($pd['tgl_lulus']) ? date('d-m-Y', strtotime($pd['tgl_lulus'])):'' ?>">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label  class="col-md-2 ">Pendidikan Pertama</label>
                                        <div class="col-md-10">
                                            <input type="text" name="awalpendidikan" class="form-control" value="<?= $pd['pendidikan_pertama'] ?>">
                                        </div>
                                    </div> -->
                                    <div class="form-group form-group-default ">
                                        <label>File Ijazah disatukan dengan file Transkrip <small class="text-danger">[pdf | Max 500Kb]</small></label>
                                        <p><i><?= isset($pd['file_ijazah_pendidikan']) ? $pd['file_ijazah_pendidikan'] : 'Belum ada File Ijazah' ?></i></p>
                                        <input type="file" class="form-control-file" name="file_ijazahp" value="<?= $pd['file_ijazah_pendidikan'] ?>">
                                    </div>
                                    <br>
                                    <div class="row">
                                        <!-- <div class="col-md-3">
                                        <p>I hereby certify that the information above is true and accurate. </p>
                                        </div> -->
                                        <div class="col-md-9">
                                            <button class="btn btn-success" type="submit">Submit</button>
                                            <button class="btn btn-default" type="reset"><i class="pg-close"></i> Clear</button>
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
            $("#tgllulus").mask("99-99-9999");
        });

        function getjnspendidikan(jns){
            if(jns == 1){
                $('#jenjenp').prop('hidden', false);
                $('#jenjenp input').prop('readonly', false).prop('required', true);
                $('#jenjenp select').prop('readonly', false).prop('required', true);
            }else{
                $('#jenjenp').prop('hidden', true);
                $('#jenjenp input').prop('readonly', true).prop('value', null).prop('required', false);
                $('#jenjenp select').prop('readonly', true).prop('value', null).prop('required', false);
            }
        }
        function getjjgpendidikan(jjg){
            if(jjg == 1 || jjg == 2){
                $('#jurusan').prop('hidden', true);
                $('#jurusan input').prop('readonly', true).prop('value', null).prop('required', false);
            }else{
                $('#jurusan').prop('hidden', false);
                $('#jurusan input').prop('readonly', false).prop('required', true);
            }
        }

    </script>
</body>

</html>