<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_riwayat extends CI_Controller
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
        $this->load->model('asn/data_riwayat_model');
	}

	public function uri(){
		$data['uri1'] = $this->uri->segment(1);
      	$data['uri2'] = $this->uri->segment(2);
      	$data['uri3'] = $this->uri->segment(3);
      	$data['uri4'] = $this->uri->segment(4);
      	$data['uri5'] = $this->uri->segment(5);
      	return $data;
	}
	
	//Jabatan
	public function jabatan($form='', $id='')
	{
		$sesi_nip = $this->session->userdata('nip');

        $data = $this->uri();
        $this->db->where('nip', $sesi_nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$data['mjabatan'] = $this->data_riwayat_model->getmasterJabatan()->result_array();
		$data['mjjabatan'] = $this->data_riwayat_model->getmasterJenisJabatan()->result_array();
		$data['mjgjabatan'] = $this->data_riwayat_model->getmasterJenjangJabatan()->result_array();
		$data['mukerja'] = $this->data_riwayat_model->getmasterUnitkerja()->result_array();
		$data['morganisasi'] = $this->data_riwayat_model->getmasterOrganisasi()->result_array();
		$data['mbidang'] = $this->data_riwayat_model->getmasterBidang()->result_array();
		$data['msubbidang'] = $this->data_riwayat_model->getmasterSubbidang()->result_array();
		$data['mtupoksi'] = $this->data_riwayat_model->getmasterTupoksi()->result_array();
		$this->db->limit(500);
		$data['mtkerja'] = $this->data_riwayat_model->getmasterTempatkerja()->result_array();
		$data['meselon'] = $this->data_riwayat_model->getmasterEselon()->result_array();
		if($form=='tambah_jabatan'):
			$this->load->view('asn/data_riwayat/jabatan/tambah_jabatan', $data);
		elseif($form=='tambah_jabatan_manual'):
			$this->load->view('asn/data_riwayat/jabatan/tambah_jabatan_manual', $data);
		elseif($form=='ubah_jabatan'):
			$data['id'] = $id;
			$this->db->where(array('nip' => $sesi_nip, 'id' => decrypt_url($id)));
			$data['jb'] = $this->data_riwayat_model->getmodJabatan()->row_array();
			$this->load->view('asn/data_riwayat/jabatan/edit_jabatan', $data);
		else:
			$this->db->order_by('tmt_jabatan','desc');
			$this->db->where('nip', $sesi_nip);
			$data['jabatan'] = $this->data_riwayat_model->joinmodJabatan()->result_array();
			$this->load->view('asn/data_riwayat/jabatan/jabatan', $data);
		endif;
	}

	public function update_jabatan($aksi, $id='')
	{
		$post = $this->input->post();
		$nip = $this->session->userdata('nip');
		$tglsk = !empty($post['tglsk']) && $post['tglsk']!='-' ? date('dmY', strtotime($post['tglsk'])) : date('dmY');

		$config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
		$config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = 500;
		$config['file_name'] = 'SK_JABATAN_'.$nip.'_'.$tglsk;

		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		
		
		$update = $this->data_riwayat_model->updatemodJabatan($aksi, $post, $nip, $config, $id);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_riwayat/jabatan/');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_riwayat/jabatan/');
        endif;
	}

	public function get_masterjabatan_of_jenis()
	{
		$post = $this->input->post();
		$idjenis = $post['idjenis'];
		$this->db->where('jenis_jabatan_id', $idjenis);
		$data = $this->data_riwayat_model->getmasterJabatan()->result_array();
		echo json_encode($data);
	}

	public function get_masterjabatan_of_jenjang()
	{
		$post = $this->input->post();
		$idjenjab = $post['idjenjab'];
		$this->db->where('jenjang_jabatan_id', $idjenjab);
		$data = $this->data_riwayat_model->getmasterJabatan()->result_array();
		echo json_encode($data);
	}

	public function get_jenjang_jabatan()
	{
		$post = $this->input->post();
		$idjenis = $post['idjenis'];
		$this->db->where('jenis_jabatan_id', $idjenis);
		$data = $this->data_riwayat_model->getmasterJenjangJabatan()->result_array();
		echo json_encode($data);
	}

	public function hapus_jabatan($id)
	{
		$cek = $this->db->where('id', decrypt_url($id))->get('mod_jabatan')->row();
		$file = 'assets/asn/dokumen/arsip/'.$cek->file_sk_jabatan;
		$delete = $this->db->where('id', decrypt_url($id))->delete('mod_jabatan');
		$delpath = unlink($file);

		if($delete && $delpath){
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Sukses !</strong> Data berhasil dihapus.</div>');
            redirect('data_riwayat/jabatan');	
        }else{
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal !</strong> Data gagal dihapus</div>');
            redirect('data_riwayat/jabatan');
        }
	}
	//End Jabatan

	//Pangkat
	public function kepangkatan($form='', $id='')
	{
		$sesi_nip = $this->session->userdata('nip');

        $data = $this->uri();
        $this->db->where('nip', $sesi_nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$data['mkepangkatan'] = $this->data_riwayat_model->getmasterKepangkatan()->result_array();
		$data['mgolongan'] = $this->data_riwayat_model->getmasterGolongan()->result_array();
		if($form=='tambah_kepangkatan'):
			$this->load->view('asn/data_riwayat/kepangkatan/tambah_kepangkatan', $data);
		elseif($form=='edit_kepangkatan'):
			$data['id'] = $id;
			$this->db->where(array('nip'=>$sesi_nip, 'id'=>decrypt_url($id)));
			$data['mp'] = $this->data_riwayat_model->getmodPangkat()->row_array();
			$this->load->view('asn/data_riwayat/kepangkatan/edit_kepangkatan', $data);
		else:
			$this->db->order_by('tmt_pangkat','desc');
			$this->db->where('nip', $sesi_nip);
			$data['modpangkat'] = $this->data_riwayat_model->joinmodPangkat()->result_array();
			$this->load->view('asn/data_riwayat/kepangkatan/kepangkatan', $data);
		endif;
	}

	public function update_pangkat($aksi, $id='')
	{
		$post = $this->input->post();
		$nip = $this->session->userdata('nip');
		$tglsk = !empty($post['tanggalsk']) && $post['tanggalsk']!='-' ? date('dmY', strtotime($post['tanggalsk'])) : date('dmY');
		$golruArray = array('111'=>'11', '112'=>'12', '113'=>'13', '114'=>'14', '121'=>'21', '122'=>'22', '123'=>'23', '124'=>'24', '131'=>'31', '132'=>'32', '133'=>'33', '134'=>'34', '141'=>'41', '142'=>'42', '143'=>'43', '144'=>'44');
		$golru = isset($post['golongan']) ? $golruArray[$post['golongan']] : '';

		$config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
		$config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = 500;
		$config['file_name'] = 'SK_KP_'.$golru.'_'.$nip;
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$update = $this->data_riwayat_model->updatemodPangkat($aksi, $post, $nip, $config, $id);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_riwayat/kepangkatan');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_riwayat/kepangkatan');
        endif;
	}

	public function hapus_pangkat($id)
	{
		$cek = $this->db->where('id', decrypt_url($id))->get('mod_pangkat')->row();
		$file = 'assets/asn/dokumen/arsip/'.$cek->file_sk_pangkat;
		$delete = $this->db->where('id', decrypt_url($id))->delete('mod_pangkat');
		$delpath = unlink($file);

		if($delete && $delpath){
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Sukses !</strong> Data berhasil dihapus.</div>');
            redirect('data_riwayat/kepangkatan');	
        }else{
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal !</strong> Data gagal dihapus</div>');
            redirect('data_riwayat/kepangkatan');
        }
	}

	//End Pangkat

	//End Pendidikan
	public function pendidikan($form = "", $id="")
	{
		$sesi_nip = $this->session->userdata('nip');

        $data = $this->uri();
        $this->db->where('nip', $sesi_nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		
		$data['mjpendidikan'] = $this->data_riwayat_model->getmasterJPendidikan()->result_array();
		if($form=='tambah_pendidikan'):
			$this->load->view('asn/data_riwayat/pendidikan/tambah_pendidikan', $data);
		elseif($form=='ubah_pendidikan'):
			$data['id'] = $id;
			$this->db->where(array('nip' => $sesi_nip, 'id'=>decrypt_url($id)));
			$data['pd'] = $this->data_riwayat_model->getmodPendidikan()->row_array();
			$this->load->view('asn/data_riwayat/pendidikan/edit_pendidikan', $data);
		else:
			$this->db->order_by('tgl_lulus','desc');
			$this->db->where('nip', $sesi_nip);
			$data['pendidikan'] = $this->data_riwayat_model->joinmodPendidikan()->result_array();
			$this->load->view('asn/data_riwayat/pendidikan/pendidikan', $data);
		endif;
	}
	public function update_pendidikan($aksi, $id='')
	{
		$post = $this->input->post();
		$nip = $this->session->userdata('nip');
		$jp = $this->data_riwayat_model->getmasterJPendidikan()->result_array();
		$jp2 = array_column($jp, 'nm_jpendidikan', 'id_jpendidikan');
		$jpend =  !empty($post['pendidikanj']) ? strtoupper(str_replace(' ','_',$jp2[$post['pendidikanj']])) : 'jenis_profesi';
		$tgllulus = !empty($post['lulustgl']) ? date('dmy', strtotime($post['lulustgl'])) : '';

		$config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
		$config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = 500;
		$config['file_name'] = 'IJAZAH_'.strtoupper($jpend).'_'.$nip.'_'.$tgllulus;
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$update = $this->data_riwayat_model->updatemodPendidikan($aksi, $post, $nip, $config, $id);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_riwayat/pendidikan');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_riwayat/pendidikan');
        endif;
	}

	public function hapus_pendidikan($id)
	{
		$cek = $this->db->where('id', decrypt_url($id))->get('mod_pendidikan')->row();
		$file = 'assets/asn/dokumen/arsip/'.$cek->file_ijazah_pendidikan;
		$delete = $this->db->where('id', decrypt_url($id))->delete('mod_pendidikan');
		$delpath = unlink($file);

		if($delete && $delpath){
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Sukses !</strong> Data berhasil dihapus.</div>');
            redirect('data_riwayat/pendidikan');	
        }else{
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal !</strong> Data gagal dihapus</div>');
            redirect('data_riwayat/pendidikan');
        }
	}

	// Diklat
	public function diklat($form='', $id='')
	{
		$sesi_nip = $this->session->userdata('nip');

        $data = $this->uri();
        $this->db->where('nip', $sesi_nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$data['mdiklat'] = $this->data_riwayat_model->getmasterDiklat()->result_array();
		$data['mjdiklat'] = $this->data_riwayat_model->getmasterJenisDiklat()->result_array();

		if($form=='tambah_diklat'):
			$this->load->view('asn/data_riwayat/diklat/tambah_diklat',$data);
		elseif($form=='ubah_diklat'):
			$data['id'] = $id;
			$this->db->where(array('nip' => $sesi_nip, 'id'=>decrypt_url($id)));
			$data['dk'] = $this->data_riwayat_model->getmodDiklat()->row_array();
			$this->load->view('asn/data_riwayat/diklat/edit_diklat',$data);
		else:
			$this->db->order_by('tgl_sertifikat','desc');
			$this->db->where('nip', $sesi_nip);
			$data['diklat'] = $this->data_riwayat_model->joinmodDiklat()->result_array();
			$this->load->view('asn/data_riwayat/diklat/diklat', $data);
		endif;
	}

	public function update_diklat($aksi, $id='')
	{
		$post = $this->input->post();
		$nip = $this->session->userdata('nip');
		$tglsertifikat = isset($post['sertifikattgl']) ? date('dmy',strtotime($post['sertifikattgl'])) : '';

		$config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
		$config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = 500;
		$config['file_name'] = 'SERDIK_'.$nip.'_'.$tglsertifikat;
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$update = $this->data_riwayat_model->updatemodDiklat($aksi, $post, $nip, $config, $id);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_riwayat/diklat');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_riwayat/diklat');
        endif;
	}
	public function hapus_diklat($id)
	{
		$cek = $this->db->where('id', decrypt_url($id))->get('mod_diklat')->row();
		$file = 'assets/asn/dokumen/arsip/'.$cek->file_sertifikat_diklat;
		$delete = $this->db->where('id', decrypt_url($id))->delete('mod_diklat');
		$delpath = unlink($file);

		if($delete && $delpath){
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Sukses !</strong> Data berhasil dihapus.</div>');
            redirect('data_riwayat/diklat');	
        }else{
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal !</strong> Data gagal dihapus</div>');
            redirect('data_riwayat/diklat');
        }
	}
	//End Diklat

	// Seminar
	public function seminar($form='', $id='')
	{
		$sesi_nip = $this->session->userdata('nip');

        $data = $this->uri();
        $this->db->where('nip', $sesi_nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		
		$data['mseminar'] = $this->data_riwayat_model->getmasterSeminar()->result_array();
		if($form=='tambah_seminar'):
			$this->load->view('asn/data_riwayat/seminar/tambah_seminar', $data);
		elseif($form=='ubah_seminar'):
			$data['id'] = $id;
			$this->db->where(array('nip'=> $sesi_nip, 'id'=>decrypt_url($id)));
			$data['sr'] = $this->data_riwayat_model->getmodSeminar()->row_array();
			$this->load->view('asn/data_riwayat/seminar/edit_seminar', $data);
		else:
			$this->db->order_by('tgl_seminar','desc');
			$this->db->where('nip', $sesi_nip);
			$data['seminar'] = $this->data_riwayat_model->joinmodSeminar()->result_array();
			$this->load->view('asn/data_riwayat/seminar/seminar', $data);
		endif;
	}

	public function update_seminar($aksi, $id='')
	{
		$post = $this->input->post();
		$nip = $this->session->userdata('nip');
		$tglsmr = isset($post['seminartgl']) ? date('dmy',strtotime($post['seminartgl']))  : '';

		$config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
		$config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = 500;
		$config['file_name'] = 'SER_SEMINAR_'.$nip.'_'.$tglsmr;
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$update = $this->data_riwayat_model->updatemodSeminar($aksi, $post, $nip, $config, $id);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_riwayat/seminar');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_riwayat/seminar');
        endif;
	}

	public function hapus_seminar($id)
	{
		$cek = $this->db->where('id', decrypt_url($id))->get('mod_seminar')->row();
		$file = 'assets/asn/dokumen/arsip/'.$cek->file_sertifikat_seminar;
		$delete = $this->db->where('id', decrypt_url($id))->delete('mod_seminar');
		$delpath = unlink($file);

		if($delete && $delpath){
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Sukses !</strong> Data berhasil dihapus.</div>');
            redirect('data_riwayat/seminar');	
        }else{
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal !</strong> Data gagal dihapus</div>');
            redirect('data_riwayat/seminar');
        }
	}
	// End Seminar

	// Hukuman
	public function hukuman_disiplin($form='', $id='')
	{
		 $sesi_nip = $this->session->userdata('nip');

        $data = $this->uri();
        $this->db->where('nip', $sesi_nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		
		$data['mhukuman'] = $this->data_riwayat_model->getmasterHukuman()->result_array();
		$data['mjhukuman'] = $this->data_riwayat_model->getmasterJHukuman()->result_array();
		if($form == 'tambah_hukuman'):
			$this->load->view('asn/data_riwayat/hukuman_disiplin/tambah_hukuman_disiplin', $data);
		elseif($form == 'ubah_hukuman'):
			$data['id'] = $id;
			$this->db->where(array('nip' => $sesi_nip, 'id' => decrypt_url($id)));
			$data['huk'] = $this->data_riwayat_model->getmodHukuman()->row_array();
			$this->load->view('asn/data_riwayat/hukuman_disiplin/edit_hukuman_disiplin', $data);
		else:
			$this->db->order_by('tmt_hukuman','desc');
			$this->db->where('nip', $sesi_nip);
			$data['hukuman'] = $this->data_riwayat_model->joinmodHukuman()->result_array();
			$this->load->view('asn/data_riwayat/hukuman_disiplin/hukuman_disiplin', $data);
		endif;
	}

	public function update_hukuman($aksi, $id='')
	{
		$post = $this->input->post();
		$nip = $this->session->userdata('nip');
		
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$update = $this->data_riwayat_model->updatemodHukuman($aksi, $post, $nip, $id);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_riwayat/hukuman_disiplin');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_riwayat/hukuman_disiplin');
        endif;
	}

	// End Hukuman
	
	// Kenaikan Gaji Berkala (KGB)
	public function kgb($form='', $id='')
	{
		 $sesi_nip = $this->session->userdata('nip');

        $data = $this->uri();
        $this->db->where('nip', $sesi_nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		
		$data['mgolongan'] = $this->data_riwayat_model->getmasterGolongan()->result_array();
		if($form=='tambah_kgb'):
			$this->load->view('asn/data_riwayat/kgb/tambah_kgb',$data);
		elseif($form=='ubah_kgb'):
			$data['id'] = $id;
			$this->db->where(array('nip'=> $sesi_nip, 'id'=>decrypt_url($id)));
			$data['kgb'] = $this->data_riwayat_model->getmodKgb()->row_array();
			$this->load->view('asn/data_riwayat/kgb/edit_kgb',$data);
		else:
			$this->db->order_by('tmt_kgb','desc');
			$this->db->where('nip', $sesi_nip);
			$data['kgb'] = $this->data_riwayat_model->joinmodKgb()->result_array();
			$this->load->view('asn/data_riwayat/kgb/kgb', $data);
		endif;
	}

	public function update_kgb($aksi, $id='')
	{
		$post = $this->input->post();
		$nip = $this->session->userdata('nip');
		$tglsk = isset($post['tglskkgb']) ? date('dmy',strtotime($post['tglskkgb'])) : '';

		$config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
		$config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = 500;
		$config['file_name'] ='KGB_'.$nip.'_'.$tglsk;
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$update = $this->data_riwayat_model->updatemodKgb($aksi, $post, $nip, $config, $id);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_riwayat/kgb');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_riwayat/kgb');
        endif;
	}
	public function hapus_kgb($id)
	{
		$cek = $this->db->where('id', decrypt_url($id))->get('mod_kgb')->row();
		$file = 'assets/asn/dokumen/arsip/'.$cek->file_sk_kgb;
		$delete = $this->db->where('id', decrypt_url($id))->delete('mod_kgb');
		$delpath = unlink($file);

		if($delete && $delpath){
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Sukses !</strong> Data berhasil dihapus.</div>');
            redirect('data_riwayat/kgb');	
        }else{
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal !</strong> Data gagal dihapus</div>');
            redirect('data_riwayat/kgb');
        }
	}

	// End Kenaikan Gaji Berkala (KGB)

	// Angka Kredit
	public function angka_kredit($form='', $id='')
	{
		 $sesi_nip = $this->session->userdata('nip');

        $data = $this->uri();
        $this->db->where('nip', $sesi_nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		
		$data['mjabatan'] = $this->data_riwayat_model->getmasterJabatan()->result_array();
		if($form=='tambah_kredit'):
			$this->load->view('asn/data_riwayat/angka_kredit/tambah_angka_kredit', $data);
		elseif($form=='ubah_kredit'):
			$data['id'] = $id;
			$this->db->where(array('nip'=> $sesi_nip, 'id'=>decrypt_url($id)));
			$data['kr'] = $this->data_riwayat_model->getmodKredit()->row_array();
			$this->load->view('asn/data_riwayat/angka_kredit/edit_angka_kredit', $data);
		else:
			$this->db->order_by('tgl_sk', 'desc');
			$this->db->where('nip', $sesi_nip);
			$data['kredit'] = $this->data_riwayat_model->joinmodKredit()->result_array();
			$this->load->view('asn/data_riwayat/angka_kredit/angka_kredit', $data);
		endif;
	}

	public function update_kredit($aksi, $id='')
	{
		$post = $this->input->post();
		$nip = $this->session->userdata('nip');
		$tglskkr = isset($post['sktglkredit']) ? date('dmy',strtotime($post['sktglkredit'])) : '';

		$config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
		$config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = 500;
		$config['file_name'] = 'SK_PAK_KREDIT_'.$nip.'_'.$tglskkr;
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$update = $this->data_riwayat_model->updatemodKredit($aksi, $post, $nip, $config, $id);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_riwayat/angka_kredit');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_riwayat/angka_kredit');
        endif;
	}

	public function hapus_kredit($id)
	{
		$cek = $this->db->where('id', decrypt_url($id))->get('mod_kredit')->row();
		$file = 'assets/asn/dokumen/arsip/'.$cek->file_sk_kredit;
		$delete = $this->db->where('id', decrypt_url($id))->delete('mod_kredit');
		$delpath = unlink($file);

		if($delete && $delpath){
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Sukses !</strong> Data berhasil dihapus.</div>');
            redirect('data_riwayat/angka_kredit');	
        }else{
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal !</strong> Data gagal dihapus</div>');
            redirect('data_riwayat/angka_kredit');
        }
	}
	// End Angka Kredit

	// Penghargaan
	public function penghargaan($form='', $id='')
	{
		$sesi_nip = $this->session->userdata('nip');

        $data = $this->uri();
        $this->db->where('nip', $sesi_nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		
		if($form=='tambah_penghargaan'):
			$this->load->view('asn/data_riwayat/penghargaan/tambah_penghargaan', $data);
		elseif($form=='ubah_penghargaan'):
			$data['id'] = $id;
			$this->db->where(array('nip'=>$sesi_nip, 'id'=>decrypt_url($id)));
			$data['pg'] = $this->data_riwayat_model->getmodPenghargaan()->row_array();
			$this->load->view('asn/data_riwayat/penghargaan/edit_penghargaan', $data);
		else:
			$this->db->order_by('sk_tanggal', 'desc');
			$this->db->where('nip', $sesi_nip);
			$data['penghargaan'] = $this->data_riwayat_model->getmodPenghargaan()->result_array();
			$this->load->view('asn/data_riwayat/penghargaan/penghargaan', $data);
		endif;
	}
	public function update_penghargaan($aksi, $id='')
	{
		$post = $this->input->post();
		$nip = $this->session->userdata('nip');
		$tgltdj = isset($post['sktgl']) ? date('dmy', strtotime($post['sktgl'])) : '';

		$config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
		$config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = 500;
		$config['file_name'] = 'PIAGAM_PENGHARGAAN_'.$nip.'_'.$tgltdj;
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$post = $this->input->post();
		$update = $this->data_riwayat_model->updatemodPenghargaan($aksi, $post, $nip, $config, $id);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_riwayat/penghargaan');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_riwayat/penghargaan');
        endif;
	}
	public function hapus_penghargaan($id)
	{
		$cek = $this->db->where('id', decrypt_url($id))->get('mod_tandajasa')->row();
		$file = 'assets/asn/dokumen/arsip/'.$cek->file_sk_tandajasa;
		$delete = $this->db->where('id', decrypt_url($id))->delete('mod_tandajasa');
		$delpath = unlink($file);

		if($delete && $delpath){
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Sukses !</strong> Data berhasil dihapus.</div>');
            redirect('data_riwayat/penghargaan');	
        }else{
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal !</strong> Data gagal dihapus</div>');
            redirect('data_riwayat/penghargaan');
        }
	}
	// End Penghargaan

	// Orang Tua
	public function keluarga($uri, $form='', $id='')
	{
		$sesi_nip = $this->session->userdata('nip');
		$arrayUri = array('orangtua','pasangan','anak');
        $data = $this->uri();
        $this->db->where('nip', $sesi_nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		if(in_array($uri, $arrayUri)):
			$data['uri'] = $uri;
			$data['mkeluarga'] = $this->data_riwayat_model->groupmasterKeluarga($uri)->result_array();
			$data['mstatusdasar'] = $this->data_riwayat_model->getmasterStatusdasar()->result_array();
			$data['msd'] = array_column($data['mstatusdasar'], 'status_dasar', 'id_status_dasar');
			$data['mkelamin'] = $this->data_riwayat_model->getmasterKelamin()->result_array();
			$data['mkl'] = array_column($data['mkelamin'], 'nm_kelamin', 'id_kelamin');
			if($form=='tambah_'.$uri):
				$this->load->view('asn/data_riwayat/keluarga/'.$uri.'/tambah_'.$uri, $data);
			elseif($form=='ubah_'.$uri):
				$data['id'] = $id;
				$this->db->where(array('nip'=>$sesi_nip, 'id'=>decrypt_url($id)));
				$data['mgk'] = $this->data_riwayat_model->getgroupmodKeluarga($uri)->row_array();
				$this->load->view('asn/data_riwayat/keluarga/'.$uri.'/edit_'.$uri, $data);
			else:
				$this->db->order_by('id', 'desc');
				$this->db->where('nip', $sesi_nip);
				$data['mod'] = $this->data_riwayat_model->joingroupmodKeluarga($uri)->result_array();
				$this->load->view('asn/data_riwayat/keluarga/'.$uri.'/'.$uri, $data);
			endif;
		endif;
	}

	// Update Orang Tua
	public function update_orangtua($aksi, $id='')
	{
		$post = $this->input->post();
		$nip = $this->session->userdata('nip');

		$config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
		$config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = 500;
		$config['file_name'] = 'KK_'.$nip;
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		
		$update = $this->data_riwayat_model->updatemodOrangtua($aksi, $post, $nip, $config, $id);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_riwayat/keluarga/orangtua');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_riwayat/keluarga/orangtua');
        endif;
	}
	public function hapus_orangtua($id)
	{
		$cek = $this->db->where('id', decrypt_url($id))->get('mod_orangtua')->row();
		$file = 'assets/asn/dokumen/arsip/'.$cek->file_kartu_keluarga;
		$delete = $this->db->where('id', decrypt_url($id))->delete('mod_orangtua');
		$delpath = unlink($file);

		if($delete && $delpath){
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Sukses !</strong> Data berhasil dihapus.</div>');
            redirect('data_riwayat/keluarga/orangtua');	
        }else{
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal !</strong> Data gagal dihapus</div>');
            redirect('data_riwayat/keluarga/orangtua');
        }
	}
	// End Orang Tua

	// Update Pasangan
	public function update_pasangan($aksi, $id='')
	{
		$post = $this->input->post();
		$nip = $this->session->userdata('nip');

		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$update = $this->data_riwayat_model->updatemodPasangan($aksi, $post, $nip, $id);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_riwayat/keluarga/pasangan');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_riwayat/keluarga/pasangan');
        endif;
	}
	public function hapus_pasangan($id)
	{
		$cek = $this->db->where('id', decrypt_url($id))->get('mod_pasangan')->row();
		$filektp = 'assets/asn/dokumen/arsip/'.$cek->file_ktp_pasangan;
		$filebukunikah = 'assets/asn/dokumen/arsip/'.$cek->file_buku_nikah;
		$fileaktacerai = 'assets/asn/dokumen/arsip/'.$cek->file_akta_cerai;
		$delete = $this->db->where('id', decrypt_url($id))->delete('mod_pasangan');
		unlink($filektp);
		unlink($filebukunikah);
		unlink($fileaktacerai);

		if($delete){
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Sukses !</strong> Data berhasil dihapus.</div>');
            redirect('data_riwayat/keluarga/pasangan');	
        }else{
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal !</strong> Data gagal dihapus</div>');
            redirect('data_riwayat/keluarga/pasangan');
        }
	}
	// End Pasangan

	// Update Pasangan
	public function update_anak($aksi, $id='')
	{
		$post = $this->input->post();
		$nip = $this->session->userdata('nip');
		$tgll = isset($post['anaktgll']) ? date('dmy', strtotime($post['anaktgll'])) : '';

		
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$update = $this->data_riwayat_model->updatemodAnak($aksi, $post, $nip, $tgll,$id);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_riwayat/keluarga/anak');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_riwayat/keluarga/anak');
        endif;
	}
	public function hapus_anak($id)
	{
		$cek = $this->db->where('id', decrypt_url($id))->get('mod_anak')->row();
		$fileaktalahir = 'assets/asn/dokumen/arsip/'.$cek->file_akta_lahir;
		$filebpjs = 'assets/asn/dokumen/arsip/'.$cek->file_bpjs_anak;
		$delete = $this->db->where('id', decrypt_url($id))->delete('mod_anak');
		unlink($fileaktalahir);
		unlink($filebpjs);

		if($delete){
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Sukses !</strong> Data berhasil dihapus.</div>');
            redirect('data_riwayat/keluarga/anak');	
        }else{
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal !</strong> Data gagal dihapus</div>');
            redirect('data_riwayat/keluarga/anak');
        }
	}
	// End Anak
	
	//Group Keluarga Tidak Terpakai dulu
	public function keluargaa($uri='', $form='', $id='')
	{
		 $sesi_nip = $this->session->userdata('nip');

        $data = $this->uri();
        $this->db->where('nip', $sesi_nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$arrayUri = array('orangtua','suami_istri','sanak');

		if(in_array($uri, $arrayUri)):
			$data['uri'] = $uri;
			$data['mkeluarga'] = $this->data_riwayat_model->groupmasterKeluarga($uri)->result_array();
			$data['mstatusdasar'] = $this->data_riwayat_model->getmasterStatusdasar()->result_array();
			$data['msd'] = array_column($data['mstatusdasar'], 'status_dasar', 'id_status_dasar');
			if($form=='tambah_'.$uri):
				$this->load->view('asn/data_riwayat/keluarga/tambah_'.$uri, $data);
			elseif($form=='ubah_'.$uri):
				$data['id'] = $id;
				$this->db->where(array('nip'=>$sesi_nip, 'id'=>decrypt_url($id)));
				$data['mgk'] = $this->data_riwayat_model->getgroupmodKeluarga($uri)->row_array();
				$this->load->view('asn/data_riwayat/keluarga/edit_'.$uri, $data);
			else:
				$this->db->order_by('id', 'desc');
				$this->db->where('nip', $sesi_nip);
				$data['keluarga'] = $this->data_riwayat_model->joingroupmodKeluarga($uri)->result_array();
				$this->load->view('asn/data_riwayat/keluarga/'.$uri, $data);
			endif;
		else:
			redirect('data_riwayat/keluarga/orangtua');
		endif;
	}

	public function update_keluargaa($uri, $aksi, $id='')
	{
		$nip = $this->session->userdata('nip');

		$config['upload_path'] = './assets/asn/dokumen/sk/'; //path folder
		$config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = 500;
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$post = $this->input->post();
		$update = $this->data_riwayat_model->updategroupmodKeluarga($uri, $aksi, $post, $nip, $config, $id);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_riwayat/keluarga/'.$uri);	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_riwayat/penghargaan/'.$uri);
        endif;
	}
	// End Modul Keluarga

	

	// Cuti
	public function cuti($form='', $id='')
	{
		$sesi_nip = $this->session->userdata('nip');

        $data = $this->uri();
        $this->db->where('nip', $sesi_nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		
		$data['mcuti'] = $this->data_riwayat_model->getmasterCuti()->result_array();
		if($form=='tambah_cuti'):
			$this->load->view('asn/data_riwayat/cuti/tambah_cuti', $data);
		elseif($form=='ubah_cuti'):
			$data['id'] = $id;
			$this->db->where(array('nip'=> $sesi_nip, 'id'=>decrypt_url($id)));
			$data['ct'] = $this->data_riwayat_model->getmodCuti()->row_array();
			$this->load->view('asn/data_riwayat/cuti/edit_cuti', $data);
		else:
			$this->db->order_by('id', 'desc');
			$this->db->where('nip', $sesi_nip);
			$data['cuti'] = $this->data_riwayat_model->joinmodCuti()->result_array();
			$this->load->view('asn/data_riwayat/cuti/cuti', $data);
		endif;
	}

	public function update_cuti($aksi, $id='')
	{
		$nip = $this->session->userdata('nip');

		$config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
		$config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = 500;
		$config['file_name'] = 500;
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$post = $this->input->post();
		$update = $this->data_riwayat_model->updatemodCuti($aksi, $post, $nip, $config, $id);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('data_riwayat/cuti');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
            redirect('data_riwayat/cuti');
        endif;
	}
	public function hapus_cuti($id)
	{
		// $cek = $this->db->where('id', decrypt_url($id))->get('mod_cuti')->row();
		// $file = 'assets/asn/dokumen/arsip/'.$cek->file_sk_cuti;
		$delete = $this->db->where('id', decrypt_url($id))->delete('mod_cuti');
		// $delpath = unlink($file);

		if($delete){
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Sukses !</strong> Data berhasil dihapus.</div>');
            redirect('data_riwayat/cuti');	
        }else{
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal !</strong> Data gagal dihapus</div>');
            redirect('data_riwayat/cuti');
        }
	}
	// End Cuti
}
