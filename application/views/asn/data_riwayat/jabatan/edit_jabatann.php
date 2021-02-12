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
                <div class=" container-fluid   container-fixed-lg">
                    <!-- BEGIN PlACE PAGE CONTENT HERE -->
                    <div class="card card-transparent">
                        <div class="card-header ">
                            <div class="card-title"> <i class="fa-address-card-o" aria-hidden="true"></i> Andi Muhammad Antariksawan
                            </div>
                            <div class="pull-right">
                                <div class="col-xs-12">
                                    <a href="<?= base_url("data_riwayat/jabatan") ?>" type="button" id="show-modal" class="btn btn-danger btn-cons"><i class="fa fa-plus"></i> Batal </a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <!-- START card -->
                        <div class="card card-default">
                            <div class="card-header ">
                                <div class="card-title">
                                    <b>+FORM EDIT JABATAN</b>
                                </div>
                            </div>
                            <div class="card-block">
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
                            </div>
                            <!-- END card -->
                        </div>
                        <!-- END PLACE PAGE CONTENT HERE -->
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
    <script src="<?= base_url(); ?>assets/asn/plugins/modernizr.custom.js" type="text/javascript"></script>
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
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?= base_url(); ?>assets/asn/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
</body>

</html>