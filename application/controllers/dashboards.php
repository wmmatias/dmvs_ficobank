<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {
    
    /*  DOCU: This function is triggered by default which displays the sign in/dashboard.
        Owner: 
    */
    public function index() 
    {   
        $this->load->view('admin/dashboard');
    }
}