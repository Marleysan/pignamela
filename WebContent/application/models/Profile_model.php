<?php
class Profile_model extends CI_Model {

        public function __construct()
        {
             $this->load->database();
            $this->load->helper('url');
            $this->load->library('session');
        }
    
        public function get_profile_data(){
            $query = $this->db->get_where('customer', array('customer_id' => $_SESSION['user_id']));
            return $query->row_array();
        }
    
}