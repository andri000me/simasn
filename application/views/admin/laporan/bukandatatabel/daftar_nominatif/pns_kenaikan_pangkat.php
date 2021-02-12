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
                        <h4><b>DAFTAR NOMINATIF ASN YANG MEMPEROLEH IJAZAH S.1</b></h4>
                    </label>
                    <div class="row">
                        <div class="col-md-2">
                            <form id="filter" role="form">
                                <div class="form-group">
                                    <select class="full-width" data-init-plugin="select2">
                                        <option value="" required>-- Pilih Periode -- </option>
                                        <option>April</option>
                                        <option>Oktober</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <form id="filter" role="form">
                                <div class="form-group">
                                    <select class="full-width" data-init-plugin="select2">
                                        <option value="" required>-- Pilih Tahun -- </option>
                                        <option>2019</option>
                                        <option>2020</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-3">
                            <div class="btn-group">
                                <button form="filter" type="button" class="btn btn-primary btn-sm">Search</button>
                                <button form="filter" type="button" class="btn btn-succes btn-sm">Eksport</button>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-12 container container-fixed-lg bg-white p-0">
                        <!-- BEGIN PlACE PAGE CONTENT HERE -->

                        <table class="table table-sm table-hover table-striped table-responsive table-bordered">
                            <thead class="bg-info-lighter">
                                <tr>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">NOMOR URUT</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">NAMA</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">NIP</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">Gol./Ruang</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">T M T</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">JABATAN</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">JENIS JABATAN</th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="2">
                                        <center>MASA KERJA</center>
                                    </th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">IJAZAH</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">JENJANG PENDIDIKAN</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">UNIT KERJA</th>
                                </tr>
                                <tr>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2">RUSNI</td>
                                    <td class="text-nowrap p-2" class="text">196012311989112003</td>
                                    <td class="text-nowrap p-2">IV/a</td>
                                    <td class="text-nowrap p-2">01-04-2013</td>
                                    <td class="text-nowrap p-2">Guru Madya SDN 146 Barambang I</td>
                                    <td class="text-nowrap p-2">Fungsional</td>
                                    <td class="text-nowrap p-2">01-04-2013</td>
                                    <td class="text-nowrap p-2">18</td>
                                    <td class="text-nowrap p-2">S.1 ILMU PEMERINTAHAN</td>
                                    <td class="text-nowrap p-2">S.1</td>
                                    <td class="text-nowrap p-2">DINAS SOSIAL</td>

                            </tbody>
                        </table>
                    </div>
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