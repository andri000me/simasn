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
                        <h4><b>REKAPITULASI BERDASARKAN PENDIDKAN DAN JENIS KELAMIN</b></h4>
                    </label>

                    <div class=" col-md-12 container container-fixed-lg bg-white p-0">
                        <!-- BEGIN PlACE PAGE CONTENT HERE -->
                        <table class="table table-sm table-hover table-striped table-responsive table-bordered">
                            <thead class="bg-info-lighter">
                                <tr>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="3">NO.</th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="3">UNIT KERJA</th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="30">
                                        <center>TINGKAT PENDIDIKAN DAN JENIS KELAMIN</center>
                                    </th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="3">Jml Total</th>
                                </tr>
                                <tr>
                                    <th class="text-black text-nowrap text-center p-2" colspan="2">
                                        <center>SD</center>
                                    </th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">Jml</th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="2">
                                        <center>SLTP</center>
                                    </th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">Jml</th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="2">
                                        <center>SLTA</center>
                                    </th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">Jml</th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="2">
                                        <center>D.I</center>
                                    </th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">Jml</th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="2">
                                        <center>D.II</center>
                                    </th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">Jml</th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="2">
                                        <center>D.III</center>
                                    </th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">Jml</th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="2">
                                        <center>D.IV</center>
                                    </th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">Jml</th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="2">
                                        <center>S.1</center>
                                    </th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">Jml</th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="2">
                                        <center>S.2</center>
                                    </th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">Jml</th>
                                    <th class="text-black text-nowrap text-center p-2" colspan="2">
                                        <center>S.3</center>
                                    </th>
                                    <th class="text-black text-nowrap text-center p-2" rowspan="2">Jml</th>
                                </tr>
                                <tr>
                                    <th class="text-black text-nowrap text-center p-2">L</th>
                                    <th class="text-black text-nowrap text-center p-2">P</th>
                                    <th class="text-black text-nowrap text-center p-2">L</th>
                                    <th class="text-black text-nowrap text-center p-2">P</th>
                                    <th class="text-black text-nowrap text-center p-2">L</th>
                                    <th class="text-black text-nowrap text-center p-2">P</th>
                                    <th class="text-black text-nowrap text-center p-2">L</th>
                                    <th class="text-black text-nowrap text-center p-2">P</th>
                                    <th class="text-black text-nowrap text-center p-2">L</th>
                                    <th class="text-black text-nowrap text-center p-2">P</th>
                                    <th class="text-black text-nowrap text-center p-2">L</th>
                                    <th class="text-black text-nowrap text-center p-2">P</th>
                                    <th class="text-black text-nowrap text-center p-2">L</th>
                                    <th class="text-black text-nowrap text-center p-2">P</th>
                                    <th class="text-black text-nowrap text-center p-2">L</th>
                                    <th class="text-black text-nowrap text-center p-2">P</th>
                                    <th class="text-black text-nowrap text-center p-2">L</th>
                                    <th class="text-black text-nowrap text-center p-2">P</th>
                                    <th class="text-black text-nowrap text-center p-2">L</th>
                                    <th class="text-black text-nowrap text-center p-2">P</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2"><b>BADAN</b></td>
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
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                    <td class="text-nowrap p-2"></td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2">Badan Kesatuan Bangsa dan Politik</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">5</td>
                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2 text-center">9</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">7</td>
                                    <td class="text-nowrap p-2 text-center">14</td>
                                    <td class="text-nowrap p-2 text-center">21</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2 text-center">4</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">34</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2">Badan Penanggulangan Bencana Daerah</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">1</td>

                                    <td class="text-nowrap p-2 text-center">12</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">13</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">9</td>
                                    <td class="text-nowrap p-2 text-center">8</td>
                                    <td class="text-nowrap p-2 text-center">17</td>

                                    <td class="text-nowrap p-2 text-center">5</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">6</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">37</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2">Badan Perencanaan Pembangunan Daerah</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">6</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">7</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">15</td>
                                    <td class="text-nowrap p-2 text-center">12</td>
                                    <td class="text-nowrap p-2 text-center">27</td>

                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2 text-center">6</td>
                                    <td class="text-nowrap p-2 text-center">10</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">44</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2">Badan Penelitian dan Pengembangan Daerah</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2 text-center">7</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">13</td>
                                    <td class="text-nowrap p-2 text-center">12</td>
                                    <td class="text-nowrap p-2 text-center">25</td>

                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2 text-center">7</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">39</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">5</td>
                                    <td class="text-nowrap p-2">Badan Kepegawaian dan Pengembangan Sumber Daya Manusia</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">9</td>
                                    <td class="text-nowrap p-2 text-center">9</td>
                                    <td class="text-nowrap p-2 text-center">18</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">1</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">2</td>

                                    <td class="text-nowrap p-2 text-center">8</td>
                                    <td class="text-nowrap p-2 text-center">14</td>
                                    <td class="text-nowrap p-2 text-center">22</td>

                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2 text-center">6</td>
                                    <td class="text-nowrap p-2 text-center">10</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">53</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">6</td>
                                    <td class="text-nowrap p-2">Badan Pengelolaan Keuangan dan Pendapatan Daerah</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">1</td>

                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">3</td>

                                    <td class="text-nowrap p-2 text-center">9</td>
                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2 text-center">11</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2 text-center">2</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">1</td>

                                    <td class="text-nowrap p-2 text-center">19</td>
                                    <td class="text-nowrap p-2 text-center">28</td>
                                    <td class="text-nowrap p-2 text-center">47</td>

                                    <td class="text-nowrap p-2 text-center">6</td>
                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2 text-center">8</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">73</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"><b>DINAS</b></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                    <td class="text-nowrap p-2 text-center"></td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2">Dinas Kebudayaan dan Pariwisata</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">1</td>

                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">2</td>

                                    <td class="text-nowrap p-2 text-center">26</td>
                                    <td class="text-nowrap p-2 text-center">10</td>
                                    <td class="text-nowrap p-2 text-center">36</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">1</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">14</td>
                                    <td class="text-nowrap p-2 text-center">21</td>
                                    <td class="text-nowrap p-2 text-center">35</td>

                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2 text-center">5</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">80</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2">Dinas Kesehatan</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">2</td>

                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">3</td>

                                    <td class="text-nowrap p-2 text-center">43</td>
                                    <td class="text-nowrap p-2 text-center">70</td>
                                    <td class="text-nowrap p-2 text-center">113</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">9</td>
                                    <td class="text-nowrap p-2 text-center">9</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">28</td>
                                    <td class="text-nowrap p-2 text-center">192</td>
                                    <td class="text-nowrap p-2 text-center">220</td>

                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2 text-center">67</td>
                                    <td class="text-nowrap p-2 text-center">70</td>

                                    <td class="text-nowrap p-2 text-center">60</td>
                                    <td class="text-nowrap p-2 text-center">208</td>
                                    <td class="text-nowrap p-2 text-center">268</td>

                                    <td class="text-nowrap p-2 text-center">19</td>
                                    <td class="text-nowrap p-2 text-center">39</td>
                                    <td class="text-nowrap p-2 text-center">58</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">1</td>

                                    <td class="text-nowrap p-2 text-center">744</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2">Dinas Pendidikan</td>

                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">5</td>

                                    <td class="text-nowrap p-2 text-center">11</td>
                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2 text-center">14</td>

                                    <td class="text-nowrap p-2 text-center">131</td>
                                    <td class="text-nowrap p-2 text-center">156</td>
                                    <td class="text-nowrap p-2 text-center">287</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2 text-center">5</td>

                                    <td class="text-nowrap p-2 text-center">51</td>
                                    <td class="text-nowrap p-2 text-center">149</td>
                                    <td class="text-nowrap p-2 text-center">200</td>

                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2 text-center">6</td>
                                    <td class="text-nowrap p-2 text-center">10</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">1</td>

                                    <td class="text-nowrap p-2 text-center">611</td>
                                    <td class="text-nowrap p-2 text-center">1314</td>
                                    <td class="text-nowrap p-2 text-center">1925</td>

                                    <td class="text-nowrap p-2 text-center">71</td>
                                    <td class="text-nowrap p-2 text-center">57</td>
                                    <td class="text-nowrap p-2 text-center">128</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">1</td>

                                    <td class="text-nowrap p-2 text-center">2576</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2">Dinas Perhubungan</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">1</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">2</td>

                                    <td class="text-nowrap p-2 text-center">26</td>
                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2 text-center">29</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">1</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2 text-center">2</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">31</td>
                                    <td class="text-nowrap p-2 text-center">10</td>
                                    <td class="text-nowrap p-2 text-center">41</td>

                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">4</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">80</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">5</td>
                                    <td class="text-nowrap p-2">Dinas Kependudukan dan Pencatatan Sipil</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">8</td>
                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2 text-center">12</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">1</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">14</td>
                                    <td class="text-nowrap p-2 text-center">18</td>
                                    <td class="text-nowrap p-2 text-center">32</td>

                                    <td class="text-nowrap p-2 text-center">8</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">9</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">54</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">6</td>
                                    <td class="text-nowrap p-2">Dinas Perikanan</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">1</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2 text-center">11</td>
                                    <td class="text-nowrap p-2 text-center">15</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2 text-center">3</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">1</td>

                                    <td class="text-nowrap p-2 text-center">17</td>
                                    <td class="text-nowrap p-2 text-center">20</td>
                                    <td class="text-nowrap p-2 text-center">37</td>

                                    <td class="text-nowrap p-2 text-center">5</td>
                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2 text-center">9</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">66</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">7</td>
                                    <td class="text-nowrap p-2">Dinas Komunikasi dan Informatika</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">2</td>

                                    <td class="text-nowrap p-2 text-center">11</td>
                                    <td class="text-nowrap p-2 text-center">11</td>
                                    <td class="text-nowrap p-2 text-center">22</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">1</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">2</td>

                                    <td class="text-nowrap p-2 text-center">8</td>
                                    <td class="text-nowrap p-2 text-center">16</td>
                                    <td class="text-nowrap p-2 text-center">24</td>

                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2 text-center">6</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">57</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">8</td>
                                    <td class="text-nowrap p-2">Dinas Kepemudaan dan Olahraga</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">13</td>
                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2 text-center">17</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">3</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">1</td>

                                    <td class="text-nowrap p-2 text-center">10</td>
                                    <td class="text-nowrap p-2 text-center">15</td>
                                    <td class="text-nowrap p-2 text-center">25</td>

                                    <td class="text-nowrap p-2 text-center">9</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">10</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">56</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">9</td>
                                    <td class="text-nowrap p-2">Dinas Koperasi, UKM dan Perdagangan</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">4</td>

                                    <td class="text-nowrap p-2 text-center">9</td>
                                    <td class="text-nowrap p-2 text-center">6</td>
                                    <td class="text-nowrap p-2 text-center">15</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">14</td>
                                    <td class="text-nowrap p-2 text-center">16</td>
                                    <td class="text-nowrap p-2 text-center">30</td>

                                    <td class="text-nowrap p-2 text-center">5</td>
                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2 text-center">7</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">56</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">10</td>
                                    <td class="text-nowrap p-2">Dinas Lingkungan Hidup</td>

                                    <td class="text-nowrap p-2 text-center">15</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">15</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">2</td>

                                    <td class="text-nowrap p-2 text-center">14</td>
                                    <td class="text-nowrap p-2 text-center">6</td>
                                    <td class="text-nowrap p-2 text-center">20</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">22</td>
                                    <td class="text-nowrap p-2 text-center">21</td>
                                    <td class="text-nowrap p-2 text-center">43</td>

                                    <td class="text-nowrap p-2 text-center">5</td>
                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2 text-center">7</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">87</td>
                                </tr>
                                <tr>
                                    <td class="text-nowrap p-2 text-center">11</td>
                                    <td class="text-nowrap p-2">Dinas Pekerjaan Umum dan Penataan Ruang</td>

                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">1</td>

                                    <td class="text-nowrap p-2 text-center">2</td>
                                    <td class="text-nowrap p-2 text-center">1</td>
                                    <td class="text-nowrap p-2 text-center">3</td>

                                    <td class="text-nowrap p-2 text-center">25</td>
                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2 text-center">28</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">5</td>
                                    <td class="text-nowrap p-2 text-center">3</td>
                                    <td class="text-nowrap p-2 text-center">8</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">36</td>
                                    <td class="text-nowrap p-2 text-center">26</td>
                                    <td class="text-nowrap p-2 text-center">62</td>

                                    <td class="text-nowrap p-2 text-center">5</td>
                                    <td class="text-nowrap p-2 text-center">4</td>
                                    <td class="text-nowrap p-2 text-center">9</td>

                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>
                                    <td class="text-nowrap p-2 text-center">0</td>

                                    <td class="text-nowrap p-2 text-center">111</td>
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