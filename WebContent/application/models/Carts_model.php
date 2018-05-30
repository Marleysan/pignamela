<?php
class Carts_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->model('carts_model');
        }
    
         
    //controlla se esiste un cart collegato di un utente e che il ordered value sia "false" -> se lo trova torna true, altrimenti false
        public function check_carts(){
            $cartID = 0;
            $query = $this -> db -> get_where('cart',"cart_customer_id = '" . $_SESSION['user_id'] . "' AND cart_ordered = '0'");
            if ($query->num_rows() != 0){
                $ret = $query->row();
                $cartID = $ret -> cart_id;
            }
            echo "</br></br>" . $cartID . "</br></br>   ";
            return $cartID;
        }
    
    //crea un cart nuovo per l'utente 
        public function create_cart(){
            $data = array(
                    'cart_customer_id' => $_SESSION['user_id'],
                );
            
            $this->db->insert('cart', $data);
            // Return the id of inserted row
            return $idOfInsertedData = $this->db->insert_id();
        }
    
    //aggiunge un elemento a il cart attivo dell'utente
        public function add_cart_element($data){
            $detail = array(
                'detail_product_id' => $data['detail_product_id'],
                'detail_size' => $data['detail_size']
                );
            $detail_id = $this -> get_detail_id($detail);
            echo "il detail id del prodotto specificato è :" . $detail_id;
            
            $element = array(
                'element_cart_id' => $data['cart_id'],
                'element_detail_id' => $detail_id
            );
            $this->db->insert('cart_element', $element); 
            
            
            
        }
    
    public function get_detail_id($data){
        $query = $this -> db -> get_where('product_detail',"detail_product_id = '" . $data['detail_product_id'] . "' AND detail_size = '" . $data['detail_size'] . "'");
        
        $ret = $query->row();
        
        return $ret -> detail_id;
    }
    
    public function get_cart(){
        $query = $this -> db -> get_where('cart', "cart_customer_id = '" . $_SESSION['user_id'] . "' AND cart_ordered = '0'");
        return $query  -> row_array();
    }
    
    public function get_cart_elements(){
        $data = $this -> get_cart();
        $query = $this -> db -> get_where('cart_element', "element_cart_id = " . $data['cart_id']);
        return $query -> result_array();
    }
}