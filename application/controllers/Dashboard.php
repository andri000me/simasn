<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        if($this->session->userdata('login') == false){
            redirect('login');
        }
        date_default_timezone_set("Asia/Makassar");
        $this->load->model('user_model');
        $this->load->model('asn/data_utama_model');
    }

    public function uri(){
		$data['uri1'] = $this->uri->segment(1);
      	$data['uri2'] = $this->uri->segment(2);
      	$data['uri3'] = $this->uri->segment(3);
      	$data['uri4'] = $this->uri->segment(4);
      	$data['uri5'] = $this->uri->segment(5);
      	return $data;
	}

	public function index()
	{
        $sesi_nip = $this->session->userdata('nip');
        $data = $this->uri();
        $this->db->where('nip', $sesi_nip);
        $data['user'] = $this->user_model->getmodUser()->row_array();
        $this->db->where('vra.nip', $sesi_nip);
        $data['asn'] = $this->data_utama_model->getViewpegawai()->row_array();
        $data['kgbm'] = $this->data_utama_model->getmodKgbmax()->row_array();
        $this->load->view('asn/dashboard', $data);
        
        
	}
}
