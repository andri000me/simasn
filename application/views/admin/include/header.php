<style>
    .horizontal-app-menu .menu-bar > ul li > a{color: #121513;}
    .horizontal-app-menu .menu-bar > ul > li > a{color: #151b16;}
</style>
<div class="header p-r-0 bg-info w-100">
    <div class="header-inner header-md-height">
        <a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-menu text-white" data-toggle="horizontal-menu"></a>
        <div class="">
            <div class="brand inline no-border hidden-xs-down">
                <img src="<?= base_url(); ?>assets/admin/img/logo_white.png" alt="logo" data-src="<?= base_url(); ?>assets/admin/img/logo_white.png" data-src-retina="<?= base_url(); ?>assets/admin/img/logo_white_2x.png" width="78" height="22">
            </div>
            <ul class="hidden-md-down notification-list no-margin hidden-sm-down b-grey b-l b-r no-style p-l-30 p-r-10">
                <li class="p-r-10 inline">
                  <a href="<?= base_url() ?>" target="_blank" class="header-icon pg pg-world"></a>
                </li>
            </ul>
            <a href="#" class="search-link hidden-md-down" data-toggle="search"><i class="pg-search"></i>Pencarian <span class="bold">data</span></a>
        </div>
        <div class="d-flex align-items-center">
            <!-- START User Info-->
            <div class="pull-left p-r-10 fs-14 font-heading hidden-md-down text-white">
                <span class="semi-bold"><?= $this->session->userdata('nama') ?></span> <span class=""><small>[Admin]</small></span>
            </div>
            <div class="dropdown pull-right">
                <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="thumbnail-wrapper d32 circular inline sm-m-r-5">
                        <?php if(!empty($user['foto']) && file_exists('assets/asn/img/profiles/'.$user['foto'])): ?>
                            <img src="<?= base_url('assets/asn/img/profiles/'.$user['foto']) ?>" alt="" data-src="<?= base_url('assets/asn/img/profiles/'.$user['foto']); ?>" data-src-retina="<?= base_url('assets/asn/img/profiles/'.$user['foto']); ?>" width="32" height="32">
                        <?php else:?>
                            <img src="<?= base_url('assets/img/users.png') ?>" alt="" data-src="<?= base_url('assets/img/users.png'); ?>" data-src-retina="<?= base_url('assets/img/users.png'); ?>" width="32" height="32">
                        <?php endif;?>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                    <a href="<?= base_url() ?>profil" class="dropdown-item"><i class="fa fa-user"></i> Profil</a>
                    <a href="<?= base_url() ?>logout" class="clearfix bg-master-lighter dropdown-item">
                        <span class="pull-left">Logout</span>
                        <span class="pull-right"><i class="pg-power"></i></span>
                    </a>
                </div>
            </div>
            <!-- END User Info-->
        </div>
    </div>
    <div class="bg-white">
        <div class="container w-100">
            <div class="menu-bar header-sm-height" data-pages-init='horizontal-menu' data-hide-extra-li="0">
                <a href="#" class="btn-link toggle-sidebar hidden-lg-up pg pg-close" data-toggle="horizontal-menu">
                </a>
                <ul>
                    <li class="<?= $uri1 == 'admin' && $uri2 == 'dashboard' || $uri1=='admin' && $uri2=='' ? 'active' : '';?>">
                        <a href="<?= base_url(); ?>admin/dashboard">Dashboard</a>
                    </li>
                    <li class="<?= $uri2 == 'master_pegawai' ? 'active' : '';?>">
                        <a href="<?= base_url(); ?>admin/master_pegawai">Master Pegawai</a>
                    </li>

                    <li class="<?= $uri2 == 'validasi_data' ? 'active' : '';?>">
                        <a href="<?= base_url(); ?>admin/validasi_data">Validasi Data</a>
                    </li>
                    
                    <?php if($this->session->userdata('level_id')==1 || $this->session->userdata('level_id')==2): ?>
                    <li class="<?= $uri2 == 'tambah_pegawai' ? 'active' : ''; ?>">
                        <a href="<?= base_url(); ?>admin/tambah_pegawai">Tambah Pegawai</a>
                    </li>
                    <li class="<?= $uri2 == 'master_data' ? 'active' : '';?>">
                      <a href="javascript:;"><span class="title">Master Data</span><span class=" arrow"></span></a>
                      <ul class="">
                          <li>
                              <a href="<?= base_url() ?>admin/master_data/unit_kerja">Master Unit Kerja</a>
                          </li>
                          <li>
                              <a href="<?= base_url() ?>admin/master_data/organisasi">Master Organisasi</a>
                          </li>
                          <li>
                              <a href="<?= base_url() ?>admin/master_data/bidang">Master Bidang</a>
                          </li>
                          <li>
                              <a href="<?= base_url() ?>admin/master_data/pangkat"><span class="title">Master Pangkat</span>
                              <span class="arrow"></span></a>
                              <ul class="sub-menu">
                                  <li>
                                      <a href="<?= base_url() ?>admin/master_data/pangkat/golongan">Master Golongan</a>
                                  </li>
                              </ul>
                          </li>
                          <li>
                              <a href="<?= base_url() ?>admin/master_data/sub_bidang">Master Subbidang</a>
                          </li>
                          <li>
                              <a href="<?= base_url() ?>admin/master_data/jabatan"><span class="title">Master Jabatan</span>
                              <span class="arrow"></span></a>
                              <ul class="sub-menu">
                                  <li>
                                      <a href="<?= base_url() ?>admin/master_data/jabatan/jenis_jabatan">Master Jenis Jabatan</a>
                                  </li>
                                  <li>
                                      <a href="<?= base_url() ?>admin/master_data/jabatan/jenis_jabatan_administrasi">Master Jenis Jabatan Administrasi</a>
                                  </li>
                                  <li>
                                      <a href="<?= base_url() ?>admin/master_data/jabatan/kategori_jabatan">Master Kategori Jabatan</a>
                                  </li>
                                  <li>
                                      <a href="<?= base_url() ?>admin/master_data/jabatan/jenjang_jabatan">Master Jenjang Jabatan</a>
                                  </li>
                                  <li>
                                      <a href="<?= base_url() ?>admin/master_data/jabatan/kelompok_jabatan">Master Kelompok Jabatan</a>
                                  </li>
                                  <li>
                                      <a href="<?= base_url() ?>admin/master_data/jabatan/eselon">Master Eselon</a>
                                  </li>
                              </ul>
                          </li>
                          <li>
                              <a href="<?= base_url() ?>admin/master_data/hukuman"><span class="title">Master Hukuman</span>
                              <span class="arrow"></span></a>
                              <ul class="sub-menu">
                                  <li>
                                      <a href="<?= base_url() ?>admin/master_data/hukuman/jenis_hukuman">Jenis Hukuman</a>
                                  </li>
                              </ul>
                          </li>
                          <li>
                              <a href="<?= base_url() ?>admin/master_data/diklat"><span class="title">Master Diklat</span>
                              <span class="arrow"></span></a>
                              <ul class="sub-menu">
                                  <li>
                                      <a href="<?= base_url() ?>admin/master_data/diklat/jenis_diklat">Jenis Diklat</a>
                                  </li>
                              </ul>
                          </li>
                          <li>
                              <a href="<?= base_url() ?>admin/master_data/tupoksi">Master Tupoksi</a>
                          </li>
                          <li>
                              <a href="<?= base_url() ?>admin/master_data/tempat_kerja">Tempat Kerja</a>
                          </li>
                        
                      </ul>
                    </li>
                    <?php endif; ?>
                    <li class="<?= $uri2 == 'laporan' ? 'active' : '';?>">
                        <a href="javascript:;"><span class="title">Laporan</span><span class=" arrow"></span></a>
                        <ul class="">
                            <li>
                                <a href="<?= base_url() ?>admin/laporan/data_pilihan">Data Pilihan</a>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="title">PNS</span>
                                <span class="arrow"></span></a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/pns/semua_pns">Semua PNS</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/pns/pns_aktif">PNS Aktif</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/pns/pns_nonaktif">PNS Non Aktif</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/pns/pns_titipan">PNS Titipan</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/pns/pns_tugas_belajar">PNS Tugas Pelajar</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/pns/pns_cltn">PNS CTLN</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/pns/pns_keluar_berhenti">PNS Keluar/Berhenti</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/pns/pns_diberhentikan_sementara">PNS Diberhentikan Sementara</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>admin/laporan/kgb_terakhir">KGB Terakhir</a>
                            </li>
                            <li>
                                <a href="#"><span class="title">Riwayat</span>
                                <span class="arrow"></span></a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/riwayat/riwayat_kepangkatan">Riwayat Kepangkatan</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/riwayat/riwayat_jabatan">Riwayat Jabatan</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/riwayat/riwayat_pendidikan">Riwayat Pendidikan</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/riwayat/riwayat_diklat_struktural">Riwayat Diklat Struktural</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/riwayat/riwayat_diklat_teknis_fungsional">Riwayat Diklat Teknis & Fungsional</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="title">Daftar Nominatif</span><span class=" arrow"></span></a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/daftar_nominatif/duk">DUK</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/daftar_nominatif/cpns">CPNS</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/daftar_nominatif/pns_mpp">PNS MPP</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/daftar_nominatif/pns_akan_pensiun">PNS Akan Pensiun (5 Tahun ke depan)</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/daftar_nominatif/mutasi_keluar_daerah">Mutasi Keluar Daerah</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/daftar_nominatif/pns_yang_memperoleh_kgb">PNS yang memperoleh KGB</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/daftar_nominatif/pns_pendidikan">PNS Pendidikan</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/daftar_nominatif/pns_kenaikan_pangkat">PNS Kenaikan Pangkat</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/daftar_nominatif/pns_hukuman_disiplin">PNS Hukuman Disiplin</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/daftar_nominatif/pns_hukuman_disiplin_per_jenis_hukuman">PNS Hukuman Disiplin per Jenis Hukuman</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/daftar_nominatif/pns_yang_mendapat_reward">PNS yang mendapat reward</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;"><span class="title">Rekapitulasi</span><span class=" arrow"></span></a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/rekapitulasi/golongan">Golongan</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/rekapitulasi/pendidikan">Pendidikan</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/rekapitulasi/jabatan">Jabatan</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/rekapitulasi/eselon">Eselon</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/rekapitulasi/agama">Agama</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/rekapitulasi/masa_kerja">Masa Kerja</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/rekapitulasi/kelompok_usia">Kelompok Usia</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>admin/laporan/rekapitulasi/abk">Analis Beban Kerja (ABK)</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <?php if($this->session->userdata('level_id')==1 || $this->session->userdata('level_id')==2): ?>
                    <li class="<?= $uri2 == 'data_user' ? 'active' : '';?>">
                        <a href="<?= base_url(); ?>admin/data_user"><span class="title">Data User</span></a>
                    </li>
                    <li class="<?= $uri2 == 'import_database' ? 'active' : '';?>">
                        <a href="<?= base_url(); ?>admin/import_database"><span class="title">Import Database</span></a>
                    </li>
                    <?php endif;?>
                </ul>
                <a href="#" class="search-link d-flex justify-content-between align-items-center hidden-lg-up" data-toggle="search">Pencarian data <i class="pg-search float-right"></i></a>
                
                <!-- START OVERLAY -->
                <div class="overlay hide" data-pages="search">
                    <!-- BEGIN Overlay Content !-->
                    <div class="overlay-content has-results m-t-20">
                        <!-- BEGIN Overlay Header !-->
                        <div class="container-fluid">
                            <!-- BEGIN Overlay Logo !-->
                            <img class="overlay-brand" src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">
                            <!-- END Overlay Logo !-->
                            <!-- BEGIN Overlay Close !-->
                            <a href="#" class="close-icon-light overlay-close text-black fs-16"><i class="pg-close"></i></a>
                            <!-- END Overlay Close !-->
                        </div>
                        <!-- END Overlay Header !-->
                        <div class="container-fluid">
                            <!-- BEGIN Overlay Controls !-->
                            <input class="no-border overlay-search bg-transparent"  placeholder="Search..." onkeyup="myFunction($(this).val())" autocomplete="off" spellcheck="false">
                            <br>
                            <div class="inline-block">
                                <div class="checkbox right">
                                <input id="checkboxn" type="checkbox" value="1" checked="checked">
                                <label for="checkboxn"><i class="fa fa-search"></i> Search within page</label>
                                </div>
                            </div>
                            <div class="inline-block m-l-10">
                                <p class="fs-13">Press enter to search</p>
                            </div>
                            <!-- END Overlay Controls !-->
                        </div>
                        <!-- BEGIN Overlay Search Results, This part is for demo purpose, you can add anything you like !-->
                        <div class="container-fluid">
                            <span><strong>suggestions :</strong></span>
                            <span id="overlay-suggestions"></span>
                            <br>
                            <div class="search-results m-t-40">
                                <p class="bold">Pages Search Results</p>
                                <div class="row">
                                    <div id="result" class="col-md-12">
                                        <!-- BEGIN Search Result Item !-->
                                        <div class="">
                                            <!-- BEGIN Search Result Item Thumbnail !-->
                                            <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
                                                <div>
                                                    <img width="50" height="50" src="assets/img/profiles/avatar.jpg" data-src="assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" alt="">
                                                </div>
                                            </div>
                                            <!-- END Search Result Item Thumbnail !-->
                                            <div class="p-l-10 inline p-t-5">
                                                <h5 class="m-b-5"><span class="semi-bold result-name">ice cream</span> on pages</h5>
                                                <p class="hint-text">via john smith</p>
                                            </div>
                                        </div>
                                        <!-- END Search Result Item !-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Overlay Search Results !-->
                    </div>
                    <!-- END Overlay Content !-->
                </div>
                <!-- END OVERLAY -->        
               
            </div>
        </div>
    </div>

</div>
<script>
    function myFunction(key){
            $.ajax({
                url : "<?= base_url();?>get_data/searchki",
                method : "POST",
                data : {key: key},
                dataType : 'json',
                success : function(data){
                    var html;
                    var i;
                    if(data.length > 0){
                        for(i=0; i<20; i++){
                            html += '<div class="p-l-50">';
                            html += '<div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">';
                            html += '<img width="50" height="50" src="<?= base_url()?>assets/asn/img/profiles/'+data[i].foto+'" data-src="<?= base_url()?>assets/asn/img/profiles/'+data[i].foto+'" data-src-retina="<?= base_url()?>assets/asn/img/profiles/'+data[i].foto+'" alt="">';
                            html += '</div>';
                            html += '<div class="p-l-50">';
                            html += '<h5 class="no-margin "><a href="<?= base_url()?>admin/master_pegawai/detail_pegawai/'+data[i].nipenc+'"><span class="semi-bold">'+data[i].nip+'</span> ['+data[i].nama+']</a></h5>';
                            html += '<p class="p-l-10 small-text hint-text">'+data[i].nm_unitkerja+'</p>';
                            html += '</div>';
                            html += '</div>';
                        }
                        $('#result').html(html);
                    }
                }
            });
            
        }
</script>