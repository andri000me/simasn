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
		$this->load->model('user_model');
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
        $data = $this->uri();
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		
		$this->load->view('admin/dashboard', $data);
	}

	
}
