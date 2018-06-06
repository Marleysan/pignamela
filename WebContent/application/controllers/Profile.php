<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('profile_model');
        $this->load->model('carts_model');
    }
    
	public function index(){
		$this->load->view('profile');
	}  
    
    public function logout() {
        unset(
            $_SESSION['user_id']
        );
        redirect('home/index');
    }
    
    public function open_profile(){
        if (isset($_SESSION['user_id'])){
            $data['profile_data'] = $this -> profile_model -> get_profile_data();
            
            $result['carts'] = $this->carts_model->get_old_carts();
            $items = array();
            foreach($result['carts'] as $cart) {
                $cart['total'] = $this->carts_model->get_total_by_cart_id($cart['cart_id']);
                $items[] = $cart;
            }
            
            $data['carts'] = $items;            
            $this->load->view('profile', $data);
        } else {
            //if the user still needs to perform login
            $info["error"] = "You need to be logged in to access profile page!";
            $this->load->view('login', $info);
        }
        
    }
    
    public function modify_password () {
        if (isset($_SESSION['user_id'])){
            $data['profile_data'] = $this -> profile_model -> get_profile_data();
            $this->load->view('modifyPassword', $data);
        } else {
            //if the user still needs to perform login
            $info["error"] = "You need to be logged in to access this page!";
            $this->load->view('login', $info);
        }
    }
    
    
    public function view_old_cart($id_cart) {
        //TODOs
        //check if this cart belongs to the current customer
        //check if session id is set
        //other checks (if cart exists)
        $data['elements'] = $this->carts_model->get_cart_elements_by_cart_id($id_cart);
        $this->load->view('old_cart', $data);
    }
}
