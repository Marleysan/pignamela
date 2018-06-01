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
        $form_data = $this->input->post();
        echo "oldpassword: " . $form_data['oldpassword'] . "</br>";
        echo "password: " . $form_data['password'] . "</br>";
        echo "cpassword: " . $form_data['cpassword'];
        
        $form_data['password'] = password_hash($form_data['password'], PASSWORD_BCRYPT);
        $result = $this->customers_model-> change_password($form_data);
        
        //change_password torna 
        //changed se ha cambiato la password
        //not_changed se -la password è uguale a quella già inserita
        
        
        //fare controlli se l'ha cambiato o no
        if($result=="wrong_password"){
            $data['error'] = "old password is wrong";
            $data['profile_data'] = $this -> profile_model -> get_profile_data($_SESSION['user_id']);
            $this->load->view('modifyPassword', $data);
        } else {
            if ($result=="not_changed") {
            $data['error'] = "password already in use";
            $data['profile_data'] = $this -> profile_model -> get_profile_data($_SESSION['user_id']);
            $this->load->view('modifyPassword', $data);
        } else {
            if ($result == "NULL") {
                $data['error'] = "Problems with the database! password not changed";
                $data['profile_data'] = $this -> profile_model -> get_profile_data($_SESSION['user_id']);
                $this->load->view('modifyPassword', $data);
            } else {
                
                //chiedere a silvia se si può utilizzare open_profile() di Profile.php
                
                $data['profile_data'] = $this -> profile_model -> get_profile_data($_SESSION['user_id']);
                $this->load->view('modifyPassword', $data);
            }
        }
        }
        
    }
     
}