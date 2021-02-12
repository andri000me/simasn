<?php
class Pegawai_model extends CI_Model{
    // start datatables
    // var $table = 'view_asn';
    // var $column_order = array(null, 'nip', 'nama', 'golongan', 'nm_jabatan', 'nm_unitkerja'); //set column field database for datatable orderable
    // var $column_search = array('nip', 'nama', 'golongan', 'nm_jabatan', 'nm_unitkerja'); //set column field database for datatable searchable
    // var $order = array('idv' => 'desc'); // default order 

    private function _form_input()
    {
        $link['uri'] = $this->input->post('uri');
        $link['ukid'] = $this->input->post('ukid');
        $link['golid'] = $this->input->post('golid');
        $link['lvlid'] = $this->session->userdata('level_id');
        return $link;
    }

    function table()
    {
        $link = $this->_form_input();
        if($link['uri'] =='master_pegawai'): 
            $this->db->order_by('vra.eselon_id', 'asc'); 
            $this->db->from('view_pegawai vpg'); 
            $this->db->join('view_riwayatakhir vra', 'vra.nip = vpg.nip', 'left');
            $this->db->join('mod_datapribadi mod', 'mod.nip = vpg.nip', 'left');
            $this->db->join('mod_identitas moi', 'moi.nip = vpg.nip', 'left');
            $this->db->join('mod_user mou', 'mou.nip = vpg.nip', 'left');
            $this->db->join('master_jabatan mj', 'mj.id_jabatan = vra.jabatan_id', 'left');
            $this->db->join('master_jenis_jabatan mjj', 'mjj.id_jenis_jabatan = vra.jenis_jabatan_id', 'left');
            $this->db->join('master_jenjang_jabatan mjb', 'mjb.id_jenjang_jabatan = vra.jenjab_id', 'left');
            $this->db->join('master_eselon me', 'me.id_eselon = vra.eselon_id', 'left');
            $this->db->join('master_bidang mb', 'mb.id_bidang = vra.bagian_id', 'left');
            $this->db->join('master_subbidang msb', 'msb.id_subbidang = vra.subbagian_id', 'left');
            $this->db->join('master_golongan mg', 'mg.id_golongan = vra.golongan_id', 'left');
            $this->db->join('master_unitkerja mu', 'mu.id_unitkerja = vra.unitkerja_id', 'left');

        endif;
        if($link['uri'] =='data_user'): 
            $this->db->order_by('level_id','asc');
            $this->db->from('mod_user mus');
            $this->db->join('mod_datapribadi mod', 'mod.nip = mus.nip', 'left');
            $this->db->join('mod_identitas moi', 'moi.nip = mus.nip', 'left');
            $this->db->join('master_unitkerja mu', 'mu.id_unitkerja = mus.skpd_id', 'left');
            $this->db->join('level lv', 'lv.id_level = mus.level_id', 'left');
        endif;
    }

    function costum()
    {
        $link = $this->_form_input();
        if($link['uri']=='master_pegawai'):
            if($link['lvlid']==1 || $link['lvlid']==2 ):
                $this->db->where(array('moi.status_pegawai'=> 1));
            endif;
            if($link['lvlid'] > 2 &&  $link['lvlid'] < 5):
                $this->db->where(array('moi.status_pegawai'=> 1, 'vra.unitkerja_id'=>$this->session->userdata('skpd_id')));
            endif;
        endif;
        if($link['uri']=='data_user'):
            if($link['lvlid']==1 || $link['lvlid']==2 ):
                $this->db->where(array('moi.status_pegawai'=> 1, 'mus.level_id >'=>1, 'mus.level_id <'=>6));
            endif;
            if($link['lvlid'] > 2 &&  $link['lvlid'] < 5):
                $this->db->where(array('moi.status_pegawai'=> 1, 'mus.skpd_id'=>$this->session->userdata('skpd_id'), ));
            endif;
        endif;
        if(!empty($link['ukid'])):
            $this->db->where(array('mus.skpd_id' => decrypt_url($link['ukid'])));
        endif;
        if(!empty($link['golid'])):
            $this->db->where(array('id_golongan' => decrypt_url($link['golid'])));
        endif;
        
    }

