<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {

    public function index()
    {   
        $newdata = $this->document->get_all_docs_today();
        $office = $this->document->get_all_docs_offices();
        $rod = $this->document->get_all_docs_rod();
        $treasury = $this->document->get_all_docs_treasury();
        $lto = $this->document->get_all_docs_lto();
        $data = array('list'=>$newdata, 'offices'=> $office, 'rod'=> $rod, 'treasury'=> $treasury, 'lto'=> $lto);
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) {
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'Dashboard'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/dashboard', $data);
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
            $result = $this->user->get_all_user();
            $list = array('list' => $result);
            $this->session->set_userdata(array('page'=> 'User'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/userlist',$list);
            $this->load->view('templates/footer');
        }
        
    }

    public function delete($id) 
    {  
        $this->user->delete_user_id($id);
        redirect('/dashboards/users');
    }

    public function edit($id) 
    {   
        $this->session->set_userdata(array('edit_id'=> $id));
        $result = $this->user->get_user_id($id);
        $list = array('list' => $result);  
        $this->load->view('templates/header');
        $this->load->view('templates/aside');
        $this->load->view('templates/topbar');   
        $this->load->view('admin/edit_user',$list);
        $this->load->view('templates/footer');
    }

    public function process_user_modification() 
    {   
        $edit_id = $this->session->edit_id;
        $result = $this->user->validate_registration_user();
        if($result != 'success') {
            $this->session->set_flashdata('input_errors', $result);
            redirect("dashboards/edit/$edit_id");
        } 
        else
        {
            $form_data = $this->input->post();
            var_dump($form_data);
            $this->user->update_userinformation($form_data);
            $this->session->set_flashdata('input_errors','The user successfully modified');
            redirect("dashboards/edit/$edit_id");
        }
        
    }

    public function add_user() 
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
            $this->load->view('admin/add_user');
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
            $this->load->view('admin/add_docs');
            $this->load->view('templates/footer');
        }
        
        
    }

    public function history() 
    {   
        $result = $this->document->get_all_docs_offices();
        $details = array('list'=>$result);
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) {
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'Logs'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/logs',$details);
            $this->load->view('templates/footer');
        }
        
        
    }

    public function rod() 
    {   
        $result = $this->document->get_all_docs_rod();
        $details = array('list'=>$result);
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) {
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'Logs'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/logs',$details);
            $this->load->view('templates/footer');
        }
        
        
    }

    public function treasury() 
    {   
        $result = $this->document->get_all_docs_treasury();
        $details = array('list'=>$result);
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) {
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'Logs'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/logs',$details);
            $this->load->view('templates/footer');
        }
        
        
    }

    public function lto() 
    {   
        $result = $this->document->get_all_docs_lto();
        $details = array('list'=>$result);
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) {
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'Logs'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/logs',$details);
            $this->load->view('templates/footer');
        }
        
        
    }

}