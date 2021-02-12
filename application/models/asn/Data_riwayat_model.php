<?php

class Data_riwayat_model extends CI_Model
{
    
    // Master Terkait Modul Jabatan & Angka Kredit
    public function getmasterJabatan(){
        $data = $this->db->get('master_jabatan');
		return $data;
    }

    // Master Terkait Modul Jabatan
    public function getmasterJenisJabatan(){
        $data = $this->db->get('master_jenis_jabatan');
		return $data;
    }

    // Master Terkait Modul Jabatan
    public function getmasterJenjangJabatan(){
        $data = $this->db->get('master_jenjang_jabatan');
		return $data;
    }

    // Master Terkait Modul Jabatan
    public function getmasterUnitkerja(){
        $data = $this->db->get('master_unitkerja');
		return $data;
    }

    // Master Terkait Modul Jabatan
    public function getmasterOrganisasi(){
        $data = $this->db->get('master_organisasi');
		return $data;
    }

    // Master Terkait Modul Jabatan
    public function getmasterBidang(){
        $data = $this->db->get('master_bidang');
		return $data;
    }

    // Master Terkait Modul Jabatan
    public function getmasterSubbidang(){
        $data = $this->db->get('master_subbidang');
		return $data;
    }

    // Master Terkait Modul Jabatan
    public function getmasterTupoksi(){
        $data = $this->db->get('master_tupoksi');
		return $data;
    }

    // Master Terkait Modul Jabatan
    public function getmasterTempatkerja(){
        $data = $this->db->get('master_tempatkerja');
		return $data;
    }

    // Master Terkait Modul Jabatan
    public function getmasterEselon(){
        $data = $this->db->get('master_eselon');
		return $data;
    }

    // Master Terkait Modul Kepangkatan
    public function getmasterKepangkatan(){
        $data = $this->db->get('master_kepangkatan');
		return $data;
    }

    // Master Terkait Modul Kepangkatan dan KGB
    public function getmasterGolongan(){
        $data = $this->db->get('master_golongan');
		return $data;
    }

    // Master Terkait Modul Pendidikan
    public function getmasterJPendidikan(){
        $data = $this->db->get('master_jpendidikan');
		return $data;
    }

    // Master Terkait Modul Diklat
    public function getmasterDiklat(){
        $data = $this->db->get('master_diklat');
		return $data;
    }

    // Master Terkait Modul Diklat
    public function getmasterJenisDiklat(){
        $data = $this->db->get('master_jenis_diklat');
		return $data;
    }

    // Master Terkait Modul Seminar
    public function getmasterSeminar(){
        $data = $this->db->get('master_seminar');
		return $data;
    }

    // Master Terkait Modul Hukuman
    public function getmasterHukuman(){
        $data = $this->db->get('master_hukuman');
		return $data;
    }

    // Master Terkait Modul Diklat
    public function getmasterJHukuman(){
        $data = $this->db->get('master_jenis_hukuman');
		return $data;
    }

    // Master Terkait Modul Keluarga
    public function getmasterSnikah(){
        $data = $this->db->get('master_skawin');
		return $data;
    }

    // Master Terkait Modul Keluarga
    public function getmasterKelamin(){
        $data = $this->db->get('master_kelamin');
		return $data;
    }

    // Master Terkait Modul Keluarga
    public function getmasterStatusdasar(){
        $data = $this->db->get('master_status_dasar');
		return $data;
    }

    // Master Terkait Modul Cuti
    public function getmasterCuti(){
        $data = $this->db->get('master_cuti');
		return $data;
    }

    // Master Terkait Modul Keluarga
    public function getMaster_orangtua(){
        $data = $this->db->get('master_orangtua');
		return $data;
    }

    // Master Terkait Modul Keluarga
    public function getMaster_suami_istri(){
        $data = $this->db->get('master_suami_istri');
		return $data;
    }

    // Master Terkait Modul Keluarga
    public function getMaster_sanak(){
        $data = $this->db->get('master_sanak');
		return $data;
    }

    // Master Terkait Modul Keluarga
    public function groupmasterKeluarga($url){
        $data = $this->db->get('master_'.$url);
		return $data;
    }

    
    //Modul User
    public function getmodUser(){
        $data = $this->db->get('mod_user');
		return $data;
    }

    //Modul Jabatan
    public function getmodJabatan(){
        $data = $this->db->get('mod_jabatan');
		return $data;
    }

