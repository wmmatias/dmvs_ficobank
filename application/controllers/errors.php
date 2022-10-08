<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {
    public function error_404() 
    {   
		$this->output->set_status_header('404');
		$this->load->view('templates/header');
		$this->load->view('templates/aside');
		$this->load->view('templates/topbar');   
		$this->load->view('errors/html/error_404');
		$this->load->view('templates/footer');
        
    }
}