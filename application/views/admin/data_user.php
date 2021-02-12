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
    <!-- Datatable  -->
    <link href="<?= base_url(); ?>assets/admin/plugins/serverside-table/css/jquery_datatables.css" rel="stylesheet" type="text/css" media="screen" />
    <!-- End Datatable  -->
    <style>
        table tbody tr td { white-space: nowrap; }
        .select2-container--open {
            z-index: 9999999
        }
    </style>
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
                      <h4>DATA USER</h4>
                    </label>
                    <!-- <div class="row">
                        <div class="col-md-6">
                            <div class=" form-group">
                              <input form="filter" type="text" class="form-control" placeholder="-Nama, NIP, SKPD-">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group">
                                <button form="filter" type="button" class="btn btn-primary btn-sm">Search</button>
                                <button form="filter" type="button" class="btn btn-danger btn-sm">Tambah</button>
                            </div>
                        </div>
                    </div> -->
                    <div class=" container-fluid w-100  container-fixed-lg bg-white">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-header">
                            <div class="card-title col-md-9"> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <?= form_open('admin/data_user', 'id="filter" role="form"'); ?>
                                            <div class="form-group">
                                                <select id="ukid" name="ukid" class="full-width" data-init-plugin="select2" onchange="this.form.submit('admin/data_user')">
                                                    <option value="" required>-- Pilih SKPD -- </option>
                                                    <?php foreach($uk as $u): ?>
                                                        <option value="<?= encrypt_url($u['id_unitkerja']) ?>" <?= !empty($uk_aktif) && $uk_aktif==$u['id_unitkerja'] ? 'selected':'' ?>><?= $u['nm_unitkerja'] ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        <?= form_close() ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <!-- <button form="filter" type="button" class="btn btn-success btn-sm">Export</button>
                                            <button form="filter" href="#" data-toggle="modal" data-target="#adduser" type="button" class="btn btn-danger btn-sm">Tambah</button>
                                            <a href=<?php // echo base_url('admin/data_user/tambah_user_admin') ?>" type="button" class="btn btn-danger btn-sm"><span class="text-capitalize">Tambah</span></a> -->
                                            <a class="btn btn-info btn-sm" type="button" href="<?= base_url('admin/data_user/daftar_admin/cetak') ?>">
                                                <i class="fa fa-print"></i>&nbsp;
                                                <span class="bold">Print</span>
                                            </a>
                                            <a class="btn btn-success btn-sm" type="button" href="<?= base_url('admin/data_user/daftar_admin/unduh') ?>">
                                                <i class="fa fa-download"></i>&nbsp;
                                                <span class="bold">Export</span>
                                            </a>
                                            <a class="btn btn-danger btn-sm" type="button" href="<?= base_url('admin/data_user/tambah_user_admin') ?>">
                                                <i class="fa fa-plus"></i>&nbsp;
                                                <span class="bold">Tambah</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="col-xs-12">
                                    <input type="text" id="uri" value="<?= $uri2 ?>" hidden>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- END card -->
                </div>
                <div class=" container-fluid w-100  container-fixed-lg bg-white">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-block">
                            <table id="dtuser" class="display table-bordered table-striped table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Level</th>
                                        <th>Unit Kerja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal" id="adduser" tabindex="-1"  role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <?= form_open('admin/data_user/add_useradmin', 'class="form-horizontal"', 'role="form"', 'autocomplete="off"');?>
                                <div class="modal-content-wrapper">
                                    <div class="modal-content">
                                        <div class="modal-header clearfix text-left">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                                            </button>
                                            <h5>Tambah User Admin</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <select id="iduk" name="iduk"class="full-width" data-init-plugin="select2" onchange="getidUk($(this).val())" required>
                                                    <option value="" required>-- Pilih SKPD -- </option>
                                                    <?php foreach($uk as $u): ?>
                                                        <option value="<?= encrypt_url($u['id_unitkerja']) ?>" <?= !empty($uk_aktif) && $uk_aktif==$u['id_unitkerja'] ? 'selected':'' ?>><?= $u['nm_unitkerja'] ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select id="idusr" name="idusr" class="full-width" data-init-plugin="select2" required>
                                                    <option value=null>--- Pilih Asn --- </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select id="idlvl" name="idlvl" class="full-width" data-init-plugin="select2" required>
                                                <option value="" required>-- Pilih level admin -- </option>
                                                    <?php foreach($level as $u): ?>
                                                        <option value="<?= $u['id_level'] ?>" ><?= $u['nm_level'] ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-cons  pull-left inline">Kirim</button>
                                            <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            <?= form_close(); ?>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- END card -->
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

    <script src="<?= base_url(); ?>assets/admin/plugins/serverside-table/js/code_jquery.js"></script>
    <script src="<?= base_url(); ?>assets/admin/plugins/serverside-table/js/jquery_table.js"></script>

    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <!-- <script src="<?= base_url(); ?>assets/js/form_elements.js" type="text/javascript"></script> -->
    <script src="<?= base_url(); ?>assets/admin/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    <script type="text/javascript">
        $(document).ready(function() {
            var iduk = $('#ukid').val();
            $('#dtuser').DataTable( {
                "responsive" : true,
                "processing": true,
                "serverSide": true,
                "searching" : true,
                "ajax": {
                    "url": "<?= site_url('admin/data_user/user') ?>",
                    "type": "POST",
                    "data": function ( data ) {
                        data.uri = $('#uri').val();
                        data.ukid = $('#ukid').val();
                        // data.search = $('#dtuser_filter input').val();
                    }
                },
                columnDefs: [{
                    targets: "_all",
                    orderable: false
                }]
            } );
        });

        function getidUk(iduk){
            $.ajax({
                url : "<?= base_url();?>admin/data_user/asn",
                method : "POST",
                data : {iduk: iduk},
                dataType : 'json',
                success : function(data){
                    var html;
                    var i;
                    html += '<option value="">--- Pilih ---</option>';
                    if(data.length > 0){
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i].nip+'">'+data[i].nama+'</option>';
                        }
                    }else{
                        $('#idusr').prop('value', null);
                    }
                    $('#idusr').html(html);
                }
            });
            
        }
    </script>
</body>

</html>