<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArticleView extends CI_Controller {

	public function __construct() {
                
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url'); 
        $this->load->model('products_model');
        $this->load->library('session');
    }
    
	public function get_size($product_id){
        
    }
}


