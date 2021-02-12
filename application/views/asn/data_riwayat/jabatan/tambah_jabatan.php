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
                                <?= form_open_multipart('data_riwayat/update_jabatan/tambah', 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                    <div class="form-group row">
                                        <label  class="col-md-2 ">Jenis Jabatan</label>
                                        <div class="col-md-5">
                                            <select class="full-width" name="jenisjab" id="jenis_jabatan" data-init-plugin="select2" onchange="getJenisjabatan($(this).val())" required>
                                                <option value="">--- Pilih ---</option>    
                                                <?php foreach($mjjabatan as $mj): ?>
                                                    <option value="<?= $mj['id_jenis_jabatan'] ?>"><?= $mj['jenis_jabatan'] ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <!-- Untuk Jenjang Jabatan -->
                                        <div id="jenjang" class="col-md-5" hidden>
                                            <select class="full-width" name="jenjang" id="jenjang_jabatan" data-init-plugin="select2" readonly onchange="getJenjangjabatan($(this).val())" required>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Unit Kerja</label>
                                        <div class="col-md-10">
                                            <select class="full-width" name="unitkerja" id="unit_kerja" data-init-plugin="select2" required>
                                                <option value="">--- Pilih ---</option>
                                                <?php foreach ($mukerja as $u): ?>
                                                    <option value="<?= $u['id_unitkerja']?>"><?= $u['nm_unitkerja']?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <small class="p-l-5"> <a href="<?= base_url('data_riwayat/jabatan/tambah_jabatan_manual'); ?>" >Klik disini jika tidak ditemukan</a> </small>
                                        </div>
                                    </div>
                                    <div id="eselondiv" class="form-group row" hidden>
                                        <label class="col-md-2 ">Eselon</label>
                                        <div class="col-md-10">
                                            <select class="full-width" name="eselon" id="eselon" data-init-plugin="select2" required>
                                                <option value="">--- Pilih ---</option>
                                                <?php foreach ($meselon as $me): ?>
                                                    <option value="<?= $me['id_eselon']?>"><?= $me['eselon']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="sub_bagian_bidang" class="form-group row" hidden>
                                        <label class="col-md-2 ">Sub Bagian/Bidang</label>
                                        <div class="col-md-10">
                                            <select class="full-width" name="subbagian" id="subbidang" data-init-plugin="select2" readonly>
                                                <option value="">--- Pilih ---</option>
                                                <?php foreach ($msubbidang as $sb): ?>
                                                    <option value="<?= $sb['id_subbidang']?>"><?= $sb['nm_subbidang']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="bagian_bidang" class="form-group row" hidden>
                                        <label class="col-md-2 ">Bagian/Bidang</label>
                                        <div class="col-md-10">
                                            <select class="full-width" name="bagian" id="bidang" data-init-plugin="select2" readonly>
                                                <option value="">--- Pilih ---</option>
                                                <?php foreach ($mbidang as $b): ?>
                                                    <option value="<?= $b['id_bidang']?>"><?= $b['nm_bidang']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Jabatan</label>
                                        <div class="col-md-10">
                                            <select class="full-width" name="jabatan" id="jabatan" data-init-plugin="select2" readonly>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <div id="tupoks" class="form-group row" hidden>
                                        <label class="col-md-2 ">Tugas Pokok</label>
                                        <div class="col-md-10">
                                            <select class="full-width" name="tupoksi" id="tupoksi" data-init-plugin="select2" readonly>
                                                <option value="">--- Pilih ---</option>
                                                <?php foreach ($mtupoksi as $tp):?>
                                                    <option value="<?= $tp['id_tupoksi']?>"><?= $tp['nm_tupoksi']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="tmpkerja" class="form-group row" hidden>
                                        <label class="col-md-2 ">Tempat Kerja</label>
                                        <div class="col-md-10">
                                            <input type="text" name="tempatkerja" class="form-control" id="tempatkerj">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">TMT Jabatan</label>
                                        <div class="col-lg-5">
                                            <div id="datepicker-component" class="input-group date">
                                                <input type="text" name="tmtjabatan" class="form-control" id="tmtjab" required>
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Tanggal Pelantikan</label>
                                        <div class="col-lg-5">
                                            <div id="datepicker-component" class="input-group date">
                                                <input type="text" name="tmtpelantikan" class="form-control" id="tmtpelantikan" required>
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Tanggal SK</label>
                                        <div class="col-lg-5">
                                            <div id="datepicker-component" class="input-group date">
                                                <input type="text" name="tglsk" class="form-control" id="tglsk" required>
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Nomor SK</label>
                                        <div class="col-md-10">
                                            <!-- <input type="text" class="form-control" name="tanggalpelantikan" required> -->
                                            <input type="text" name="nosk" class="form-control" id="nosk" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 ">Pejabat yang menetapkan</label>
                                        <div class="col-md-10">
                                            <!-- <input type="text" class="form-control" name="tanggalpelantikan" required> -->
                                            <input type="text" name="pejabat_penetap" class="form-control" id="pejabat" required>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-default ">
                                        <label>File SK Jabatan digabung dengan pernyataan pelantikan dalam satu file pdf <small class="text-danger">[pdf | Max 500Kb]</small></label>
                                        <p><i>Belum ada File SK Jabatan</i></p>
                                        <input type="file" class="form-control-file" name="file_skjab">
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
            $("#tglpelantikan").mask("99-99-9999");
            $("#tmtjab").mask("99-99-9999");
            $("#tglsk").mask("99-99-9999");
        });

        function getJenisjabatan(idjenis){
            // alert(status);
            $.ajax({
                url : "<?= base_url();?>data_riwayat/get_jenjang_jabatan",
                method : "POST",
                data : {idjenis: idjenis},
                dataType : 'json',
                success : function(data){
                    var html;
                    var i;
                    if(idjenis == ''){
                        $('#jenjang').prop('hidden', true);
                        $('#jenjang_jabatan').prop('readonly', true).prop('required', false).prop('value', null);
                        $('#tupoks').prop('hidden', true);
                        $('#tupoks select').prop('readonly', true).prop('required', false).prop('value', null);
                        $('#tmpkerja').prop('hidden', true);
                        $('#tmpkerja select').prop('readonly', true).prop('required', false).prop('value', null);
                        $('#eselondiv').prop('hidden', true);
                        $('#eselondiv select').prop('readonly', true).prop('required', false).prop('value', null);
                    }else{
                        html += '<option value="">-- Pilih --</option>';
                        if(idjenis==3){
                            html += '<optgroup label="Keahlian">';
                            for(i=0; i<data.length; i++){
                                if(data[i].kategori_jenjang == 'keahlian'){
                                    html += '<option value="'+data[i].id_jenjang_jabatan+'">'+data[i].jenjang_jabatan+'</option>';
                                }
                            }
                            html += '</optgroup>';
                            html += '<optgroup label="Keterampilan">';
                            for(i=0; i<data.length; i++){
                                if(data[i].kategori_jenjang == 'keterampilan'){
                                    html += '<option value="'+data[i].id_jenjang_jabatan+'">'+data[i].jenjang_jabatan+'</option>';
                                }
                            }
                            html += '</optgroup>';
                            $('#tupoks').prop('hidden', false);
                            $('#tupoks select').prop('readonly', false).prop('required', true);
                            $('#tmpkerja').prop('hidden', false);
                            $('#tmpkerja select').prop('readonly', false).prop('required', true);
                            $('#eselondiv').prop('hidden', true);
                            $('#eselondiv select').prop('readonly', true).prop('required',false).prop('value', null);
                        }else if(idjenis==2){
                            for(i=0; i<data.length; i++){
                                html += '<option value="'+data[i].id_jenjang_jabatan+'">'+data[i].jenjang_jabatan+'</option>';
                            }
                            $('#tupoks').prop('hidden', true);
                            $('#tupoks select').prop('readonly', true).prop('required', false).prop('value', null);
                            $('#tmpkerja').prop('hidden', true);
                            $('#tmpkerja select').prop('readonly', true).prop('required', false).prop('value', null);
                            $('#eselondiv').prop('hidden', true);
                            $('#eselondiv select').prop('readonly', true).prop('required',false).prop('value', null);
                        }else if(idjenis==1){
                            for(i=0; i<data.length; i++){
                                html += '<option value="'+data[i].id_jenjang_jabatan+'">'+data[i].jenjang_jabatan+'</option>';
                            }
                            $('#tupoks').prop('hidden', true);
                            $('#tupoks select').prop('readonly', true).prop('required', false).prop('value', null);
                            $('#tmpkerja').prop('hidden', true);
                            $('#tmpkerja select').prop('readonly', true).prop('required', false).prop('value', null);
                            $('#eselondiv').prop('hidden', false);
                            $('#eselondiv select').prop('readonly', false).prop('required',true);
                        }else{
                            $('#jenjang').prop('hidden', true);
                            $('#jenjang_jabatan').prop('readonly', true).prop('required', false).prop('value', null);
                            $('#tupoks').prop('hidden', true);
                            $('#tupoks select').prop('readonly', true).prop('required', false).prop('value', null);
                            $('#tmpkerja').prop('hidden', true);
                            $('#tmpkerja select').prop('readonly', true).prop('required', false).prop('value', null);
                            $('#eselondiv').prop('hidden', true);
                            $('#eselondiv select').prop('readonly', true).prop('required', false).prop('value', null);
                        }
                        $('#jenjang').prop('hidden', false);
                        $('#jenjang select').prop('readonly', false).prop('required', true).html(html);
                    }
                    $('#sub_bagian_bidang').prop('hidden', true);
                    $('#sub_bagian_bidang select').prop('readonly', true).prop('required', false).prop('value', null);
                    $('#bagian_bidang').prop('hidden', true);
                    $('#bagian_bidang select').prop('readonly', true).prop('required', false).prop('value', null);
                    
                }
            });

            $.ajax({
                url : "<?= base_url();?>data_riwayat/get_masterjabatan_of_jenis",
                method : "POST",
                data : {idjenis: idjenis},
                dataType : 'json',
                success : function(data){
                    var html;
                    var i;
                    html += '<option value="">--- Pilih ---</option>';
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].id_jabatan+'">'+data[i].nm_jabatan+'</option>';
                    }
                    $('#jabatan').html(html);
                    
                }
            });
        };
        function getJenjangjabatan(idjenjab){
            if(idjenjab > 0 && idjenjab < 5){
                $('#sub_bagian_bidang').prop('hidden', true);
                $('#sub_bagian_bidang select').prop('readonly', true).prop('required', false);
                $('#bagian_bidang').prop('hidden', false);
                $('#bagian_bidang select').prop('readonly', false).prop('required', true);
                $('#eselondiv').prop('hidden', false);
                $('#eselondiv select').prop('readonly', false).prop('required',true);
            }else if(idjenjab == 5 || idjenjab == 6){
                $('#sub_bagian_bidang').prop('hidden', false);
                $('#sub_bagian_bidang select').prop('readonly', false).prop('required', true);
                $('#bagian_bidang').prop('hidden', true);
                $('#bagian_bidang select').prop('readonly', true).prop('required', false);
                $('#eselondiv').prop('hidden', true);
                $('#eselondiv select').prop('readonly', true).prop('required',false).prop('value', null);
            }else{
                $('#sub_bagian_bidang').prop('hidden', true);
                $('#sub_bagian_bidang select').prop('readonly', true).prop('required', false);
                $('#bagian_bidang').prop('hidden', true);
                $('#bagian_bidang select').prop('readonly', true).prop('required', false);
                $('#eselondiv').prop('hidden', true);
                $('#eselondiv select').prop('readonly', true).prop('required',false).prop('value', null);
            }
            $.ajax({
                url : "<?= base_url();?>data_riwayat/get_masterjabatan_of_jenjang",
                method : "POST",
                data : {idjenjab: idjenjab},
                dataType : 'json',
                success : function(data){
                    var html;
                    var i;
                    html += '<option value="">--- Pilih ---</option>';
                    if(data.length > 0){
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i].id_jabatan+'">'+data[i].nm_jabatan+'</option>';
                        }
                        $('#jabatan').html(html);
                    }
                }
            });
            
        }

    </script>
</body>

</html>