<?php

defined('BASEPATH') or exit('No direct script access allowed');

class E_arsip extends CI_Controller
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
        $this->load->model('asn/earsip_model');
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
        $data['idnt'] = $this->earsip_model->getmodIdentitasTinjauan()->row_array();

        $this->db->where('nip', $sesi_nip);
        $data['idn'] = $this->earsip_model->getmodIdentitas()->row_array();

        if((!empty($data['idnt']['status_pegawai']) && $data['idnt']['status_pegawai']==1) || (!empty($data['idn']['status_pegawai']) && $data['idn']['status_pegawai']==1)):
            $file_identitas = array('karpeg','npwp','nuptk','bpjs','taspen','sertifikasi','kariskarsu','kpe');
        else:
            $file_identitas = array('karpeg','npwp','nuptk','bpjs','taspen','sertifikasi','kariskarsu','kpe','sk_pnsnonaktif');
        endif;


        $file_dtpribadi = array('ktp');
        $file_cpns = array('sk', 'spmt');
        $file_pns = array('sk', 'sttpl');

        // $file_modul = array('identitas'=>$file_identitas, 'cpns'=>$file_cpns, 'pns'=>$file_pns);

        // foreach($file_modul as $key=>$val):
        //     $this->db->where('nip', $sesi_nip);
        //     $modul = $this->earsip_model->getModul($key)->row_array();
        //     $this->db->where('nip', $sesi_nip);
        //     $modult = $this->earsip_model->getModulTinjauan($key)->row_array();
        //     foreach($val as $fm):
        //         $status = !empty($modult['file_'.$fm]) ? $modult['file_'.$fm] : (!empty($modul['file_'.$fm]) ? $modul['file_'.$fm] : 'Belum Ada');
        //         $validasi = !empty($modult['file_'.$fm]) ? 2 : (!empty($modul['file_'.$fm]) ? 1 : 3);
        //         $descvalidasi = !empty($modult['file_'.$fm]) ? 'Proses Validasi File' : (!empty($modul['file_'.$fm]) ? 'File telah Tervalidasi' : 'File Belum Terupload');
        //         if($modult):
        //             $val_file[] = array(
        //                 'nip' => $sesi_nip,
        //                 'nipp' => $modult['nip'],
        //                 'nama_dok' => $fm,
        //                 'induk_data' => $key,
        //                 'status' => $status,
        //                 'validasi' => $validasi,
        //                 'descvalidasi' => $descvalidasi,
        //                 'nm_file' => $modult['file_'.$fm]
        //             );
        //         else:
        //             $val_file[] = array(
        //                 'nip' => null,
        //                 'nipp' => null,
        //                 'nama_dok' =>$fm,
        //                 'induk_data' => $key,
        //                 'status' => $status,
        //                 'validasi' => $validasi,
        //                 'descvalidasi' => $descvalidasi,
        //                 'nm_file' => null
        //             );
        //         endif;
        //     endforeach;
        // endforeach;

        foreach($file_dtpribadi as $dp):
            $this->db->where('nip', $sesi_nip);
            $data['dpt'] = $this->earsip_model->getmodDtpribadiTinjauan()->row_array();

            $this->db->where('nip', $sesi_nip);
            $data['dp'] = $this->earsip_model->getmodDtpribadi()->row_array();

            $statusdp =   !empty($data['dpt']['nip']) && !empty($data['dpt']['file_'.$dp]) && file_exists('assets/asn/dokumen/arsip/'.$data['dpt']['file_'.$dp]) ? 
                        $data['dpt']['file_'.$dp] : (!empty($data['dp']['file_'.$dp]) && file_exists('assets/asn/dokumen/arsip/'.$data['dp']['file_'.$dp]) ? 
                        $data['dp']['file_'.$dp] : 'Belum Ada');
            $validasidp = !empty($data['dpt']['nip']) && !empty($data['dpt']['file_'.$dp]) ? 2 : (!empty($data['dp']['file_'.$dp]) ? 1 : 3);
            $descvalidasidp = !empty($data['dpt']['nip']) && !empty($data['dpt']['file_'.$dp]) ? ($data['dpt']['validator_moddp']==2 ? 'Validasi Admin BKPSDM' : 'Validasi admin OPD') : (!empty($data['dp']['file_'.$dp]) ? 'File telah Tervalidasi' : 'File Belum Terupload');
            if($data['dpt']):
                $data_pribadi[] = array(
                    'nip' => $sesi_nip,
                    'nama_dok' => $dp,
                    'induk_data' => 'data_pribadi',
                    'status' => $statusdp,
                    'validasi' => $validasidp,
                    'descvalidasi' => $descvalidasidp,
                    'nm_file' => $data['dpt']['file_'.$dp]
                );
            else:
                $data_pribadi[] = array(
                    'nip' => $sesi_nip,
                    'nama_dok' =>$dp,
                    'induk_data' => 'data_pribadi',
                    'status' => $statusdp,
                    'validasi' => $validasidp,
                    'descvalidasi' => $descvalidasidp,
                    'nm_file' => null
                );
            endif;
        endforeach;

        foreach($file_identitas as $fi):

            $status =   !empty($data['idnt']['nip']) && !empty($data['idnt']['file_'.$fi]) && file_exists('assets/asn/dokumen/arsip/'.$data['idnt']['file_'.$fi]) ? 
                        $data['idnt']['file_'.$fi] : (!empty($data['idn']['file_'.$fi]) && file_exists('assets/asn/dokumen/arsip/'.$data['idn']['file_'.$fi]) ? 
                        $data['idn']['file_'.$fi] : 'Belum Ada');
            $validasi = !empty($data['idnt']['nip']) && !empty($data['idnt']['file_'.$fi]) ? 2 : (!empty($data['idn']['file_'.$fi]) ? 1 : 3);
            $descvalidasi = !empty($data['idnt']['nip']) && !empty($data['idnt']['file_'.$fi]) ? ($data['idnt']['validator_modidpt']==2 ? 'Validasi Admin BKPSDM' : 'Validasi admin OPD') : (!empty($data['idn']['file_'.$fi]) ? 'File telah Tervalidasi' : 'File Belum Terupload');
            if($data['idnt']):
                $data_identitas[] = array(
                    'nip' => $sesi_nip,
                    'nama_dok' => $fi,
                    'induk_data' => 'identitas',
                    'status' => $status,
                    'validasi' => $validasi,
                    'descvalidasi' => $descvalidasi,
                    'nm_file' => $data['idnt']['file_'.$fi]
                );
            else:
                $data_identitas[] = array(
                    'nip' => $sesi_nip,
                    'nama_dok' =>$fi,
                    'induk_data' => 'identitas',
                    'status' => $status,
                    'validasi' => $validasi,
                    'descvalidasi' => $descvalidasi,
                    'nm_file' => null
                );
            endif;
        endforeach;

        foreach($file_cpns as $cp):
            $this->db->where('nip', $sesi_nip);
            $data['cpnss'] = $this->earsip_model->getmodCpns()->row_array();
            $this->db->where('nip', $sesi_nip);
            $data['cpnst'] = $this->earsip_model->getmodCpnsTinjauan()->row_array();
             
            $statuscpns= !empty($data['cpnst']['nip']) && !empty($data['cpnst']['file_'.$cp]) && file_exists('assets/asn/dokumen/arsip/'.$data['cpnst']['file_'.$cp]) ? 
                        $data['cpnst']['file_'.$cp] : (!empty($data['cpnss']['file_'.$cp]) && file_exists('assets/asn/dokumen/arsip/'.$data['cpnss']['file_'.$cp]) ? 
                        $data['cpnss']['file_'.$cp] : 'Belum Ada');
            $validasicpns = !empty($data['cpnst']['file_'.$cp]) ? 2 : (isset($data['cpnss']['file_'.$cp]) ? 1 : 3);
            $descvalidasicpns = !empty($data['cpnst']['file_'.$cp]) ? ($data['cpnst']['validator_modcpns']==2 ? 'Validasi Admin BKPSDM' : 'Validasi admin OPD') : (!empty($data['cpnss']['file_'.$cp]) ? 'File telah Tervalidasi' : 'File Belum Terupload');
            if($data['cpnst']):
                $data_cpns[] = array(
                    'nip' => $sesi_nip,
                    'nama_dok' => $cp,
                    'induk_data' => 'cpns',
                    'status' => $statuscpns,
                    'validasi' => $validasicpns,
                    'descvalidasi' => $descvalidasicpns,
                    'nm_file' => $data['cpnst']['file_'.$cp]
                );
            else:
                $data_cpns[] = array(
                    'nip' => $sesi_nip,
                    'nama_dok' =>$cp,
                    'induk_data' => 'cpns',
                    'status' => $statuscpns,
                    'validasi' => $validasicpns,
                    'descvalidasi' => $descvalidasicpns,
                    'nm_file' => null
                );
            endif;
        endforeach;

        foreach($file_pns as $p):
            $this->db->where('nip', $sesi_nip);
            $data['pnss'] = $this->earsip_model->getmodPns()->row_array();
            $this->db->where('nip', $sesi_nip);
            $data['pnst'] = $this->earsip_model->getmodPnsTinjauan()->row_array();
            
            $statuspns = !empty($data['pnst']['nip']) && !empty($data['pnst']['file_'.$p]) && file_exists('assets/asn/dokumen/arsip/'.$data['pnst']['file_'.$p]) ? 
                        $data['pnst']['file_'.$p] : (!empty($data['pnss']['file_'.$p]) && file_exists('assets/asn/dokumen/arsip/'.$data['pnss']['file_'.$p]) ? 
                        $data['pnss']['file_'.$p] : 'Belum Ada');
            $descvalidasipns = !empty($data['pnst']['file_'.$p]) ? ($data['pnst']['validator_modpns']==2 ? 'Validasi Admin BKPSDM' : 'Validasi admin OPD') : (!empty($data['pnss']['file_'.$p]) ? 'File telah Tervalidasi' : 'File Belum Terupload');
            if($data['cpnst']):
                $data_pns[] = array(
                    'nip' => $sesi_nip,
                    'nama_dok' => $p,
                    'induk_data' => 'pns',
                    'status' => $statuspns,
                    'descvalidasi' => $descvalidasipns
                );
            else:
                $data_pns[] = array(
                    'nip' => $sesi_nip,
                    'nama_dok' =>$p,
                    'induk_data' => 'pns',
                    'status' => $statuspns,
                    'descvalidasi' => $descvalidasipns
                );
            endif;
        endforeach;
        
        $data['data_pribadi'] = $data_pribadi;
        $data['identitas'] = $data_identitas;
        $data['cpns'] = $data_cpns;
        $data['pns'] = $data_pns;

        $this->db->where('nip', $sesi_nip);
        $data['jabatan'] = $jabatan = $this->earsip_model->getmodJabatan()->result_array();

        $this->db->where('nip', $sesi_nip);
        $data['pangkat'] = $pangkat =$this->earsip_model->getmodPangkat()->result_array();

        $this->db->where('nip', $sesi_nip);
        $data['pendidikan'] = $pendidikan = $this->earsip_model->getmodPendidikan()->result_array();

        $this->db->where('nip', $sesi_nip);
        $data['diklat'] = $diklat = $this->earsip_model->getmodDiklat()->result_array();

        $this->db->where('nip', $sesi_nip);
        $data['seminar'] = $seminar = $this->earsip_model->getmodSeminar()->result_array();

        $this->db->where('nip', $sesi_nip);
        $data['hukuman'] = $hukuman = $this->earsip_model->getmodHukuman()->result_array();

        $this->db->where('nip', $sesi_nip);
        $data['kgb'] = $kgb = $this->earsip_model->getmodKgb()->result_array();

        $this->db->where('nip', $sesi_nip);
        $data['kredit'] = $kredit = $this->earsip_model->getmodKredit()->result_array();

        $this->db->where('nip', $sesi_nip);
        $data['penghargaan'] = $penghargaan = $this->earsip_model->getmodPenghargaan()->result_array();

        $this->db->where('nip', $sesi_nip);
        $data['cuti'] = $cuti = $this->earsip_model->getmodCuti()->result_array();

        $data['kjpendidikan'] = array_column($this->earsip_model->getmasterJPendidikan()->result_array(), 'nm_jpendidikan', 'id_jpendidikan');

        foreach($pangkat as $p){
            $status = !empty($p['file_sk_pangkat']) && file_exists('assets/asn/dokumen/arsip/'.$p['file_sk_pangkat']) ? $p['file_sk_pangkat'] : 'Belum upload file';
            if(!empty($p['nip'])){
                if($p['status_aktif']==0){
                    if($p['status_validasi_modpangkat']==1){
                        if($p['validator_modpangkat']==2){$valid = 'Tahap Validasi BKPSDM';}else{$valid = 'Tahap Validasi OPD';}
                    }else{
                        if($p['validator_modpangkat']==2){$valid = 'Gagala Validasi BKPSDM';}else{$valid = 'Gagala Validasi OPD';}
                    }
                }elseif($p['status_aktif']==1){
                    if($p['status_validasi_modpangkat']==1){
                        if($p['validator_modpangkat']==2){$valid = 'File Tervalidasi';}else{$valid = 'Belum Upload File';}
                    }else{
                        $valid = 'Belum Upload File';
                    }
                }else{
                    $valid = 'Belum Upload File';
                }
            }else{
                $valid = null;
            }

            if(count($pangkat) > 0){
                $data_pangkat[] = array(
                    'jenis_dokumen'=>'SK Pangkat',
                    'nama_dok' => 'sk_pangkat',
                    'induk_data'=>'pangkat',
                    'status'=>$status,
                    'validasi'=>$valid,
                    'status_validasi' => $p['status_validasi_modpangkat'],
                    'validator' =>  $p['validator_modpangkat']
                );
            }else{
                $data_pangkat[] = array(
                    'jenis_dokumen'=>'SK Pangkat',
                    'nama_dok' => 'sk_pangkat',
                    'induk_data'=>'pangkat',
                    'status'=>$status,
                    'validasi'=>$valid,
                    'status_validasi' => null,
                    'validator' =>  null
                );
            }
        }

        foreach($pendidikan as $p){
            $status = !empty($p['file_ijazah_pendidikan']) && file_exists('assets/asn/dokumen/arsip/'.$p['file_ijazah_pendidikan']) ? $p['file_ijazah_pendidikan'] : 'Belum upload file';
            if(!empty($p['nip'])){
                if($p['status_aktif']==0){
                    if($p['status_validasi_modpendidikan']==1){
                        if($p['validator_modpendidikan']==2){$valid = 'Tahap Validasi BKPSDM';}else{$valid = 'Tahap Validasi OPD';}
                    }else{
                        if($p['validator_modpendidikan']==2){$valid = 'Gagala Validasi BKPSDM';}else{$valid = 'Gagala Validasi OPD';}
                    }
                }elseif($p['status_aktif']==1){
                    if($p['status_validasi_modpendidikan']==1){
                        if($p['validator_modpendidikan']==2){$valid = 'File Tervalidasi';}else{$valid = 'Belum Upload File';}
                    }else{
                        $valid = 'Belum Upload File';
                    }
                }else{
                    $valid = 'Belum Upload File';
                }
            }else{
                $valid = null;
            }

            if(count($pendidikan) > 0){
                $data_pendidikan[] = array(
                    'jenis_dokumen'=>'Ijazah Pendidikan',
                    'nama_dok' => 'ijazah_pendidikan',
                    'induk_data'=>'pendidikan',
                    'status'=>$status,
                    'validasi'=>$valid,
                    'status_validasi' => $p['status_validasi_modpendidikan'],
                    'validator' =>  $p['validator_modpendidikan']
                );
            }else{
                $data_pendidikan[] = array(
                    'jenis_dokumen'=>'Ijazah Pendidikan',
                    'nama_dok' => 'ijazah_pendidikan',
                    'induk_data'=>'pendidikan',
                    'status'=>$status,
                    'validasi'=>$valid,
                    'status_validasi' => null,
                    'validator' =>  null
                );
            }
        }

		$this->load->view('asn/e_arsip/arsip', $data);
    }

    public function update_file_arsip($aksi, $induk, $dok)
    {
        $post = $this->input->post();
        $nip = $this->session->userdata('nip');

        $config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
		$config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = 500;
        $config['overwrite'] = TRUE;
		$config['file_name'] = $post['filetx_'.$dok].'_'.$nip;
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		
		$update = $this->earsip_model->updatefileArsip($aksi, $induk, $dok, $config, $nip);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('e_arsip');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Pastikan ukuran dan jenis file sesuai persyaratan.</div>');
            redirect('e_arsip');
        endif;
    }

    public function update_filearsip_riwayat($induk, $nmf, $id)
    {
        $post = $this->input->post();
        $nip = $this->session->userdata('nip');

        $skt = array('pangkat'=>'pkt', 'jabatan'=>'jbt', 'pendidikan'=>'pdk','diklat'=>'dkt', 'seminar'=>'smr', 'hukuman'=>'huk', 'kgb'=>'kgb', );

        $config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
		$config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
		$config['max_size'] = 500;
		$config['file_name'] = $nip.'_'.$nmf.'_'.$skt[$induk].'_'.$post['filex_'.$nmf.$induk];
		// $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		

		$update = $this->earsip_model->updatefileArsipRiwayat($induk, $nmf, $config, $nip, $id);
		if($update):
			// $activity = 'Permohonan update data'.$post['nama'].' ('.$post['nip'].')';
			// $this->pegawai_model->log_user($activity);
        	$this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Berhasil! </strong> Permohonan update data anda telah terinput.</div>');
            redirect('e_arsip');	
        else:
        	$this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Pastikan ukuran dan jenis file sesuai persyaratan.</div>');
            redirect('e_arsip');
        endif;
    }
}