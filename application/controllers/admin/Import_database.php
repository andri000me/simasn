<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_database extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        if($this->session->userdata('login') == false){
            redirect('login');
		}
		$this->load->model('user_model');
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
        $data = $this->uri();
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		
		$this->load->view('admin/import_database', $data);
	}

	private $_batchImport;
 
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
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
        $data = $this->uri();
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();
		
        $this->load->view('coba/coba_import', $data);
    }

    // file upload functionality
    public function upload() {
        
		$this->load->library('form_validation');

		$data = $this->uri();
		$nip = $this->session->userdata('nip');
        $this->db->where('nip',$nip);
		$data['user'] = $this->user_model->getmodUser()->row_array();

		$this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
		if($this->form_validation->run() == false) {
		$this->load->view('coba_import', $data);
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

	
}
