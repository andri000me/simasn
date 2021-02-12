<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('admin/include/metadata'); ?>

    <link href="<?= base_url(); ?>assets/admin/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/admin/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/admin/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
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
                            <h4><b>FORM TAMBAH USER</b></h4>
                        </label>
                        <?= form_open('admin/data_user/add_useradmin', 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                            <?php echo $this->session->flashdata('alert');?>
                            <div class="form-group">
                                <select id="iduk" name="iduk"class="full-width" data-init-plugin="select2" onchange="getidUk($(this).val())" required>
                                    <option value="" required>-- Pilih SKPD -- </option>
                                    <?php foreach($uk as $u): ?>
                                        <option value="<?= encrypt_url($u['id_unitkerja']) ?>" <?= !empty($uk_aktif) && $uk_aktif==$u['id_unitkerja'] ? 'selected':'' ?>><?= $u['nm_unitkerja'] ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="idusr" name="idusr" class="full-width" data-init-plugin="select2" required>
                                    <option value=null>--- Pilih Asn --- </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="idlvl" name="idlvl" class="full-width" data-init-plugin="select2" required>
                                <option value="" required>-- Pilih level admin -- </option>
                                    <?php foreach($level as $u): ?>
                                        <option value="<?= $u['id_level'] ?>" ><?= $u['nm_level'] ?></option>
                                    <?php endforeach;?>
                                </select>
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
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/tether/js/tether.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/admin/plugins/select2/js/select2.full.min.js"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?= base_url(); ?>assets/admin/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
     <!--  Generate a password string -->
    <script type="text/javascript">
        function getidUk(iduk){
            $.ajax({
                url : "<?= base_url();?>admin/data_user/asn",
                method : "POST",
                data : {iduk: iduk},
                dataType : 'json',
                success : function(data){
                    var html;
                    var i;
                    html += '<option value="">--- Pilih ---</option>';
                    if(data.length > 0){
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i].nip+'">'+data[i].nama+'</option>';
                        }
                    }else{
                        $('#idusr').prop('value', null);
                    }
                    $('#idusr').html(html);
                }
            });
            
        }


    </script>
</body>

</html>