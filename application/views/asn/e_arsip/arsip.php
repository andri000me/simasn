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

    <link href="<?= base_url(); ?>assets/asn/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/asn/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/asn/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />

    <link href="<?= base_url(); ?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="<?= base_url(); ?>assets/pages/css/themes/corporate.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .table tbody tr td {
            /*white-space: nowrap;*/
            padding: 5px 20px;
            border-bottom: 1px solid rgba(225, 225, 226, 0.7);
            border-top: 0px;
        }
        .table thead tr th {
            white-space: nowrap;
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
                <div class=" container-fluid   container-fixed-lg">
                    
                    <!-- BEGIN PlACE PAGE CONTENT HERE -->
                
                    <div class="card card-transparent">
                        <!-- <div class="card-block">
                                    <div class="col-lg-12 p-0">
                                        <?= form_open_multipart('#', 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                            <div class="form-group form-group-default ">
                                                <div class="row">
                                                    <div class="col-lg">
                                                        <label>File Sertifikat <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                        <p><i>Belum ada File Sertifikat</i></p>
                                                        <input type="file" class="form-control-file" name="file_sertifikats">
                                                    </div>
                                                    <div class="col-lg pt-3 text-right">
                                                        <button class="btn btn-success" type="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        <?= form_close(); ?>
                                    </div>
                                     -->
                            <?= $this->session->flashdata('alert') ?>
                            <table class="table table-striped table-hover">
                                <thead class="bg-info-lighter">
                                    <tr>
                                        <!-- <th class="text-black">No. </th> -->
                                        <th class="text-black">Jenis Dokumen</th>
                                        <th class="text-black">Induk Data</th>
                                        <th class="text-black">Status/Nama File</th>
                                        <th class="text-black">Validasi</th>
                                        <th class="text-black text-center">Download/Upload</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                        <!-- <td></td> -->
                                        <td colspan="5">DATA PRIBADI</td>
                                    </tr>
                                    <?php $no=1; foreach($data_pribadi as $d):?>
                                        <tr>
                                            <!-- <td><?= $no++ ?></td> -->
                                            <td><?= ucwords($d['nama_dok']) ?></td>
                                            <td><?= ucwords(str_replace('_',' ',$d['induk_data'])) ?></td>
                                            <td><?= $d['status'] ?></td>
                                            <td class="text-nowrap">
                                                <?php if(!empty($dpt['nip'])):  ?>
                                                    <?php if(!empty($dpt['file_'.$d['nama_dok']])): ?>
                                                        <?php if($dpt['validator_moddp']==1 || $dpt['validator_moddp']==2): ?>
                                                            <small class="<?= $dpt['status_validasi_moddp']==1 ? 'bg-warning':'bg-danger'  ?> text-center text-white p-1 text-nowrap rounded"> 
                                                                <?= $dpt['status_validasi_moddp']==1 ? $d['descvalidasi'] : 'Gagal '.$d['descvalidasi']  ?> 
                                                            </small>
                                                        <?php else:?>
                                                            <small class="bg-danger text-center text-white p-1 text-nowrap rounded"> Ditolak </small>
                                                        <?php endif;?>
                                                    <?php elseif(!empty($dp['file_'.$d['nama_dok']])): ?>
                                                        <small class="bg-success text-center text-white p-1 text-nowrap rounded"> <?=  $d['descvalidasi']  ?> </small>
                                                    <?php else: ?>
                                                        <small class="text-center p-1 text-nowrap rounded"> <?=  $d['descvalidasi']  ?> </small>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if(!empty($dp['file_'.$d['nama_dok']])): ?>
                                                        <small class="bg-success text-center text-white p-1 text-nowrap rounded"> <?=  $d['descvalidasi']  ?> </small>
                                                    <?php else: ?>
                                                        <small class="text-center p-1 text-nowrap rounded"> <?=  $d['descvalidasi']  ?> </small>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if(!empty($dpt['nip'])):  ?>
                                                    <?php if(!empty($dpt['file_'.$d['nama_dok']])): ?>
                                                        <a href="<?= base_url('assets/asn/dokumen/arsip/'.$dpt['file_'.$d['nama_dok']]); ?>" target="_blank" type="button" class="button btn-xs btn-warning">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    <?php elseif(!empty($dp['file_'.$d['nama_dok']])): ?>
                                                        <a href="<?= base_url('assets/asn/dokumen/arsip/'.$dp['file_'.$d['nama_dok']]); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    <?php else: echo '';?>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if(!empty($dp['file_'.$d['nama_dok']])): ?>
                                                        <a href="<?= base_url('assets/asn/dokumen/arsip/'.$dp['file_'.$d['nama_dok']]); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                        
                                                <?php endif; ?>
                                                <a href="#" data-toggle="modal" data-target="<?= '#kartuktp'.$d['nama_dok'].$d['nip'] ?>" type="button" class="button btn-xs btn-danger">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                                <!-- <a href="#" data-toggle="modal" data-target="<?= !empty($dpt['nip']) ? (!empty($dpt['status_validasi_moddp']) && $dpt['status_validasi_moddp']!=0  ? '#msgktp'.$d['nama_dok'].$d['nip'] : '#kartuktp'.$d['nama_dok'].$d['nip']) : '#kartuktp'.$d['nama_dok'].$d['nip'] ?>" type="button" class="button btn-xs btn-danger">
                                                    <i class="fa fa-upload"></i>
                                                </a> -->
                                                
                                                <div class="modal fade" id="kartuktp<?= $d['nama_dok'].$d['nip'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <?= form_open_multipart('e_arsip/update_file_arsip/'.(!empty($dpt['nip']) ? 'ubah' : 'insert').'/'.str_replace('_','',$d['induk_data']).'/'.$d['nama_dok'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                            <div class="modal-content-wrapper">
                                                                <div class="modal-content">
                                                                    <div class="modal-header clearfix text-left">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                                                        </button>
                                                                        <h5>Upload file <b><?= strtoupper($d['nama_dok']) ?></b></h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-default ">
                                                                            <label>File <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                                            <p><i>Belum ada File</i></p>
                                                                            <input type="file" class="form-control-file" name="file_<?= $d['nama_dok'] ?>">
                                                                            <input type="text" name="filetx_<?= $d['nama_dok'] ?>" value="<?= $d['nama_dok'] ?>" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-success btn-cons  pull-left inline">Upload</button>
                                                                        <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?= form_close(); ?>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                
                                                <!-- <div class="modal fade slide-up disable-scroll" id="msgktp<?=$d['nama_dok'].$d['nip']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content-wrapper">
                                                            <div class="modal-content" style="background-color: #e2e2e2;">
                                                                <div class="modal-body text-center m-t-20">
                                                                    <h6 class="no-margin p-b-10">Data sementara dalam proses validasi tahap, Data tdiak bisa diedit</h6>
                                                                    <button type="button" class="btn btn-xs btn-success btn-cons" data-dismiss="modal">Tutup</button>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content --
                                                    </div>
                                                </div> -->
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    <tr>
                                        <!-- <td></td> -->
                                        <td colspan="5">IDENTITAS PEGAWAI</td>
                                    </tr>
                                    <?php $no=1; foreach($identitas as $i):?>
                                        <tr>
                                            <!-- <td><?= $no++ ?></td> -->
                                            <td><?= ucwords($i['nama_dok']) ?></td>
                                            <td><?= ucwords($i['induk_data']) ?></td>
                                            <td><?= $i['status'] ?></td>
                                            <td class="text-nowrap">
                                                <?php if(!empty($idnt['nip'])):  ?>
                                                    <?php if(!empty($idnt['file_'.$i['nama_dok']])): ?>
                                                        <?php if($idnt['validator_modidpt']==1 || $idnt['validator_modidpt']==2): ?>
                                                            <small class="<?= $idnt['status_validasi_modidpt']==1 ? 'bg-warning':'bg-danger'  ?> text-center text-white p-1 text-nowrap rounded"> 
                                                                <?= $idnt['status_validasi_modidpt']==1 ? $i['descvalidasi'] : 'Gagal '.$i['descvalidasi']  ?> 
                                                            </small>
                                                        <?php else:?>
                                                            <small class="bg-danger text-center text-white p-1 text-nowrap rounded"> Ditolak </small>
                                                        <?php endif;?>
                                                    <?php elseif(!empty($idn['file_'.$i['nama_dok']])): ?>
                                                        <small class="bg-success text-center text-white p-1 text-nowrap rounded"> <?=  $i['descvalidasi']  ?> </small>
                                                    <?php else: ?>
                                                        <small class="text-center p-1 text-nowrap rounded"> <?=  $i['descvalidasi']  ?> </small>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if(!empty($idn['file_'.$i['nama_dok']])): ?>
                                                        <small class="bg-success text-center text-white p-1 text-nowrap rounded"> <?=  $i['descvalidasi']  ?> </small>
                                                    <?php else: ?>
                                                        <small class="text-center p-1 text-nowrap rounded"> <?=  $i['descvalidasi']  ?> </small>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if(!empty($idnt['nip'])):  ?>
                                                    <?php if(!empty($idnt['file_'.$i['nama_dok']])): ?>
                                                        <a href="<?= base_url('assets/asn/dokumen/arsip/'.$idnt['file_'.$i['nama_dok']]); ?>" target="_blank" type="button" class="button btn-xs btn-warning">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    <?php elseif(!empty($idn['file_'.$i['nama_dok']])): ?>
                                                        <a href="<?= base_url('assets/asn/dokumen/arsip/'.$idn['file_'.$i['nama_dok']]); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    <?php else: echo '';?>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if(!empty($idn['file_'.$i['nama_dok']])): ?>
                                                        <a href="<?= base_url('assets/asn/dokumen/arsip/'.$idn['file_'.$i['nama_dok']]); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                        
                                                <?php endif; ?>
                                                <a href="#" data-toggle="modal" data-target="<?= '#kartuid'.$i['nama_dok'].$i['nip'] ?>" type="button" class="button btn-xs btn-danger">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                                
                                                <div class="modal fade" id="kartuid<?= $i['nama_dok'].$i['nip'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <?= form_open_multipart('e_arsip/update_file_arsip/'.(!empty($idnt['nip']) ? 'ubah' : 'insert').'/'.$i['induk_data'].'/'.$i['nama_dok'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                            <div class="modal-content-wrapper">
                                                                <div class="modal-content">
                                                                    <div class="modal-header clearfix text-left">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                                                        </button>
                                                                        <h5>Upload file <b><?= strtoupper($i['nama_dok']) ?></b></h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-default ">
                                                                            <label>File <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                                            <p><i>Belum ada File</i></p>
                                                                            <input type="file" class="form-control-file" name="file_<?= $i['nama_dok'] ?>">
                                                                            <input type="text" name="filetx_<?= $i['nama_dok'] ?>" value="<?= $i['nama_dok'] ?>" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-success btn-cons  pull-left inline">Upload</button>
                                                                        <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?= form_close(); ?>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                
                                                <!-- <div class="modal fade slide-up disable-scroll" id="msgid<?=$i['nama_dok'].$i['nip']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content-wrapper">
                                                            <div class="modal-content" style="background-color: #e2e2e2;">
                                                                <div class="modal-body text-center m-t-20">
                                                                    <h6 class="no-margin p-b-10">Data sementara dalam proses validasi tahap, Data tdiak bisa diedit</h6>
                                                                    <button type="button" class="btn btn-xs btn-success btn-cons" data-dismiss="modal">Tutup</button>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- /.modal-content -->
                                                    <!-- </div>
                                                </div> -->
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    <tr>
                                        <!-- <td></td> -->
                                        <td colspan="5">CPNS & PNS</td>
                                    </tr>
                                    <?php $no=1; foreach($cpns as $cp):?>
                                        <tr>
                                            <!-- <td><?= $no++ ?></td> -->
                                            <td><?= strtoupper($cp['nama_dok']).' '.strtoupper($cp['induk_data']) ?></td>
                                            <td><?= strtoupper($cp['induk_data']) ?></td>
                                            <td><?= $cp['status'] ?></td>
                                            <td>
                                                <?php if(!empty($cpnst['nip'])):  ?>
                                                    <?php if(!empty($cpnst['file_'.$cp['nama_dok']])): ?>
                                                        <?php if($cpnst['validator_modcpns']==1 || $cpnst['validator_modcpns']==2): ?>
                                                            <small class="<?= $cpnst['status_validasi_modcpns']==1 ? 'bg-warning':'bg-danger'  ?> text-center text-white p-1 text-nowrap rounded"> 
                                                                <?= $cpnst['status_validasi_modcpns']==1 ? $cp['descvalidasi'] : 'Gagal '.$cp['descvalidasi']  ?> 
                                                            </small>
                                                        <?php else:?>
                                                            <small class="bg-danger text-center text-white p-1 text-nowrap rounded"> Ditolak </small>
                                                        <?php endif;?>
                                                    <?php elseif(!empty($cpnss['file_'.$cp['nama_dok']])): ?>
                                                        <small class="bg-success text-center text-white p-1 text-nowrap rounded"> <?=  $cp['descvalidasi']  ?> </small>
                                                    <?php else: ?>
                                                        <small class="text-center p-1 text-nowrap rounded"> <?=  $cp['descvalidasi']  ?> </small>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if(!empty($cpnss['file_'.$cp['nama_dok']])): ?>
                                                        <small class="bg-success text-center text-white p-1 text-nowrap rounded"> <?=  $cp['descvalidasi']  ?> </small>
                                                    <?php else: ?>
                                                        <small class="text-center p-1 text-nowrap rounded"> <?=  $cp['descvalidasi']  ?> </small>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if(!empty($cpnst['nip'])):  ?>
                                                    <?php if(!empty($cpnst['file_'.$cp['nama_dok']])): ?>
                                                        <a href="<?= base_url('assets/asn/dokumen/arsip/'.$cpnst['file_'.$cp['nama_dok']]); ?>" target="_blank" type="button" class="button btn-xs btn-warning">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    <?php else:
                                                        if(!empty($cpnss['file_'.$cp['nama_dok']])): ?>
                                                            <a href="<?= base_url('assets/asn/dokumen/arsip/'.$cpnss['file_'.$cp['nama_dok']]); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                        <?php else: echo '';?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if(!empty($cpnss['file_'.$cp['nama_dok']])): ?>
                                                        <a href="<?= base_url('assets/asn/dokumen/arsip/'.$cpnss['file_'.$cp['nama_dok']]); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                        
                                                <?php endif; ?>
                                                <a href="#" data-toggle="modal" data-target="<?= '#cpsk'.$cp['nama_dok'].$cp['nip'] ?>" type="button" class="button btn-xs btn-danger">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                                
                                                <div class="modal fade" id="cpsk<?= $cp['nama_dok'].$cp['nip'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <?= form_open_multipart('e_arsip/update_file_arsip/'.(!empty($cpnst['nip']) ? 'ubah' : 'insert').'/'.$cp['induk_data'].'/'.$cp['nama_dok'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                            <div class="modal-content-wrapper">
                                                                <div class="modal-content">
                                                                    <div class="modal-header clearfix text-left">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                                                        </button>
                                                                        <h5>Upload file <b><?= strtoupper($cp['nama_dok']) ?></b></h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-default ">
                                                                            <label>File <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                                            <p><i>Belum ada File</i></p>
                                                                            <input type="file" class="form-control-file" name="file_<?= $cp['nama_dok'] ?>">
                                                                            <input type="text" name="filetx_<?= $cp['nama_dok'] ?>" value="<?= $cp['nama_dok'].'_cpns' ?>" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-success btn-cons  pull-left inline">Upload</button>
                                                                        <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?= form_close(); ?>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    <?php $no=3; foreach($pns as $p):?>
                                        <tr>
                                            <!-- <td><?= $no++ ?></td> -->
                                            <td><?= strtoupper($p['nama_dok']).' '.strtoupper($p['induk_data']) ?></td>
                                            <td><?= strtoupper($p['induk_data']) ?></td>
                                            <td><?= $p['status'] ?></td>
                                            <td>
                                                <?php if(!empty($pnst['nip'])):  ?>
                                                    <?php if(!empty($pnst['file_'.$p['nama_dok']])): ?>
                                                        <?php if($pnst['validator_modpns']==1 || $pnst['validator_modpns']==2): ?>
                                                            <small class="<?= $pnst['status_validasi_modpns']==1 ? 'bg-warning':'bg-danger'  ?> text-center text-white p-1 text-nowrap rounded"> 
                                                                <?= $pnst['status_validasi_modpns']==1 ? $p['descvalidasi'] : 'Gagal '.$p['descvalidasi']  ?> 
                                                            </small>
                                                        <?php else:?>
                                                            <small class="bg-danger text-center text-white p-1 text-nowrap rounded"> Ditolak </small>
                                                        <?php endif;?>
                                                    <?php elseif(!empty($pnss['file_'.$p['nama_dok']])): ?>
                                                        <small class="bg-success text-center text-white p-1 text-nowrap rounded"> <?=  $p['descvalidasi']  ?> </small>
                                                    <?php else: ?>
                                                        <small class="text-center p-1 text-nowrap rounded"> <?=  $p['descvalidasi']  ?> </small>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if(!empty($pnss['file_'.$p['nama_dok']])): ?>
                                                        <small class="bg-success text-center text-white p-1 text-nowrap rounded"> <?=  $p['descvalidasi']  ?> </small>
                                                    <?php else: ?>
                                                        <small class="text-center p-1 text-nowrap rounded"> <?=  $p['descvalidasi']  ?> </small>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if(!empty($pnst['nip'])):  ?>
                                                    <?php if(!empty($pnst['file_'.$p['nama_dok']])): ?>
                                                        <a href="<?= base_url('assets/asn/dokumen/arsip/'.$pnst['file_'.$p['nama_dok']]); ?>" target="_blank" type="button" class="button btn-xs btn-warning">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    <?php else:
                                                        if(!empty($pnss['file_'.$p['nama_dok']])): ?>
                                                            <a href="<?= base_url('assets/asn/dokumen/arsip/'.$pnss['file_'.$p['nama_dok']]); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                                <i class="fa fa-download"></i>
                                                            </a>
                                                        <?php else: echo '';?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if(!empty($pnss['file_'.$p['nama_dok']])): ?>
                                                        <a href="<?= base_url('assets/asn/dokumen/arsip/'.$pnss['file_'.$p['nama_dok']]); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                        
                                                <?php endif; ?>
                                                <a href="#" data-toggle="modal" data-target="<?= '#psk'.$p['nama_dok'].$p['nip'] ?>" type="button" class="button btn-xs btn-danger">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                                
                                                <div class="modal fade" id="psk<?= $p['nama_dok'].$p['nip'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <?= form_open_multipart('e_arsip/update_file_arsip/'.(!empty($pnst['nip']) ? 'ubah' : 'insert').'/'.$p['induk_data'].'/'.$p['nama_dok'], 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                            <div class="modal-content-wrapper">
                                                                <div class="modal-content">
                                                                    <div class="modal-header clearfix text-left">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                                                        </button>
                                                                        <h5>Upload file <b><?= strtoupper($p['nama_dok']) ?></b></h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-default ">
                                                                            <label>File <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                                            <p><i>Belum ada File</i></p>
                                                                            <input type="file" class="form-control-file" name="file_<?= $p['nama_dok'] ?>">
                                                                            <input type="text" name="filetx_<?= $p['nama_dok'] ?>" value="<?= $p['nama_dok'].'_pns' ?>" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-success btn-cons  pull-left inline">Upload</button>
                                                                        <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?= form_close(); ?>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                
                                                <div class="modal fade slide-up disable-scroll" id="msgpsk<?=$p['nama_dok'].$p['nip']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content-wrapper">
                                                            <div class="modal-content" style="background-color: #e2e2e2;">
                                                                <div class="modal-body text-center m-t-20">
                                                                    <h6 class="no-margin p-b-10">Data sementara dalam proses validasi tahap, Data tdiak bisa diedit</h6>
                                                                    <button type="button" class="btn btn-xs btn-success btn-cons" data-dismiss="modal">Tutup</button>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    <tr>
                                        <!-- <td></td> -->
                                        <td colspan="5">DATA RIWAYAT</td>
                                    </tr>
                                    <?php $no=1; foreach($jabatan as $j):?>
                                        <tr>
                                            <!-- <td><?= $no++ ?></td> -->
                                            <td>File SK Jabatan</td>
                                            <td> Jabatan </td>
                                            <td><?= !empty($j['file_sk_jabatan']) && file_exists('assets/asn/dokumen/arsip/'.$j['file_sk_jabatan']) ? $j['file_sk_jabatan'] : 'Belum Ada'; ?></td>
                                            <td class="text-nowrap">
                                                <?php if(!empty($j['file_sk_jabatan']) && file_exists('assets/asn/dokumen/arsip/'.$j['file_sk_jabatan'])): ?>
                                                    <?php if($j['status_aktif'] == 0):  ?>
                                                        <?php if($j['status_validasi_modjabatan'] ==1 ):  ?>
                                                            <small class="bg-warning text-center text-white p-1 text-nowrap rounded"> <?= $j['validator_modjabatan'] == 2 ? 'Tahap Validasi BKPSDM' : 'Tahap Validasi OPD'  ?></small>
                                                        <?php elseif($j['status_validasi_modjabatan'] ==0 ): ?>
                                                            <small class="bg-danger text-center text-white p-1 text-nowrap rounded"><?= $j['validator_modjabatan'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?></small>
                                                        <?php endif; ?>
                                                    <?php elseif($j['status_aktif'] == 1): ?>
                                                        <?php if($j['status_validasi_modjabatan'] ==1 ):  ?>
                                                            <small class="bg-success text-center text-white p-1 text-nowrap rounded"><?= $j['validator_modjabatan'] == 2 ? 'File telah Tervalidasi' : 'Gagal Validasi File'  ?></small>
                                                        <?php elseif($j['status_validasi_modjabatan'] ==0 ): ?>
                                                            <?= $j['validator_modjabatan'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        File Belum Terupload
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    File Belum Terupload
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if(!empty($j['file_sk_jabatan']) && file_exists('assets/asn/dokumen/arsip/'.$j['file_sk_jabatan'])): ?>
                                                    <a href="<?= base_url('assets/asn/dokumen/arsip/'.$j['file_sk_jabatan']); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                <?php endif; ?>
                                                
                                                <a href="#" type="button" class="button btn-xs btn-danger" data-toggle="modal" data-target="#jab<?= $j['id'] ?>">
                                                        <i class="fa fa-upload"></i>
                                                </a>
                                                <div class="modal fade stick-up" id="jab<?= $j['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <?= form_open_multipart('e_arsip/update_filearsip_riwayat/jabatan/sk/'.encrypt_url($j['id']), 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                            <div class="modal-content-wrapper">
                                                                <div class="modal-content">
                                                                    <div class="modal-header clearfix text-left">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                                                        </button>
                                                                        <h5>Upload file SK Jabatan</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-default ">
                                                                            <label>File SK Kredit <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                                            <p><i>Belum ada File SK Kredit</i></p>
                                                                            <input type="file" class="form-control-file" name="file_skjabatan">
                                                                            <input type="text" name="filex_skjabatan" value="<?= !empty($j['sk_tanggal']) ? date('dmy', strtotime($j['sk_tanggal'])) : null ?>" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary btn-cons  pull-left inline">Simpan</button>
                                                                        <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?= form_close(); ?>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>

                                    <?php foreach($pangkat as $p):?>
                                        <tr>
                                            <!-- <td><?= $no++ ?></td> -->
                                            <td>File SK Pangkat</td>
                                            <td> Pangkat </td>
                                            <td><?= !empty($p['file_sk_pangkat'])  && file_exists('assets/asn/dokumen/arsip/'.$p['file_sk_pangkat'])  ? $p['file_sk_pangkat'] : 'Belum Ada'; ?></td>
                                            <td class="text-nowrap">
                                                <?php if(!empty($p['file_sk_pangkat']) && file_exists('assets/asn/dokumen/arsip/'.$p['file_sk_pangkat'])): ?>
                                                    <?php if($p['status_aktif'] == 0):  ?>
                                                        <?php if($p['status_validasi_modpangkat'] ==1 ):  ?>
                                                            <small class="bg-warning text-center text-white p-1 text-nowrap rounded"> <?= $p['validator_modpangkat'] == 2 ? 'Tahap Validasi BKPSDM' : 'Tahap Validasi OPD'  ?></small>
                                                        <?php elseif($p['status_validasi_modpangkat'] ==0 ): ?>
                                                            <small class="bg-danger text-center text-white p-1 text-nowrap rounded"><?= $p['validator_modpangkat'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?></small>
                                                        <?php endif; ?>
                                                    <?php elseif($p['status_aktif'] == 1): ?>
                                                        <?php if($p['status_validasi_modpangkat'] ==1 ):  ?>
                                                            <small class="bg-success text-center text-white p-1 text-nowrap rounded"><?= $p['validator_modpangkat'] == 2 ? 'File telah Tervalidasi' : 'Gagal Validasi File'  ?></small>
                                                        <?php elseif($p['status_validasi_modpangkat'] ==0 ): ?>
                                                            <?= $p['validator_modpangkat'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        File Belum Terupload
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    File Belum Terupload
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if(!empty($p['file_sk_pangkat']) && file_exists('assets/asn/dokumen/arsip/'.$p['file_sk_pangkat'])): ?>
                                                    <a href="<?= base_url('assets/asn/dokumen/arsip/'.$p['file_sk_pangkat']); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="#" type="button" class="button btn-xs btn-danger" data-toggle="modal" data-target="#pak<?= $p['id'] ?>">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                                <div class="modal fade stick-up" id="pak<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <?= form_open_multipart('e_arsip/update_filearsip_riwayat/pangkat/sk/'.encrypt_url($p['id']), 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                            <div class="modal-content-wrapper">
                                                                <div class="modal-content">
                                                                    <div class="modal-header clearfix text-left">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                                                        </button>
                                                                        <h5>Upload file SK Pangkat</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-default ">
                                                                            <label>File SK Kredit <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                                            <p><i>Belum ada File SK Kredit</i></p>
                                                                            <input type="file" class="form-control-file" name="file_skpangkat">
                                                                            <input type="text" name="filex_skpangkat" value="<?= !empty($p['sk_tanggal']) ? date('dmy', strtotime($p['sk_tanggal'])) : null ?>" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary btn-cons  pull-left inline">Simpan</button>
                                                                        <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?= form_close(); ?>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>

                                    <?php foreach($pendidikan as $pd):?>
                                        <tr>
                                            <!-- <td><?= $no++ ?></td> -->
                                            <td>File Ijazah dan Transkript</td>
                                            <td> Pendidikan </td>
                                            <td><?= !empty($pd['file_ijazah_pendidikan']) && file_exists('assets/asn/dokumen/arsip/'.$pd['file_ijazah_pendidikan']) ? $pd['file_ijazah_pendidikan'] : 'Belum Ada'; ?></td>
                                            <td class="text-nowrap">
                                                <?php if(!empty($pd['file_ijazah_pendidikan']) && file_exists('assets/asn/dokumen/arsip/'.$pd['file_ijazah_pendidikan'])): ?>
                                                    <?php if($pd['status_aktif'] == 0):  ?>
                                                        <?php if($pd['status_validasi_modpendidikan'] ==1 ):  ?>
                                                            <small class="bg-warning text-center text-white p-1 text-nowrap rounded"> <?= $pd['validator_modpendidikan'] == 2 ? 'Tahap Validasi BKPSDM' : 'Tahap Validasi OPD'  ?></small>
                                                        <?php elseif($pd['status_validasi_modpendidikan'] ==0 ): ?>
                                                            <small class="bg-danger text-center text-white p-1 text-nowrap rounded"><?= $pd['validator_modpendidikan'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?></small>
                                                        <?php endif; ?>
                                                    <?php elseif( $pd['status_aktif'] == 1): ?>
                                                        <?php if($pd['status_validasi_modpendidikan'] ==1 ):  ?>
                                                            <small class="bg-success text-center text-white p-1 text-nowrap rounded"><?= $pd['validator_modpendidikan'] == 2 ? 'File telah Tervalidasi' : 'Gagal Validasi File'  ?></small>
                                                        <?php elseif($pd['status_validasi_modpendidikan'] ==0 ): ?>
                                                            <?= $pd['validator_modpendidikan'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        File Belum Terupload
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    File Belum Terupload
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if(!empty($pd['file_ijazah_pendidikan']) && file_exists('assets/asn/dokumen/arsip/'.$pd['file_ijazah_pendidikan']) ): ?>
                                                    <a href="<?= base_url('assets/asn/dokumen/arsip/'.$pd['file_ijazah_pendidikan']); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="#" type="button" class="button btn-xs btn-danger" data-toggle="modal" data-target="#edu<?= $pd['id'] ?>">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                                <div class="modal fade stick-up" id="edu<?= $pd['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <?= form_open_multipart('e_arsip/update_filearsip_riwayat/pendidikan/ijazah/'.encrypt_url($pd['id']), 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                            <div class="modal-content-wrapper">
                                                                <div class="modal-content">
                                                                    <div class="modal-header clearfix text-left">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                                                        </button>
                                                                        <h5>Upload file ijazah</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-default ">
                                                                            <label>File Ijazah Pendidikan <small class="text-danger">[pdf | Max 500Kb]</small></label>
                                                                            <p><i>Belum ada File Ijazah Pendidikan</i></p>
                                                                            <input type="file" class="form-control-file" name="file_ijazahpendidikan">
                                                                            <input type="text" name="filex_ijazahpendidikan" value="<?= !empty($pd['jpendidikan_id']) && !empty($pd['tgl_lulus']) ? strtolower(str_replace(' ','',$kjpendidikan[$pd['jpendidikan_id']])).'_'.date('dmy', strtotime($pd['tgl_lulus'])) : null ?>" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary btn-cons  pull-left inline">Simpan</button>
                                                                        <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?= form_close(); ?>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>

                                    <?php foreach($diklat as $dk):?>
                                        <tr>
                                            <!-- <td><?= $no++ ?></td> -->
                                            <td>File Sertifikat Diklat</td>
                                            <td> Diklat </td>
                                            <td><?=  !empty($dk['file_sertifikat_diklat']) && file_exists('assets/asn/dokumen/arsip/'.$dk['file_sertifikat_diklat']) ? $dk['file_sertifikat_diklat'] : 'Belum Ada'; ?></td>
                                            <td class="text-nowrap">
                                                <?php if(!empty($dk['file_sertifikat_diklat']) && file_exists('assets/asn/dokumen/arsip/'.$dk['file_sertifikat_diklat'])):  ?>
                                                    <?php if($dk['status_aktif'] == 0):  ?>
                                                        <?php if($dk['status_validasi_moddiklat'] ==1 ):  ?>
                                                            <small class="bg-warning text-center text-white p-1 text-nowrap rounded"> <?= $dk['validator_moddiklat'] == 2 ? 'Tahap Validasi BKPSDM' : 'Tahap Validasi OPD'  ?></small>
                                                        <?php elseif($dk['status_validasi_moddiklat'] ==0 ): ?>
                                                            <small class="bg-danger text-center text-white p-1 text-nowrap rounded"><?= $dk['validator_moddiklat'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?></small>
                                                        <?php endif; ?>
                                                    <?php elseif( $dk['status_aktif'] == 1): ?>
                                                        <?php if($dk['status_validasi_moddiklat'] ==1 ):  ?>
                                                            <small class="bg-success text-center text-white p-1 text-nowrap rounded"><?= $dk['validator_moddiklat'] == 2 ? 'File telah Tervalidasi' : 'Gagal Validasi File'  ?></small>
                                                        <?php elseif($dk['status_validasi_moddiklat'] ==0 ): ?>
                                                            <?= $dk['validator_moddiklat'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        File Belum Terupload
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    File Belum Terupload
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if(!empty($dk['file_sertifikat_diklat']) && file_exists('assets/asn/dokumen/arsip/'.$dk['file_sertifikat_diklat'])): ?>
                                                    <a href="<?= base_url('assets/asn/dokumen/arsip/'.$dk['file_sertifikat_diklat']); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="#" type="button" class="button btn-xs btn-danger" data-toggle="modal" data-target="#dk<?= $dk['id'] ?>">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                                <div class="modal fade stick-up" id="dk<?= $dk['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <?= form_open_multipart('e_arsip/update_filearsip_riwayat/diklat/sertifikat/'.encrypt_url($dk['id']), 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                            <div class="modal-content-wrapper">
                                                                <div class="modal-content">
                                                                    <div class="modal-header clearfix text-left">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                                                        </button>
                                                                        <h5>Upload file Sertifikat</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-default ">
                                                                            <label>File Sertifikat <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                                            <p><i>Belum ada File Sertifikat</i></p>
                                                                            <input type="file" class="form-control-file" name="file_sertifikatdiklat">
                                                                            <input type="text" name="filex_sertifikatdiklat" value="<?= !empty($dk['tgl_sertifikat']) ? date('dmy', strtotime($dk['tgl_sertifikat'])) : null ?>" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary btn-cons  pull-left inline">Simpan</button>
                                                                        <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?= form_close(); ?>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>

                                    <?php foreach($seminar as $sr):?>
                                        <tr>
                                            <!-- <td><?= $no++ ?></td> -->
                                            <td>File Sertifikat Seminar</td>
                                            <td> Seminar </td>
                                            <td><?= !empty($sr['file_sertifikat_seminar']) && file_exists('assets/asn/dokumen/arsip/'.$sr['file_sertifikat_seminar']) ? $sr['file_sertifikat_seminar'] : 'Belum Ada'; ?></td>
                                            <td class="text-nowrap">
                                                <?php if(!empty($sr['file_sertifikat_seminar']) && file_exists('assets/asn/dokumen/arsip/'.$sr['file_sertifikat_seminar'])):  ?>
                                                    <?php if($sr['status_aktif'] == 0):  ?>
                                                        <?php if($sr['status_validasi_modseminar'] ==1 ):  ?>
                                                            <small class="bg-warning text-center text-white p-1 text-nowrap rounded"> <?= $sr['validator_modseminar'] == 2 ? 'Tahap Validasi BKPSDM' : 'Tahap Validasi OPD'  ?></small>
                                                        <?php elseif($sr['status_validasi_modseminar'] ==0 ): ?>
                                                            <small class="bg-danger text-center text-white p-1 text-nowrap rounded"><?= $sr['validator_modseminar'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?></small>
                                                        <?php endif; ?>
                                                    <?php elseif( $sr['status_aktif'] == 1): ?>
                                                        <?php if($sr['status_validasi_modseminar'] ==1 ):  ?>
                                                            <small class="bg-success text-center text-white p-1 text-nowrap rounded"><?= $sr['validator_modseminar'] == 2 ? 'File telah Tervalidasi' : 'Gagal Validasi File'  ?></small>
                                                        <?php elseif($sr['status_validasi_modseminar'] ==0 ): ?>
                                                            <?= $sr['validator_modseminar'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        File Belum Terupload
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    File Belum Terupload
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if(!empty($sr['file_sertifikat_seminar']) && file_exists('assets/asn/dokumen/arsip/'.$sr['file_sertifikat_seminar'])): ?>
                                                    <a href="<?= base_url('assets/asn/dokumen/arsip/'.$sr['file_sertifikat_seminar']); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="#" type="button" class="button btn-xs btn-danger" data-toggle="modal" data-target="#sr<?= $sr['id'] ?>">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                                <div class="modal fade stick-up" id="sr<?= $sr['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <?= form_open_multipart('e_arsip/update_filearsip_riwayat/seminar/sertifikat/'.encrypt_url($sr['id']), 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                            <div class="modal-content-wrapper">
                                                                <div class="modal-content">
                                                                    <div class="modal-header clearfix text-left">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                                                        </button>
                                                                        <h5>Upload file Sertifikat</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-default ">
                                                                            <label>File Sertifikat <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                                            <p><i>Belum ada File Sertifikat</i></p>
                                                                            <input type="file" class="form-control-file" name="file_sertifikatseminar">
                                                                            <input type="text" name="filex_sertifikatseminar" value="<?= !empty($sr['tgl_seminar']) ? date('dmy', strtotime($sr['tgl_seminar'])) : null ?>" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary btn-cons  pull-left inline">Simpan</button>
                                                                        <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?= form_close(); ?>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>

                                    <?php foreach($hukuman as $hu):?>
                                        <tr>
                                            <!-- <td><?= $no++ ?></td> -->
                                            <td>File SK Hukuman</td>
                                            <td> Hukuman </td>
                                            <td><?= !empty($hu['file_sk_hukuman']) && file_exists('assets/asn/dokumen/arsip/'.$hu['file_sk_hukuman']) ? $hu['file_sk_hukuman'] : 'Belum Ada'; ?></td>
                                            <td class="text-nowrap">
                                                <?php if(!empty($hu['file_sk_hukuman']) && file_exists('assets/asn/dokumen/arsip/'.$hu['file_sk_hukuman'])):  ?>
                                                    <?php if($hu['status_aktif'] == 0):  ?>
                                                        <?php if($hu['status_validasi_modhukuman'] ==1 ):  ?>
                                                            <small class="bg-warning text-center text-white p-1 text-nowrap rounded"> <?= $hu['validator_modhukuman'] == 2 ? 'Tahap Validasi BKPSDM' : 'Tahap Validasi OPD'  ?></small>
                                                        <?php elseif($hu['status_validasi_modhukuman'] ==0 ): ?>
                                                            <small class="bg-danger text-center text-white p-1 text-nowrap rounded"><?= $hu['validator_modhukuman'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?></small>
                                                        <?php endif; ?>
                                                    <?php elseif( $hu['status_aktif'] == 1): ?>
                                                        <?php if($hu['status_validasi_modhukuman'] ==1 ):  ?>
                                                            <small class="bg-success text-center text-white p-1 text-nowrap rounded"><?= $hu['validator_modhukuman'] == 2 ? 'File telah Tervalidasi' : 'Gagal Validasi File'  ?></small>
                                                        <?php elseif($hu['status_validasi_modhukuman'] ==0 ): ?>
                                                            <?= $hu['validator_modhukuman'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        File Belum Terupload
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    File Belum Terupload
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if(!empty($hu['file_sk_hukuman']) && file_exists('assets/asn/dokumen/arsip/'.$hu['file_sk_hukuman'])): ?>
                                                    <a href="<?= base_url('assets/asn/dokumen/arsip/'.$hu['file_sk_hukuman']); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="#" type="button" class="button btn-xs btn-danger" data-toggle="modal" data-target="#hu<?= $hu['id'] ?>">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                                <div class="modal fade stick-up" id="hu<?= $hu['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <?= form_open_multipart('e_arsip/update_filearsip_riwayat/hukuman/sk/'.encrypt_url($hu['id']), 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                            <div class="modal-content-wrapper">
                                                                <div class="modal-content">
                                                                    <div class="modal-header clearfix text-left">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                                                        </button>
                                                                        <h5>Upload file SK</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-default ">
                                                                            <label>File SK <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                                            <p><i>Belum ada File SK</i></p>
                                                                            <input type="file" class="form-control-file" name="file_skhukuman">
                                                                            <input type="text" name="filex_skhukuman" value="<?= !empty($hu['tgl_sk']) ? date('dmy', strtotime($hu['tgl_sk'])) : null ?>" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary btn-cons  pull-left inline">Simpan</button>
                                                                        <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?= form_close(); ?>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>

                                    <?php foreach($kgb as $kg):?>
                                        <tr>
                                            <!-- <td><?= $no++ ?></td> -->
                                            <td>File SK KGB</td>
                                            <td> Kenaikan Gaji Berkala (KGB) </td>
                                            <td><?= !empty($kg['file_sk_kgb']) && file_exists('assets/asn/dokumen/arsip/'.$kg['file_sk_kgb']) ? $kg['file_sk_kgb'] : 'Belum Ada'; ?></td>
                                            <td class="text-nowrap">
                                                <?php if( !empty($kg['file_sk_kgb']) && file_exists('assets/asn/dokumen/arsip/'.$kg['file_sk_kgb'])):  ?>
                                                    <?php if($kg['status_aktif'] == 0):  ?>
                                                        <?php if($kg['status_validasi_modkgb'] ==1 ):  ?>
                                                            <small class="bg-warning text-center text-white p-1 text-nowrap rounded"> <?= $kg['validator_modkgb'] == 2 ? 'Tahap Validasi BKPSDM' : 'Tahap Validasi OPD'  ?></small>
                                                        <?php elseif($kg['status_validasi_modkgb'] ==0 ): ?>
                                                            <small class="bg-danger text-center text-white p-1 text-nowrap rounded"><?= $kg['validator_modkgb'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?></small>
                                                        <?php endif; ?>
                                                    <?php elseif( $kg['status_aktif'] == 1): ?>
                                                        <?php if($kg['status_validasi_modkgb'] ==1 ):  ?>
                                                            <small class="bg-success text-center text-white p-1 text-nowrap rounded"><?= $kg['validator_modkgb'] == 2 ? 'File telah Tervalidasi' : 'Gagal Validasi File'  ?></small>
                                                        <?php elseif($kg['status_validasi_modkgb'] ==0 ): ?>
                                                            <?= $kg['validator_modkgb'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        File Belum Terupload
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    File Belum Terupload
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if(!empty($kg['file_sk_kgb']) && file_exists('assets/asn/dokumen/arsip/'.$kg['file_sk_kgb'])): ?>
                                                    <a href="<?= base_url('assets/asn/dokumen/arsip/'.$kg['file_sk_kgb']); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="#" type="button" class="button btn-xs btn-danger" data-toggle="modal" data-target="#dk<?= $kg['id'] ?>">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                                <div class="modal fade stick-up" id="kgb<?= $kg['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <?= form_open_multipart('e_arsip/update_filearsip_riwayat/kgb/sk/'.encrypt_url($kg['id']), 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                            <div class="modal-content-wrapper">
                                                                <div class="modal-content">
                                                                    <div class="modal-header clearfix text-left">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                                                        </button>
                                                                        <h5>Upload file SK</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-default ">
                                                                            <label>File SK <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                                            <p><i>Belum ada File SK</i></p>
                                                                            <input type="file" class="form-control-file" name="file_skkgb">
                                                                            <input type="text" name="filex_skkgb" value="<?= !empty($kg['tgl_sk']) ? date('dmy', strtotime($kg['tgl_sk'])) : null ?>" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary btn-cons  pull-left inline">Simpan</button>
                                                                        <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?= form_close(); ?>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>

                                    <?php foreach($kredit as $kr):?>
                                        <tr>
                                            <!-- <td><?= $no++ ?></td> -->
                                            <td>File SK Kredit</td>
                                            <td> Angka Kredit </td>
                                            <td><?= !empty($kr['file_sk_kredit']) && file_exists('assets/asn/dokumen/arsip/'.$kr['file_sk_kredit']) ? $kr['file_sk_kredit'] : 'Belum Ada'; ?></td>
                                            <td>
                                                <?php if(!empty($kr['file_sk_kredit']) && file_exists('assets/asn/dokumen/arsip/'.$kr['file_sk_kredit'])):  ?>
                                                    <?php if($kr['status_aktif'] == 0):  ?>
                                                        <?php if($kr['status_validasi_modkredit'] ==1 ):  ?>
                                                            <small class="bg-warning text-center text-white p-1 text-nowrap rounded"> <?= $kr['validator_modkredit'] == 2 ? 'Tahap Validasi BKPSDM' : 'Tahap Validasi OPD'  ?></small>
                                                        <?php elseif($kr['status_validasi_modkredit'] ==0 ): ?>
                                                            <small class="bg-danger text-center text-white p-1 text-nowrap rounded"><?= $kr['validator_modkredit'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?></small>
                                                        <?php endif; ?>
                                                    <?php elseif( $kr['status_aktif'] == 1): ?>
                                                        <?php if($kr['status_validasi_modkredit'] ==1 ):  ?>
                                                            <small class="bg-success text-center text-white p-1 text-nowrap rounded"><?= $kr['validator_modkredit'] == 2 ? 'File telah Tervalidasi' : 'Gagal Validasi File'  ?></small>
                                                        <?php elseif($kr['status_validasi_modkredit'] ==0 ): ?>
                                                            <?= $kr['validator_modkredit'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        File Belum Terupload
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    File Belum Terupload
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if( !empty($kr['file_sk_kredit'])  && file_exists('assets/asn/dokumen/arsip/'.$kr['file_sk_kredit'])): ?>
                                                    <a href="<?= base_url('assets/asn/dokumen/arsip/'.$kr['file_sk_kredit']); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="#" type="button" class="button btn-xs btn-danger" data-toggle="modal" data-target="#kr<?= $kr['id'] ?>">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                                <div class="modal fade stick-up" id="kr<?= $kr['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <?= form_open_multipart('e_arsip/update_filearsip_riwayat/kredit/sk/'.encrypt_url($kr['id']), 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                            <div class="modal-content-wrapper">
                                                                <div class="modal-content">
                                                                    <div class="modal-header clearfix text-left">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                                                        </button>
                                                                        <h5>Upload file SK</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-default ">
                                                                            <label>File SK <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                                            <p><i>Belum ada File SK</i></p>
                                                                            <input type="file" class="form-control-file" name="file_skkredit">
                                                                            <input type="text" name="filex_skkredit" value="<?= !empty($kr['tgl_sk']) ? date('dmy', strtotime($kr['tgl_sk'])) : null ?>" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary btn-cons  pull-left inline">Simpan</button>
                                                                        <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?= form_close(); ?>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>

                                    <?php foreach($penghargaan as $tj):?>
                                        <tr>
                                            <!-- <td><?= $no++ ?></td> -->
                                            <td>File Piagam Penghargaan</td>
                                            <td> Penghargaan </td>
                                            <td><?= !empty($tj['file_sk_tandajasa']) && file_exists('assets/asn/dokumen/arsip/'.$tj['file_sk_tandajasa']) ? $tj['file_sk_tandajasa'] : 'Belum Ada'; ?></td>
                                            <td>
                                                <?php if(!empty($tj['file_sk_tandajasa']) && file_exists('assets/asn/dokumen/arsip/'.$tj['file_sk_tandajasa'])): ?>
                                                    <?php if($tj['status_aktif'] == 0):  ?>
                                                        <?php if($tj['status_validasi_modtandajasa'] ==1 ):  ?>
                                                            <small class="bg-warning text-center text-white p-1 text-nowrap rounded"> <?= $tj['validator_modtandajasa'] == 2 ? 'Tahap Validasi BKPSDM' : 'Tahap Validasi OPD'  ?></small>
                                                        <?php elseif($tj['status_validasi_modtandajasa'] ==0 ): ?>
                                                            <small class="bg-danger text-center text-white p-1 text-nowrap rounded"><?= $tj['validator_modtandajasa'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?></small>
                                                        <?php endif; ?>
                                                    <?php elseif( $tj['status_aktif'] == 1): ?>
                                                        <?php if($tj['status_validasi_modtandajasa'] ==1 ):  ?>
                                                            <small class="bg-success text-center text-white p-1 text-nowrap rounded"><?= $tj['validator_modtandajasa'] == 2 ? 'File telah Tervalidasi' : 'Gagal Validasi File'  ?></small>
                                                        <?php elseif($tj['status_validasi_modtandajasa'] ==0 ): ?>
                                                            <?= $tj['validator_modtandajasa'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        File Belum Terupload
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    File Belum Terupload
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if(!empty($tj['file_sk_tandajasa'])  && file_exists('assets/asn/dokumen/arsip/'.$tj['file_sk_tandajasa'])): ?>
                                                    <a href="<?= base_url('assets/asn/dokumen/arsip/'.$tj['file_sk_tandajasa']); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="#" type="button" class="button btn-xs btn-danger" data-toggle="modal" data-target="#tj<?= $tj['id'] ?>">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                                <div class="modal fade stick-up" id="tj<?= $tj['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <?= form_open_multipart('e_arsip/update_filearsip_riwayat/tandajasa/sk/'.encrypt_url($tj['id']), 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                            <div class="modal-content-wrapper">
                                                                <div class="modal-content">
                                                                    <div class="modal-header clearfix text-left">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                                                        </button>
                                                                        <h5>Upload file SK</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-default ">
                                                                            <label>File SK <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                                            <p><i>Belum ada File SK</i></p>
                                                                            <input type="file" class="form-control-file" name="file_sktandajasa">
                                                                            <input type="text" name="filex_sktandajasa" value="<?= !empty($tj['sk_tanggal']) ? date('dmy', strtotime($tj['sk_tanggal'])) : null ?>" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary btn-cons  pull-left inline">Simpan</button>
                                                                        <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?= form_close(); ?>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>

                                    <?php foreach($cuti as $c):?>
                                        <tr>
                                            <!-- <td><?= $no++ ?></td> -->
                                            <td>File SK Cuti</td>
                                            <td> Cuti </td>
                                            <td><?= !empty($c['file_surat_cuti']) && file_exists('assets/asn/dokumen/arsip/'.$c['file_surat_cuti']) ? $c['file_surat_cuti'] : 'Belum Ada'; ?></td>
                                            <td>
                                                <?php if(!empty($c['file_surat_cuti']) && file_exists('assets/asn/dokumen/arsip/'.$c['file_surat_cuti'])):  ?>
                                                    <?php if($c['status_aktif'] == 0):  ?>
                                                        <?php if($c['status_validasi_modcuti'] ==1 ):  ?>
                                                            <small class="bg-warning text-center text-white p-1 text-nowrap rounded"> <?= $c['validator_modcuti'] == 2 ? 'Tahap Validasi BKPSDM' : 'Tahap Validasi OPD'  ?></small>
                                                        <?php elseif($c['status_validasi_modcuti'] ==0 ): ?>
                                                            <small class="bg-danger text-center text-white p-1 text-nowrap rounded"><?= $c['validator_modcuti'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?></small>
                                                        <?php endif; ?>
                                                    <?php elseif( $c['status_aktif'] == 1): ?>
                                                        <?php if($c['status_validasi_modcuti'] ==1 ):  ?>
                                                            <small class="bg-success text-center text-white p-1 text-nowrap rounded"><?= $c['validator_modcuti'] == 2 ? 'File telah Tervalidasi' : 'Gagal Validasi File'  ?></small>
                                                        <?php elseif($c['status_validasi_modcuti'] ==0 ): ?>
                                                            <?= $c['validator_modcuti'] == 2 ? 'Gagal Validasi BKPSDM' : 'Gagal Validasi OPD'  ?>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        File Belum Terupload
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    File Belum Terupload
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if( !empty($c['file_surat_cuti'])  && file_exists('assets/asn/dokumen/arsip/'.$c['file_surat_cuti'])): ?>
                                                    <a href="<?= base_url('assets/asn/dokumen/arsip/'.$c['file_surat_cuti']); ?>" target="_blank" type="button" class="button btn-xs btn-success">
                                                        <i class="fa fa-download"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <a href="#" type="button" class="button btn-xs btn-danger" data-toggle="modal" data-target="#cuti<?= $c['id'] ?>">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                                <div class="modal fade stick-up" id="cuti<?= $c['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <?= form_open_multipart('e_arsip/update_filearsip_riwayat/cuti/surat/'.encrypt_url($c['id']), 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                                            <div class="modal-content-wrapper">
                                                                <div class="modal-content">
                                                                    <div class="modal-header clearfix text-left">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                                                        </button>
                                                                        <h5>Upload file Surat</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group form-group-default ">
                                                                            <label>File Surat <small class="text-danger">[pdf | Max 300Kb]</small></label>
                                                                            <p><i>Belum ada File Surat</i></p>
                                                                            <input type="file" class="form-control-file" name="file_suratcuti">
                                                                            <input type="text" name="filex_suratcuti" value="<?= !empty($c['tgl_surat_cuti']) ? date('dmy', strtotime($c['tgl_surat_cuti'])) : null ?>" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary btn-cons  pull-left inline">Simpan</button>
                                                                        <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?= form_close(); ?>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    
                                </tbody>
                            </table>
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

    <script src="<?= base_url(); ?>assets/asn/plugins/jquery-datatable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/jquery-datatable/media/js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/asn/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/asn/plugins/datatables-responsive/js/lodash.min.js"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?= base_url(); ?>assets/asn/js/datatables.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/asn/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
</body>

</html>