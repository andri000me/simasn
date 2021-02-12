<?php

class Laporan_model extends CI_Model
{
    

    // start datatables pns
    // var $rekapitulasi = array('golongan','pendidikan','jabatan','eselon','agama','masa_kerja','kelompok_usia','abk');
    // var $column_order_pns = array(null, 'nip','nama','gelardepan', 'gelarbelakang','tempatlahir','tanggallahir','nm_kelamin','nm_agama','nm_skawin','noktp','notlpx','email','alamat','nonpwp','nobpjs','jenis_pegawai','nokarpeg','no_sk_cpns','tgl_sk_cpns','tmt_cpns','no_sk_pns','tgl_sk_pns','tmt_pns','golongan_awal','golongan','tmt_pangkat','mkg_bulan','mkg_tahun','jenis_jabatan', 'nm_jabatan','tmt_jabatan','nm_jpendidikan','tgl_lulus', 'nm_unitkerja', 'nm_kedudukan','nm_bidang', 'nm_subbidang','no_sk_kgb','tgl_sk_kgb','tmt_kgb','nm_diklat','tgl_sertifikat_diklat','jam_diklat'); //set column field database for datatable orderable
    // var $column_select_pns = array('idv','nip','nama','gelardepan', 'gelarbelakang','tempatlahir','tanggallahir','nm_kelamin','nm_agama','nm_skawin','noktp','notlpx','email','alamat','nonpwp','nobpjs','jenis_pegawai','nokarpeg','no_sk_cpns','tgl_sk_cpns','tmt_cpns','no_sk_pns','tgl_sk_pns','tmt_pns','golongan_awal','golongan','tmt_pangkat','mkg_bulan','mkg_tahun','jenis_jabatan', 'nm_jabatan','tmt_jabatan','nm_jpendidikan','tgl_lulus', 'nm_unitkerja', 'nm_kedudukan','nm_bidang', 'nm_subbidang','no_sk_kgb','tgl_sk_kgb','tmt_kgb','nm_diklat','tgl_sertifikat_diklat','jam_diklat'); //set column field database for datatable searchable
    // var $column_search_pns = array('nip','nama','nm_kelamin','nm_agama','nm_skawin','noktp','notlpx','email','alamat','nonpwp','nobpjs','jenis_pegawai','nokarpeg','golongan_awal','golongan','jenis_jabatan', 'nm_jabatan','tmt_jabatan','nm_jpendidikan','nm_unitkerja', 'nm_kedudukan','nm_bidang', 'nm_subbidang','nm_diklat'); //set column field database for datatable searchable
    // var $order_pns = array('idv' => 'asc'); // default order
    private function _form_input()
    {
        $data['indukuri'] = $this->input->post('indukuri');
        $data['uri4'] = $this->input->post('uri');
        $data['ukid'] = $this->input->post('ukid');
        $data['golid'] = $this->input->post('golid');
        $data['lvlid'] = $this->session->userdata('level_id');
        $data['iduk'] = $this->session->userdata('skpd_id');
        return $data;
    }
    
    function table()
    {
        $indukuri = $this->input->post('indukuri');
        $uri = $this->input->post('uri');
        if($indukuri=='pns' || $indukuri=='search_pns'): $this->db->from('view_asn'); endif;
        if($indukuri=='kgb_terakhir'): $this->db->order_by('tmt_kgb','desc') ;$this->db->from('view_kgb');  endif;
        if($indukuri=='riwayat'):
            if($uri=='riwayat_kepangkatan'):
                $this->db->order_by('nip', 'desc');
                $this->db->from('mod_pangkat mop');
                $this->db->join('mod_datapribadi mod', 'mod.nip = mop.nip', 'left');
                $this->db->join('mod_identitas moi', 'moi.nip = mop.nip', 'left');
                $this->db->join('mod_user mou', 'mou.nip = mop.nip', 'left');
                $this->db->join('master_golongan mg', 'mg.id_golongan = mop.golongan_id', 'left');
                $this->db->join('master_kepangkatan mkp', 'mkp.id_kepangkatan = mop.kepangkatan_id', 'left');
                $this->db->join('master_unitkerja mu', 'mu.id_unitkerja = mop.unitkerja_id', 'left');
            endif;
            if($uri=='riwayat_jabatan'):
                $this->db->order_by('nip', 'desc');
                $this->db->from('mod_jabatan moj');
                $this->db->join('mod_datapribadi mod', 'mod.nip = moj.nip', 'left');
                $this->db->join('mod_identitas moi', 'moi.nip = moj.nip', 'left');
                $this->db->join('mod_user mou', 'mou.nip = moj.nip', 'left');
                $this->db->join('master_jabatan mj', 'mj.id_jabatan = moj.jabatan_id', 'left');
                $this->db->join('master_jenis_jabatan mjj', 'mjj.id_jenis_jabatan = moj.jenis_jabatan_id', 'left');
                $this->db->join('master_jenjang_jabatan mtj', 'mtj.id_jenjang_jabatan = moj.jenjab_id', 'left');
                $this->db->join('master_bidang mb', 'mb.id_bidang = moj.bagian_id', 'left');
                $this->db->join('master_subbidang msb', 'msb.id_subbidang = moj.subbagian_id', 'left');
                $this->db->join('master_eselon me', 'me.id_eselon = moj.eselon_id', 'left');
                $this->db->join('master_unitkerja mu', 'mu.id_unitkerja = moj.unitkerja_id', 'left');
            endif;  
            if($uri=='riwayat_pendidikan'):
                $this->db->order_by('nip', 'desc');
                $this->db->from('mod_pendidikan moe');
                $this->db->join('mod_datapribadi mod', 'mod.nip = moe.nip', 'left');
                $this->db->join('mod_identitas moi', 'moi.nip = moe.nip', 'left');
                $this->db->join('mod_user mou', 'mou.nip = moe.nip', 'left');
                $this->db->join('master_jpendidikan mjp', 'mjp.id_jpendidikan = moe.jpendidikan_id', 'left');
                $this->db->join('master_unitkerja mu', 'mu.id_unitkerja = moe.unitkerja_id', 'left');
            endif;
            if($uri=='riwayat_diklat_struktural'):
                $this->db->order_by('nip', 'desc');
                $this->db->from('mod_dikstruktural mdi');
                $this->db->join('master_jenis_diklat mjd', 'mjd.id_jenis_diklat = mdi.jenisdiklat_id', 'left');
                $this->db->join('mod_datapribadi mod', 'mod.nip = mdi.nip', 'left');
                $this->db->join('mod_identitas moi', 'moi.nip = mdi.nip', 'left');
                $this->db->join('mod_user mou', 'mou.nip = mdi.nip', 'left');
            endif;
            if($uri=='riwayat_diklat_teknis_fungsional'):
                $this->db->order_by('nip', 'desc');
                $this->db->from('mod_dikfungsional mdf');
                $this->db->join('master_dikfungsional dif', 'dif.id_dikfungsional = mdf.diklatfungsional_id', 'left');
                $this->db->join('mod_datapribadi mod', 'mod.nip = mdf.nip', 'left');
                $this->db->join('mod_identitas moi', 'moi.nip = mdf.nip', 'left');
                $this->db->join('mod_user mou', 'mou.nip = mdf.nip', 'left');
            endif;
        endif;
        if($indukuri=='daftar_nominatif'):
            if($uri=='duk'):
                $this->db->from('view_duk');  
            endif;
            if($uri=='cpns'):
                $this->db->from('view_nominatif_cpns');  
            endif;
            if($uri=='pns_mpp'):
                $this->db->from('view_asn');  
            endif;
            if($uri=='pns_akan_pensiun'):
                $this->db->from('view_kebutuhan_data_pensiun_mutasi');  
            endif;
            if($uri =='mutasi_keluar_daerah'):
                $this->db->from('view_kebutuhan_data_pensiun_mutasi');  
            endif;
            if($uri =='pns_pendidikan'):
                $this->db->from('view_nominatif_pendidikan_s1');  
            endif;
        endif;

        if($indukuri=='rekapitulasi'):
            if($uri=='golongan'):
                $this->db->from('view_lastriwayat');    
            endif;
            if($uri=='agama'):
                $this->db->from('mod_datapribadi mod');    
                $this->db->join('mod_identitas moi', 'moi.nip = mod.nip', 'left');    
                $this->db->join('mod_user mos', 'mos.nip = mod.nip', 'left');    
                $this->db->join('master_agama ma', 'ma.id_agama = mod.agama', 'left');    
                $this->db->join('master_unitkerja mu', 'mu.id_unitkerja = mod.unitkerja_id', 'left');    
            endif;
        endif;
    }

