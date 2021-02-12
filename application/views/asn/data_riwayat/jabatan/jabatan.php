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
                <div class=" container-fluid w-100  container-fixed-lg">
                    <!-- BEGIN PlACE PAGE CONTENT HERE -->

                    <div class="card card-transparent">
                        <div class="card-header  d-flex justify-content-between">
                            <div class="card-title"><h5 class="semi-bold">RIWAYAT <?= strtoupper(str_replace('_', ' ', $this->uri->segment(2)));?>
                            </h5></div>
                            <div class="export-options-container"></div>
                            <div class="clearfix"></div>
                            
                            
                            <div class="pull-right">
                                <div class="col-xs-12">
                                    <a href="<?= base_url("data_riwayat/jabatan/tambah_jabatan")?>" type="button" class="btn btn-info btn-cons"><i class="fa fa-plus"></i> Tambah</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-block">
                            <?= $this->session->flashdata('alert'); ?>
                            <table class="table table-striped table-hover" id="tableWithExportOptions">
                                <thead class="bg-info-lighter">
                                    <tr>
                                        <th class="text-black">No. </th>
                                        <th class="text-black">Jenis Jabatan</th>
                                        <th class="text-black">Eselon</th>
                                        <th class="text-black">Nama Jabatan</th>
                                        <th class="text-black">Unit Kerja</th>
                                        <th class="text-black">Nomor SK</th>
                                        <th class="text-black">Tanggal SK</th>
                                        <th class="text-black">TMT Jabatan</th>
                                        <th class="text-black">Status Validasi</th>
                                        <th class="text-black">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($jabatan as $j): ?>
                                    <tr>
                                        <td class="align-middle"><?= $no++ ?></td>
                                        <td class="align-middle"><?= $j['jenis_jabatan']; ?></td>
                                        <td class="align-middle"><?= $j['eselon']; ?></td>
                                        <td class="align-middle">
                                            <?php    if($j['jenis_jabatan_id']==2){
                                                    if($j['eselon_id']==7){
                                                        echo $j['nm_jabatan'];
                                                    }elseif($j['jabatan_id']==706){
                                                        echo  $j['nm_jabatan'].' '.$j['nm_unitkerja'] ; 
                                                    }else{
                                                        if($j['subbagian_id']!=0){
                                                            echo $j['nm_jabatan'].' '.$j['nm_subbidang'];
                                                        }else{
                                                            echo $j['nm_jabatan'].' '.$j['nm_bidang'];
                                                        }
                                                    }
                                                    
                                                }elseif($j['jenis_jabatan_id']==1){
                                                    echo  $j['nm_jabatan'].' '.$j['nm_unitkerja'] ; 
                                                }else{
                                                    $jj = explode('/',$j['jenjang_jabatan']);
                                                    echo !empty($j['jenjang_jabatan']) ? $j['nm_jabatan'].' '.$jj[0] : $j['nm_jabatan'];
                                                }
                                            ?>
                                        </td>
                                        <td class="align-middle"><?= $j['nm_unitkerja']; ?></td>
                                        <td class="align-middle"><?= $j['no_sk'] ?></td>
                                        <td class="align-middle"><?= $j['tgl_sk'] ? date('d-m-Y', strtotime($j['tgl_sk'])) : '' ?></td>
                                        <td class="align-middle"><?= $j['tmt_jabatan'] ? date('d-m-Y', strtotime($j['tmt_jabatan'])) : '' ?></td>
                                        <td class="align-middle">
                                        <?php if($j['status_aktif'] != 1): ?>
                                                <?php if($j['validator_modjabatan']==1): ?>
                                                    <?php if($j['status_validasi_modjabatan'] ==1):?>
                                                        <span class="bg-warning text-center text-white p-1 text-nowrap rounded"> Validasi Tahap 1 OPD </span>
                                                    <?php else:?>
                                                        <a href="#" data-toggle="modal" data-target="#valjab<?= $j['id'] ?>"><span class="bg-danger text-center text-white p-1 text-nowrap rounded"> Gagal Validasi Tahap 1 </span></a>
                                                    <?php endif;?>
                                                <?php elseif($j['validator_modjabatan']==2):?>
                                                    <?php if($j['status_validasi_modjabatan'] ==1):?>
                                                        <span class="bg-warning text-center text-white p-1 text-nowrap rounded"> Validasi Tahap 2 BKPSDM </span>
                                                    <?php else:?>
                                                        <a href="#" data-toggle="modal" data-target="#valjab<?= $j['id'] ?>"><span class="bg-danger text-center text-white p-1 text-nowrap rounded"> Gagal Validasi Tahap 2 </span></a>
                                                    <?php endif;?>
                                                <?php else: ?>
                                                    <a href="#" data-toggle="modal" data-target="#valjab<?= $j['id'] ?>"><span class="bg-danger text-center text-white p-1 text-nowrap rounded"> Ditolak </span></a>
                                                <?php endif; ?>
                                            <?php else:?>
                                                <span class="bg-success text-center text-white p-1 text-nowrap rounded"> Aktif </span>
                                            <?php endif;?>
                                        </td>
                                        <td>
                                            <a <?= $j['status_validasi_modjabatan']==0 || $j['status_validasi_modjabatan']==1 && $j['status_aktif']==1 ? 'href="'.base_url("data_riwayat/jabatan/ubah_jabatan/".encrypt_url($j['id'])).'"':'href="#"  data-toggle="modal" data-target="#msgjab'.$j['id'].'"';?> type="button" class="btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#apusjab<?= $j['id'] ?>" type="button" class="btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <!-- MODAL STICK UP SMALL ALERT -->
                                    <div class="modal fade stick-up" id="valjab<?= $j['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content-wrapper">
                                                <div class="modal-content">
                                                    <div class="modal-header clearfix text-left">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                                        </button>
                                                        <h5>Keterangan validasi</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="no-margin"><?= $j['ket_validasi_modjabatan']; ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- <button type="button" class="btn btn-primary btn-cons  pull-left inline" data-dismiss="modal">Continue</button> -->
                                                        <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <div class="modal fade slide-up disable-scroll" id="valjab<?= $j['id'] ?>" tabindex="-1" role="dialog" aria-hidden="false">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content-wrapper">
                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                    <div class="modal-body text-center m-t-20">
                                                        <h6 class="no-margin p-b-10"><b>Keterangan Validasi : </b> <?= $j['ket_validasi_modjabatan']; ?></h6>
                                                        <button type="button" class="btn btn-xs btn-success btn-cons" data-dismiss="modal">Tutup</button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <div class="modal fade slide-up disable-scroll" id="msgjab<?=$j['id']?>" tabindex="-1" role="dialog" aria-hidden="false">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content-wrapper">
                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                    <div class="modal-body text-center m-t-20">
                                                        <h6 class="no-margin p-b-10">Data sementara dalam proses validasi tahap <?= $j['validator_modjabatan'] ?>, Data tdiak bisa diedit</h6>
                                                        <button type="button" class="btn btn-xs btn-success btn-cons" data-dismiss="modal">Tutup</button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <div class="modal fade slide-up disable-scroll" id="apusjab<?= $j['id'] ?>" tabindex="-1" role="dialog" aria-hidden="false">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content-wrapper">
                                                <div class="modal-content" style="background-color: #e2e2e2;">
                                                    <div class="modal-body text-center m-t-20">
                                                        <h6 class="no-margin p-b-10">Apa anda yakin inginmenghapus data ini ? !!!</h6>
                                                        <a href="<?= base_url('data_riwayat/hapus_jabatan/'.encrypt_url($j['id'])) ?>" type="button" class="btn btn-xs btn-success btn-cons  pull-left inline">Ya</a>
                                                        <button type="button" class="btn btn-xs btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
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