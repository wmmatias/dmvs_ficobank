<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {
    public function index() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) {
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'Dashboard'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/dashboard');
            $this->load->view('templates/footer');
        }
        
    }

    public function users() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) {
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'User'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/userlist');
            $this->load->view('templates/footer');
        }
        
        
    }

    public function form() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) {
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'Form'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/form');
            $this->load->view('templates/footer');
        }
        
        
    }

    public function logs() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) {
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'Logs'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/logs');
            $this->load->view('templates/footer');
        }
        
        
    }

    public function messages() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) {
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'Messages'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/messages');
            $this->load->view('templates/footer');
        }
        
        
    }
}