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
    
}