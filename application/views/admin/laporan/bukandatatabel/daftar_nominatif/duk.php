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
            <h4><b>DAFTAR URUT KEPANGKATAN (DUK)</b></h4>
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
          <div class=" col-md-12 container container-fixed-lg bg-white p-0">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
            <table class="table table-sm table-hover table-striped table-responsive table-bordered">
              <thead class="bg-info-lighter">
                <tr>
                  <th class="text-black text-nowrap text-center p-2" rowspan="2">NOMOR URUT</th>
                  <th class="text-black text-nowrap text-center p-2" rowspan="2">NAMA</th>
                  <th class="text-black text-nowrap text-center p-2" rowspan="2">NIP</th>
                  <th class="text-black text-nowrap text-center p-2" colspan="2">
                    <center>PANGKAT TERAKHIR</center>
                  </th>
                  <th class="text-black text-nowrap text-center p-2" colspan="3">
                    <center>JABATAN</center>
                  </th>
                  <th class="text-black text-nowrap text-center p-2" colspan="2">
                    <center>MASA KERJA</center>
                  </th>
                  <th class="text-black text-nowrap text-center p-2" colspan="7">
                    <center>PENDIDIKAN DAN PELATIHAN JABATAN</center>
                  </th>
                  <th class="text-black text-nowrap text-center p-2" rowspan="2">TANGGAL LAHIR</th>
                  <th class="text-black text-nowrap text-center p-2" colspan="2">
                    <center>USIA</center>
                  </th>
                  <th class="text-black text-nowrap text-center p-2" rowspan="2">UNIT KERJA</th>
                  <th class="text-black text-nowrap text-center p-2" rowspan="2">CATATAN MUTASI KEPEGAWAIAN</th>
                  <th class="text-black text-nowrap text-center p-2" rowspan="2">KET</th>
                </tr>
                <tr>
                  <th class="text-black text-nowrap text-center p-2">GOL/RUANG</th>
                  <th class="text-black text-nowrap text-center p-2">TMT</th>
                  <th class="text-black text-nowrap text-center p-2">NAMA</th>
                  <th class="text-black text-nowrap text-center p-2">ESELON</th>
                  <th class="text-black text-nowrap text-center p-2">TMT</th>
                  <th class="text-black text-nowrap text-center p-2">THN</th>
                  <th class="text-black text-nowrap text-center p-2">BLN</th>
                  <th class="text-black text-nowrap text-center p-2">DIKLAT KEPEMIMPINAN</th>
                  <th class="text-black text-nowrap text-center p-2">TAHUN</th>
                  <th class="text-black text-nowrap text-center p-2">JML JAM</th>
                  <th class="text-black text-nowrap text-center p-2">TEMPAT MENEMPUH PENDIDIKAN</th>
                  <th class="text-black text-nowrap text-center p-2">NAMA PENDIDIKAN</th>
                  <th class="text-black text-nowrap text-center p-2">THN LULUS</th>
                  <th class="text-black text-nowrap text-center p-2">TK.IJAZAH</th>
                  <th class="text-black text-nowrap text-center p-2">THN</th>
                  <th class="text-black text-nowrap text-center p-2">BLN</th>
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
                  <th class="text-white text-center p-1 bg-info-light">17</th>
                  <th class="text-white text-center p-1 bg-info-light">18</th>
                  <th class="text-white text-center p-1 bg-info-light">19</th>
                  <th class="text-white text-center p-1 bg-info-light">20</th>
                  <th class="text-white text-center p-1 bg-info-light">21</th>
                  <th class="text-white text-center p-1 bg-info-light">22</th>
                  <th class="text-white text-center p-1 bg-info-light">23</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td class="text-nowrap p-2 text-center">1</td>
                  <td class="text-nowrap p-2"> A. DAVIED SYAMSUDDIN , S.STP., M.Si</td>
                  <td class="text-nowrap p-2" class="text">197809241996121001</td>
                  <td class="text-nowrap p-2">IV/d</td>
                  <td class="text-nowrap p-2">01-04-2020</td>
                  <td class="text-nowrap p-2">Sekretaris Sekretariat Daerah</td>
                  <td class="text-nowrap p-2">II-B</td>
                  <td class="text-nowrap p-2">14-01-2013</td>
                  <td class="text-nowrap p-2">19</td>
                  <td class="text-nowrap p-2">6</td>
                  <td class="text-nowrap p-2">Diklatpim Tk. III</td>
                  <td class="text-nowrap p-2">2006</td>
                  <td class="text-nowrap p-2">360</td>
                  <td class="text-nowrap p-2">Universitas Hasanuddin</td>
                  <td class="text-nowrap p-2">S.2 Administrasi Perencanaan Pembangunan</td>
                  <td class="text-nowrap p-2">2004</td>
                  <td class="text-nowrap p-2">S-2</td>
                  <td class="text-nowrap p-2">24-09-1978</td>
                  <td class="text-nowrap p-2">42</td>
                  <td class="text-nowrap p-2">0</td>
                  <td class="text-nowrap p-2">Sekretariat Daerah</td>
                  <td class="text-nowrap p-2"></td>
                  <td class="text-nowrap p-2"></td>
                </tr>
                <tr>
                  <td class="text-nowrap p-2 text-center">2</td>
                  <td class="text-nowrap p-2">drg. Hj. ANDI SELFIAH PATUNRU </td>
                  <td class="text-nowrap p-2" class="text">196008121992032005</td>
                  <td class="text-nowrap p-2">IV/d</td>
                  <td class="text-nowrap p-2">01-04-2015</td>
                  <td class="text-nowrap p-2">Dokter Gigi Madya UPTD Puskesmas Kecamatan Tanralili</td>
                  <td class="text-nowrap p-2">Fungsional</td>
                  <td class="text-nowrap p-2">01-04-2015</td>
                  <td class="text-nowrap p-2">23</td>
                  <td class="text-nowrap p-2">1</td>
                  <td class="text-nowrap p-2"></td>
                  <td class="text-nowrap p-2"></td>
                  <td class="text-nowrap p-2"></td>
                  <td class="text-nowrap p-2">Universitas Hasanuddin</td>
                  <td class="text-nowrap p-2">S.1 Kedokteran Gigi</td>
                  <td class="text-nowrap p-2">1990</td>
                  <td class="text-nowrap p-2">S-1</td>
                  <td class="text-nowrap p-2">08-12-1960</td>
                  <td class="text-nowrap p-2">59</td>
                  <td class="text-nowrap p-2">9</td>
                  <td class="text-nowrap p-2">Dinas Kesehatan</td>
                  <td class="text-nowrap p-2"></td>
                  <td class="text-nowrap p-2"></td>
                </tr>
                <tr>
                  <td class="text-nowrap p-2 text-center">3</td>
                  <td class="text-nowrap p-2">Drs. YUSUF , M.Pd</td>
                  <td class="text-nowrap p-2" class="text">196212051986031017</td>
                  <td class="text-nowrap p-2">IV/d</td>
                  <td class="text-nowrap p-2">01-04-2015</td>
                  <td class="text-nowrap p-2">Guru Utama Muda SMPN 16 Mandai</td>
                  <td class="text-nowrap p-2">Fungsional</td>
                  <td class="text-nowrap p-2">01-04-1993</td>
                  <td class="text-nowrap p-2">29</td>
                  <td class="text-nowrap p-2">1</td>
                  <td class="text-nowrap p-2"></td>
                  <td class="text-nowrap p-2"></td>
                  <td class="text-nowrap p-2"></td>
                  <td class="text-nowrap p-2">UNIPA Surabaya</td>
                  <td class="text-nowrap p-2">S.2 Teknologi Pembelajaran </td>
                  <td class="text-nowrap p-2">2008</td>
                  <td class="text-nowrap p-2">S-2</td>
                  <td class="text-nowrap p-2">05-12-1962</td>
                  <td class="text-nowrap p-2">57</td>
                  <td class="text-nowrap p-2">9</td>
                  <td class="text-nowrap p-2">Dinas Pendidikan</td>
                  <td class="text-nowrap p-2"></td>
                  <td class="text-nowrap p-2"></td>
                </tr>
                <tr>
                  <td class="text-nowrap p-2 text-center">4</td>
                  <td class="text-nowrap p-2"> ANDI ROSMAN , S.Sos., MM</td>
                  <td class="text-nowrap p-2" class="text">197211081992021001</td>
                  <td class="text-nowrap p-2">IV/c</td>
                  <td class="text-nowrap p-2">01-04-2020</td>
                  <td class="text-nowrap p-2">Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</td>
                  <td class="text-nowrap p-2">II-B</td>
                  <td class="text-nowrap p-2">16-06-2017</td>
                  <td class="text-nowrap p-2">23</td>
                  <td class="text-nowrap p-2">6</td>
                  <td class="text-nowrap p-2">Diklatpim Tk. III</td>
                  <td class="text-nowrap p-2">2013</td>
                  <td class="text-nowrap p-2">360</td>
                  <td class="text-nowrap p-2">Universitas Muslim Indonesia</td>
                  <td class="text-nowrap p-2">S.2 Manajemen SDM</td>
                  <td class="text-nowrap p-2">2010</td>
                  <td class="text-nowrap p-2">S-2</td>
                  <td class="text-nowrap p-2">08-11-1972</td>
                  <td class="text-nowrap p-2">47</td>
                  <td class="text-nowrap p-2">10</td>
                  <td class="text-nowrap p-2">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</td>
                  <td class="text-nowrap p-2"></td>
                  <td class="text-nowrap p-2"></td>
                </tr>
                <tr>
                  <td class="text-nowrap p-2 text-center">5</td>
                  <td class="text-nowrap p-2"> SUKMAWATI , S.Pd., M.Pd.</td>
                  <td class="text-nowrap p-2" class="text">197205021997032009</td>
                  <td class="text-nowrap p-2">IV/c</td>
                  <td class="text-nowrap p-2">01-04-2020</td>
                  <td class="text-nowrap p-2">Guru Madya SMPN 5 Mandai</td>
                  <td class="text-nowrap p-2">Fungsional</td>
                  <td class="text-nowrap p-2">01-12-1998</td>
                  <td class="text-nowrap p-2">23</td>
                  <td class="text-nowrap p-2">1</td>
                  <td class="text-nowrap p-2"></td>
                  <td class="text-nowrap p-2"></td>
                  <td class="text-nowrap p-2"></td>
                  <td class="text-nowrap p-2">UNM Makassar</td>
                  <td class="text-nowrap p-2">S.2 Pendidikan Hukum dan Kewarganegaraan</td>
                  <td class="text-nowrap p-2">2011</td>
                  <td class="text-nowrap p-2">S-2</td>
                  <td class="text-nowrap p-2">02-05-1972</td>
                  <td class="text-nowrap p-2">48</td>
                  <td class="text-nowrap p-2">4</td>
                  <td class="text-nowrap p-2">Dinas Pendidikan</td>
                  <td class="text-nowrap p-2"></td>
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