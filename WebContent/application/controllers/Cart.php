<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url'); 
        $this->load->library('session');
        $this->load->model('costumers_model');
    }
    
	public function index(){
        $form_data = $this -> input -> post();
        $result = $this -> costumers_model -> fare qui come in create_user() in Register.php
		$this->load->view('cart');
	}
    
    public function add_to_cart(){
        //??
        $this->load->view('cart');
    }
    
}
