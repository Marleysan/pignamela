<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('customers_model');
    }
    
	public function index(){
		$this->load->view('register');
	}  
    
    public function create_user(){
        $form_data = $this->input->post();
        $form_data['password'] = password_hash($form_data['password'], PASSWORD_BCRYPT);
        $result = $this->customers_model->create_new($form_data);
        if ($result=="existing") {
            $form_data['error'] = "Email already used";
            $this->load->view('register', $form_data);
        } else {
            if ($result == NULL) {
                $form_data['error'] = "Problems with the database";
                $this->load->view('register', $form_data);
            } else {
                //TODO settare session
                $this->load->view('login');
            }
        }
    }
    
}