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
        
            $query = $this->db->get_where('customer', array('customer_firstname' => $form_data['firstname']), array('customer_lastname' => $data['lastname']));
            if (count($query->result_array())>0) {
                $this->db->set('customer_password', $form_data['password']);
                $this->db->insert('customer');
            }
        }
    
}