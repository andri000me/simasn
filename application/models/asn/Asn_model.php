<?php

class Asn_model extends CI_Model
{
    public function getmasterUnitkerja(){
        $data = $this->db->get('master_unitkerja');
		return $data;
    }

    public function getmodDatapribadi(){
        $data = $this->db->get('mod_datapribadi');
		return $data;
    }

    public function getmodDatapribadiTinjauan(){
        $data = $this->db->get('mod_datapribadi_tinjauan');
		return $data;
    }

    public function getmodKgbmax(){
        $data = $this->db->select_max('tgl_sk')->get('mod_kgb');
		return $data;
    }

    public function updatemodDatapribadiTinjauan($aksi, $post, $config, $configdok, $nip)
    {
        $data_update['nip'] = $nip;
        $data_update['nama'] = $post['nama'];
        $data_update['unitkerja_id'] = $this->session->userdata('skpd_id');
        $data_update['nip_lama'] = $post['nip_lama'];
        $data_update['gelardepan'] = $post['gelar_depan'];
        $data_update['gelarbelakang'] = $post['gelar_belakang'];
        $data_update['tempatlahir'] = $post['tempat_lahir'];
        $data_update['kelamin_id'] = $post['jenis_kelamin'];
        $data_update['skawin'] = $post['status_pernikahan'];
        $data_update['agama'] = $post['agama'];
        $data_update['notlpx'] = $post['nomor_hp'];
        $data_update['email'] = $post['email'];
        $data_update['kodepos'] = $post['kode_pos'];
        $data_update['alamat'] = $post['alamat'];

        if (!empty( $post['tanggal_lahir']) &&  $post['tanggal_lahir'] != '-' ):
            $data_update['tanggallahir'] = date('Y-m-d', strtotime($post['tanggal_lahir']));
        else:
            $data_update['tanggallahir'] = null;
        endif;

        $this->load->library('upload', $config, 'image');
        $this->image->initialize($config);

        $this->load->library('upload', $configdok, 'dok');
        $this->dok->initialize($configdok);
		
		if ( ! $this->image->do_upload('foto'))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
	        <strong>Gagal!</strong> Pastikan ukurannya dan penamaan file sesuai dengan persyaratan</div>');
	    }else{
	        $upload_data = $this->image->data();
	        $image = $upload_data['file_name'];
        }
        
