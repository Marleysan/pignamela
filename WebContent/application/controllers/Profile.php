<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->library('session');
    }
    
	public function index()
	{  
		$this->load->view('profile');
	}
    
    public function logout() {
        unset(
            //$_SESSION['user_id'],
            $_SESSION['user_id']
        );
        $this->load->view('index');
    }
    
}
