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
                        <h4><b>RIWAYAT DIKLAT STURUKTURAL ASN</b></h4>
                    </label>
                    <div class="row">
                        <div class="col-md-6">
                            <form id="filter" role="form">
                                <div class="form-group">
                                    <select class="full-width" data-init-plugin="select2">
                                        <option value="" required>-- Pilih Kolom Tabel -- </option>
                                        <option>NAMA</option>
                                        <option>NIP</option>
                                        <option>JENIS DIKLAT</option>
                                        <option>NAMA DIKLAT</option>
                                        <option>PENYELENGGARA</option>
                                        <option>NOMOR SERTIFIKAT</option></option>
                                        <option>TANGGAL SERTIFIKAT</option></option>
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
                                    <th width="5%" class="text-black text-nowrap text-center p-2">NOMOR URUT</th>
                                    <th width="20%" class="text-black text-nowrap text-center p-2">NAMA</th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">NIP</th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">Jenis Diklat</th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">Nama Diklat</th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">Penyelengara</th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">Jumlah Jam</th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">Nomor Sertifikat</th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">Tanggal Sertifikat</th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2">MUCARRAPAH</td>
                                    <td class="text-nowrap p-2">196012231987031009</td>
                                    <td class="text-nowrap p-2">Struktural</td>
                                    <td class="text-nowrap p-2">Diklatpim Tk. III</td>
                                    <td class="text-nowrap p-2">Badan Diklat Provinsi Sulawesi Selatan</td>
                                    <td class="text-nowrap p-2">360 Jam</td>
                                    <td class="text-nowrap p-2">4359/DIKLATPIM TK.III/73/371/LAN/2013</td>
                                    <td class="text-nowrap p-2">10-07-2013</td>
                                </tr>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2">BURHANUDDIN</td>
                                    <td class="text-nowrap p-2">196109041989031008</td>
                                    <td class="text-nowrap p-2">Struktural</td>
                                    <td class="text-nowrap p-2">Diklatpim Tk. II </td>
                                    <td class="text-nowrap p-2">LAN Makassar</td>
                                    <td class="text-nowrap p-2">0 Jam</td>
                                    <td class="text-nowrap p-2">21.756/DIKLATPIM TK.II/XXVII.E/XII/2009</td>
                                    <td class="text-nowrap p-2">12-12-2009</td>
                                </tr>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2">BURHANUDDIN</td>
                                    <td class="text-nowrap p-2">196109041989031008</td>
                                    <td class="text-nowrap p-2">Struktural</td>
                                    <td class="text-nowrap p-2">Spama</td>
                                    <td class="text-nowrap p-2">LAN dan DEPDAGRI</td>
                                    <td class="text-nowrap p-2">400 Jam</td>
                                    <td class="text-nowrap p-2">1114/SPAMA/LAN/1999</td>
                                    <td class="text-nowrap p-2">09-01-1999</td>
                                </tr>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2">ANSARULLAH</td>
                                    <td class="text-nowrap p-2">196209241989031012</td>
                                    <td class="text-nowrap p-2">Struktural</td>
                                    <td class="text-nowrap p-2">Diklatpim Tk. II</td>
                                    <td class="text-nowrap p-2">-</td>
                                    <td class="text-nowrap p-2">750 Jam</td>
                                    <td class="text-nowrap p-2">-</td>
                                    <td class="text-nowrap p-2">31-12-2015</td>
                                </tr>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">5</td>
                                    <td class="text-nowrap p-2">ANSARULLAH</td>
                                    <td class="text-nowrap p-2">196209241989031012</td>
                                    <td class="text-nowrap p-2">Struktural</td>
                                    <td class="text-nowrap p-2">Spama</td>
                                    <td class="text-nowrap p-2">Departemen Pertanian</td>
                                    <td class="text-nowrap p-2">750 Jam</td>
                                    <td class="text-nowrap p-2">8071/SPAMA/LAN/1998</td>
                                    <td class="text-nowrap p-2">17-01-1998</td>
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