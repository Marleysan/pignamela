<?php
class Admin_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
            $this->load->helper('url');
            
        }
    
    public function get_admin_data($id){
            $query = $this->db->get_where('admin', array('admin_id' => $id));
            return $query->row_array();
        }
    
    public function get_admin($username, $password){
            $query = $this->db->get_where('admin', array('admin_username' => $username));
            if ($query) {
                $data = $query->row_array();
                if (password_verify($password, $data["admin_password"])) {
                    return $data;
                }
                else {
                    return false;
                }
            } else {
                return false;
            }
            
        }  
    
   
    
}