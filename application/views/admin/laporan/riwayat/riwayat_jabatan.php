<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('admin/include/metadata'); ?>

    <link href="<?= base_url(); ?>assets/admin/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/admin/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link class="main-stylesheet" href="<?= base_url(); ?>assets/pages/css/themes/modern.css" rel="stylesheet" type="text/css" />
    <!-- Datatable  -->
    <link href="<?= base_url(); ?>assets/admin/plugins/serverside-table/css/jquery_datatables.css" rel="stylesheet" type="text/css" media="screen" />
    <!-- End Datatable  -->
    <style>
        table tbody tr td { white-space: nowrap; }
    </style>
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
                <div class="col-md-12">
                    <label>
                        <h4><b>RIWAYAT JABATAN ASN</b></h4>
                    </label>
                </div>
                <!-- START card Search and Export -->
                <div class=" container-fluid w-100  container-fixed-lg bg-white">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-header">
                            <div class="card-title col-md-9"> 
                                <div class="row">
                                    <?php if($lvlid == 1 OR  $lvlid == 2): ?>
                                    <div class="col-md-3">
                                        <?= form_open('admin/laporan/riwayat/riwayat_jabatan', 'id="filter" role="form"'); ?>
                                            <div class="form-group">
                                                <select name="ukid" id="ukid" class="full-width" data-init-plugin="select2" onchange="this.form.submit('admin/laporan/riwayat/riwayat_jabatan')">
                                                    <option value="" required>-- Pilih SKPD -- </option>
                                                    <?php foreach($uk as $u): ?>
                                                        <option value="<?= encrypt_url($u['id_unitkerja']) ?>" <?= !empty($uk_aktif) && $uk_aktif==$u['id_unitkerja'] ? 'selected':'' ?>><?= $u['nm_unitkerja'] ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        <?= form_close() ?>
                                    </div>
                                    <?php endif;?>
                                    <div class="col-md-2">
                                        <?= form_open('admin/laporan/riwayat/riwayat_jabatan', 'id="filter" role="form"'); ?>
                                            <div class="form-group">
                                                <select id="vamas" name="vamas" class="full-width" data-init-plugin="select2" onchange="this.form.submit('admin/laporan/riwayat/riwayat_jabatan')">
                                                    <option value="" required>-- Eselon --</option>
                                                    <?php foreach($esel as $g): ?>
                                                        <option value="<?= encrypt_url($g['id_eselon']) ?>" <?= !empty($vamas_aktif) && $vamas_aktif==$g['id_eselon'] ? 'selected':'' ?>><?= $g['eselon'] ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        <?= form_close() ?>
                                    </div>
                                    <div class="col-md-2">
                                        <?= form_open('admin/laporan/riwayat/riwayat_jabatan', 'id="filter" role="form"'); ?>
                                            <div class="form-group">
                                                <select id="jenis" name="jenis" class="full-width" data-init-plugin="select2" onchange="this.form.submit('admin/laporan/riwayat/riwayat_jabatan')">
                                                    <option value="" required>-- Jenis --</option>
                                                    <?php foreach($jenis as $g): ?>
                                                        <option value="<?= encrypt_url($g['id_jenis_jabatan']) ?>" <?= !empty($jenis_aktif) && $jenis_aktif==$g['id_jenis_jabatan'] ? 'selected':'' ?>><?= $g['jenis_jabatan'] ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        <?= form_close() ?>
                                    </div>
                                    <div class="col-md-3">
                                        <?= form_open('admin/laporan/riwayat/riwayat_jabatan', 'id="filter" role="form"'); ?>
                                            <div class="form-group">
                                                <select id="jenjang" name="jenjang" class="full-width" data-init-plugin="select2" onchange="this.form.submit('admin/laporan/riwayat/riwayat_jabatan')">
                                                    <option value="" required>-- Jenjang --</option>
                                                    <?php foreach($jenjang as $g): ?>
                                                        <option value="<?= encrypt_url($g['id_jenjang_jabatan']) ?>" <?= !empty($jenjang_aktif) && $jenjang_aktif==$g['id_jenjang_jabatan'] ? 'selected':'' ?>><?= $g['jenjang_jabatan'] ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        <?= form_close() ?>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="btn-group">
                                            <a class="btn btn-info btn-sm" type="button" href="<?= base_url('admin/laporan/riwayat/riwayat_jabatan/cetak') ?>">
                                                <i class="fa fa-print"></i>&nbsp;
                                                <span class="bold">Print</span>
                                            </a>
                                            <a class="btn btn-success btn-sm" type="button" href="<?= base_url('admin/laporan/riwayat/riwayat_jabatan/unduh') ?>">
                                                <i class="fa fa-download"></i>&nbsp;
                                                <span class="bold">Export</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="col-xs-12">
                                    <input type="text" id="indukuri" value="<?= $uri3 ?>" hidden>
                                    <input type="text" id="uri" value="<?= $uri4 ?>" hidden>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- END card -->
                </div>
                <!-- END card -->
                <!-- START card Tabel -->
                <div class=" container-fluid w-100  container-fixed-lg bg-white">
                    <!-- BEGIN PlACE PAGE CONTENT HERE -->
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-block">
                            <table id="jabatan" class="display table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap text-center">No.</th>
                                        <th class="text-nowrap text-center">NIP</th>
                                        <th class="text-nowrap text-center">Nama</th>
                                        <th class="text-nowrap text-center">Unit Kerja</th>
                                        <th class="text-nowrap text-center">Jenis Jabatan</th>
                                        <th class="text-nowrap text-center">Jenjang Jabatan</th>
                                        <th class="text-nowrap text-center">Eselon</th>
                                        <th class="text-nowrap text-center">Jabatan</th>
                                        <th class="text-nowrap text-center">Tanggal SK</th>
                                        <th class="text-nowrap text-center">Nomor SK</th>
                                        <th class="text-nowrap text-center">TMT Jabatan</th>
                                        <th class="text-nowrap text-center">Tanggal Pelantikan</th>
                                        <th class="text-nowrap text-center">Pejabat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END PLACE PAGE CONTENT HERE -->

                </div>
                <!-- END card Tabel -->
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
    </div>
    <!-- END PAGE CONTAINER -->

    <!-- BEGIN VENDOR JS -->
    <!-- <script src=" <?= base_url(); ?>assets/admin/plugins/pace/pace.min.js" type="text/javascript">
                                        </script> -->
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/tether/js/tether.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/admin/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-typehead/typeahead.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-typehead/typeahead.jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Datatable Serverside -->
    <script src="<?= base_url(); ?>assets/admin/plugins/serverside-table/js/code_jquery.js"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/serverside-table/js/jquery_datatable.js"></script>
    <!-- End Datatable Serverside -->

    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <!-- <script src="<?= base_url(); ?>assets/js/form_elements.js" type="text/javascript"></script> -->
    <script src="<?= base_url(); ?>assets/admin/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#jabatan').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?= site_url('admin/laporan/get_riwayat_jabatan') ?>",
                    "type": "POST",
                    "data": function ( data ) {
                        data.indukuri = $('#indukuri').val();
                        data.uri = $('#uri').val();
                        data.ukid = $('#ukid').val();
                        data.vamas = $('#vamas').val();
                        data.jenis = $('#jenis').val();
                        data.jenjang = $('#jenjang').val();
                    }
                },
                columnDefs: [{
                    targets: "_all",
                    orderable: false
                }]
            } );
        } );
    </script>
</body>

</html>