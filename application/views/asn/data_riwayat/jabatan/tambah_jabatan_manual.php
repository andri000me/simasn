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
                <div class=" container-fluid   container-fixed-lg">
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
                    
                        <!-- START card -->
                        <!-- <div class="card card-default">
                            <div class="card-block card-transparent">

                                <form role="form">
                                    <div class="form-group">
                                        <label>Jenis Jabatan</label>
                                        <select class="full-width select2-hidden-accessible" name="jenjab_id " data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                            <optgroup label="Pilih Jenis Jabatan">
                                                <option value="1">Jabatan Pimpinan Tinggi</option>
                                                <option value="2">Struktural</option>
                                                <option value="3">Fungsional</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelompok Jabatan</label>
                                        <select class="full-width select2-hidden-accessible" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                            <optgroup label="Pilih Kelompok Jabatan">
                                                <option value="struktural">Struktural</option>
                                                <option value="fungsional">Fungsional</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Jabatan</label>
                                        <select class="full-width select2-hidden-accessible" name="jabatan_id" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                            <optgroup label="Pilih Nama Jabatan">
                                                <?php foreach ($master_jabatan as $mj) : ?>
                                                    <option value="<?= $mj['id_jabatan'] ?>"><?= $mj['jabatan'] ?></option>
                                                <?php endforeach ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <label>Tugas Pokok</label>
                                                <select class="full-width select2-hidden-accessible" name="tugaspokok_id" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                                    <optgroup label="Pilih Tugas Pokok">
                                                        <?php foreach ($master_tupok as $mt) : ?>
                                                            <option value="<?= $mt['id_tupok'] ?>"><?= $mt['nama_tugas_pokok'] ?></option>
                                                        <?php endforeach; ?>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <p> <br><br> Tugas pokok hanya diisi jika jabatan fungsional </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <label>TMT Jabatan</label>
                                                <input type="text" name="tmt_jabatan" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <p> <br><br> Gunakan Format Tanggal-Bulan-Tahun. Contoh 17-08-1984 </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <label>TMT Jabatan Awal</label>
                                                <input type="text" name="tmt_jabatan_awal" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <p> <br><br> Gunakan Format Tanggal-Bulan-Tahun. Contoh 17-08-1984 </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <label>Tanggal Pelantikan</label>
                                                <input type="text" name="" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <p> <br>Tanggal Pelantikan Diisi Jika Jabatan Struktural. Format 17-08-1984 </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <label>Tanggal SK</label>
                                                <input type="text" name="tgl_sk" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <p> <br><br> Gunakan Format Tanggal-Bulan-Tahun. Contoh 17-08-1984 </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor SK</label>
                                        <input type="text" name="no_sk" class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Pejabat Yang Menetapkan</label>
                                        <input type="text" name="pejabat_sk" class="form-control" required="">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label><b> Unit Organisasi </b></label>
                                        <select class="full-width select2-hidden-accessible" name="unitkerja_id" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                            <optgroup label="Pilih Unit Organisasi">
                                                <?php foreach ($master_organisasi as $mo) : ?>
                                                    <option value="<?= $mo['id_organisasi'] ?>"><?= $mo['nm_organisasi'] ?></option>
                                                <?php endforeach; ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Unit Kerja</label>
                                        <select class="full-width select2-hidden-accessible" name="unitkerja_id" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                            <optgroup label="Pilih Unit Kerja">
                                                <?php foreach ($master_unitkerja as $mu) : ?>
                                                    <option value="<?= $mu['id_unitkerja'] ?>"><?= $mu['nm_unitkerja'] ?></option>
                                                <?php endforeach; ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Bagian Unit Kerja</label>
                                        <select class="full-width select2-hidden-accessible" name="bagian_id" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                            <optgroup label="Pilih Bagian Unit Kerja">
                                                <?php foreach ($master_bidang as $mb) : ?>
                                                    <option value="<?= $mb['id_masterbidang'] ?>"><?= $mb['nm_bidang'] ?></option>
                                                <?php endforeach; ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Bagian Unit Kerja</label>
                                        <select class="full-width select2-hidden-accessible" name="subbagian_id" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                            <optgroup label="Pilih Sub Bagian Unit Kerja">
                                                <?php foreach ($master_subbidang as $ms) : ?>
                                                    <option value="<?= $ms['id_mastersubbidang'] ?>"><?= $ms['nm_subbidang'] ?></option>
                                                <?php endforeach; ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Tugas</label>
                                        <select class="full-width select2-hidden-accessible" name="tempatkerja_id" data-init-plugin="select2" tabindex="-1" aria-hidden="true">
                                            <optgroup label="Pilih Tempat Tugas">
                                                <?php foreach ($master_tempatkerja as $mt) : ?>
                                                    <option value="<?= $mt['id_tempatkerja'] ?>"><?= $ms['nm_tempatkerja'] ?></option>
                                                <?php endforeach; ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group pull-right">
                                        <a href="<?= base_url("data_riwayat/jabatan") ?>" type="button" class="btn btn-primary btn-cons">Back</a>
                                        <a href="<?= base_url("data_riwayat/jabatan") ?>" type="button" class="btn btn-success btn-cons">Simpan</a>
                                    </div>
                                </form>
                            </div> -->
                            <!-- END card -->
                        <!-- </div> -->
                        <!-- END PLACE PAGE CONTENT HERE -->
                    
                    <div class="col-lg-12">
                        <div class="row column-seperation">
                            <div class="col-lg-12">
                                <form id="form-work" class="form-horizontal" role="form" autocomplete="off">
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Jabatan</label>
                                        <div class="col-md-10">
                                            <!-- <input type="text" class="form-control" name="tanggalpelantikan" required> -->
                                            <input type="text" name="jabatan" class="form-control" id="jabatan" required
                                                value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Eselon</label>
                                        <div class="col-md-10">
                                            <!-- <input type="text" class="form-control" name="tanggalpelantikan" required> -->
                                            <input type="text" name="eselon" class="form-control" id="eselon" required
                                                value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Unit Kerja</label>
                                        <div class="col-md-10">
                                            <!-- <input type="text" class="form-control" name="tanggalpelantikan" required> -->
                                            <input type="text" name="unitkerja" class="form-control" id="unitkerja" required
                                                value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">TMT Jabatan</label>
                                        <div class="col-lg-5">
                                            <div id="datepicker-component" class="input-group date">
                                                <input type="text" name="tmt_jabatan_manual" class="form-control" id="tmtjabmanual">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label class="col-md-2 ">TMT Awal Jabatan</label>
                                        <div class="col-lg-5">
                                            <div id="datepicker-component" class="input-group date">
                                                <input type="text" name="tmt_awaljabatan_manual" class="form-control" id="tmtawaljabmanual">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Tanggal SK</label>
                                        <div class="col-lg-5">
                                            <div id="datepicker-component" class="input-group date">
                                                <input type="text" name="tgl_sk_manual" class="form-control" id="tglskmanual">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">TMT Pelantikan</label>
                                        <div class="col-lg-5">
                                            <div id="datepicker-component" class="input-group date">
                                                <input type="text" name="tgl_pelantikan_manual" class="form-control" id="tglpelantikanmanual">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Nomor SK</label>
                                        <div class="col-md-10">
                                            <!-- <input type="text" class="form-control" name="tanggalpelantikan" required> -->
                                            <input type="text" name="noskmanual" class="form-control" id="nosk" required
                                                value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Pejabat yang menetapkan</label>
                                        <div class="col-md-10">
                                            <!-- <input type="text" class="form-control" name="tanggalpelantikan" required> -->
                                            <input type="text" name="pejabatmanual" class="form-control" id="pejabatmanual" required
                                                value="">
                                        </div>
                                    </div>
                                    <p class="pull-right">
                                        <a href="<?= base_url('data_riwayat/jabatan/tambah_jabatan'); ?>" type="button" class="btn btn-default btn-cons">Batal</a>
                                        <button type="button" class="btn btn-success btn-cons">Simpan</button>
                                    </p>
                                </form>
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
            $("#tglpelantikanmanual").mask("99-99-9999");
            $("#tmtjabmanual").mask("99-99-9999");
            $("#tmtawaljabmanual").mask("99-99-9999");
            $("#tglskmanual").mask("99-99-9999");
        });

        function getSubjenisjabatan(idjenis){
            // alert(status);
            $.ajax({
                url : "<?= base_url();?>data_riwayat/get_subjenis_jabatan",
                method : "POST",
                data : {idjenis: idjenis},
                dataType : 'json',
                success : function(data){
                    var html;
                    var i;
                    if(idjenis == ''){
                        $('#subemp').prop('hidden', true);
                        $('#subemp_jenis_jabatan').prop('disabled', true).prop('required', false);
                        $('#subada').prop('hidden', true);
                        $('#subada_jenis_jabatan').prop('disabled', true).prop('required', false);
                        $('#subsubada').prop('disabled', true).prop('required', false);
                        $('#sub_bagian_bidang').prop('disabled', true).prop('required', false).prop('hidden', true);
                        $('#bagian_bidang').prop('disabled', true).prop('required', false).prop('hidden',true);
                        
                    }else{
                        html += '<option value="">-- Pilih --</option>';
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i].id_subjenis_jabatan+'">'+data[i].subjenis_jabatan+'</option>';
                            if(data[i].sub > 0){
                                $('#subemp').prop('hidden', true);
                                $('#subemp_jenis_jabatan').prop('disabled', true).prop('required', false);
                                $('#subada').prop('hidden', false);
                                $('#subada_jenis_jabatan').prop('disabled', false).prop('required', true).html(html);
                                $('#subsubada').prop('disabled', false).prop('required', true);
                            }else{
                                $('#subemp').prop('hidden', false);
                                $('#subemp_jenis_jabatan').prop('disabled', false).prop('required', true).html(html);
                                $('#subada').prop('hidden', true);
                                $('#subada_jenis_jabatan').prop('disabled', true).prop('required', false);
                                $('#subsubada').prop('disabled', true).prop('required', false);
                            }
                            $('#sub_bagian_bidang').prop('disabled', true).prop('required', false).prop('hidden', true);
                            $('#bagian_bidang').prop('disabled', true).prop('required', false).prop('hidden',true);
                        }
                    }
                }
            });
        };

        function getSubSubjenisjabatan(idsubjenis){
            // alert(idsubjenis);
            $.ajax({
                url : "<?= base_url();?>data_riwayat/get_subsubjenis_jabatan",
                method : "POST",
                data : {idsubjenis: idsubjenis},
                dataType : 'json',
                success : function(data){
                    var html;
                    var i;
                    html += '<option value="">-- Pilih --</option>';
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].id_sub_subjenis_jabatan+'">'+data[i].sub_subjenis_jabatan+'</option>';
                        $('#subsubada').html(html);
                    }
                }
            });
            if(idsubjenis == 4){
                $('#sub_bagian_bidang').prop('disabled', true).prop('required', false).prop('hidden', true);
                $('#bagian_bidang').prop('disabled', false).prop('required', true).prop('hidden', false);
            }else if(idsubjenis == 5 || idsubjenis == 6){
                $('#sub_bagian_bidang').prop('disabled', false).prop('required', true).prop('hidden', false);
                $('#bagian_bidang').prop('disabled', true).prop('required', false).prop('hidden',true);
            }else{
                $('#sub_bagian_bidang').prop('disabled', true).prop('required', false).prop('hidden', true);
                $('#bagian_bidang').prop('disabled', true).prop('required', false).prop('hidden',true);
            }
        };
    </script>
</body>

</html>