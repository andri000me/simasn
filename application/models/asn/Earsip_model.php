<?php

class Earsip_model extends CI_Model
{
    public function getmodCpns(){
        $data = $this->db->get('mod_cpns');
		return $data;
    }

    public function getmodCpnsTinjauan(){
        $data = $this->db->get('mod_cpns_tinjauan');
		return $data;
    }

    public function getmodPns(){
        $data = $this->db->get('mod_pns');
		return $data;
    }

    public function getmodPnsTinjauan(){
        $data = $this->db->get('mod_pns_tinjauan');
		return $data;
    }

    public function getmodIdentitas(){
        $data = $this->db->get('mod_identitas');
		return $data;
    }

    public function getmodIdentitasTinjauan(){
        $data = $this->db->get('mod_identitas_tinjauan');
		return $data;
    }
    public function getmodDtpribadi(){
        $data = $this->db->get('mod_datapribadi');
		return $data;
    }

    public function getmodDtpribadiTinjauan(){
        $data = $this->db->get('mod_datapribadi_tinjauan');
		return $data;
    }

    public function getmodJabatan(){
        $data = $this->db->get('mod_jabatan');
		return $data;
    }

    public function getmodPangkat(){
        $data = $this->db->get('mod_pangkat');
		return $data;
    }

    public function getmodPendidikan(){
        $data = $this->db->get('mod_pendidikan');
		return $data;
    }

    public function getmodDiklat(){
        $data = $this->db->get('mod_diklat');
		return $data;
    }
    public function getmodSeminar(){
        $data = $this->db->get('mod_seminar');
		return $data;
    }
    public function getmodHukuman(){
        $data = $this->db->get('mod_hukuman');
		return $data;
    }
    public function getmodKgb(){
        $data = $this->db->get('mod_kgb');
		return $data;
    }
    public function getmodKredit(){
        $data = $this->db->get('mod_kredit');
		return $data;
    }
    public function getmodPenghargaan(){
        $data = $this->db->get('mod_tandajasa');
		return $data;
    }
    public function getmodCuti(){
        $data = $this->db->get('mod_cuti');
		return $data;
    }

    public function getmasterJPendidikan(){
        $data = $this->db->get('master_jpendidikan');
		return $data;
    }

    public function getModul($key){
        $data = $this->db->get('mod_'.$key);
		return $data;
    }

    public function getModulTinjauan($key){
        $data = $this->db->get('mod_'.$key);
		return $data;
    }

    public function updatefileArsip($aksi, $induk, $dok, $config, $nip)
    {
        $mod = array('datapribadi'=>'moddp','identitas'=>'modidpt', 'cpns'=>'modcpns', 'pns'=>'modpns');
        $this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file_'.$dok))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
			<strong>Ups!</strong> '.$this->upload->display_errors().'</div>');
	    }else{
	        $upload_data = $this->upload->data();
            $file = $upload_data['file_name'];
            $data_update['file_'.$dok] = $file;

            if($aksi=='insert'):
                $data_update['nip'] = $nip;
                $data_update['unitkerja_id'] = $this->session->userdata('skpd_id');
                $data_update['status_validasi_'.$mod[$induk]] = 1;
                $data_update['validator_'.$mod[$induk]] = 1;
                $data_update = $this->security->xss_clean($data_update);
                $data = $this->db->insert('mod_'.$induk.'_tinjauan', $data_update);
            endif;
            if($aksi=='ubah'):
                $data_update['status_validasi_'.$mod[$induk]] = 1;
                $data_update = $this->security->xss_clean($data_update);
                $this->db->where('nip', $nip);
                $data = $this->db->update('mod_'.$induk.'_tinjauan', $data_update);
            endif;
            return $data;
        }
        
        
    }

    public function updatefileArsipRiwayat($induk, $nmf, $config, $nip, $id)
    {
        $this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file_'.$nmf.$induk))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
			<strong>Ups!</strong> '.$this->upload->display_errors().'</div>');
	    }else{
            $ckaktif = $this->db->where('id', decrypt_url($id))->get('mod_'.$induk)->row_array();

	        $upload_data = $this->upload->data();
            $file = $upload_data['file_name'];
            if(isset($file)){$data_update['file_'.$nmf.'_'.$induk] = $file;}
            if($ckaktif['status_aktif']==1){$data_update['validator_mod'.$induk] = 1;}
            $data_update['status_validasi_mod'.$induk] = 1;
            $data_update['status_aktif'] = 0;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where(array('nip'=> $nip, 'id'=>decrypt_url($id)));
            $data = $this->db->update('mod_'.$induk, $data_update);
            return $data;
        }
        
        
    }


}