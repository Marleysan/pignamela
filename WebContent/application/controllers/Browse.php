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
        $data['allproducts'] = $this->products_model->get_products_men();
        $data['products'] = $this->products_model->get_products_men();
		$this->load->view('men', $data);
	}
    
    public function openwomen() {
        //NOTA Importante: se non si chiama più products poi il menù a tendina del category non funziona più
        $data['allproducts'] = $this->products_model->get_products_women();
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
        
        $season = $form_data['season'];
        if ($season == "Spring/Summer"){
            $season = "SS";
        } else if ($season == "Fall/Winter"){
            $season = "FW";
        } else {
            $season = FALSE;
        }
        
        $priceMin = FALSE;
        $priceMax = FALSE;
        $price = $form_data['price'];
        if ($price == "0 - 50"){
            $priceMin = '0';
            $priceMax = '50';
        } else if ($price == "50 - 100"){
            $priceMin = '50';
            $priceMax = '100';
        } else if ($price == "100 - 200"){
            $priceMin = '100';
            $priceMax = '200';
        } else if ($price == "200+"){
            $priceMin = '200';
            $priceMax = '1000';
        }
        
        $type = FALSE;
        if ($form_data['type'] != "-- Category --"){
            $type = $form_data['type'];
        }
        
        //NOTA Importante: se non si chiama più products poi il menù a tendina del category non funziona più
        $data['products'] = $this->products_model->get_products_men_filtered($season, $priceMin, $priceMax, $type); 
        $data['allproducts'] = $this -> products_model -> get_products_men();
        //implementare metodi filter del database
        $this -> load -> view('men', $data);
    }
    
    public function filterwomen(){
        $form_data = $this -> input -> post();
        
        $season = $form_data['season'];
        if ($season == "Spring/Summer"){
            $season = "SS";
        } else if ($season == "Fall/Winter"){
            $season = "FW";
        } else {
            $season = FALSE;
        }
        
        $priceMin = FALSE;
        $priceMax = FALSE;
        $price = $form_data['price'];
        if ($price == "0 - 50"){
            $priceMin = '0';
            $priceMax = '50';
        } else if ($price == "50 - 100"){
            $priceMin = '50';
            $priceMax = '100';
        } else if ($price == "100 - 200"){
            $priceMin = '100';
            $priceMax = '200';
        } else if ($price == "200+"){
            $priceMin = '200';
            $priceMax = '1000';
        }
        
        $type = FALSE;
        if ($form_data['type'] != "-- Category --"){
            $type = $form_data['type'];
        }
        
        //NOTA Importante: se non si chiama più products poi il menù a tendina del category non funziona più
        $data['products'] = $this->products_model->get_products_women_filtered($season, $priceMin, $priceMax, $type); 
        $data['allproducts'] = $this->products_model->get_products_women();
        //implementare metodi filter nel database
        $this -> load -> view('women', $data);
    }
    
}