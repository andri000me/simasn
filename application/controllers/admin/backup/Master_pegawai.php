<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_pegawai extends CI_Controller {
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
		$this->load->model('master_model');
    }

	public function uri(){
		$data['uri1'] = $this->uri->segment(1);
      	$data['uri2'] = $this->uri->segment(2);
      	$data['uri3'] = $this->uri->segment(3);
      	$data['uri4'] = $this->uri->segment(4);
      	$data['uri5'] = $this->uri->segment(5);
      	return $data;
	}

	// public function index()
	// {
	// 	$data = $this->uri();
	// 	$nip = $this->session->userdata('nip');
    //     $this->db->where('nip',$nip);
	// 	$data['user'] = $this->user_model->getmodUser()->row_array();

	// 	$config = $this->pegawai_model->pagination('data_pribadi', 20);
	// 	$this->pagination->initialize($config);
	// 	$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
	// 	$this->db->order_by('id_mod_datapribadi', 'desc');
	// 	$data['data_pribadi'] = $this->pegawai_model->get_modul_datapribadi_pgn($config['per_page'], $data['page'])->result_array();
	// 	$data['pagination'] = $this->pagination->create_links();
	// 	$this->load->view('admin/master_pegawai', $data);
	// }

	public function index()
	{
		$post = $this->input->post();
		$data = $this->uri();
		$nip = $this->session->userdata('nip');

        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$data['lvlid'] = $this->session->userdata('level_id');
		$data['uk'] = $this->pegawai_model->getmasterUnitkerja()->result_array();
		$data['gol'] = $this->pegawai_model->getmasterGolongan()->result_array();

		if(!empty($post['ukid'])):
			$data['uk_aktif'] = decrypt_url($post['ukid']);
		endif;
		if(!empty($post['golid'])):
			$data['gol_aktif'] = decrypt_url($post['golid']);
		endif;
		// $data['asn'] = $this->pegawai_model->getmodMasterpegawai()->result_array();
		$this->load->view('admin/master_pegawai', $data);
	}

	public function pegawai()
	{
		$list = $this->pegawai_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item):
			if($item->jenis_jabatan_id==2){
				if($item->eselon_id==7){
					$jabatan =  $item->nm_jabatan;
				}elseif($item->jabatan_id==706){
					$jabatan =  $item->nm_jabatan.' '.$item->nm_unitkerja ; 
				}else{
					if($item->subbagian_id!=0){
						$jabatan =  $item->nm_jabatan.' '.$item->nm_subbidang;
					}else{
						$jabatan =  $item->nm_jabatan.' '.$item->nm_bidang;
					}
				}
				
			}elseif($item->jenis_jabatan_id=1){
				$jabatan =  $item->nm_jabatan.' '.$item->nm_unitkerja ; 
			}else{
				if(!empty($item->jenjang_jabatan)){
					$jj = explode('/',$item->jenjang_jabatan);
					$jabatan = !empty($item->nm_jabatan) ? $item->nm_jabatan.' '.$jj[0] : 'Jabatan belum ada';
				}else{
					$jabatan = !empty($item->nm_jabatan) ? $item->nm_jabatan : 'Jabatan belum ada';
				}
				
			}
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = '<a href="'.base_url().'admin/master_pegawai/form_edit_status_pegawai/'.encrypt_url($item->nip).'">'.(!empty($item->status_pegawai) && $item->status_pegawai==1 ? '<span class="label label-success m-l-5 inline">Aktif</span>' : '<span class="label label-danger m-l-5 inline">Tidak Aktif</span>').'</a>';
			$row[] = !empty($item->nip) ? $item->nip : '-' ;
			$row[] = '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($item->nip).'">'.$item->gelardepan.''.$item->nama.''.$item->gelarbelakang.'</a>';
			$row[] = !empty($item->eselon) ? $item->eselon : '-';
			$row[] = !empty($item->golongan) ? $item->golongan : '-';
			$row[] = !empty($item->nm_jabatan) ? $jabatan : '-' ;
			$row[] = !empty($item->nm_unitkerja) ? $item->nm_unitkerja : '-';
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
	
	public function search_unitkerja()
	{
		$post = $this->input->post();
		$data = $this->uri();
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$data['uk'] = $this->pegawai_model->getmasterUnitkerja()->result_array();
		$data['gol'] = $this->pegawai_model->getmasterGolongan()->result_array();

		if(!empty($post['ukid'])):
			$data['uk_aktif'] = decrypt_url($post['ukid']);
			// $data['asn'] = $this->pegawai_model->getmodMasterpegawai()->result_array();
			$this->load->view('admin/master_pegawai', $data);
		elseif(!empty($post['ukid'])):
			$data['gol_aktif'] = decrypt_url($post['golid']);
			// $data['asn'] = $this->pegawai_model->getmodMasterpegawai()->result_array();
			$this->load->view('admin/master_pegawai', $data);
		else:
			redirect('admin/master_pegawai');
		endif;
	}

	public function detail_pegawai($nip)
	{
		$data = $this->uri();
		$nip_admin = $this->session->userdata('nip');
        $this->db->where('nip', $nip_admin);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$data['agama'] = array_column($this->master_model->getmasterAgama()->result_array(), 'nm_agama', 'id_agama');
		$data['snikah'] = array_column($this->master_model->getmasterSkawin()->result_array(), 'nm_skawin', 'id_skawin');

		//Data Utama
		$this->db->where('nip', decrypt_url($nip));
		$data['datapribadi'] = $this->pegawai_model->get_modul_datapribadi()->row_array();
		$this->db->where('nip', decrypt_url($nip));
		$data['datafisik'] = $this->pegawai_model->get_modul_fisik()->row_array();
		$this->db->where('nip', decrypt_url($nip));
		$data['asn'] = $this->pegawai_model->getAlldataAsn()->row_array();

		//Data Riwayat
		$this->db->where('nip', decrypt_url($nip));
		$data['pangkat'] = $this->pegawai_model->getmodulPangkat()->result_array();
		$this->db->where('nip', decrypt_url($nip));
		$data['jabatan'] = $this->pegawai_model->getmodulJabatan()->result_array();
		$this->db->where('nip', decrypt_url($nip));
		$data['edu'] = $this->pegawai_model->getmodulJnPendidikan()->result_array();




		$this->load->view('admin/detail_pegawai', $data);
	}

	public function form_edit_status_pegawai($nip=''){
		$data = $this->uri();
		$nip_admin = $this->session->userdata('nip');
        $this->db->where('nip', $nip_admin);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$data['nip'] = $nip;
		$data['mkedudukan'] = $this->pegawai_model->getmasterKedudukan()->result_array();
		$this->db->where('nip', decrypt_url($nip));
		$data['identitas'] = $this->pegawai_model->get_modul_identitas()->row_array();
		$this->load->view('admin/form_edit_status_pns', $data);
	}

	public function update_status_pns($nip='')
	{
		$post = $this->input->post();
		$nip_admin = $this->session->userdata('nip');
		$pegawai = decrypt_url($nip);
		// $config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
		// $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		// $config['max_size'] = 1000;
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$update = $this->pegawai_model->updateStatuspns($pegawai, $post);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('admin/master_pegawai/detail_pegawai/'.$nip);	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('admin/master_pegawai/detail_pegawai/'.$nip);
        endif;
	}

	public function get_unitkerja()
	{
		$idunit = $this->input->post('idunit');
		$this->db->where('unitkerja_id', $idunit);
		$data = $this->pegawai_model->getmodMasterpegawai()->result_array();
		echo json_encode($data);

	}
}
