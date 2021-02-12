<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('asn/include/metadata'); ?>

    <link href="<?= base_url(); ?>assets/asn/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/asn/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/asn/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/asn/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/asn/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/asn/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/asn/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">
    <link href="<?= base_url(); ?>assets/asn/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen">
    <link href="<?= base_url(); ?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="<?= base_url(); ?>assets/pages/css/themes/corporate.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
      .form-group {
          margin-bottom:10px;
      }
    </style>
</head>

<body class="fixed-header menu-pin">
    <!-- BEGIN SIDEBPANEL-->
    <?php $this->load->view('asn/include/nav'); ?>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->
    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
        <!-- START HEADER -->
        <?php $this->load->view('asn/include/header'); ?>
        <!-- END HEADER -->
        <!-- START PAGE CONTENT WRAPPER -->
        <div class="page-content-wrapper ">
            <!-- START PAGE CONTENT -->
            <div class="content ">
                <!-- START JUMBOTRON -->
                <?php $this->load->view('asn/include/breadcrumb'); ?>
                <!-- END JUMBOTRON -->
                <!-- START CONTAINER FLUID -->
                <div class=" container-fluid w-100  container-fixed-lg">
                    <!-- BEGIN PlACE PAGE CONTENT HERE -->
                    <center><h5><?= strtoupper(str_replace('_', ' ', $this->uri->segment(2)));?></h5></center>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 p-4">
                            <?php echo $this->session->flashdata('alert');?>
                            <!-- <div class="alert alert-success">
                                <strong>Success!</strong> Indicates a successful or positive action.
                            </div>

                            <div class="alert alert-info">
                                <strong>Info!</strong> Indicates a neutral informative change or action.
                            </div> -->
                            
                            <?php if(isset($dpt['nip']) && $dpt['status_validasi_moddp'] == 1): ?>
                                <div id="alert_sedang_tinjau" class="alert alert-warning">
                                    <strong>Perhatian!</strong>  Data sementara sedang dalam proses validasi <?= !empty($dpt['validator_moddp']) ? ($dpt['validator_moddp']==1 ? 'Tahap 1 (Admin OPD)' : 'Tahap 2 (Admin BKPSDM)')  : '' ?>. Form saat ini masih terkunci dan tidak bisa diedit... 
                                </div>
                            <?php endif;?>

                            <?php if(isset($dpt['nip']) && $dpt['status_validasi_moddp'] == 0): ?>
                                <div id="alert_tolak_tinjau" class="alert alert-danger">
                                    <strong>Gagal validasi <?= !empty($dpt['validator_moddp']) ? ($dpt['validator_moddp']==1 ? 'Tahap 1 (Admin OPD)' : 'Tahap 2 (Admin BKPSDM)')  : '' ?> : </strong>Terdapat kesalahan data saat penginputan, mohon untuk mengkoreksi kembali data yang telah dinput... <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#dp<?= $dpt['nip'] ?>">Lihat list perbaikan <i class="fa fa-arrow-right"></i></button>
                                </div>
                            <?php endif;?>

                            <?php $dpt ? $aksi='ubah' : $aksi='insert' ?>
                            <?= form_open_multipart('data_utama/update_data_pribadi/'.$aksi, 'role="form"', 'novalidate="novalidate"', 'autocomplete="off"');?>
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 text-center">
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="form-group form-group-default text-wrap">
                                                    <label>Foto <small class="text-danger">[jpg/jpeg | Max 100Kb]</small></label>
                                                    <?php if($dpt): ?>
                                                        <?php if(!empty($dpt['foto']) && file_exists('assets/asn/img/profiles/'.$dpt['foto'])): ?>
                                                            <img id="output" src="<?= base_url('assets/asn/img/profiles/'.$dpt['foto']);?>" class="img-fluid m-b-10" alt="">
                                                        <?php else: ?>
                                                            <?php if(isset($dp['foto']) && file_exists('assets/asn/img/profiles/'.$dp['foto'])): ?>
                                                                <img id="output" src="<?= base_url('assets/asn/img/profiles/'.$dp['foto']);?>" class="img-fluid m-b-10" alt="">
                                                            <?php else:?>
                                                                <img id="output" src="<?= base_url('assets/img/users.png');?>" class="img-fluid m-b-10" alt="">
                                                                <p><i>Belum ada foto</i></p>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if(isset($dp['foto']) && file_exists('assets/asn/img/profiles/'.$dp['foto'])): ?>
                                                            <img id="output" src="<?= base_url('assets/asn/img/profiles/'.$dp['foto']);?>" class="img-fluid m-b-10" alt="">
                                                        <?php else: ?>
                                                            <img id="output" src="<?= base_url('assets/img/users.png');?>" class="img-fluid m-b-10" alt="">
                                                            <p><i>Belum ada foto</i></p>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <input id="foto_profil" type="file" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" class="form-control-file" name="foto">
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-6">
                                                <div class="form-group form-group-default ">
                                                    <label>KTP <small class="text-danger">[pdf | Max 100Kb]</small></label>
                                                    <p><i>Belum ada KTP</i></p>
                                                    <input type="file" class="form-control-file" name="ktp" required="" aria-required="true">
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9">
                                        <!-- START card -->
                                        <!-- <div class="alert alert-success" role="alert">
                                            <button class="close" data-dismiss="alert"></button>
                                            <strong>Berhasil! </strong>Data berhasil diupdate. Selanjutnya data akan divalidasi oleh admin sebelum diaktifkan.
                                        </div>
                                        <div class="alert alert-danger" role="alert">
                                            <button class="close" data-dismiss="alert"></button>
                                            <strong>Gagal! </strong>Update data gagal. Pastikan jaringan internet anda dalam keadaan lancar dan stabil.
                                        </div>
                                        <div class="alert alert-warning" role="alert">
                                            <button class="close" data-dismiss="alert"></button>
                                            Data sementara masih dalam peninjauan admin. Form saat ini masih terkunci dan tidak bisa diedit.
                                        </div>
                                        <div class="alert alert-danger" role="alert">
                                            <button class="close" data-dismiss="alert"></button>
                                            <strong>Hasil validasi admin: </strong>Terdapat kesalahan data saat penginputan alamat, mohon untuk mengkoreksi kembali data yang telah dinput.
                                        </div> -->
                                        <div id="form_datapribadi">
                                            <div class="row clearfix">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default " aria-required="true">
                                                        <label>Nomor Induk Pegawai</label>
                                                        <input type="text" class="form-control" <?= !empty($dpt['nip']) ? 'value="'.$dpt['nip'].'"' : (!empty($dp['nip']) ? 'value="'.$dp['nip'].'"' : 'value="'.null.'" placeholder="-"') ?> readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default " aria-required="true">
                                                        <label>NIP Lama</label>
                                                        <input type="text" class="form-control" name="nip_lama" <?= !empty($dpt['nip_lama']) ? 'value="'.$dpt['nip_lama'].'"' : (!empty($dp['nip_lama']) ? 'value="'.$dp['nip_lama'].'"' : 'value="'.null.'" placeholder="-"'); ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default " aria-required="true">
                                                        <label>Nama Lengkap</label>
                                                        <input type="text" class="form-control" name="nama" <?= !empty($dpt['nama']) ? 'value="'.$dpt['nama'].'"' : (!empty($dp['nama']) ?  'value="'.$dp['nama'].'"' : 'value="'.null.'" placeholder="-"') ?> readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-default" aria-required="true">
                                                        <label>Gelar Depan</label>
                                                        <input type="text" class="form-control" name="gelar_depan" <?= !empty($dpt['gelardepan']) ? 'value="'.$dpt['gelardepan'].'"' : (!empty($dp['gelardepan']) ? 'value="'.$dp['gelardepan'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-default" aria-required="true">
                                                        <label>Gelar Belakang</label>
                                                        <input type="text" class="form-control" name="gelar_belakang" <?= !empty($dpt['gelarbelakang']) ? 'value="'.$dpt['gelarbelakang'].'"' : (!empty($dp['gelarbelakang']) ? 'value="'.$dp['gelarbelakang'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default " aria-required="true">
                                                        <label>Tempat Lahir</label>
                                                        <input type="text" class="form-control" name="tempat_lahir" <?= !empty($dpt['tempatlahir']) ? 'value="'.$dpt['tempatlahir'].'"' :  (!empty($dp['tempatlahir']) ? 'value="'.$dp['tempatlahir'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default input-group col-md-12">
                                                        <div class="form-input-group">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="text" name="tanggal_lahir" class="form-control" id="datepicker-component2" 
                                                                value="
                                                                        <?php 
                                                                            if(!empty($dpt['tanggallahir'])):
                                                                                if(!empty($dpt['tanggallahir'])) : echo date('d-m-Y', strtotime($dpt['tanggallahir'])); endif;
                                                                            else: 
                                                                                if(!empty($dp['tanggallahir'])) : echo date('d-m-Y', strtotime($dp['tanggallahir'])); endif; 
                                                                            endif;
                                                                        ?>"
                                                                >
                                                        </div>
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default form-group-default-select2 ">
                                                        <label class="">Jenis Kelamin</label>
                                                        <select name="jenis_kelamin" class="full-width" data-init-plugin="select2">
                                                            <?php if(!empty($dpt['nip'])):  ?>
                                                                <?php if(!empty($dpt['kelamin_id'])): ?>
                                                                    <?php if($dpt['status_validasi_moddp'] > 0):  ?>
                                                                        <option value="<?= $dpt['kelamin_id'] ?>"><?= $kvkelamin[$dpt['kelamin_id']]  ?></option>
                                                                    <?php else:?>
                                                                        <option value="">-- Pilih --</option>
                                                                        <?php foreach ($jk as $kl): ?>
                                                                            <option value="<?= $kl['id_kelamin'] ?>" <?= $dpt['kelamin_id'] == $kl['id_kelamin'] ? 'selected' : ''; ?>><?= $kl['nm_kelamin'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                <?php else:?>
                                                                    <?php if($dpt['status_validasi_moddp'] > 0):  ?>
                                                                        <option value="<?= $dp['kelamin_id'] ?>"><?= $kvkelamin[$dp['kelamin_id']]  ?></option>
                                                                    <?php else:?>
                                                                        <option value="">-- Pilih --</option>
                                                                        <?php foreach ($jk as $kl): ?>
                                                                            <option value="<?= $kl['id_kelamin'] ?>" <?= $dp['kelamin_id'] == $kl['id_kelamin'] ? 'selected' : ''; ?>><?= $kl['nm_kelamin'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <option value="">-- Pilih --</option>
                                                                <?php foreach ($jk as $j): ?>
                                                                    <option value="<?= $j['id_kelamin'] ?>" <?= !empty($dp['kelamin_id']) && $dp['kelamin_id'] == $j['id_kelamin'] ? 'selected' : ''; ?>><?= $j['nm_kelamin'] ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default form-group-default-select2 ">
                                                        <label class="">Status Pernikahan</label>
                                                        <select name="status_pernikahan" class="full-width" data-init-plugin="select2">
                                                            <?php if(!empty($dpt['nip'])) :  ?>
                                                                <?php if(!empty($dpt['skawin'])): ?>
                                                                    <?php if($dpt['status_validasi_moddp'] > 0):  ?>
                                                                        <option value="<?= $dpt['skawin'] ?>"><?= $kvsnikah[$dpt['skawin']]  ?></option>
                                                                    <?php else:?>
                                                                        <option value="">-- Pilih --</option>
                                                                        <?php foreach ($snikah as $kw): ?>
                                                                            <option value="<?= $kw['id_skawin'] ?>" <?= $dpt['skawin'] == $kw['id_skawin'] ? 'selected' : ''; ?>><?= $kw['nm_skawin'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                <?php else:?>
                                                                    <?php if($dpt['status_validasi_moddp'] > 0):  ?>
                                                                        <option value="<?= $dp['skawin'] ?>"><?= $kvsnikah[$dp['skawin']]  ?></option>
                                                                    <?php else:?>
                                                                        <option value="">-- Pilih --</option>
                                                                        <?php foreach ($snikah as $kw): ?>
                                                                            <option value="<?= $kw['id_skawin'] ?>" <?= !empty($dp['skawin']) && $dp['skawin'] == $kw['id_skawin'] ? 'selected' : ''; ?>><?= $kw['nm_skawin'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <option value="">-- Pilih --</option>
                                                                <?php foreach ($snikah as $n): ?>
                                                                    <option value="<?= $n['id_skawin'] ?>" <?= !empty($dp['skawin']) && $dp['skawin'] == $n['id_skawin'] ? 'selected' : null; ?>><?= $n['nm_skawin'] ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-group-default form-group-default-select2 ">
                                                        <label class="">Agama</label>
                                                        <select name="agama" class="full-width" data-init-plugin="select2">
                                                            <?php if(!empty($dpt['nip'])) :  ?>
                                                                <?php if(!empty($dpt['agama'])): ?>
                                                                    <?php if($dpt['status_validasi_moddp'] > 0):  ?>
                                                                        <option value="<?= $dpt['agama'] ?>"><?= $kvagama[$dpt['agama']]  ?></option>
                                                                    <?php else:?>
                                                                        <option value="">-- Pilih --</option>
                                                                        <?php foreach ($agama as $a): ?>
                                                                            <option value="<?= $a['id_agama'] ?>" <?= $dpt['agama'] == $a['id_agama'] ? 'selected' : ''; ?>><?= $a['nm_agama'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                <?php else:?>
                                                                    <?php if($dpt['status_validasi_moddp'] > 0):  ?>
                                                                        <option value="<?= $dp['agama'] ?>"><?= $kvagama[$dp['agama']]  ?></option>
                                                                    <?php else:?>
                                                                        <option value="">-- Pilih --</option>
                                                                        <?php foreach ($agama as $a): ?>
                                                                            <option value="<?= $a['id_agama'] ?>" <?= $dp['agama'] == $a['id_agama'] ? 'selected' : ''; ?>><?= $a['nm_agama'] ?></option>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <option value="">-- Pilih --</option>
                                                                <?php foreach ($agama as $a): ?>
                                                                    <option value="<?= $a['id_agama'] ?>" <?= !empty($dp['agama']) && $dp['agama'] == $a['id_agama'] ? 'selected' : ''; ?>><?= $a['nm_agama'] ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default ">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" name="email" <?= !empty($dpt['email']) ? 'value="'.$dpt['email'].'"' : (!empty($dp['email']) ? 'value="'.$dp['email'].'"' : 'value="'.null.'" placeholder="-"'); ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-default ">
                                                        <label>Nomor HP</label>
                                                        <input type="text" class="form-control" name="nomor_hp" <?= !empty($dpt['notlpx']) ? 'value="'.$dpt['notlpx'].'"' : (!empty($dp['notlpx']) ? 'value="'.$dp['notlpx'].'"' : 'value="'.null.'" placeholder="-"') ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-default ">
                                                        <label>Kode POS</label>
                                                        <input type="text" class="form-control" name="kode_pos" <?= !empty($dpt['kodepos']) ? 'value="'.$dpt['kodepos'].'"' : (!empty($dp['kodepos']) ? 'value="'.$dp['kodepos'].'"' : 'value="'.null.'" placeholder="-"') ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default ">
                                                        <label>Alamat</label>
                                                        <input type="text" class="form-control" name="alamat" <?= !empty($dpt['alamat']) ? 'value="'.$dpt['alamat'].'"' : (!empty($dp['alamat']) ? 'value="'.$dp['alamat'].'"' : 'value="'.null.'" placeholder="-"') ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END card -->
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="form-group form-group-default ">
                                                    <label>File KTP <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                    <p><i><?= !empty($dpt['file_ktp']) && file_exists('assets/asn/dokumen/arsip/'.$dpt['file_ktp']) ? $dpt['file_ktp'] : (!empty($dp['file_ktp']) && file_exists('assets/asn/dokumen/arsip/'.$dp['file_ktp']) ? $dp['file_ktp'] : 'Belum ada File KTP') ?></i></p>
                                                    <input type="file" class="form-control-file" name="filektp" ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PLACE PAGE CONTENT HERE -->
                                <p class="pull-left">
                                    Kosongkan form yang tidak ada!
                                </p>
                                <div class="clearfix"></div>
                                <button id="form_dp" class="btn btn-success btn-block btn-lg" <?= !empty($dpt['nip']) && $dpt['status_validasi_moddp']==1 ? 'data-toggle="modal" data-target="#edit'.$dpt['nip'].'"':'' ?> type="submit">Update</button>
                            <?= form_close(); ?>
                            <?php if(!empty($dpt['nip'])): ?>
                            <!-- MODAL -->
                            <div class="modal fade slide-up disable-scroll" id="dp<?= $dpt['nip'] ?>" tabindex="-1" role="dialog" aria-hidden="false">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content-wrapper">
                                        <div class="modal-content" style="background-color: #e2e2e2;">
                                            <div class="modal-body text-center m-t-20">
                                                <h6 class="no-margin p-b-10"><b>Keterangan Validasi : </b> <?= $dpt['ket_validasi_moddp'] ?></h6>
                                                <button type="button" class="btn btn-xs btn-success btn-cons" data-dismiss="modal">Tutup</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                            </div>
                            <div class="modal fade slide-up disable-scroll" id="edit<?= $dpt['nip'] ?>" tabindex="-1" role="dialog" aria-hidden="false">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content-wrapper">
                                        <div class="modal-content" style="background-color: #e2e2e2;">
                                            <div class="modal-body text-center m-t-20">
                                                <h6 class="no-margin p-b-10">Data sementara dalam proses validasi tahap <?= $dpt['validator_moddp'] ?>, Data tdiak bisa diedit</h6>
                                                <button type="button" class="btn btn-xs btn-success btn-cons" data-dismiss="modal">Tutup</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <!-- END CONTAINER FLUID -->
            </div>
            <!-- END PAGE CONTENT -->
            <!-- START COPYRIGHT -->
            <!-- START CONTAINER FLUID -->
            <!-- START CONTAINER FLUID -->
            <?php $this->load->view('asn/include/footer'); ?>
            <!-- END COPYRIGHT -->
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->
    <!-- BEGIN VENDOR JS -->
    <!-- <script src="<?= base_url(); ?>assets/asn/plugins/pace/pace.min.js" type="text/javascript"></script> -->
    <script src="<?= base_url(); ?>assets/asn/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/tether/js/tether.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/asn/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/asn/plugins/classie/classie.js"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/asn/plugins/jquery-autonumeric/autoNumeric.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/asn/plugins/dropzone/dropzone.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/asn/plugins/bootstrap-tag/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/asn/plugins/jquery-inputmask/jquery.inputmask.min.js"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/summernote/js/summernote.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/bootstrap-typehead/typeahead.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/bootstrap-typehead/typeahead.jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/handlebars/handlebars-v4.0.5.js"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?= base_url(); ?>assets/asn/js/form_elements.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/js/scripts.js" type="text/javascript"></script>

    <script type="text/javascript">
      $(function($) {
        $("#datepicker-component2").mask("99-99-9999");
      });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            if(<?= count($dpt) ?> > 0 ){
                if(<?= $dpt['status_validasi_moddp'] ?> > 0){
                    $('#form_datapribadi input').prop('readonly', true);
                    // $('#form_datapribadi select').prop('disabled', true);
                    $('#form_dp').attr('type', 'button');
                    $('#foto_profil').prop('hidden', true);
                }else{
                    $('#form_datapribadi input').prop('readonly', false);
                    // $('#form_datapribadi select').prop('disabled', false);
                    $('#form_dp').attr('type', 'submit');
                    $('#foto_profil').prop('hidden', false);
                }
            }else{
                $('#form_datapribadi input').prop('readonly', false);
                // $('#form_datapribadi select').prop('disabled', true);
                $('#form_dp').attr('type', 'submit');
                $('#foto_profil').prop('hidden', false);
            }
        });
    </script>

    <!-- END PAGE LEVEL JS -->
</body>

</html>