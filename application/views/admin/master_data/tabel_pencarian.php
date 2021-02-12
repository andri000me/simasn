<!DOCTYPE html>
<?php  ini_set('display_errors', 0); ?>
<html>

<head>
    <?php $this->load->view('admin/include/metadata'); ?>

    <link href="<?= base_url(); ?>assets/admin/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/admin/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />

    <link href="<?= base_url(); ?>assets/admin/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    
    <link href="<?= base_url(); ?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/admin/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link class="main-stylesheet" href="<?= base_url(); ?>assets/pages/css/themes/modern.css" rel="stylesheet" type="text/css" />
    <style>
        .table tbody tr td {
            padding: 5px;
        }
    </style>
    <?php
        $uri_r = substr($uri3, 7);
        $uri_spasi = str_replace('_', ' ', $uri_r);
        $uri_notspasi = str_replace('_', '', $uri_r);
    ?>
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
                        <h4><b>MASTER <?= strtoupper($uri_spasi) ?></b></h4>
                    </label>
                    <div class="row">
                        <div class="col-md-6">
                            <?= form_open('admin/master_data/search_'.$uri_r, 'id="formCari"');?>
                            <div class=" form-group">
                                <input type="text" name="kata_cari" class="form-control" value="<?= $kata_cari ?>">
                            </div>
                            <?= form_close(); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group">
                                <button form="formCari" type="submit" class="btn btn-complete btn-sm">
                                    <i class="fa fa-search"></i>&nbsp;
                                    <span class="bold">Search</span>
                                </button>
                                <a class="btn btn-info btn-sm" type="button" href="<?= base_url().'admin/master_data/'.$uri_r.'/unduh_excel'; ?>">
                                    <i class="fa fa-download"></i>&nbsp;
                                    <span class="bold">Unduh</span>
                                </a>
                                <a class="btn btn-warning btn-sm" type="button" href="<?= base_url().'admin/master_data/'.$uri_r.'/cetak_pdf'; ?>">
                                    <i class="fa fa-print"></i>&nbsp;
                                    <span class="bold">Cetak</span>
                                </a>
                                <a class="btn btn-success btn-sm" type="button" href="<?= base_url().'admin/master_data/'.$uri_r.'/form_tambah_'.$uri_r; ?>">
                                    <i class="fa fa-plus"></i>&nbsp;
                                    <span class="bold">Tambah</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="overflow-x: auto;" class="col-md-12 container container-fixed-lg p-0">
                        <!-- BEGIN PlACE PAGE CONTENT HERE -->
                        <?php echo $this->session->flashdata('alert');?>
                        <table class="table table-sm table-hover table-striped table-bordered m-t-10">
                            <thead class="bg-info-lighter">
                                <tr>
                                    <th width="5%" class="text-black text-nowrap text-center p-2">
                                        <center>No</center>
                                    </th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">
                                        Aksi
                                    </th>
                                    <?php if($m['tole_'.$uri_notspasi]!=null): ?>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">
                                        Tole
                                    </th>
                                    <?php endif; ?>
                                    <th width="75%" class="text-black text-nowrap text-center p-2">
                                        <center>NAMA <?= strtoupper(str_replace('_', ' ', $uri_r)) ?></center>
                                    </th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">
                                        <center>Status</center>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($master) > 0): $no=1; foreach($master as $m): ?>
                                    <tr>
                                        <td class="text-nowrap p-2 text-center"><?= $no++ ?></td>
                                        <td class="text-nowrap p-2 text-center">
                                          <a type="button" href="<?= base_url().'admin/master_data/'.$uri_r.'/form_ubah_'.$uri_r.'/'.encrypt_url($m['id_'.$uri_notspasi]); ?>" class="text-white btn btn-xs btn-success" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                          <a type="button" href="#" data-target="#hapusbid<?= encrypt_url($m['id_'.$uri_notspasi]) ?>" data-toggle="modal" class="text-white btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                        <?php if($m['tole']!=null): ?>
                                        <td class="text-nowrap p-2"><?= lindungi($m['tole_'.$uri_notspasi]) ?></td>
                                        <?php endif;  ?>
                                        <td class="text-nowrap p-2"><?= lindungi($m['nm_'.$uri_notspasi]) ?></td>
                                        <td class="text-nowrap p-2 text-center">
                                            <input type="checkbox" data-init-plugin="switchery" name="status_<?= $uri_notspasi ?>" data-size="small" data-color="primary" value="<?= encrypt_url($m['id_'.$uri_notspasi]) ?>" <?= $m['status_'.$uri_notspasi]==1 ? 'title="Aktif" checked':'title="Tidak Aktif"'; ?> />
                                        </td>
                                    </tr>
                                    <!-- MODAL AKTIFKAN DATA -->
                                    <div class="modal fade slide-up" id="hapusbid<?= encrypt_url($m['id_'.$uri_notspasi]) ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content-wrapper">
                                                <div class="modal-content">
                                                    <div class="modal-header clearfix text-left">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                                                        <h5>Konfirmasi</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="no-margin">Apa anda yakin ingin menghapus data ini !!!</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a type="button" href="<?= base_url().'admin/master_data/aksi_'.$uri_r.'/hapus_'.$uri_r.'/'.encrypt_url($m['id_'.$uri_notspasi]); ?>" class="btn btn-danger btn-cons pull-left inline">Yes</a>
                                                        <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                          <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="4" class="text-nowrap p-2 text-center"><i>Total data ditemukan <?= count($master) ?></i></td>
                                    </tr>
                                <?php else:?>
                                    <tr>
                                        <td colspan="4" class="text-nowrap p-2 text-center"><i>Data tidak ditemukan</i></td>
                                    </tr>
                                <?php endif;?>
                            </tbody>
                        </table>
                        <?= $pagination ?>
                        <!-- END PLACE PAGE CONTENT HERE -->

                    </div>
                    <!-- END CONTAINER FLUID -->
                </div>
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
    <!-- END PAGE CONTAINER -->

    <!-- BEGIN VENDOR JS -->
    <!-- <script src="<?= base_url(); ?>assets/admin/plugins/pace/pace.min.js" type="text/javascript"></script> -->
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/tether/js/tether.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/admin/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <script src="<?= base_url(); ?>assets/admin/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <!-- <script src="<?= base_url(); ?>assets/js/form_elements.js" type="text/javascript"></script> -->
    <script src="<?= base_url(); ?>assets/admin/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->

    <script type="text/javascript">
        $(document).ready(function(){
            $('input[name=status_<?= $uri_notspasi ?>]').change(function(){
                var mode= $(this).prop('checked');
                var id=$( this ).val();
                $.ajax({
                    url : "<?php echo base_url().'admin/get_data/update_status_'.$uri_notspasi;?>",
                    method : "POST",
                    data : {mode:mode, id:id},
                    dataType : 'json',
                    success: function(data){
                        for(i=0; i<data.length; i++){
                            if(data[i].status_<?= $uri_notspasi ?> ==1){
                                $('input[name=status_<?= $uri_notspasi ?>]').attr('checked', 'checked').attr('title', 'Aktif');
                            }else{
                                $('input[name=status_<?= $uri_notspasi ?>]').removeAttr('checked', 'checked').attr('title', 'Tidak Aktif');
                            }
                        }
                        
                    }
                });
            });
        });
    </script>
</body>

</html>