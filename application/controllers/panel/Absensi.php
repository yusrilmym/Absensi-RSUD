<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
    public function __construct()
	{
        parent::__construct();
        
        $this->session->set_userdata('title', 'Absensi');
        $this->session->set_userdata('sub_title', 'Absensi');

        // Cek login
        if(!is_login()) {
            redirect('panel/login');
        }
    }

	public function index()
	{
        $crud = new grocery_CRUD();
        
        $crud->set_theme('datatables');
        $crud->set_table('tb_absensi')
        ->set_subject('Absensi')
        ->columns('nip', 'status_absensi', 'waktu_absensi', 'validasi_absensi');
 
        $crud->display_as('nip', 'NIP');
        $crud->display_as('status_absensi', 'Status');
        $crud->display_as('waktu_absensi', 'Waktu');
        $crud->display_as('ip_address', 'IP Address');
        $crud->display_as('validasi_absensi', 'Validasi');
    
        $state = $crud->getState();
        $state_info = $crud->getStateInfo();

        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_clone();

        $output = $crud->render();

        if($state == 'read') {
            $id_absensi = $this->uri->segment(5);
            $absensi = $this->db->get_where('tb_absensi', array('id_absensi' => $id_absensi))->row();
            $penempatan = $this->db->get_where('tb_penempatan', array('nip' => $absensi->nip))->row();

            $parser['absensi'] = $absensi;
            $parser['penempatan'] = $penempatan;
            $this->load->view('panel/absensi/view', $parser);
        } else {
            render_template($output);
        }
    }

    public function proses_edit() {
        $id_absensi = $this->input->post('id_absensi');
        $validasi_absensi = $this->input->post('validasi_absensi');

        $data = array(
            'validasi_absensi' => $validasi_absensi
        );

        $where = array('id_absensi' => $id_absensi);

        $this->db->update('tb_absensi', $data, $where);

        redirect('panel/absensi');
    }
}
