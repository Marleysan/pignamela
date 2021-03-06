<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModifyPassword extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('customers_model');
        $this->load->model('profile_model');
    }
    
	public function index(){
		$this->load->view('modifyPassword');
	}
    
    public function update_password(){
        if (isset($_SESSION['user_id'])){
        $form_data = $this->input->post();
        $form_data['password'] = password_hash($form_data['password'], PASSWORD_BCRYPT);
        $result = $this->customers_model-> change_password($form_data);
        
        //change_password torna 
        //changed se ha cambiato la password
        //not_changed se -la password è uguale a quella già inserita
        
        if($result=="wrong_password"){
            $data['error'] = "Prior password is wrong!";
            $data['profile_data'] = $this -> profile_model -> get_profile_data();
            $this->load->view('modifyPassword', $data);
        } else {
            if ($result=="not_changed") {
            $data['error'] = "Your new password is your already in use one.";
            $data['profile_data'] = $this -> profile_model -> get_profile_data();
            $this->load->view('modifyPassword', $data);
        } else {
            if ($result == "NULL") {
                $data['error'] = "Problems with the database! Password not changed.";
                $data['profile_data'] = $this -> profile_model -> get_profile_data();
                $this->load->view('modifyPassword', $data);
            } else {
                redirect('profile/open_profile');
            }
        }
        } 
    }else {
        $info["error"] = "You need to be logged in to access this content!";
            $this->load->view('login', $info);
    }
    }
}
