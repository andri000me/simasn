<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('include/metadata'); ?>

    <link href="<?= base_url(); ?>assets/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url(); ?>assets/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/plugins/simple-line-icons/simple-line-icons.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>assets/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url(); ?>pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="<?= base_url(); ?>assets/pages/css/themes/modern.css" rel="stylesheet" type="text/css" />
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body class="fixed-header horizontal-menu horizontal-app-menu ">
    <!-- START PAGE-CONTAINER -->
    <?php $this->load->view('include/header'); ?>
    <div class="page-container ">
        <!-- START PAGE CONTENT WRAPPER -->
        <div class="page-content-wrapper ">
            <!-- START PAGE CONTENT -->
            <div class="content ">
                <?php $this->load->view('include/breadcrumb'); ?>

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
                <div class=" container container-fixed-lg">
                  <!-- BEGIN PlACE PAGE CONTENT HERE -->
                    <div class="col-md-12">
                        <form name="myform" class="form-horizontal" action="" method="post">
                            <div class="form-group row">
                                <label for="fname" class="col-md-3">Username</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" id="username" name="username" class="form-control" rel="gp" data-size="8" data-character-set="a-z" required>
                                        <button type="button" class="btn btn-succes getNewPass">Generat</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-md-3">Password</label>
                                <div class="col-md-6">
                                    <form name="random_form">
                                        <div class="input-group">
                                            <input type="text" id="password" name="password" class="form-control" rel="gp" data-size="18" data-character-set="a-z,A-Z,0-9,#" required>
                                            <button type="button" class="btn btn-succes getNewPass">Generat</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-succes">Simpan</button>
                            <button type="submit" class="btn btn-danger">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div> <!-- END PLACE PAGE CONTENT HERE -->
    </div>
    <!-- END CONTAINER FLUID -->
    </div>
    <!-- END PAGE CONTENT -->
    <!-- START COPYRIGHT -->
    <!-- START CONTAINER FLUID -->
    <!-- START CONTAINER FLUID -->
    <?php $this->load->view('include/footer'); ?>
    <!-- END COPYRIGHT -->
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->

    <!-- BEGIN VENDOR JS -->
    <!-- <script src="<?= base_url(); ?>assets/assets/plugins/pace/pace.min.js" type="text/javascript"></script> -->
    <script src="<?= base_url(); ?>assets/assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/assets/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/assets/plugins/tether/js/tether.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/assets/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="<?= base_url(); ?>assets/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="<?= base_url(); ?>assets/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="<?= base_url(); ?>assets/assets/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    <script language="javascript" type="text/javascript">
       // Generate a password string
        function randString(id){
            var dataSet = $(id).attr('data-character-set').split(',');  
            var possible = '';
            if($.inArray('a-z', dataSet) >= 0){
                possible += 'abcdefghijklmnopqrstuvwxyz';
            }
            if($.inArray('A-Z', dataSet) >= 0){
                possible += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            }
            if($.inArray('0-9', dataSet) >= 0){
                possible += '0123456789';
            }
            if($.inArray('#', dataSet) >= 0){
                possible += '![]{}()%&*$#^<>~@|';
            }
            var text = '';
            for(var i=0; i < $(id).attr('data-size'); i++) {
                text += possible.charAt(Math.floor(Math.random() * possible.length));
            }
            return text;
        }

        // Create a new password on page load
        $('input[rel="gp"]').each(function(){
            $(this).val(randString($(this)));
        });

        // Create a new password
        $(".getNewPass").click(function(){
            var field = $(this).closest('div').find('input[rel="gp"]');
            field.val(randString(field));
        });

        // Auto Select Pass On Focus
        $('input[rel="gp"]').on("click", function () {
           $(this).select();
        });
    </script>
</body>

</html>