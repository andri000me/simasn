<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_utama extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        if($this->session->userdata('login') == false){
            redirect('login');
		}
		date_default_timezone_set("Asia/Makassar");
        $this->load->model('user_model');
        $this->load->model('asn/asn_model');
	}
	
	public function uri(){
		$data['uri1'] = $this->uri->segment(1);
      	$data['uri2'] = $this->uri->segment(2);
      	$data['uri3'] = $this->uri->segment(3);
      	$data['uri4'] = $this->uri->segment(4);
      	$data['uri5'] = $this->uri->segment(5);
      	return $data;
	}

	public function data_pribadi()
	{
		$sesi_nip = $this->session->userdata('nip');
        $data = $this->uri();
        $this->db->where('nip', $sesi_nip);
        $data['user'] = $this->user_model->getmodUser()->row_array();
        $this->db->where('nip', $sesi_nip);
		$data['dp'] = $this->asn_model->getmodDatapribadi()->row_array();
		$this->db->where('nip', $sesi_nip);
		$data['dpt'] = $this->asn_model->getmodDatapribadiTinjauan()->row_array();
        $data['jk'] = $this->asn_model->getJeniskelamin()->result_array();
        $data['kvkelamin'] = array_column($data['jk'], 'nm_kelamin', 'id_kelamin');
        $data['snikah'] = $this->asn_model->getStatusnikah()->result_array();
        $data['kvsnikah'] = array_column($data['snikah'], 'nm_skawin', 'id_skawin');
        $data['agama'] = $this->asn_model->getAgama()->result_array();
        $data['kvagama'] = array_column($data['agama'], 'nm_agama', 'id_agama');
        $data['munitkerja'] = $this->asn_model->getmasterUnitkerja()->result_array();
        $data['kvuk'] = array_column( $data['munitkerja'], 'nm_unitkerja', 'id_unitkerja');
		$this->load->view('asn/data_utama/data_pribadi', $data);
	}

	public function update_data_pribadi($aksi)
	{
		$nip = $this->session->userdata('nip');

		$config['upload_path'] = './assets/asn/img/profiles/'; //path folder
		$config['allowed_types'] = 'jpg|jpeg'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = 500;
		$config['file_name'] = 'FOTO_'.$nip;
	    
		$configdok['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
		$configdok['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		$configdok['max_size'] = 500;
		$configdok['file_name'] = 'KTP_'.$nip;

		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
	

		$post = $this->input->post();
		
		$update = $this->asn_model->updatemodDatapribadiTinjauan($aksi, $post, $config, $configdok, $nip);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_utama/data_pribadi');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_utama/data_pribadi');
        endif;
		
	}

	public function identitas_pegawai()
	{
		$sesi_nip = $this->session->userdata('nip');
        $data = $this->uri();
        $this->db->where('nip', $sesi_nip);
        $data['user'] = $this->user_model->getmodUser()->row_array();
        $this->db->where('nip', $sesi_nip);
		$data['idp'] = $this->asn_model->getmodIdentitaspegawai()->row_array();
		$this->db->where('nip', $sesi_nip);
		$data['idpt'] = $this->asn_model->getmodIdentitaspegawaiTinjauan()->row_array();
        $data['jpegawai'] = $this->asn_model->getJenisPegawai()->result_array();
        $data['kvpegawai'] = array_column($data['jpegawai'], 'jenis_pegawai', 'id_jenis_pegawai');
		$data['kedudukan'] = $this->asn_model->getKedudukan()->result_array();
		$data['kvkedudukan'] = array_column($data['kedudukan'], 'nm_kedudukan', 'id_kedudukan');
		$data['munitkerja'] = $this->asn_model->getmasterUnitkerja()->result_array();
        $data['kvuk'] = array_column( $data['munitkerja'], 'nm_unitkerja', 'id_unitkerja');
		$this->load->view('asn/data_utama/identitas_pegawai', $data);
	}

	public function update_identitas_pegawai($aksi)
	{
		$nip = $this->session->userdata('nip');
		// $config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
		// $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		// $config['max_size'] = 1000;
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		$post = $this->input->post();
		
		$update = $this->asn_model->updatemodIdentitaspegawaiTinjauan($aksi, $post, $nip);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_utama/identitas_pegawai');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_utama/identitas_pegawai');
        endif;
		
	}

	public function data_fisik()
	{
		$sesi_nip = $this->session->userdata('nip');
		$data = $this->uri();
		$this->db->where('nip', $sesi_nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$this->db->where('nip', $sesi_nip);
		$data['mf'] = $this->asn_model->getmodFisik()->row_array();
		$this->db->where('nip', $sesi_nip);
		$data['mft'] = $this->asn_model->getmodFisikTinjauan()->row_array();
		$data['munitkerja'] = $this->asn_model->getmasterUnitkerja()->result_array();
        $data['kvuk'] = array_column( $data['munitkerja'], 'nm_unitkerja', 'id_unitkerja');
		$this->load->view('asn/data_utama/data_fisik', $data);
	}

	public function update_data_fisik($aksi)
	{
		$nip = $this->session->userdata('nip');
		$post = $this->input->post();
		
		$update = $this->asn_model->updatemodFisikTinjauan($aksi, $post, $nip);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_utama/data_fisik');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_utama/data_fisik');
        endif;
		
	}
}
