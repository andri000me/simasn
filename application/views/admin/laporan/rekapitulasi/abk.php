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

                <!-- BEGIN PlACE PAGE CONTENT HERE -->
                <div class="col-md-12">

                    <label>
                        <h6 style="font-size: 16pt;"><b>REKAPITULASI ANALIS BEBAN KERJA</b></h6>
                    </label>
                    <div class="row">

                        <div class="col-md-2">
                            <form id="filter" role="form">
                                <div class="form-group">
                                    <select class="full-width" data-init-plugin="select2">
                                        <option value="" required>-- Pilih Periode -- </option>
                                        <option>2019</option>
                                        <option>2020</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class=" col-md-12 container container-fixed-lg bg-white p-0">
                        <!-- BEGIN PlACE PAGE CONTENT HERE -->

                       <table class="table table-sm table-hover table-striped table-responsive table-bordered">
                            <thead class="bg-info-lighter">
                                <tr>
                                    <th width="5%" class="text-black text-nowrap text-center p-2">
                                        <center>No</center>
                                    </th>
                                    <th width="45%" class="text-black text-nowrap text-center p-2">
                                        <center>NAMA JABATAN</center>
                                    </th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">
                                        <center>JUMLAH PEMANGKU JABATAN</center>
                                    </th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">
                                        <center>HASIL ABK</center>
                                    </th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">
                                        <center>KEKURANGAN / KELEBIHAN</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>SEKRETARIAT DAERAH</td>
                                    <td>
                                        <center>200</center>
                                    </td>
                                    <td>
                                        <center>291</center>
                                    </td>
                                    <td>
                                        <center>-52</center>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="padding-left:30px">SEKRETARIS DAERAH</td>
                                    <td>
                                        <center>1</center>
                                    </td>
                                    <td>
                                        <center>1</center>
                                    </td>
                                    <td>
                                        <center>0</center>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="padding-left:60px">Staf Ahli Bidang Hukum, Politik dan Pemerintahan</td>
                                    <td>
                                        <center>1</center>
                                    </td>
                                    <td>
                                        <center>1</center>
                                    </td>
                                    <td>
                                        <center>0</center>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="padding-left:60px">Staf Ahli Bidang Pembangunan, Sumber Daya Manusia dan Kemasyarakatan</td>
                                    <td>
                                        <center>1</center>
                                    </td>
                                    <td>
                                        <center>1</center>
                                    </td>
                                    <td>
                                        <center>0</center>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="padding-left:60px">Staf Ahli Bidang Ekonomi dan Keuangan</td>
                                    <td>
                                        <center>1</center>
                                    </td>
                                    <td>
                                        <center>1</center>
                                    </td>
                                    <td>
                                        <center>0</center>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="padding-left:90px">Kepala Bagian Pemerintahan</td>
                                    <td>
                                        <center>1</center>
                                    </td>
                                    <td>
                                        <center>1</center>
                                    </td>
                                    <td>
                                        <center>0</center>
                                    </td>
                                <tr>
                                    <td></td>
                                    <td style="padding-left:120px">Kepala Sub Bagian Otonomi Daerah dan Kerja Sama</td>
                                    <td>
                                        <center>1</center>
                                    </td>
                                    <td>
                                        <center>1</center>
                                    </td>
                                    <td>
                                        <center>0</center>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="padding-left:150px">Analis Pemerintahan Umum dan Otonomi Daerah</td>
                                    <td>
                                        <center>1</center>
                                    </td>
                                    <td>
                                        <center>1</center>
                                    </td>
                                    <td>
                                        <center>0</center>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- END PLACE PAGE CONTENT HERE -->
                    </div>
                </div>
                <!-- END PLACE PAGE CONTENT HERE -->
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
    <script type="text/javascript" src="<?= base_url(); ?>assets/admin/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-actual/jquery.actual.min.js"></script>
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