    public function joinmodJabatan()
    {
        $this->db->select('moj.*, mj.nm_jabatan, mjj.jenis_jabatan, mjg.jenjang_jabatan, mjg.kategori_jenjang, me.eselon, mog.nm_organisasi, muk.nm_unitkerja, mb.nm_bidang, msb.nm_subbidang, mtk.nm_tempatkerja, mtp.nm_tupoksi');
        $this->db->from('mod_jabatan moj');
        $this->db->join('master_jabatan mj', 'mj.id_jabatan = moj.jabatan_id', 'left');
        $this->db->join('master_jenis_jabatan mjj', 'mjj.id_jenis_jabatan = moj.jenis_jabatan_id', 'left');
        $this->db->join('master_jenjang_jabatan mjg', 'mjg.id_jenjang_jabatan = moj.jenjab_id', 'left');
        $this->db->join('master_unitkerja muk', 'muk.id_unitkerja = moj.unitkerja_id', 'left');
        $this->db->join('master_organisasi mog', 'mog.id_organisasi = moj.organisasi_id', 'left');
        $this->db->join('master_bidang mb', 'mb.id_bidang = moj.bagian_id', 'left');
        $this->db->join('master_subbidang msb', 'msb.id_subbidang = moj.subbagian_id', 'left');
        $this->db->join('master_tupoksi mtp', 'mtp.id_tupoksi = moj.tugaspokok_id', 'left');
        $this->db->join('master_tempatkerja mtk', 'mtk.id_tempatkerja = moj.tempatkerja_id', 'left');
        $this->db->join('master_eselon me', 'me.id_eselon = moj.eselon_id', 'left');
        $data = $this->db->get();
		return $data;
    }

    public function updatemodJabatan($aksi, $post, $nip, $config, $id)
    {
        $isian_tanggal = array(
            'tmt_jabatan'=> $post['tmtjabatan'],
            'tmt_pelantikan'=> $post['tmtpelantikan'],
            'tgl_sk'=> $post['tglsk']
        );

        foreach ($isian_tanggal as $key => $entry)
		{
            if (!empty($entry) && $entry != '-' ):
                $data_update[$key] = date('Y-m-d', strtotime($entry));
            else:
                $data_update[$key] = null;
			endif;
        }

        $data_update['nip'] = $nip;
        $data_update['jenis_jabatan_id'] = $post['jenisjab'];
        $data_update['jenjab_id'] = $post['jenjang'];
        $data_update['eselon_id'] = $post['eselon'];
        $data_update['jabatan_id'] = $post['jabatan'];
        // $data_update['organisasi'] = $post['organisasi'];
        $data_update['unitkerja_id'] = $post['unitkerja'];
        $data_update['bagian_id'] = $post['bagian'];
        $data_update['subbagian_id'] = $post['subbagian'];
        // $data_update['tempat'] = $post['subbagian'];
        // $data_update['tempatkerja_id'] = $post['tempatkerja'];
        $data_update['no_sk'] = $post['nosk'];
        $data_update['pejabat_sk'] = $post['pejabat_penetap'];
        $data_update['tugaspokok_id'] = $post['tupoksi'];
        
        $this->upload->initialize($config);
        
        if ( ! $this->upload->do_upload('file_skjab'))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
			<strong>Ups!</strong> '.$this->upload->display_errors().'</div>');
	    }else{
	        $upload_data = $this->upload->data();
	        $file = $upload_data['file_name'];
        }
        
        if(isset($file)){$data_update['file_sk_jabatan'] = $file;}

