<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
		$this->load->model('admin/laporan_model');
		
        //load libary pagination
        $this->load->library('pagination');
	}
	
	public function get_pns() {
		$list = $this->laporan_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item):
			if($item->jenis_jabatan_id==2){
				if($item->id_eselon==7){
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
			$row[] = !empty($item->nip) ? $item->nip : '-';
			$row[] = '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($item->nip).'">'.$item->gelardepan.''.$item->nama.''.$item->gelarbelakang.'</a>';
			$row[] = !empty($item->golongan) ? $item->golongan : '-' ;
			$row[] = !empty($item->tmt_pangkat) ? date('d-m-Y',strtotime($item->tmt_pangkat)) : '-';
			$row[] = $jabatan;
			$row[] = !empty($item->eselon) ? $item->eselon : '-';
			$row[] = !empty($item->tmt_jabatan) ? date('d-m-Y',strtotime($item->tmt_jabatan)) : '-';
			$row[] = !empty($item->mkg_tahun) ? $item->mkg_tahun : '-';
			$row[] = !empty($item->mkg_bulan) ? $item->mkg_bulan : '-';
			$row[] = !empty($item->nm_unitkerja) ? $item->nm_unitkerja : '-';
			$row[] = !empty($item->nm_kedudukan) ? $item->nm_kedudukan : '-';
			$data[] = $row;
		endforeach;
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->laporan_model->count_all(),
			"recordsFiltered" => $this->laporan_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function get_semua_pns() {
		$list = $this->laporan_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item):
			if($item->jenis_jabatan_id==2){
				if($item->id_eselon==7){
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
			$telp =!empty($item->notlpx) ? $item->notlpx : '-';
			$nohp =!empty($item->nohp) ? $item->nohp : '-';
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $item->nip;
			$row[] = !empty($item->nip_lama) ?  $item->nip_lama : '-';
			$row[] = '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($item->nip).'">'.$item->gelardepan.''.$item->nama.''.$item->gelarbelakang.'</a>';
			$row[] = !empty($item->tempatlahir) ? $item->tempatlahir : '-';
			$row[] = !empty($item->tanggallahir) ? date('d-m-Y', strtotime($item->tanggallahir)) : '-';
			$row[] = !empty($item->nm_kelamin) ? $item->nm_kelamin : '-';
			$row[] = !empty($item->nm_agama) ? $item->nm_agama : '';
			$row[] = !empty($item->skawin) && $item->skawin==3 ? (($item->nm_kelamin=='Laki-laki') ? 'Duda' : 'Janda') : (!empty($item->nm_skawin) ? $item->nm_skawin : '' );
			$row[] = !empty($item->noktp) ? $item->noktp : '-';
			$row[] = $telp.'/'.$nohp;
			$row[] = !empty($item->email) ? $item->email : '-';
			$row[] = !empty($item->alamat) ? $item->alamat : '-';
			$row[] = !empty($item->nonpwp) ? $item->nonpwp : '-';
			$row[] = !empty($item->nobpjs) ? $item->nobpjs : '-';
			$row[] = !empty($item->nm_kedudukan) ? $item->nm_kedudukan : '-';
			$row[] = !empty($item->jenis_pegawai) ? $item->jenis_pegawai : '-';
			$row[] = !empty($item->nokarpeg) ? $item->nokarpeg : '-';
			$row[] = !empty($item->no_sk_cpns) ? $item->no_sk_cpns : '-';
			$row[] = !empty($item->tgl_sk_cpns) ? date('d-m-Y',strtotime($item->tgl_sk_cpns)) : '-';
			$row[] = !empty($item->tmt_cpns) ? date('d-m-Y',strtotime($item->tmt_cpns)) : '-';
			$row[] = !empty($item->tmt_pns) ? date('d-m-Y',strtotime($item->tmt_pns)) : '-';
			$row[] = !empty($item->golongan_awal) ? $item->golongan_awal : '-';
			$row[] = !empty($item->golongan) ? $item->golongan : '-';
			$row[] = !empty($item->mkg_bulan) ? $item->mkg_bulan : '-';
			$row[] = !empty($item->mkg_tahun) ? $item->mkg_tahun : '-';
			$row[] = !empty($item->tmt_pangkat) ? date('d-m-Y',strtotime($item->tmt_pangkat)) : '-';
			$row[] = !empty($item->jenis_jabatan) ? $item->jenis_jabatan : '-';
			$row[] = $jabatan;
			$row[] = !empty($item->tmt_jabatan) ? date('d-m-Y',strtotime($item->tmt_jabatan)) : '-';
			$row[] = !empty($item->nm_jpendidikan) ? $item->nm_jpendidikan : '-';
			$row[] = !empty($item->tgl_lulus) ? date('Y',strtotime($item->tgl_lulus)) : '-';
			$row[] = !empty($item->nm_unitkerja) ? $item->nm_unitkerja : '-';
			$row[] = !empty($item->nm_bidang) ? $item->nm_bidang : '-';
			$row[] = !empty($item->nm_subbidang) ? $item->nm_subbidang : '-';
			$row[] = !empty($item->no_sk_kgb) ? $item->no_sk_kgb : '-';
			$row[] = !empty($item->tgl_sk_kgb) ? date('d-m-Y',strtotime($item->tgl_sk_kgb)) : '-';
			$row[] = !empty($item->tmt_kgb) ? date('d-m-Y',strtotime($item->tmt_kgb)) : '-';
			$row[] = !empty($item->gaji_pokok) ? 'Rp. '.number_format($item->gaji_pokok,0,',','.') : '-';
			$row[] = !empty($item->nm_diklat) ? $item->nm_diklat : '-';
			$row[] = !empty($item->tgl_sertifikat_diklat) ? date('d-m-Y',strtotime($item->tgl_sertifikat_diklat)) : '-';
			$row[] = !empty($item->jam_diklat) ? $item->jam_diklat : '-';
			$data[] = $row;
		endforeach;
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->laporan_model->count_all(),
			"recordsFiltered" => $this->laporan_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function get_kgb() {
		$list = $this->laporan_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item):
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = !empty($item->nip) ? $item->nip : '-';
			$row[] = '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($item->nip).'">'.$item->gelardepan.''.$item->nama.''.$item->gelarbelakang.'</a>';
			$row[] = !empty($item->nm_unitkerja) ? $item->nm_unitkerja : '-';
			$row[] = !empty($item->golongan) ? $item->golongan : '-' ;
			$row[] = !empty($item->tmt_kgb) ? date('d-m-Y',strtotime($item->tmt_kgb)) : '-';
			$row[] = !empty($item->no_sk_kgb) ? $item->no_sk_kgb : '-';
			$row[] = !empty($item->tgl_sk_kgb) ? date('d-m-Y',strtotime($item->tgl_sk_kgb)) : '-';
			$row[] = !empty($item->mkg_tahun) ? $item->mkg_tahun : '-';
			$row[] = !empty($item->mkg_bulan) ? $item->mkg_bulan : '-';
			$row[] = !empty($item->gaji_pokok) ? 'Rp. '.number_format($item->gaji_pokok,0,',','.') : '-';
			$data[] = $row;
		endforeach;
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->laporan_model->count_all(),
			"recordsFiltered" => $this->laporan_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function get_riwayat_pangkat() {
		$list = $this->laporan_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item):
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = !empty($item->nip) ? $item->nip : '-';
			$row[] = '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($item->nip).'">'.$item->gelardepan.''.$item->nama.''.$item->gelarbelakang.'</a>';
			$row[] = !empty($item->nm_unitkerja) ? $item->nm_unitkerja : '-';
			$row[] = !empty($item->golongan) ? $item->golongan : '-' ;
			$row[] = !empty($item->nm_kepangkatan) ? $item->nm_kepangkatan : '-';
			$row[] = !empty($item->pangkat) ? $item->pangkat : '-';
			$row[] = !empty($item->sk_nomor) ? $item->sk_nomor : '-';
			$row[] = !empty($item->sk_tanggal) ? date('d-m-Y',strtotime($item->sk_tanggal)) : '-';
			$row[] = !empty($item->no_bakn) ? $item->no_bakn : '-';
			$row[] = !empty($item->tgl_bakn) ? date('d-m-Y',strtotime($item->tgl_bakn)) : '-';
			$row[] = !empty($item->tmt_pangkat) ? date('d-m-Y',strtotime($item->tmt_pangkat)) : '-';
			$row[] = !empty($item->mkg_tahun) ? $item->mkg_tahun : '-';
			$row[] = !empty($item->mkg_bulan) ? $item->mkg_bulan : '-';
			$row[] = !empty($item->pejabat_penetap) ? $item->pejabat_penetap : '-';
			$data[] = $row;
		endforeach;
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->laporan_model->count_all(),
			"recordsFiltered" => $this->laporan_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function get_riwayat_jabatan() {
		$list = $this->laporan_model->get_datatables();
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
				
			}elseif($item->jenis_jabatan_id==1){
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
			$row[] = !empty($item->nip) ? $item->nip : '-';
			$row[] = '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($item->nip).'">'.$item->gelardepan.''.$item->nama.''.$item->gelarbelakang.'</a>';
			$row[] = !empty($item->nm_unitkerja) ? $item->nm_unitkerja : '-';
			$row[] = !empty($item->jenis_jabatan) ? $item->jenis_jabatan : '-';
			$row[] = !empty($item->jenjang_jabatan) ? $item->jenjang_jabatan : '-';
			$row[] = !empty($item->eselon) ? $item->eselon : '-' ;
			$row[] = $jabatan;
			$row[] = !empty($item->tgl_sk) ? date('d-m-Y',strtotime($item->tgl_sk)) : '-';
			$row[] = !empty($item->no_sk) ? $item->no_sk : '-';
			$row[] = !empty($item->tmt_jabatan) ? date('d-m-Y',strtotime($item->tmt_jabatan)) : '-';
			$row[] = !empty($item->tmt_pelantikan) ? date('d-m-Y',strtotime($item->tmt_pelantikan)) : '-';
			$row[] = !empty($item->pejabat_sk) ? $item->pejabat_sk : '-';
			$data[] = $row;
		endforeach;
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->laporan_model->count_all(),
			"recordsFiltered" => $this->laporan_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function get_riwayat_pendidikan() {
		$list = $this->laporan_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item):
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = !empty($item->nip) ? $item->nip : '-';
			$row[] = '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($item->nip).'">'.$item->gelardepan.''.$item->nama.''.$item->gelarbelakang.'</a>';
			$row[] = !empty($item->jenis_pendidikan) ? ($item->jenis_pendidikan==1 ? 'Akademik' : 'Profesi' ) : '-';
			$row[] = !empty($item->jurusan) ? $item->jurusan : '-';
			$row[] = !empty($item->nm_lembaga) ? $item->nm_lembaga : '-';
			$row[] = !empty($item->nm_jpendidikan) ? $item->nm_jpendidikan : '-' ;
			$row[] = !empty($item->no_ijazah) ? $item->no_ijazah : '-' ;
			$row[] = !empty($item->tgl_lulus) ? date('d-m-Y',strtotime($item->tgl_lulus)) : '-';
			$data[] = $row;
		endforeach;
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->laporan_model->count_all(),
			"recordsFiltered" => $this->laporan_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}
	
	public function get_riwayat_dikstruktural() {
		$list = $this->laporan_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item):
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = !empty($item->nip) ? $item->nip : '-';
			$row[] = '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($item->nip).'">'.$item->gelardepan.''.$item->nama.''.$item->gelarbelakang.'</a>';
			// $row[] = !empty($item->nm_unitkerja) ? $item->nm_unitkerja : '-';
			$row[] = !empty($item->jenis_diklat) ? $item->jenis_diklat : '-';
			$row[] = !empty($item->diklat) ? $item->diklat : '-';
			$row[] = !empty($item->penyelenggara) ? $item->penyelenggara : '-' ;
			$row[] = !empty($item->jam) ? $item->jam : '-' ;
			$row[] = !empty($item->no_sertifikat) ? $item->no_sertifikat : '-' ;
			$row[] = !empty($item->tgl_sertifikat) || $item->tgl_sertifikat=='0000-00-00' ? date('d-m-Y',strtotime($item->tgl_sertifikat)) : '-';
			$data[] = $row;
		endforeach;
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->laporan_model->count_all(),
			"recordsFiltered" => $this->laporan_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function get_riwayat_dikfungsional() {
		$list = $this->laporan_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item):
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = !empty($item->nip) ? $item->nip : '-';
			$row[] = '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($item->nip).'">'.$item->gelardepan.''.$item->nama.''.$item->gelarbelakang.'</a>';
			// $row[] = !empty($item->nm_unitkerja) ? $item->nm_unitkerja : '-';
			$row[] = !empty($item->nm_dikfungsional) ? $item->nm_dikfungsional : '-';
			$row[] = !empty($item->diklat) ? $item->diklat : '-';
			$row[] = !empty($item->penyelenggara) ? $item->penyelenggara : '-' ;
			$row[] = !empty($item->jam) ? $item->jam : '-' ;
			$row[] = !empty($item->no_sertifikat) ? $item->no_sertifikat : '-' ;
			$row[] = !empty($item->tgl_sertifikat) ? date('d-m-Y',strtotime($item->tgl_sertifikat)) : '-';
			$data[] = $row;
		endforeach;
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->laporan_model->count_all(),
			"recordsFiltered" => $this->laporan_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function daftar_nominatif_duk() {
		$list = $this->laporan_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		// tanggal hari ini
		$today = new DateTime('today');
		foreach ($list as $item):
			// tanggal lahir
			$tanggal = new DateTime($item->tanggallahir);
			$usia_tahun = $today->diff($tanggal)->y;
			$usia_bulan = $today->diff($tanggal)->m;

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = !empty($item->nip) ? $item->nip : '-';
			$row[] = '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($item->nip).'">'.$item->gelardepan.''.$item->nama.''.$item->gelarbelakang.'</a>';
			$row[] = !empty($item->golongan) ? $item->golongan : '-';
			$row[] = !empty($item->tmt_pangkat) ? date('d-m-Y',strtotime($item->tmt_pangkat)) : '-';
			$row[] = !empty($item->nm_jabatan) ? $item->nm_jabatan : '-';
			$row[] = !empty($item->eselon) ? $item->eselon : '-';
			$row[] = !empty($item->tmt_jabatan) ? date('d-m-Y',strtotime($item->tmt_jabatan)) : '-';
			$row[] = !empty($item->mkg_tahun) ? $item->mkg_tahun : '-';
			$row[] = !empty($item->mkg_bulan) ? $item->mkg_bulan : '-';
			$row[] = !empty($item->nm_diklat) ? $item->nm_diklat : '-';
			$row[] = !empty($item->tgl_sertifikat_diklat) ? date('Y',strtotime($item->tgl_sertifikat_diklat)) : '-';
			$row[] = !empty($item->jam_diklat) ? $item->jam_diklat : '-' ;
			$row[] = !empty($item->nm_lembaga) ? $item->nm_lembaga : '-' ;
			$row[] = !empty($item->jurusan) ? $item->jurusan : '-' ;
			$row[] = !empty($item->tgl_lulus) ? date('Y',strtotime($item->tgl_lulus)) : '-';
			$row[] = !empty($item->nm_jpendidikan) ? $item->nm_jpendidikan : '-' ;
			$row[] = !empty($item->tanggallahir) ? date('d-m-Y',strtotime($item->tanggallahir)) : '-';
			$row[] = !empty($item->tanggallahir) ? $usia_tahun : '-';
			$row[] = !empty($item->tanggallahir) ? $usia_bulan : '-';
			$row[] = !empty($item->nm_unitkerja) ? $item->nm_unitkerja : '-';
			$row[] = '-';
			$row[] = '-';
			$data[] = $row;
		endforeach;
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->laporan_model->count_all(),
			"recordsFiltered" => $this->laporan_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function daftar_nominatif_cpns() {
		$list = $this->laporan_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item):

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = !empty($item->nip) ? $item->nip : '-';
			$row[] = '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($item->nip).'">'.$item->gelardepan.''.$item->nama.''.$item->gelarbelakang.'</a>';
			$row[] = !empty($item->golongan_awal) ? $item->golongan_awal : '-';
			$row[] = !empty($item->tmt_cpns) ? date('d-m-Y',strtotime($item->tmt_cpns)) : '-';
			$row[] = !empty($item->no_sk_cpns) ? $item->no_sk_cpns : '-';
			$row[] = !empty($item->nm_jabatan) ? $item->nm_jabatan : '-';
			$row[] = !empty($item->tmt_jabatan) ? date('d-m-Y',strtotime($item->tmt_jabatan)) : '-';
			$row[] = !empty($item->mkg_tahun_cpns) ? $item->mkg_tahun_cpns : '-';
			$row[] = !empty($item->mkg_bulan_cpns) ? $item->mkg_bulan_cpns : '-';
			$row[] = !empty($item->nm_lembaga) ? $item->nm_lembaga : '-' ;
			$row[] = !empty($item->jurusan) ? $item->jurusan : '-' ;
			$row[] = !empty($item->tgl_lulus) ? date('Y',strtotime($item->tgl_lulus)) : '-';
			$row[] = !empty($item->nm_jpendidikan) ? $item->nm_jpendidikan : '-' ;
			$row[] = !empty($item->nm_unitkerja) ? $item->nm_unitkerja : '-';
			$row[] = '-';
			$data[] = $row;
		endforeach;
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->laporan_model->count_all(),
			"recordsFiltered" => $this->laporan_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}
	public function daftar_nominatif_pns_mpp() {
		$list = $this->laporan_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item):
			$tanggalmpp = date('Y-m-d', strtotime('+59 year', strtotime($item->tanggallahir))); //tambah tanggal sebanyak 6 tahun
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = !empty($item->nip) ? $item->nip : '-';
			$row[] = '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($item->nip).'">'.$item->gelardepan.''.$item->nama.''.$item->gelarbelakang.'</a>';
			$row[] = !empty($item->golongan) ? $item->golongan : '-' ;
			$row[] = !empty($item->tmt_pangkat) ? date('d-m-Y',strtotime($item->tmt_pangkat)) : '-';
			$row[] = !empty($item->nm_jabatan) ? $item->nm_jabatan : '-';
			$row[] = !empty($item->eselon) ? $item->eselon : '-';
			$row[] = !empty($item->tmt_jabatan) ? date('d-m-Y',strtotime($item->tmt_jabatan)) : '-';
			$row[] = !empty($item->mkg_tahun) ? $item->mkg_tahun : '-';
			$row[] = !empty($item->mkg_bulan) ? $item->mkg_bulan : '-';
			$row[] = !empty($item->nm_unitkerja) ? $item->nm_unitkerja : '-';
			$row[] = !empty($item->status_pegawai) ? ($item->status_pegawai==1 ? 'Aktif' : 'Non Aktif') : '-';
			$row[] = !empty($item->nm_kedudukan) ? $item->nm_kedudukan : '-';
			$row[] = !empty($item->no_sk_pns) ? $item->no_sk_pns : '-';
			$row[] = !empty($item->tanggallahir) ? date('d-m-Y',strtotime($tanggalmpp)) : '-';
			$row[] =  '-';
			$data[] = $row;
		endforeach;
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->laporan_model->count_all(),
			"recordsFiltered" => $this->laporan_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function daftar_nominatif_pns_akan_pensiun() {
		$list = $this->laporan_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item):
			$tanggalmpp = date('Y-m', strtotime('+55 year', strtotime($item->tanggallahir))); //tambah tanggal sebanyak 6 tahun
			$tanggalmpp = date('Y-m', strtotime('+1 month', strtotime($tanggalmpp))); //tambah tanggal sebanyak 6 tahun
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = !empty($item->nip) ? $item->nip : '-';
			$row[] = '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($item->nip).'">'.$item->gelardepan.''.$item->nama.''.$item->gelarbelakang.'</a>';
			$row[] = !empty($item->tanggallahir) ? date('d-m-Y',strtotime($item->tanggallahir)) : '-';
			$row[] = !empty($item->golongan) ? $item->golongan : '-' ;
			$row[] = !empty($item->nm_jabatan) ? $item->nm_jabatan : '-';
			$row[] = !empty($item->jenis_jabatan) ? $item->jenis_jabatan : '-';
			$row[] = !empty($item->mkg_tahun) ? $item->mkg_tahun : '-';
			$row[] = !empty($item->mkg_bulan) ? $item->mkg_bulan : '-';
			$row[] = '60';
			$row[] = !empty($item->tanggallahir) ? '01-'.date('m-Y',strtotime($tanggalmpp)) : '-';
			$row[] = !empty($item->nm_unitkerja) ? $item->nm_unitkerja : '-';
			$data[] = $row;
		endforeach;
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->laporan_model->count_all(),
			"recordsFiltered" => $this->laporan_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function daftar_nominatif_pns_mutasi() {
		$list = $this->laporan_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item):
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = !empty($item->nip) ? $item->nip : '-';
			$row[] = '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($item->nip).'">'.$item->gelardepan.''.$item->nama.''.$item->gelarbelakang.'</a>';
			$row[] = !empty($item->golongan) ? $item->golongan : '-' ;
			$row[] = !empty($item->tmt_pangkat) ? date('d-m-Y',strtotime($item->tmt_pangkat)) : '-';
			$row[] = !empty($item->nm_jabatan) ? $item->nm_jabatan : '-';
			$row[] = !empty($item->eselon) ? $item->eselon : '-';
			$row[] = !empty($item->tmt_jabatan) ? date('d-m-Y',strtotime($item->tmt_jabatan)) : '-';
			$row[] = !empty($item->jurusan) ? $item->jurusan : '-';
			$row[] = !empty($item->nm_jpendidikan) ? $item->nm_jpendidikan : '-';
			$row[] = !empty($item->nm_unitkerja) ? $item->nm_unitkerja : '-';
			$row[] = !empty($item->tmt_statuspns) ? date('d-m-Y',strtotime($item->tmt_statuspns)) : '-';
			$row[] = '-';
			$data[] = $row;
		endforeach;
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->laporan_model->count_all(),
			"recordsFiltered" => $this->laporan_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function daftar_nominatif_pns_s1() {
		$list = $this->laporan_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $item):
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = !empty($item->nip) ? $item->nip : '-';
			$row[] = '<a href="'.base_url().'admin/master_pegawai/detail_pegawai/'.encrypt_url($item->nip).'">'.$item->gelardepan.''.$item->nama.''.$item->gelarbelakang.'</a>';
			$row[] = !empty($item->golongan) ? $item->golongan : '-' ;
			$row[] = !empty($item->tmt_pangkat) ? date('d-m-Y',strtotime($item->tmt_pangkat)) : '-';
			$row[] = !empty($item->nm_jabatan) ? $item->nm_jabatan : '-';
			$row[] = !empty($item->eselon) ? $item->eselon : '-';
			$row[] = !empty($item->tmt_jabatan) ? date('d-m-Y',strtotime($item->tmt_jabatan)) : '-';
			$row[] = !empty($item->jurusan) ? $item->jurusan : '-';
			$row[] = !empty($item->nm_jpendidikan) ? $item->nm_jpendidikan : '-';
			$row[] = !empty($item->nm_unitkerja) ? $item->nm_unitkerja : '-';
			$row[] = !empty($item->tmt_statuspns) ? date('d-m-Y',strtotime($item->tmt_statuspns)) : '-';
			$row[] = '-';
			$data[] = $row;
		endforeach;
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->laporan_model->count_all(),
			"recordsFiltered" => $this->laporan_model->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function uri(){
		$data['uri1'] = $this->uri->segment(1);
      	$data['uri2'] = $this->uri->segment(2);
      	$data['uri3'] = $this->uri->segment(3);
      	$data['uri4'] = $this->uri->segment(4);
      	$data['uri5'] = $this->uri->segment(5);
      	return $data;
	}

	public function data_pilihan()
	{
        $data = $this->uri();
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
        $data['user'] = $this->user_model->getmodUser()->row_array();

		$this->load->view('admin/laporan/data_pilihan', $data);
	}

	public function pns($uri3='', $aksi='')
	{
        $data = $this->uri();
		$nip = $this->session->userdata('nip');
		$lvlid = $this->session->userdata('level_id');
		$this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$data['lvlid'] = $lvlid;
		$data['uk'] = $this->laporan_model->getmasterUnitkerja()->result_array();
		$data['gol'] = $this->laporan_model->getmasterGolongan()->result_array();

		$arrayUri = array('semua_pns','pns_aktif','pns_nonaktif','pns_titipan','pns_tugas_belajar','pns_mpp','pns_cltn','pns_keluar_berhenti','pns_diberhentikan_sementara');
		
		if(in_array($uri3, $arrayUri)):
			if($aksi=='cetak' || $aksi=='unduh'):
				if($lvlid > 2 &&  $lvlid < 5):
					$this->db->where('id_unitkerja', $this->session->userdata('skpd_id'));
					$skpd = $this->laporan_model->getmasterUnitkerja()->row_array();
					$data['skpd'] = $skpd['nm_unitkerja'];
				endif;
				if($uri3 == 'semua_pns'){
					$data['pns'] = $this->laporan_model->laporanTerbitpns($uri3, $lvlid)->result_array();
					$this->load->view('admin/laporan/pns/'.$aksi.'/page_'.$aksi.'_semua_pns', $data);
				}else{
					$data['pns'] = $this->laporan_model->laporanTerbitpns($uri3, $lvlid)->result_array();
					$this->load->view('admin/laporan/pns/'.$aksi.'/page_'.$aksi.'_'.$data['uri3'], $data);
				}
			else:
				$this->load->view('admin/laporan/pns/'.$uri3, $data);
			endif;
		else:
			redirect('admin/laporan/pns/semua_pns');
		endif;
	}

	public function search_pns($uri3)
	{
		$post = $this->input->post();
		$data = $this->uri();
		$nip = $this->session->userdata('nip');
		$lvlid = $this->session->userdata('level_id');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$data['lvlid'] = $lvlid;
		$data['uk'] = $this->laporan_model->getmasterUnitkerja()->result_array();
		$data['gol'] = $this->laporan_model->getmasterGolongan()->result_array();

		if(!empty($post['ukid'])):
			$data['uk_aktif'] = decrypt_url($post['ukid']);
			$this->load->view('admin/laporan/pns/'.$uri3, $data);
		elseif(!empty($post['golid'])):
			$data['gol_aktif'] = decrypt_url($post['golid']);
			$this->load->view('admin/laporan/pns/'.$uri3, $data);
		else:
			redirect('admin/laporan/pns/'.$uri3);
		endif;
	}

	public function kgb_terakhir($aksi='')
	{
		$post = $this->input->post();
		$data = $this->uri();
		$nip = $this->session->userdata('nip');
		$lvlid = $this->session->userdata('level_id');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$data['lvlid'] = $lvlid;
		$data['uk'] = $this->laporan_model->getmasterUnitkerja()->result_array();
		$data['gol'] = $this->laporan_model->getmasterGolongan()->result_array();

		if(!empty($post['ukid'])):
			$data['uk_aktif'] = decrypt_url($post['ukid']);
		endif;
		if(!empty($post['golid'])):
			$data['gol_aktif'] = decrypt_url($post['golid']);
		endif;
		if($aksi=='cetak' || $aksi=='unduh'):
			
			if($lvlid==1 || $lvlid==2):
				$this->db->order_by('tmt_kgb','desc');
				$this->db->where('status_pegawai',1);
			endif;
			if($lvlid > 2 && $lvlid < 5):
				$this->db->where(array('id_unitkerja'=> $this->session->userdata('skpd_id')));
				$skpd = $this->laporan_model->getmasterUnitkerja()->row_array();
				$data['skpd'] = $skpd['nm_unitkerja'];

				$this->db->order_by('tmt_kgb','desc');
				$this->db->where(array('status_pegawai'=>1, 'unitkerja_id'=>$this->session->userdata('skpd_id')));
			endif;
			$data['kgb'] = $this->laporan_model->getViewKGB()->result_array();
			$this->load->view('admin/laporan/kgb_terakhir_'.$aksi, $data);
		else:
			$this->load->view('admin/laporan/kgb_terakhir', $data);
		endif;
	}

	public function riwayat($uri3='', $aksi='')
	{
		$lvlid = $this->session->userdata('level_id');
		$post = $this->input->post();
        $data = $this->uri();
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$data['lvlid'] = $lvlid;
		$data['uk'] = $this->laporan_model->getmasterUnitkerja()->result_array();

		$arrayUri = array('riwayat_kepangkatan','riwayat_jabatan','riwayat_pendidikan','riwayat_diklat_struktural','riwayat_diklat_teknis_fungsional');
		if(!empty($post['ukid'])):
			$data['uk_aktif'] = decrypt_url($post['ukid']);
		endif;
		if(!empty($post['vamas'])):
			$data['vamas_aktif'] = decrypt_url($post['vamas']);
		endif;

		if(in_array($uri3, $arrayUri)):
			if($lvlid==1 || $lvlid==2 ):
				$this->db->where(array('moi.status_pegawai'=> 1));
			endif;
			if($lvlid > 2 &&  $lvlid < 5):
				$this->db->where('id_unitkerja', $this->session->userdata('skpd_id'));
				$skpd = $this->laporan_model->getmasterUnitkerja()->row_array();
				$data['skpd'] = $skpd['nm_unitkerja'];
				$this->db->where(array('moi.status_pegawai'=> 1, 'mod.unitkerja_id'=>$this->session->userdata('skpd_id')));
			endif;
			if($uri3=='riwayat_kepangkatan'):
				$data['modpangkat'] = $this->laporan_model->getModpangkat()->result_array();
				if(!empty($post['mpangkat'])):
					$data['mpangkat_aktif'] = decrypt_url($post['mpangkat']);
				endif;
				$data['gol'] = $this->laporan_model->getmasterGolongan()->result_array();
				$data['mpangkat'] = $this->laporan_model->getmasterKepangkatan()->result_array();
			elseif($uri3=='riwayat_jabatan'):
				$data['modjabatan'] = $this->laporan_model->getModjabatan()->result_array();
				if(!empty($post['jenis'])):
					$data['jenis_aktif'] = decrypt_url($post['jenis']);
				endif;
				if(!empty($post['jenjang'])):
					$data['jenjang_aktif'] = decrypt_url($post['jenjang']);
				endif;
				$data['esel'] = $this->laporan_model->getmasterEselon()->result_array();
				$data['jenis'] = $this->laporan_model->getmasterJenisjabatan()->result_array();
				$data['jenjang'] = $this->laporan_model->getmasterJenjangjabatan()->result_array();
			elseif($uri3=='riwayat_pendidikan'):
				$data['modpendidikan'] = $this->laporan_model->getModpendidikan()->result_array();
				if(!empty($post['jedu'])):
					$data['jedu_aktif'] = $post['jedu'];
				endif;
				$data['edu'] = $this->laporan_model->getmasterPendidikan()->result_array();
			elseif($uri3=='riwayat_diklat_struktural'):
				$data['moddiklatstruktur'] = $this->laporan_model->getModdiklatStruktural()->result_array();
				$data['distruk'] = $this->laporan_model->getmasterJenisdiklat()->result_array();
			elseif($uri3=='riwayat_diklat_teknis_fungsional'):
				$data['moddiklatfungsional'] = $this->laporan_model->getModdiklatFungsional()->result_array();
				$data['difungsi'] = $this->laporan_model->getmasterDikfungsional()->result_array();
			else:
				$data['gol'] = $this->laporan_model->getmasterGolongan()->result_array();
			endif;
			if(!empty($aksi) && $aksi=='cetak'):
				$this->load->view('admin/laporan/riwayat/'.$aksi.'/'.$uri3.'_'.$aksi, $data);
			elseif(!empty($aksi) && $aksi=='unduh'):
				$this->load->view('admin/laporan/riwayat/'.$aksi.'/riwayat_'.$aksi, $data);
			else:
				$this->load->view('admin/laporan/riwayat/'.$uri3, $data);
			endif;
		else:
			$this->load->view('admin/laporan/riwayat/riwayat_kepangkatan', $data);
		endif;
	}

	public function daftar_nominatif($uri3='')
	{
		$lvlid = $this->session->userdata('level_id');
		$post = $this->input->post();
        $data = $this->uri();
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$data['lvlid'] = $lvlid;
		$data['uk'] = $this->laporan_model->getmasterUnitkerja()->result_array();

		if(!empty($post['ukid'])):
			$data['uk_aktif'] = decrypt_url($post['ukid']);
		endif;
		if(!empty($post['vamas'])):
			$data['vamas_aktif'] = decrypt_url($post['vamas']);
		endif;
		
		$arrayUri = array('duk','cpns','pns_mpp','pns_akan_pensiun','mutasi_keluar_daerah','pns_pendidikan','pns_yang_memperoleh_kgb','pns_kenaikan_pangkat','pns_hukuman_disiplin','pns_hukuman_disiplin_per_jenis_hukuman','pns_yang_mendapat_reward');
		if(in_array($uri3, $arrayUri)):
			if($uri3=='duk'):
				$data['gol'] = $this->laporan_model->getmasterGolongan()->result_array();
			endif;
			if($uri3=='cpns'):
				$data['gol'] = $this->laporan_model->getmasterGolongan()->result_array();
			endif;
			if($uri3=='pns_mpp'):
				$data['gol'] = $this->laporan_model->getmasterGolongan()->result_array();
			endif;
			if($uri3=='pns_akan_pensiun'):
				$data['gol'] = $this->laporan_model->getmasterGolongan()->result_array();
			endif;
			if($uri3=='pns_pendidikan'):
				$data['gol'] = $this->laporan_model->getmasterGolongan()->result_array();
				$data['edu'] = $this->laporan_model->getmasterPendidikan()->result_array();
				if(!empty($post['jedu'])):
					$data['jedu_aktif'] = decrypt_url($post['jedu']);
				endif;
			endif;
			$this->load->view('admin/laporan/daftar_nominatif/'.$uri3, $data);
		else:
			$this->load->view('admin/laporan/daftar_nominatif/duk', $data);
		endif;
	}

	public function rekapitulasi($uri3='')
	{
        $data = $this->uri();
		$lvl = $this->session->userdata('level_id');
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$arrayUri = array('golongan','pendidikan','jabatan','eselon','agama','masa_kerja','kelompok_usia','abk');

		if(in_array($uri3, $arrayUri)):
			$data['rekapitulasi'] = $this->laporan_model->getRekapitulasi($uri3);
			$this->load->view('admin/laporan/rekapitulasi/'.$uri3, $data);
		else:
			$this->load->view('admin/laporan/rekapitulasi/golongan', $data);
		endif;
	}

	public function tes()
	{
		$tglawal = date('Y-m-d');
		$tanggalatas = date('Y-m', strtotime('-60 year', strtotime($tglawal))); //tambah tanggal sebanyak 6 tahun
		$tanggalatas = date('Y-m', strtotime('+1 month', strtotime($tanggalatas))); //tambah tanggal sebanyak 6 tahun
		$tanggalbawah = date('Y-m', strtotime('-59 year', strtotime($tglawal))); //tambah tanggal sebanyak 6 tahun
		$tanggalbawah = date('Y-m', strtotime('+1 month', strtotime($tanggalbawah))); //tambah tanggal sebanyak 6 tahun

		$tanggalbawah = date('Y-m', strtotime('-59 year', strtotime($tglawal))); //tambah tanggal sebanyak 6 tahun
		$tanggalbawah = date('Y-m', strtotime('+1 month', strtotime($tanggalbawah))); //tambah tanggal sebanyak 6 tahun
		// echo $tanggalselisih;
		$this->db->select('tanggallahir')->where(array('status_pegawai' =>1 , 'tanggallahir >=' => $tanggalatas.'-01', 'tanggallahir <' => $tanggalbawah.'-01'));
		$data = $this->db->get('view_asn')->result_array();
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}
}
