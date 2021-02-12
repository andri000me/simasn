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
    <style>
        .table tbody tr td {
            padding: 5px;
        }
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
                        <h6 style="font-size: 16pt;"><b>RIWAYAT DIKLAT FUNGSIONAL DAN TEKNIS ASN</b></h6>
                    </label>

                    <div class=" col-md-12 container container-fixed-lg bg-white">
                        <!-- BEGIN PlACE PAGE CONTENT HERE -->

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>NOMOR URUT</th>
                                    <th>NAMA</th>
                                    <th>NIP</th>
                                    <th>Jenis Diklat</th>
                                    <th>Nama Diklat</th>
                                    <th>Penyelengara</th>
                                    <th>Jumlah Jam</th>
                                    <th>Nomor Sertifikat</th>
                                    <th>Tanggal Sertifikat</th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td>1</td>
                                    <td>ANDI SELFIAH PATUNRU</td>
                                    <td class="text">196008121992032005</td>
                                    <td>Teknis</td>
                                    <td class="text">Simposium Dokter Gigi</td>
                                    <td>PDGI Wilayah Sulawesi Selatan</td>
                                    <td class="text">0 Jam</td>
                                    <td>SKP-N/351/PBPDGI/III/2013</td>
                                    <td>16-03-2013</td>
                                </tr>


                                <tr>
                                    <td>2</td>
                                    <td>ANDI SELFIAH PATUNRU</td>
                                    <td class="text">196008121992032005</td>
                                    <td>Fungsional</td>
                                    <td class="text">Pelatihan Fungsional Dokter Gii Kab/Kota Tk. Prov. Sulawesi Selatan</td>
                                    <td>Kanwil Depkes Sulsel</td>
                                    <td class="text">48 Jam</td>
                                    <td>DL.0102927797</td>
                                    <td>25-08-2000</td>
                                </tr>


                                <tr>
                                    <td>3</td>
                                    <td>BENYAMIN LAYUK</td>
                                    <td class="text">196010031982031011</td>
                                    <td>Fungsional</td>
                                    <td class="text">Pelatihan Implementasi Kurikulum 2013</td>
                                    <td>LPMP</td>
                                    <td class="text">52 Jam</td>
                                    <td>3651/J20.3/DL/2014</td>
                                    <td>23-06-2014</td>
                                </tr>


                                <tr>
                                    <td>4</td>
                                    <td>BENYAMIN LAYUK</td>
                                    <td class="text">196010031982031011</td>
                                    <td>Fungsional</td>
                                    <td class="text">Penataran Kurikulum Sekolah Dasar</td>
                                    <td>Departemen Pendidikan Dan Kebudayaan</td>
                                    <td class="text">33 Jam</td>
                                    <td>015/106.1.1/1.96</td>
                                    <td>17-01-1996</td>
                                </tr>


                                <tr>
                                    <td>5</td>
                                    <td>BENYAMIN LAYUK</td>
                                    <td class="text">196010031982031011</td>
                                    <td>Fungsional</td>
                                    <td class="text">Pelatihan Peningkatan Profesional dalam Penggunaan Alat Peraga</td>
                                    <td>Kandepdikbud Kec. Bantimurung</td>
                                    <td class="text">31 Jam</td>
                                    <td>118/106.1.1/94</td>
                                    <td>06-04-1994</td>
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