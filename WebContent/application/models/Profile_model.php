<?php
class Profile_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
            $this->load->helper('url');
        }
    
        public function get_profile_data($id){
            $query = $this->db->get_where('customer', array('customer_id' => $id));
            return $query->row_array();
        }
    
}