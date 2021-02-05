<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
	{
        parent::__construct();
        
        // Cek login
        if(!is_login_client()) {
            redirect('login');
        }
    }

	public function index() {
        $nip = $this->session->userdata('nip_client');
        $date = date('Y-m-d');

        $penempatan = $this->db->get_where('tb_penempatan', array('nip' => $nip))->row();
        
        $this->db->where('status_absensi', 'Masuk');
        $this->db->where('nip', $nip);
        $this->db->like('waktu_absensi', $date);
        $masuk = $this->db->get('tb_absensi')->row();

        $this->db->where('status_absensi', 'Pulang');
        $this->db->where('nip', $nip);
        $this->db->like('waktu_absensi', $date);
        $pulang = $this->db->get('tb_absensi')->row();

        $parser['penempatan'] = $penempatan;
        $parser['masuk'] = $masuk;
        $parser['pulang'] = $pulang;

        $this->load->view('dashboard', $parser);
    }

    public function absen_masuk() {
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $ip_address = $this->input->post('ip_address');

        $nip = $this->session->userdata('nip_client');
        $date = date('Y-m-d');
        $date2 = date('Y-m-d H:i:s');

        $this->db->where('status_absensi', 'Masuk');
        $this->db->where('nip', $nip);
        $this->db->like('waktu_absensi', $date);
        $masuk = $this->db->get('tb_absensi')->row();

        $data = array(
            'status_absensi' => 'Masuk',
            'waktu_absensi' => $date2,
            'nip' => $nip,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'ip_address' => $ip_address,
            'validasi_absensi' => 'Belum Divalidasi'
        );

        if($masuk == null) {
            $this->db->insert('tb_absensi', $data);
        }

        redirect('dashboard');
    }

    public function absen_pulang() {
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $ip_address = $this->input->post('ip_address');

        $nip = $this->session->userdata('nip_client');
        $date = date('Y-m-d');
        $date2 = date('Y-m-d H:i:s');

        $this->db->where('status_absensi', 'Pulang');
        $this->db->where('nip', $nip);
        $this->db->like('waktu_absensi', $date);
        $pulang = $this->db->get('tb_absensi')->row();

        $data = array(
            'status_absensi' => 'Pulang',
            'waktu_absensi' => $date2,
            'nip' => $nip,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'ip_address' => $ip_address,
            'validasi_absensi' => 'Belum Divalidasi'
        );

        if($pulang == null) {
            $this->db->insert('tb_absensi', $data);
        }

        redirect('dashboard');
    }
}
