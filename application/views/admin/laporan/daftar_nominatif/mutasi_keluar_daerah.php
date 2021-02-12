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
                        <h5><b>DFTAR NOMINATIF ASN MUTASI KELUAR DAERAH</b></h5>
                    </label>
                    <!-- START card Search and Export -->
                    <div class=" container-fluid   container-fixed-lg bg-white">
                        <!-- START card -->
                        <div class="card card-transparent">
                            <div class="card-header">
                                <div class="card-title col-md-9"> 
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?= form_open('admin/laporan/daftar_nominatif/mutasi_keluar_daerah', 'id="filter" role="form"'); ?>
                                                <div class="form-group">
                                                    <select name="ukid" id="ukid" class="full-width" data-init-plugin="select2" onchange="this.form.submit('admin/laporan/daftar_nominatif/mutasi_keluar_daerah')">
                                                        <option value="" required>-- Pilih SKPD -- </option>
                                                        <?php foreach($uk as $u): ?>
                                                            <option value="<?= encrypt_url($u['id_unitkerja']) ?>" <?= !empty($uk_aktif) && $uk_aktif==$u['id_unitkerja'] ? 'selected':'' ?>><?= $u['nm_unitkerja'] ?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            <?= form_close() ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="btn-group">
                                                <button form="filter" type="button" class="btn btn-success btn-sm">Export</button>
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
                    <div class=" container-fluid   container-fixed-lg bg-white">
                        <div class="card card-transparent">
                            <div class="card-block table-responsive">
                                <table id="pnsmutasi" class="display table-bordered table-striped" cellspasing="0" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap text-center p-1" rowspan="2">NO</th>
                                            <th class="text-nowrap text-center p-1" rowspan="2">NIP</th>
                                            <th class="text-nowrap text-center p-1" rowspan="2">NAMA</th>
                                            <th class="text-nowrap text-center p-1" colspan="2">
                                                <center>PANGKAT TERAKHIR</center>
                                            </th>
                                            <th class="text-nowrap text-center p-1" colspan="3">
                                                <center>JABATAN</center>
                                            </th>
                                            <th class="text-nowrap text-center p-1" colspan="2">
                                                <center>PENDIDIKAN</center>
                                            </th>
                                            <th class="text-nowrap text-center p-1" rowspan="2">UNIT KERJA</th>
                                            <th class="text-nowrap text-center p-1" rowspan="2">TMT SK MUTASI</th>
                                            <th class="text-nowrap text-center p-1" rowspan="2">KET</th>
                                        </tr>
                                        <tr>
                                            <th class="text-nowrap text-center p-1">GOL/RUANG</th>
                                            <th class="text-nowrap text-center p-1">TMT</th>
                                            <th class="text-nowrap text-center p-1">NAMA</th>
                                            <th class="text-nowrap text-center p-1">ESELON</th>
                                            <th class="text-nowrap text-center p-1">TMT</th>
                                            <th class="text-nowrap text-center p-1">NAMA PENDIDIKAN</th>
                                            <th class="text-nowrap text-center p-1">TK. IJAZAH</th>
                                        </tr>
                                        <tr>
                                            <th class="text-white text-center p-0 bg-info-light"><small>1</small></th>
                                            <th class="text-white text-center p-0 bg-info-light"><small>2</small></th>
                                            <th class="text-white text-center p-0 bg-info-light"><small>3</small></th>
                                            <th class="text-white text-center p-0 bg-info-light"><small>4</small></th>
                                            <th class="text-white text-center p-0 bg-info-light"><small>5</small></th>
                                            <th class="text-white text-center p-0 bg-info-light"><small>6</small></th>
                                            <th class="text-white text-center p-0 bg-info-light"><small>7</small></th>
                                            <th class="text-white text-center p-0 bg-info-light"><small>8</small></th>
                                            <th class="text-white text-center p-0 bg-info-light"><small>9</small></th>
                                            <th class="text-white text-center p-0 bg-info-light"><small>10</small></th>
                                            <th class="text-white text-center p-0 bg-info-light"><small>11</small></th>
                                            <th class="text-white text-center p-0 bg-info-light"><small>12</small></th>
                                            <th class="text-white text-center p-0 bg-info-light"><small>13</small></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END card -->
                    </div>
                    <!-- END card -->
                    <!-- END PLACE PAGE CONTENT HERE -->

                    </di>
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
    <!-- END VENDOR JS -->
    <!-- DataTable -->
    <script src="<?= base_url(); ?>assets/admin/plugins/serverside-table/js/code_jquery.js"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/serverside-table/js/jquery_datatable.js"></script>
    <!-- End Datatable  -->

    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?= base_url(); ?>assets/admin/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#pnsmutasi').DataTable( {
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('admin/laporan/daftar_nominatif_pns_mutasi') ?>",
                    "type": "POST",
                    "data": function ( data ) {
                        data.ukid = $('#ukid').val();
                        data.indukuri = $('#indukuri').val();
                        data.uri = $('#uri').val();
                    }
                },
                //Set column definition initialisation properties.
                columnDefs: [{
                    "targets": [ 0 ], //first column / numbering column
                    "orderable": false, //set not orderable
                },],
            } );
        });
    </script>
</body>

</html>