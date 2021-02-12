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
                <div class=" container-fluid   container-fixed-lg">
                    <!-- BEGIN PlACE PAGE CONTENT HERE -->
                    <div class="card card-transparent">
                        <div class="card-header ">
                            <div class="card-title"><b>Arsip</b>
                            </div>
                            <form role="form">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <label>Penyelenggara</label>
                                            <input type="file" style="display: block;" class="form-control" placeholder="" required="">                                            
                                        </div>
                                        <div class="col-lg-4">
                                            <a href="<?= base_url("data_riwayat/seminar") ?>" style="margin-top: 30px;" style="margin-right: 0;" type="button" class="btn btn-success btn-cons">Simpan</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-block">
                            <div id="tableWithDynamicRows_wrapper" class="dataTables_wrapper no-footer">
                                <div>
                                    <table class="table table-hover demo-table-dynamic table-responsive-block dataTable no-footer" id="tableWithDynamicRows" role="grid" aria-describedby="tableWithDynamicRows_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_desc" tabindex="0" aria-controls="tableWithDynamicRows" rowspan="1" colspan="1" aria-label="App name: activate to sort column ascending" style="width:auto" aria-sort="descending">No. </th>
                                                <th class="sorting" tabindex="0" aria-controls="tableWithDynamicRows" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width:auto">Keterangan</th>
                                                <th class="sorting" style="padding-right: 0;" tabindex="0" aria-controls="tableWithDynamicRows" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width:auto">::</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" class="odd">
                                                <td class="v-align-middle sorting_1">
                                                    <p>1</p>
                                                </td>
                                                <td class="v-align-middle">
                                                    <p>Struktural</p>
                                                </td>
                                                <td class="v-align-middle">
                                                    <a href="<?= base_url("data_riwayat/edit_jabatan") ?>" type="button" class="btn btn-danger">X</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div>
                                        <div class="dataTables_paginate paging_simple_numbers" id="tableWithDynamicRows_paginate">
                                            <ul class="">
                                                <li class="paginate_button previous disabled" id="tableWithDynamicRows_previous"><a href="#" aria-controls="tableWithDynamicRows" data-dt-idx="0" tabindex="0"><i class="pg-arrow_left"></i></a></li>
                                                <li class="paginate_button active"><a href="#" aria-controls="tableWithDynamicRows" data-dt-idx="1" tabindex="0">1</a></li>
                                                <li class="paginate_button next disabled" id="tableWithDynamicRows_next"><a href="#" aria-controls="tableWithDynamicRows" data-dt-idx="2" tabindex="0"><i class="pg-arrow_right"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="dataTables_info" id="tableWithDynamicRows_info" role="status" aria-live="polite">Showing <b>1 to 5</b> of 5 entries</div>
                                    </div>
                                </div>
                            </div>
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
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?= base_url(); ?>assets/asn/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
</body>

</html>