        if ( ! $this->dok->do_upload('filektp'))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
	        <strong>Gagal!</strong> Pastikan ukurannya dan penamaan fiel sesuai dengan persyaratan</div>');
	    }else{
	        $upload_data = $this->dok->data();
	        $ktp = $upload_data['file_name'];
		}
        
        if(isset($image)){$data_update['foto'] = $image;}
        if(isset($ktp)){$data_update['file_ktp'] = $ktp;}
        
        if($aksi=='insert'):
            $data_update['status_validasi_moddp'] = 1;
            $data_update['validator_moddp'] = 1;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_datapribadi_tinjauan', $data_update);
        endif;
        if($aksi=='ubah'):
            $data_update['status_validasi_moddp'] = 1;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where('nip', $nip);
            $data = $this->db->update('mod_datapribadi_tinjauan', $data_update);
        endif;
		return $data;
    }

    public function getmodIdentitaspegawai(){
        $data = $this->db->get('mod_identitas');
		return $data;
    }

    public function getViewasn(){
        $this->db->from('view_asn va');
        $this->db->join('master_golongan mg', 'mg.id_golongan = va.id_golongan', 'left');
        $data = $this->db->get();
		return $data;
    }

    public function getmodIdentitaspegawaiTinjauan(){
        
        $data = $this->db->get('mod_identitas_tinjauan');
		return $data;
    }

    public function updatemodIdentitaspegawaiTinjauan($aksi, $post, $nip)
    {
        $this->db->where('nip', $nip);
        $cekkelamin = $this->getmodDatapribadi()->row();

        $data_update['nip'] = $nip;
        $data_update['unitkerja_id'] = $this->session->userdata('skpd_id');
        $data_update['nokarpeg'] = $post['nomor_karpeg'];
        $data_update['noktp'] = $post['nomor_ktp'];
        $data_update['nonpwp'] = $post['nomor_npwp'];
        $data_update['noarsip'] = $post['nomor_arsip'];
        $data_update['nonuptk'] = $post['nomor_nuptk'];
        $data_update['noregguru'] = $post['noreg_guru'];
        $data_update['nobpjs'] = $post['nomor_bpjs'];
        $data_update['notaspen'] = $post['nomor_taspen'];
        $data_update['nokariskarsu'] = $post['karis_karsu'];
        $data_update['bapetarum'] = $post['tapera'];
        $data_update['kepemilikan_kpe'] = $post['kepemilikasn_kpe'];
        $data_update['status_sertifikasi'] = $post['status_sertifikasi'];
        $data_update['jenis_pegawai_id'] = $post['jenis_pegawai'];
        $data_update['status_pegawai'] = $post['status_pegawai'];
        $data_update['kedudukan_id'] = $post['kedudukan'];
        if($post['status_pegawai']==2):
            $data_update['no_statuspns'] = $post['nomor_sk_statuspns'];
            if (!empty( $post['tanggal_sk_statuspns']) &&  $post['tanggal_sk_statuspns'] != '' ):
                $data_update['tglsk_statuspns'] = date('Y-m-d', strtotime($post['tanggal_sk_statuspns']));
            else:
                $data_update['tglsk_statuspns'] = null;
            endif;
            if (!empty( $post['tmt_sk_statuspns']) &&  $post['tmt_sk_statuspns'] != '' ):
                $data_update['tmt_statuspns'] = date('Y-m-d', strtotime($post['tmt_sk_statuspns']));
            else:
                $data_update['tmt_statuspns'] = null;
            endif;
        else:
            $data_update['no_statuspns'] =  null;
            $data_update['tglsk_statuspns'] = null;
            $data_update['tmt_statuspns'] = null;
            $data_update['file_sk_pnsnonaktif'] = null;
        endif;

        $data_update['last_update_idpt'] = date('Y-m-d');
        $kariskarsu = $cekkelamin->kelamin_id==1 ? 'kartu_suami' : 'kartu_istri';
        $arsip = array('karpeg'=>'karpeg','npwp'=>'npwp','nuptk'=>'nuptk','bpjs'=>'bpjs','taspen'=>'kartu_taspen','sertifikasi'=>'sertifikasi','kariskarsu'=>$kariskarsu,'kpe'=>'kpe','sk_pnsnonaktif'=>'sk_pnsnonaktif');
        
        foreach($arsip as $b=>$a){
            if(isset($_FILES[$b]['name'])){
                $config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
                $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
                $config['max_size'] = 500;
                $config['overwrite'] = TRUE;
                $config['file_name'] = strtoupper($a).'_'.$nip;

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload($b))
                {
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                    <strong>Gagal!</strong> Pastikan ukurannya dan penamaan fiel sesuai dengan persyaratan</div>');
                }else{
                    $upload_data = $this->upload->data();
                    $data_update['file_'.$b] = $upload_data['file_name'];
                }
            }
        }

        if($aksi=='insert'):
            $data_update['status_validasi_modidpt'] = 1;
            $data_update['validator_modidpt'] = 1;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_identitas_tinjauan', $data_update);
        endif;
        if($aksi=='ubah'):
            $data_update['status_validasi_modidpt'] = 1;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where('nip', $nip);
            $data = $this->db->update('mod_identitas_tinjauan', $data_update);
        endif;
		return $data;
    }

    

    public function getJeniskelamin(){
        $data = $this->db->get('master_kelamin');
		return $data;
    }
    public function getLastRiwayat(){

        $data = $this->db->get('view_lastriwayat');
		return $data;
    }

    public function getStatusnikah(){
        $data = $this->db->get('master_skawin');
		return $data;
    }

    public function getAgama(){
        $data = $this->db->get('master_agama');
		return $data;
    }

    public function getJenisPegawai(){
        $data = $this->db->get('master_jenis_pegawai');
		return $data;
    }

    public function getKedudukan(){
        $data = $this->db->get('master_kedudukan');
		return $data;
    }

    public function getmodFisik(){
        $data = $this->db->get('mod_fisik');
		return $data;
    }

    public function getmodFisikTinjauan(){
        $data = $this->db->get('mod_fisik_tinjauan');
		return $data;
    }

    public function updatemodFisikTinjauan($aksi, $post, $nip)
    {
        $data_update['nip'] = $nip;
        $data_update['unitkerja_id'] = $this->session->userdata('skpd_id');
        $data_update['goldarah'] = $post['golongan_darah'];
        $data_update['tinggi'] = $post['tinggi_badan'];
        $data_update['berat'] = $post['berat_badan'];
        $data_update['nosepatu'] = $post['nomor_sepatu'];
        $data_update['nobaju'] = $post['ukuran_baju'];
        $data_update['cacat'] = $post['cacat_tubuh'];
        $data_update['kondisi_fisik'] = $post['kondisi_fisik'];
        if($aksi=='insert'):
            $data_update['status_validasi_modmft'] = 1;
            $data_update['validator_modmft'] = 1;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_fisik_tinjauan', $data_update);
        endif;
        if($aksi=='ubah'):
            $data_update['status_validasi_modmft'] = 1;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where('nip', $nip);
            $data = $this->db->update('mod_fisik_tinjauan', $data_update);
        endif;
		return $data;
    }

    function getmodulPangkat()
    {
        $this->db->from('mod_pangkat mop');
        $this->db->join('master_golongan mg', 'mg.id_golongan = mop.golongan_id', 'left');
        $this->db->order_by('tmt_pangkat', 'desc');
        $query = $this->db->get();
        return $query;
    }

    function getmodulJabatan()
    {
        $this->db->select('moj.*, me.eselon, mb.nm_bidang, sb.nm_subbidang, mj.nm_jabatan, mjj.jenjang_jabatan, mu.nm_unitkerja');
        $this->db->from('mod_jabatan moj');
        $this->db->join('master_eselon me', 'me.id_eselon = moj.eselon_id', 'left');
        $this->db->join('master_bidang mb', 'mb.id_bidang = moj.bagian_id', 'left');
        $this->db->join('master_subbidang sb', 'sb.id_subbidang = moj.subbagian_id', 'left');
        $this->db->join('master_jabatan mj', 'mj.id_jabatan = moj.jabatan_id', 'left');
        $this->db->join('master_jenjang_jabatan mjj', 'mjj.id_jenjang_jabatan = moj.jenjab_id', 'left');
        $this->db->join('master_unitkerja mu', 'mu.id_unitkerja = moj.unitkerja_id', 'left');
        $this->db->order_by('tmt_jabatan', 'desc');
        $query = $this->db->get();
        return $query;
    }

    function getmodulJnPendidikan()
    {
        $this->db->from('mod_pendidikan mop');
        $this->db->join('master_jpendidikan me', 'me.id_jpendidikan = mop.jpendidikan_id', 'left');
        $this->db->order_by('tgl_lulus', 'desc');
        $query = $this->db->get();
        return $query;
    }
}