    function costum()
    {
        $data = $this->_form_input();
        $indukuri = $data['indukuri'];
        $uri4 = $data['uri4'];
        $ukid = $data['ukid'];
        $golid = $data['golid'];
        $jedu = $this->input->post('jedu');
        $mpangkat = $this->input->post('mpangkat');
        $jenis = $this->input->post('jenis');
        $jenjang = $this->input->post('jenjang');
        $lvlid = $data['lvlid'];
        $iduk = $data['iduk'];

        if($indukuri=='pns' || $indukuri=='search_pns'): 
            if($lvlid > 2 &&  $lvlid < 5):
                $this->db->where(array('unitkerja_id'=>$this->session->userdata('skpd_id')));
            endif;
            if($uri4=='semua_pns'):
                $this->db->where(array('status_pegawai'=> 1, 'kedudukan_id <='=> 7));
            endif;
            if($uri4=='pns_aktif'):
                $this->db->where(array('kedudukan_id' => 1));
            endif;
            if($uri4=='pns_nonaktif'):
                $this->db->where(array('status_pegawai'=> 2));
            endif;
            if($uri4=='pns_titipan'):
                $this->db->where(array('kedudukan_id'=> 3));
            endif;
            if($uri4=='pns_tugas_belajar'):
                $this->db->where(array('kedudukan_id'=> 2));
            endif;
            if($uri4=='pns_cltn'):
                $this->db->where(array('kedudukan_id'=> 6));
            endif;
            if($uri4=='pns_keluar_berhenti'):
                $this->db->where(array('kedudukan_id >='=> 8, 'kedudukan_id <='=> 12));
            endif;
            if($uri4=='pns_diberhentikan_sementara'):
                $this->db->where(array('kedudukan_id'=> 7));
            endif;
            if(!empty($ukid)):
                $this->db->where(array('unitkerja_id' => decrypt_url($ukid)));
            endif;
            if(!empty($golid)):
                $this->db->where(array('id_golongan' => decrypt_url($golid)));
            endif;

        endif;
        if($indukuri=='kgb_terakhir'):
            if($lvlid==1 || $lvlid==2 ):
                $this->db->where(array('status_pegawai'=> 1));
            endif;
            if($lvlid > 2 &&  $lvlid < 5):
                $this->db->where(array('status_pegawai'=> 1, 'unitkerja_id'=>$this->session->userdata('skpd_id')));
            endif;
            if(!empty($ukid)):
                $this->db->where(array('unitkerja_id' => decrypt_url($ukid)));
            endif;
            if(!empty($golid)):
                $this->db->where(array('golongan_id' => decrypt_url($golid)));
            endif;
        endif;
        if($indukuri=='riwayat'):
            $vamas = $this->input->post('vamas');
            if($lvlid==1 || $lvlid==2 ):
                $this->db->where(array('moi.status_pegawai'=> 1));
            endif;
            if($lvlid > 2 &&  $lvlid < 5):
                $this->db->where(array('moi.status_pegawai'=> 1, 'mod.unitkerja_id'=>$this->session->userdata('skpd_id')));
            endif;
            if(!empty($ukid)):
                $this->db->where(array('mod.unitkerja_id' => decrypt_url($ukid)));
            endif;
            if($uri4=='riwayat_kepangkatan'):
                if(!empty($vamas)):
                    $this->db->where(array('mop.golongan_id' => decrypt_url($vamas)));
                endif;
                if(!empty($mpangkat)):
                    $this->db->where(array('mop.kepangkatan_id' => decrypt_url($mpangkat)));
                endif;
            endif;
            if($uri4=='riwayat_jabatan'):
                if(!empty($vamas)):
                    $this->db->where(array('moj.eselon_id' => decrypt_url($vamas)));
                endif;
                if(!empty($jenis)):
                    $this->db->where(array('moj.jenis_jabatan_id' => decrypt_url($jenis)));
                endif;
                if(!empty($jenjang)):
                    $this->db->where(array('moj.jenjab_id' => decrypt_url($jenjang)));
                endif;
            endif;
            if($uri4=='riwayat_pendidikan'):
                if(!empty($vamas)):
                    $this->db->where(array('moe.jpendidikan_id' => decrypt_url($vamas)));
                endif;
                if(!empty($jedu)):
                    $this->db->where(array('moe.jenis_pendidikan' => $jedu));
                endif;
            endif;
            if($uri4=='riwayat_diklat_struktural' && !empty($vamas)):
                $this->db->where(array('mdi.jenisdiklat_id' => decrypt_url($vamas)));
            endif;
            if($uri4=='riwayat_diklat_teknis_fungsional' && !empty($vamas)):
                $this->db->where(array('mdf.diklatfungsional_id' => decrypt_url($vamas)));
            endif;
            
        endif;
        if($indukuri=='daftar_nominatif'): 
            $vamas = $this->input->post('vamas');
            if($lvlid==1 || $lvlid==2 ):
                $this->db->where(array('status_pegawai'=> 1));
            endif;
            if($lvlid > 2 &&  $lvlid < 5):
                $this->db->where(array('status_pegawai'=> 1, 'unitkerja_id'=>$this->session->userdata('skpd_id')));
            endif;
            if($uri4=='duk'):
                if(!empty($vamas)):
                    $this->db->where(array('id_golongan' => decrypt_url($vamas)));
                endif;
            endif;
            if($uri4=='cpns'):
                if(!empty($vamas)):
                    $this->db->where(array('golongan_awal_id' => decrypt_url($vamas)));
                endif;
            endif;
            if($uri4=='pns_mpp'):
                $tglawal = date('Y-m-d');
                $tanggalatas = date('Y-m', strtotime('-60 year', strtotime($tglawal))); //tambah tanggal sebanyak 6 tahun
                $tanggalatas = date('Y-m', strtotime('+1 month', strtotime($tanggalatas))); //tambah tanggal sebanyak 6 tahun
                $tanggalbawah = date('Y-m', strtotime('-59 year', strtotime($tglawal))); //tambah tanggal sebanyak 6 tahun
                $tanggalbawah = date('Y-m', strtotime('+1 month', strtotime($tanggalbawah))); //tambah tanggal sebanyak 6 tahun
                // echo $tanggalselisih;
                $this->db->where(array('status_pegawai'=> 1,'level_id >='=>$lvlid, 'level_id <'=>6, 'tanggallahir >=' => $tanggalatas.'-01', 'tanggallahir <' => $tanggalbawah.'-01'));
                if(!empty($vamas)):
                    $this->db->where(array('id_golongan' => decrypt_url($vamas)));
                endif;
            elseif($uri4=='pns_akan_pensiun'):
                $tglawal = date('Y-m-d');
                $litade = date('Y-m', strtotime('+5 year', strtotime($tglawal))); //tambah tanggal sebanyak 6 tahun
                $tanggalatas = date('Y-m', strtotime('-60 year', strtotime($litade))); //tambah tanggal sebanyak 6 tahun
                $tanggalatas = date('Y-m', strtotime('+1 month', strtotime($tanggalatas))); //tambah tanggal sebanyak 6 tahun
                $tanggalbawah = date('Y-m', strtotime('-55 year', strtotime($litade))); //tambah tanggal sebanyak 6 tahun
                $tanggalbawah = date('Y-m', strtotime('+1 month', strtotime($tanggalbawah))); //tambah tanggal sebanyak 6 tahun
                // echo $tanggalselisih;
                $this->db->where(array('status_pegawai'=> 1,'level_id >='=>$lvlid, 'level_id <'=>6, 'tanggallahir >=' => $tanggalatas.'-01', 'tanggallahir <' => $tanggalbawah.'-01'));
                if(!empty($vamas)):
                    $this->db->where(array('golongan_id' => decrypt_url($vamas)));
                endif;
            elseif($uri4=='mutasi_keluar_daerah'):
                $this->db->where(array('kedudukan_id'=> 10));
            elseif($uri4=='pns_pendidikan'):
                if(!empty($vamas)):
                    $this->db->where(array('golongan_id' => decrypt_url($vamas)));
                endif;
                if(!empty($jedu)):
                    $this->db->where(array('jpendidikan_id' => decrypt_url($jedu)));
                endif;
            else:
                $this->db->where(array('status_pegawai'=> 1));
            endif;
            if(!empty($ukid)):
                $this->db->where(array('unitkerja_id' => decrypt_url($ukid)));
            endif;
            
        endif;
        
    }

