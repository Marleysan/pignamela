<?php
class Customers_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
            $this->load->helper('url');
        }
    
        public function get_customer($email, $password){
            $query = $this->db->get_where('customer', array('customer_email' => $email));
            if ($query) {
                $data = $query->row_array();
                if (password_verify($password, $data["customer_password"])) {
                    return $data;
                }
                else {
                    return false;
                }
            } else {
                return false;
            }
            
        }   
    
        //existing -> esiste gia
        //0 -> problema con database
        //altro numero -> id user
        public function create_new($form_data){
            $data = array(
                'customer_firstname' => $form_data['firstname'],
                'customer_lastname' => $form_data['lastname'],
                'customer_email' => $form_data['email'],
                'customer_password' => $form_data['password']
            );
            
            $query = $this->db->get_where('customer', array('customer_email' => $data['customer_email']));
            if (count($query->result_array())>0) {
                return "existing";
                
            }
            else {
                $this->db->insert('customer', $data); 
                return $idOfInsertedData = $this->db->insert_id();
            }
        } 
    
        public function change_password($form_data){
            
            $query = $this->db->get_where('customer', array('customer_id' => $_SESSION['user_id']));
            if ($query) {
                $data = $query->row_array();
                
                //controlla che la vecchia password inserita sia giusta
                if (password_verify($form_data['oldpassword'], $data["customer_password"])){
                    
                    //controlla che la nuova password non sia uguale alla vecchia
                    if (password_verify($form_data['oldpassword'], $form_data["password"])){
                        //ritornare not_changed -> password vecchia e nuova sono uguali
                        return "not_changed";
                    } else {
                        //cambio la password di $_SESSION['user_id'] con questa-> $form_data["password"]
                        $this -> db -> set('customer_password', $form_data["password"]);
                        $this -> db -> where('customer_id', $_SESSION['user_id']);
                        $this -> db -> update('customer');
                        //ritornare changed
                        return "changed";
                    }                    
                } else {
                    //ritornare old password inserita è sbagliata
                    return "wrong_password";
                }
            //ritornare NULL -> errore di connessione del database
        }
        }
}