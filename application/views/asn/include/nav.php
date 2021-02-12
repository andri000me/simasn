    
<style>
    .page-sidebar .sidebar-menu .menu-items li:hover > a, .page-sidebar .sidebar-menu .menu-items li.open > a, .page-sidebar .sidebar-menu .menu-items li.active > a{
        color: #93ffb8;
    }
    .page-sidebar .sidebar-menu .menu-items li > a{color: #e8f9f9;}
</style>
<nav class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
        <img src="<?= base_url('assets/img/logo_white_2x.png'); ?>" class="brand" data-src="<?= base_url('assets/img/logo_white_2x.png'); ?>" data-src-retina="<?= base_url('assets/img/logo_white_2x.png'); ?>" height="22">
        <div class="sidebar-header-controls">
            <button type="button" class="btn btn-link hidden-md-down" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
            </button>
        </div>
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
            <li class="<?= $uri1 == 'dashboard' or $uri1 == '' ? ('m-t-30 active'):'' ?>">
                <a href="<?= base_url() ?>" class="detailed">
                    <span class="title">Dashboard</span>
                    <!-- <span class="details">12 New Updates</span> -->
                </a>
                <span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
            </li>
            <li class="<?= $uri1 == 'data_utama' ? ('open active') : ''; ?>">
                <a href="javascript:;">
                    <span class="title">Data Utama</span>
                    <span class=" arrow"></span>
                </a>
                <span class="icon-thumbnail"><i class="pg-note"></i></span>
                <ul class="sub-menu">
                    <li class="<?= $uri2 == 'data_pribadi' ? ('active') : ''; ?>">
                        <a href="<?= base_url() ?>data_utama/data_pribadi">Data Pribadi</a>
                    </li>
                    <li class="<?= $uri2 == 'identitas_pegawai' ? ('active') : ''; ?>">
                        <a href="<?= base_url() ?>data_utama/identitas_pegawai">Identitas Pegawai</a>
                    </li>
                    <li class="<?= $uri2 == 'data_fisik' ? ('active') : ''; ?>">
                        <a href="<?= base_url() ?>data_utama/data_fisik">Data Fisik</a>
                    </li>
                </ul>
            </li>
            <li class="<?= $uri1 == 'data_cpns_pns' ? ('open active') : ''; ?>">
                <a href="javascript:;">
                    <span class="title">Data CPNS & PNS</span>
                    <span class=" arrow"></span>
                </a>
                <span class="icon-thumbnail"><i class="pg-menu_lv"></i></span>
                <ul class="sub-menu">
                    <li class="<?= $uri2 == 'cpns' ? ('active') : '';?>">
                        <a href="<?= base_url() ?>data_cpns_pns/cpns">CPNS</a>
                    </li>
                    <li class="<?= $uri2 == 'pns' ? ('active') : '';?>">
                        <a href="<?= base_url() ?>data_cpns_pns/pns">PNS</a>
                    </li>
                </ul>
            </li>
            <li class="<?= $uri1 == 'data_riwayat' ? ('open active') :''; ?>">
                <a href="javascript:;">
                    <span class="title">Data Riwayat</span>
                    <span class=" arrow"></span>
                </a>
                <span class="icon-thumbnail"><i class="pg-calender"></i></span>
                <ul class="sub-menu">
                    <li class="<?= $uri2 == 'jabatan' ? ('active') : ''; ?>">
                        <a href="<?= base_url() ?>data_riwayat/jabatan">Jabatan</a>
                    </li>
                    <li class="<?= $uri2 == 'kepangkatan' ? ('active') : ''; ?>">
                        <a href="<?= base_url() ?>data_riwayat/kepangkatan">Kepangkatan</a>
                    </li>
                    <li class="<?= $uri2 == 'pendidikan' ? ('active') : ''; ?>">
                        <a href="<?= base_url() ?>data_riwayat/pendidikan">Pendidikan</a>
                    </li>
                    <li class="<?= $uri2 == 'diklat' ? ('active') : ''; ?>">
                        <a href="<?= base_url() ?>data_riwayat/diklat">Diklat</a>
                    </li>
                    <li class="<?= $uri2 == 'seminar' ? ('active') : ''; ?>">
                        <a href="<?= base_url() ?>data_riwayat/seminar">Seminar</a>
                    </li>
                    <li class="<?= $uri2 == 'hukuman_disiplin' ? ('active'):''; ?>">
                        <a href="<?= base_url() ?>data_riwayat/hukuman_disiplin">Hukuman Disiplin</a>
                    </li>
                    <li class="<?= $uri2 == 'kgb' ? ('active') : ''; ?>">
                        <a href="<?= base_url() ?>data_riwayat/kgb">Kenaikan Gaji Berkala</a>
                    </li>
                    <li class="<?= $uri2 == 'angka_kredit' ? ('active') : ''; ?>">
                        <a href="<?= base_url() ?>data_riwayat/angka_kredit">Angka Kredit</a>
                    </li>
                    <li class="<?= $uri2 == 'penghargaan' ? ('active') : ''; ?>">
                        <a href="<?= base_url() ?>data_riwayat/penghargaan">Tanda Jasa / Penghargaan</a>
                    </li>
                    <li class="<?= $uri2 == 'keluarga' ? ('open active') : ''; ?>">
                        <a href="javascript:;">
                            <span class="title">Keluarga</span>
                           <span class=" arrow"></span></a>
                        <span class="icon-thumbnail"><i class="fa fa-users"></i></span>
                        <ul class="sub-menu">
                            <li class="<?= $uri3 == 'orangtua' ? ('active') : ''; ?>">
                                <a href="<?= base_url() ?>data_riwayat/keluarga/orangtua">Data Orang Tua</a>
                            </li>
                            <li class="<?= $uri3 == 'pasangan' ? ('active') : ''; ?>">
                                <a href="<?= base_url() ?>data_riwayat/keluarga/pasangan">Data Pasangan</a>
                            </li>
                            <li class="<?= $uri3 == 'anak' ? ('active') : ''; ?>">
                                <a href="<?= base_url() ?>data_riwayat/keluarga/anak">Data Anak</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= $uri2 == 'cuti' ? ('active') : ''; ?>">
                        <a href="<?= base_url() ?>data_riwayat/cuti">Cuti</a>
                    </li>
                </ul>
            </li>
            <li class="<?= $uri1 == 'e_arsip' ? ('active'):'' ?>">
                <a href="<?= base_url('e_arsip') ?>" class="detailed">
                    <span class="title">e-Arsip</span>
                </a>
                <span class="bg-success icon-thumbnail"><i class="pg-bag"></i></span>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</nav>