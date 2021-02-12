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
                        <h4><b>RIWAYAT KEPANGKATAN ASN</b></h4>
                    </label>
                    <div class="row">
                        <div class="col-md-6">
                            <form id="filter" role="form">
                                <div class="form-group">
                                    <select class="full-width" data-init-plugin="select2">
                                        <option value="" required>-- Pilih Kolom Tabel -- </option>
                                        <option>NAMA</option>
                                        <option>NIP</option>
                                        <option>JENIS KP</option>
                                        <option>SKPD</option>
                                        <option>GOLONGAN</option>
                                        <option>PANGKAT</option>
                                        <option>SK NOMOR</option>
                                        <option>SK TANGGAL</option>
                                        <option>NOMOR BKN</option>
                                        <option>TANGGAL BKN</option>
                                        <option>TMT GOLONGAN</option>
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
                                    <th class="text-black text-nowrap text-center p-2">JENIS KP</th>
                                    <th class="text-black text-nowrap text-center p-2">GOLONGAN</th>
                                    <th class="text-black text-nowrap text-center p-2">PANGKAT</th>
                                    <th class="text-black text-nowrap text-center p-2">SK NOMOR</th>
                                    <th class="text-black text-nowrap text-center p-2">SK TANGGAL</th>
                                    <th class="text-black text-nowrap text-center p-2">NOMOR BKN</th>
                                    <th class="text-black text-nowrap text-center p-2">TANGGAL BKN</th>
                                    <th class="text-black text-nowrap text-center p-2">TMT GOLONGAN</th>
                                    <th class="text-black text-nowrap text-center p-2">MK GOL.TAHUN</th>
                                    <th class="text-black text-nowrap text-center p-2">MK GOL.BULAN</th>
                                    <th class="text-black text-nowrap text-center p-2">PEJABAT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2">ANDI SELFIAH PATUNRU</td>
                                    <td class="text-nowrap p-2">196008121992032005</td>
                                    <td class="text-nowrap p-2">Gol. Dari Pengadaan CPNS</td>
                                    <td class="text-nowrap p-2">III/a</td>
                                    <td class="text-nowrap p-2">Penata Muda</td>
                                    <td class="text-nowrap p-2">KP0002.2.4.6814</td>
                                    <td class="text-nowrap p-2">31-03-1992</td>
                                    <td class="text-nowrap p-2">11-2200645</td>
                                    <td class="text-nowrap p-2">19-02-1992</td>
                                    <td class="text-nowrap p-2">01-03-1992</td>
                                    <td class="text-nowrap p-2">0</td>
                                    <td class="text-nowrap p-2">0</td>
                                    <td class="text-nowrap p-2">Menkes</td>
                                </tr>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2">ANDI SELFIAH PATUNRU</td>
                                    <td class="text-nowrap p-2">196008121992032005</td>
                                    <td class="text-nowrap p-2">Pilihan Jabatan Fungsional</td>
                                    <td class="text-nowrap p-2">III/b</td>
                                    <td class="text-nowrap p-2">Penata Muda Tk.I</td>
                                    <td class="text-nowrap p-2">IV.14-20/00014/KEP/X/96/T</td>
                                    <td class="text-nowrap p-2">19-11-1996</td>
                                    <td class="text-nowrap p-2">-</td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2">01-10-1996</td>
                                    <td class="text-nowrap p-2">4</td>
                                    <td class="text-nowrap p-2">7</td>
                                    <td class="text-nowrap p-2">Kepala BAKN</td>
                                </tr>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2">ANDI SELFIAH PATUNRU</td>
                                    <td class="text-nowrap p-2">196008121992032005</td>
                                    <td class="text-nowrap p-2">Pilihan Jabatan Fungsional</td>
                                    <td class="text-nowrap p-2">III/c</td>
                                    <td class="text-nowrap p-2">Penata</td>
                                    <td class="text-nowrap p-2">IV.14-20/00029/KEP/X/1998/T</td>
                                    <td class="text-nowrap p-2">10-11-1998</td>
                                    <td class="text-nowrap p-2">-</td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2">01-10-1998</td>
                                    <td class="text-nowrap p-2">6</td>
                                    <td class="text-nowrap p-2">7</td>
                                    <td class="text-nowrap p-2">Kepala BAKN</td>
                                </tr>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2">ANDI SELFIAH PATUNRU</td>
                                    <td class="text-nowrap p-2">196008121992032005</td>
                                    <td class="text-nowrap p-2">Pilihan Jabatan Fungsional</td>
                                    <td class="text-nowrap p-2">III/d</td>
                                    <td class="text-nowrap p-2">Penata Tk.I</td>
                                    <td class="text-nowrap p-2">IV.14-20.08/021/KEP/X/2000/T</td>
                                    <td class="text-nowrap p-2">22-01-2001</td>
                                    <td class="text-nowrap p-2">-</td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2">10-10-2000</td>
                                    <td class="text-nowrap p-2">8</td>
                                    <td class="text-nowrap p-2">7</td>
                                    <td class="text-nowrap p-2">Kepala BAKN</td>
                                </tr>


                                <tr>
                                    <td class="text-nowrap p-2 text-center">5</td>
                                    <td class="text-nowrap p-2">ANDI SELFIAH PATUNRU</td>
                                    <td class="text-nowrap p-2">196008121992032005</td>
                                    <td class="text-nowrap p-2">Pilihan Jabatan Fungsional</td>
                                    <td class="text-nowrap p-2">IV/a</td>
                                    <td class="text-nowrap p-2">Pembina</td>
                                    <td class="text-nowrap p-2">823.4/04/BKD/2003</td>
                                    <td class="text-nowrap p-2">26-03-2003</td>
                                    <td class="text-nowrap p-2">EB 7307000255</td>
                                    <td class="text-nowrap p-2">24-03-2003</td>
                                    <td class="text-nowrap p-2">01-04-2003</td>
                                    <td class="text-nowrap p-2">11</td>
                                    <td class="text-nowrap p-2">1</td>
                                    <td class="text-nowrap p-2">Bupati Maros</td>
                                </tr>

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