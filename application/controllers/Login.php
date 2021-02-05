<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
        parent::__construct();
    }

	public function index() {
		// Cek login
        if(!is_login_client()) {
            $this->session->unset_userdata('logged_in_client');
			$this->session->unset_userdata('nip_client');
        } else {
        	redirect('dashboard');
        }
        
		$this->load->view('login');
	}

	public function proses_logout() {
		$this->session->unset_userdata('logged_in_client');
		$this->session->unset_userdata('nip_client');

		redirect('login');
	}

	public function proses_login() {
	    $response = array();
	    
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username' => $username,
			'password' => md5(SECRET_KEY . $password)
		);

		$query = $this->db->get_where('tb_pegawai', $where);
		$total = $query->num_rows();
		$result = $query->row();

		if($total == 0) {
			$response['success'] = false;
			$response['message'] = "Username dan kata sandi Anda SALAH";
			$response['url'] = "";
		} else {
		    $response['success'] = true;
			$response['message'] = "Login berhasil. Tunggu beberapa saat....";
			$response['url'] = site_url('dashboard');
			
			$this->session->set_userdata('logged_in_client', true);
			$this->session->set_userdata('nip_client', $result->nip);
		}
		
		echo json_encode($response);
	}
}
