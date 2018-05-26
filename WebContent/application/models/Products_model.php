<?php
class Products_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
            $this->load->helper('url');
        }
    
        public function get_product($id){
            $query = $this->db->get_where('product', array('product_id' => $id));
            return $query->result_array();
        }
    
        public function get_products_men() {
            /*$query = $this->db->get_where('product', array('product_gender' => 'man')); */
            
            $query = $this->db->get_where('product', "(product_gender = 'man' OR product_gender = 'unisex')");
            return $query->result_array();
        } 
    
        public function get_products_women() {
            $query = $this->db->get_where('product', "(product_gender = 'woman' OR product_gender = 'unisex')");
            return $query->result_array();
        } 
    
    
     
    
    
}