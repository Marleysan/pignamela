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
    
    public function get_all_products(){
            $query = $this->db->get_where('product', "(product_gender = 'man' OR product_gender = 'unisex' OR product_gender = 'woman')");
            return $query->result_array();
    }
    
    public function get_all_products_detail () {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('product_detail', 'product.product_id = product_detail.detail_product_id');
        $this->db->order_by('product_detail.detail_size', 'DESC');
        $query = $this->db->get();
        
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        
        return $data;
    }
    
    public function get_product_by_detail($detail_id){
        //??
        //$query = $this -> db -> get_where('')
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
    
    
        public function get_details($id){
            $query = $this -> db -> get_where('product_detail', array('detail_product_id' => $id));
            
            return $query -> result_array();
        }
    
        //Returns only the product_detail specified
        public function get_detail($id){
            $query = $this -> db -> get_where('product_detail', array('detail_id' => $id));
            
            return $query -> row_array();
        }
    public function get_products_men_filtered($season, $priceMin, $priceMax, $type){
        
        $this->db->where("(product_gender = 'man' OR product_gender = 'unisex')");
        
        if ($season != FALSE){
            $this->db->where("(product_season = '" . $season . "' OR product_season = 'ND')");
        }
        
        if ($priceMax != FALSE){
            $this->db->where("(product_price >= '" . $priceMin . "' AND product_price <= '" . $priceMax . "')");
        }
        
        if ($type != FALSE){
            $this->db->where('product_type', $type);
        }
        
        $query = $this->db->get('product');
        
        $data = array();
        if ($query !== FALSE && $query->num_rows() > 0) {
            $data = $query->result_array();
        }
        
        return $data;
    }
    
     public function update_quantity ($detail_id, $quantity) {
        $this -> db -> set('detail_quantity', $quantity);
        $this -> db -> where('detail_id', $detail_id);
        $this -> db -> update('product_detail');
         return ; //TODO handle error
    }
    
    
    
}