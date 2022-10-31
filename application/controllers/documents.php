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
            $user_details = $this->user->get_user_id($form_data['user_id']);
            $this->document->create_document($form_data,$docnum);
            $id = $this->document->get_lastdoc_id();
            $this->document->initialized_location($id);
            
            $this->email->creation_document($form_data,$user_details);

            $this->session->set_flashdata('input_errors', 'Docs added to monitoring successfully');
            $this->session->set_userdata(array('page'=> 'Form'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/add_docs');
            $this->load->view('templates/footer');
        }
    }

    
    public function add_location() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        $form_data = $this->input->post();
        $user_details = $this->user->get_user_id($current_user_id);
        $result = $this->document->validate_loc($form_data);
        $id = $form_data['id'];

        if($result!='success')
        {
            $this->session->set_flashdata('location_errors', $result);
            $this->session->set_userdata(array('page'=> 'Form'));
            redirect("documents/edit/$id");
        }
        else
        {
            $form_data = $this->input->post();
            $this->document->setnew_location($form_data);
            
            $this->email->add_location($form_data,$user_details);

            $this->session->set_flashdata('location_errors', 'new location added successfully');
            $this->session->set_userdata(array('page'=> 'Form'));
            redirect("documents/edit/$id");
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

    public function edit($id) 
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
            $this->load->view('admin/edit_docs',$list);
            $this->load->view('templates/footer');
        }
        
    }
    public function delete($id) 
    {  
        $this->document->delete_loc_by_docid($id);
        $this->document->delete_doc_by_id($id);
        redirect('/dashboards/history');
    }
    
    public function release() 
    {  
        $current_user_id = $this->session->userdata('user_id');
        $form_data = $this->input->post();
        $id = $form_data['document_id'];
        $user_details = $this->user->get_user_id($current_user_id);
        $this->document->release_loc($form_data);

        $this->email->release_location($form_data,$user_details);

        redirect("documents/edit/$id");
    }
    
    public function update() 
    {  
        $result = $this->document->update_validation();
        $form_data = $this->input->post();
        $id = $form_data['id'];

        if($result!='success')
        {
            $this->session->set_flashdata('input_errors', $result);
            $this->session->set_userdata(array('page'=> 'Form'));
            redirect("documents/edit/$id");
        }
        else
        {
            $this->document->update_doc($form_data);

            // $this->email->creation_document($form_data,$user_details);

            $this->session->set_flashdata('input_errors', 'updated successfully');
            $this->session->set_userdata(array('page'=> 'Form'));
            redirect("documents/edit/$id");
        }
    }

}