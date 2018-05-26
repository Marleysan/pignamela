<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Browse extends CI_Controller {

	public function __construct() {
                
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url'); 
        $this->load->model('products_model');
        $this->load->library('session');
    }
    
	public function openmen() { 
        $data['products'] = $this->products_model->get_products_men();
		$this->load->view('men', $data);
	}
    
    public function openwomen() {
        $data['products'] = $this->products_model->get_products_women();
		$this->load->view('women', $data);
	}
    
    public function visualize($id = FALSE){
        if ($id === FALSE){
            $this -> load -> view('articleView');
        } else {
            $data['products'] = $this -> products_model -> get_product($id);
            $this -> load -> view('articleView', $data);
        }
        
    }
}


