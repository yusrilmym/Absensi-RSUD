<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('render_template')) {
    function render_template($output = null) {
        $ci =& get_instance();

        $ci->load->view('template.php', (array) $output);
    }
}

if(!function_exists('checkData')) {
    function checkData($table, $column, $value) {
        $ci =& get_instance();

        $result = $ci->db->get_where($table, array($column => $value))->num_rows();

        if($result > 0) {
            return true;
        } else {
            return false;
        }
    }
}

if(!function_exists('getData')) {
    function getData($table, $column, $value, $key) {
        $ci =& get_instance();

        $query = $ci->db->get_where($table, array($column => $value));
        $total = $query->num_rows();
        $result = $query->row();

        if($total > 0) {
            return $result->$key;
        } else {
            return "-";
        }
    }
}

if(!function_exists('is_login')) {
    function is_login() {
        $ci =& get_instance();

        if($ci->session->has_userdata('logged_in')) {
            return true;
        } else {
            return false;
        }
    }
}

if(!function_exists('is_login_client')) {
    function is_login_client() {
        $ci =& get_instance();

        if($ci->session->has_userdata('logged_in_client')) {
            return true;
        } else {
            return false;
        }
    }
}