<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_user extends CI_Controller {
	function __construct(){
		
		parent::__construct();
		if($this->session->userdata('login') == false){
            redirect('login');
		}
		date_default_timezone_set("Asia/Makassar");
        //load libary pagination
        $this->load->library('pagination');
        //load the department_model
		$this->load->model('admin/pegawai_model');
		$this->load->model('user_model');
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
		$post = $this->input->post();
		$data = $this->uri();
		
		$nip = $this->session->userdata('nip');
		$data['lvl'] = $this->session->userdata('level_id');

        $this->db->where(array('nip'=>$nip));
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$data['uk'] = $this->pegawai_model->getmasterUnitkerja()->result_array();

		$jmllvl = $this->pegawai_model->level()->num_rows();
		$this->db->where(array('id_level >'=>1, 'id_level <' =>$jmllvl));
		$data['level'] = $this->pegawai_model->level()->result_array();

		if(!empty($post['ukid'])):
			$data['uk_aktif'] = decrypt_url($post['ukid']);
		endif;

		// $this->db->where(array('level_id >= '=> $data['lvl'], 'level_id < '=> 5));
		// $data['datauser'] = $this->pegawai_model->get_modul_user_pegawai()->result_array();
		
		$this->load->view('admin/data_user', $data);
	}

	public function daftar_admin($aksi='')
	{
		$post = $this->input->post();
		$data = $this->uri();
		
		$nip = $this->session->userdata('nip');
		$data['lvl'] = $this->session->userdata('level_id');

        $this->db->where(array('nip'=>$nip));
		$data['user'] = $this->user_model->getmodUser()->row_array();
		

		$data['uk'] = $this->pegawai_model->getmasterUnitkerja()->result_array();

		$jmllvl = $this->pegawai_model->level()->num_rows();
		$this->db->where(array('id_level >'=>1, 'id_level <' =>$jmllvl));
		$data['level'] = $this->pegawai_model->level()->result_array();

		if(!empty($post['ukid'])):
			$data['uk_aktif'] = decrypt_url($post['ukid']);
		endif;

		// $this->db->where(array('level_id >= '=> $data['lvl'], 'level_id < '=> 5));
		// $data['datauser'] = $this->pegawai_model->get_modul_user_pegawai()->result_array();
		if(!empty($aksi)):
			$this->db->where(array('level_id >'=>1, 'level_id <=' =>$jmllvl, 'status_pegawai'=>1));
			$data['daftar_user'] = $this->pegawai_model->get_modul_user_pegawai()->result_array();
			$this->load->view('admin/data_user_'.$aksi, $data);
		else:
			$this->load->view('admin/data_user', $data);
		endif;
	}
	public function user()
	{
		$list = $this->pegawai_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item):
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $item->nip;
			$row[] = '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($item->nip).'">'.$item->gelardepan.''.$item->nama.''.$item->gelarbelakang.'</a>';
			$row[] = $item->username;
			$row[] = $item->password;
			$row[] = $item->nm_level;
			$row[] = $item->nm_unitkerja;
			$data[] = $row;
		endforeach;
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->pegawai_model->count_all(),
			"recordsFiltered" => $this->pegawai_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function asn()
	{
		$iduk = $this->input->post('iduk');
		
		$jmllvl = $this->pegawai_model->level()->num_rows();
		$this->db->where(array('status_pegawai'=>1, 'skpd_id'=>decrypt_url($iduk), 'level_id >'=>1, 'level_id <=' => $jmllvl));
		$data = $this->pegawai_model->modUserFordatauser()->result_array();

		echo json_encode($data);
	}

	public function tambah_user_admin()
	{
		$post = $this->input->post();
		$data = $this->uri();
		
		$nip = $this->session->userdata('nip');
		$data['lvl'] = $this->session->userdata('level_id');

        $this->db->where(array('nip'=>$nip));
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$data['uk'] = $this->pegawai_model->getmasterUnitkerja()->result_array();

		$jmllvl = $this->pegawai_model->level()->num_rows();
		$this->db->where(array('id_level >'=>1, 'id_level <' =>$jmllvl));
		$data['level'] = $this->pegawai_model->level()->result_array();

		// $this->db->where(array('level_id >= '=> $data['lvl'], 'level_id < '=> 5));
		// $data['datauser'] = $this->pegawai_model->get_modul_user_pegawai()->result_array();
		$this->load->view('admin/tambah_user', $data);
	}

	public function add_useradmin()
	{
		$post = $this->input->post();
		$update = $this->pegawai_model->addUseradmin($post);

		if($update):
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Update Level.</div>');
            redirect('admin/data_user');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong>  Update Level.</div>');
            redirect('admin/data_user');
        endif;
	}
}
