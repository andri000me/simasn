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
            <h4><b>REKAPITULASI BERDASARKAN GOLONGAN DAN JENIS KELAMIN</b></h4>
          </label>

          <div style="overflow-x: auto;" class=" col-md-12 container container-fixed-lg p-0">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
            <table  class="table table-sm table-hover table-striped bg-white table-bordered">
              <thead class="bg-info-lighter">
                <tr>
                  <th width="5%" class="text-black text-nowrap text-center p-2" rowspan="3">NO.</th>
                  <th width="45%" class="text-black text-nowrap text-center p-2" rowspan="3">UNIT KERJA</th>
                  <th width="30%" class="text-black text-nowrap text-center p-2" colspan="12">
                    <center>GOLONGAN</center>
                  </th>
                  <th width="20%" class="text-black text-nowrap text-center p-2" rowspan="3">Jml Total</th>
                </tr>
                <tr>
                  <th class="text-black text-nowrap text-center p-2" colspan="2">
                    <center>I</center>
                  </th>
                  <th class="text-black text-nowrap text-center p-2" rowspan="2">Jml</th>
                  <th class="text-black text-nowrap text-center p-2" colspan="2">
                    <center>II</center>
                  </th>
                  <th class="text-black text-nowrap text-center p-2" rowspan="2">Jml</th>
                  <th class="text-black text-nowrap text-center p-2" colspan="2">
                    <center>III</center>
                  </th>
                  <th class="text-black text-nowrap text-center p-2" rowspan="2">Jml</th>
                  <th class="text-black text-nowrap text-center p-2" colspan="2">
                    <center>IV</center>
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
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td class="text-nowrap p-2 text-center"></td>
                  <td class="text-nowrap p-2"><b>BADAN</b></td>
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
                  <td class="text-nowrap p-2">Badan Kesatuan Bangsa dan Politik</td>

                  <td class="text-nowrap p-2 text-center">0</td>
                  <td class="text-nowrap p-2 text-center">0</td>
                  <td class="text-nowrap p-2 text-center">0</td>
                  <td class="text-nowrap p-2 text-center">5</td>
                  <td class="text-nowrap p-2 text-center">4</td>
                  <td class="text-nowrap p-2 text-center">9</td>
                  <td class="text-nowrap p-2 text-center">5</td>
                  <td class="text-nowrap p-2 text-center">15</td>
                  <td class="text-nowrap p-2 text-center">20</td>
                  <td class="text-nowrap p-2 text-center">3</td>
                  <td class="text-nowrap p-2 text-center">2</td>
                  <td class="text-nowrap p-2 text-center">5</td>
                  <td class="text-nowrap p-2 text-center">34</td>
                </tr>
                <tr>
                  <td class="text-nowrap p-2 text-center">2</td>
                  <td class="text-nowrap p-2">Badan Penanggulangan Bencana Daerah</td>

                  <td class="text-nowrap p-2 text-center">1</td>
                  <td class="text-nowrap p-2 text-center">0</td>
                  <td class="text-nowrap p-2 text-center">1</td>
                  <td class="text-nowrap p-2 text-center">11</td>
                  <td class="text-nowrap p-2 text-center">1</td>
                  <td class="text-nowrap p-2 text-center">12</td>
                  <td class="text-nowrap p-2 text-center">10</td>
                  <td class="text-nowrap p-2 text-center">9</td>
                  <td class="text-nowrap p-2 text-center">19</td>
                  <td class="text-nowrap p-2 text-center">5</td>
                  <td class="text-nowrap p-2 text-center">0</td>
                  <td class="text-nowrap p-2 text-center">5</td>
                  <td class="text-nowrap p-2 text-center">37</td>
                </tr>
                <tr>
                  <td class="text-nowrap p-2 text-center text-center">3</td>
                  <td class="text-nowrap p-2 text-center">Badan Perencanaan Pembangunan Daerah</td>

                  <td class="text-nowrap p-2 text-center">0</td>
                  <td class="text-nowrap p-2 text-center">0</td>
                  <td class="text-nowrap p-2 text-center">0</td>
                  <td class="text-nowrap p-2 text-center">5</td>
                  <td class="text-nowrap p-2 text-center">1</td>
                  <td class="text-nowrap p-2 text-center">6</td>
                  <td class="text-nowrap p-2 text-center">18</td>
                  <td class="text-nowrap p-2 text-center">15</td>
                  <td class="text-nowrap p-2 text-center">33</td>
                  <td class="text-nowrap p-2 text-center">2</td>
                  <td class="text-nowrap p-2 text-center">3</td>
                  <td class="text-nowrap p-2 text-center">5</td>
                  <td class="text-nowrap p-2 text-center">44</td>
                </tr>
                <tr>
                  <td class="text-nowrap p-2 text-center">4</td>
                  <td class="text-nowrap p-2">Badan Penelitian dan Pengembangan Daerah</td>

                  <td class="text-nowrap p-2 text-center">0</td>
                  <td class="text-nowrap p-2 text-center">0</td>
                  <td class="text-nowrap p-2 text-center">0</td>
                  <td class="text-nowrap p-2 text-center">3</td>
                  <td class="text-nowrap p-2 text-center">4</td>
                  <td class="text-nowrap p-2 text-center">7</td>
                  <td class="text-nowrap p-2 text-center">11</td>
                  <td class="text-nowrap p-2 text-center">15</td>
                  <td class="text-nowrap p-2 text-center">26</td>
                  <td class="text-nowrap p-2 text-center">5</td>
                  <td class="text-nowrap p-2 text-center">1</td>
                  <td class="text-nowrap p-2 text-center">6</td>
                  <td class="text-nowrap p-2 text-center">39</td>
                </tr>
                <tr>
                  <td class="text-nowrap p-2 text-center">5</td>
                  <td class="text-nowrap p-2">Badan Kepegawaian dan Pengembangan Sumber Daya Manusia</td>

                  <td class="text-nowrap p-2 text-center">1</td>
                  <td class="text-nowrap p-2 text-center">0</td>
                  <td class="text-nowrap p-2 text-center">1</td>
                  <td class="text-nowrap p-2 text-center">10</td>
                  <td class="text-nowrap p-2 text-center">11</td>
                  <td class="text-nowrap p-2 text-center">21</td>
                  <td class="text-nowrap p-2 text-center">12</td>
                  <td class="text-nowrap p-2 text-center">15</td>
                  <td class="text-nowrap p-2 text-center">27</td>
                  <td class="text-nowrap p-2 text-center">1</td>
                  <td class="text-nowrap p-2 text-center">4</td>
                  <td class="text-nowrap p-2 text-center">5</td>
                  <td class="text-nowrap p-2 text-center">54</td>
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