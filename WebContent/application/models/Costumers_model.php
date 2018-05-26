<?php
class Costumers_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
            $this->load->helper('url');
        }
    
            //TODO hash password
        public function get_costumer($email, $password){
            $query = $this->db->get_where('costumer', "(costumer_email = '".$email."' AND costumer_password = '".$password."')");
            if ($query) {
                return $query->row_array();    
            } else {
                return false;
            }
            
        }   
    
        public function create_new($form_data){
            $data = array(
            'costumer_firstname' => $form_data['firstname'],
            'costumer_lastname' => $form_data['lastname'],
            'costumer_email' => $form_data['email'],
            'costumer_password' => $form_data['password']
            );

            $this->db->insert('costumer', $data); 
            // Return the id of inserted row
            return $idOfInsertedData = $this->db->insert_id();
        }
    
}