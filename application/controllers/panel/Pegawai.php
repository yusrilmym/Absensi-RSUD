<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
    public function __construct()
	{
        parent::__construct();
        
        $this->session->set_userdata('title', 'Pegawai');
        $this->session->set_userdata('sub_title', 'Pegawai');

        // Cek login
        if(!is_login()) {
            redirect('panel/login');
        }
    }

	public function index()
	{
        $crud = new grocery_CRUD();
        
        $crud->set_theme('datatables');
        $crud->set_table('tb_pegawai')
        ->set_subject('Pegawai')
        ->columns('nip', 'username', 'password');
 
        $crud->display_as('nip', 'NIP');
        $crud->display_as('username', 'Username');
    
        $crud->fields('nip', 'username', 'password');

        $crud->required_fields(array('nip', 'username'));
        $crud->unique_fields(array('nip', 'username'));

        $state = $crud->getState();
        $state_info = $crud->getStateInfo();

        if($state == 'edit') {
            $crud->display_as('password', 'Ganti Password');
        }

        $crud->callback_edit_field('password', function($value, $primary_key) {return '<input type="text" value="" name="password" />';});
        $crud->callback_before_update(array($this, 'before_update'));
        $crud->callback_before_insert(array($this, 'before_insert'));

        $crud->unset_clone();

        // $crud->unset_jquery();
        // $crud->unset_back_to_list();
        
        $output = $crud->render();

		render_template($output);
    }

    function before_update($post_array, $primary_key) {
        $new_password = $post_array['password'];

        if(!empty($new_password)) {
            $post_array['password'] = md5(SECRET_KEY . $new_password);
        } else {
            unset($post_array['password']);
        }

        return $post_array;
    }

    function before_insert($post_array) {
        $new_password = $post_array['password'];

        $post_array['password'] = md5(SECRET_KEY . $new_password);
        
        return $post_array;
    }
}
