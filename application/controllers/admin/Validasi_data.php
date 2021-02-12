<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi_data extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        if($this->session->userdata('login') == false){
			redirect('login');
		}
		date_default_timezone_set("Asia/Makassar");
		$this->load->model('user_model');
		$this->load->model('admin/validasi_model');
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
		$data['lvl'] = $this->session->userdata('level_id');
        $data = $this->uri();
		$nip = $this->session->userdata('nip');
		$this->db->where('nip',$nip);
		
        $data['user'] = $this->user_model->getmodUser()->row_array();

		$data_pribadi = array_column($this->validasi_model->getmodDPribadiTinjau()->result_array(), 'nip');
		$identitas = array_column($this->validasi_model->getmodIdentitasTinjau()->result_array(), 'nip');
		$fisik = array_column($this->validasi_model->getmodFisikTinjau()->result_array(), 'nip');
		$cpns = array_column($this->validasi_model->getmodCpnsTinjau()->result_array(), 'nip');
		$pns = array_column($this->validasi_model->getmodPnsTinjau()->result_array(), 'nip');

		//Riwayat
		//Jabatan
		$this->db->where('status_aktif', 0);
		$sjabatan = $this->validasi_model->getmodJabatan()->result_array();
		$jabatan = array_column($sjabatan, 'nip');

		//Pangkat
		$this->db->where('status_aktif', 0);
		$spangkat = $this->validasi_model->getmodPangkat()->result_array();
		$pangkat = array_column($spangkat, 'nip');
		
		//Pendidikan
		$this->db->where('status_aktif', 0);
		$sedu = $this->validasi_model->getmodPendidikan()->result_array();
		$edu = array_column($sedu, 'nip');

		//Diklat
		$this->db->where('status_aktif', 0);
		$sdik = $this->validasi_model->getmodDiklat()->result_array();
		$dik = array_column($sdik, 'nip');

		//Seminar
		$this->db->where('status_aktif', 0);
		$ssmr = $this->validasi_model->getmodSeminar()->result_array();
		$smr = array_column($ssmr, 'nip');
		
		//Hukuman
		$this->db->where('status_aktif', 0);
		$shuk = $this->validasi_model->getmodHukuman()->result_array();
		$huk = array_column($shuk, 'nip');

		//KGB
		$this->db->where('status_aktif', 0);
		$skgb = $this->validasi_model->getmodKgb()->result_array();
		$kgb = array_column($skgb, 'nip');
		//Kredit
		$this->db->where('status_aktif', 0);
		$skre = $this->validasi_model->getmodKredit()->result_array();
		$kre = array_column($skre, 'nip');
		//Penghargaan
		$this->db->where('status_aktif', 0);
		$stdj = $this->validasi_model->getmodPenghargaan()->result_array();
		$tdj = array_column($stdj, 'nip');
		//Orangtua
		$this->db->where('status_aktif', 0);
		$sort = $this->validasi_model->getmodOrangtua()->result_array();
		$ort = array_column($sort, 'nip');
		//Pasangan
		$this->db->where('status_aktif', 0);
		$spas = $this->validasi_model->getmodPasangan()->result_array();
		$pas = array_column($spas, 'nip');
		//Anak
		$this->db->where('status_aktif', 0);
		$sank = $this->validasi_model->getmodAnak()->result_array();
		$ank = array_column($sank, 'nip');
		//Cuti
		$this->db->where('status_aktif', 0);
		$scut = $this->validasi_model->getmodCuti()->result_array();
		$cut = array_column($scut, 'nip');
		
		$data_tinjau = array_merge($data_pribadi, $identitas, $fisik, $cpns, $pns, $jabatan, $pangkat, $edu, $dik, $smr, $huk, $kgb, $kre, $tdj, $ort, $pas, $ank, $cut);
		$unik = array_unique($data_tinjau);

		// var_dump($unik);

		if(count($unik) > 0):
			foreach($unik as $k => $v){
				$this->db->where('nip', $v);
				$dp = $this->validasi_model->getviewAsn()->row();
				$data_foreach[] = array(
					'nip' => $v,
					'nama' => $dp->nama,
					'unit_kerja' => $dp->nm_unitkerja
				);
			}
		elseif(count($pangkat) > 0):

		else:
			$data_foreach = array(
			);
		endif;
		$data['validasi_asn'] =  $data_foreach;
		$this->load->view('admin/validasi_data', $data);

	}

	public function proses_validasi($id)
	{
		$data = $this->uri();
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$data['id'] = $id;
		//Data Utama
		//Data Pribadi
		$this->db->where(array('nip'=>decrypt_url($id)));
		$data['dpv'] = $this->validasi_model->getmodDPribadi()->row_array();
		// $key = array('Unit Kerja', 'NIP', 'Nama', 'Gelar Depan', 'Gelar Belakang', 'Tempat Lahir', 'Tanggal Lahir', 'Alamat', 'Kode Pos', 'Email', 'No. Telp.', 'Agama', 'Jenis Kelamin', 'Status Nikah', 'NIP Lama');
		// $v = array('nm_unitkerja', 'nip', 'nama','gelardepan', 'gelarbelakang', 'tempatlahir', 'tanggallahir', 'alamat', 'kodepos', 'email', 'notlpx','nm_agama', 'nm_kelamin', 'nm_skawin', 'nip_lama', 'file_ktp');
		// $this->db->select($v);
		$this->db->where(array('nip'=>decrypt_url($id)));
		$data['dpt'] = $this->validasi_model->getmodDPribadiTinjau()->row_array();

		//Data Identitas
		$this->db->where(array('nip'=>decrypt_url($id)));
		$data['idpv'] = $this->validasi_model->getmodIdentitas()->row_array();

		$this->db->where(array('nip'=>decrypt_url($id)));
		$data['idpt'] = $this->validasi_model->getmodIdentitasTinjau()->row_array();

		//Data Fisik
		$this->db->where(array('nip'=>decrypt_url($id)));
		$data['mfv'] = $this->validasi_model->getmodFisik()->row_array();
		
		$this->db->where(array('nip'=>decrypt_url($id)));
		$data['mft'] = $this->validasi_model->getmodFisikTinjau()->row_array();

		//Data Cpns
		$this->db->where(array('nip'=>decrypt_url($id)));
		$data['cpnsv'] = $this->validasi_model->getmodCpns()->row_array();

		$this->db->where(array('nip'=>decrypt_url($id)));
		$data['cpnst'] = $this->validasi_model->getmodCpnsTinjau()->row_array();

		//Data Pns
		$this->db->where(array('nip'=>decrypt_url($id)));
		$data['pnsv'] = $this->validasi_model->getmodPns()->row_array();

		$this->db->where(array('nip'=>decrypt_url($id)));
		$data['pnst'] = $this->validasi_model->getmodPnsTinjau()->row_array();

		//Data Riwayat
		//Jabatan
		$this->db->where(array('nip'=>decrypt_url($id)));
		$data['jab'] = $this->validasi_model->getmodJabatan()->result_array();
		//Pangkat
		$this->db->where(array('nip'=>decrypt_url($id), 'status_aktif'=>0));
		$data['pkt'] = $this->validasi_model->getmodPangkat()->result_array();
		//Pendidikan
		$this->db->where(array('nip'=>decrypt_url($id), 'status_aktif'=>0));
		$data['edu'] = $this->validasi_model->getmodPendidikan()->result_array();
		//Diklat
		$this->db->where(array('nip'=>decrypt_url($id), 'status_aktif'=>0));
		$data['dik'] = $this->validasi_model->getmodDiklat()->result_array();
		//Seminar
		$this->db->where(array('nip'=>decrypt_url($id), 'status_aktif'=>0));
		$data['smr'] = $this->validasi_model->getmodSeminar()->result_array();
		//Hukuman
		$this->db->where(array('nip'=>decrypt_url($id), 'status_aktif'=>0));
		$data['huk'] = $this->validasi_model->getmodHukuman()->result_array();
		//KGB
		$this->db->where(array('nip'=>decrypt_url($id), 'status_aktif'=>0));
		$data['kgb'] = $this->validasi_model->getmodKgb()->result_array();
		//Kredit
		$this->db->where(array('nip'=>decrypt_url($id), 'status_aktif'=>0));
		$data['kre'] = $this->validasi_model->getmodKredit()->result_array();
		//Penhargaan
		$this->db->where(array('nip'=>decrypt_url($id), 'status_aktif'=>0));
		$data['tdj'] = $this->validasi_model->getmodPenghargaan()->result_array();
		//Orangtua
		$this->db->where(array('nip'=>decrypt_url($id), 'status_aktif'=>0));
		$data['ot'] = $this->validasi_model->getmodOrangtua()->result_array();
		//Pasangan
		$this->db->where(array('nip'=>decrypt_url($id), 'status_aktif'=>0));
		$data['pas'] = $this->validasi_model->getmodPasangan()->result_array();
		//Anak
		$this->db->where(array('nip'=>decrypt_url($id), 'status_aktif'=>0));
		$data['ank'] = $this->validasi_model->getmodAnak()->result_array();
		//Cuti
		$this->db->where(array('nip'=>decrypt_url($id), 'status_aktif'=>0));
		$data['cut'] = $this->validasi_model->getmodCuti()->result_array();

		// for($i=0; $i < count($key); $i++):
		// 	$dpp[$key[$i]] = $data['dpt'][$v[$i]];
		// endfor;

		// Validas
		
		$data['nip'] = $nip;
		
		$this->load->view('admin/tabel_validasi', $data);
	}

	public function validasi_opd_dp($aksi='', $nip)
	{
		$lvladmin = $this->session->userdata('level_id');
		$sesi_nip = $this->session->userdata('nip');
		$post = $this->input->post();

		$this->db->where('nip', $nip);
		$dtpribadi = $this->validasi_model->getmodDPribadi()->row_array();

		$update = $this->validasi_model->updateValidasiOPDdp($aksi, $post, $nip, $lvladmin);

		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
			if($lvladmin==1 || $lvladmin==2):
				if($aksi=='valid'):
					$pesan = 'Data Pribadi atas Nama : '.$dtpribadi['nama'].'/NIP : '.$dtpribadi['nip'].' Telah berhasi divalidasi'; 
				endif;
				if($aksi=='tidak_valid'):
					$pesan = 'Data Pribadi atas Nama : '.$dtpribadi['nama'].'/NIP : '.$dtpribadi['nip'].' dengan pesan gagal validasi telah terkirim'; 
				endif;
			endif;
			if($lvladmin > 2 && $lvladmin < 5):
				if($aksi=='valid'):
					$pesan = 'Data Pribadi atas Nama : '.$dtpribadi['nama'].'/NIP : '.$dtpribadi['nip'].' Telah berhasi ke tahap validasi BKPSDM'; 
				endif;
				if($aksi=='tidak_valid'):
					$pesan = 'Data Pribadi atas Nama : '.$dtpribadi['nama'].'/NIP : '.$dtpribadi['nip'].'dengan pesan gagal validasi telah terkirim'; 
				endif;
			endif;

        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> '.$pesan.'.</div>');
			redirect('admin/validasi_data/proses_validasi/'.encrypt_url($nip));	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Validasi Data Gagal.</div>');
            redirect('admin/validasi_data/proses_validasi/'.encrypt_url($nip));
        endif;
	}

	public function validasi_opd_id($aksi='', $nip)
	{
		$lvladmin = $this->session->userdata('level_id');
		$sesi_nip = $this->session->userdata('nip');
		$post = $this->input->post();

		$this->db->where('nip', $nip);
		$dtidentitas = $this->validasi_model->getmodDPribadi()->row_array();

		$update = $this->validasi_model->updateValidasiOPDid($aksi, $post, $nip, $lvladmin);

		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
			if($lvladmin==1 || $lvladmin==2):
				if($aksi=='valid'):
					$pesan = 'Data Identitas atas Nama : '.$dtidentitas['nama'].'/NIP : '.$dtidentitas['nip'].' Telah berhasi divalidasi'; 
				endif;
				if($aksi=='tidak_valid'):
					$pesan = 'Data Identitas atas Nama : '.$dtidentitas['nama'].'/NIP : '.$dtidentitas['nip'].' dengan pesan gagal validasi telah terkirim'; 
				endif;
			endif;
			if($lvladmin > 2 && $lvladmin < 5):
				if($aksi=='valid'):
					$pesan = 'Data Identitas atas Nama : '.$dtidentitas['nama'].'/NIP : '.$dtidentitas['nip'].' Telah berhasi ke tahap validasi BKPSDM'; 
				endif;
				if($aksi=='tidak_valid'):
					$pesan = 'Data Identitas atas Nama : '.$dtidentitas['nama'].'/NIP : '.$dtidentitas['nip'].'dengan pesan gagal validasi telah terkirim'; 
				endif;
			endif;
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> '.$pesan.'.</div>');
           redirect('admin/validasi_data/proses_validasi/'.encrypt_url($nip));	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Validasi Data Gagal.</div>');
           redirect('admin/validasi_data/proses_validasi/'.encrypt_url($nip));
        endif;
	}

	public function validasi_opd_mf($aksi='', $nip)
	{
		$lvladmin = $this->session->userdata('level_id');
		$sesi_nip = $this->session->userdata('nip');
		$post = $this->input->post();

		$this->db->where('nip', $nip);
		$dtfisik = $this->validasi_model->getmodDPribadi()->row_array();
		
		$update = $this->validasi_model->updateValidasiOPDmf($aksi, $post, $nip, $lvladmin);

		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
			if($lvladmin==1 || $lvladmin==2):
				if($aksi=='valid'):
					$pesan = 'Data Fisik atas Nama : '.$dtfisik['nama'].'/NIP : '.$dtfisik['nip'].' Telah berhasi divalidasi'; 
				endif;
				if($aksi=='tidak_valid'):
					$pesan = 'Data Fisik atas Nama : '.$dtfisik['nama'].'/NIP : '.$dtfisik['nip'].' dengan pesan gagal validasi telah terkirim'; 
				endif;
			endif;
			if($lvladmin > 2 && $lvladmin < 5):
				if($aksi=='valid'):
					$pesan = 'Data Fisik atas Nama : '.$dtfisik['nama'].'/NIP : '.$dtfisik['nip'].' Telah berhasi ke tahap validasi BKPSDM'; 
				endif;
				if($aksi=='tidak_valid'):
					$pesan = 'Data Fisik atas Nama : '.$dtfisik['nama'].'/NIP : '.$dtfisik['nip'].'dengan pesan gagal validasi telah terkirim'; 
				endif;
			endif;
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> '.$pesan.'.</div>');
           redirect('admin/validasi_data/proses_validasi/'.encrypt_url($nip));	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
           redirect('admin/validasi_data/proses_validasi/'.encrypt_url($nip));
        endif;
	}

	public function validasi_opd_cpns($aksi='', $nip)
	{
		$lvladmin = $this->session->userdata('level_id');
		$sesi_nip = $this->session->userdata('nip');
		$post = $this->input->post();

		$this->db->where('nip', $nip);
		$dtidentitas = $this->validasi_model->getmodDPribadi()->row_array();

		$update = $this->validasi_model->updateValidasiOPDcpns($aksi, $post, $nip, $lvladmin);

		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
			if($lvladmin==1 || $lvladmin==2):
				if($aksi=='valid'):
					$pesan = 'Data CPNS atas Nama : '.$dtidentitas['nama'].'/NIP : '.$dtidentitas['nip'].' Telah berhasi divalidasi'; 
				endif;
				if($aksi=='tidak_valid'):
					$pesan = 'Data CPNS atas Nama : '.$dtidentitas['nama'].'/NIP : '.$dtidentitas['nip'].' dengan pesan gagal validasi telah terkirim'; 
				endif;
			endif;
			if($lvladmin > 2 && $lvladmin < 5):
				if($aksi=='valid'):
					$pesan = 'Data CPNS atas Nama : '.$dtidentitas['nama'].'/NIP : '.$dtidentitas['nip'].' Telah berhasi ke tahap validasi BKPSDM'; 
				endif;
				if($aksi=='tidak_valid'):
					$pesan = 'Data CPNS atas Nama : '.$dtidentitas['nama'].'/NIP : '.$dtidentitas['nip'].'dengan pesan gagal validasi telah terkirim'; 
				endif;
			endif;
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> '.$pesan.'.</div>');
			redirect('admin/validasi_data/proses_validasi/'.encrypt_url($nip));
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Validasi Data Gagal.</div>');
           	redirect('admin/validasi_data/proses_validasi/'.encrypt_url($nip));
        endif;
	}

	public function validasi_opd_pns($aksi='', $nip)
	{
		$lvladmin = $this->session->userdata('level_id');
		$sesi_nip = $this->session->userdata('nip');
		$post = $this->input->post();

		$this->db->where('nip', $nip);
		$dtidentitas = $this->validasi_model->getmodDPribadi()->row_array();

		$update = $this->validasi_model->updateValidasiOPDpns($aksi, $post, $nip, $lvladmin);

		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
			if($lvladmin==1 || $lvladmin==2):
				if($aksi=='valid'):
					$pesan = 'Data PNS atas Nama : '.$dtidentitas['nama'].'/NIP : '.$dtidentitas['nip'].' Telah berhasi divalidasi'; 
				endif;
				if($aksi=='tidak_valid'):
					$pesan = 'Data PNS atas Nama : '.$dtidentitas['nama'].'/NIP : '.$dtidentitas['nip'].' dengan pesan gagal validasi telah terkirim'; 
				endif;
			endif;
			if($lvladmin > 2 && $lvladmin < 5):
				if($aksi=='valid'):
					$pesan = 'Data PNS atas Nama : '.$dtidentitas['nama'].'/NIP : '.$dtidentitas['nip'].' Telah berhasi ke tahap validasi BKPSDM'; 
				endif;
				if($aksi=='tidak_valid'):
					$pesan = 'Data PNS atas Nama : '.$dtidentitas['nama'].'/NIP : '.$dtidentitas['nip'].'dengan pesan gagal validasi telah terkirim'; 
				endif;
			endif;
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> '.$pesan.'.</div>');
           redirect('admin/validasi_data/proses_validasi/'.encrypt_url($nip));	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Validasi Data Gagal.</div>');
           redirect('admin/validasi_data/proses_validasi/'.encrypt_url($nip));
        endif;
	}

	public function validasi_opd_riwayat($riwayat='', $aksi='', $nip='', $id='')
	{
		$lvladmin = $this->session->userdata('level_id');
		$post = $this->input->post();

		$this->db->where('nip', $nip);
		$dtpangkat = $this->validasi_model->getmodDPribadi()->row_array();
		
		$update = $this->validasi_model->updateValidasiOPDriwayat($riwayat, $aksi, $nip, $id ,$post, $lvladmin);

		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
			if($lvladmin==1 || $lvladmin==2):
				if($aksi=='valid'):
					$pesan = 'Data '.$riwayat.' atas Nama : '.$dtpangkat['nama'].'/NIP : '.$dtpangkat['nip'].' Telah berhasi divalidasi'; 
				endif;
				if($aksi=='tidak_valid'):
					$pesan = 'Data '.$riwayat.' atas Nama : '.$dtpangkat['nama'].'/NIP : '.$dtpangkat['nip'].' dengan pesan gagal validasi telah terkirim'; 
				endif;
			endif;
			if($lvladmin > 2 && $lvladmin < 5):
				if($aksi=='valid'):
					$pesan = 'Data '.$riwayat.' atas Nama : '.$dtpangkat['nama'].'/NIP : '.$dtpangkat['nip'].' Telah berhasi ke tahap validasi BKPSDM'; 
				endif;
				if($aksi=='tidak_valid'):
					$pesan = 'Data '.$riwayat.' atas Nama : '.$dtpangkat['nama'].'/NIP : '.$dtpangkat['nip'].'dengan pesan gagal validasi telah terkirim'; 
				endif;
			endif;
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong>'.$pesan.'.</div>');
           redirect('admin/validasi_data/proses_validasi/'.encrypt_url($nip));	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Permohonan update data anda gagal input.</div>');
           redirect('admin/validasi_data/proses_validasi/'.encrypt_url($nip));
        endif;
	}

	
}