    function column_order()
    {
        $indukuri = $this->input->post('indukuri');
        $uri = $this->input->post('uri');
        if($indukuri=='pns' || $indukuri=='search_pns'):
            $data = array(null, 'nip','nip_lama','nama','gelardepan', 'gelarbelakang','tempatlahir','tanggallahir','nm_kelamin','nm_agama','skawin','nm_skawin','id_eselon','eselon','noktp','notlpx','email','alamat','nonpwp','nobpjs','jenis_pegawai','nokarpeg','no_sk_cpns','tgl_sk_cpns','tmt_cpns','no_sk_pns','tgl_sk_pns','tmt_pns','golongan_awal','golongan','tmt_pangkat','mkg_bulan','mkg_tahun','jenis_jabatan_id','jenis_jabatan','jabatan_id', 'nm_jabatan','jenjang_jabatan','tmt_jabatan','nm_jpendidikan','tgl_lulus', 'nm_unitkerja', 'nm_kedudukan','nm_bidang','subbagian_id', 'nm_subbidang','no_sk_kgb','tgl_sk_kgb','tmt_kgb','gaji_pokok','nm_diklat','tgl_sertifikat_diklat','jam_diklat'); //set column field database for datatable orderable
        endif;
        if($indukuri=='kgb_terakhir'): 
            $data = array(null, 'nip','nama','gelardepan','gelarbelakang','nm_unitkerja', 'golongan','tmt_kgb','no_sk_kgb','tgl_sk_kgb','mkg_bulan','mkg_tahun','gaji_pokok'); //set column field database for datatable orderable
        endif;
        if($indukuri=='riwayat'):
            if($uri=='riwayat_kepangkatan'):
                $data = array(null, 'mop.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','mkp.nm_kepangkatan','mg.golongan','mg.pangkat','mop.tmt_pangkat','mop.sk_nomor','mop.tgl_bakn','mop.no_bakn','mop.sk_tanggal','mop.masa_kerja_golongan_tahun mkg_tahun','mop.masa_kerja_golongan_bulan mkg_bulan','mop.pejabat_penetap', 'mj.nm_jabatan','mu.nm_unitkerja','mod.unitkerja_id','moi.status_pegawai','mou.level_id');
            endif;
            if($uri=='riwayat_jabatan'):
                $data = array(null, 'moj.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','moj.jabatan_id','moj.jenis_jabatan_id','mjj.jenis_jabatan','mtj.jenjang_jabatan','moj.eselon_id','me.eselon', 'mj.nm_jabatan','moj.tgl_sk','moj.no_sk','moj.tmt_jabatan','moj.tmt_pelantikan','moj.pejabat_sk','moj.bagian_id','mb.nm_bidang','moj.subbagian_id','msb.nm_subbidang', 'mu.nm_unitkerja','mod.unitkerja_id','moi.status_pegawai','mou.level_id');
            endif;
            if($uri=='riwayat_pendidikan'):
                $data = array(null, 'moe.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','moe.jenis_pendidikan','moe.jurusan','moe.nm_lembaga', 'mjp.nm_jpendidikan','moe.no_ijazah','moe.tgl_lulus','moe.nm_kepala', 'mu.nm_unitkerja','mod.unitkerja_id','moi.status_pegawai','mou.level_id');
            endif;
            if($uri=='riwayat_diklat_struktural'):
                $data = array(null, 'mdi.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','mjd.jenis_diklat','mdi.diklat','mdi.penyelenggara', 'mdi.jam','mdi.no_sertifikat','mdi.tgl_sertifikat');
            endif;
            if($uri=='riwayat_diklat_teknis_fungsional'):
                $data = array(null, 'mdf.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','dif.nm_dikfungsional','mdf.diklat','mdf.penyelenggara', 'mdf.jam','mdf.no_sertifikat','mdf.tgl_sertifikat');
            endif;
        endif;
        if($indukuri=='daftar_nominatif'):
            if($uri=='duk'):
                $data = array(null, 'nip','nama','gelardepan','gelarbelakang','golongan','tmt_pangkat','mkg_tahun','mkg_bulan','nm_jabatan','eselon','tmt_jabatan','nm_diklat','tgl_sertifikat_diklat','jam_diklat','nm_lembaga','jurusan', 'tgl_lulus', 'nm_jpendidikan','tanggallahir','nm_unitkerja'); //set column field database for datatable orderable
            endif;
            if($uri=='cpns'):
                $data = array(null, 'nip','nama','gelardepan','gelarbelakang','golongan_awal','tmt_cpns','no_sk_cpns','mkg_tahun_cpns','mkg_bulan_cpns','nm_jabatan','tmt_jabatan','nm_lembaga','jurusan', 'tgl_lulus', 'nm_jpendidikan','nm_unitkerja'); //set column field database for datatable orderable
            endif;
            if($uri=='pns_mpp'):
                $data = array(null, 'nip','nama','gelardepan', 'gelarbelakang','tanggallahir','eselon','jenis_pegawai','no_sk_pns','tgl_sk_pns','tmt_pns','golongan','tmt_pangkat','mkg_bulan','mkg_tahun','nm_jabatan','tmt_jabatan', 'nm_unitkerja', 'nm_kedudukan','status_pegawai'); //set column field database for datatable orderable
            endif;
            if($uri=='pns_akan_pensiun'):
                $data = array(null, 'nip','nama','gelardepan', 'gelarbelakang','tanggallahir','eselon','no_sk_pns','tgl_sk_pns','tmt_pns','golongan','tmt_pangkat','mkg_bulan','mkg_tahun','nm_jabatan','tmt_jabatan','jenis_jabatan', 'nm_unitkerja', 'nm_kedudukan','status_pegawai'); //set column field database for datatable orderable
            endif;
            if($uri=='mutasi_keluar_daerah'):
                $data = array(null, 'nip','nama','gelardepan', 'gelarbelakang','tanggallahir','eselon','no_sk_pns','tgl_sk_pns','tmt_pns','tmt_statuspns','golongan','tmt_pangkat','mkg_bulan','mkg_tahun','nm_jabatan','tmt_jabatan','jenis_jabatan', 'nm_unitkerja', 'nm_kedudukan','status_pegawai'); //set column field database for datatable orderable
            endif;
            if($uri=='pns_pendidikan'):
                $data = array(null, 'nip','nama','gelardepan', 'gelarbelakang','eselon','golongan','tmt_pangkat','nm_jabatan','tmt_jabatan','jenis_jabatan','jurusan','nm_jpendidikan' ,'nm_unitkerja'); //set column field database for datatable orderable
            endif;
            if($uri=='pns_hukuman_disiplin'):
                $data='adsad';
            endif;
        endif;
        if($indukuri=='rekapitulasi'):
            if($uri=='golongan'):
                $data = array(null, 'unitkerja_id','nm_unitkerja', 'golongan_id','golongan','kelamin_id','nm_kelamin'); //set column field database for datatable orderable
            endif;
            if($uri=='agama'):
                $data = array(null, 'unitkerja_id','nm_unitkerja', 'agama','nm_agama','kelamin_id','nm_kelamin'); //set column field database for datatable orderable
            endif;
        endif;
        return $data;
    }

