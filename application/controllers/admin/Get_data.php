<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get_data extends CI_Controller
{
	function __construct(){
        parent::__construct();
        //load libary pagination
		$this->load->helper('generate');
		$this->load->model('user_model');
    }

    public function uri(){
		$data['uri1'] = $this->uri->segment(1);
      	$data['uri2'] = $this->uri->segment(2);
      	$data['uri3'] = $this->uri->segment(3);
      	$data['uri4'] = $this->uri->segment(3);
      	return $data;
	}

	public function update_status_unitkerja(){
		$mode = $this->input->post('mode');
		$id = $this->input->post('id');
		if($mode=='true'):
			$data_update['status_unitkerja']=1;
		else:
			$data_update['status_unitkerja']=0;
		endif;
		$data_update = $this->security->xss_clean($data_update);
		$this->db->where('id_unitkerja', decrypt_url($id))->update('master_unitkerja', $data_update);
		$data = $this->db->where('id_unitkerja', $id)->get('master_unitkerja')->result_array();
		echo json_encode($data);
	}

	public function update_status_bidang(){
		$mode = $this->input->post('mode');
		$id = $this->input->post('id');
		if($mode=='true'):
			$data_update['status_bidang']=1;
		else:
			$data_update['status_bidang']=0;
		endif;
		$data_update = $this->security->xss_clean($data_update);
		$this->db->where('id_bidang', decrypt_url($id))->update('master_bidang', $data_update);
		$data = $this->db->where('id_bidang', $id)->get('master_bidang')->result_array();
		echo json_encode($data);
	}

	public function update_status_organisasi(){
		$mode = $this->input->post('mode');
		$id = $this->input->post('id');
		if($mode=='true'):
			$data_update['status_organisasi']=1;
		else:
			$data_update['status_organisasi']=0;
		endif;
		$data_update = $this->security->xss_clean($data_update);
		$this->db->where('id_organisasi', decrypt_url($id))->update('master_organisasi', $data_update);
		$data = $this->db->where('id_organisasi', $id)->get('master_organisasi')->result_array();
		echo json_encode($data);
	}

	public function update_status_subbidang(){
		$mode = $this->input->post('mode');
		$id = $this->input->post('id');
		if($mode=='true'):
			$data_update['status_subbidang']=1;
		else:
			$data_update['status_subbidang']=0;
		endif;
		$data_update = $this->security->xss_clean($data_update);
		$this->db->where('id_subbidang', decrypt_url($id))->update('master_subbidang', $data_update);
		$data = $this->db->where('id_subbidang', $id)->get('master_subbidang')->result_array();
		echo json_encode($data);
	}

	public function update_status_hukuman(){
		$mode = $this->input->post('mode');
		$id = $this->input->post('id');
		if($mode=='true'):
			$data_update['status_hukuman']=1;
		else:
			$data_update['status_hukuman']=0;
		endif;
		$data_update = $this->security->xss_clean($data_update);
		$this->db->where('id_hukuman', decrypt_url($id))->update('master_hukuman', $data_update);
		$data = $this->db->where('id_hukuman', $id)->get('master_hukuman')->result_array();
		echo json_encode($data);
	}

	public function update_status_diklat(){
		$mode = $this->input->post('mode');
		$id = $this->input->post('id');
		if($mode=='true'):
			$data_update['status_diklat']=1;
		else:
			$data_update['status_diklat']=0;
		endif;
		$data_update = $this->security->xss_clean($data_update);
		$this->db->where('id_diklat', decrypt_url($id))->update('master_diklat', $data_update);
		$data = $this->db->where('id_diklat', $id)->get('master_diklat')->result_array();
		echo json_encode($data);
	}

	public function update_status_pangkat(){
		$mode = $this->input->post('mode');
		$id = $this->input->post('id');
		if($mode=='true'):
			$data_update['status_pangkat']=1;
		else:
			$data_update['status_pangkat']=0;
		endif;
		$data_update = $this->security->xss_clean($data_update);
		$this->db->where('id_pangkat', decrypt_url($id))->update('master_pangkat', $data_update);
		$data = $this->db->where('id_pangkat', $id)->get('master_pangkat')->result_array();
		echo json_encode($data);
	}

	public function update_status_tupoksi(){
		$mode = $this->input->post('mode');
		$id = $this->input->post('id');
		if($mode=='true'):
			$data_update['status_tupoksi']=1;
		else:
			$data_update['status_tupoksi']=0;
		endif;
		$data_update = $this->security->xss_clean($data_update);
		$this->db->where('id_tupoksi', decrypt_url($id))->update('master_tupoksi', $data_update);
		$data = $this->db->where('id_tupoksi', $id)->get('master_diklat')->result_array();
		echo json_encode($data);
	}

	public function update_status_submaster(){
		$mode = $this->input->post('mode');
		$id = $this->input->post('id');
		$uri = $this->input->post('uri');
		if($mode=='true'):
			$data_update['status_'.$uri]=1;
		else:
			$data_update['status_'.$uri]=0;
		endif;
		$data_update = $this->security->xss_clean($data_update);
		$this->db->where('id_'.$uri, decrypt_url($id))->update('master_'.$uri, $data_update);
		$data = $this->db->where('id_'.$uri, $id)->get('master_'.$uri)->result_array();
		echo json_encode($data);
	}

	public function update_status_tempatkerja(){
		$mode = $this->input->post('mode');
		$id = $this->input->post('id');
		if($mode=='true'):
			$data_update['status_tempatkerja']=1;
		else:
			$data_update['status_tempatkerja']=0;
		endif;
		$data_update = $this->security->xss_clean($data_update);
		$this->db->where('id_tempatkerja', decrypt_url($id))->update('master_tempatkerja', $data_update);
		$data = $this->db->where('id_tempatkerja', $id)->get('master_tempatkerja')->result_array();
		echo json_encode($data);
	}

	public function generate_javascript()
	{
		$data = $this->uri();
	    $this->load->view('generate_javascript', $data);
	}

	public function take_arsip($nip)
	{
		$data = $this->db->where('nip', decrypt_url($nip))->get('mod_datapribadi')->result_array();
		echo json_encode($data);
	}
	
}


