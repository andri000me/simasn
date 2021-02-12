<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_pegawai extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('login') == false){
			redirect('login');
			
		}
        //load libary pagination
        $this->load->helper('generate');
        $this->load->library('pagination');
        //load the department_model
        $this->load->model('admin/pegawai_model');
		$this->load->model('admin/master_data_model');
		$this->load->model('user_model');
		$this->load->model('master_model');
    }

	public function uri(){
		$data['uri1'] = $this->uri->segment(1);
      	$data['uri2'] = $this->uri->segment(2);
      	$data['uri3'] = $this->uri->segment(3);
      	$data['uri4'] = $this->uri->segment(3);
      	return $data;
	}

	public function index()
	{
		$data = $this->uri();
		$sesi_nip = $this->session->userdata('nip');
        $this->db->where('nip',$sesi_nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$data['lvl'] = array_column($this->pegawai_model->level()->result_array(), 'level', 'id_level');
		$data['skpd'] = $this->master_model->getmasterUnitkerja()->result_array();
		$data['jenis_pegawai'] = $this->pegawai_model->get_jenis_pegawai()->result_array();
		$this->load->view('admin/tambah_pegawai', $data);
	}

	public function input_data_pegawai()
	{
		$nip =  $this->session->userdata('nip');
		$data = $this->uri();
		$pegawai = $this->input->post();

		$this->db->where('nip', $pegawai['nip']);
		$cekdatapribadi = $this->pegawai_model->get_modul_datapribadi()->num_rows;
		$this->db->where('nip', $pegawai['nip']);
		$cekidentitas = $this->pegawai_model->get_modul_identitas()->num_rows;
		$this->db->where('nip', $pegawai['nip']);
		$cekfisik = $this->pegawai_model->get_modul_fisik()->num_rows;
		$this->db->where('nip', $pegawai['nip']);
		$cekcpns = $this->pegawai_model->get_modul_cpns()->num_rows;
		$this->db->where('nip', $pegawai['nip']);
		$cekpns = $this->pegawai_model->get_modul_pns()->num_rows;

		if($cekdatapribadi==0): $this->pegawai_model->insert_modul_datapribadi($pegawai); endif;
		if($cekidentitas==0): $this->pegawai_model->insert_modul_identitas($pegawai); endif;
		if($cekfisik==0):$this->pegawai_model->insert_modul_fisik($pegawai); endif;
		if($cekcpns==0):$this->pegawai_model->insert_modul_cpns($pegawai); endif;
		if($cekpns==0):$this->pegawai_model->insert_modul_pns($pegawai); endif;
		
		$this->db->where(array('username'=> $pegawai['username'], 'mus.nip'=>$pegawai['nip']));
		$cek_user = $this->pegawai_model->get_modul_user_pegawai()->row_array();

		if(!empty($cek_user['username'])): 
			$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal! </strong>Username telah telah ada silahkan coba username yang lain .</div>');
			redirect('admin/tambah_pegawai'); 
		endif;

		if(!empty($cek_user['nip'])): 
			$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal! </strong>NIP telah telah ada silahkan coba username yang lain .</div>');
			redirect('admin/tambah_pegawai'); 
		endif;

		$insert = $this->pegawai_model->insert_modul_user_pegawai($pegawai);

		if($insert):
			$activity = 'Inser data pegawai'.$pegawai['nm_pegawai'].' ('.$pegawai['nip'].')';
			$this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong>'.implode(' ',explode('_',$data['uri2'])).'.</div>');
            redirect('admin/tambah_pegawai');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> '.implode(' ',explode('_',$data['uri2'])).'.</div>');
            redirect('admin/tambah_pegawai');
        endif;

	

	}

	public function generate_username()
	{
		$acak = acakhurufkecil(4);
		$this->db->where('username', $acak);
		$generate = $this->pegawai_model->get_modul_user_pegawai()->num_rows();
		if($generate==0): $data = $acak; endif;
	    echo json_encode($data);
	}

	public function generate_password()
	{
	    $acak = acakangkahurufsimbol(4);
		$this->db->where('password', $acak);
		$generate = $this->pegawai_model->get_modul_user_pegawai()->num_rows();
		if($generate==0): $data = $acak; endif;
	    echo json_encode($data);
	}
	
}