    function column_order()
    {
        $link = $this->_form_input();
        if($link['uri'] =='master_pegawai'):
            $data = array(null, 'vpg.nip','mod.nama','mod.gelardepan','mod.gelarbelakang','mg.golongan','vra.eselon_id','me.eselon','vra.jabatan_id','mj.nm_jabatan','mjb.jenjang_jabatan','vra.jenis_jabatan_id','vra.bagian_id','vra.subbagian_id','mb.nm_bidang','msb.nm_subbidang','vra.jenis_jabatan_id','mu.nm_unitkerja', 'moi.status_pegawai'); //set column field database for datatable orderable
        endif;
        if($link['uri'] =='data_user'):
            $data = array(null, 'mus.nip','mod.nama','mod.gelardepan', 'mod.gelarbelakang','mus.username','mus.password','mu.nm_unitkerja','mus.level_id', 'lv.nm_level','moi.status_pegawai'); //set column field database for datatable orderable
        endif;
        return $data;
    }

    function column_select()
    {
        $link = $this->_form_input();
        if($link['uri'] =='master_pegawai'):
            $data = array('vpg.nip','mod.nama','mod.gelardepan','mod.gelarbelakang','mg.golongan','vra.eselon_id','me.eselon','vra.jabatan_id','mj.nm_jabatan','mjb.jenjang_jabatan','vra.jenis_jabatan_id','vra.bagian_id','vra.subbagian_id','mb.nm_bidang','msb.nm_subbidang','vra.jenis_jabatan_id','mu.nm_unitkerja','mod.unitkerja_id','moi.status_pegawai','mou.level_id'); //set column field database for datatable orderable
        endif;
        if($link['uri'] =='data_user'):
            $data = array('mus.nip','mod.nama','mod.gelardepan','mod.gelarbelakang','mu.nm_unitkerja','mus.username','mus.password','mus.skpd_id','mus.level_id','lv.nm_level','moi.status_pegawai'); //set column field database for datatable orderable
        endif;
        return $data;

    }

    function column_search()
    {
        $link = $this->_form_input();
        if($link['uri'] =='master_pegawai'):
            $data = array('vpg.nip','mod.nama','mod.gelardepan','mod.gelarbelakang','me.eselon','mg.golongan','mj.nm_jabatan','mjb.jenjang_jabatan','mu.nm_unitkerja'); //set column field database for datatable orderable
        endif;
        if($link['uri'] =='data_user'):
            $data = array('mus.nip','mod.nama','mod.gelardepan', 'mod.gelarbelakang','mus.username','mu.nm_unitkerja', 'lv.nm_level', 'moi.status_pegawai'); //set column field database for datatable orderable
        endif;
        return $data;
    }

    function order()
    {
        $link = $this->_form_input();
        if($link['uri'] =='master_pegawai'):
            $data = array('vra.eselon_id' => 'asc'); // default order
        endif;
        if($link['uri'] =='data_user'):
            $data = array('mus.level_id' => 'asc'); // default order
        endif;
        return $data;
    }

