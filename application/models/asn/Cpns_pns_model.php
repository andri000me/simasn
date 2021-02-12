<?php

class Cpns_pns_model extends CI_Model
{
    public function getmasterUnitkerja(){
        $data = $this->db->get('master_unitkerja');
		return $data;
    }

    public function getmodCpns(){
        $data = $this->db->get('mod_cpns');
		return $data;
    }

    public function getmodCpnsTinjauan(){
        $data = $this->db->get('mod_cpns_tinjauan');
		return $data;
    }

    public function updatemodCpnsTinjauan($aksi, $post, $nip)
    {
        $isian_tanggal = array(
            'tmt_cpns'=> $post['tmt_cpns'], 
            'tgl_bkn'=> $post['tanggal_bkn'],
            'sk_tanggal' => $post['tglsk'],
            'spmt_tanggal' => $post['tanggal_spmt']
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
        $data_update['unitkerja_id'] = $this->session->userdata('skpd_id');
        $data_update['masa_kerja_golongan_tahun'] = $post['mk_tahun'];
        $data_update['masa_kerja_golongan_bulan'] = $post['mk_bulan'];
        $data_update['pengadaan_id'] = $post['jenis_pengadaan'];
        $data_update['no_bkn'] = $post['nomor_bkn'];
        $data_update['sk_pejabat'] = $post['pejabat_penetap'];
        $data_update['sk_nomor'] = $post['nosk'];
        $data_update['spmt_nomor'] = $post['nomor_spmt'];

        $file = array('sk'=>'sk_cpns', 'spmt'=>'spmt');

        foreach($file as $b=>$a){
            if(isset($_FILES['file_'.$b.'_cpns']["name"])){
                $config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
                $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
                $config['max_size'] = 500;
                $config['overwrite'] = TRUE;
                $config['file_name'] = strtoupper($a).'_'.$nip;
        
                $this->upload->initialize($config);
        
                if ( ! $this->upload->do_upload('file_'.$b.'_cpns'))
                {
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                    <strong>Gagal!</strong> Pastikan ukurannya dan penamaan file sesuai dengan persyaratan</div>');
                }else{
                    $upload_data = $this->upload->data();
                    $data_update['file_'.$b] = $upload_data['file_name'];
                }
            }
        }

        if($aksi=='insert'):
            $data_update['validator_modcpns'] = 1;
            $data_update['status_validasi_modcpns'] = 1;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_cpns_tinjauan', $data_update);
        endif;
        if($aksi=='ubah'):
            $data_update['status_validasi_modcpns'] = 1;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where('nip', $nip);
            $data = $this->db->update('mod_cpns_tinjauan', $data_update);
        endif;
		return $data;
    }

    public function getmasterGolongan(){
        $data = $this->db->get('master_golongan');
		return $data;
    }

    public function getmasterPengadaan(){
        $data = $this->db->get('master_pengadaan');
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

    public function updatemodPnsTinjauan($aksi, $post, $nip)
    {
        $isian_tanggal = array(
            'tmt_pns'=> $post['tmt_pns'], 
            'tgl_bkn'=> $post['tanggal_bkn'],
            'sk_tanggal' => $post['tanggal_sk'],
            'sttpl_tanggal' => $post['tanggal_sttpl'],
            'tanggal_kdokter' => $post['tanggal_ket_dokter']
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
        $data_update['unitkerja_id'] = $this->session->userdata('skpd_id');
        $data_update['masa_kerja_golongan_tahun'] = $post['mk_tahun'];
        $data_update['masa_kerja_golongan_bulan'] = $post['mk_bulan'];
        $data_update['no_bkn'] = $post['nomor_bkn'];
        $data_update['sk_pejabat'] = $post['pejabat_penetap'];
        $data_update['sk_nomor'] = $post['nomor_sk'];
        $data_update['sttpl_nomor'] = $post['nomor_sttpl'];
        $data_update['nomor_kdokter'] = $post['nomor_ket_dokter'];

        $filepns = array('sk'=>'sk_pns', 'sttpl'=>'sttpl', 'sumpah'=>'sumpah_pns');
        foreach($filepns as $b=>$a){
            if(isset($_FILES['file_'.$b.'_pns']["name"])){
                $config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
                $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
                $config['max_size'] = 500;
                $config['overwrite'] = TRUE;
                $config['file_name'] = strtoupper($a).'_'.$nip;

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('file_'.$b.'_pns'))
                {
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                    <strong>Gagal!</strong> Pastikan ukurannya dan penamaan file sesuai dengan persyaratan</div>');
                }else{
                    $upload_data = $this->upload->data();
                    $data_update['file_'.$b] = $upload_data['file_name'];
                }
            }
        }

        if($aksi=='insert'):
            $data_update['validator_modpns'] = 1;
            $data_update['status_validasi_modpns'] = 1;
            $data_update = $this->security->xss_clean($data_update);
            $data = $this->db->insert('mod_pns_tinjauan', $data_update);
        endif;
        if($aksi=='ubah'):
            $data_update['status_validasi_modpns'] = 1;
            $data_update = $this->security->xss_clean($data_update);
            $this->db->where('nip', $nip);
            $data = $this->db->update('mod_pns_tinjauan', $data_update);
        endif;
		return $data;
    }

}