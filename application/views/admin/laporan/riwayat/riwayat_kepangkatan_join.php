<?php

class Laporan_model extends CI_Model
{
    // start datatables
    var $table = 'mod_pangkat';
    var $column_order = array(null, 'mop.nip', 'mod.nama', 'mg.golongan', 'mj.nm_jabatan', 'mu.nm_unitkerja'); //set column field database for datatable orderable
    var $column_search = array('mop.nip', 'mod.nama', 'mg.golongan', 'mj.nm_jabatan', 'mu.nm_unitkerja'); //set column field database for datatable searchable
    var $order = array('id' => 'asc'); // default order 
 
    private function _get_datatables_query() {
        $this->db->select($this->column_search);
		$this->db->from($this->table.' mop');
		$this->db->join('mod_datapribadi mod', 'mod.nip = mop.nip', 'left');
		$this->db->join('mod_jabatan moj', 'moj.nip = mop.nip', 'left');
		$this->db->join('master_golongan mg', 'mg.id_golongan = mop.golongan_id', 'left');
		$this->db->join('master_jabatan mj', 'mj.id_jabatan = moj.jabatan_id', 'left');
		$this->db->join('master_unitkerja mu', 'mu.id_unitkerja = mod.unitkerja_id', 'left');
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if($_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables() {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    // end datatables
    
    public function getViewAsn(){
        $data = $this->db->get('view_asn');
        return $data;
    }

    public function getViewKGB(){
        $data = $this->db->get('view_kgb');
        return $data;
    }

    public function getmodDatapribadi()
    {
        $data = $this->db->get('mod_datapribadi');
        return $data;
    }

    function getmasterUnitkerja()
    {
        $data = $this->db->get('master_unitkerja');
        return $data;
    }
    //ini diperuntukkan bukan datatable PNS
    function pagination_all()
	{
		//konfigurasi pagination
        $config['base_url'] = site_url('admin/laporan/pns'); //site url
		$config['total_rows'] = $this->db->get('view_asn')->num_rows(); //total row
		$config['per_page'] = 20;
        $config['uri_segment'] = 4;
        //agar paginationnya full page
		// $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = 20;
		// Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-end float-right m-t-10">';
		$config['full_tag_close']   = '</ul></nav';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '</span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		return $config;
    }

    function pagination($uri3='')
	{
		//konfigurasi pagination
        // $master= str_replace('_', '', $uri3);
        $config['base_url'] = site_url('admin/laporan/pns/'.$uri3); //site url
		$config['total_rows'] = $this->db->get('view_asn')->num_rows(); //total row
		$config['per_page'] = 20;
        $config['uri_segment'] = 5;
        //agar paginationnya full page
		// $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = 20;
		// Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-end float-right m-t-10">';
		$config['full_tag_close']   = '</ul></nav';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '</span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		return $config;
    }

    public function getAllViewAsnpgn($limit='', $star=''){
        $data = $this->db->get('view_asn', $limit, $star);
        return $data;
    }

    public function getViewAsnpgn($uri3='', $limit='', $star=''){

        if($uri3=='semua_pns'):
            $data = $this->db->get('view_asn', $limit, $star);
        endif;
        if($uri3=='pns_aktif'):
            $this->db->where('status_pegawai', 1);
        endif;
        if($uri3=='pns_nonaktif'):
            $this->db->where('status_pegawai', 2);
        endif;
        if($uri3=='pns_titipan'):
            $this->db->where('kedudukan_id', 3);
        endif;
        if($uri3=='pns_tugas_belajar'):
            $this->db->where('kedudukan_id', 2);
        endif;
        if($uri3=='pns_mpp'):
            $tglawal = date('Y-m-d');
            $tanggalatas = date('Y-m', strtotime('-60 year', strtotime($tglawal))); //tambah tanggal sebanyak 6 tahun
            $tanggalatas = date('Y-m', strtotime('+1 month', strtotime($tanggalatas))); //tambah tanggal sebanyak 6 tahun
            $tanggalbawah = date('Y-m', strtotime('-59 year', strtotime($tglawal))); //tambah tanggal sebanyak 6 tahun
            $tanggalbawah = date('Y-m', strtotime('+1 month', strtotime($tanggalbawah))); //tambah tanggal sebanyak 6 tahun
            // echo $tanggalselisih;
            $this->db->select('tanggallahir')->where(array('status_pegawai' =>1 , 'tanggallahir >=' => $tanggalatas.'-01', 'tanggallahir <' => $tanggalbawah.'-01'));
            $data = $this->db->get('view_asn', $limit, $star);
        endif;
        $data = $this->db->get('view_asn', $limit, $star);
        return $data;
    }
    //End diperuntukkan bukan datatable PNS

    //Ini diperutukkan datatable PNS
    public function getViewAsndataTable($uri='', $lvlid=''){
        
        switch ($uri) {
            case "semua_pns":
                $this->db->where(array('level_id >='=>$lvlid, 'level_id <'=>6));
                break;
			case "pns_aktif":
                $this->db->where(array('status_pegawai'=> 1, 'level_id >='=>$lvlid, 'level_id <'=>6));
			    break;
			case "pns_nonaktif":
                $this->db->where(array('status_pegawai'=> 2, 'level_id >='=>$lvlid, 'level_id <'=>6));
                break;
            case "pns_titipan":
                $this->db->where(array('kedudukan_id'=> 3, 'level_id >='=>$lvlid, 'level_id <'=>6));
                break;
            case "pns_tugas_belajar":
                $this->db->where(array('kedudukan_id'=> 2, 'level_id >='=>$lvlid, 'level_id <'=>6));
                break;
            case "pns_diperbantukan":
                $this->db->where(array('kedudukan_id'=> 4, 'level_id >='=>$lvlid, 'level_id <'=>6));
                break;
            case "pns_cltn":
                $this->db->where(array('kedudukan_id'=> 6, 'level_id >='=>$lvlid, 'level_id <'=>6));
                break;
            case "pns_keluar_berhenti":
                $this->db->where(array('kedudukan_id'=> 10, 'kedudukan_id'=> 11, 'kedudukan_id'=> 12, 'level_id >='=>$lvlid, 'level_id <'=>6));
                break;
            case "pns_diberhentikan_sementara":
                $this->db->where(array('kedudukan_id'=> 7, 'level_id >='=>$lvlid, 'level_id <'=>6));
                break;
			default:
                $this->db->where(array('level_id >='=>$lvlid, 'level_id <'=>6));
                break;
        }
        
                
        $data = $this->db->select('nip, nama, golongan, nm_jabatan, nm_unitkerja')->get('view_asn');
        return $data;
    }
    //End Ini diperutukkan datatable PNS
    
    

}