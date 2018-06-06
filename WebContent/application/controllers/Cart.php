<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url'); 
        $this->load->library('session');
        $this->load->model('customers_model');
        $this->load->model('carts_model');
        $this->load->model('products_model');
    }
    
	public function index(){
        redirect('cart/open_cart');
	}
    
    public function open_confirmation(){
        if (isset($_SESSION['user_id'])){
            $cart_id = $this -> carts_model -> check_carts();
            if ($cart_id == 0){
                $info["error"] = "your cart is empty, add product to your cart to proceed shopping";
                $this->load->view('index', $info);
            } 
            $data['elements'] = $this -> carts_model -> get_cart_elements();
            
            if ($data['elements'] == array()){
                $info["error"] = "your cart is empty, add product to your cart to proceed shopping";
                $this->load->view('index', $info);
            }
            
            $data['address'] = $this -> carts_model -> get_last_address();          
            
            $this->load->view('paymentConfirmation', $data);
        } else {
            $info["error"] = "you need to do to the login first";
            $this->load->view('login', $info);
        }
        
    }
    
    public function add_to_cart($product_id){
        $form_data = $this -> input -> post();
        //se session è vuoto -> login
        
    
        if (isset($_SESSION['user_id'])){
            //se l'utente è loggato correttamente
            //echo "l'utente è loggato </br>";
            
            $cart_id = $this -> carts_model -> check_carts();
            if ($cart_id != 0){
                //se esiste già un cart attivo
                //echo "l'utente ha già un cart attivo </br>";
                
                //aggiungo prodotto al cart
                $data = array(
                'detail_product_id' => $product_id,
                'cart_id' => $cart_id,
                'detail_size' => $form_data['size']
                );
                $this -> carts_model -> add_cart_element($data);
                
                //apro la cart view
                redirect('cart/open_cart');
            } else {
                //se non c'è un cart attivo
                //echo "l'utente NON ha un cart attivo </br>";
                
                //creazione del carrello attivo per questo utente
                $cart_id = $this -> carts_model -> create_cart();
               // echo "id carrello: " . $cart_id;
                
                //aggiungo prodotto al cart
                $data = array(
                'detail_product_id' => $product_id,
                'cart_id' => $cart_id,
                'detail_size' => $form_data['size']
                );
                $this -> carts_model -> add_cart_element($data);
                
                //apro la cart view
                redirect('cart/open_cart');
            }
        }else {
            //se l'utente deve ancora fare il login
            $info["error"] = "you need to do to the login first";
            $this->load->view('login', $info);
        }
    }
    
    public function open_cart(){
        if (isset($_SESSION['user_id'])){
            $cart_id = $this -> carts_model -> check_carts();
            if ($cart_id == 0){
                $cart_id = $this -> carts_model -> create_cart();  
            } 
            
            $data['elements'] = $this -> carts_model -> get_cart_elements();
            
            $this -> load -> view('cart', $data);
        } else {
            $info["error"] = "you need to do to the login first";
            $this->load->view('login', $info);
        }
        
    }
    
    
    public function update_element($detail_id){
        $quantity = $this -> input -> post('quantity');
        
        if($quantity > 0) {
            $cart_id = $this -> carts_model -> check_carts();
            $this->carts_model->update_cart_element($cart_id, $quantity, $detail_id);
        }
        
        redirect('cart/open_cart');
    }
    
    
    public function remove_element($detail_id){
        $cart_id = $this -> carts_model -> check_carts();
        $this -> carts_model -> remove_cart_element($detail_id, $cart_id);
        redirect('cart/open_cart');
    }
    
    
    public function proceed_order() {
        
        if (isset($_SESSION['user_id'])){
            $cart_id = $this -> carts_model -> check_carts();
            if ($cart_id == 0){
                $info["error"] = "your cart is empty, add product to your cart to proceed shopping";
                $this->load->view('index', $info);
            } 
            $cart_elements = $this -> carts_model -> get_cart_elements();
           
            
            if ($cart_elements == array()){
                $info["error"] = "your cart is empty, add product to your cart to proceed shopping";
                $this->load->view('index', $info);
            }
            
            $form_data = $this->input->post();
            
            
            if (isset($form_data['street'])){
                // nuovo indirizzo   
                $address_id = $this -> carts_model -> save_address($form_data);
                
                
            } else {
                // vecchio indirizzo
                $result = $this -> carts_model -> get_last_address();
                $address_id = $result['address_id'];
                
            }
            
            //aggiornare cart ordered e address e date_create
            $this -> carts_model -> update_cart($address_id);
            
            
            //aggiornamento della quantity
            foreach ($cart_elements as $element){
                if ($element['element_quantity'] >= $element['detail_quantity']){
                    $this -> products_model -> update_quantity($element['element_detail_id'], '0');
                } else {
                    $this -> products_model -> update_quantity($element['element_detail_id'], ($element['element_quantity'] - $element['detail_quantity']));
                }
                
            }
            
            //order successful
            $info["error"] = "Success! Order correctly placed";
            $this->load->view('index', $info);
            
            
        } else {
            $info["error"] = "you need to do to the login first";
            $this->load->view('login', $info);
        }
        
    }
    
    
}
