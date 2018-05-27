<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('costumers_model');
    }
    
	public function index() {  
        $this->load->view('login');
	}
    
        //TODO check for particular characters inside email and password
    public function do_login() {
        $form_data = $this->input->post();
        $data = $this->costumers_model->get_costumer($form_data["email"], $form_data["password"]);
        if ($data == false) {
            $form_data['db_error'] = "Wrong email or password";
            $this->load->view('login', $form_data);
        } else {
            //TODO settare session
            $this->session->user_id = $data["costumer_id"];
            $this->load->view('index');
        }
    }

}