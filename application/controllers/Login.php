<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        if($this->session->userdata('login') == TRUE){
            redirect('dashboard');
		}
		date_default_timezone_set("Asia/Makassar");
		$this->load->model('user_model');
    }

    function uri(){
		$data['uri1'] = $this->uri->segment(1);
      	$data['uri2'] = $this->uri->segment(2);
      	$data['uri3'] = $this->uri->segment(3);
      	$data['uri4'] = $this->uri->segment(3);
      	return $data;
	}

    public function index()
    {

        // tampilkan halaman login
        $data = $this->uri();
        $this->load->view('login', $data);
    }

    public function cek_username()
	{
        $post = $this->input->post();
        $username = $post['username'];

		if($username == 'superadmin'){
			$session_data = array('username' => 'superadmin');
			$this->session->set_userdata($session_data);
			$user_login[0]['username'] = 1;
		}else{
			$this->db->where('username', $username);
			$user = $this->user_model->getmodUser()->row_array();
			$this->db->where('email', $username);
			$email = $this->user_model->getmodUser()->row_array();
			if($user){
			    $this->db->where('username', $username);
			    $user_login = $this->user_model->getmodUser()->result_array();
				$session_data = array('username' => $user['username']);
				$this->session->set_userdata($session_data);
				$user_login[0]['username'] = 1;
			}elseif($email){
			    $this->db->where('email', $username);
			    $user_login = $this->user_model->getmodUser()->result_array();
				$session_data = array('email' => $email['email']);
				$this->session->set_userdata($session_data);
				$user_login[0]['username'] = 1;
			}else{
				$user_login[0]['username'] = 0;
			}
			
		}
		echo json_encode($user_login);
	}

	public function cek_password()
	{
        $post = $this->input->post();
		$password = $post['password'];
		$username = $this->session->userdata('username');
		$email = $this->session->userdata('email');

		if($email){
			$this->db->where('email', $email);
			$email = $this->user_model->getmodUser()->row_array();
			if($email && $email['password_enc'] == md5($password)){
				foreach ($email as $key => $value) {
					$session_data[$key] = $value;
				}
				$session_data['login'] = TRUE;
				$this->session->set_userdata($session_data);
				$login = 1;
			}else{
				$login = 0;
			}
		}else{
			$this->db->where('username', $username);
			$user = $this->user_model->getmodUser()->row_array();
			if($user && $user['password_enc'] == md5($password)){
				foreach ($user as $key => $value) {
					$session_data[$key] = $value;
				}
				$session_data['login'] = TRUE;
				$this->session->set_userdata($session_data);
				$login = 1;
			}else{
				$login = 0;
			}
		}
		echo json_encode($login);
	}

    public function _masuk()
    {
        $post = $this->input->post();
        $username = $post['username'];
        $password = $post['username'];

        $this->db->where('username', $username);
        $user = $this->user_model->getmodUser()->row_array();

        if($user):
            //User ada
        else:
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><i class="ti-close"></i></button>
            <strong>Gagal!</strong> User belum terdaftar</div>');
            redirect('login');
        endif;
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}