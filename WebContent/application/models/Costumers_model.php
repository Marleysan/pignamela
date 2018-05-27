<?php
class Costumers_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
            $this->load->helper('url');
        }
    
        public function get_costumer($email, $password){
            $query = $this->db->get_where('costumer', array('costumer_email' => $email));
            if ($query) {
                $data = $query->row_array();
                if (password_verify($password, $data["costumer_password"])) {
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
                'costumer_firstname' => $form_data['firstname'],
                'costumer_lastname' => $form_data['lastname'],
                'costumer_email' => $form_data['email'],
                'costumer_password' => $form_data['password']
            );
            
            $query = $this->db->get_where('costumer', array('costumer_email' => $data['costumer_email']));
            if (count($query->result_array())>0) {
                return "existing";
                
            }
            else {
                $this->db->insert('costumer', $data); 
                return $idOfInsertedData = $this->db->insert_id();
            }
        }
    
}