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
                        <h4><b>RIWAYAT PENDIDIKAN ASN</b></h4>
                    </label>
                    <div class="row">
                        <div class="col-md-6">
                            <form id="filter" role="form">
                                <div class="form-group">
                                    <select class="full-width" data-init-plugin="select2">
                                        <option value="" required>-- Pilih Kolom Tabel -- </option>
                                        <option>NAMA</option>
                                        <option>NIP</option>
                                        <option>JURUSAN</option>
                                        <option>TEMPAT MENEMPUH PENDIDIKAN</option>
                                        <option>TK. IJAZAH</option>
                                        <option>NOMOR IJAZAH</option>
                                        <option>TANGGAL IJAZAH</option>
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
                    <div class=" col-md-12 container container-fixed-lg bg-white p-0">
                        <!-- BEGIN PlACE PAGE CONTENT HERE -->

                        <table class="table table-sm table-hover table-striped table-responsive table-bordered">
                            <thead class="bg-info-lighter">
                                <tr>
                                    <th width="5%" class="text-black text-nowrap text-center p-2">NO.URUT</th>
                                    <th width="25%" class="text-black text-nowrap text-center p-2">NAMA</th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">NIP</th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">JURUSAN</th>
                                    <th width="20%" class="text-black text-nowrap text-center p-2">TEMPAT MENEMPUH PENDIDIKAN</th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">TK. IJAZAH</th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">NOMOR IJAZAH</th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">TANGGAL LULUS</th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2">ANDI SELFIAH PATUNRU</td>
                                    <td class="text-nowrap p-2">196008121992032005</td>
                                    <td class="text-nowrap p-2">S.1 Kedokteran Gigi</td>
                                    <td class="text-nowrap p-2">Universitas Hasanuddin</td>
                                    <td class="text-nowrap p-2">S-1</td>
                                    <td class="text-nowrap p-2">19709-039-10/030/272-90</td>
                                    <td class="text-nowrap p-2">24-12-1990</td>
                                </tr>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2">ANDI SELFIAH PATUNRU</td>
                                    <td class="text-nowrap p-2">196008121992032005</td>
                                    <td class="text-nowrap p-2">SMU IPA</td>
                                    <td class="text-nowrap p-2">SMUN 1 Ujung Pandang</td>
                                    <td class="text-nowrap p-2">SLTA</td>
                                    <td class="text-nowrap p-2">XXXIIIci150640</td>
                                    <td class="text-nowrap p-2">02-05-1979</td>
                                </tr>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2">ANDI SELFIAH PATUNRU</td>
                                    <td class="text-nowrap p-2">196008121992032005</td>
                                    <td class="text-nowrap p-2">SMP</td>
                                    <td class="text-nowrap p-2">SMPN 1 Bulukumba</td>
                                    <td class="text-nowrap p-2">SLTP</td>
                                    <td class="text-nowrap p-2">013/I06:II/SMP.01/F/1991</td>
                                    <td class="text-nowrap p-2">09-01-1976</td>
                                </tr>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2">ANDI SELFIAH PATUNRU</td>
                                    <td class="text-nowrap p-2">196008121992032005</td>
                                    <td class="text-nowrap p-2">SD</td>
                                    <td class="text-nowrap p-2">SDN 2 Terang-Terang Bulukumba</td>
                                    <td class="text-nowrap p-2">SD</td>
                                    <td class="text-nowrap p-2">02/1.06.11-7/SD02/I/1991</td>
                                    <td class="text-nowrap p-2">05-01-1971</td>
                                </tr>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">5</td>
                                    <td class="text-nowrap p-2">BENYAMIN LAYUK</td>
                                    <td class="text-nowrap p-2">196010031982031011</td>
                                    <td class="text-nowrap p-2">S.1 Pendidikan Sejarah</td>
                                    <td class="text-nowrap p-2">Universitas Negeri Makassar</td>
                                    <td class="text-nowrap p-2">S-1</td>
                                    <td class="text-nowrap p-2">001857/H36/6/IV/2010</td>
                                    <td class="text-nowrap p-2">21-01-2010</td>
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