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
                        <h4><b>ASN AKTIF TITIPAN KERJA</b></h4>
                    </label>
                    <div class="row">
                        <div class="col-md-6">
                            <form id="filter" role="form">
                                <div class="form-group">
                                    <select class="full-width" data-init-plugin="select2">
                                        <option value="" required>-- Pilih Kolom Tabel -- </option>
                                        <option>NAMA</option>
                                        <option>NIP</option>
                                        <option>SKPD</option>
                                        <option>PANGKAT TERAKHIR GOLONGAN</option>
                                        <option>PANGKAT TERAKHIR TMT</option>
                                        <option>NAMA JABATAN</option>
                                        <option>JABATAN ESELON</option>
                                        <option>MASA KERJA TAHUN</option>
                                        <option>MASA KERJA BULAN</option>
                                        <option>UNIT KERJA</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <div class=" form-group">
                                <input form="filter" type="text" class="form-control" placeholder="-Cari Pegawai-">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="btn-group">
                                <button form="filter" type="button" class="btn btn-primary btn-sm">Search</button>
                                <button form="filter" type="button" class="btn btn-succes btn-sm">ALL</button>
                                <button form="filter" type="button" class="btn btn-danger btn-sm">Export</button>
                                <button form="filter" type="button" class="btn btn-primary btn-sm">Export All</button>
                            </div>
                        </div>
                    </div>
                    <div style="overflow-x: auto;" class=" col-md-12 container container-fixed-lg bg-white p-0">
                        <!-- BEGIN PlACE PAGE CONTENT HERE -->

                        <table class="table table-sm table-hover table-striped table-responsive bg-white table-bordered m-t-10">
                            <thead class="bg-info-lighter">
                                <tr>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">NO</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">NAMA</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">NIP</th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="2">PANGKAT TERAKHIR</th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="3">JABATAN</th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="2">MASA KERJA</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">UNIT KERJA</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">STATUS</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">STATUS PNS</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">NO SK</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">TGL CLTN</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">KET</th>
                                </tr>
                                <tr>
                                    <th class="text-black text-nowrap text-center p-2">GOL/RUANG</th>
                                    <th class="text-black text-nowrap text-center p-2">TMT</th>
                                    <th class="text-black text-nowrap text-center p-2">NAMA</th>
                                    <th class="text-black text-nowrap text-center p-2">ESELON</th>
                                    <th class="text-black text-nowrap text-center p-2">TMT</th>
                                    <th class="text-black text-nowrap text-center p-2">THN</th>
                                    <th class="text-black text-nowrap text-center p-2">BLN</th>
                                </tr>
                                <tr>
                                    <th class="text-white text-center p-1 bg-info-light">1</th>
                                    <th class="text-white text-center p-1 bg-info-light">2</th>
                                    <th class="text-white text-center p-1 bg-info-light">3</th>
                                    <th class="text-white text-center p-1 bg-info-light">4</th>
                                    <th class="text-white text-center p-1 bg-info-light">5</th>
                                    <th class="text-white text-center p-1 bg-info-light">6</th>
                                    <th class="text-white text-center p-1 bg-info-light">7</th>
                                    <th class="text-white text-center p-1 bg-info-light">8</th>
                                    <th class="text-white text-center p-1 bg-info-light">9</th>
                                    <th class="text-white text-center p-1 bg-info-light">10</th>
                                    <th class="text-white text-center p-1 bg-info-light">11</th>
                                    <th class="text-white text-center p-1 bg-info-light">12</th>
                                    <th class="text-white text-center p-1 bg-info-light">13</th>
                                    <th class="text-white text-center p-1 bg-info-light">14</th>
                                    <th class="text-white text-center p-1 bg-info-light">15</th>
                                    <th class="text-white text-center p-1 bg-info-light">16</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($asn as $a): ?>
                                <tr>
                                    <td class="text-nowrap p-2 text-center"><?= $uri5 + $no++ ?></td>
                                    <td class="text-nowrap p-2"><?= $a['nama'] ?></td>
                                    <td class="text-nowrap p-2" class="text"><?= $a['nip'] ?></td>
                                    <td class="text-nowrap p-2"><?= !empty($a['golongan']) ? $a['golongan'] : '-' ?></td>
                                    <td class="text-nowrap p-2"><?= !empty($a['tmt_pangkat']) ? date('d-m-Y', strtotime($a['tmt_pangkat'])) : '-'; ?></td>
                                    <td class="text-nowrap p-2">Dokter Madya UPTD Puskesmas Kecamatan Moncongloe</td>
                                    <td class="text-nowrap p-2">Fungsional</td>
                                    <td class="text-nowrap p-2">01-10-2017</td>
                                    <td class="text-nowrap p-2">12</td>
                                    <td class="text-nowrap p-2">1</td>
                                    <td class="text-nowrap p-2">Dinas Kesehatan</td>
                                    <td class="text-nowrap p-2">Aktif</td>
                                    <td class="text-nowrap p-2">Titipan Kerja di Papua</td>
                                    <td class="text-nowrap p-2">856/555/XII/BKPPD/17 cuti diluar tanggungan negra</td>
                                    <td class="text-nowrap p-2">18-12-2017</td>
                                    <td class="text-nowrap p-2"></td>
                                </tr>
                                <?php endforeach;  ?>
                            </tbody>
                        </table>
                        <!-- END PLACE PAGE CONTENT HERE -->

                    </div>
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
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?= base_url(); ?>assets/js/form_elements.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
</body>

</html>