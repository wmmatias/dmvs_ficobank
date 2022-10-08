<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documents extends CI_Controller {

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

    public function create() 
    {   
        date_default_timezone_set('Asia/Manila');
        $randnum = rand(10,100);
        $docnum = date('Ymdgi'). '-'.$randnum; 
        // $username = $this->input->post('username');
        $result = $this->document->validate_doc_num($docnum);
        if($result!=null)
        {
            $this->session->set_flashdata('input_errors', $result);
            $this->session->set_userdata(array('page'=> 'Form'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/add_docs');
            $this->load->view('templates/footer');
        }
        else
        {
            $form_data = $this->input->post();
            $this->document->create_document($form_data,$docnum);
            $id = $this->document->get_lastdoc_id();
            $this->document->initialized_location($id);
            
            $this->email->creation_email($form_data);

            $this->session->set_flashdata('input_errors', 'Docs added to monitoring successfully');
            $this->session->set_userdata(array('page'=> 'Form'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/add_docs');
            $this->load->view('templates/footer');
        }
    }

    public function view($id) 
    {   
        $docs = $this->document->get_all_docs_by_id($id);
        $loc = $this->document->get_all_loc_by_id($id);
        $list = array('list'=> $docs, 'loc'=> $loc);
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) {
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'Logs'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/view_docs',$list);
            $this->load->view('templates/footer');
        }
        
    }

}