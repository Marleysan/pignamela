<?php
class Carts_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
            $this->load->helper('url');
            $this->load->library('session');
        }
    
         
    //controlla se esiste un cart collegato di un utente e che il ordered value sia "false" -> se lo trova torna true, altrimenti false
        public function check_carts(){
            $myBool = false;
            $query = $this -> db -> get_where('cart',"cart_costumer_id = '" . $_SESSION['user_id'] . "' AND cart_ordered = '0'");
            if ($query->num_rows() != 0){
                $myBool = true;
            }
            
            return $myBool;
        }
    
    //crea un cart nuovo per l'utente 
        public function create_cart(){
            $data = array(
                    'cart_costumer_id' => $_SESSION['user_id'],
                );
            
            $this->db->insert('cart', $data);
            // Return the id of inserted row
            return $idOfInsertedData = $this->db->insert_id();
        }
    
    //aggiunge un elemento a il cart attivo dell'utente
        public function add_cart_element(){
            //ciaone ghira
        }
    
    public function get_cart(){
        $query = $this -> db -> get_where('cart', "cart_costumer_id = '" . $_SESSION['user_id'] . "' AND cart_ordered = '0'");
        return $query  -> row_array();
    }
    
    public function get_cart_elements(){
        $data = $this -> get_cart();
        $query = $this -> db -> get_where('cart_element', "element_cart_id = " . $data['cart_id']);
        return $query -> result_array();
    }
}