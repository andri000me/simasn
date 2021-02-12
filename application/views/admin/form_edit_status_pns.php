<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('admin/include/metadata'); ?>


    <link href="<?= base_url(); ?>assets/admin/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    
    <link href="<?= base_url(); ?>assets/admin/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/admin/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/admin/plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">
    <link href="<?= base_url(); ?>assets/admin/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen">
    <link href="<?= base_url(); ?>assets/admin/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" media="screen">

    <link href="<?= base_url(); ?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="<?= base_url(); ?>assets/pages/css/themes/modern.css" rel="stylesheet" type="text/css" />
    <script src="http://code.jquery.com/jquery-latest.js"></script>
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
                    <div class=" container p-l-0 p-r-0   container-fixed-lg sm-p-l-0 sm-p-r-0">
                        <div class="inner">
                            <!-- START BREADCRUMB -->
                        </div>
                    </div>
                </div>
                <!-- END JUMBOTRON -->
                <!-- START CONTAINER FLUID -->
                <div class=" container container-fixed-lg">
                  <!-- BEGIN PlACE PAGE CONTENT HERE -->
                    <div class="col-md-12">
                        <label class="m-t-0">
                            <h4><b>FORM EDIT STATUS PEGAWAI</b></h4>
                        </label>
                        <?= form_open_multipart('admin/master_pegawai/update_status_pns/'.$nip, 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                            <?php echo $this->session->flashdata('alert');?>
                            <div class="form-group row">
                                <label for="fname" class="col-md-3">Status Pegawai</label>
                                <div class="col-md-6">
                                    <select id="status_pegawai" name="status_pegawai" class="full-width" data-init-plugin="select2" onchange="getKedudukan($(this).val())" required>
                                        <option value="" required>-- Pilih Status Pegawai -- </option>
                                        <option value="1" <?= !empty($identitas['status_pegawai']) && $identitas['status_pegawai']==1 ? 'selected' : '' ?>>Aktif</option>
                                        <option value="2" <?= !empty($identitas['status_pegawai']) && $identitas['status_pegawai']==2 ? 'selected' : '' ?>>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-md-3">Status Kedudukan PNS</label>
                                <div class="col-md-6">
                                    <select id="kedudukan" name="kedudukan" class="full-width" data-init-plugin="select2" required>
                                        <option value="" required>-- Pilih Kedudukan PNS -- </option>
                                        <?php foreach($mkedudukan as $k): ?>
                                            <option value="<?= $k['id_kedudukan'] ?>" <?= !empty($identitas['kedudukan_id']) && $identitas['kedudukan_id']==$k['id_kedudukan'] ? 'selected':null ?>><?= $k['nm_kedudukan'] ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div id="sk" <?= !empty($identitas['status_pegawai']) && $identitas['status_pegawai']==2  ? '' : 'hidden' ?>>
                                <div class="form-group row">
                                    <label for="fname" class="col-md-3">Nomor SK</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" <?= !empty($identitas['no_statuspns']) && !empty($identitas['no_statuspns']) ? 'value="'.$identitas['no_statuspns'].'"' :  'value="'.null.'" placeholder="-"' ?> name="nomor_sk_statuspns">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-md-3">TMT SK PNS</label>
                                    <div class="col-md-6">
                                        <div class="form-input-group">
                                            <input type="text"  class="form-control" id="datepicker-component2" data-date-format="dd-mm-yyyy" name="tanggal_sk_statuspns"
                                                <?php 
                                                    if(!empty($identitas['tglsk_statuspns'])):
                                                        if(!empty($identitas['tglsk_statuspns'])):echo 'value="'.date('d-m-Y', strtotime($identitas['tglsk_statuspns'])).'"';else: echo 'placeholder="-"';endif;
                                                    endif;
                                                ?>
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-md-3">Tanggal SK</label>
                                    <div class="col-md-6">
                                        <div class="form-input-group">
                                            <input type="text"  class="form-control" id="datepicker-component2" data-date-format="dd-mm-yyyy" name="tmt_sk_statuspns"
                                                <?php 
                                                    if(!empty($identitas['tmt_statuspns'])):
                                                        if(!empty($identitas['tmt_statuspns'])):echo 'value="'.date('d-m-Y', strtotime($identitas['tmt_statuspns'])).'"';else: echo 'placeholder="-"'; endif;
                                                    endif;
                                                ?> 
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-md-3">Keterangan</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <textarea class="form-control" name="statuspnsket"><?= !empty($identitas['ket_statuspns']) ? $identitas['ket_statuspns'] :  null; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div id="skfile" <?= !empty($identitas['status_pegawai']) && $identitas['status_pegawai']==2  ? '' : 'hidden' ?>>
                                    <div class="form-group row">
                                        <label for="fname" class="col-md-3">File SK PNS Non Aktif <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                        <div class="col-md-6">
                                            <div class="form-input-group">
                                                <p><i><?= !empty($identitas['file_sk_pnsnonaktif']) && file_exists('assets/asn/dokumen/arsip/'.$identitas['file_sk_pnsnonaktif']) ? $identitas['file_sk_pnsnonaktif']  : 'Belum ada File SK PNS Non Aktif' ?></i></p>
                                                <input type="file" class="form-control-file" name="sk_pnsnonaktif">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <br>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-danger">Batal</button>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div> <!-- END PLACE PAGE CONTENT HERE -->
    </div>
    <!-- END CONTAINER FLUID -->
    </div>
    <!-- END PAGE CONTENT -->
    <!-- START COPYRIGHT -->
    <!-- START CONTAINER FLUID -->
    <!-- START CONTAINER FLUID -->
    <?php $this->load->view('admin/include/footer'); ?>
    <!-- END COPYRIGHT -->
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->

    <!-- BEGIN VENDOR JS -->
    <!-- <script src="<?= base_url(); ?>assets/admin/plugins/pace/pace.min.js" type="text/javascript"></script> -->
    <script src="<?= base_url(); ?>assets/admin/plugins/liga.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/popper/umd/popper.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/admin/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/admin/plugins/classie/classie.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/admin/plugins/jquery-autonumeric/autoNumeric.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/admin/plugins/dropzone/dropzone.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/admin/plugins/bootstrap-tag/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/admin/plugins/jquery-inputmask/jquery.inputmask.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/quill/quill.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/bootstrap-typehead/typeahead.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/bootstrap-typehead/typeahead.jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/handlebars/handlebars-v4.0.5.js"></script>

    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?= base_url(); ?>assets/admin/js/form_elements.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
     <!--  Generate a password string -->
    <script type="text/javascript">
        $(function($) {
            $('input').inputmask();
        });
        function getKedudukan(status){
            $.ajax({
                url : "<?= base_url();?>get_data/get_statuskedudukan",
                method : "POST",
                data : {status: status},
                dataType : 'json',
                success : function(data){
                    var html;
                    var i;
                    if(status == 1){
                        html += '<option value="">-- Pilih --</option>';
                        html += '<optgroup label="Aktif">';
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i].id_kedudukan+'">'+data[i].nm_kedudukan+'</option>';
                        }
                        html += '</optgroup';
                        $('#sk').prop('hidden', true);
                        $('#sk input').prop('value', null);
                        $('#skfile').prop('hidden', true);
                        $('#skfile inpu').prop('value', null);

                    }
                    if(status == 2){
                        html += '<option value="">-- Pilih --</option>';
                        html += '<optgroup label="Tidak Aktif">';
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i].id_kedudukan+'">'+data[i].nm_kedudukan+'</option>';
                        }
                        html += '</optgroup';
                        $('#sk').prop('hidden', false);
                        $('#skfile').prop('hidden', false);
                    }
                    $('#kedudukan').html(html);
                }
            });
        };


    </script>
</body>

</html>