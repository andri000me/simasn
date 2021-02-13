<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
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
        $this->db->where('nip', $sesi_nip);
        $data['asn'] = $this->data_utama_model->getViewasn()->row_array();
        $this->load->view('setting', $data);
        
        
    }
    
    public function ubah_username()
    {
        $post = $this->input->post();
        $sesi_nip = $this->session->userdata('nip');
        $data['username'] = $post['usernm'];

        $update = $this->db->where('nip', $sesi_nip)->update('mod_user', $data);

        if($update){
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Username anda telah terupdate.</div>');
            redirect('setting');	
        }else{
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal! </strong> Update Username.</div>');
            redirect('setting');	

        }
    }
    public function ubah_password()
    {
        $post = $this->input->post();
        $sesi_nip = $this->session->userdata('nip');
        $this->db->where('nip', $sesi_nip);
        $cekuser = $this->user_model->getmodUser()->row_array();

        if($post['paswl']!=$cekuser['password']){
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal! </strong> Password lama yang anda masukkan salah.</div>');
            redirect('setting');	
        }

        if($post['pasw']!=$post['kpasw']){
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal! </strong> Konfirmasi password anda tidak cocok.</div>');
            redirect('setting');	
        }
        
        $data['password'] = $post['pasw'];
        $data['password_enc'] = md5($post['pasw']);

        $update = $this->db->where('nip', $sesi_nip)->update('mod_user', $data);

        if($update){
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Password anda telah terupdate.</div>');
            redirect('setting');	
        }else{
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal! </strong> Update password.</div>');
            redirect('setting');	

        }

        
    }
}
