<div class="header bg-menu">
    <!-- START MOBILE SIDEBAR TOGGLE -->
    <a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu" data-toggle="sidebar"></a>
    <!-- END MOBILE SIDEBAR TOGGLE -->
    <div class="">
        <div class="brand inline  m-l-10 ">
            <img src="<?= base_url();?>assets/img/logo_white_2x.png" alt="logo" data-src="<?= base_url();?>assets/img/logo_white_2x.png" data-src-retina="<?= base_url();?>assets/img/logo_white_2x.png" height="22">
        </div>
    </div>
    <div class="d-flex align-items-center">
        <!-- START User Info-->
        <div class="pull-left p-r-10 fs-14 font-heading hidden-md-down">
            <span class="bold text-white"><?= ucwords($user['nama']) ?></span>
        </div>
        <div class="dropdown pull-right hidden-md-down">
            <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline">
                    <?php if(!empty($user['foto']) && file_exists('assets/asn/img/profiles/'.$user['foto'])): ?>
                        <img src="<?= base_url('assets/asn/img/profiles/'.$user['foto']);?>" alt="" data-src="<?= base_url('assets/asn/img/profiles/'.$user['foto']);?>" data-src-retina="<?= base_url('assets/asn/img/profiles/'.$user['foto']);?>" width="32" height="32">
                    <?php else:?>
                        <img src="<?= base_url('assets/img/users.png') ?>" alt="" data-src="<?= base_url('assets/img/users.png'); ?>" data-src-retina="<?= base_url('assets/img/users.png'); ?>" width="32" height="32">
                    <?php endif;?>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                <a href="<?= base_url()?>profil" class="dropdown-item"><i class="fa fa-user"></i> Profil</a>
                <a href="<?= base_url('setting') ?>" class="dropdown-item"><i class="pg-settings_small"></i> Settings</a>
                <?php if($this->session->userdata('level_id') != 5):  ?>
                    <a href="<?= base_url('admin') ?>" class="dropdown-item"><i class="fa fa-sign-in"></i>Masuk Admin</a>
                <?php endif;?>
                <a href="<?= base_url('logout') ?>" class="clearfix bg-master-lighter dropdown-item">
                    <span class="pull-left">Logout</span>
                    <span class="pull-right"><i class="pg-power"></i></span>
                </a>
              </div>
        </div>
        <!-- END User Info-->
    </div>
</div>