    function column_select()
    {
        $indukuri = $this->input->post('indukuri');
        $uri = $this->input->post('uri');
        if($indukuri=='pns' || $indukuri=='search_pns'):
            $data = array('nip','nip_lama','nama','gelardepan', 'gelarbelakang','tempatlahir','tanggallahir','nm_kelamin','nm_agama','skawin','nm_skawin','id_eselon','eselon','noktp','notlpx','email','alamat','nonpwp','nobpjs','jenis_pegawai','nokarpeg','no_sk_cpns','tgl_sk_cpns','tmt_cpns','no_sk_pns','tgl_sk_pns','tmt_pns','golongan_awal','golongan','tmt_pangkat','mkg_bulan','mkg_tahun','jenis_jabatan_id','jenis_jabatan','jabatan_id', 'nm_jabatan','tmt_jabatan','jenjang_jabatan','nm_jpendidikan','tgl_lulus', 'nm_unitkerja', 'nm_kedudukan','nm_bidang','subbagian_id', 'nm_subbidang','no_sk_kgb','tgl_sk_kgb','tmt_kgb','gaji_pokok','nm_diklat','tgl_sertifikat_diklat','jam_diklat'); //set column field database for datatable orderable
        endif;
        if($indukuri=='kgb_terakhir'): 
            $data = array('nip','nama','gelardepan','gelarbelakang','nm_unitkerja', 'golongan','tmt_kgb','no_sk_kgb','tgl_sk_kgb','mkg_bulan','mkg_tahun','gaji_pokok'); //set column field database for datatable orderable
        endif;
        if($indukuri=='riwayat'):
            if($uri=='riwayat_kepangkatan'):
                $data = array('mop.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','mkp.nm_kepangkatan','mop.golongan_id','mg.pangkat','mg.golongan','mop.tmt_pangkat','mop.sk_nomor','mop.tgl_bakn','mop.no_bakn','mop.sk_tanggal','mop.masa_kerja_golongan_tahun mkg_tahun','mop.masa_kerja_golongan_bulan mkg_bulan','mop.pejabat_penetap', 'mu.nm_unitkerja','mod.unitkerja_id skpdid','moi.status_pegawai','mou.level_id');
            endif;
            if($uri=='riwayat_jabatan'):
                $data = array('moj.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','mjj.jenis_jabatan','mtj.jenjang_jabatan','moj.eselon_id','me.eselon','moj.jabatan_id','moj.jenis_jabatan_id', 'mj.nm_jabatan','moj.tgl_sk','moj.no_sk','moj.tmt_jabatan','moj.tmt_pelantikan','moj.pejabat_sk','moj.bagian_id','mb.nm_bidang','moj.subbagian_id','msb.nm_subbidang','mod.unitkerja_id skpdid','moi.status_pegawai','mou.level_id');
            endif;
            if($uri=='riwayat_pendidikan'):
                $data = array('moe.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','moe.jenis_pendidikan','moe.jurusan','moe.nm_lembaga', 'mjp.nm_jpendidikan','moe.no_ijazah','moe.tgl_lulus','moe.nm_kepala', 'mu.nm_unitkerja','mod.unitkerja_id skpdid','moi.status_pegawai','mou.level_id');
            endif;
            if($uri=='riwayat_diklat_struktural'):
                $data = array('mdi.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','mjd.jenis_diklat','mdi.diklat','mdi.penyelenggara', 'mdi.jam','mdi.no_sertifikat','mdi.tgl_sertifikat','mod.unitkerja_id','moi.status_pegawai','mou.level_id');
            endif;
            if($uri=='riwayat_diklat_teknis_fungsional'):
                $data = array('mdf.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','dif.nm_dikfungsional','mdf.diklat','mdf.penyelenggara', 'mdf.jam','mdf.no_sertifikat','mdf.tgl_sertifikat','mod.unitkerja_id','moi.status_pegawai','mou.level_id');
            endif;
        endif;
        if($indukuri=='daftar_nominatif'):
            if($uri=='duk'):
                $data = array('nip','nama','gelardepan','gelarbelakang','golongan','tmt_pangkat','mkg_tahun','mkg_bulan','nm_jabatan','eselon','tmt_jabatan','nm_diklat','tgl_sertifikat_diklat','jam_diklat','nm_lembaga','jurusan', 'tgl_lulus', 'nm_jpendidikan','tanggallahir','nm_unitkerja','status_pegawai','level_id');//set column field database for datatable orderable
            endif;
            if($uri=='cpns'):
                $data = array('nip','nama','gelardepan','gelarbelakang','golongan_awal','tmt_cpns','no_sk_cpns','mkg_tahun_cpns','mkg_bulan_cpns','nm_jabatan','tmt_jabatan','nm_lembaga','jurusan', 'tgl_lulus', 'nm_jpendidikan','nm_unitkerja','status_pegawai','level_id'); //set column field database for datatable orderable
            endif;
            if($uri=='pns_mpp'):
                $data = array('nip','nama','gelardepan', 'gelarbelakang','tanggallahir','eselon','jenis_pegawai','no_sk_pns','tgl_sk_pns','tmt_pns','golongan','tmt_pangkat','mkg_bulan','mkg_tahun','nm_jabatan','tmt_jabatan','nm_unitkerja', 'nm_kedudukan','status_pegawai','level_id'); //set column field database for datatable orderable
            endif;
            if($uri=='pns_akan_pensiun'):
                $data = array('nip','nama','gelardepan', 'gelarbelakang','tanggallahir','eselon_id','eselon','no_sk_pns','tgl_sk_pns','tmt_pns','golongan_id','golongan','tmt_pangkat','mkg_bulan','mkg_tahun','nm_jabatan','tmt_jabatan','jenis_jabatan','unitkerja_id','nm_unitkerja', 'nm_kedudukan','status_pegawai'); //set column field database for datatable orderable
            endif;
            if($uri=='mutasi_keluar_daerah'):
                $data = array('nip','nama','gelardepan', 'gelarbelakang','tanggallahir','eselon_id','eselon','no_sk_pns','tgl_sk_pns','tmt_pns','tmt_statuspns','golongan_id','golongan','tmt_pangkat','mkg_bulan','mkg_tahun','nm_jabatan','tmt_jabatan','jenis_jabatan','unitkerja_id','nm_unitkerja', 'nm_kedudukan','status_pegawai'); //set column field database for datatable orderable
            endif;
            if($uri=='pns_pendidikan'):
                $data = array('nip','nama','gelardepan', 'gelarbelakang','eselon_id','eselon','golongan_id','golongan','tmt_pangkat','nm_jabatan','tmt_jabatan','jenis_jabatan','jurusan','nm_jpendidikan','unitkerja_id' ,'nm_unitkerja','status_pegawai','level_id'); //set column field database for datatable orderable
            endif;
        endif;
        if($indukuri=='rekapitulasi'):
            if($uri=='golongan'):
                $data = array('unitkerja_id','nm_unitkerja', 'golongan_id','golongan','kelamin_id','nm_kelamin'); //set column field database for datatable orderable
            endif;
            if($uri=='agama'):
                $data = array(null, 'unitkerja_id','nm_unitkerja', 'agama','nm_agama','kelamin_id','nm_kelamin'); //set column field database for datatable orderable
            endif;
        endif;
        return $data;
    }