    private function _get_datatables_query() {
        $column_search = $this->column_search();
        $column_select = $this->column_select();
        $column_order = $this->column_order();
        $order = $this->order();
        $this->db->select($column_select);
        $this->costum();
        $this->table();

        $i = 0;
        foreach ($column_search as $item) { // loop column 
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            // $order = $this->order;
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
        $this->table();
        return $this->db->count_all_results();
    }
    
    // end datatables

    function get_jenis_pegawai()
    {
        $query = $this->db->get('master_jenis_pegawai');
        return $query;
    }

    public function modUserFordatauser()
    {
        $this->db->from('view_user mou');
        $this->db->join('mod_identitas moi', 'moi.nip = mou.nip', 'left') ;
        $query = $this->db->get();
        return $query;
    }

    function addUseradmin($post)
    {
        $data['level_id'] = $post['idlvl'];
        $data = $this->security->xss_clean($data);
    	$query = $this->db->where('nip', $post['idusr'])->update('mod_user', $data);
        return $query;
    }

    function get_modul_user_pegawai()
    {
        $select = array('mus.nip','mod.nama','mod.gelardepan','mod.gelarbelakang','mu.nm_unitkerja','mus.username','mus.password','mus.skpd_id','mus.level_id','lv.nm_level','moi.status_pegawai'); //set column field database for datatable orderable
        $this->db->select($select);
        $this->db->from('mod_user mus');
        $this->db->join('mod_datapribadi mod', 'mod.nip = mus.nip', 'left');
        $this->db->join('mod_identitas moi', 'moi.nip = mus.nip', 'left');
        $this->db->join('master_unitkerja mu', 'mu.id_unitkerja = mus.skpd_id', 'left');
        $this->db->join('level lv', 'lv.id_level = mus.level_id', 'left');
        $data = $this->db->get();
        return $data;
    }

    function insert_modul_user_pegawai($pegawai)
    {
        $this->db->where('nip', $pegawai['nip']);
        $ceknip = $this->get_modul_user_pegawai()->row_array();

        $data['nip'] = $pegawai['nip'];
        $data['skpd_id'] = $pegawai['unit_kerja'];
        $data['level_id'] = 5;
        $data['nama'] = $pegawai['nm_pegawai'];
        $data['no_arsip'] = $pegawai['noarsip'];
        $data['email'] = $pegawai['email'];
        $data['nohp'] = $pegawai['nohp'];
        $data['username'] = $pegawai['username'];
        $data['password'] = $pegawai['password'];
        $data['password_enc'] = md5($pegawai['password']);
        $data = $this->security->xss_clean($data);
    	$query = $this->db->insert('mod_user', $data);
        return $query;
    }

    function log_user($activity)
    {
    	$data['user_id'] = 0;
    	$data['user_ipaddress'] = $this->getUserIpAddr();
    	$data['activity'] = $activity;
        $data = $this->security->xss_clean($data);
    	$data_log = $this->db->insert('log_user', $data);
    	return $data_log;

    }

    function getAlldataAsn()
    {
        $query = $this->db->get('view_asn');
        return $query;
    }

    function get_modul_datapribadi()
    {
        $query = $this->db->get('mod_datapribadi');
        return $query;
    }

    function getmodMasterpegawai()
    {
        $this->db->select('nip, nama, nm_unitkerja, golongan, nm_jabatan');
        $query = $this->db->get('view_asn');
        return $query;
    }

    function get_modul_datapribadi_pgn($limit='', $start=''){
    	// $this->db->order_by('id_unitkerja','desc');
        $query =  $this->db->get('mod_datapribadi', $limit, $start);
        return $query;
    }

    function insert_modul_datapribadi($pegawai)
    {
        $data['nip'] = $pegawai['nip'];
        $data['nama'] = $pegawai['nm_pegawai'];
        $data['unitkerja_id'] = $pegawai['unit_kerja'];
        $data = $this->security->xss_clean($data);
        $data_pribadi = $this->db->insert('mod_datapribadi', $data);
        return $data_pribadi;
    }
    
    function insert_modul_datapribadi_tinjauan($pegawai)
    {
        $data['nip'] = $pegawai['nip'];
        $data['nama'] = $pegawai['nm_pegawai'];
        $data['unitkerja_id'] = $pegawai['unit_kerja'];
        $data = $this->security->xss_clean($data);
        $data_pribadi = $this->db->insert('mod_datapribadi_tinjauan', $data);
        return $data_pribadi;
    }

    function get_modul_identitas()
    {
        $query = $this->db->get('mod_identitas');
        return $query;
    }

    function insert_modul_identitas($pegawai)
    {
        $data['nip'] = $pegawai['nip'];
        $data['unitkerja_id'] = $pegawai['unit_kerja'];
        $data['jenis_pegawai_id'] = $pegawai['jenis_pegawai'];
        $data['status_pegawai'] = 1;
        $data = $this->security->xss_clean($data);
        $data_identitas = $this->db->insert('mod_identitas', $data);
        return $data_identitas;
    }

    function insert_modul_identitas_tinjauan($pegawai)
    {
        $data['nip'] = $pegawai['nip'];
        $data['status_pegawai'] = 1;
        $data = $this->security->xss_clean($data);
        $data_identitas = $this->db->insert('mod_identitas_tinjauan', $data);
        return $data_identitas;
    }

    function updateStatuspns($pegawai, $post)
    {
        $isian_tanggal = array(
            'tmt_statuspns'=> $post['tmt_sk_statuspns'],
            'tglsk_statuspns' => $post['tanggal_sk_statuspns']
        );
        
        foreach ($isian_tanggal as $key => $entry)
		{
            if (!empty($entry) && $entry != '-' ):
                $data_update[$key] = date('Y-m-d', strtotime($entry));
            else:
                $data_update[$key] = null;
			endif;
        }

        $data_update['no_statuspns'] = $post['nomor_sk_statuspns'];

        if(isset($_FILES['sk_pnsnonaktif']['name'])){
            $config['upload_path'] = './assets/asn/dokumen/arsip/'; //path folder
            $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = 500;
            $config['overwrite'] = TRUE;
            $config['file_name'] = $pegawai.'_sk_pnsnonaktif';

            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('sk_pnsnonaktif'))
            {
                $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
                <strong>Gagal!</strong> Pastikan ukurannya dan penamaan fiel sesuai dengan persyaratan</div>');
            }else{
                $upload_data = $this->upload->data();
                $data_update['file_sk_pnsnonaktif'] = $upload_data['file_name'];
            }
        }

        $data_update['status_pegawai'] = $post['status_pegawai'];
        $data_update['kedudukan_id'] = $post['kedudukan'];
        $data = $this->security->xss_clean($data_update);
        $data_identitas = $this->db->where('nip', $pegawai)->update('mod_identitas', $data);
        return $data_identitas;
    }

