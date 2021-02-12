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
                            <h4><b>FORM TAMBAH PEGAWAI</b></h4>
                        </label>
                        <?= form_open('admin/tambah_pegawai/input_data_pegawai', 'class="form-horizontal"', 'name = "myform"');?>
                            <?php echo $this->session->flashdata('alert');?>
                            <div class="form-group row">
                                <label for="fname" class="col-md-3">Nomor Induk Pegawai</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" id="" name="nip" placeholder="Nomor Induk Pegawai" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-md-3">Nama Pegawai</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" id="nm_pegawai" name="nm_pegawai" placeholder="Nama Pegawai" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="fname" class="col-md-3">Email</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="email" id="email" name="email" placeholder="contoh@email.com" class="form-control" required>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="form-group row">
                                <label for="fname" class="col-md-3">Nomor HP</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" id="nohp" name="nohp" placeholder="Nomor HP" class="form-control" required>
                                    </div>
                                </div>
                            </div> -->
                            <?php if($user['level_id'] == 1 || $user['level_id'] == 2): ?>
                                <div class="form-group row">
                                    <label for="fname" class="col-md-3">Unit Kerja</label>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <select class="full-width" data-init-plugin="select2" name="unit_kerja">
                                                <option value="">--- Pilih ---</option>
                                                <optgroup label="Daftar SKPD">
                                                    <?php  foreach ($skpd as $s): ?>
                                                        <option value="<?= $s['id_unitkerja'] ?>"><?= $s['nm_unitkerja'] ?></option>
                                                    <?php endforeach;?>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                            <!-- <div class="form-group row">
                                <label for="fname" class="col-md-3">Level</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <select class="full-width" data-init-plugin="select2" name="level_id">
                                            <optgroup label="Level">
                                                <?php  foreach ($lvl as $l): ?>
                                                    <option value="<?= $l['id_level'] ?>"><?= $l['level'] ?></option>
                                                <?php endforeach;?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group row" hidden>
                                <label for="fname" class="col-md-3">Unit Kerja</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" id="lvlid" <?= $user['level_id']==3 ? 'name="unit_kerja" value="'.$user['skpd_id'].'"' : ''; ?> class="form-control text-black">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-md-3">Jenis Pegawai</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <select class="full-width" data-init-plugin="select2" name="jenis_pegawai">
                                            <?php  foreach ($jenis_pegawai as $j): ?>
                                                <option value="<?= $j['id_jenis_pegawai'] ?>"><?= $j['jenis_pegawai'] ?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-md-3">Nomor Arsip</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" id="noarsip" name="noarsip" placeholder="Nomor Arsip" class="form-control text-black" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-md-3">Username</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" id="username" name="username" placeholder="Buat Username! Klik tombol Generat" class="form-control text-black" required readonly>
                                        <button type="button" id="genuser" class="btn btn-info btn-cons">Generate</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-md-3">Password</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" id="password" name="password" placeholder="Buat Password! Klik tombol Generat " class="form-control text-black" required readonly>
                                        <button type="button" id="genpass" class="btn btn-info btn-cons">Generate</button>
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
        $(document).ready(function(){
            $("#genuser").click(function(){
                $.ajax({url: "<?= base_url().'admin/tambah_pegawai/generate_username'; ?>", dataType : 'json', success: function(result){
                    $("input[name=username]").attr('value', result);
                }});
            });

            $("#genpass").click(function(){
                $.ajax({url: "<?= base_url().'admin/tambah_pegawai/generate_password'; ?>", dataType : 'json', success: function(result){
                    $("input[name=password]").attr('value', result);
                }});
            });
        });
    </script>
</body>

</html>