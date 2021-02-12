<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	// public function __construct() {
	// 	parent::__construct();
	// }

	public function index()
	{
	// 	$date = array('log_terakhir_akun' => date('Y-m-d H:i:s'));
	// 	$this->db->where('id_user', $id)->update('user', $date);
		session_destroy();
		redirect('login');
	}

// 	public function set_apk(){
// 		$sa = $this->db->get('setting_aplikasi')->result_array();
// 		$setting = array_column($sa, 'value', 'key');
// 		return $setting;
// 	}
}
