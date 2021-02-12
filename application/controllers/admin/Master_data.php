<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Master_data extends CI_Controller
{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('login') == false){
            redirect('login');
		}
        //load libary pagination
        $this->load->library('pagination');
        //load the department_model
        $this->load->model('admin/master_data_model');
		$this->load->model('admin/pegawai_model');
		$this->load->model('user_model');
	}

	//UNIT KERJA
	public function unit_kerja($uri3='', $id='')
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		
		if($uri3=='form_tambah_unit_kerja'):
			$this->load->view('admin/master_data/form_tambah', $data);
		elseif($uri3=='form_ubah_unit_kerja'):
			$data['id'] = $id;
			$data['url'] = 'unit_kerja';
			$this->db->where('id_unitkerja',decrypt_url($id));
			$data['master'] = $this->master_data_model->get_unitkerja()->row()->nm_unitkerja;
			$this->load->view('admin/master_data/form_ubah', $data);
		elseif($uri3=='cetak_pdf' || $uri3=='unduh_excel'):
			$data['master'] = $this->master_data_model->get_unitkerja()->result_array();
			$this->load->view('admin/master_data/page_'.$uri3, $data);
		else:
			$config = $this->master_data_model->pagination('unit_kerja', 20);
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$this->db->order_by('id_unitkerja', 'asc');
			$data['unit_kerja'] = $this->master_data_model->get_unitkerja_pgn($config['per_page'], $data['page'])->result_array();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('admin/master_data/unit_kerja/unit_kerja', $data);
		endif;
	}

	public function search_unit_kerja()
	{

		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();

		$data['kata_cari'] = $post = $this->input->post('kata_cari');
		$this->db->like('nm_unitkerja', $data['kata_cari']);
		$data['master'] = $this->master_data_model->get_unitkerja()->result_array();
		$this->load->view('admin/master_data/tabel_pencarian', $data);
	}

	public function aksi_unit_kerja($uri3='', $id=''){
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();

		$post = $this->input->post();
		$nma_unit_kerja = $post['nma_unit_kerja'];

		if($uri3=='hapus_unit_kerja'):
			$this->db->where('id_unitkerja', decrypt_url($id));
			$nma_unit_kerja = $this->master_data_model->get_unitkerja()->row()->nm_unitkerja;
		endif;

		$activity = str_replace('_', ' ', $uri3).' '.$nma_unit_kerja;
		
		$update = $this->master_data_model->aksi_unitkerja($uri3, $id, $post);

		if($update):
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong>'.implode(' ',explode('_',$data['uri2'])).' berhasil '.implode(' ',explode('_',$uri3)).'.</div>');
        	// $this->pegawai_model->log_user($activity);
            redirect('admin/master_data/unit_kerja');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> '.implode(' ',explode('_',$data['uri2'])).' gagal '.implode(' ',explode('_',$uri3)).'.</div>');
            redirect('admin/master_data/unit_kerja');
        endif;
	}
	//END UNIT KERJA

	//ORGANISASI
	public function organisasi($uri3='', $id='')
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		if($uri3=='form_tambah_organisasi'):
			$this->load->view('admin/master_data/form_tambah', $data);
		elseif($uri3=='form_ubah_organisasi'):
			$data['id'] = $id;
			$data['url'] = 'organisasi';
			$this->db->where('id_organisasi',decrypt_url($id));
			$data['master'] = $this->master_data_model->get_organisasi()->row()->nm_organisasi;
			$this->load->view('admin/master_data/form_ubah', $data);
		elseif($uri3=='cetak_pdf' || $uri3=='unduh_excel'):
			$data['master'] = $this->master_data_model->get_organisasi()->result_array();
			$this->load->view('admin/master_data/page_'.$uri3, $data);
		else:
			// $config = $this->master_data_model->pagination('organisasi', 20);
			// $this->pagination->initialize($config);
			// $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$this->db->order_by('id_organisasi', 'asc');
			$data['organisasi'] = $this->master_data_model->get_organisasi_pgn()->result_array();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('admin/master_data/organisasi/organisasi', $data);
		endif;
	}

	public function search_organisasi()
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();

		$data['kata_cari'] = $this->input->post('kata_cari');
		$this->db->like('nm_organisasi', $data['kata_cari']);
		$data['master'] = $this->master_data_model->get_organisasi()->result_array();
		$this->load->view('admin/master_data/tabel_pencarian', $data);
	}

	public function aksi_organisasi($uri3='', $id=''){
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		$post = $this->input->post();

		$nm_organisasi = $post['nma_organisasi'];
		if($uri3=='hapus_organisasi'):
			$this->db->where('id_organisasi', decrypt_url($id));
			$nm_organisasi = $this->master_data_model->get_organisasi()->row()->nm_organisasi;
		endif;
		$activity = str_replace('_', ' ', $uri3).' '.$nm_organisasi;
		
		$update = $this->master_data_model->aksi_organisasi($uri3, $id, $post);

		if($update):
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong>'.implode(' ',explode('_',$data['uri2'])).' berhasil '.implode(' ',explode('_',$uri3)).'.</div>');
        	// $this->pegawai_model->log_user($activity);
            redirect('admin/master_data/organisasi');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> '.implode(' ',explode('_',$data['uri2'])).' gagal '.implode(' ',explode('_',$uri3)).'.</div>');
            redirect('admin/master_data/organisasi');
        endif;
	}
	//END ORGANISASI

	//BIDANG
	public function bidang($uri3='', $id='')
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		if($uri3=='form_tambah_bidang'):
			$this->load->view('admin/master_data/form_tambah', $data);
		elseif($uri3=='form_ubah_bidang'):
			$data['id'] = $id;
			$data['url'] = 'bidang';
			$this->db->where('id_bidang',decrypt_url($id));
			$data['master'] = $this->master_data_model->get_bidang()->row()->nm_bidang;
			$this->load->view('admin/master_data/form_ubah', $data);
		elseif($uri3=='cetak_pdf' || $uri3=='unduh_excel'):
			$data['master'] = $this->master_data_model->get_bidang()->result_array();
			$this->load->view('admin/master_data/page_'.$uri3, $data);
		else:
			$config = $this->master_data_model->pagination('bidang', 20);
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$this->db->order_by('id_bidang', 'asc');
			$data['bidang'] = $this->master_data_model->get_bidang_pgn($config['per_page'], $data['page'])->result_array();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('admin/master_data/bidang/bidang', $data);
		endif;
	}

	public function search_bidang()
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();

		$data['kata_cari'] = $this->input->post('kata_cari');
		$this->db->like('nm_bidang', $data['kata_cari']);
		$data['master'] = $this->master_data_model->get_bidang()->result_array();
		$this->load->view('admin/master_data/tabel_pencarian', $data);
	}

	public function aksi_bidang($uri3='', $id=''){
		$data = $this->master_data_model->uri();
		$post = $this->input->post();
		$nm_bidang = $post['nma_bidang'];
		if($uri3=='hapus_bidang'):
			$this->db->where('id_bidang', decrypt_url($id));
			$nm_bidang = $this->master_data_model->get_bidang()->row()->nm_bidang;
		endif;
		$activity = str_replace('_', ' ', $uri3).' '.$nm_bidang;
		
		$update = $this->master_data_model->aksi_bidang($uri3, $id, $post);

		if($update):
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong>'.implode(' ',explode('_',$data['uri2'])).' berhasil '.implode(' ',explode('_',$uri3)).'.</div>');
        	// $this->pegawai_model->log_user($activity);
            redirect('admin/master_data/bidang');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> '.implode(' ',explode('_',$data['uri2'])).' gagal '.implode(' ',explode('_',$uri3)).'.</div>');
            redirect('admin/master_data/bidang');
        endif;
	}
	//END BIDANG

	//SUBBIDANG
	public function sub_bidang($uri3='', $id='')
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		if($uri3=='form_tambah_sub_bidang'):
			$this->load->view('admin/master_data/form_tambah', $data);
		elseif($uri3=='form_ubah_sub_bidang'):
			$data['id'] = $id;
			$data['url'] = 'sub_bidang';
			$this->db->where('id_subbidang',decrypt_url($id));
			$data['master'] = $this->master_data_model->get_subbidang()->row()->nm_subbidang;
			$this->load->view('admin/master_data/form_ubah', $data);
		elseif($uri3=='cetak_pdf' || $uri3=='unduh_excel'):
			$data['master'] = $this->master_data_model->get_subbidang()->result_array();
			$this->load->view('admin/master_data/page_'.$uri3, $data);
		else:
			$config = $this->master_data_model->pagination('sub_bidang', 50);
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['sub_bidang'] = $this->master_data_model->get_subbidang_pgn($config['per_page'], $data['page'])->result_array();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('admin/master_data/subbidang/subbidang', $data);
		endif;
	}

	public function search_sub_bidang()
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$data = $this->master_data_model->uri();
		$data['kata_cari'] = $this->input->post('kata_cari');
		$this->db->like('nm_subbidang', $data['kata_cari']);
		$data['master'] = $this->master_data_model->get_subbidang()->result_array();
		$this->load->view('admin/master_data/tabel_pencarian', $data);
	}

	public function aksi_sub_bidang($uri3='', $id=''){
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		$post = $this->input->post();
		$nm_sub_bidang = $post['nma_sub_bidang'];
		if($uri3=='hapus_sub_bidang'):
			$this->db->where('id_subbidang',decrypt_url($id));
			$nm_sub_bidang = $this->master_data_model->get_subbidang()->row()->nm_subbidang;
		endif;
		$activity = str_replace('_', ' ', $uri3).' '.$nm_sub_bidang;
		
		$update = $this->master_data_model->aksi_subbidang($uri3, $id, $post);

		if($update):
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong>'.implode(' ',explode('_',$data['uri2'])).' berhasil '.implode(' ',explode('_',$uri3)).'.</div>');
        	$this->pegawai_model->log_user($activity);
            redirect('admin/master_data/sub_bidang');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> '.implode(' ',explode('_',$data['uri2'])).' gagal '.implode(' ',explode('_',$uri3)).'.</div>');
            redirect('admin/master_data/sub_bidang');
        endif;
	}
	//END SUBBIDANG

	//KELOMPOK MASTER JABATAN
	//Master Jabatan
	public function jabatan($uri3='', $uri4='', $uri5='')
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		$arrayUrijab = array('jenis_jabatan', 'kategori_jabatan','jenis_jabatan_administrasi', 'jenjang_jabatan', 'kelompok_jabatan', 'eselon');
		if($uri3=='form_tambah_jabatan'):
			$this->load->view('admin/master_data/form_tambah', $data);
		elseif($uri3=='form_ubah_jabatan'):
			$data['id'] = $uri4;
			$data['url'] = 'jabatan';
			$this->db->where('id_jabatan',decrypt_url($uri4));
			$data['master'] = $this->master_data_model->get_jabatan()->row()->nm_jabatan;
			$this->load->view('admin/master_data/form_ubah', $data);
		elseif($uri3=='cetak_pdf' || $uri3=='unduh_excel'):
			$data['master'] = $this->master_data_model->get_jabatan()->result_array();
			$this->load->view('admin/master_data/page_'.$uri3, $data);
		elseif(in_array($uri3, $arrayUrijab)):
			// if($uri4=='form_tambah'):
			// 	$this->load->view('admin/master_data/jabatan/form_tambah_sub_jabatan', $data);
			// elseif($uri4=='form_ubah'):
			// 	$data['idj'] = $uri5;
			// 	$data['url'] = $uri3;
			// 	$this->db->where('id_'.$uri3, decrypt_url($uri5));
			// 	$data['sub_jabatan'] = $this->master_data_model->get_subjabatan($uri3)->row_array();
			// 	$this->load->view('admin/master_data/jabatan/form_ubah_sub_jabatan', $data);
			// else:
				$data['sub_jabatan'] = $this->master_data_model->get_subjabatan($uri3)->result_array();
				$this->load->view('admin/master_data/jabatan/sub_jabatan', $data);
			// endif;
		else:
			$config = $this->master_data_model->pagination('jabatan', 50);
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['jabatan'] = $this->master_data_model->get_jabatan_pgn($config['per_page'], $data['page'])->result_array();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('admin/master_data/jabatan/jabatan', $data);
		endif;
	}

	public function search_jabatan()
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		$data['kata_cari'] = $this->input->post('kata_cari');
		$this->db->like('nm_jabatan', $data['kata_cari']);
		$data['master'] = $this->master_data_model->get_jabatan()->result_array();
		$this->load->view('admin/master_data/tabel_pencarian', $data);
	}

	public function aksi_jabatan($uri3='', $id=''){
		$data = $this->master_data_model->uri();
		$post = $this->input->post();
		$nm_jabatan = $post['nma_jabatan'];
		if($uri3=='hapus_jabatan'):
			$this->db->where('id_jabatan',decrypt_url($id));
			$nm_jabatan = $this->master_data_model->get_jabatan()->row()->nm_jabatan;
		endif;
		$activity = str_replace('_', ' ', $uri3).' '.$nm_jabatan;
		
		$update = $this->master_data_model->aksi_jabatan($uri3, $id, $post);

		if($update):
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong>'.implode(' ',explode('_',$data['uri2'])).' berhasil '.implode(' ',explode('_',$uri3)).'.</div>');
        	$this->pegawai_model->log_user($activity);
            redirect('admin/master_data/jabatan');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> '.implode(' ',explode('_',$data['uri2'])).' gagal '.implode(' ',explode('_',$uri3)).'.</div>');
            redirect('admin/master_data/jabatan');
        endif;
	}

	public function aksi_sub_jabatan($uri3='', $id=''){
		$sub = substr($uri3, 6);
		$data = $this->master_data_model->uri();
		$post = $this->input->post();
		if($uri3=='hapus_'.$sub):
			$this->db->where('id_'.$sub, decrypt_url($id));
			$grjabatan = $this->master_data_model->get_subjabatan($sub)->row_array();
			$nm_jabatan = $grjabatan[$sub];
		else:
			$nm_jabatan = $post['nma_'.$sub];
		endif;

		$activity = str_replace('_', ' ', $uri3).' '.$nm_jabatan;
		
		$update = $this->master_data_model->aksi_subjabatan($uri3, $id, $post);

		if($update):
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong>'.implode(' ',explode('_',$data['uri2'])).' berhasil '.implode(' ',explode('_',$uri3)).'.</div>');
        	$this->pegawai_model->log_user($activity);
            redirect('admin/master_data/jabatan/'.$sub);	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> '.implode(' ',explode('_',$data['uri2'])).' gagal '.implode(' ',explode('_',$uri3)).'.</div>');
            redirect('admin/master_data/jabatan/'.$sub);
        endif;
	}
	//END JABATAN

	//KELOMPOK MASTER HUKUMAN
	//Master Hukuman
	public function hukuman($uri3='', $uri4='', $uri5='')
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		$arrayUrijab = array('jenis_hukuman');
		if($uri3=='form_tambah_hukuman'):
			$this->load->view('admin/master_data/form_tambah', $data);
		elseif($uri3=='form_ubah_hukuman'):
			$data['id'] = $uri4;
			$data['url'] = 'hukuman';
			$this->db->where('id_hukuman',decrypt_url($uri4));
			$data['master'] = $this->master_data_model->get_hukuman()->row()->nm_hukuman;
			$this->load->view('admin/master_data/form_ubah', $data);
		elseif($uri3=='cetak_pdf' || $uri3=='unduh_excel'):
			$data['master'] = $this->master_data_model->get_hukuman()->result_array();
			$this->load->view('admin/master_data/page_'.$uri3, $data);
		elseif(in_array($uri3, $arrayUrijab)):
			$data['sub_hukuman'] = $this->master_data_model->get_subhukuman($uri3)->result_array();
			$this->load->view('admin/master_data/hukuman/sub_hukuman', $data);
		else:
			$config = $this->master_data_model->pagination('hukuman', 50);
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['hukuman'] = $this->master_data_model->get_hukuman_pgn($config['per_page'], $data['page'])->result_array();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('admin/master_data/hukuman/hukuman', $data);
		endif;
	}

	public function search_hukuman()
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		$data['kata_cari'] = $this->input->post('kata_cari');
		$this->db->like('nm_hukuman', $data['kata_cari']);
		$data['master'] = $this->master_data_model->get_hukuman()->result_array();
		$this->load->view('admin/master_data/tabel_pencarian', $data);
	}

	public function aksi_hukuman($uri3='', $id=''){
		$data = $this->master_data_model->uri();
		$post = $this->input->post();
		$nm_hukuman = $post['nma_hukuman'];
		if($uri3=='hapus_hukuman'):
			$this->db->where('id_hukuman',decrypt_url($id));
			$nm_hukuman = $this->master_data_model->get_hukuman()->row()->nm_hukuman;
		endif;
		$activity = str_replace('_', ' ', $uri3).' '.$nm_hukuman;
		
		$update = $this->master_data_model->aksi_hukuman($uri3, $id, $post);

		if($update):
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong>'.implode(' ',explode('_',$data['uri2'])).' berhasil '.implode(' ',explode('_',$uri3)).'.</div>');
        	$this->pegawai_model->log_user($activity);
            redirect('admin/master_data/hukuman');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> '.implode(' ',explode('_',$data['uri2'])).' gagal '.implode(' ',explode('_',$uri3)).'.</div>');
            redirect('admin/master_data/hukuman');
        endif;
	}

	public function aksi_sub_hukuman($uri3='', $id=''){
		$sub = substr($uri3, 6);
		$data = $this->master_data_model->uri();
		$post = $this->input->post();
		if($uri3=='hapus_'.$sub):
			$this->db->where('id_'.$sub, decrypt_url($id));
			$sbhukuman = $this->master_data_model->get_subhukuman($sub)->row_array();
			$nm_hukuman = $sbhukuman[$sub];
		else:
			$nm_hukuman = $post['nma_'.$sub];
		endif;
		$activity = str_replace('_', ' ', $uri3).' '.$nm_hukuman;
		
		$update = $this->master_data_model->aksi_subhukuman($uri3, $id, $post);

		if($update):
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong>'.implode(' ',explode('_',$data['uri2'])).' berhasil '.implode(' ',explode('_',$uri3)).'.</div>');
        	$this->pegawai_model->log_user($activity);
            redirect('admin/master_data/hukuman/'.$sub);	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> '.implode(' ',explode('_',$data['uri2'])).' gagal '.implode(' ',explode('_',$uri3)).'.</div>');
            redirect('admin/master_data/hukuman/'.$sub);
        endif;
	}
	//END HUKUMAN
	
	//DIKLAT
	public function diklat($uri3='', $uri4='', $uri5='')
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		$arrayUrijab = array('jenis_diklat');
		if($uri3=='form_tambah_diklat'):
			$this->load->view('admin/master_data/form_tambah', $data);
		elseif($uri3=='form_ubah_diklat'):
			$data['id'] = $uri4;
			$data['url'] = 'diklat';
			$this->db->where('id_diklat',decrypt_url($uri4));
			$data['master'] = $this->master_data_model->get_diklat()->row()->nm_diklat;
			$this->load->view('admin/master_data/form_ubah', $data);
		elseif($uri3=='cetak_pdf' || $uri3=='unduh_excel'):
			$data['master'] = $this->master_data_model->get_diklat()->result_array();
			$this->load->view('admin/master_data/page_'.$uri3, $data);
		elseif(in_array($uri3, $arrayUrijab)):
			$data['sub_diklat'] = $this->master_data_model->get_subdiklat($uri3)->result_array();
			$this->load->view('admin/master_data/diklat/sub_diklat', $data);
		else:
			$config = $this->master_data_model->pagination('diklat', 50);
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['diklat'] = $this->master_data_model->get_diklat_pgn($config['per_page'], $data['page'])->result_array();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('admin/master_data/diklat/diklat', $data);
		endif;
	}

	public function search_diklat()
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		$data['kata_cari'] = $this->input->post('kata_cari');
		$this->db->like('nm_diklat', $data['kata_cari']);
		$data['master'] = $this->master_data_model->get_diklat()->result_array();
		$this->load->view('admin/master_data/tabel_pencarian', $data);
	}

	public function aksi_diklat($uri3='', $id=''){
		$data = $this->master_data_model->uri();
		$post = $this->input->post();
		$nm_diklat = $post['nma_diklat'];
		if($uri3=='hapus_diklat'):
			$this->db->where('id_diklat',decrypt_url($id));
			$nm_diklat = $this->master_data_model->get_diklat()->row()->nm_diklat;
		endif;
		$activity = str_replace('_', ' ', $uri3).' '.$nm_diklat;
		
		$update = $this->master_data_model->aksi_diklat($uri3, $id, $post);

		if($update):
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong>'.implode(' ',explode('_',$data['uri2'])).' berhasil '.implode(' ',explode('_',$uri3)).'.</div>');
        	$this->pegawai_model->log_user($activity);
            redirect('admin/master_data/diklat');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> '.implode(' ',explode('_',$data['uri2'])).' gagal '.implode(' ',explode('_',$uri3)).'.</div>');
            redirect('admin/master_data/diklat');
        endif;
	}

	public function aksi_sub_diklat($uri3='', $id=''){
		$sub = substr($uri3, 6);
		$data = $this->master_data_model->uri();
		$post = $this->input->post();
		if($uri3=='hapus_'.$sub):
			$this->db->where('id_'.$sub, decrypt_url($id));
			$grdiklat = $this->master_data_model->get_subdiklat($sub)->row_array();
			$nm_diklat = $grdiklat[$sub];
		else:
			$nm_diklat = $post['nma_'.$sub];
		endif;
		$activity = str_replace('_', ' ', $uri3).' '.$grdiklat[$sub];
		
		$update = $this->master_data_model->aksi_subdiklat($uri3, $id, $post);

		if($update):
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong>'.implode(' ',explode('_',$data['uri2'])).' berhasil '.implode(' ',explode('_',$uri3)).'.</div>');
        	$this->pegawai_model->log_user($activity);
            redirect('admin/master_data/diklat/'.$sub);	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> '.implode(' ',explode('_',$data['uri2'])).' gagal '.implode(' ',explode('_',$uri3)).'.</div>');
            redirect('admin/master_data/diklat/'.$sub);
        endif;
	}
	//END DIKLAT

	//TUGAS POKOK DAN FUNGSi (TUPOKSI)
	public function tupoksi($uri3='', $id='')
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		if($uri3=='form_tambah_tupoksi'):
			$this->load->view('admin/master_data/form_tambah', $data);
		elseif($uri3=='form_ubah_tupoksi'):
			$data['id'] = $id;
			$data['url'] = 'tupoksi';
			$this->db->where('id_tupoksi',decrypt_url($id));
			$data['master'] = $this->master_data_model->get_tupoksi()->row()->nm_tupoksi;
			$this->load->view('admin/master_data/form_ubah', $data);
		elseif($uri3=='cetak_pdf' || $uri3=='unduh_excel'):
			$data['master'] = $this->master_data_model->get_tupoksi()->result_array();
			$this->load->view('admin/master_data/page_'.$uri3, $data);
		else:
			$config = $this->master_data_model->pagination('tupoksi', 20);
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			
			$this->db->order_by('id_tupoksi', 'asc');
			$data['tupoksi'] = $this->master_data_model->get_tupoksi_pgn($config['per_page'], $data['page'])->result_array();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('admin/master_data/tupoksi/tupoksi', $data);
		endif;
	}

	public function search_tupoksi()
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		$data['kata_cari'] = $this->input->post('kata_cari');
		$this->db->like('nm_tupoksi', $data['kata_cari']);
		$data['master'] = $this->master_data_model->get_tupoksi()->result_array();
		$this->load->view('admin/master_data/tabel_pencarian', $data);
	}

	public function aksi_tupoksi($uri3='', $id=''){
		
		$data = $this->master_data_model->uri();
		$post = $this->input->post();
		$nm_tupoksi = $post['nma_tupoksi'];
		if($uri3=='hapus_tupoksi'):
			$this->db->where('id_tupoksi', decrypt_url($id));
			$nm_tupoksi = $this->master_data_model->get_tupoksi()->row()->nm_tupoksi;
		endif;
		$activity = str_replace('_', ' ', $uri3).' '.$nm_tupoksi;
		
		$update = $this->master_data_model->aksi_tupoksi($uri3, $id, $post);

		if($update):
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong>'.implode(' ',explode('_',$data['uri2'])).' berhasil '.implode(' ',explode('_',$uri3)).'.</div>');
        	// $this->pegawai_model->log_user($activity);
            redirect('admin/master_data/tupoksi');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> '.implode(' ',explode('_',$data['uri2'])).' gagal '.implode(' ',explode('_',$uri3)).'.</div>');
            redirect('admin/master_data/tupoksi');
        endif;
	}
	//END TUPOKSI

	//KELOMPOK MASTER PANGKAT
	//Master Pangkat
	public function pangkat($uri3='', $uri4='', $uri5='')
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		$arrayUrijab = array('golongan');
		if($uri3=='form_tambah_pangkat'):
			$this->load->view('admin/master_data/form_tambah', $data);
		elseif($uri3=='form_ubah_pangkat'):
			$data['id'] = $uri4;
			$data['url'] = 'pangkat';
			$this->db->where('id_pangkat',decrypt_url($uri4));
			$data['master'] = $this->master_data_model->get_pangkat()->row()->nm_pangkat;
			$this->load->view('admin/master_data/form_ubah', $data);
		elseif($uri3=='cetak_pdf' || $uri3=='unduh_excel'):
			$data['master'] = $this->master_data_model->get_pangkat()->result_array();
			$this->load->view('admin/master_data/page_'.$uri3, $data);
		elseif(in_array($uri3, $arrayUrijab)):
			$data['sub_pangkat'] = $this->master_data_model->get_subpangkat($uri3)->result_array();
			$this->load->view('admin/master_data/pangkat/sub_pangkat', $data);
		else:
			$config = $this->master_data_model->pagination('pangkat', 50);
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['pangkat'] = $this->master_data_model->get_pangkat_pgn($config['per_page'], $data['page'])->result_array();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('admin/master_data/pangkat/pangkat', $data);
		endif;
	}

	public function search_pangkat()
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		$data['kata_cari'] = $this->input->post('kata_cari');
		$this->db->like('nm_pangkat', $data['kata_cari']);
		$data['master'] = $this->master_data_model->get_pangkat()->result_array();
		$this->load->view('admin/master_data/tabel_pencarian', $data);
	}

	public function aksi_pangkat($uri3='', $id=''){
		$data = $this->master_data_model->uri();
		$post = $this->input->post();
		$nm_pangkat = $post['nma_pangkat'];
		if($uri3=='hapus_pangkat'):
			$this->db->where('id_pangkat',decrypt_url($id));
			$nm_pangkat = $this->master_data_model->get_pangkat()->row()->nm_pangkat;
		endif;
		$activity = str_replace('_', ' ', $uri3).' '.$nm_pangkat;
		
		$update = $this->master_data_model->aksi_pangkat($uri3, $id, $post);

		if($update):
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong>'.implode(' ',explode('_',$data['uri2'])).' berhasil '.implode(' ',explode('_',$uri3)).'.</div>');
        	$this->pegawai_model->log_user($activity);
            redirect('admin/master_data/pangkat');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> '.implode(' ',explode('_',$data['uri2'])).' gagal '.implode(' ',explode('_',$uri3)).'.</div>');
            redirect('admin/master_data/pangkat');
        endif;
	}

	public function aksi_sub_pangkat($uri3='', $id=''){
		$sub = substr($uri3, 6);
		$data = $this->master_data_model->uri();
		$post = $this->input->post();
		if($uri3=='hapus_'.$sub):
			$this->db->where('id_'.$sub, decrypt_url($id));
			$sbpangkat = $this->master_data_model->get_subpangkat($sub)->row_array();
			$nm_pangkat = $sbpangkat[$sub];
		else:
			$nm_pangkat = $post['nma_'.$sub];
		endif;
		$activity = str_replace('_', ' ', $uri3).' '.$nm_pangkat;
		
		$update = $this->master_data_model->aksi_subpangkat($uri3, $id, $post);

		if($update):
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong>'.implode(' ',explode('_',$data['uri2'])).' berhasil '.implode(' ',explode('_',$uri3)).'.</div>');
        	$this->pegawai_model->log_user($activity);
            redirect('admin/master_data/pangkat/'.$sub);	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> '.implode(' ',explode('_',$data['uri2'])).' gagal '.implode(' ',explode('_',$uri3)).'.</div>');
            redirect('admin/master_data/pangkat/'.$sub);
        endif;
	}
	//END PANGKAT

	//TEMPAT KERJA
	public function tempat_kerja($uri3='', $id='')
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		if($uri3=='form_tambah_tempat_kerja'):
			$this->load->view('admin/master_data/form_tambah', $data);
		elseif($uri3=='form_ubah_tempat_kerja'):
			$data['id'] = $id;
			$data['url'] = 'tempat_kerja';
			$this->db->where('id_tempatkerja',decrypt_url($id));
			$data['master'] = $this->master_data_model->get_tempatkerja()->row()->nm_tempatkerja;
			$this->load->view('admin/master_data/form_ubah', $data);
		elseif($uri3=='cetak_pdf' || $uri3=='unduh_excel'):
			$data['master'] = $this->master_data_model->get_tempatkerja()->result_array();
			$this->load->view('admin/master_data/page_'.$uri3, $data);
		else:
			$config = $this->master_data_model->pagination('tempat_kerja', 20);
			$this->pagination->initialize($config);
			$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$this->db->order_by('id_tempatkerja', 'asc');
			$data['tempat_kerja'] = $this->master_data_model->get_tempatkerja_pgn($config['per_page'], $data['page'])->result_array();
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('admin/master_data/tempat_kerja/tempat_kerja', $data);
		endif;
	}

	public function search_tempat_kerja()
	{
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		$data = $this->master_data_model->uri();
		$data['kata_cari'] = $post = $this->input->post('kata_cari');
		$this->db->like('nm_tempatkerja', $data['kata_cari']);
		$data['master'] = $this->master_data_model->get_tempatkerja()->result_array();
		$this->load->view('admin/master_data/tabel_pencarian', $data);
	}

	public function aksi_tempat_kerja($uri3='', $id=''){
		$data = $this->master_data_model->uri();
		$post = $this->input->post();
		$nma_tempat_kerja = $post['nma_tempat_kerja'];

		if($uri3=='hapus_tempat_kerja'):
			$this->db->where('id_tempatkerja', decrypt_url($id));
			$nma_tempat_kerja = $this->master_data_model->get_tempatkerja()->row()->nm_tempatkerja;
		endif;

		$activity = str_replace('_', ' ', $uri3).' '.$nma_tempat_kerja;
		
		$update = $this->master_data_model->aksi_tempatkerja($uri3, $id, $post);

		if($update):
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong>'.implode(' ',explode('_',$data['uri2'])).' berhasil '.implode(' ',explode('_',$uri3)).'.</div>');
        	// $this->pegawai_model->log_user($activity);
            redirect('admin/master_data/tempat_kerja');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> '.implode(' ',explode('_',$data['uri2'])).' gagal '.implode(' ',explode('_',$uri3)).'.</div>');
            redirect('admin/master_data/tempat_kerja');
        endif;
	}
	//END UNIT KERJA

	
	
}
