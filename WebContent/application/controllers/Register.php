<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('costumers_model');
    }
    
	public function index(){
		$this->load->view('register');
	}  
    
    public function create_user(){
        $form_data = $this->input->post();
        $result = $this->costumers_model->create_new($form_data);
        if ($result == NULL) {
            //TODO inviare messaggio esplicativo
            $this->load->view('register');
        } else {
            //TODO settare session
            $this->load->view('login');
        }
    }
    
}