        if($aksi=='tambah'):
            $data_update['validator_modjabatan'] = 1;
            $data_update['status_validasi_modjabatan'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_jabatan', $data_update);
        endif;
        if($aksi=='rubah'):
            if($post['enabledjab']==1){$data_update['validator_modjabatan'] = 1;}
            $data_update['status_validasi_modjabatan'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where(array('nip'=> $nip, 'id'=>decrypt_url($id)));
            $data = $this->db->update('mod_jabatan', $data_update);
        endif;
		return $data;
    }
    //End Modul Jabatan

    //Modul Pangkat/Kepangkatan
    public function getmodPangkat()
    {
        $data = $this->db->get('mod_pangkat');
		return $data;
    }

    public function joinmodPangkat()
    {
        $this->db->select('mop.*, mkp.nm_kepangkatan, mg.golongan');
        $this->db->from('mod_pangkat mop');
        $this->db->join('master_kepangkatan mkp', 'mkp.id_kepangkatan = mop.kepangkatan_id', 'left');
        $this->db->join('master_golongan mg', 'mg.id_golongan = mop.golongan_id', 'left');
        $data = $this->db->get();
		return $data;
    }

    public function updatemodPangkat($aksi, $post, $nip, $config, $id)
    {
        $isian_tanggal = array(
            'tmt_pangkat'=> $post['tmtpangkat'],
            'tgl_bakn'=> $post['tglbakn'],
            'sk_tanggal'=> $post['tanggalsk']
        );

        foreach ($isian_tanggal as $key => $entry)
		{
            if (!empty($entry) && $entry != '-' ):
                $data_update[$key] = date('Y-m-d', strtotime($entry));
            else:
                $data_update[$key] = null;
			endif;
        }

        $this->db->where('nip', $nip);
        $uk = $this->getmodUser()->row_array();
        
        $data_update['nip'] = $nip;
        $data_update['golongan_id'] = $post['golongan'];
        $data_update['kepangkatan_id'] = $post['kepangkatan'];
        $data_update['unitkerja_id'] = $uk['skpd_id'];
        $data_update['sk_nomor'] = $post['nomorsk'];
        $data_update['no_bakn'] = $post['nobakn'];
        $data_update['masa_kerja_golongan_tahun'] = $post['mkg_thn'];
        $data_update['masa_kerja_golongan_bulan'] = $post['mkg_bln'];
        $data_update['pejabat_penetap'] = $post['pejabatpenetap'];

        $this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file_skpangkat'))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
			<strong>Ups!</strong> '.$this->upload->display_errors().'</div>');
	    }else{
	        $upload_data = $this->upload->data();
	        $file = $upload_data['file_name'];
		}
        
        if(isset($file)){$data_update['file_sk_pangkat'] = $file;}
        if($aksi=='tambah'):
            $data_update['validator_modpangkat'] = 1;
            $data_update['status_validasi_modpangkat'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_pangkat', $data_update);
        endif;
        if($aksi=='rubah'):
            if($post['enabled']==1){$data_update['validator_modpangkat'] = 1;}
            $data_update['status_validasi_modpangkat'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where(array('nip'=>$nip, 'id'=>decrypt_url($id)));
            $data = $this->db->update('mod_pangkat', $data_update);
        endif;
        if($aksi=='hapus'):
            $this->db->where(array('nip'=>$nip, 'id'=>decrypt_url($id)));
            $data = $this->db->delete('mod_pangkat');
        endif;
		return $data;
    }
    // End Modul Pangkat

    // Modul Pendidikan
    public function getmodPendidikan(){
        $data = $this->db->get('mod_pendidikan');
		return $data;
    }

    public function joinmodPendidikan()
    {
        $this->db->select('mpi.*, mjp.nm_jpendidikan, mjp.warna');
        $this->db->from('mod_pendidikan mpi');
        $this->db->join('master_jpendidikan mjp', 'mjp.id_jpendidikan = mpi.jpendidikan_id', 'left');
        $data = $this->db->get();
		return $data;
    }

    public function updatemodPendidikan($aksi, $post, $nip, $config, $id)
    { 
        $this->db->where('nip', $nip);
        $uk = $this->getmodUser()->row_array();

        $data_update['nip'] = $nip;
        $data_update['jpendidikan_id'] = $post['pendidikanj'];
        $data_update['jurusan'] = $post['nmjurusan'];
        $data_update['jenis_pendidikan'] = $post['pendidikanjns'];
        $data_update['unitkerja_id'] = $uk['skpd_id'];
        $data_update['nm_lembaga'] = $post['lembaganm'];
        $data_update['nm_kepala'] = $post['kepalanm'];
        $data_update['no_ijazah'] = $post['ijazahno'];
        $data_update['pendidikan_pertama'] = $post['awalpendidikan'];
        if(isset($post['lulustgl'])):
            $data_update['tgl_lulus'] = date('Y-m-d', strtotime($post['lulustgl']));
        else:
            $data_update['tgl_lulus'] = null;
        endif;

        $this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file_ijazahp'))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
			<strong>Ups!</strong> '.$this->upload->display_errors().'</div>');
	    }else{
	        $upload_data = $this->upload->data();
	        $file = $upload_data['file_name'];
		}

        if(isset($file)){$data_update['file_ijazah_pendidikan'] = $file;}
        if($aksi=='tambah'):
            $data_update['validator_modpendidikan'] = 1;
            $data_update['status_validasi_modpendidikan'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_pendidikan', $data_update);
        endif;
        if($aksi=='rubah'):
            if($post['enablededu']==1){$data_update['validator_modpendidikan'] = 1;}
            $data_update['status_validasi_modpendidikan'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where(array('nip'=>$nip, 'id'=>decrypt_url($id)));
            $data = $this->db->update('mod_pendidikan', $data_update);
        endif;
		return $data;
    }
    
    // End Modul Pendidikan

    // Modul Diklat
    public function getmodDiklat(){
        $data = $this->db->get('mod_diklat');
		return $data;
    }

    public function joinmodDiklat()
    {
        $this->db->select('mod.*, mod.nm_diklat, mjd.jenis_diklat');
        $this->db->from('mod_diklat mod');
        $this->db->join('master_diklat md', 'md.id_diklat = mod.diklat_id', 'left');
        $this->db->join('master_jenis_diklat mjd', 'mjd.id_jenis_diklat = mod.jenisdiklat_id', 'left');
        $data = $this->db->get();
		return $data;
    }

    public function updatemodDiklat($aksi, $post, $nip, $config, $id)
    { 
        $this->db->where('nip', $nip);
        $uk = $this->getmodUser()->row_array();

        $data_update['nip'] = $nip;
        $data_update['jenisdiklat_id'] = $post['jenisdiklat'];
        $data_update['diklat_id'] = $post['diklat'];
        $data_update['unitkerja_id'] = $uk['skpd_id'];
        $data_update['nm_diklat'] = $post['diklatnm'];
        $data_update['penyelenggara'] = $post['pihakpenyelenggara'];
        $data_update['jam'] = $post['totjam'];
        $data_update['no_sertifikat'] = $post['sertifikatno'];

        if(isset($post['sertifikattgl'])):
            $data_update['tgl_sertifikat'] = date('Y-m-d', strtotime($post['sertifikattgl']));
        else:
            $data_update['tgl_sertifikat'] = null;
        endif;

        $this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file_sertifikatd'))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
			<strong>Ups!</strong> '.$this->upload->display_errors().'</div>');
	    }else{
	        $upload_data = $this->upload->data();
	        $file = $upload_data['file_name'];
		}

        if(isset($file)){$data_update['file_sertifikat_diklat'] = $file;}
        if($aksi=='tambah'):
            $data_update['validator_moddiklat'] = 1;
            $data_update['status_validasi_moddiklat'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_diklat', $data_update);
        endif;
        if($aksi=='rubah'):
            if($post['enableddik']==1){$data_update['validator_moddiklat'] = 1;}
            $data_update['status_validasi_moddiklat'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where(array('nip'=>$nip, 'id'=>decrypt_url($id)));
            $data = $this->db->update('mod_diklat', $data_update);
        endif;
		return $data;
    }
    // End Modul Diklat

    // Modul Seminar
    public function getmodSeminar(){
        $data = $this->db->get('mod_seminar');
		return $data;
    }

    public function joinmodSeminar()
    {
        $this->db->select('mos.*, ms.nm_peranan');
        $this->db->from('mod_seminar mos');
        $this->db->join('master_seminar ms', 'ms.id_peranan = mos.peranan_id', 'left');
        $data = $this->db->get();
		return $data;
    }

    public function updatemodSeminar($aksi, $post, $nip, $config, $id)
    { 
        $this->db->where('nip', $nip);
        $uk = $this->getmodUser()->row_array();
        
        $data_update['nip'] = $nip;
        $data_update['nm_seminar'] = $post['nmseminar'];
        $data_update['penyelenggara'] = $post['selenggarapihak'];
        $data_update['peranan_id'] = $post['peran'];
        $data_update['unitkerja_id'] = $uk['skpd_id'];
        $data_update['jam_seminar'] = $post['totjam'];
        if(isset($post['seminartgl'])):
            $data_update['tgl_seminar'] = date('Y-m-d', strtotime($post['seminartgl']));
        else:
            $data_update['tgl_seminar'] = null;
        endif;

        $this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file_sertifikats'))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
			<strong>Ups!</strong> '.$this->upload->display_errors().'</div>');
	    }else{
	        $upload_data = $this->upload->data();
	        $file = $upload_data['file_name'];
		}

        if(isset($file)){$data_update['file_sertifikat_seminar'] = $file;}
        if($aksi=='tambah'):
            $data_update['validator_modseminar'] = 1;
            $data_update['status_validasi_modseminar'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_seminar', $data_update);
        endif;
        if($aksi=='rubah'):
            if($post['enabledsmr']==1){$data_update['validator_modseminar'] = 1;}
            $data_update['status_validasi_modseminar'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where(array('nip'=>$nip, 'id'=>decrypt_url($id)));
            $data = $this->db->update('mod_seminar', $data_update);
        endif;
		return $data;
    }
    // End Modul Seminar

    // Modul Hukuman
    public function getmodHukuman(){
        $data = $this->db->get('mod_hukuman');
		return $data;
    }

    public function joinmodHukuman()
    {
        $this->db->select('moh.*, mh.nm_hukuman, mjh.jenis_hukuman');
        $this->db->from('mod_hukuman moh');
        $this->db->join('master_hukuman mh', 'mh.id_hukuman = moh.hukuman_id', 'left');
        $this->db->join('master_jenis_hukuman mjh', 'mjh.id_jenis_hukuman = moh.jhukuman_id', 'left');
        $data = $this->db->get();
		return $data;
    }

    public function updatemodHukuman($aksi, $post, $nip, $id)
    { 
        $this->db->where('nip', $nip);
        $uk = $this->getmodUser()->row_array();

        $isian_tanggal = array(
            'tmt_hukuman'=> $post['hukumantmt'],
            'tgl_sk_pembatalan'=> $post['tglsk_batal_huk'],
            'tgl_sk'=> $post['tglsk_huk']
        );
        foreach ($isian_tanggal as $key => $entry)
		{
            if (!empty($entry) && $entry != '-' ):
                $data_update[$key] = date('Y-m-d', strtotime($entry));
            else:
                $data_update[$key] = null;
			endif;
        }
        $data_update['nip'] = $nip;
        $data_update['jhukuman_id'] = $post['hukumanj'];
        $data_update['hukuman_id'] = $post['hukumannm'];
        $data_update['unitkerja_id'] = $uk['skpd_id'];
        $data_update['no_sk'] = $post['nosk_huk'];
        $data_update['masa_hukuman_tahun'] = $post['mh_thn'];
        $data_update['masa_hukuman_bulan'] = $post['mh_bln'];
        $data_update['no_sk_pembatalan'] = $post['nosk_batal_huk'];
        $data_update['alasan_hukuman'] = $post['alasan_huk'];

        $arrayfile = array('sk_hukuman'=>'tgl_sk', 'sk_pembatalan_hukuman'=>'tgl_sk_pembatalan');

        foreach($arrayfile as $b=>$a){
            if(isset($_FILES['file_'.$b]["name"])){
                $tglhuk = isset($post[$a]) ? date('dmy',strtotime($post[$a])) : '';

                $config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
                $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
                $config['max_size'] = 500;
                $config['file_name'] = strtoupper($b).'_'.$nip.'_'.$tglhuk;

                $this->upload->initialize($config);
                
                if ( ! $this->upload->do_upload('file_'.$b))
                {
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                    <strong>Ups!</strong> '.$this->upload->display_errors().'</div>');
                }else{
                    $upload_data = $this->upload->data();
                    $data_update['file_'.$b]  = $upload_data['file_name'];
                }
            }
            
        }
        if($aksi=='tambah'):
            $data_update['validator_modhukuman'] = 1;
            $data_update['status_validasi_modhukuman'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_hukuman', $data_update);
        endif;
        if($aksi=='rubah'):
            if($post['enabledhuk']==1){$data_update['validator_modhukuman'] = 1;}
            $data_update['status_validasi_modhukuman'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where(array('nip'=>$nip, 'id'=>decrypt_url($id)));
            $data = $this->db->update('mod_hukuman', $data_update);
        endif;
		return $data;
    }
    // End Modul Hukuman

    // Modul Kenaikan Gaji Berkala (KGB)
    public function getmodKgb(){
        $data = $this->db->get('mod_kgb');
		return $data;
    }

    public function joinmodKgb()
    {
        $this->db->select('kgb.*, mg.golongan');
        $this->db->from('mod_kgb kgb');
        $this->db->join('master_golongan mg', 'mg.id_golongan = kgb.golongan_id', 'left');
        $data = $this->db->get();
		return $data;
    }

    public function updatemodKgb($aksi, $post, $nip, $config, $id)
    { 
        $this->db->where('nip', $nip);
        $uk = $this->getmodUser()->row_array();

        $isian_tanggal = array(
            'tmt_kgb'=> $post['kgbtmt'],
            'tgl_sk'=> $post['tglskkgb']
        );
        foreach ($isian_tanggal as $key => $entry)
		{
            if (!empty($entry) && $entry != '-' ):
                $data_update[$key] = date('Y-m-d', strtotime($entry));
            else:
                $data_update[$key] = null;
			endif;
        }
        $data_update['nip'] = $nip;
        $data_update['golongan_id'] = $post['golongan'];
        $data_update['unitkerja_id'] = $uk['skpd_id'];
        $data_update['no_sk'] = $post['sknomor'];
        $data_update['masa_kerja_kgb_tahun'] = $post['mkkthn'];
        $data_update['masa_kerja_kgb_bulan'] = $post['mkkbln'];
        $data_update['gaji_pokok'] = $post['pokokgaji'];
        $data_update['gaji_bersih'] = $post['bersihgaji'];

        $this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file_skkgb'))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
			<strong>Ups!</strong> '.$this->upload->display_errors().'</div>');
	    }else{
	        $upload_data = $this->upload->data();
	        $file = $upload_data['file_name'];
		}

        if(isset($file)){$data_update['file_sk_kgb'] = $file;}
        if($aksi=='tambah'):
            $data_update['validator_modkgb'] = 1;
            $data_update['status_validasi_modkgb'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_kgb', $data_update);
        endif;
        if($aksi=='rubah'):
            if($post['enabledkgb']==1){$data_update['validator_modkgb'] = 1;}
            $data_update['status_validasi_modkgb'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where(array('nip'=>$nip, 'id'=>decrypt_url($id)));
            $data = $this->db->update('mod_kgb', $data_update);
        endif;
		return $data;
    }
    // End Modul KGB

    // Modul Kredit
    public function getmodKredit(){
        $data = $this->db->get('mod_kredit');
		return $data;
    }

    public function joinmodKredit()
    {
        $this->db->select('mok.*, mj.nm_jabatan');
        $this->db->from('mod_kredit mok');
        $this->db->join('master_jabatan mj', 'mj.id_jabatan = mok.jabatan_id', 'left');
        $data = $this->db->get();
		return $data;
    }

    public function updatemodKredit($aksi, $post, $nip, $config, $id)
    { 
        $this->db->where('nip', $nip);
        $uk = $this->getmodUser()->row_array();

        $isian_tanggal = array(
            'tgl_awal'=> $post['awaltgl'],
            'tgl_akhir'=> $post['akhirtgl'],
            'tgl_sk'=> $post['sktglkredit']
        );
        foreach ($isian_tanggal as $key => $entry)
		{
            if (!empty($entry) && $entry != '-' ):
                $data_update[$key] = date('Y-m-d', strtotime($entry));
            else:
                $data_update[$key] = null;
			endif;
        }
        $data_update['nip'] = $nip;
        $data_update['unitkerja_id'] = $uk['skpd_id'];
        $data_update['no_sk'] = $post['sknomor'];
        $data_update['kredit_utama'] = $post['utamakredit'];
        $data_update['kredit_penunjang'] = $post['tunjangkredit'];
        $data_update['jabatan_id'] = $post['jabatan'];

        $this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file_skkredit'))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
			<strong>Ups!</strong> '.$this->upload->display_errors().'</div>');
	    }else{
	        $upload_data = $this->upload->data();
	        $file = $upload_data['file_name'];
		}

        if(isset($file)){$data_update['file_sk_kredit'] = $file;}
        if($aksi=='tambah'):
            $data_update['validator_modkredit'] = 1;
            $data_update['status_validasi_modkredit'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_kredit', $data_update);
        endif;
        if($aksi=='rubah'):
            if($post['enabledkr']==1){$data_update['validator_modkredit'] = 1;}
            $data_update['status_validasi_modkredit'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where(array('nip'=>$nip, 'id'=>decrypt_url($id)));
            $data = $this->db->update('mod_kredit', $data_update);
        endif;
		return $data;
    }
    // End Modul Kredit

    // Modul Penghargaan
    public function getmodPenghargaan(){
        $data = $this->db->get('mod_tandajasa');
		return $data;
    }

    public function updatemodPenghargaan($aksi, $post, $nip, $config, $id)
    { 
        $this->db->where('nip', $nip);
        $uk = $this->getmodUser()->row_array();
        $data_update['unitkerja_id'] = $uk['skpd_id'];
        $data_update['nip'] = $nip;
        $data_update['tandajasa'] = $post['penghargaannm'];
        $data_update['sk_pejabat'] = $post['pejabatnm'];
        $data_update['sk_nomor'] = $post['skno'];
        $data_update['instansi'] = $post['lbgpemberi'];
        if(isset($post['sktgl'])):
            $data_update['sk_tanggal'] = date('Y-m-d', strtotime($post['sktgl']));
        else:
            $data_update['sk_tanggal'] = null;
        endif;

        $this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file_penghargaansk'))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
			<strong>Ups!</strong> '.$this->upload->display_errors().'</div>');
	    }else{
	        $upload_data = $this->upload->data();
	        $file = $upload_data['file_name'];
		}
		

        if(isset($file)){$data_update['file_sk_tandajasa'] = $file;}
        if($aksi=='tambah'):
            $data_update['validator_modtandajasa'] = 1;
            $data_update['status_validasi_modtandajasa'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_tandajasa', $data_update);
        endif;
        if($aksi=='rubah'):
            if($post['enabledtdj']==1){$data_update['validator_modtandajasa'] = 1;}
            $data_update['status_validasi_modtandajasa'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where(array('nip'=>$nip, 'id'=>decrypt_url($id)));
            $data = $this->db->update('mod_tandajasa', $data_update);
        endif;
		return $data;
    }
    // End Modul penghargaan

    // Modul Terkait Keluarga
    // Get Modul Orangtua
    public function getmodOrangtua(){
        $data = $this->db->get('mod_orangtua');
		return $data;
    }

    public function getmodPasangan(){
        $data = $this->db->get('mod_pasangan');
		return $data;
    }

    public function getmodSanak(){
        $data = $this->db->get('mod_sanak');
		return $data;
    }

    public function getgroupmodKeluarga($url){
        $data = $this->db->get('mod_'.$url);
		return $data;
    }

    public function joingroupmodKeluarga($url)
    {
        $this->db->select('mos.*, ms.nm_'.$url);
        $this->db->from('mod_'.$url.' mos');
        $this->db->join('master_'.$url.' ms', 'ms.id_'.$url.' = mos.'.$url.'_id', 'left');
        $data = $this->db->get();
		return $data;
    }

    // Update Modul Orangtua
    public function updatemodOrangtua($aksi, $post, $nip, $config, $id)
    { 
        
        $isian_tanggal = array(
            'tanggallahir'=> $post['orangtuatgll'],
            'tanggalmeninggal'=> $post['orangtuatglm']
        );
        foreach ($isian_tanggal as $key => $entry)
		{
            if (!empty($entry) && $entry != '-' ):
                $data_update[$key] = date('Y-m-d', strtotime($entry));
            else:
                $data_update[$key] = null;
			endif;
        }

        $this->db->where('nip', $nip);
        $uk = $this->getmodUser()->row_array();
        $data_update['unitkerja_id'] = $uk['skpd_id'];

        $data_update['nip'] = $nip;
        $data_update['orangtua_id'] = $post['orangtuaid'];
        $data_update['nama'] = $post['orangtuanm'];
        $data_update['tempatlahir'] = $post['orangtuatl'];
        $data_update['alamat'] = $post['orangtuaalamat'];
        $data_update['pekerjaan'] = $post['orangtuapekerjaan'];
        $data_update['no_akte_meninggal'] = $post['orangtuameninggalnokate']; 
        $data_update['status_dasar_id'] = $post['statusdasar']; 
        $data_update['update_modorangtua'] = date('Y-m-d H:i:s'); 

        $this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file_orangtua'))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
			<strong>Ups!</strong> '.$this->upload->display_errors().'</div>');
	    }else{
	        $upload_data = $this->upload->data();
	        $file = $upload_data['file_name'];
        }

        if(isset($file)){$data_update['file_kartu_keluarga'] = $file;}
        if($aksi=='tambah'):
            $data_update['validator_modorangtua'] = 1;
            $data_update['status_validasi_modorangtua'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_orangtua', $data_update);
        endif;
        if($aksi=='rubah'):
            if($post['enabledortu']==1){$data_update['validator_modorangtua'] = 1;}
            $data_update['status_validasi_modorangtua'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where(array('nip'=>$nip, 'id'=>decrypt_url($id)));
            $data = $this->db->update('mod_orangtua', $data_update);
        endif;
		return $data;
    }

    // Update Modul Pasangan
    public function updatemodPasangan($aksi, $post, $nip, $id)
    { 
        
        $isian_tanggal = array(
            'tanggal_lahir'=> $post['pasangantgll'],
            'tanggal_meninggal'=> $post['pasangantglm'],
            'tanggal_nikah'=> $post['pasangantgln'],
            'tanggal_cerai'=> $post['pasangantglc']
        );
        foreach ($isian_tanggal as $key => $entry)
		{
            if (!empty($entry) && $entry != '-' ):
                $data_update[$key] = date('Y-m-d', strtotime($entry));
            else:
                $data_update[$key] = null;
			endif;
        }
        $this->db->where('nip', $nip);
        $uk = $this->getmodUser()->row_array();

        $data_update['unitkerja_id'] = $uk['skpd_id'];
        $data_update['nip'] = $nip;
        $data_update['pasangan_id'] = $post['pasangan'];
        $data_update['nama'] = $post['pasangannm'];
        $data_update['tempat_lahir'] = $post['pasangantl'];
        $data_update['no_akte_nikah'] = $post['pasanganaktenikah'];
        $data_update['nip_pasangan'] = $post['pasangannip'];
        $data_update['pekerjaan'] = $post['pasanganpekerjaan'];
        $data_update['no_akte_cerai'] = $post['pasanganaktecerai']; 
        $data_update['no_akte_meninggal'] = $post['pasanganmeninggalnokate']; 
        $data_update['status_dasar_id'] = $post['statusdasar']; 

        $filepasangan = array('ktp_pasangan', 'buku_nikah', 'akta_cerai');
        
        for($p=0; $p < count($filepasangan); $p++){
            if(isset($_FILES['file_'.$filepasangan[$p]]["name"])){
                $config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
                $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
                $config['max_size'] = 500;
                $config['file_name'] = strtoupper($filepasangan[$p]).'_'.strtoupper(str_replace(' ','_',$post['pasangannm']).'_'.$nip);
                
                $this->upload->initialize($config);
                
                if ( ! $this->upload->do_upload('file_'.$filepasangan[$p]))
                {
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                    <strong>Ups!</strong> '.$this->upload->display_errors().'</div>');
                }else{
                    $upload_data = $this->upload->data();
                    $data_update['file_'.$filepasangan[$p]] = $upload_data['file_name'];
                }
            }
        }

        if($aksi=='tambah'):
            $data_update['validator_modpasangan'] = 1;
            $data_update['status_validasi_modpasangan'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_pasangan', $data_update);
        endif;
        if($aksi=='rubah'):
            if($post['enabledpas']==1){$data_update['validator_modpasangan'] = 1;}
            $data_update['status_validasi_modpasangan'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where(array('nip'=>$nip, 'id'=>decrypt_url($id)));
            $data = $this->db->update('mod_pasangan', $data_update);
        endif;
		return $data;
    }

    // Update Modul Anak
    public function updatemodAnak($aksi, $post, $nip, $tgll,$id)
    { 
        

        $isian_tanggal = array(
            'tanggal_lahir'=> $post['anaktgll']
        );
        foreach ($isian_tanggal as $key => $entry)
		{
            if (!empty($entry) && $entry != '-' ):
                $data_update[$key] = date('Y-m-d', strtotime($entry));
            else:
                $data_update[$key] = null;
			endif;
        }
        $this->db->where('nip', $nip);
        $uk = $this->getmodUser()->row_array();

        $data_update['unitkerja_id'] = $uk['skpd_id'];
        $data_update['nip'] = $nip;
        $data_update['anak_id'] = $post['anak'];
        $data_update['nama'] = $post['anaknm'];
        $data_update['tempat_lahir'] = $post['anaktl'];
        $data_update['kelamin_id'] = $post['anakjenkel'];
        $data_update['noaktalahir'] = $post['anaknoaktalahir'];
        $data_update['nobpjs'] = $post['anaknobpjs']; 
        $data_update['pekerjaan'] = $post['anakpekerjaan']; 
        $data_update['nama_ibu'] = $post['ibunm']; 

        $fileanak = array('file_akta_lahir'=>'akta_anak', 'file_bpjs_anak'=>'bpjs_anak');
        
        foreach($fileanak as $b=>$a){
            if(isset($_FILES[$b]["name"])){

                $config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
                $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
                $config['max_size'] = 500;
                $config['file_name'] = strtoupper($a).'_'.$nip.'_'.$tgll;

                $this->upload->initialize($config);
                
                if ( ! $this->upload->do_upload($b))
                {
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                    <strong>Ups!</strong> '.$this->upload->display_errors().'</div>');
                }else{
                    $upload_data = $this->upload->data();
                    $data_update[$b] = $upload_data['file_name'];
                }
            }
        }
        if($aksi=='tambah'):
            $data_update['validator_modanak'] = 1;
            $data_update['status_validasi_modanak'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_anak', $data_update);
        endif;
        if($aksi=='rubah'):
            if($post['enabledank']==1){$data_update['validator_modanak'] = 1;}
            $data_update['status_validasi_modanak'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where(array('nip'=>$nip, 'id'=>decrypt_url($id)));
            $data = $this->db->update('mod_anak', $data_update);
        endif;
		return $data;
    }

    // Modul Terkait Group Keluarga Tidak Terpakai dulu
    public function updategroupmodKeluarga($uri, $aksi, $post, $nip, $config, $id)
    { 
        $this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file_'.$uri))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
			<strong>Ups!</strong> '.$this->upload->display_errors().'</div>');
	    }else{
	        $upload_data = $this->upload->data();
	        $file = $upload_data['file_name'];
        }
        
        if ( ! $this->upload->do_upload('file2_'.$uri))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
			<strong>Ups!</strong> '.$this->upload->display_errors().'</div>');
	    }else{
	        $upload_data = $this->upload->data();
	        $file2 = $upload_data['file_name'];
        }
        
        !empty($post['orangtuatgll']) && $post[$uri.'tgll'] != '-' ? $data_update['tanggallahir'] = date('Y-m-d', strtotime($post[$uri.'tgll'])) : $data_update['tanggallahir'] = null;
        if(isset($post[$uri.'tglm'])):
            !empty($post[$uri.'tglm']) && $post[$uri.'tglm'] != '-' ? $data_update['tanggalmeninggal'] = date('Y-m-d', strtotime($post[$uri.'tglm'])) : $data_update['tanggalmeninggal'] = null;
        endif;

        $data_update['nip'] = $nip;
        $data_update[$uri.'_id'] = $post[$uri.'id'];
        $data_update['nama'] = $post[$uri.'nm'];
        $data_update['tempatlahir'] = $post[$uri.'tl'];
        $data_update['alamat'] = $post[$uri.'alamat'];
        $data_update['pekerjaan'] = $post[$uri.'pekerjaan'];
        $data_update['no_akte_meninggal'] = $post[$uri.'meninggalnokate']; 
        $data_update['status_dasar_id'] = $post['statusdasar']; 

        if(isset($file)){$data_update['file_kartu_keluarga'] = $file;}
        if($aksi=='tambah'):
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_'.$uri, $data_update);
        endif;
        if($aksi=='rubah'):
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where(array('nip'=>$nip, 'id'=>decrypt_url($id)));
            $data = $this->db->update('mod_'.$uri, $data_update);
        endif;
		return $data;
    }
    // End Modul Keluarga

    // Modul Cuti
    public function getmodCuti(){
        $data = $this->db->get('mod_cuti');
		return $data;
    }

    public function joinmodCuti()
    {
        $this->db->select('moc.*, mc.nm_cuti');
        $this->db->from('mod_cuti moc');
        $this->db->join('master_cuti mc', 'mc.id_cuti = moc.cuti_id', 'left');
        $data = $this->db->get();
		return $data;
    }

    public function updatemodCuti($aksi, $post, $nip, $config, $id)
    { 
        $isian_tanggal = array(
            'tgl_awal_cuti'=> $post['tglawc'],
            'tgl_akhir_cuti'=> $post['tglakc'],
            'tgl_surat_cuti'=> $post['tglsc']
        );
        foreach ($isian_tanggal as $key => $entry)
		{
            if (!empty($entry) && $entry != '-' ):
                $data_update[$key] = date('Y-m-d', strtotime($entry));
            else:
                $data_update[$key] = null;
			endif;
        }
        $this->db->where('nip', $nip);
        $uk = $this->getmodUser()->row_array();

        $data_update['unitkerja_id'] = $uk['skpd_id'];
        $data_update['nip'] = $nip;
        $data_update['cuti_id'] = $post['cuti'];
        $data_update['lama_cuti'] = $post['lamac'];
        $data_update['alasan_cuti'] = $post['alasanc'];

        $this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file_cutis'))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
			<strong>Ups!</strong> '.$this->upload->display_errors().'</div>');
	    }else{
	        $upload_data = $this->upload->data();
	        $file = $upload_data['file_name'];
		}
        
        if(isset($file)){$data_update['file_surat_cuti'] = $file;}
        if($aksi=='tambah'):
            $data_update['validator_modcuti'] = 1;
            $data_update['status_validasi_modcuti'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_cuti', $data_update);
        endif;
        if($aksi=='rubah'):
            if($post['enabledcut']==1){$data_update['validator_modcuti'] = 1;}
            $data_update['status_validasi_modcuti'] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where(array('nip'=>$nip, 'id'=>decrypt_url($id)));
            $data = $this->db->update('mod_cuti', $data_update);
        endif;
		return $data;
    }
    // End Modul Kredit

    
    
    


}