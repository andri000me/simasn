<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_data extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
                // $this->load->library('form_validation');
                // if($this->session->userdata('login') == false){
                //     redirect('login');
                // }
                $this->load->model('user_model');
                $this->load->model('asn/data_utama_model');
	}

        public function get_statuskedudukan()
        {
                $status = $this->input->post('status');
                $this->db->where('status_kedudukan', $status);
                $data = $this->data_utama_model->getKedudukan()->result_array();
                echo json_encode($data);

        }

        public function searchki()
        {
                $key = $this->input->post('key');
                $this->db->like('nip',$key,'after');
                $this->db->or_like('nama', $key, 'after');
                $this->db->select('mod.nip, mod.nama, mod.foto, mu.nm_unitkerja');
                $this->db->from('mod_datapribadi mod', 5);
                // $this->db->join('mod_identitas moi', 'moi.nip = mod.nip', 'left');
                $this->db->join('master_unitkerja mu', 'mu.id_unitkerja = mod.unitkerja_id', 'left');
                $data = $this->db->get()->result_array();
                for($i = 0 ; $i < count($data); $i++)
                {
                        $data[$i]['nipenc'] = encrypt_url($data[$i]['nip']);
                }
                echo json_encode($data);
        }
}