    function column_search()
    {
        $indukuri = $this->input->post('indukuri');
        $uri = $this->input->post('uri');
        if($indukuri=='pns' || $indukuri=='search_pns'):
            $data = array('nip','nama','nm_kelamin','nm_agama','nm_skawin','noktp','notlpx','email','alamat','nonpwp','nobpjs','jenis_pegawai','nokarpeg','golongan_awal','golongan','jenis_jabatan', 'nm_jabatan','tmt_jabatan','nm_jpendidikan','nm_unitkerja', 'nm_kedudukan','nm_bidang', 'nm_subbidang','nm_diklat');
        endif;
        if($indukuri=='kgb_terakhir'): 
            $data = array('nip','nama','nm_unitkerja', 'golongan','no_sk_kgb'); //set column field database for datatable orderable
        endif;
        if($indukuri=='riwayat'):
            if($uri=='riwayat_kepangkatan'):
                $data = array('mop.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','mkp.nm_kepangkatan','mg.pangkat','mg.golongan','mop.sk_nomor','mop.no_bakn','mop.sk_tanggal','mop.pejabat_penetap','mu.nm_unitkerja');
            endif;
            if($uri=='riwayat_jabatan'):
                $data = array('moj.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','mjj.jenis_jabatan','me.eselon', 'mj.nm_jabatan','moj.no_sk','moj.pejabat_sk', 'mu.nm_unitkerja');
            endif;
            if($uri=='riwayat_pendidikan'):
                $data = array('moe.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','moe.jenis_pendidikan','moe.jurusan','moe.nm_lembaga', 'mjp.nm_jpendidikan','moe.no_ijazah','moe.tgl_lulus','moe.nm_kepala', 'mu.nm_unitkerja','mod.unitkerja_id');
            endif;
            if($uri=='riwayat_diklat_struktural'):
                $data = array('mdi.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','mjd.jenis_diklat','mdi.diklat','mdi.penyelenggara', 'mdi.jam','mdi.no_sertifikat','mdi.tgl_sertifikat');
            endif;
            if($uri=='riwayat_diklat_teknis_fungsional'):
                $data = array('mdf.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','dif.nm_dikfungsional','mdf.diklat','mdf.penyelenggara', 'mdf.jam','mdf.no_sertifikat','mdf.tgl_sertifikat');
            endif;
        endif;
        if($indukuri=='daftar_nominatif'):
            if($uri=='duk'):
                $data = array('nip','nama','gelardepan','gelarbelakang','golongan','tmt_pangkat','mkg_tahun','mkg_bulan','nm_jabatan','eselon','tmt_jabatan','nm_diklat','tgl_sertifikat_diklat','jam_diklat','nm_lembaga','jurusan', 'tgl_lulus', 'nm_jpendidikan','tanggallahir','nm_unitkerja'); //set column field database for datatable orderable
            endif;
            if($uri=='cpns'):
                $data = array('nip','nama','gelardepan','gelarbelakang','golongan_awal','tmt_cpns','no_sk_cpns','mkg_tahun_cpns','mkg_bulan_cpns','nm_jabatan','tmt_jabatan','nm_lembaga','jurusan', 'tgl_lulus', 'nm_jpendidikan','nm_unitkerja'); //set column field database for datatable orderable
            endif;
            if($uri=='pns_mpp'):
                $data = array('nip','nip_lama','nama','gelardepan', 'gelarbelakang','tanggallahir','eselon','jenis_pegawai','no_sk_pns','tgl_sk_pns','tmt_pns','golongan','tmt_pangkat','mkg_bulan','mkg_tahun','nm_jabatan','tmt_jabatan', 'nm_unitkerja', 'nm_kedudukan'); //set column field database for datatable orderable
            endif;
            if($uri=='pns_akan_pensiun'):
                $data = array('nip','nama','gelardepan', 'gelarbelakang','tanggallahir','eselon_id','eselon','no_sk_pns','tgl_sk_pns','tmt_pns','golongan_id','golongan','tmt_pangkat','mkg_bulan','mkg_tahun','nm_jabatan','tmt_jabatan','jenis_jabatan','unitkerja_id','nm_unitkerja', 'nm_kedudukan','status_pegawai'); //set column field database for datatable orderable
            endif;
            if($uri=='mutasi_keluar_daerah'):
                $data = array('nip','nama','gelardepan', 'gelarbelakang','tanggallahir','eselon_id','eselon','no_sk_pns','tgl_sk_pns','tmt_pns','tmt_statuspns','golongan_id','golongan','tmt_pangkat','mkg_bulan','mkg_tahun','nm_jabatan','tmt_jabatan','jenis_jabatan','unitkerja_id','nm_unitkerja', 'nm_kedudukan','status_pegawai'); //set column field database for datatable orderable
            endif;
            if($uri=='pns_pendidikan'):
                $data = array('nip','nama','gelardepan', 'gelarbelakang','eselon','golongan','tmt_pangkat','nm_jabatan','tmt_jabatan','jenis_jabatan','jurusan','nm_jpendidikan' ,'nm_unitkerja'); //set column field database for datatable orderable
            endif;
        endif;
        if($indukuri=='rekapitulasi'):
            if($uri=='golongan'):
                $data = array('unitkerja_id','nm_unitkerja', 'golongan_id','golongan','kelamin_id','nm_kelamin'); //set column field database for datatable orderable
            endif;
            if($uri=='agama'):
                $data = array(null, 'unitkerja_id','nm_unitkerja', 'agama','nm_agama','kelamin_id','nm_kelamin'); //set column field database for datatable orderable
            endif;
        endif;
        return $data;
    }

    function order()
    {
        $indukuri = $this->input->post('indukuri');
        $uri = $this->input->post('uri');
        if($indukuri=='daftar_nominatif'):
            if($uri=='duk'):
                $data = array('id_golongan' => 'desc'); // default order
            elseif($uri=='cpns'):
                $data = array('golongan_awal_id'=> 'desc'); // default order
            elseif($uri=='pns_mpp' || $uri=='pns_akan_pensiun'):
                $data = array('tanggallahir'=> 'asc'); // default order
            elseif($uri=='cpns'):
                $data = array('jpendidikan_id'=> 'desc'); // default order
            else:
                $data = array('golongan_id' => 'desc'); // default order
            endif;
            
        else:
            $data = array('nip' => 'desc'); // default order
        endif;
        return $data;
    }

