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
                        <h4><b>RIWAYAT JABATAN ASN</b></h4>
                    </label>
                    <div class="row">
                        <div class="col-md-6">
                            <form id="filter" role="form">
                                <div class="form-group">
                                    <select class="full-width" data-init-plugin="select2">
                                        <option value="" required>-- Pilih Kolom Tabel -- </option>
                                        <option>NAMA</option>
                                        <option>NIP</option>
                                        <option>JENIS JABATAN</option>
                                        <option>ESELON</option>
                                        <option>JABATAN</option>
                                        <option>UNIT KERJA</option>
                                        <option>SK NOMOR</option>
                                        <option>SK TANGGAL</option>
                                        <option>TMT JABATAN</option>
                                        <option>TANGGAL PELANTIKAN</option>
                                        <option>PEJABAT</option>
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
                    <div class=" col-md-12 container container-fixed-lg p-0">
                        <!-- BEGIN PlACE PAGE CONTENT HERE -->

                        <table class="table table-sm table-hover table-striped table-responsive bg-white table-bordered m-t-10">
                            <thead class="bg-info-lighter">
                                <tr>
                                    <th class="text-black text-nowrap text-center p-2">NO.URUT</th>
                                    <th class="text-black text-nowrap text-center p-2">NAMA</th>
                                    <th class="text-black text-nowrap text-center p-2">NIP</th>
                                    <th class="text-black text-nowrap text-center p-2">JENIS JABATAN</th>
                                    <th class="text-black text-nowrap text-center p-2">ESELON</th>
                                    <th class="text-black text-nowrap text-center p-2">JABATAN</th>
                                    <th class="text-black text-nowrap text-center p-2">UNIT KERJA</th>
                                    <th class="text-black text-nowrap text-center p-2">TANGGAL SK</th>
                                    <th class="text-black text-nowrap text-center p-2">NOMOR SK</th>
                                    <th class="text-black text-nowrap text-center p-2">TMT JABATAN</th>
                                    <th class="text-black text-nowrap text-center p-2">TANGGAL PELANTIKAN</th>
                                    <th class="text-black text-nowrap text-center p-2">PEJABAT</th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2">ANDI SELFIAH PATUNRU</td>
                                    <td class="text-nowrap p-2">196008121992032005</td>
                                    <td class="text-nowrap p-2">Fungsional</td>
                                    <td class="text-nowrap p-2">Fungsional</td>
                                    <td class="text-nowrap p-2">Dokter Gigi Madya UPTD Puskesmas Kecamatan Tanralili</td>
                                    <td class="text-nowrap p-2">Dinas Kesehatan</td>
                                    <td class="text-nowrap p-2">07-07-2015</td>
                                    <td class="text-nowrap p-2">36/K/2015</td>
                                    <td class="text-nowrap p-2">01-04-2015</td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2">Presiden Republik Indonesia</td>
                                </tr>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2">BENYAMIN LAYUK</td>
                                    <td class="text-nowrap p-2">196010031982031011</td>
                                    <td class="text-nowrap p-2">Fungsional</td>
                                    <td class="text-nowrap p-2">Fungsional</td>
                                    <td class="text-nowrap p-2">Guru Pembina SDN 240 Baddo-Baddo</td>
                                    <td class="text-nowrap p-2">Dinas Pendidikan</td>
                                    <td class="text-nowrap p-2">13-07-2004</td>
                                    <td class="text-nowrap p-2">PN.823.4-40</td>
                                    <td class="text-nowrap p-2">01-04-2004</td>
                                    <td class="text-nowrap p-2">01-04-2004</td>
                                    <td class="text-nowrap p-2">Gubernur Sul-Sel</td>
                                </tr>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2">HASLINDA</td>
                                    <td class="text-nowrap p-2">196010031984032004</td>
                                    <td class="text-nowrap p-2">Fungsional</td>
                                    <td class="text-nowrap p-2">Fungsional</td>
                                    <td class="text-nowrap p-2">Guru Madya SMPN 2 Unggulan (RSBI) Maros</td>
                                    <td class="text-nowrap p-2">Dinas Pendidikan</td>
                                    <td class="text-nowrap p-2">01-12-2012</td>
                                    <td class="text-nowrap p-2">821/151/BKDD</td>
                                    <td class="text-nowrap p-2">01-12-2012</td>
                                    <td class="text-nowrap p-2">01-12-2012</td>
                                    <td class="text-nowrap p-2">Gubernur Sul-Sel</td>
                                </tr>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2">HASMIATI</td>
                                    <td class="text-nowrap p-2">196010101989022002</td>
                                    <td class="text-nowrap p-2">Fungsional</td>
                                    <td class="text-nowrap p-2">Fungsional</td>
                                    <td class="text-nowrap p-2">Guru Muda TK Pertiwi Maros</td>
                                    <td class="text-nowrap p-2">Dinas Pendidikan</td>
                                    <td class="text-nowrap p-2">24-11-2014</td>
                                    <td class="text-nowrap p-2">823.3.2/67/XI/BKDD/2014</td>
                                    <td class="text-nowrap p-2">01-10-2014</td>
                                    <td class="text-nowrap p-2">01-10-2014</td>
                                    <td class="text-nowrap p-2">Bupati Maros</td>
                                </tr>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">5</td>
                                    <td class="text-nowrap p-2">HASYATI</td>
                                    <td class="text-nowrap p-2">196010111982032013</td>
                                    <td class="text-nowrap p-2">Fungsional</td>
                                    <td class="text-nowrap p-2">Fungsional</td>
                                    <td class="text-nowrap p-2">Pengatur Muda SD.INP.NO.167 JENETAESA</td>
                                    <td class="text-nowrap p-2">Dinas Pendidikan</td>
                                    <td class="text-nowrap p-2">30-09-1983</td>
                                    <td class="text-nowrap p-2">GR.821-12-113</td>
                                    <td class="text-nowrap p-2">01-10-1983</td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2">GUBERNUR KEPALA DAERAH TK.I SUL-SEL</td>
                                </tr>





                            </tbody>
                        </table>
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