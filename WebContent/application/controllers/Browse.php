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
        //NOTA Importante: se non si chiama più products poi il menù a tendina del category non funziona più
        $data['products'] = $this->products_model->get_products_men();
		$this->load->view('men', $data);
	}
    
    public function openwomen() {
        //NOTA Importante: se non si chiama più products poi il menù a tendina del category non funziona più
        $data['products'] = $this->products_model->get_products_women();
		$this->load->view('women', $data);
	}
    
    public function visualize($id = FALSE){
        if ($id === FALSE){
            $this -> load -> view('articleView');
        } else {
            $data['products'] = $this -> products_model -> get_product($id);
            //qui aggiungere qualcosa
            $data['details'] = $this -> products_model -> get_details($id);
            $this -> load -> view('articleView', $data);
        }

    }
    
    public function filtermen(){
        $form_data = $this -> input -> post();
        
        //NOTA Importante: se non si chiama più products poi il menù a tendina del category non funziona più
        $data['products'] = $this->products_model->get_products_men();
        //implementare metodi filter nel database
        $this -> load -> view('men', $data);
    }
    
    public function filterwomen(){
        $form_data = $this -> input -> post();
        
        //NOTA Importante: se non si chiama più products poi il menù a tendina del category non funziona più
        $data['products'] = $this->products_model->get_products_women();
        //implementare metodi filter nel database
        $this -> load -> view('women', $data);
    }
    
    
}