    function get_modul_fisik()
    {
        $query = $this->db->get('mod_fisik');
        return $query;
    }

    function insert_modul_fisik($pegawai)
    {
        $data['nip'] = $pegawai['nip'];
        $data['unitkerja_id'] = $pegawai['unit_kerja'];
        $data = $this->security->xss_clean($data);
        $data_fisik = $this->db->insert('mod_fisik', $data);
        return $data_fisik;
    }

    function insert_modul_fisik_tinjauan($pegawai)
    {
        $data['nip'] = $pegawai['nip'];
        $data = $this->security->xss_clean($data);
        $data_fisik = $this->db->insert('mod_fisik_tinjauna', $data);
        return $data_fisik;
    }

    function get_modul_cpns()
    {
        $query = $this->db->get('mod_cpns');
        return $query;
    }

    function insert_modul_cpns($pegawai)
    {
        $data['nip'] = $pegawai['nip'];
        $data['unitkerja_id'] = $pegawai['unit_kerja'];
        $data = $this->security->xss_clean($data);
        $data_cpns = $this->db->insert('mod_cpns', $data);
        return $data_cpns;
    }

    function insert_modul_cpns_tinjauan($pegawai)
    {
        $data['nip'] = $pegawai['nip'];
        $data = $this->security->xss_clean($data);
        $data_cpns = $this->db->insert('mod_cpns_tinjauan', $data);
        return $data_cpns;
    }

    function get_modul_pns()
    {
        $query = $this->db->get('mod_pns');
        return $query;
    }

    function insert_modul_pns($pegawai)
    {
        $data['nip'] = $pegawai['nip'];
        $data['unitkerja_id'] = $pegawai['unit_kerja'];
        $data = $this->security->xss_clean($data);
        $data_pns = $this->db->insert('mod_pns', $data);
        return $data_pns;
    }

    function insert_modul_pns_tinjauan($pegawai)
    {
        $data['nip'] = $pegawai['nip'];
        $data = $this->security->xss_clean($data);
        $data_pns = $this->db->insert('mod_pns_tinjauan', $data);
        return $data_pns;
    }

    function getmasterUnitkerja()
    {
        $data = $this->db->get('master_unitkerja');
        return $data;
    }

    function getmasterJabatan()
    {
        $data = $this->db->get('master_jabatan');
        return $data;
    }

    function getmasterGolongan()
    {
        $data = $this->db->get('master_golongan');
        return $data;
    }

    function getmasterKedudukan()
    {
        $data = $this->db->get('master_kedudukan');
        return $data;
    }

    function level()
    {
    	$data = $this->db->get('level');
    	return $data;
    }

    function getmodulPangkat()
    {
        $this->db->from('mod_pangkat mop');
        $this->db->join('master_golongan mg', 'mg.id_golongan = mop.golongan_id', 'left');
        $this->db->order_by('tmt_pangkat', 'desc');
        $query = $this->db->get();
        return $query;
    }

    function getmodulJabatan()
    {
        $this->db->select('moj.*, me.eselon, mb.nm_bidang, sb.nm_subbidang, mj.nm_jabatan, mjj.jenjang_jabatan, mu.nm_unitkerja');
        $this->db->from('mod_jabatan moj');
        $this->db->join('master_eselon me', 'me.id_eselon = moj.eselon_id', 'left');
        $this->db->join('master_bidang mb', 'mb.id_bidang = moj.bagian_id', 'left');
        $this->db->join('master_subbidang sb', 'sb.id_subbidang = moj.subbagian_id', 'left');
        $this->db->join('master_jabatan mj', 'mj.id_jabatan = moj.jabatan_id', 'left');
        $this->db->join('master_jenjang_jabatan mjj', 'mjj.id_jenjang_jabatan = moj.jenjab_id', 'left');
        $this->db->join('master_unitkerja mu', 'mu.id_unitkerja = moj.unitkerja_id', 'left');
        $this->db->order_by('tmt_jabatan', 'desc');
        $query = $this->db->get();
        return $query;
    }

    function getmodulJnPendidikan()
    {
        $this->db->from('mod_pendidikan mop');
        $this->db->join('master_jpendidikan me', 'me.id_jpendidikan = mop.jpendidikan_id', 'left');
        $this->db->order_by('tgl_lulus', 'desc');
        $query = $this->db->get();
        return $query;
    }

    function getUserIpAddr(){
	    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	        //ip from share internet
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	        //ip pass from proxy
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }else{
	        $ip = $_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
	}
} 