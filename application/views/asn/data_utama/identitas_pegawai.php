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
                            <div class="col-xl-12 col-lg-12 ">
                                <!-- START card -->
                                <div class="card card-transparent">
                                    <div class="card-block">
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
                                        <?php $idpt ? $aksi='ubah' : $aksi='insert' ?>
                                        <?= form_open_multipart('data_utama/update_identitas_pegawai/'.$aksi, 'role="form"', 'novalidate="novalidate"', 'autocomplete="off"');?>
                                            <?php echo $this->session->flashdata('alert');?>
                                            <!-- <div class="alert alert-success">
                                                <strong>Success!</strong> Indicates a successful or positive action.
                                            </div>

                                            <div class="alert alert-info">
                                                <strong>Info!</strong> Indicates a neutral informative change or action.
                                            </div> -->

                                            <?php if(!empty($idpt['status_validasi_modidpt']) && $idpt['status_validasi_modidpt'] == 1): ?>
                                                <div id="alert_sedang_tinjau" class="alert alert-warning">
                                                    <strong>Perhatian!</strong>  Data sementara sedang dalam proses validasi <?= !empty($idpt['validator_modidpt']) ? ($idpt['validator_modidpt']==1 ? 'Tahap 1 (Admin OPD)' : 'Tahap 2 (Admin BKPSDM)')  : '' ?>. Form saat ini masih terkunci dan tidak bisa diedit... 
                                                </div>
                                            <?php endif;?>

                                            <?php if(!empty($idpt['status_validasi_modidpt']) && $idpt['status_validasi_modidpt'] == 0): ?>
                                                <div id="alert_tolak_tinjau" class="alert alert-danger">
                                                    <strong>Gagal validasi <?= !empty($idpt['validator_modidpt']) ? ($idpt['validator_modidpt']==1 ? 'Tahap 1 (Admin OPD)' : 'Tahap 2 (Admin BKPSDM)')  : '' ?>: </strong>Terdapat kesalahan data saat penginputan, mohon untuk mengkoreksi kembali data yang telah dinput... <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#dpt<?= $idpt['nip'] ?>">Lihat list perbaikan <i class="fa fa-arrow-right"></i></button>
                                                </div>
                                            <?php endif;?>
                                            
                                            <div id="form_identitas">
                                                <div class="row clearfix">
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default " aria-required="true">
                                                            <label>Nomor Karpeg</label>
                                                            <input type="text" class="form-control" name="nomor_karpeg" <?= !empty($idpt['nokarpeg']) ? 'value="'.$idpt['nokarpeg'].'"' : (!empty($idp['nokarpeg']) ? 'value="'.$idp['nokarpeg'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default ">
                                                            <label>Nomor KTP</label>
                                                            <input type="text" class="form-control" name="nomor_ktp" <?= !empty($idpt['noktp']) ? 'value="'.$idpt['noktp'].'"' : (!empty($idp['noktp']) ? 'value="'.$idp['noktp'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default " aria-required="true">
                                                            <label>Nomor NPWP</label>
                                                            <input type="text" class="form-control" name="nomor_npwp" required="" <?= !empty($idpt['nonpwp']) ? 'value="'.$idpt['nonpwp'].'"' : (!empty($idp['nonpwp']) ? 'value="'.$idp['nonpwp'].'"' : 'value="'.null.'" placeholder="-"') ?> id="npwp">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default ">
                                                            <label>Nomor Arsip</label>
                                                            <input type="text" class="form-control" name="nomor_arsip" <?= !empty($idpt['noarsip']) ? 'value="'.$idpt['noarsip'].'"' : (!empty($idp['noarsip']) ? 'value="'.$idp['noarsip'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default" aria-required="true">
                                                            <label>Nomor NUPTK</label>
                                                            <input type="text" class="form-control" name="nomor_nuptk" <?=!empty($idpt['nonuptks']) ? 'value="'.$idpt['nonuptk'].'"' : (!empty($idp['nonuptk']) ? 'value="'.$idp['nonuptk'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default">
                                                            <label>Nomor Registrasi Guru</label>
                                                            <input type="text" class="form-control" name="noreg_guru" <?= !empty($idpt['noregguru']) ? 'value="'.$idpt['noregguru'].'"' : (!empty($idp['noregguru']) ? 'value="'.$idp['noregguru'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                        </div>
                                                    </div>                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default">
                                                            <label>Nomor BPJS</label>
                                                            <input type="text" class="form-control" name="nomor_bpjs" <?=!empty($idpt['nobpjs']) ? 'value="'.$idpt['nobpjs'].'"' : (!empty($idp['nobpjs']) ? 'value="'.$idp['nobpjs'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default">
                                                            <label>Nomor Taspen</label>
                                                            <input type="text" class="form-control" name="nomor_taspen" <?= !empty($idpt['notaspen']) ? 'value="'.$idpt['notaspen'].'"' : (!empty($idp['notaspen']) ? 'value="'.$idp['notaspen'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default">
                                                            <label>Nomor Karis/Karsu</label>
                                                            <input type="text" class="form-control" name="karis_karsu" <?= !empty($idpt['nokariskarsu']) ? 'value="'.$idpt['nokariskarsu'].'"' : (!empty($idp['nokariskarsu']) ? 'value="'.$idp['nokariskarsu'].'"' : 'value="'.null.'" placeholder="-"') ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default form-group-default-select2 ">
                                                            <label class="">Pemanfaatan Tapera</label>
                                                            <select name="tapera" class="full-width" data-init-plugin="select2">
                                                                <?php if(!empty($idpt['nip'])):  ?>
                                                                    <?php if(!empty($idpt['bapetarum'])): ?>
                                                                        <?php if($idpt['status_validasi_modidpt'] > 0):  ?>
                                                                            <option value="<?= $idpt['bapetarum'] ?>"><?= $idpt['bapetarum']==1 ? 'Sudah' : 'Belum' ?></option>
                                                                        <?php else:?>
                                                                            <option value="">-- Pilih --</option>
                                                                            <option value="1" <?= $idpt['bapetarum']==1 ? 'selected' : '' ?>>Sudah</option>
                                                                            <option value="2" <?= $idpt['bapetarum']==2 ? 'selected' : '' ?>>Belum</option>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <?php if($idpt['status_validasi_modidpt'] > 0):  ?>
                                                                            <option value="<?= !empty($idp['bapetarum']) ? $idp['bapetarum'] : null ?>"><?= !empty($idp['bapetarum']) ? ($idp['bapetarum']==1 ? 'Sudah' : 'Belum') : '-- Pilih --' ?></option>
                                                                        <?php else:?>
                                                                            <option value="">-- Pilih --</option>
                                                                            <option value="1" <?= !empty($idp['bapetarum']) && $idp['bapetarum']==1 ? 'selected' : '' ?>>Sudah</option>
                                                                            <option value="2" <?= !empty($idp['bapetarum']) && $idp['bapetarum']==2 ? 'selected' : '' ?>>Belum</option>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <option value="">-- Pilih --</option>
                                                                    <option value="1" <?= !empty($idp['bapetarum']) && $idp['bapetarum']==1 ? 'selected' : '' ?>>Sudah</option>
                                                                    <option value="2" <?= !empty($idp['bapetarum']) && $idp['bapetarum']==2 ? 'selected' : '' ?>>Belum</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default form-group-default-select2 ">
                                                            <label class="">Kepemilikan KPE</label>
                                                            <select name="kepemilikasn_kpe" class="full-width" data-init-plugin="select2">
                                                                <?php if(!empty($idpt['nip'])):  ?>
                                                                    <?php if(!empty($idpt['kepemilikan_kpe'])): ?>
                                                                        <?php if($idpt['status_validasi_modidpt'] > 0):  ?>
                                                                            <option value="<?= $idpt['kepemilikan_kpe'] ?>"><?= $idpt['kepemilikan_kpe']==1 ? 'Ya' : 'Tidak' ?></option>
                                                                        <?php else:?>
                                                                            <option value="">-- Pilih --</option>
                                                                            <option value="1" <?= $idpt['kepemilikan_kpe']==1 ? 'selected' : '' ?>>Ya</option>
                                                                            <option value="2" <?= $idpt['kepemilikan_kpe']==2 ? 'selected' : '' ?>>Tidak</option>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <?php if($idpt['status_validasi_modidpt'] > 0):  ?>
                                                                            <option value="<?= !empty($idp['kepemilikan_kpe']) ? $idp['kepemilikan_kpe'] : null ?>"><?= !empty($idp['kepemilikan_kpe']) ? ($idp['kepemilikan_kpe']==1 ? 'Ya' : 'Tidak') : '-- Pilih --' ?></option>
                                                                        <?php else:?>
                                                                            <option value="">-- Pilih --</option>
                                                                            <option value="1" <?= !empty($idp['kepemilikan_kpe']) && $idp['kepemilikan_kpe']==1 ? 'selected' : '' ?>>Ya</option>
                                                                            <option value="2" <?= !empty($idp['kepemilikan_kpe']) && $idp['kepemilikan_kpe']==2 ? 'selected' : '' ?>>Tidak</option>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <option value="">-- Pilih --</option>
                                                                    <option value="1" <?= !empty($idp['kepemilikan_kpe']) && $idp['kepemilikan_kpe']==1 ? 'selected' : '' ?>>Ya</option>
                                                                    <option value="2" <?= !empty($idp['kepemilikan_kpe']) && $idp['kepemilikan_kpe']==2 ? 'selected' : '' ?>>Tidak</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group form-group-default form-group-default-select2 ">
                                                            <label class="">Status Sertifikasi</label>
                                                            <select name="status_sertifikasi" class="full-width" data-init-plugin="select2">
                                                                <?php if(!empty($idpt['nip'])):  ?>
                                                                    <?php if(!empty($idpt['status_sertifikasi'])): ?>
                                                                        <?php if($idpt['status_validasi_modidpt'] > 0):  ?>
                                                                            <option value="<?= $idpt['status_sertifikasi'] ?>"><?= $idpt['status_sertifikasi']==1 ? 'Ya' : 'Tidak' ?></option>
                                                                        <?php else:?>
                                                                            <option value="">-- Pilih --</option>
                                                                            <option value="1" <?= $idpt['status_sertifikasi']==1 ? 'selected' : '' ?>>Ya</option>
                                                                            <option value="2" <?= $idpt['status_sertifikasi']==2 ? 'selected' : '' ?>>Tidak</option>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <?php if($idpt['status_validasi_modidpt'] > 0):  ?>
                                                                            <option value="<?= !empty($idp['status_sertifikasi']) ? $idp['status_sertifikasi'] : null ?>"><?= !empty($idp['status_sertifikasi']) ? ($idp['status_sertifikasi']==1 ? 'Ya' : 'Tidak') : '-- Pilih --' ?></option>
                                                                        <?php else:?>
                                                                            <option value="">-- Pilih --</option>
                                                                            <option value="1" <?= !empty($idp['status_sertifikasi']) && $idp['status_sertifikasi']==1 ? 'selected' : '' ?>>Ya</option>
                                                                            <option value="2" <?= !empty($idp['status_sertifikasi']) && $idp['status_sertifikasi']==2 ? 'selected' : '' ?>>Tidak</option>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <option value="">-- Pilih --</option>
                                                                    <option value="1" <?= !empty($idp['status_sertifikasi']) && $idp['status_sertifikasi']==1 ? 'selected' : '' ?>>Ya</option>
                                                                    <option value="2" <?= !empty($idp['status_sertifikasi']) && $idp['status_sertifikasi']==2 ? 'selected' : '' ?>>Tidak</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-default form-group-default-select2 ">
                                                            <label class="">Jenis Pegawai</label>
                                                            <select name="jenis_pegawai" class="full-width" data-init-plugin="select2">
                                                                <?php if(!empty($idpt['nip'])):  ?>
                                                                    <?php if(!empty($idpt['jenis_pegawai_id'])): ?>
                                                                        <?php if($idpt['status_validasi_modidpt'] > 0):  ?>
                                                                            <option value="<?= $idpt['jenis_pegawai_id'] ?>"><?= $kvpegawai[$idpt['jenis_pegawai_id']]  ?></option>
                                                                        <?php else:?>
                                                                            <option value="">-- Pilih --</option>
                                                                            <?php foreach ($jpegawai as $j): ?>
                                                                                <option value="<?= $j['id_jenis_pegawai'] ?>" <?= $idpt['jenis_pegawai_id'] == $j['id_jenis_pegawai'] ? 'selected' : ''; ?>><?= $j['jenis_pegawai'] ?></option>
                                                                            <?php endforeach; ?>
                                                                        <?php endif; ?>
                                                                    <?php else:?>
                                                                        <?php if($idpt['status_validasi_modidpt'] > 0):  ?>
                                                                            <option value="<?= $idp['jenis_pegawai_id'] ?>"><?= $kvpegawai[$idp['jenis_pegawai_id']]  ?></option>
                                                                        <?php else:?>
                                                                            <option value="">-- Pilih --</option>
                                                                            <?php foreach ($jpegawai as $j): ?>
                                                                                <option value="<?= $j['id_jenis_pegawai'] ?>" <?= $idp['jenis_pegawai_id'] == $j['id_jenis_pegawai'] ? 'selected' : ''; ?>><?= $j['jenis_pegawai'] ?></option>
                                                                            <?php endforeach; ?>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <option value="">-- Pilih --</option>
                                                                    <?php foreach ($jpegawai as $j): ?>
                                                                        <option value="<?= $j['id_jenis_pegawai'] ?>" <?= !empty($idp['jenis_pegawai_id']) && $idp['jenis_pegawai_id'] == $j['id_jenis_pegawai'] ? 'selected' : ''; ?>><?= $j['jenis_pegawai'] ?></option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-default form-group-default-select2 ">
                                                            <label class="">Status PNS</label>
                                                            <select id="status_pegawai" name="status_pegawai" class="full-width" data-init-plugin="select2" onchange="getKedudukan($(this).val())">
                                                                <?php if(!empty($idpt['nip'])):  ?>
                                                                    <?php if(!empty($idpt['status_pegawai'])): ?>
                                                                        <?php if($idpt['status_validasi_modidpt'] > 0):  ?>
                                                                            <option value="<?= $idpt['status_pegawai'] ?>"><?= $idpt['status_pegawai']==1 ? 'Ya' : 'Tidak' ?></option>
                                                                        <?php else:?>
                                                                            <option value="">-- Pilih --</option>
                                                                            <option value="1" <?= $idpt['status_pegawai']==1 ? 'selected' : '' ?>>Ya</option>
                                                                            <option value="2" <?= $idpt['status_pegawai']==2 ? 'selected' : '' ?>>Tidak</option>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <?php if($idpt['status_validasi_modidpt'] > 0):  ?>
                                                                            <option value="<?= !empty($idp['status_pegawai']) ? $idp['status_pegawai'] : null ?>"><?= !empty($idp['status_pegawai']) ? ($idp['status_pegawai']==1 ? 'Ya' : 'Tidak') : '-- Pilih --' ?></option>
                                                                        <?php else:?>
                                                                            <option value="">-- Pilih --</option>
                                                                            <option value="1" <?= !empty($idp['status_pegawai']) && $idp['status_pegawai']==1 ? 'selected' : '' ?>>Ya</option>
                                                                            <option value="2" <?= !empty($idp['status_pegawai']) && $idp['status_pegawai']==2 ? 'selected' : '' ?>>Tidak</option>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <option value="">-- Pilih --</option>
                                                                    <option value="1" <?= !empty($idp['status_pegawai']) && $idp['status_pegawai']==1 ? 'selected' : '' ?>>Aktif</option>
                                                                    <option value="2" <?= !empty($idp['status_pegawai']) && $idp['status_pegawai']==2 ? 'selected' : '' ?>>Tidak Aktif</option>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default form-group-default-select2 ">
                                                            <label class="">Keterangan Status</label>
                                                            <select id="kedudukan" name="kedudukan" class="full-width" data-init-plugin="select2">
                                                                <?php if(!empty($idpt['nip'])):  ?>
                                                                    <?php if(!empty($idpt['kedudukan_id'])): ?>
                                                                        <?php if($idpt['status_validasi_modidpt'] > 0):  ?>
                                                                            <option value="<?= $idpt['kedudukan_id'] ?>"><?= $kvkedudukan[$idpt['kedudukan_id']]  ?></option>
                                                                        <?php else:?>
                                                                            <option value="">-- Pilih --</option>
                                                                            <?php foreach ($kedudukan as $kd): ?>
                                                                                <option value="<?= $kd['id_kedudukan'] ?>" <?= $idpt['kedudukan_id'] == $kd['id_kedudukan'] ? 'selected' : ''; ?>><?= $kd['nm_kedudukan'] ?></option>
                                                                            <?php endforeach; ?>
                                                                        <?php endif; ?>
                                                                    <?php else:?>
                                                                        <?php if($idpt['status_validasi_modidpt'] > 0):  ?>
                                                                            <option value="<?= $idp['kedudukan_id'] ?>"><?= $kvkedudukan[$idp['kedudukan_id']]  ?></option>
                                                                        <?php else:?>
                                                                            <option value="">-- Pilih --</option>
                                                                            <?php foreach ($kedudukan as $kd): ?>
                                                                                <option value="<?= $kd['id_kedudukan'] ?>" <?= $idp['kedudukan_id'] == $kd['id_kedudukan'] ? 'selected' : ''; ?>><?= $kd['nm_kedudukan'] ?></option>
                                                                            <?php endforeach; ?>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <optgroup label="<?= $idp['status_pegawai']==1 ? 'Aktif':'Tidak Aktif'; ?>">
                                                                        <?php foreach ($kedudukan as $kd): ?>
                                                                            <?php if($kd['status_kedudukan'] == $idp['status_pegawai']): ?>
                                                                                <option value="<?= $kd['id_kedudukan'] ?>" <?= !empty($idp['kedudukan_id']) && $idp['kedudukan_id'] == $kd['id_kedudukan'] ? 'selected' : '' ?>><?= $kd['nm_kedudukan'] ?></option>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; ?>
                                                                    </optgroup>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="sk" class="row" <?= !empty($idpt['status_pegawai']) && $idpt['status_pegawai']==2  ? '' : (!empty($idp['status_pegawai']) && $idp['status_pegawai']==2 ? '': 'hidden') ?>>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Nomor SK</label>
                                                            <input type="text" class="form-control" <?= !empty($idpt['no_statuspns']) && !empty($idpt['no_statuspns']) ? 'value="'.$idpt['no_statuspns'].'"' : (!empty($idp['no_statuspns']) && !empty($idp['no_statuspns']) ? 'value="'.$idp['no_statuspns'].'"' : 'value="'.null.'" placeholder="-"') ?> <?= !empty($idpt['status_pegawai']) && $idpt['status_pegawai']==2 ? 'name="nomor_sk_statuspns"' : (!empty($idp['status_pegawai']) && $idp['status_pegawai']==2 ? 'name="nomor_sk_statuspns"' : '') ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-default input-group col-md-12">
                                                            <div class="form-input-group">
                                                                <label>Tanggal SK</label>
                                                                <input type="text"  class="form-control" id="datepicker-component2" <?= !empty($idpt['status_pegawai']) && $idpt['status_pegawai']==2 ? 'name="tanggal_sk_statuspns"' : (!empty($idp['status_pegawai']) && $idp['status_pegawai']==2 ? 'name="tanggal_sk_statuspns"' : '') ?>
                                                                    
                                                                        <?php 
                                                                            if(!empty($idpt['tglsk_statuspns'])):
                                                                                if(!empty($idpt['tglsk_statuspns'])):echo 'value="'.date('d-m-Y', strtotime($idpt['tglsk_statuspns'])).'"';else: echo 'placeholder="-"';endif;
                                                                            else: 
                                                                                if(!empty($idp['tglsk_statuspns'])):echo 'value="'.date('d-m-Y', strtotime($idp['tglsk_statuspns'])).'"';else: echo 'placeholder="-"';endif; 
                                                                            endif;
                                                                        ?>
                                                                    >
                                                            </div>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group form-group-default input-group col-md-12">
                                                            <div class="form-input-group">
                                                                <label>TMT SK</label>
                                                                <input type="text"  class="form-control" id="datepicker-component2" <?= !empty($idpt['nip']) && $idpt['status_pegawai']==2 ? 'name="tmt_sk_statuspns"' : (!empty($idp['nip']) && $idp['status_pegawai']==2 ? 'name="tmt_sk_statuspns"' : '') ?>
                                                                    <?php 
                                                                        if(!empty($idpt['tmt_statuspns'])):
                                                                            if(!empty($idpt['tmt_statuspns'])):echo 'value="'.date('d-m-Y', strtotime($idpt['tmt_statuspns'])).'"';else: echo 'placeholder="-"'; endif;
                                                                        else: 
                                                                            if(!empty($idp['tmt_statuspns'])):echo 'value="'.date('d-m-Y', strtotime($idp['tmt_statuspns'])).'"';else: echo 'placeholder="-"'; endif; 
                                                                        endif;
                                                                    ?> >
                                                            </div>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group form-group-default ">
                                                            <label>File Karpeg <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                            <p><i><?= !empty($idpt['file_karpeg']) && file_exists('assets/asn/dokumen/arsip/'.$idpt['file_karpeg']) ? $idpt['file_karpeg'] : (!empty($idp['file_karpeg']) && file_exists('assets/asn/dokumen/arsip/'.$idp['file_karpeg']) ? $idp['file_karpeg'] : 'Belum ada File karpeg') ?></i></p>
                                                            <input type="file" class="form-control-file" name="karpeg">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group form-group-default ">
                                                            <label>File NPWP <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                            <p><i><?= !empty($idpt['file_npwp']) && file_exists('assets/asn/dokumen/arsip/'.$idpt['file_karpeg']) ? $idpt['file_npwp'] : (!empty($idp['file_npwp'])  && file_exists('assets/asn/dokumen/arsip/'.$idp['file_karpeg']) ? $idp['file_npwp'] : 'Belum ada File npwp') ?></i></p>
                                                            <input type="file" class="form-control-file" name="npwp">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group form-group-default ">
                                                            <label>File NUPTK <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                            <p><i><?= !empty($idpt['file_nuptk']) && file_exists('assets/asn/dokumen/arsip/'.$idpt['file_nuptk']) ? $idpt['file_nuptk'] : (!empty($idp['file_nuptk']) && file_exists('assets/asn/dokumen/arsip/'.$idp['file_nuptk']) ? $idp['file_nuptk'] : 'Belum ada File NUPTK') ?></i></p>
                                                            <input type="file" class="form-control-file" name="nuptk">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group form-group-default ">
                                                            <label>File BPJS <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                            <p><i><?= !empty($idpt['file_bpjs']) && file_exists('assets/asn/dokumen/arsip/'.$idpt['file_bpjs']) ? $idpt['file_bpjs'] : (!empty($idp['file_bpjs']) && file_exists('assets/asn/dokumen/arsip/'.$idp['file_bpjs']) ? $idp['file_bpjs'] : 'Belum ada File BPJS') ?></i></p>
                                                            <input type="file" class="form-control-file" name="bpjs">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group form-group-default ">
                                                            <label>File Taspen <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                            <p><i><?= !empty($idpt['file_taspen']) && file_exists('assets/asn/dokumen/arsip/'.$idpt['file_taspen']) ? $idpt['file_taspen'] : (!empty($idp['file_taspen']) && file_exists('assets/asn/dokumen/arsip/'.$idp['file_taspen']) ? $idp['file_taspen'] : 'Belum ada File Taspen') ?></i></p>
                                                            <input type="file" class="form-control-file" name="taspen">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group form-group-default ">
                                                            <label>File Kariskarsu <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                            <p><i><?= !empty($idpt['file_kariskarsu'])&& file_exists('assets/asn/dokumen/arsip/'.$idpt['file_kariskarsu']) ? $idpt['file_kariskarsu'] : (!empty($idp['file_kariskarsu'])&& file_exists('assets/asn/dokumen/arsip/'.$idp['file_kariskarsu']) ? $idp['file_kariskarsu'] : 'Belum ada File Kariskarsu') ?></i></p>
                                                            <input type="file" class="form-control-file" name="kariskarsu">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group form-group-default ">
                                                            <label>File KPE <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                            <p><i><?= !empty($idpt['file_kpe']) && file_exists('assets/asn/dokumen/arsip/'.$idpt['file_kpe']) ? $idpt['file_kpe'] : (!empty($idp['file_kpe']) && file_exists('assets/asn/dokumen/arsip/'.$idp['file_kpe']) ? $idp['file_kpe'] : 'Belum ada File KPE') ?></i></p>
                                                            <input type="file" class="form-control-file" name="kpe">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-lg-4">
                                                        <div class="form-group form-group-default ">
                                                            <label>File Tapera <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                            <p><i><?= !empty($idpt['file_tapera']) && file_exists('assets/asn/dokumen/arsip/'.$idpt['file_tapera']) ? $idpt['file_tapera'] : (!empty($idp['file_tapera']) && file_exists('assets/asn/dokumen/arsip/'.$idpt['file_tapera']) ? $idp['file_tapera'] : 'Belum ada File Tapera') ?></i></p>
                                                            <input type="file" class="form-control-file" name="tapera">
                                                        </div>
                                                    </div> -->
                                                    <div class="col-lg-4">
                                                        <div class="form-group form-group-default ">
                                                            <label>File Sertikasi <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                            <p><i><?= !empty($idpt['file_sertifikasi']) && file_exists('assets/asn/dokumen/arsip/'.$idpt['file_sertifikasi']) ? $idpt['file_sertifikasi'] : (!empty($idp['file_sertifikasi']) && file_exists('assets/asn/dokumen/arsip/'.$idp['file_sertifikasi']) ? $idp['file_sertifikasi'] : 'Belum ada File Sertikasi') ?></i></p>
                                                            <input type="file" class="form-control-file" name="sertifikasi">
                                                        </div>
                                                    </div>
                                                    <div id="skfile" class="col-lg-4" <?= !empty($idpt['status_pegawai']) && $idpt['status_pegawai']==2  ? '' : (!empty($idp['status_pegawai']) && $idp['status_pegawai']==2 ? '': 'hidden') ?>>
                                                        <div class="form-group form-group-default" >
                                                            <label>File SK PNS Non Aktif <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                            <p><i><?= !empty($idpt['file_sk_pnsnonaktif']) && file_exists('assets/asn/dokumen/arsip/'.$idpt['file_sk_pnsnonaktif']) ? $idpt['file_sk_pnsnonaktif'] : (!empty($idp['file_sk_pnsnonaktif']) && file_exists('assets/asn/dokumen/arsip/'.$idp['file_sk_pnsnonaktif']) ? $idp['file_sk_pnsnonaktif'] : 'Belum ada File SK PNS Non Aktif') ?></i></p>
                                                            <input type="file" class="form-control-file" name="sk_pnsnonaktif">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <p class="pull-right">
                                                    <a href="#">Help? Contact Support</a>
                                                </p> -->
                                                <div class="clearfix"></div>
                                                <button id="form_idp" class="btn btn-success btn-block btn-lg" <?= !empty($idpt['status_validasi_modidpt']) && $idpt['status_validasi_modidpt']==1 ? 'data-toggle="modal" data-target="#edit'.$idpt['nip'].'"':'' ?> type="submit">Update</button>
                                            </div>
                                        <?= form_close(); ?>
                                        <?php if(!empty($idpt['nip'])): ?>
                                        <!-- MODAL -->
                                        <div class="modal fade slide-up disable-scroll" id="dpt<?= $idpt['nip'] ?>" tabindex="-1" role="dialog" aria-hidden="false">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content-wrapper">
                                                    <div class="modal-content" style="background-color: #e2e2e2;">
                                                        <div class="modal-body text-center m-t-20">
                                                            <h6 class="no-margin p-b-10"><b>Keterangan Validasi : </b> <?= $idpt['ket_validasi_modidpt'] ?></h6>
                                                            <button type="button" class="btn btn-xs btn-success btn-cons" data-dismiss="modal">Tutup</button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                        </div>

                                        <div class="modal fade slide-up disable-scroll" id="edit<?= $idpt['nip'] ?>" tabindex="-1" role="dialog" aria-hidden="false">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content-wrapper">
                                                    <div class="modal-content" style="background-color: #e2e2e2;">
                                                        <div class="modal-body text-center m-t-20">
                                                            <h6 class="no-margin p-b-10">Data sementara dalam proses validasi tahap <?= $idpt['validator_modidpt'] ?>, Data tdiak bisa diedit</h6>
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
                                <!-- END card -->
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
            $('input[name="tanggal_sk_statuspns"]').mask("99-99-9999");
            $('input[name="tmt_sk_statuspns"]').mask("99-99-9999");
            $("#npwp").mask("99.999.999.9-999.999");
        });

        function getKedudukan(status){
            $.ajax({
                url : "<?= base_url();?>get_data/get_statuskedudukan",
                method : "POST",
                data : {status: status},
                dataType : 'json',
                success : function(data){
                    var html;
                    var i;
                    if(status == 1){
                        html += '<option value="">-- Pilih --</option>';
                        html += '<optgroup label="Aktif">';
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i].id_kedudukan+'">'+data[i].nm_kedudukan+'</option>';
                        }
                        html += '</optgroup';
                        $('#sk').prop('hidden', true);
                        $('#sk input').prop('value', null);
                        $('#skfile').prop('hidden', true);
                        $('#skfile inpu').prop('value', null);

                    }
                    if(status == 2){
                        html += '<option value="">-- Pilih --</option>';
                        html += '<optgroup label="Tidak Aktif">';
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i].id_kedudukan+'">'+data[i].nm_kedudukan+'</option>';
                        }
                        html += '</optgroup';
                        $('#sk').prop('hidden', false);
                        $('#skfile').prop('hidden', false);
                    }
                    $('#kedudukan').html(html);
                }
            });
        };

        
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            if(<?= count($idpt) ?>){
                
                if(<?= $idpt['status_validasi_modidpt'] ?> > 0){
                    $('#form_identitas input').prop('readonly', true);
                    // $('#form_identitas select').prop('disabled', true);
                    $('#form_idp').attr('type', 'button');
                }else{
                    $('#form_identitas input').prop('readonly', false);
                    // $('#form_identitas select').prop('disabled', false);
                    $('#form_idp').attr('type', 'submit');
                }
            }else{
                $('#form_identitas input').prop('readonly', false);
                // $('#form_identitas select').prop('disabled', true);
                $('#form_idp').attr('type', 'submit');
            }
            
        });
    </script>
</body>

</html>