    private function _get_datatables_query() {

        $column_search = $this->column_search();
        $column_select = $this->column_select();
        $column_order = $this->column_order();
        $order = $this->order();
        $this->db->select($column_select);
        $this->costum();
        $this->table();
        
        $i = 0;
        
        foreach ($column_search as $item) { // loop column 
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($order)) {
            // $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables() {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all() {
        $this->db->select('nip');
        $this->table();
        return $this->db->count_all_results();
    }
    // end Laporan
    
    function getViewAsn(){
        $data = $this->db->get('view_asn');
        return $data;
    }

    function getViewKGB(){
        $data = $this->db->get('view_kgb');
        return $data;
    }

    function getmodDatapribadi()
    {
        $data = $this->db->get('mod_datapribadi');
        return $data;
    }

    function getmasterUnitkerja()
    {
        $data = $this->db->get('master_unitkerja');
        return $data;
    }

    function getmasterGolongan()
    {
        $data = $this->db->get('master_golongan');
        return $data;
    }

    function getmasterEselon()
    {
        $data = $this->db->get('master_eselon');
        return $data;
    }

    function getmasterJenisjabatan()
    {
        $data = $this->db->get('master_jenis_jabatan');
        return $data;
    }

    function getmasterJenjangjabatan()
    {
        $data = $this->db->get('master_jenjang_jabatan');
        return $data;
    }

    public function getmasterPendidikan()
    {
        $data = $this->db->get('master_jpendidikan');
        return $data;
    }

    public function getmasterJenisdiklat()
    {
        $data = $this->db->get('master_jenis_diklat');
        return $data;
    }

    public function getmasterDikfungsional()
    {
        $data = $this->db->get('master_dikfungsional');
        return $data;
    }

    public function getmasterKepangkatan()
    {
        $data = $this->db->get('master_kepangkatan');
        return $data;
    }

    public function getAllViewAsnpgn($limit='', $star=''){
        $data = $this->db->get('view_asn', $limit, $star);
        return $data;
    }

    public function getViewAsnpgn($uri3='', $limit='', $star=''){

        if($uri3=='semua_pns'):
            $data = $this->db->get('view_asn', $limit, $star);
        endif;
        if($uri3=='pns_aktif'):
            $this->db->where('status_pegawai', 1);
        endif;
        if($uri3=='pns_nonaktif'):
            $this->db->where('status_pegawai', 2);
        endif;
        if($uri3=='pns_titipan'):
            $this->db->where('kedudukan_id', 3);
        endif;
        if($uri3=='pns_tugas_belajar'):
            $this->db->where('kedudukan_id', 2);
        endif;
        if($uri3=='pns_mpp'):
            $tglawal = date('Y-m-d');
            $tanggalatas = date('Y-m', strtotime('-60 year', strtotime($tglawal))); //tambah tanggal sebanyak 6 tahun
            $tanggalatas = date('Y-m', strtotime('+1 month', strtotime($tanggalatas))); //tambah tanggal sebanyak 6 tahun
            $tanggalbawah = date('Y-m', strtotime('-59 year', strtotime($tglawal))); //tambah tanggal sebanyak 6 tahun
            $tanggalbawah = date('Y-m', strtotime('+1 month', strtotime($tanggalbawah))); //tambah tanggal sebanyak 6 tahun
            // echo $tanggalselisih;
            $this->db->select('tanggallahir')->where(array('status_pegawai' =>1 , 'tanggallahir >=' => $tanggalatas.'-01', 'tanggallahir <' => $tanggalbawah.'-01'));
            $data = $this->db->get('view_asn', $limit, $star);
        endif;
        $data = $this->db->get('view_asn', $limit, $star);
        return $data;
    }

    public function getLastRiwayat()
    {
        $data = $this->db->get('view_lastriwayat');
        return $data;
    }

    public function getOrganisasi()
    {
        $data = $this->db->get('master_organisasi');
        return $data;
    }
    
    public function getRekapitulasi($uri3='')
    {
        
        $org = $this->getOrganisasi()->result_array();
        if($uri3=='golongan'):
            foreach($org as $o):
                $this->db->where(array('organisasi_id'=> $o['id_organisasi'], 'parent' => '0'));
                $unitkerja = $this->getmasterUnitkerja()->result_array();
                foreach($unitkerja as $jb):
                    $laki_gol1 = $this->db->select('status_pegawai, kelamin_id, golongan_id, unitkerja_id')->where(array('status_pegawai'=>1,'kelamin_id'=>1, 'golongan_id >='=>111,'golongan_id <='=>114, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_gol1 = $this->db->select('status_pegawai, kelamin_id, golongan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'golongan_id >='=>111,'golongan_id <='=>114, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_gol2 = $this->db->select('status_pegawai, kelamin_id, golongan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'golongan_id >='=>121,'golongan_id <='=>124, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_gol2 = $this->db->select('status_pegawai, kelamin_id, golongan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'golongan_id >='=>121,'golongan_id <='=>124, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_gol3 = $this->db->select('status_pegawai, kelamin_id, golongan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'golongan_id >='=>131,'golongan_id <='=>134, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_gol3 = $this->db->select('status_pegawai, kelamin_id, golongan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'golongan_id >='=>131,'golongan_id <='=>134, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_gol4 = $this->db->select('status_pegawai, kelamin_id, golongan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'golongan_id >='=>141,'golongan_id <='=>144, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_gol4 = $this->db->select('status_pegawai, kelamin_id, golongan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'golongan_id >='=>141,'golongan_id <='=>144, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $data[$o['nm_organisasi']][] = array(
                        'organisasi' =>$jb['organisasi_id'],
                        'nmounit'=>$jb['nm_unitkerja'],
                        'laki_gol1'=>$laki_gol1,
                        'wanita_gol1'=>$wanita_gol1,
                        'laki_gol2'=>$laki_gol2,
                        'wanita_gol2'=>$wanita_gol2,
                        'laki_gol3'=>$laki_gol3,
                        'wanita_gol3'=>$wanita_gol3,
                        'laki_gol4'=>$laki_gol4,
                        'wanita_gol4'=>$wanita_gol4
                    );
                endforeach;
            endforeach;
        elseif($uri3=='pendidikan'):
            foreach($org as $o):
                $this->db->where(array('organisasi_id'=> $o['id_organisasi'], 'parent' => '0'));
                $unitkerja = $this->getmasterUnitkerja()->result_array();
                foreach($unitkerja as $jb):
                    $laki_sd = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')
                    ->where(array('status_pegawai'=>1,'kelamin_id'=>1, 'jpendidikan_id'=>1, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_sd = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'jpendidikan_id'=>1, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_smp = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'jpendidikan_id'=>2, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_smp = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'jpendidikan_id'=>2, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_sma = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'jpendidikan_id'=>3, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_sma = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'jpendidikan_id'=>3, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_d1 = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'jpendidikan_id'=>4, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_d1 = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'jpendidikan_id'=>4, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_d2 = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'jpendidikan_id'=>5, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_d2 = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'jpendidikan_id'=>5, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_d3 = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'jpendidikan_id'=>6, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_d3 = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'jpendidikan_id'=>6, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_d4 = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'jpendidikan_id'=>7, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_d4 = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'jpendidikan_id'=>7, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_s1 = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'jpendidikan_id'=>8, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_s1 = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'jpendidikan_id'=>8, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_s2 = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'jpendidikan_id'=>9, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_s2 = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'jpendidikan_id'=>9, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_s3 = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'jpendidikan_id'=>10, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_s3 = $this->db->select('status_pegawai, kelamin_id, jpendidikan_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'jpendidikan_id'=>10, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    
                    $data[$o['nm_organisasi']][] = array(
                        'organisasi' =>$jb['organisasi_id'],
                        'nmounit'=>$jb['nm_unitkerja'],
                        'laki_sd'=>$laki_sd,
                        'wanita_sd'=>$wanita_sd,
                        'laki_smp'=>$laki_smp,
                        'wanita_smp'=>$wanita_smp,
                        'laki_sma'=>$laki_sma,
                        'wanita_sma'=>$wanita_sma,
                        'laki_d1'=>$laki_d1,
                        'wanita_d1'=>$wanita_d1,
                        'laki_d2'=>$laki_d2,
                        'wanita_d2'=>$wanita_d2,
                        'laki_d3'=>$laki_d3,
                        'wanita_d3'=>$wanita_d3,
                        'laki_d4'=>$laki_d4,
                        'wanita_d4'=>$wanita_d4,
                        'laki_s1'=>$laki_s1,
                        'wanita_s1'=>$wanita_s1,
                        'laki_s2'=>$laki_s2,
                        'wanita_s2'=>$wanita_s2,
                        'laki_s3'=>$laki_s3,
                        'wanita_s3'=>$wanita_s3,
                    );
                endforeach;
            endforeach;
        elseif($uri3=='eselon'):
            foreach($org as $o):
                $this->db->where(array('organisasi_id'=> $o['id_organisasi'], 'parent' => '0'));
                $unitkerja = $this->getmasterUnitkerja()->result_array();
                foreach($unitkerja as $jb):
                    $laki_esel2a = $this->db->select('status_pegawai, kelamin_id, eselon_id, unitkerja_id')->where(array('status_pegawai'=>1,'kelamin_id'=>1, 'eselon_id'=>'IIA', 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_esel2b = $this->db->select('status_pegawai, kelamin_id, eselon_id, unitkerja_id')->where(array('status_pegawai'=>1,'kelamin_id'=>1,'eselon_id'=>'IIB', 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_esel2a = $this->db->select('status_pegawai, kelamin_id, eselon_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'eselon_id'=>'IIA', 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_esel2b = $this->db->select('status_pegawai, kelamin_id, eselon_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2,'eselon_id'=>'IIB', 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_esel3a = $this->db->select('status_pegawai, kelamin_id, eselon_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'eselon_id'=>'IIIA', 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_esel3b = $this->db->select('status_pegawai, kelamin_id, eselon_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'eselon_id'=>'IIIB', 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_esel3a = $this->db->select('status_pegawai, kelamin_id, eselon_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'eselon_id'=>'IIIA', 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_esel3b = $this->db->select('status_pegawai, kelamin_id, eselon_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'eselon_id'=>'IIIB', 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_esel4a = $this->db->select('status_pegawai, kelamin_id, eselon_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'eselon_id'=>'IVA', 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_esel4b = $this->db->select('status_pegawai, kelamin_id, eselon_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'eselon_id'=>'IVB', 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_esel4a = $this->db->select('status_pegawai, kelamin_id, eselon_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'eselon_id'=>'IVA', 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_esel4b = $this->db->select('status_pegawai, kelamin_id, eselon_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'eselon_id'=>'IVB', 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_esel5a = $this->db->select('status_pegawai, kelamin_id, eselon_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'eselon_id'=>'vA', 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $laki_esel5b = $this->db->select('status_pegawai, kelamin_id, eselon_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'eselon_id'=>'vA','eselon_id'=>'vB', 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_esel5a = $this->db->select('status_pegawai, kelamin_id, eselon_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'eselon_id'=>'vA', 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $wanita_esel5b = $this->db->select('status_pegawai, kelamin_id, eselon_id, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'eselon_id'=>'vB', 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                    $data[$o['nm_organisasi']][] = array(
                        'organisasi' =>$jb['organisasi_id'],
                        'nmounit'=>$jb['nm_unitkerja'],
                        'laki_esel2a'=>$laki_esel2a,
                        'laki_esel2b'=>$laki_esel2b,
                        'wanita_esel2a'=>$wanita_esel2a,
                        'wanita_esel2b'=>$wanita_esel2b,
                        'laki_esel3a'=>$laki_esel3a,
                        'laki_esel3b'=>$laki_esel3b,
                        'wanita_esel3a'=>$wanita_esel3a,
                        'wanita_esel3b'=>$wanita_esel3b,
                        'laki_esel4a'=>$laki_esel4a,
                        'laki_esel4b'=>$laki_esel4b,
                        'wanita_esel4a'=>$wanita_esel4a,
                        'wanita_esel4b'=>$wanita_esel4b,
                        'laki_esel5a'=>$laki_esel5a,
                        'laki_esel5b'=>$laki_esel5b,
                        'wanita_esel5a'=>$wanita_esel5a,
                        'wanita_esel5b'=>$wanita_esel5b,
                    );
                endforeach;
            endforeach;
        elseif($uri3=='agama'):
            foreach($org as $o):
                $this->db->where(array('organisasi_id'=> $o['id_organisasi'], 'parent' => '0'));
                $unitkerja = $this->getmasterUnitkerja()->result_array();
                foreach($unitkerja as $jb):
                    $laki_agama1 = $this->db->select('status_pegawai, kelamin_id, agama, nm_agama, unitkerja_id')->where(array('status_pegawai'=>1,'kelamin_id'=>1, 'agama'=>1, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_asn')->num_rows();
                    $wanita_agama1 = $this->db->select('status_pegawai, kelamin_id, agama, nm_agama, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'agama'=>1, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_asn')->num_rows();
                    $laki_agama2 = $this->db->select('status_pegawai, kelamin_id, agama, nm_agama, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'agama'=>2, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_asn')->num_rows();
                    $wanita_agama2 = $this->db->select('status_pegawai, kelamin_id, agama, nm_agama, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'agama'=>2, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_asn')->num_rows();
                    $laki_agama3 = $this->db->select('status_pegawai, kelamin_id, agama, nm_agama, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'agama'=>3, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_asn')->num_rows();
                    $wanita_agama3 = $this->db->select('status_pegawai, kelamin_id, agama, nm_agama, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'agama'=>3, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_asn')->num_rows();
                    $laki_agama4 = $this->db->select('status_pegawai, kelamin_id, agama, nm_agama, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'agama'=>4, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_asn')->num_rows();
                    $wanita_agama4 = $this->db->select('status_pegawai, kelamin_id, agama, nm_agama, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'agama'=>4, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_asn')->num_rows();
                    $laki_agama5 = $this->db->select('status_pegawai, kelamin_id, agama, nm_agama, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'agama'=>5, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_asn')->num_rows();
                    $wanita_agama5 = $this->db->select('status_pegawai, kelamin_id, agama, nm_agama, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'agama'=>5, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_asn')->num_rows();
                    $laki_agama6 = $this->db->select('status_pegawai, kelamin_id, agama, nm_agama, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>1, 'agama'=>6, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_asn')->num_rows();
                    $wanita_agama6 = $this->db->select('status_pegawai, kelamin_id, agama, nm_agama, unitkerja_id')->where(array('status_pegawai'=>1, 'kelamin_id'=>2, 'agama'=>6, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_asn')->num_rows();
                    $data[$o['nm_organisasi']][] = array(
                        'organisasi' =>$jb['organisasi_id'],
                        'nmounit'=>$jb['nm_unitkerja'],
                        'laki_agama1'=>$laki_agama1,
                        'wanita_agama1'=>$wanita_agama1,
                        'laki_agama2'=>$laki_agama2,
                        'wanita_agama2'=>$wanita_agama2,
                        'laki_agama3'=>$laki_agama3,
                        'wanita_agama3'=>$wanita_agama3,
                        'laki_agama4'=>$laki_agama4,
                        'wanita_agama4'=>$wanita_agama4,
                        'laki_agama5'=>$laki_agama5,
                        'wanita_agama5'=>$wanita_agama5,
                        'laki_agama6'=>$laki_agama6,
                        'wanita_agama6'=>$wanita_agama6,
                    );
                endforeach;
            endforeach;
        else:
            $data = '';
        endif;
        return $data;
        
    }

    public function getModpangkat()
    {
        $select = array('mop.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','mkp.nm_kepangkatan','mop.golongan_id','mg.pangkat','mg.golongan','mop.tmt_pangkat','mop.sk_nomor','mop.tgl_bakn','mop.no_bakn','mop.sk_tanggal','mop.masa_kerja_golongan_tahun mkg_tahun','mop.masa_kerja_golongan_bulan mkg_bulan','mop.pejabat_penetap', 'mu.nm_unitkerja','mod.unitkerja_id','moi.status_pegawai','mou.level_id');
        $this->db->select($select);
        $this->db->order_by('nip', 'desc');
        $this->db->from('mod_pangkat mop');
        $this->db->join('mod_datapribadi mod', 'mod.nip = mop.nip', 'left');
        $this->db->join('mod_identitas moi', 'moi.nip = mop.nip', 'left');
        $this->db->join('mod_user mou', 'mou.nip = mop.nip', 'left');
        $this->db->join('master_golongan mg', 'mg.id_golongan = mop.golongan_id', 'left');
        $this->db->join('master_kepangkatan mkp', 'mkp.id_kepangkatan = mop.kepangkatan_id', 'left');
        $this->db->join('master_unitkerja mu', 'mu.id_unitkerja = mod.unitkerja_id', 'left');
        $data = $this->db->get();
        return $data;
    }

    public function getModjabatan()
    {
        $select = array('moj.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','mjj.jenis_jabatan','mtj.jenjang_jabatan','moj.eselon_id','me.eselon', 'mj.nm_jabatan','moj.tgl_sk','moj.no_sk','moj.tmt_jabatan','moj.tmt_pelantikan','moj.pejabat_sk', 'mu.nm_unitkerja','mod.unitkerja_id','moi.status_pegawai','mou.level_id');
        $this->db->select($select);
        $this->db->order_by('nip', 'desc');
        $this->db->from('mod_jabatan moj');
        $this->db->join('mod_datapribadi mod', 'mod.nip = moj.nip', 'left');
        $this->db->join('mod_identitas moi', 'moi.nip = moj.nip', 'left');
        $this->db->join('mod_user mou', 'mou.nip = moj.nip', 'left');
        $this->db->join('master_jabatan mj', 'mj.id_jabatan = moj.jabatan_id', 'left');
        $this->db->join('master_jenis_jabatan mjj', 'mjj.id_jenis_jabatan = moj.jenis_jabatan_id', 'left');
        $this->db->join('master_jenjang_jabatan mtj', 'mtj.id_jenjang_jabatan = moj.jenjab_id', 'left');
        $this->db->join('master_eselon me', 'me.id_eselon = moj.eselon_id', 'left');
        $this->db->join('master_unitkerja mu', 'mu.id_unitkerja = mod.unitkerja_id', 'left');
        $data = $this->db->get();
        return $data;
    }

    public function getModpendidikan()
    {
        $select = array('moe.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','moe.jenis_pendidikan','moe.jurusan','moe.nm_lembaga', 'mjp.nm_jpendidikan','moe.no_ijazah','moe.tgl_lulus','moe.nm_kepala', 'mu.nm_unitkerja','mod.unitkerja_id','moi.status_pegawai','mou.level_id');
        $this->db->select($select);
        $this->db->order_by('nip', 'desc');
        $this->db->from('mod_pendidikan moe');
        $this->db->join('mod_datapribadi mod', 'mod.nip = moe.nip', 'left');
        $this->db->join('mod_identitas moi', 'moi.nip = moe.nip', 'left');
        $this->db->join('mod_user mou', 'mou.nip = moe.nip', 'left');
        $this->db->join('master_jpendidikan mjp', 'mjp.id_jpendidikan = moe.jpendidikan_id', 'left');
        $this->db->join('master_unitkerja mu', 'mu.id_unitkerja = mod.unitkerja_id', 'left');
        $data = $this->db->get();
        return $data;
    }

    public function getModdiklatStruktural()
    {
        $select = array('mdi.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','mjd.jenis_diklat','mdi.diklat','mdi.penyelenggara', 'mdi.jam','mdi.no_sertifikat','mdi.tgl_sertifikat','mod.unitkerja_id','moi.status_pegawai','mou.level_id');
        $this->db->select($select);
        $this->db->order_by('nip', 'desc');
        $this->db->from('mod_dikstruktural mdi');
        $this->db->join('master_jenis_diklat mjd', 'mjd.id_jenis_diklat = mdi.jenisdiklat_id', 'left');
        $this->db->join('mod_datapribadi mod', 'mod.nip = mdi.nip', 'left');
        $this->db->join('mod_identitas moi', 'moi.nip = mdi.nip', 'left');
        $this->db->join('mod_user mou', 'mou.nip = mdi.nip', 'left');
        $data = $this->db->get();
        return $data;
    }

    public function getModdiklatFungsional()
    {
        $select = array('mdf.nip', 'mod.nama', 'mod.gelardepan', 'mod.gelarbelakang','dif.nm_dikfungsional','mdf.diklat','mdf.penyelenggara', 'mdf.jam','mdf.no_sertifikat','mdf.tgl_sertifikat','mod.unitkerja_id','moi.status_pegawai','mou.level_id');
        $this->db->select($select);
        $this->db->order_by('nip', 'desc');
        $this->db->from('mod_dikfungsional mdf');
        $this->db->join('master_dikfungsional dif', 'dif.id_dikfungsional = mdf.diklatfungsional_id', 'left');
        $this->db->join('mod_datapribadi mod', 'mod.nip = mdf.nip', 'left');
        $this->db->join('mod_identitas moi', 'moi.nip = mdf.nip', 'left');
        $this->db->join('mod_user mou', 'mou.nip = mdf.nip', 'left');
        $data = $this->db->get();
        return $data;
    }

    public function laporanTerbitpns($uri3='', $lvlid='')
    {
        if($lvlid > 2 &&  $lvlid < 5):
            $this->db->where(array('unitkerja_id'=>$this->session->userdata('skpd_id')));
        endif;
        if($uri3=='semua_pns'):
            $this->db->where(array('status_pegawai'=> 1, 'kedudukan_id <='=> 7));
        endif;
        if($uri3=='pns_aktif'):
            $this->db->where(array('kedudukan_id' => 1));
        endif;
        if($uri3=='pns_nonaktif'):
            $this->db->where(array('status_pegawai'=> 2));
        endif;
        if($uri3=='pns_titipan'):
            $this->db->where(array('kedudukan_id'=> 3));
        endif;
        if($uri3=='pns_tugas_belajar'):
            $this->db->where(array('kedudukan_id'=> 2));
        endif;
        if($uri3=='pns_cltn'):
            $this->db->where(array('kedudukan_id'=> 6));
        endif;
        if($uri3=='pns_keluar_berhenti'):
            $this->db->where(array('kedudukan_id >='=> 8, 'kedudukan_id <='=> 12));
        endif;
        if($uri3=='pns_diberhentikan_sementara'):
            $this->db->where(array('kedudukan_id'=> 7));
        endif;
        $data = $this->getViewAsn();
        return $data;
    }

    //End diperuntukkan bukan datatable PNS
    
    

}