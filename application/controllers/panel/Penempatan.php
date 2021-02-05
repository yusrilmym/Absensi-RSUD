<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penempatan extends CI_Controller {
    public function __construct()
	{
        parent::__construct();
        
        $this->session->set_userdata('title', 'Penempatan');
        $this->session->set_userdata('sub_title', 'Penempatan');

        // Cek login
        if(!is_login()) {
            redirect('panel/login');
        }
    }

	public function index()
	{
        $crud = new grocery_CRUD();
        
        $crud->set_theme('datatables');
        $crud->set_table('tb_penempatan')
        ->set_subject('Penempatan')
        ->columns('nip', 'lokasi', 'jam_masuk', 'jam_pulang');
 
        $crud->display_as('nip', 'NIP');
        $crud->display_as('lokasi', 'Lokasi');
        $crud->display_as('jam_masuk', 'Jam Masuk');
        $crud->display_as('jam_pulang', 'Jam Pulang');

        $state = $crud->getState();
        $state_info = $crud->getStateInfo();

        $crud->unset_clone();

        $output = $crud->render();

        $parser['semua_pegawai'] = $this->db->get('tb_pegawai')->result();

        if($state == 'add') {
            $this->load->view('panel/penempatan/add', $parser);
        } else if($state == 'edit') {
            $id_penempatan = $this->uri->segment(5);

            $parser['penempatan'] = $this->db->get_where('tb_penempatan', array('id_penempatan' => $id_penempatan))->row();
            $this->load->view('panel/penempatan/edit', $parser);
        } else {
            render_template($output);
        }
    }

    public function proses_tambah() {
        $nip = $this->input->post('nip');
        $lokasi = $this->input->post('lokasi');
        $jam_masuk = $this->input->post('jam_masuk');
        $jam_pulang = $this->input->post('jam_pulang');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');

        $data = array(
            'nip' => $nip,
            'lokasi' => $lokasi,
            'jam_masuk' => $jam_masuk,
            'jam_pulang' => $jam_pulang,
            'latitude' => $latitude,
            'longitude' => $longitude
        );

        $this->db->insert('tb_penempatan', $data);

        redirect('panel/penempatan');
    }

    public function proses_edit() {
        $id_penempatan = $this->input->post('id_penempatan');
        $nip = $this->input->post('nip');
        $lokasi = $this->input->post('lokasi');
        $jam_masuk = $this->input->post('jam_masuk');
        $jam_pulang = $this->input->post('jam_pulang');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');

        $data = array(
            'nip' => $nip,
            'lokasi' => $lokasi,
            'jam_masuk' => $jam_masuk,
            'jam_pulang' => $jam_pulang,
            'latitude' => $latitude,
            'longitude' => $longitude
        );

        $where = array('id_penempatan' => $id_penempatan);

        $this->db->update('tb_penempatan', $data, $where);

        redirect('panel/penempatan');
    }
}
