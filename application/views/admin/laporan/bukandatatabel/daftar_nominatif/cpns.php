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
                        <h4><b>DAFTAR NOMINATIF CALON PEGAWAI NEGERI SIPIL (CPNS)</b></h4>
                    </label>
                    <div class="row">
                        <div class="col-md-6">
                            <form id="filter" role="form">
                                <div class="form-group">
                                    <select class="full-width" data-init-plugin="select2">
                                        <option value="" required>-- Pilih Golongan -- </option>
                                        <option>Golongan IVC</option>
                                        <option>Golongan IVB</option>
                                        <option>Golongan IIIB</option>
                                        <option>Golongan IIIA</option>
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
                    <div lass="col-md-12 container container-fixed-lg">
                        <!-- BEGIN PlACE PAGE CONTENT HERE -->
                        <table class="table table-sm table-hover table-striped table-responsive table-bordered">
                            <thead class="bg-info-lighter">
                                <tr>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">NOMOR URUT</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">NAMA</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">NIP</th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="3">
                                        SK CPNS
                                    </th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="2">JABATAN</th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="2">
                                        MASA KERJA
                                    </th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="4">
                                        PENDIDIKAN
                                    </th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">UNIT KERJA</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">KET</th>
                                </tr>
                                <tr>
                                    <th class="text-black text-nowrap text-center p-2">GOL/RUANG</th>
                                    <th class="text-black text-nowrap text-center p-2">TMT CPNS</th>
                                    <th class="text-black text-nowrap text-center p-2">NOMOR SK</th>
                                    <th class="text-black text-nowrap text-center p-2">NAMA</th>
                                    <th class="text-black text-nowrap text-center p-2">TMT</th>
                                    <th class="text-black text-nowrap text-center p-2">THN</th>
                                    <th class="text-black text-nowrap text-center p-2">BLN</th>
                                    <th class="text-black text-nowrap text-center p-2">TEMPAT MENEMPUH PENDIDIKAN</th>
                                    <th class="text-black text-nowrap text-center p-2">NAMA PENDIDIKAN</th>
                                    <th class="text-black text-nowrap text-center p-2">THN LULUS</th>
                                    <th class="text-black text-nowrap text-center p-2">TK.IJAZAH</th>
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

                                <tr>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2">SANGKALA</td>
                                    <td class="text-nowrap p-2">196212312015081001</td>
                                    <td class="text-nowrap p-2">II/b</td>
                                    <td class="text-nowrap p-2">01-08-2015</td>
                                    <td class="text-nowrap p-2">02/KPTS/813/BKDD/V/2016</td>
                                    <td class="text-nowrap p-2">Pengadministrasi Umum Seksi Pemerintahan</td>
                                    <td class="text-nowrap p-2">2016-07-22</td>
                                    <td class="text-nowrap p-2">14</td>
                                    <td class="text-nowrap p-2">9</td>
                                    <td class="text-nowrap p-2">SMA Negeri Maros</td>
                                    <td class="text-nowrap p-2">SMA IPS</td>
                                    <td class="text-nowrap p-2">1982</td>
                                    <td class="text-nowrap p-2">SLTA</td>
                                    <td class="text-nowrap p-2">Kecamatan Bantimurung</td>
                                    <td class="text-nowrap p-2"></td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center text-center">2</td>
                                    <td class="text-nowrap p-2">BAKRI</td>
                                    <td class="text-nowrap p-2">196312312015081001</td>
                                    <td class="text-nowrap p-2">I/d</td>
                                    <td class="text-nowrap p-2">01-08-2015</td>
                                    <td class="text-nowrap p-2">02/KPTS/813/BKDD/V/2016</td>
                                    <td class="text-nowrap p-2">Pramu Kantor Sub Bagian Tata Usaha UPTD Puskesmas Kecamatan Cenrana</td>
                                    <td class="text-nowrap p-2">2015-08-01</td>
                                    <td class="text-nowrap p-2">17</td>
                                    <td class="text-nowrap p-2">9</td>
                                    <td class="text-nowrap p-2">SMP Negeri Camba</td>
                                    <td class="text-nowrap p-2">SMP </td>
                                    <td class="text-nowrap p-2">1980</td>
                                    <td class="text-nowrap p-2">SLTP</td>
                                    <td class="text-nowrap p-2">Dinas Kesehatan</td>
                                    <td class="text-nowrap p-2"></td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2">MARSUKI ARROI</td>
                                    <td class="text-nowrap p-2">196402122015081001</td>
                                    <td class="text-nowrap p-2">I/b</td>
                                    <td class="text-nowrap p-2">01-08-2015</td>
                                    <td class="text-nowrap p-2">02/KPTS/813/BKDD/V/2016</td>
                                    <td class="text-nowrap p-2">Pengadministrasi Umum Seksi Usaha Jasa Pariwisata</td>
                                    <td class="text-nowrap p-2">2016-07-22</td>
                                    <td class="text-nowrap p-2">14</td>
                                    <td class="text-nowrap p-2">9</td>
                                    <td class="text-nowrap p-2">SD Negeri NO 1 Maros</td>
                                    <td class="text-nowrap p-2">SD </td>
                                    <td class="text-nowrap p-2">1979</td>
                                    <td class="text-nowrap p-2">SD</td>
                                    <td class="text-nowrap p-2">Dinas Kebudayaan dan Pariwisata</td>
                                    <td class="text-nowrap p-2"></td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2">NURBAYA KAI</td>
                                    <td class="text-nowrap p-2">196504012015082001</td>
                                    <td class="text-nowrap p-2">II/b</td>
                                    <td class="text-nowrap p-2">01-08-2015</td>
                                    <td class="text-nowrap p-2">02/KPTS/813/BKDD/V/2016</td>
                                    <td class="text-nowrap p-2">Pengadministrasi Kependudukan Seksi Pemberdayaan Masyarakat</td>
                                    <td class="text-nowrap p-2">2016-07-22</td>
                                    <td class="text-nowrap p-2">16</td>
                                    <td class="text-nowrap p-2">9</td>
                                    <td class="text-nowrap p-2">SMA Negeri Maros </td>
                                    <td class="text-nowrap p-2">SMA IPS</td>
                                    <td class="text-nowrap p-2">1985</td>
                                    <td class="text-nowrap p-2">SLTA</td>
                                    <td class="text-nowrap p-2">Kecamatan Bantimurung</td>
                                    <td class="text-nowrap p-2"></td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">5</td>
                                    <td class="text-nowrap p-2">ROSTIATI</td>
                                    <td class="text-nowrap p-2">196510172015082001</td>
                                    <td class="text-nowrap p-2">II/b</td>
                                    <td class="text-nowrap p-2">01-08-2015</td>
                                    <td class="text-nowrap p-2">02/KPTS/813/BKDD/V/2016</td>
                                    <td class="text-nowrap p-2">Staf Seksi Identitas Penduduk</td>
                                    <td class="text-nowrap p-2">2016-12-30</td>
                                    <td class="text-nowrap p-2">14</td>
                                    <td class="text-nowrap p-2">9</td>
                                    <td class="text-nowrap p-2">SMA Negeri 2 Ujung Pandang</td>
                                    <td class="text-nowrap p-2">SMA IPS</td>
                                    <td class="text-nowrap p-2">1986</td>
                                    <td class="text-nowrap p-2">SLTA</td>
                                    <td class="text-nowrap p-2">Dinas Kependudukan dan Pencatatan Sipil</td>
                                    <td class="text-nowrap p-2"></td>
                                </tr>



                            </tbody>
                        </table>
                    </div>
                    <!-- END PLACE PAGE CONTENT HERE -->

                </div> <!-- END CONTAINER FLUID -->
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