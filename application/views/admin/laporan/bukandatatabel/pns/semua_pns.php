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
                        <h6 style="font-size: 16pt;"><b>EKSPOR SEMUA ASN</b></h6>
                    </label>
                    <div class="row">
                        <div class="col-md-6">
                            <form id="filter" role="form">
                                <div class="form-group">
                                    <select class="full-width" data-init-plugin="select2">
                                        <option value="" required>-- Pilih Kolom Tabel -- </option>
                                        <option>PNS_ID</option>
                                        <option>NIP_BARU</option>
                                        <option>NIP_LAMA</option>
                                        <option>NAMA</option>
                                        <option>GELAR_DEPAN</option>
                                        <option>GELAR_BELAKANG</option>
                                        <option>TEMPAT_LAHIR</option>
                                        <option>TEMPAT_NAMA</option>
                                        <option>TANGGAL_LAHIR</option>
                                        <option>JENIS_KELAMIN</option>
                                        <option>AGAMA</option>
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
                        <table class="table table-sm table-hover table-striped table-responsive table-bordered">
                            <thead class="bg-info-lighter">
                                <tr>
                                    <th class="text-black text-nowrap text-center p-2">NO</th>
                                    <!-- <th class="text-black text-nowrap text-center p-2">PNS_ID</th> -->
                                    <th class="text-black text-nowrap text-center p-2">NIP BARU</th>
                                    <th class="text-black text-nowrap text-center p-2">NIP LAMA</th>
                                    <th class="text-black text-nowrap text-center p-2">NAMA</th>
                                    <!-- <th class="text-black text-nowrap text-center p-2">GELAR DEPAN</th>
                                    <th class="text-black text-nowrap text-center p-2">GELAR BLK</th> -->
                                    <!-- <th class="text-black text-nowrap text-center p-2">TEMPAT_LAHIR_ID</th> -->
                                    <th class="text-black text-nowrap text-center p-2">TEMPAT LAHIR</th>
                                    <th class="text-black text-nowrap text-center p-2">TGL LAHIR</th>
                                    <th class="text-black text-nowrap text-center p-2">JENIS KELAMIN</th>
                                    <!-- <th class="text-black text-nowrap text-center p-2">AGAMA_ID</th> -->
                                    <th class="text-black text-nowrap text-center p-2">AGAMA</th>
                                    <!-- <th class="text-black text-nowrap text-center p-2">JENIS_KAWIN_ID</th> -->
                                    <th class="text-black text-nowrap text-center p-2">STATUS NIKAH</th>
                                    <th class="text-black text-nowrap text-center p-2">NIK</th>
                                    <th class="text-black text-nowrap text-center p-2">NOMOR TELP/NOMOR HP</th>
                                    <th class="text-black text-nowrap text-center p-2">EMAIL</th>
                                    <th class="text-black text-nowrap text-center p-2">ALAMAT</th>
                                    <th class="text-black text-nowrap text-center p-2">NPWP NOMOR</th>
                                    <th class="text-black text-nowrap text-center p-2">BPJS</th>
                                    <th class="text-black text-nowrap text-center p-2">KEDUDUKAN HUKUM</th>
                                    <th class="text-black text-nowrap text-center p-2">STATUS CPNS PNS</th>
                                    <th class="text-black text-nowrap text-center p-2">KARTU PEGAWAI</th>
                                    <th class="text-black text-nowrap text-center p-2">NOMOR SK CPNS</th>
                                    <th class="text-black text-nowrap text-center p-2">TGL SK CPNS</th>
                                    <th class="text-black text-nowrap text-center p-2">TMT CPNS</th>
                                    <th class="text-black text-nowrap text-center p-2">TMT PNS</th>
                                    <th class="text-black text-nowrap text-center p-2">GOLONGAN AWAL</th>
                                    <th class="text-black text-nowrap text-center p-2">GOLONGAN</th>
                                    <th class="text-black text-nowrap text-center p-2">TMT_GOLONGAN</th>
                                    <th class="text-black text-nowrap text-center p-2">MK_TAHUN</th>
                                    <th class="text-black text-nowrap text-center p-2">MK_BULAN</th>
                                    <th class="text-black text-nowrap text-center p-2">JENIS_JABATAN_ID</th>
                                    <th class="text-black text-nowrap text-center p-2">JENIS_JABATAN_NAMA</th>
                                    <th class="text-black text-nowrap text-center p-2">JABATAN_ID</th>
                                    <th class="text-black text-nowrap text-center p-2">JABATAN_NAMA</th>
                                    <th class="text-black text-nowrap text-center p-2">TMT_JABATAN</th>
                                    <th class="text-black text-nowrap text-center p-2">TUGAS_POKOK</th>
                                    <th class="text-black text-nowrap text-center p-2">PENDIDIKAN_ID</th>
                                    <th class="text-black text-nowrap text-center p-2">PENDIDIKAN_NAMA</th>
                                    <th class="text-black text-nowrap text-center p-2">TAHUN_LULUS</th>
                                    <th class="text-black text-nowrap text-center p-2">UNIT_KERJA_NAMA</th>
                                    <th class="text-black text-nowrap text-center p-2">BAGIAN_NAMA</th>
                                    <th class="text-black text-nowrap text-center p-2">SUBBAGIAN_NAMA</th>
                                    <th class="text-black text-nowrap text-center p-2">TEMPATKERJA_NAMA</th>
                                    <th class="text-black text-nowrap text-center p-2">NOMOR_SK_KGB</th>
                                    <th class="text-black text-nowrap text-center p-2">TGL_SK_KGB</th>
                                    <th class="text-black text-nowrap text-center p-2">TMT_KGB</th>
                                    <th class="text-black text-nowrap text-center p-2">GAJI_POKOK</th>
                                    <th class="text-black text-nowrap text-center p-2">KGB_BERIKUTNYA</th>
                                    <th class="text-black text-nowrap text-center p-2">DIKLAT_TRAKHIR_NAMA</th>
                                    <th class="text-black text-nowrap text-center p-2">DIKLAT_TRAKHIR_TAHUN</th>
                                    <th class="text-black text-nowrap text-center p-2">DIKLAT_TRAKHIR_JAM</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $uri4=='semua_pns' ? $nu = $uri5 : $nu = $uri4; $no=1; foreach($asn as $a): ?>
                                <tr>
                                    <td class="text-nowrap p-2 text-center"><?= $nu + $no++ ;?></td>
                                    <!-- <td class="text-nowrap p-2"></td> -->
                                    <td class="text-nowrap p-2" class="text"><?= !empty($a['nip']) ? $a['nip'] : '-' ?></td>
                                    <td class="text-nowrap p-2" class="text"><?= !empty($a['nip_lama']) ? $a['nip_lama'] : '-' ?></td>
                                    <td class="text-nowrap p-2">
                                        <?= !empty($a['gelardepan']) ? $a['gelardepan'] : '' ?>
                                        <?= !empty($a['nama']) ? $a['nama'] : '-' ?>
                                        <?= !empty($a['gelarbelakang']) ? $a['gelarbelakang'] :'' ?>
                                    </td>
                                    <!-- <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td> -->
                                    <!-- <td class="text-nowrap p-2"></td> -->
                                    <td class="text-nowrap p-2"><?= !empty($a['tempatlahir']) ? $a['tempatlahir'] : '-' ?></td>
                                    <td class="text-nowrap p-2"><?= !empty($a['tanggallahir']) ? date('d-m-Y', strtotime($a['tanggallahir'])) : '-'; ?></td>
                                    <td class="text-nowrap p-2"><?= !empty($a['nm_kelamin']) ? $a['nm_kelamin'] : '-' ?></td>
                                    <!-- <td class="text-nowrap p-2">1</td> -->
                                    <td class="text-nowrap p-2"><?= !empty($a['nm_agama']) ? $a['nm_agama'] : '-' ?></td>
                                    <!-- <td class="text-nowrap p-2">1</td> -->
                                    <td class="text-nowrap p-2"><?= !empty($a['nm_skawin']) ? $a['nm_skawin'] : '-' ?></td>
                                    <td class="text-nowrap p-2" class="text"><?= !empty($a['noktp']) ? $a['noktp'] : '-' ?></td>
                                    <td class="text-nowrap p-2" class="text"><?= !empty($a['notlpx']) ? $a['notlpx'] : '-' ?> / <?= !empty($a['notlpx']) ? $a['notlpx'] : '-' ?></td>
                                    <td class="text-nowrap p-2" class="text"><?= !empty($a['email']) ? $a['email'] : '-' ?></td>
                                    <td class="text-nowrap p-2"><?= !empty($a['alamat']) ? $a['alamat'] : '-' ?></td>
                                    <td class="text-nowrap p-2" class="text"><?= !empty($a['nonpwp']) ? $a['nonpwp'] : '-' ?></td>
                                    <td class="text-nowrap p-2" class="text"><?= !empty($a['nobpjs']) ? $a['nobpjs'] : '-' ?></td>
                                    <td class="text-nowrap p-2"><?= !empty($a['nm_hukum']) ? $a['nm_hukum'] : '-' ?></td>
                                    <td class="text-nowrap p-2"><?= !empty($a['jenis_pegawai']) ? $a['jenis_pegawai'] : '-' ?></td>
                                    <td class="text-nowrap p-2"><?= !empty($a['nokarpeg']) ? $a['nokarpeg'] : '-' ?></td>
                                    <td class="text-nowrap p-2" class="text"><?= !empty($a['no_sk_cpns']) ? $a['no_sk_cpns'] : '-' ?></td>
                                    <td class="text-nowrap p-2"><?= !empty($a['tgl_sk_cpns']) ? date('d-m-Y', strtotime($a['tgl_sk_cpns'])) : '-' ?></td>
                                    <td class="text-nowrap p-2"><?= !empty($a['tmt_cpns']) ? date('d-m-Y', strtotime($a['tmt_cpns'])) : '-' ?></td>
                                    <td class="text-nowrap p-2"><?= !empty($a['tmt_pns']) ? date('d-m-Y', strtotime($a['tmt_pns'])) : '-' ?></td>
                                    <td class="text-nowrap p-2">-</td>
                                    <!-- <td class="text-nowrap p-2"></td> -->
                                    <td class="text-nowrap p-2"><?= !empty($a['golongan']) ? $a['golongan'] : '-' ?></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"> </td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2">01-01-1972</td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                </tr>
                                <?php endforeach;?>

                            </tbody>
                        </table>
                        <?= $pagination ?>
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
    <!-- <script src="<?= base_url(); ?>assets/admin/plugins/pace/pace.min.js" type="text/javascript"></script> -->
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