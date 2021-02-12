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
                        <h4><b>MASTER HUKUMAN</b></h4>
                    </label>
                    <div class="row">
                        <div class="col-md-6">
                            <?= form_open('admin/master_data/search_hukuman', 'id="formCari"');?>
                            <div class=" form-group">
                                <input type="text" name="kata_cari" class="form-control" placeholder="-Hukuman-">
                            </div>
                            <?= form_close(); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group">
                                <button form="formCari" type="submit" class="btn btn-complete btn-sm">
                                    <i class="fa fa-search"></i>&nbsp;
                                    <span class="bold">Search</span>
                                </button>
                                <a class="btn btn-info btn-sm" type="button" href="<?= base_url().'admin/master_data/hukuman/unduh_excel'; ?>">
                                    <i class="fa fa-download"></i>&nbsp;
                                    <span class="bold">Unduh</span>
                                </a>
                                <a class="btn btn-warning btn-sm" type="button" href="<?= base_url().'admin/master_data/hukuman/cetak_pdf'; ?>">
                                    <i class="fa fa-print"></i>&nbsp;
                                    <span class="bold">Cetak</span>
                                </a>
                                <a class="btn btn-success btn-sm" type="button" href="<?= base_url().'admin/master_data/hukuman/form_tambah_hukuman'; ?>">
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
                                    <th width="75%" class="text-black text-nowrap text-center p-2">
                                        <center>NAMA UNIT KERJA</center>
                                    </th>
                                    <th width="10%" class="text-black text-nowrap text-center p-2">
                                        <center>Status</center>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($hukuman as $b): ?>
                                <tr>
                                    <td class="text-nowrap p-2 text-center"><?= $uri3 + $no++ ?></td>
                                    <td class="text-nowrap p-2 text-center">
                                      <a type="button" href="<?= base_url().'admin/master_data/hukuman/form_ubah_hukuman/'.encrypt_url($b['id_hukuman']); ?>" class="text-white btn btn-xs btn-success" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                      <a type="button" href="#" data-target="#hapusbid<?= encrypt_url($b['id_hukuman']) ?>" data-toggle="modal" class="text-white btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <td class="text-nowrap p-2"><?= lindungi($b['nm_hukuman']) ?></td>
                                    <td class="text-nowrap p-2 text-center">
                                        <input type="checkbox" data-init-plugin="switchery" name="status_hukuman" data-size="small" data-color="primary" value="<?= encrypt_url($b['id_hukuman']) ?>" <?= $b['status_hukuman']==1 ? 'title="Aktif" checked':'title="Tidak Aktif"'; ?> />
                                    </td>
                                </tr>
                                <!-- MODAL AKTIFKAN DATA -->
                                <div class="modal fade slide-up" id="hapusbid<?= encrypt_url($b['id_hukuman']) ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                    <a type="button" href="<?= base_url().'admin/master_data/aksi_hukuman/hapus_hukuman/'.encrypt_url($b['id_hukuman']); ?>" class="btn btn-danger btn-cons pull-left inline">Yes</a>
                                                    <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">No</button>
                                                </div>
                                            </div>
                                        </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <?php endforeach;?>
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

    <script src="<?= base_url(); ?>assets/admin/plugins/pagination/responsive-paginate.js" type="text/javascript"></script>
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
            $('input[name=status_hukuman]').change(function(){
                var mode= $(this).prop('checked');
                var id=$( this ).val();
                $.ajax({
                    url : "<?php echo base_url();?>admin/get_data/update_status_hukuman",
                    method : "POST",
                    data : {mode:mode, id:id},
                    dataType : 'json',
                    success: function(data){
                        for(i=0; i<data.length; i++){
                            if(data[i].status_hukuman==1){
                                $('input[name=status_hukuman]').attr('checked', 'checked').attr('title', 'Aktif');
                            }else{
                                $('input[name=status_hukuman]').removeAttr('checked', 'checked').attr('title', 'Tidak Aktif');
                            }
                        }
                        
                    }
                });
            });
        });
        $(document).ready(function () {
            $(".pagination").rPage();
        });
    </script>
</body>

</html>