<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
                
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url'); 
        $this->load->library('session');
        $this->load->model('admin_model');
        $this->load->model('products_model');
    }
    
    public function index(){
        
        $this->load->view("admin");
    }
    
    public function logout() {
        unset(
            $_SESSION['user_id']
        );
        $this->load->view('admin');
    }
    
    public function adminPanel () {
        
        //TODO if session id not set
        if (isset($_SESSION['user_id'])) {
            $data['admin_data'] = $this->admin_model->get_admin_data($_SESSION['user_id']);
            $data['products'] = $this->products_model->get_all_products_detail();
            $this->load->view('adminPanel', $data);
        }
        else {
            $form_data['error'] = "Please log in befor entering adminPanel!";
            $this->load->view('admin', $form_data);
        }
    }
    
    public function do_login() {
        $form_data = $this->input->post();
        $data = $this->admin_model->get_admin($form_data["username"], $form_data["password"]);
        if ($data == false) {
            $form_data['error'] = "Wrong username or password";
            $this->load->view('admin', $form_data);
        } else {
            //TODO settare session
            $this->session->user_id = $data["admin_id"];
            redirect('admin/adminPanel');
            
        }
    }
    
    public function change_quantity($detail_id) {
        $form_data = $this->input->post();
        $quantity = $this->input->post("quantity");
        echo "Detail ".$detail_id." quantity ".$quantity;
        
        $result = $this->products_model->get_detail($detail_id);
        $actual_quantity = $result['detail_quantity'];
        
        $final_quantity = $actual_quantity + $quantity;
        
        $this->products_model->update_quantity($detail_id, $final_quantity);
        
    }
    
}