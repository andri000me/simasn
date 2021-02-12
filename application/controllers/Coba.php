<?php defined('BASEPATH') OR exit('No direct script access allowed');
//PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Coba extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // load model
        // $this->load->model('Coba', 'coba');
        // date_default_timezone_set($this->set_apk()['timezone']);
		// if($this->session->userdata('login') == FALSE){
		// 	redirect('login');
        // }
        $this->load->model('user_model');
        $this->load->model('asn/earsip_model');
        $this->load->model('admin/validasi_model');
        $this->load->model('admin/laporan_model');
    }

    private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }

    public function uri(){
		$data['uri1'] = $this->uri->segment(1);
      	$data['uri2'] = $this->uri->segment(2);
      	$data['uri3'] = $this->uri->segment(3);
      	$data['uri4'] = $this->uri->segment(4);
      	$data['uri5'] = $this->uri->segment(5);
      	return $data;
	}

 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('coba', $data);
    }
    // get employee list
    public function employeeList() {
        $this->db->select(array('e.id', 'e.nama', 'e.email', 'e.mobile'));
        $this->db->from('coba as e');
        $query = $this->db->get();
        return $query->result_array();
    }

    // index
    public function import()
    {
        $data = array();
        // $data['title'] = 'Import Excel Sheet | TechArise';
        // $data['breadcrumbs'] = array('Home' => '#');
        $data['setting'] = $this->set_apk();
		$data['identitas_desa'] = $this->db->get('identitas_desa',1)->row();
        $this->load->view('coba/coba_import', $data);
    }

    // file upload functionality
    public function upload() {
        // $data = array();
        // $data['title'] = 'Import Excel Sheet | TechArise';
        // $data['breadcrumbs'] = array('Home' => '#');
        $data['setting'] = $this->set_apk();
		$data['identitas_desa'] = $this->db->get('identitas_desa',1)->row();
         // Load form validation library
         $this->load->library('form_validation');
         $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
         if($this->form_validation->run() == false) {
            $this->load->view('coba/_import', $data);
         } else {
            // If file uploaded
            if(!empty($_FILES['fileURL']['name'])) { 
                // get file extension
                $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

                if($extension == 'csv'){
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } elseif($extension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }
                // file path
                $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            
                // array Count
                $arrayCount = count($allDataInSheet);
                $flag = 0;
                $createArray = array('Nama', 'Email', 'Mobile');
                $makeArray = array('Nama' => 'Nama', 'Email' => 'Email', 'Mobile' => 'Mobile');
                $SheetDataKey = array();
                foreach ($allDataInSheet as $dataInSheet) {
                    foreach ($dataInSheet as $key => $value) {
                        if (in_array(trim($value), $createArray)) {
                            $value = preg_replace('/\s+/', '', $value);
                            $SheetDataKey[trim($value)] = $key;
                        } 
                    }
                }
                $dataDiff = array_diff_key($makeArray, $SheetDataKey);
                if (empty($dataDiff)) {
                    $flag = 1;
                }
                // match excel sheet column
                if ($flag == 1) {
                    for ($i = 2; $i <= $arrayCount; $i++) {
                        $addresses = array();
                        $nama = $SheetDataKey['Nama'];
                        $email = $SheetDataKey['Email'];
                        $mobile = $SheetDataKey['Mobile'];

                        $nama = filter_var(trim($allDataInSheet[$i][$nama]), FILTER_SANITIZE_STRING);
                        $email = filter_var(trim($allDataInSheet[$i][$email]), FILTER_SANITIZE_EMAIL);
                        $mobile = filter_var(trim($allDataInSheet[$i][$mobile]), FILTER_SANITIZE_STRING);
                        $fetchData[] = array('nama' => $nama, 'email' => $email, 'mobile' => $mobile);
                    }   
                    $data['dataInfo'] = $fetchData;
                    $this->setBatchImport($fetchData);
                    $this->importData();
                } else {
                    echo "Please import correct file, did not match excel sheet column";
                }
                $this->load->view('coba/coba_import', $data);
            }              
        }
    }

    // checkFileValidation
    public function checkFileValidation($string) {
      $file_mimes = array('text/x-comma-separated-values', 
        'text/comma-separated-values', 
        'application/octet-stream', 
        'application/vnd.ms-excel', 
        'application/x-csv', 
        'text/x-csv', 
        'text/csv', 
        'application/csv', 
        'application/excel', 
        'application/vnd.msexcel', 
        'text/plain', 
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
      );
      if(isset($_FILES['fileURL']['name'])) {
            $arr_file = explode('.', $_FILES['fileURL']['name']);
            $extension = end($arr_file);
            if(($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)){
                return true;
            }else{
                $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
            return false;
        }
    }

    public function set_apk(){
		$sa = $this->db->get('setting_aplikasi')->result_array();
		$setting = array_column($sa, 'value', 'key');
		return $setting;
    }
    
    public function try()
    {
        $this->db->select('*');
        $this->db->from('view_identitas vi');
        $this->db->join('mod_datapribadi dp', 'dp.nip = vi.nip', 'left');
        $dtpribadi = $this->db->get()->result_array();
        foreach($dtpribadi as $dp):
            if($dp['notlpx']=="-" || $dp['notlpx']==""):
                echo "null<br>";
            else:
                echo "'".$dp['notlpx']."<br>";
            endif;
        endforeach;
    }

    public function datapribadi()
    {
        $this->db->select('vi.*, dp.niplama, mu.nm_unitkerja');
        $this->db->from('view_identitas vi');
        $this->db->join('mod_datapribadi dp', 'dp.nip = vi.nip', 'left');
        $this->db->join('master_unitkerja mu', 'mu.kd_unitkerja = vi.kd_unitkerja', 'left');
        $dtpribadi = $this->db->get()->result_array();
        echo "<table>";
        foreach($dtpribadi as $dp):
            !empty($dp['nm_unitkerja']) ? $nmunit = $dp['nm_unitkerja'] : $nmunit = 'null';
            !empty($dp['nama_lengkap']) ? $nmlkp = $dp['nama_lengkap'] : $nmlkp = 'null';
            !empty($dp['niplama']) ? $nipl = $dp['niplama'] : $nipl = 'null';
            $num = $nipl;

            $format = '%s';
            echo "<tr>";
            echo "<td>'".$dp['nip']."</td>";
            echo "<td>".ucwords($nipl)."</td>";
            echo "<td>".ucwords($nmlkp)."</td>";
            echo "<td>".ucwords(sprintf($format, $num))."</td>";
            echo "</tr>";
        endforeach;
        echo "</table>";
    }

    public function cpns()
	{
		$this->db->select('dp.*, cp.tmt_cpns,cp.masa_kerja_golongan_bulan, cp.masa_kerja_golongan_tahun, cp.no_bkn, cp.kd_pengadaan, cp.tgl_bkn, cp.sk_pejabat, cp.sk_nomor, cp.sk_tanggal, cp.spmt_nomor, cp.spmt_tanggal');
        $this->db->from('mod_datapribadi dp');
        $this->db->join('mod_cpns cp', 'cp.nip = dp.nip', 'left');
        $dtcpns = $this->db->get()->result_array();
        echo "<table>";
        foreach($dtcpns as $cp):
            !empty($cp['tmt_cpns']) ? $tmtcp = date('Y-m-d', strtotime($cp['tmt_cpns'])) : $tmtcp = 'null';
            !empty($cp['tgl_bkn']) ? $tglbkn = date('Y-m-d', strtotime($cp['tgl_bkn'])) : $tglbkn = 'null';
            !empty($cp['sk_tanggal']) ? $tglsk = date('Y-m-d', strtotime($cp['sk_tanggal'])) : $tglsk = 'null';
            !empty($cp['spmt_tanggal']) ? $tglspmt = date('Y-m-d', strtotime($cp['spmt_tanggal'])) : $tglspmt = 'null';

            echo "<tr>";
            echo "<td>".$cp['nip']."</td>";
            echo "<td>".$cp['nama']."</td>";
            echo "<td>".$tmtcp."</td>";
            echo "<td>".$cp['masa_kerja_golongan_bulan']."</td>";
            echo "<td>".$cp['masa_kerja_golongan_tahun']."</td>";
            echo "<td>".$cp['kd_pengadaan']."</td>";
            echo "<td>".$cp['no_bkn']."</td>";
            echo "<td>".$tglbkn."</td>";
            echo "<td>".$cp['sk_pejabat']."</td>";
            echo "<td>".$cp['sk_nomor']."</td>";
            echo "<td>".$tglsk."</td>";
            echo "<td>".$cp['spmt_nomor']."</td>";
            echo "<td>".$tglspmt."</td>";
            echo "</tr>";
        endforeach;
        echo "</table>";
    }
    
    public function fisik()
    {
        $this->db->select('dp.nip, dp.nama, fi.goldarah, fi.tinggi, fi.berat, fi.cacat, fi.nosepatu, fi.nobaju, fi.update, fi.kondisi_fisik');
        $this->db->from('mod_datapribadi dp');
        $this->db->join('mod_fisik fi', 'fi.nip = dp.nip', 'left');
        $dtfisik = $this->db->get()->result_array();
        echo "<table>";
        foreach($dtfisik as $fi):

            echo "<tr>";
            echo "<td>".$fi['nip']."</td>";
            echo "<td>".$fi['nama']."</td>";
            echo "<td>".$fi['goldarah']."</td>";
            echo "<td>".$fi['tinggi']."</td>";
            echo "<td>".$fi['berat']."</td>";
            echo "<td>".$fi['cacat']."</td>";
            echo "<td>".$fi['nosepatu']."</td>";
            echo "<td>".$fi['nobaju']."</td>";
            echo "<td>".$fi['update']."</td>";
            echo "<td>".$fi['kondisi_fisik']."</td>";
            echo "</tr>";
        endforeach;
        echo "</table>";
    }

    public function pns()
	{
		$this->db->select('dp.*, cp.tmt_pns,cp.masa_kerja_golongan_bulan, cp.masa_kerja_golongan_tahun, cp.no_bkn, cp.tgl_bkn, cp.sk_pejabat, cp.sk_nomor, cp.sk_tanggal, cp.sttpl_nomor, cp.sttpl_tanggal, cp.nomor_kdokter, cp.tanggal_kdokter');
        $this->db->from('mod_datapribadi dp');
        $this->db->join('mod_pns cp', 'cp.nip = dp.nip', 'left');
        $dtpns = $this->db->get()->result_array();
        echo "<table>";
        foreach($dtpns as $cp):
            !empty($cp['tmt_pns']) ? $tmtcp = date('Y-m-d', strtotime($cp['tmt_pns'])) : $tmtcp = 'null';
            !empty($cp['tgl_bkn']) ? $tglbkn = date('Y-m-d', strtotime($cp['tgl_bkn'])) : $tglbkn = 'null';
            !empty($cp['sk_tanggal']) ? $tglsk = date('Y-m-d', strtotime($cp['sk_tanggal'])) : $tglsk = 'null';
            !empty($cp['sttpl_tanggal']) ? $tglsttpl = date('Y-m-d', strtotime($cp['sttpl_tanggal'])) : $tglsttpl = 'null';
            !empty($cp['tanggal_kdokter']) ? $tglkdokter = date('Y-m-d', strtotime($cp['tanggal_kdokter'])) : $tglkdokter = 'null';

            echo "<tr>";
            echo "<td>".$cp['nip']."</td>";
            echo "<td>".$cp['nama']."</td>";
            echo "<td>".$tmtcp."</td>";
            echo "<td>".$cp['masa_kerja_golongan_bulan']."</td>";
            echo "<td>".$cp['masa_kerja_golongan_tahun']."</td>";
            echo "<td>".$cp['no_bkn']."</td>";
            echo "<td>".$tglbkn."</td>";
            echo "<td>".$cp['sk_pejabat']."</td>";
            echo "<td>".$cp['sk_nomor']."</td>";
            echo "<td>".$tglsk."</td>";
            echo "<td>".$cp['sttpl_nomor']."</td>";
            echo "<td>".$tglsttpl."</td>";
            echo "<td>".$cp['nomor_kdokter']."</td>";
            echo "<td>".$tglkdokter."</td>";
            echo "</tr>";
        endforeach;
        echo "</table>";
    }

    public function jabatan()
	{
		$this->db->select('jb.nip, jb.kd_jabatan, mj.nm_jabatan');
        $this->db->from('mod_jabatan jb');
        $this->db->join('master_jabatan mj', 'mj.kd_jabatan = jb.kd_jabatan', 'left');
        $dtjabatan = $this->db->get()->result_array();
        echo "<table>";
        foreach($dtjabatan as $jb):
            echo "<tr>";
            echo "<td>".$jb['nip']."</td>";
            echo "<td>".$jb['kd_jabatan']."</td>";
            echo "<td>".$jb['nm_jabatan']."</td>";
            echo "</tr>";
        endforeach;
        echo "</table>";
    }

    public function jenkel()
    {
        $this->db->select('ps.nip,ps.nama,dp.jeniskelamin');
        $this->db->from('mod_suamiistri ps');
        $this->db->join('mod_datapribadi dp', 'dp.nip = ps.nip', 'left');
        $dtpasangan = $this->db->get()->result_array();
        echo "<table>";
        foreach($dtpasangan as $jb):
            echo "<tr>";
            echo "<td>".$jb['nip']."</td>";
            echo "<td>".$jb['nama']."</td>";
            echo "<td>".$jb['jeniskelamin']."</td>";
            echo "</tr>";
        endforeach;
        echo "</table>";
    }

    public function ranpass()
    {
        $rp = $this->db->get('randpass')->result_array();
        echo "<table>";
        foreach($rp as $jb):
            echo "<tr>";
            echo "<td>".$jb['user']."</td>";
            echo "<td>".$jb['pass']."</td>";
            echo "<td>".md5($jb['pass'])."</td>";
            echo "</tr>";
        endforeach;
        echo "</table>";
    }

    public function arsip()
    {
        $this->db->select('dp.nip,dp.nama,ar.no_arsip');
        $this->db->from('mod_datapribadi dp');
        $this->db->join('mod_arsip ar', 'ar.nip = dp.nip', 'left');
        $dtarsip = $this->db->group_by('nip')->get()->result_array();
        echo "<table>";
        foreach($dtarsip as $jb):
            echo "<tr>";
            echo "<td>".$jb['nip']."</td>";
            echo "<td>".$jb['nama']."</td>";
            echo "<td>".$jb['no_arsip']."</td>";
            echo "</tr>";
        endforeach;
        echo "</table>";
    }

    public function uagama()
    {
        $dataag = array(
            'agama' => 2 
        );
        $this->db->where('agama', 6)->update('mod_datapribadi', $dataag);
    }

    public function jabcad()
    {
        $this->db->select('ps.nip,dp.nama,dp.unitkerja_id');
        $this->db->from('mod_jabatancad ps');
        $this->db->join('mod_datapribadi dp', 'dp.nip = ps.nip', 'left');
        $dtjab = $this->db->get()->result_array();
    }

    public function organisasi()
    {
        $org = $this->db->get('master_organisasi')->result_array();
        $no = 1;
        foreach($org as $o):
            // $eror[] = array($o['nm_organisasi'] => $this->db->where('organisasi_id', $o['id_organisasi'])->get('master_unitkerja')->result_array());
            $unitkerja = $this->db->where(array('organisasi_id'=> $o['id_organisasi'], 'parent' => '0'))->get('master_unitkerja')->result_array();
            // echo '<tr><td colspan="15">'.$o['nm_organisasi'].'</td></tr>';
            
            foreach($unitkerja as $jb):
                
                $laki_gol1 = $this->db->where(array('kelamin_id'=>1, 'golongan_id >='=>111,'golongan_id >='=>114, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                $wanita_gol1 = $this->db->where(array('kelamin_id'=>2, 'golongan_id >='=>111,'golongan_id >='=>114, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                $laki_gol2 = $this->db->where(array('kelamin_id'=>1, 'golongan_id >='=>121,'golongan_id >='=>124, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                $wanita_gol2 = $this->db->where(array('kelamin_id'=>2, 'golongan_id >='=>121,'golongan_id >='=>124, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                $laki_gol3 = $this->db->where(array('kelamin_id'=>1, 'golongan_id >='=>131,'golongan_id >='=>134, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                $wanita_gol3 = $this->db->where(array('kelamin_id'=>2, 'golongan_id >='=>131,'golongan_id >='=>134, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                $laki_gol4 = $this->db->where(array('kelamin_id'=>1, 'golongan_id >='=>141,'golongan_id >='=>144, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                $wanita_gol4 = $this->db->where(array('kelamin_id'=>2, 'golongan_id >='=>141,'golongan_id >='=>144, 'unitkerja_id'=>$jb['id_unitkerja']))->get('view_lastriwayat')->num_rows();
                $data[$o['nm_organisasi']][] = array(
                    'organisasi' =>$jb['organisasi_id'],
                    'nmounit'=>$jb['nm_unitkerja'],
                    'laki_gol1'=>$laki_gol1,
                    'wanita_gol1'=>$wanita_gol1,
                    'laki_gol2'=>$laki_gol2,
                    'wanita_gol2'=>$wanita_gol2,
                    'laki_gol3'=>$laki_gol3,
                    'wanita_gol3'=>$wanita_gol3,
                    'laki_gol4'=>$laki_gol4,
                    'wanita_gol4'=>$wanita_gol4
                );
            endforeach;
            
        endforeach;

       
       echo '<pre>';
       print_r($data);
       echo '</pre>';

        // foreach($eror as $key => $val):
        //     echo '<h2>'.$key.'-'.count($val).'</h2>';
        //     echo '<ul>';
        //     foreach($val as $v):
        //         echo '<li>'.$v['nm_unitkerja'].'</li>';
        //     endforeach;
        //     echo '</ul>';
            
        // endforeach;
    }

    
    public function updatejbt()
    {
        $datalama = $this->db->get('mod_jabatancad')->result_array();
        foreach($datalama as $dl){
            //jenis jabatan
            if($dl['kd_eselon'] <= 2){$jenjab = 1;}
            elseif($dl['kd_eselon'] >= 3 && $dl['kd_eselon'] >= 7){$jenjab = 2;}
            else{$jenjab = 3;}

            // id jabatan
            // if($dl['kd_eselon'] <= 2){$jenjab = 1;}
            // elseif($dl['kd_eselon'] >= 3 && $dl['kd_eselon'] >= 7){$jenjab = 2;}
            // else{$jenjab = 3;}
            $data_update = array(
                'nip' => $dl['nip'],
                'jenis_jabatan_id' => $dl['nip'],
                'jenjab_id' => $jenjab,
                'eselon_id' => $dl['kd_eselon']
            );
            $this->db->where(array('nip'=>$dl['nip'], 'eselon_id'=>$dl['kd_eselon']));
        }
    }

    public function riwayatakhir()
    {
        $this->db->select('vpg.nip, mod.nama, me.eselon, mg.golongan, mj.nm_jabatan, mu.nm_unitkerja, moi.status_pegawai');
        $this->db->where('moi.status_pegawai', 1);
        $this->db->from('view_pegawai vpg'); 
        $this->db->join('view_riwayatakhir vra', 'vra.nip = vpg.nip', 'left');
        $this->db->join('mod_datapribadi mod', 'mod.nip = vpg.nip', 'left');
        $this->db->join('mod_identitas moi', 'moi.nip = vpg.nip', 'left');
        $this->db->join('mod_user mou', 'mou.nip = vpg.nip', 'left');
        $this->db->join('master_jabatan mj', 'mj.id_jabatan = vra.jabatan_id', 'left');
        $this->db->join('master_eselon me', 'me.id_eselon = vra.eselon_id', 'left');
        $this->db->join('master_golongan mg', 'mg.id_golongan = vra.golongan_id', 'left');
        $this->db->join('master_unitkerja mu', 'mu.id_unitkerja = vra.unitkerja_id', 'left');
        $ra = $this->db->get()->result_array();
        $no=1;
        foreach($ra as $r){
            echo $no++.'=>'.$r['nip'].'-'.$r['nama'].'-'.$r['eselon'].'-'.$r['golongan'].'-'.$r['nm_jabatan'].'-'.$r['nm_unitkerja'].'</br>';
        }
    }


    public function tabs()
    {
        // $data = $this->uri();
        // $this->load->view('coba/tabs', $data);

        $this->db->select('mop.nip, mop.golongan_id, mus.skpd_id');
        $this->db->from('mod_pns mop');
        $this->db->join('mod_user mus', 'mus.nip = mop.nip', 'left');
        $pns = $this->db->get()->result_array();
        // echo '<pre>';
        // print_r($cpns);
        // echo '</pre>';
        
            // echo '<table>';
            // echo '<tbody>';
            // foreach($pns as $c){
            // echo '<tr>';
            // echo '<td>'.$c['nip'].'</td>';
            // echo '<td>'.$c['golongan_id'].'</td>';
            // echo '<td>'.$c['skpd_id'].'</td>';
            // echo '</tr>';
            // }
            // echo '</tbody>';
            // echo '</table>';
        
            $e = $this->db->select_max('tgl_sk')->get('mod_kgb')->row();

            echo $e->tgl_sk;

    }

    public function upload_image(){
        // $new_name = $_FILES["ktp"]['name'];
        $arsip = array('karpeg','npwp','nuptk','bpjs','sertifikat','kariskarsu','taspen','kpe');

        for($i=0; $i < count($arsip); $i++){
            
        }
        $new_name = 'ktp';
        $config['upload_path'] = './assets/coba/'; //path folder
		$config['allowed_types'] = 'jpg|png|jpge'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = 1000;
        $config['file_name'] = $new_name;
        
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('ktp'))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
            <strong>Gagal!</strong> Pastikan ukurannya dan penamaan fiel sesuai dengan persyaratan</div>');
            echo  'ghjhgjhg';
	    }else{
            $upload_data = $this->upload->data();
            $pnsnonaktif = $upload_data['file_name'];

            echo  $pnsnonaktif;
        }

        $new_name = 'npwp';
        $config_npwp['upload_path'] = './assets/coba/'; //path folder
		$config_npwp['allowed_types'] = 'jpg|png|jpge'; //type yang dapat diakses bisa anda sesuaikan
        $config_npwp['max_size'] = 1000;
        $config_npwp['file_name'] = $new_name;
        
        $this->upload->initialize($config_npwp);

        if ( ! $this->upload->do_upload('npwp'))
	    {
	        $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
            <strong>Gagal!</strong> Pastikan ukurannya dan penamaan fiel sesuai dengan persyaratan</div>');
            echo  'ghjhgjhg';
	    }else{
            $upload_data = $this->upload->data();
            $pnsnonaktif = $upload_data['file_name'];

            echo  $pnsnonaktif;
        }


    }

    public function tes_merge(){
        $sesi_nip = $this->session->userdata('nip');

        //Riwayat
		//Pangkat
		$this->db->where('nip', $sesi_nip);
		$spangkat = $this->db->get('mod_pangkat')->result_array();
		
		//Pendidikan
		$this->db->where('nip', $sesi_nip);
		$sedu = $this->db->get('mod_pendidikan')->result_array();

		//Diklat
		$this->db->where('nip', $sesi_nip);
		$sdik = $this->validasi_model->getmodDiklat()->result_array();

		//Seminar
		$this->db->where('nip', $sesi_nip);
		$ssmr = $this->validasi_model->getmodSeminar()->result_array();
		
		//Hukuman
		$this->db->where('nip', $sesi_nip);
		$shuk = $this->validasi_model->getmodHukuman()->result_array();

		//KGB
		$this->db->where('nip', $sesi_nip);
		$skgb = $this->validasi_model->getmodKgb()->result_array();
		//Kredit
		$this->db->where('nip', $sesi_nip);
		$skre = $this->validasi_model->getmodKredit()->result_array();
		//Penghargaan
		$this->db->where('nip', $sesi_nip);
		$stdj = $this->validasi_model->getmodPenghargaan()->result_array();
		//Orangtua
		$this->db->where('nip', $sesi_nip);
		$sort = $this->validasi_model->getmodOrangtua()->result_array();
		//Pasangan
		$this->db->where('nip', $sesi_nip);
		$spas = $this->db->get('mod_pasangan')->result_array();
		//Anak
		$this->db->where('nip', $sesi_nip);
		$sank = $this->validasi_model->getmodAnak()->result_array();
		//Cuti
		$this->db->where('nip', $sesi_nip);
        $scut = $this->validasi_model->getmodCuti()->result_array();
        

        foreach($spangkat as $p){
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

            if(count($spangkat) > 0){
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
        
        $nm_file = array('ktp_pasangan', 'buku_nikah', 'akta_cerai');
        foreach($spas as $ps){
            for($f=0; $f < count($nm_file); $f++){
                $status = !empty($ps['file_'.$nm_file[$f]]) && file_exists('assets/asn/dokumen/arsip/'.$ps['file_'.$nm_file[$f]]) ? $ps['file_'.$nm_file[$f]] : 'Belum upload file';
                if(!empty($ps['nip'])){
                    if($ps['status_aktif']==0){
                        if($ps['status_validasi_modpasangan']==1){
                            if($ps['validator_modpasangan']==2){$valid = 'Tahap Validasi BKPSDM';}else{$valid = 'Tahap Validasi OPD';}
                        }else{
                            if($ps['validator_modpasangan']==2){$valid = 'Gagala Validasi BKPSDM';}else{$valid = 'Gagala Validasi OPD';}
                        }
                    }elseif($ps['status_aktif']==1){
                        if($ps['status_validasi_modpasangan']==1){
                            if($ps['validator_modpasangan']==2){$valid = 'File Tervalidasi';}else{$valid = 'Belum Upload File';}
                        }else{
                            $valid = 'Belum Upload File';
                        }
                    }else{
                        $valid = 'Belum Upload File';
                    }
                }else{
                    $valid = null;
                }

                if(count($spas) > 0){
                    $data_pasangan[] = array(
                        'jenis_dokumen'=>'Pasangan',
                        'nama_dok' => $nm_file[$f],
                        'induk_data'=>'pasangan',
                        'status'=>$status,
                        'validasi'=>$valid,
                        'status_validasi' => $ps['status_validasi_modpasangan'],
                        'validator' =>  $ps['validator_modpasangan']
                    );
                }else{
                    $data_pasangan[] = array(
                        'jenis_dokumen'=>'Pasangan',
                        'nama_dok' => $nm_file[$f],
                        'induk_data'=>'pasangan',
                        'status'=>$status,
                        'validasi'=>$valid,
                        'status_validasi' => null,
                        'validator' =>  null
                    );
                }
            }
        }

        $datagabung = array('pangkat'=>$data_pangkat, 'pasangan'=>$data_pasangan);

        
		
        $data_tinjau = array_merge($spangkat, $sedu, $sdik, $ssmr, $shuk, $skgb, $skre, $stdj, $sort, $spas, $sank, $scut);
        // echo '<pre>';
        // print_r($spangkat);
        // echo '</pre>';
        
        echo '<pre>';
        print_r($datagabung);
        echo '</pre>';
        // var_dump($spangkat);
    }

    public function laporan_pdf()
    {
        $data = $this->uri();
		$nip = $this->session->userdata('nip');
        $lvlid = $this->session->userdata('level_id');

        $this->db->where(array('kedudukan_id' => 1, 'status_pegawai'=>1));
        $data['pns'] = $this->db->get('view_asn')->result_array();

        $dataku['dataku'] = array(
            'nama' => 'lola',
            'alamat' => 'lolai',
        );
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A3', 'landscape');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('coba/laporan_pdf', $data);
    }

    public function tespangkat()
    {
        $pkt = $this->db->order_by('id asc','golongan_id asc')->get('mod_pangkat')->result_array();
    }




}

?>
