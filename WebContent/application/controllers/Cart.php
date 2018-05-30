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
    }
    
	public function index(){
        $form_data = $this -> input -> post();
        //$result = $this -> customers_model -> 
		$this->load->view('cart');
	}
    
    public function add_to_cart($product_id){
        $form_data = $this -> input -> post();
        //id utente da session $_SESSION['user_id']
        //se session è vuoto -> login
        echo "bottone addtoCart è stato premuto </br>"; 
        
        
        if (isset($_SESSION['user_id'])){
            //se l'utente è loggato correttamente
            echo "l'utente è loggato </br>";
            
            $result = $this -> carts_model -> check_carts();
            if ($result != 0){
                //se esiste già un cart attivo
                echo "l'utente ha già un cart attivo </br>";
                
                //aggiungo prodotto al cart
                $data = array(
                'detail_product_id' => $product_id,
                'cart_id' => $result,
                'detail_size' => $form_data['size']
                );
                $this -> carts_model -> add_cart_element($data);
                
                //carico i dati per cart
                $cart_data['cart_elements'] = $this -> carts_model -> get_cart_elements();
                
                //apro la cart view
                $this->load->view('cart', $cart_data);
            } else {
                //se non c'è un cart attivo
                echo "l'utente NON ha un cart attivo </br>";
                
                //creazione del carrello attivo per questo utente
                $result = $this -> carts_model -> create_cart();
                echo "id carrello: " . $result;
                
                //aggiungo prodotto al cart
                $data = array(
                'detail_product_id' => $product_id,
                'cart_id' => $result,
                'detail_size' => $form_data['size']
                );
                $this -> carts_model -> add_cart_element($data);
                
                //carico i dati per cart
                $cart_data['cart_elements'] = $this -> carts_model -> get_cart_elements();
                
                //apro la cart view
                $this->load->view('cart', $cart_data);
            }
        }else {
            //se l'utente deve ancora fare il login
            $info["error"] = "you need to do to the login first";
            $this->load->view('login', $info);
        }
    }
    
    
}
