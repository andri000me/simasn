<?php
class Master_data_model extends CI_Model{

	function uri(){
		$data['uri1'] = $this->uri->segment(1);
      	$data['uri2'] = $this->uri->segment(2);
      	$data['uri3'] = $this->uri->segment(3);
      	$data['uri4'] = $this->uri->segment(4);
      	$data['uri5'] = $this->uri->segment(5);
      	return $data;
	}

	function pagination($uri3, $per_page)
	{
		//konfigurasi pagination
		$master= str_replace('_', '', $uri3);
		$config['base_url'] = site_url('admin/master_data/'.$uri3); //site url
		$config['total_rows'] = $this->db->get('master_'.$master)->num_rows(); //total row
		$config['per_page'] = $per_page;
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

	//MASTER UNIT KERJA
    //ambil data master bidang dari database
    function get_unitkerja(){
        $query = $this->db->get('master_unitkerja');
        return $query;
    }

    //untuk paginasi unit kerja
    function get_unitkerja_pgn($limit='', $start=''){
    	// $this->db->order_by('id_unitkerja','desc');
        $query =  $this->db->get('master_unitkerja', $limit, $start);
        return $query;
    }

    function aksi_unitkerja($uri3='', $id='', $post=''){
		$data_update['nm_unitkerja'] = $post['nma_unit_kerja'];
    	if($uri3=='tambah_unit_kerja'):
			$data_update['status_unitkerja'] = 1;
			$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->insert('master_unitkerja', $data_update);
        endif;
        if($uri3=='ubah_unit_kerja'):
        	$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->where('id_unitkerja',decrypt_url($id))->update('master_unitkerja', $data_update);
        endif;
        if($uri3=='hapus_unit_kerja'):
        	$query = $this->db->where('id_unitkerja',decrypt_url($id))->delete('master_unitkerja');
        endif;
        return $query;
    }
    //END MASTER UNIT KERJA

    //MASTER ORGANISASI
    //ambil data master organisasi dari database
    function get_organisasi(){
        $query = $this->db->get('master_organisasi');
        return $query;
    }

    function get_organisasi_pgn($limit='', $start=''){
        $query = $this->db->get('master_organisasi', $limit, $start);
        return $query;
    }

    function aksi_organisasi($uri3='', $id='', $post=''){
		$data_update['nm_organisasi'] = $post['nma_organisasi'];
    	if($uri3=='tambah_organisasi'):
			$data_update['status_organisasi'] = 1;
			$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->insert('master_organisasi', $data_update);
        endif;
        if($uri3=='ubah_organisasi'):
        	$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->where('id_organisasi',decrypt_url($id))->update('master_organisasi', $data_update);
        endif;
        if($uri3=='hapus_organisasi'):
        	$query = $this->db->where('id_organisasi',decrypt_url($id))->delete('master_organisasi');
        endif;

        return $query;
    }
    //END MASTER ORGANISASI
    
    //MASTER BIDANG
    //ambil data master bidang dari database
    function get_bidang(){
        $query = $this->db->get('master_bidang');
        return $query;
    }

    function get_bidang_pgn($limit='', $start=''){
        $query = $this->db->get('master_bidang', $limit, $start);
        return $query;
    }

    function aksi_bidang($uri3='', $id='', $post=''){
		$data_update['nm_bidang'] = $post['nma_bidang'];
    	if($uri3=='tambah_bidang'):
			$data_update['status_bidang'] = 1;
			$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->insert('master_bidang', $data_update);
        endif;
        if($uri3=='ubah_bidang'):
        	$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->where('id_bidang',decrypt_url($id))->update('master_bidang', $data_update);
        endif;
        if($uri3=='hapus_bidang'):
        	$query = $this->db->where('id_bidang',decrypt_url($id))->delete('master_bidang');
        endif;

        return $query;
    }
    //END MASTER BIDANG

    //MASTER SUBBIDANG
    //ambil data master sub bidang dari database
    function get_subbidang(){
        $query = $this->db->get('master_subbidang');
        return $query;
    }

    function get_subbidang_pgn($limit='', $start=''){
        $query = $this->db->get('master_subbidang', $limit, $start);
        return $query;
    }

    function aksi_subbidang($uri3='', $id='', $post=''){
		$data_update['nm_subbidang'] = $post['nma_sub_bidang'];
    	if($uri3=='tambah_sub_bidang'):
			$data_update['status_subbidang'] = 1;
			$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->insert('master_subbidang', $data_update);
        endif;
        if($uri3=='ubah_sub_bidang'):
        	$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->where('id_subbidang',decrypt_url($id))->update('master_subbidang', $data_update);
        endif;
        if($uri3=='hapus_sub_bidang'):
        	$query = $this->db->where('id_subbidang',decrypt_url($id))->delete('master_subbidang');
        endif;

        return $query;
    }
    //END MASTER SUBBIDANG

    //KELOMPOK MASTER PANGKAT
    //ambil data master jabatan dari database
    function get_jabatan(){
        $query = $this->db->get('master_jabatan');
        return $query;
    }

    function get_jabatan_pgn($limit='', $start=''){
        $query = $this->db->get('master_jabatan');
        return $query;
    }

    function aksi_jabatan($uri3='', $id='', $post=''){
		$data_update['nm_jabatan'] = $post['nma_jabatan'];
    	if($uri3=='tambah_jabatan'):
			$data_update['status_jabatan'] = 1;
			$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->insert('master_jabatan', $data_update);
        endif;
        if($uri3=='ubah_jabatan'):
        	$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->where('id_jabatan',decrypt_url($id))->update('master_jabatan', $data_update);
        endif;
        if($uri3=='hapus_jabatan'):
        	$query = $this->db->where('id_jabatan',decrypt_url($id))->delete('master_jabatan');
        endif;

        return $query;
    }

	//ambil data master sub jenis jabatan dari database
    function get_subjabatan($sub){
        $query = $this->db->get('master_'.$sub);
        return $query;
    }

    function aksi_subjabatan($uri3='', $id='', $post=''){
    	$sub = substr($uri3, 6);
		$data_update[$sub] = $post['nma_'.$sub];
    	if($uri3=='tamba_'.$sub):
			$data_update['status_'.$sub] = 1;
			$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->insert('master_'.$sub, $data_update);
        endif;
        if($uri3=='rubah_'.$sub):
        	$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->where('id_'.$sub,decrypt_url($id))->update('master_'.$sub, $data_update);
        endif;
        if($uri3=='hapus_'.$sub):
        	$query = $this->db->where('id_'.$sub,decrypt_url($id))->delete('master_'.$sub);
        endif;

        return $query;
    }
    //END MASTER JABATAN

    //MASTER DIKLAT
    //ambil data master diklat dari database
    function get_diklat(){
        $query = $this->db->get('master_diklat');
        return $query;
    }

    function get_diklat_pgn($limit='', $start=''){
        $query = $this->db->order_by('id_diklat','desc')->get('master_diklat', $limit, $start);
        return $query;
    }

    function aksi_diklat($uri3='', $id='', $post=''){
		$data_update['nm_diklat'] = $post['nma_diklat'];
    	if($uri3=='tambah_diklat'):
			$data_update['status_diklat'] = 1;
			$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->insert('master_diklat', $data_update);
        endif;
        if($uri3=='ubah_diklat'):
        	$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->where('id_diklat',decrypt_url($id))->update('master_diklat', $data_update);
        endif;
        if($uri3=='hapus_diklat'):
        	$query = $this->db->where('id_diklat',decrypt_url($id))->delete('master_diklat');
        endif;

        return $query;
    }

    //ambil data master sub jenis diklat dari database
    function get_subdiklat($sub){
        $query = $this->db->get('master_'.$sub);
        return $query;
    }

    function aksi_subdiklat($uri3='', $id='', $post=''){
    	$sub = substr($uri3, 6);
		$data_update[$sub] = $post['nma_'.$sub];
    	if($uri3=='tamba_'.$sub):
			$data_update['status_'.$sub] = 1;
			$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->insert('master_'.$sub, $data_update);
        endif;
        if($uri3=='rubah_'.$sub):
        	$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->where('id_'.$sub,decrypt_url($id))->update('master_'.$sub, $data_update);
        endif;
        if($uri3=='hapus_'.$sub):
        	$query = $this->db->where('id_'.$sub,decrypt_url($id))->delete('master_'.$sub);
        endif;

        return $query;
    }
    //END MASTER DIKLAT

    //MASTER TUPOKSI
    //ambil data master sub bidang dari database
    function get_tupoksi(){
        $query = $this->db->get('master_tupoksi');
        return $query;
    }

    function get_tupoksi_pgn($limit='', $start=''){
        $query = $this->db->order_by('id_tupoksi','desc')->get('master_tupoksi', $limit, $start);
        return $query;
    }

    function aksi_tupoksi($uri3='', $id='', $post=''){
		$data_update['nm_tupoksi'] = $post['nma_tupoksi'];
    	if($uri3=='tambah_tupoksi'):
			$data_update['status_tupoksi'] = 1;
			$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->insert('master_tupoksi', $data_update);
        endif;
        if($uri3=='ubah_tupoksi'):
        	$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->where('id_tupoksi',decrypt_url($id))->update('master_tupoksi', $data_update);
        endif;
        if($uri3=='hapus_tupoksi'):
        	$query = $this->db->where('id_tupoksi',decrypt_url($id))->delete('master_tupoksi');
        endif;

        return $query;
    }
    //END MASTER TUPOKSI

    //MASTER PANGKAT
    //ambil data master pangkat dari database
    function get_pangkat(){
        $query = $this->db->get('master_pangkat');
        return $query;
    }

    function get_pangkat_pgn($limit='', $start=''){
        $query = $this->db->order_by('id_pangkat','desc')->get('master_pangkat', $limit, $start);
        return $query;
    }

    function aksi_pangkat($uri3='', $id='', $post=''){
		$data_update['nm_pangkat'] = $post['nma_pangkat'];
    	if($uri3=='tambah_pangkat'):
			$data_update['status_pangkat'] = 1;
			$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->insert('master_pangkat', $data_update);
        endif;
        if($uri3=='ubah_pangkat'):
        	$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->where('id_pangkat',decrypt_url($id))->update('master_pangkat', $data_update);
        endif;
        if($uri3=='hapus_pangkat'):
        	$query = $this->db->where('id_pangkat',decrypt_url($id))->delete('master_pangkat');
        endif;

        return $query;
    }

    //ambil data master sub jenis pangkat dari database
    function get_subpangkat($sub){
        $query = $this->db->get('master_'.$sub);
        return $query;
    }

    function aksi_subpangkat($uri3='', $id='', $post=''){
    	$sub = substr($uri3, 6);
		$data_update[$sub] = $post['nma_'.$sub];
    	if($uri3=='tamba_'.$sub):
			$data_update['status_'.$sub] = 1;
			$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->insert('master_'.$sub, $data_update);
        endif;
        if($uri3=='rubah_'.$sub):
        	$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->where('id_'.$sub,decrypt_url($id))->update('master_'.$sub, $data_update);
        endif;
        if($uri3=='hapus_'.$sub):
        	$query = $this->db->where('id_'.$sub,decrypt_url($id))->delete('master_'.$sub);
        endif;

        return $query;
    }
    //END MASTER PANGKAT
    
    //MASTER TEMPAT KERJA
    //ambil data master tempat kerja dari database
    function get_tempatkerja(){
        $query = $this->db->get('master_tempatkerja');
        return $query;
    }

    //untuk paginasi tempat kerja
    function get_tempatkerja_pgn($limit='', $start=''){
    	// $this->db->order_by('id_tempatkerja','desc');
        $query =  $this->db->get('master_tempatkerja', $limit, $start);
        return $query;
    }

    function aksi_tempatkerja($uri3='', $id='', $post=''){
		$data_update['nm_tempatkerja'] = $post['nma_tempat_kerja'];
    	if($uri3=='tambah_tempat_kerja'):
			$data_update['status_tempatkerja'] = 1;
			$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->insert('master_tempatkerja', $data_update);
        endif;
        if($uri3=='ubah_tempat_kerja'):
        	$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->where('id_tempatkerja',decrypt_url($id))->update('master_tempatkerja', $data_update);
        endif;
        if($uri3=='hapus_tempat_kerja'):
        	$query = $this->db->where('id_tempatkerja',decrypt_url($id))->delete('master_tempatkerja');
        endif;
        return $query;
    }
    //END MASTER UNIT KERJA

    //MASTER HUKUMAN
    //ambil data master hukuman dari database
    function get_hukuman(){
        $query = $this->db->get('master_hukuman');
        return $query;
    }

    function get_hukuman_pgn($limit='', $start=''){
        $query = $this->db->order_by('id_hukuman','desc')->get('master_hukuman', $limit, $start);
        return $query;
    }

    function aksi_hukuman($uri3='', $id='', $post=''){
		$data_update['nm_hukuman'] = $post['nma_hukuman'];
    	if($uri3=='tambah_hukuman'):
			$data_update['status_hukuman'] = 1;
			$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->insert('master_hukuman', $data_update);
        endif;
        if($uri3=='ubah_hukuman'):
        	$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->where('id_hukuman',decrypt_url($id))->update('master_hukuman', $data_update);
        endif;
        if($uri3=='hapus_hukuman'):
        	$query = $this->db->where('id_hukuman',decrypt_url($id))->delete('master_hukuman');
        endif;

        return $query;
    }

    //ambil data master sub jenis hukuman dari database
    function get_subhukuman($sub){
        $query = $this->db->get('master_'.$sub);
        return $query;
    }

    function aksi_subhukuman($uri3='', $id='', $post=''){
    	$sub = substr($uri3, 6);
		$data_update[$sub] = $post['nma_'.$sub];
    	if($uri3=='tamba_'.$sub):
			$data_update['status_'.$sub] = 1;
			$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->insert('master_'.$sub, $data_update);
        endif;
        if($uri3=='rubah_'.$sub):
        	$data_update = $this->security->xss_clean($data_update);
        	$query = $this->db->where('id_'.$sub,decrypt_url($id))->update('master_'.$sub, $data_update);
        endif;
        if($uri3=='hapus_'.$sub):
        	$query = $this->db->where('id_'.$sub,decrypt_url($id))->delete('master_'.$sub);
        endif;

        return $query;
    }
    //END MASTER HUKUMAN

    
    
} 