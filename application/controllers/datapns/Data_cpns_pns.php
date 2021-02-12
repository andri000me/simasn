<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_cpns_pns extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        if($this->session->userdata('login') == false){
            redirect('login');
		}
		date_default_timezone_set("Asia/Makassar");
        $this->load->model('user_model');
        $this->load->model('asn/cpns_pns_model');
	}
	
	public function uri(){
		$data['uri1'] = $this->uri->segment(1);
      	$data['uri2'] = $this->uri->segment(2);
      	$data['uri3'] = $this->uri->segment(3);
      	$data['uri4'] = $this->uri->segment(4);
      	$data['uri5'] = $this->uri->segment(5);
      	return $data;
	}

	public function cpns()
	{
		$sesi_nip = $this->session->userdata('nip');

        $data = $this->uri();
		$this->db->where('nip', $sesi_nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$this->db->where('nip', $sesi_nip);
		$data['mcp'] = $this->cpns_pns_model->getmodCpns()->row_array();
		$this->db->where('nip', $sesi_nip);
		$data['mcpt'] = $this->cpns_pns_model->getmodCpnsTinjauan()->row_array();
		$data['mgolongan'] = $this->cpns_pns_model->getmasterGolongan()->result_array();
		$data['kvgol'] = array_column($data['mgolongan'], 'golongan', 'id_golongan');
		$data['mpengadaan'] = $this->cpns_pns_model->getmasterPengadaan()->result_array();
		$data['kvpengadaan'] = array_column($data['mpengadaan'], 'nm_pengadaan', 'id_pengadaan');
		$data['munitkerja'] = $this->cpns_pns_model->getmasterUnitkerja()->result_array();
        $data['kvuk'] = array_column( $data['munitkerja'], 'nm_unitkerja', 'id_unitkerja');
		$this->load->view('asn/data_cpns_pns/cpns', $data);
	}

	public function update_cpns($aksi)
	{
		$post = $this->input->post();
		$nip = $this->session->userdata('nip');
		$update = $this->cpns_pns_model->updatemodCpnsTinjauan($aksi, $post, $nip);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_cpns_pns/cpns');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_cpns_pns/cpns');
        endif;
		
	}

	public function pns()
	{
		$sesi_nip = $this->session->userdata('nip');

        $data = $this->uri();
        $this->db->where('nip', $sesi_nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$this->db->where('nip', $sesi_nip);
		$data['mp'] = $this->cpns_pns_model->getmodPns()->row_array();
		$this->db->where('nip', $sesi_nip);
		$data['mpt'] = $this->cpns_pns_model->getmodPnsTinjauan()->row_array();
		$data['mgolongan'] = $this->cpns_pns_model->getmasterGolongan()->result_array();
		$data['kvgol'] = array_column($data['mgolongan'], 'golongan', 'id_golongan');
		$data['munitkerja'] = $this->cpns_pns_model->getmasterUnitkerja()->result_array();
        $data['kvuk'] = array_column( $data['munitkerja'], 'nm_unitkerja', 'id_unitkerja');
		$this->load->view('asn/data_cpns_pns/pns', $data);
	}

	public function update_pns($aksi)
	{
		$nip = $this->session->userdata('nip');
		$post = $this->input->post();
		
		$update = $this->cpns_pns_model->updatemodPnsTinjauan($aksi, $post, $nip);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_cpns_pns/pns');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_cpns_pns/pns');
        endif;
		
	}
}
