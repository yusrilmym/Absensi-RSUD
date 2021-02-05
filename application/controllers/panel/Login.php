<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index() {
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('nip');

		$this->load->view('panel/login/index');
	}

	public function proses_logout() {
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('nip');

		redirect('panel/login');
	}

	public function proses_login() {
	    $response = array();
	    
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username' => $username,
			'password' => md5(SECRET_KEY . $password)
		);

		$query = $this->db->get_where('tb_admin', $where);
		$total = $query->num_rows();
		$result = $query->row();

		if($total == 0) {
			$response['success'] = false;
			$response['message'] = "Username dan kata sandi Anda tidak aktif.";
			$response['url'] = "";
		} else {
		    $response['success'] = true;
			$response['message'] = "Login berhasil. Tunggu beberapa saat....";
			$response['url'] = site_url('panel/admin');
			
			$this->session->set_userdata('logged_in', true);
			$this->session->set_userdata('nip', $result->nip);
		}
		
		echo json_encode($response);
	}
}
