<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');

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
        $randnum = rand(10,100);
        $docnum = date('Ymdgi'). '-'.$randnum; 
        $form_data = $this->input->post();
        $result = $this->document->validate_doc_num($docnum);
        if($form_data['typeofloan'] === 'empty'){
            $this->session->set_flashdata('input_errors', '<p class="text-danger">Please select type of loan to proceed</p>');
            $this->session->set_userdata(array('page'=> 'Form'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/add_docs');
            $this->load->view('templates/footer');
        }
        elseif($result!=null)
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
            $doc_num = $this->document->create_document($form_data,$docnum);
            $newdata = array(
                'fullname'  => $form_data['fullname'],
                'loan_type'     => $form_data['typeofloan'],
                'doc_num' => $doc_num
            );
            $this->session->set_userdata($newdata);
            $this->session->set_userdata('doc_num', $doc_num);
            $this->session->set_userdata(array('page'=> 'Form', 'doc_num'=>$doc_num));
            $this->add_docs_item($doc_num);
        }
    }

    public function add_docs_item($doc_num){
        $details = $this->document->select_specific($doc_num);
        $id = $details['id'];
        $document = $this->document->select_specific_document($id);
        $data = array('details'=>$details, 'document'=>$document);
        $this->session->set_userdata(array('page'=> 'Form'));
        $this->load->view('templates/header');
        $this->load->view('templates/aside');
        $this->load->view('templates/topbar');   
        $this->load->view('admin/add_docs_items', $data);
        $this->load->view('templates/footer');
    }

    public function cancel_creation($id){
        $this->document->cancel_creation($id);
        $this->session->set_flashdata('input_errors', '<p class="text-danger">Creation Cancel</p>');
        $this->session->set_userdata(array('page'=> 'Form'));
        $this->load->view('templates/header');
        $this->load->view('templates/aside');
        $this->load->view('templates/topbar');   
        $this->load->view('admin/add_docs');
        $this->load->view('templates/footer');
    }

    public function delete_item($id){
        $this->document->delete_item($id);
        $doc_num = $this->session->userdata('doc_num');
        $this->session->set_flashdata('document', '<p class="text-danger">Document deleted</p>');
        $this->add_docs_item($doc_num);
    }

    public function cancel_process($id){
        $this->document->cancel_process($id);
        $this->session->unset_userdata('doc_num');
        $this->session->set_flashdata('input_errors', '<p class="text-danger">Adding Borrowers Cancelled</p>');
        $this->session->set_userdata(array('page'=> 'Form'));
        $this->load->view('templates/header');
        $this->load->view('templates/aside');
        $this->load->view('templates/topbar');   
        $this->load->view('admin/add_docs');
        $this->load->view('templates/footer');
    }
    
    public function save_process(){
        $id = $this->input->post('id');
        $doc_num = $this->session->userdata('doc_num');
        $check = $this->document->check_item($id);
        if(count($check) < 1){
            $this->session->set_flashdata('document', '<p class="text-danger">Please add document</p>');
            $this->add_docs_item($doc_num);
        }
        else{
            $this->document->update($id);
            $user_details = $this->user->get_user_id($this->session->userdata('user_id'));
            $this->email->creation_document($user_details);
            $this->session->set_flashdata('input_errors', '<p class="text-danger">Borrower successfully added to the system</p>');
            unset(
                $_SESSION['fullname'],
                $_SESSION['doc_num'],
                $_SESSION['loan_type']
            );
            redirect('/dashboards/form');
        }
    }

    public function validate_item(){
        $form_data = $this->input->post();
        $doc_num = $this->session->userdata('doc_num');
        $details = $this->document->select_specific($doc_num);
        $id = $details['id'];
        $result = $this->document->validate_item();
        if($form_data['doctype'] === 'empty'){
            $this->session->set_flashdata('document', '<div class="text-danger"><p>Please select document type</p></div>');
            $this->add_docs_item($doc_num);
        }
        elseif($result != 'success'){
            $this->session->set_flashdata('document', $result);
            $this->add_docs_item($doc_num);
        }
        else{
            $this->session->set_flashdata('document', '<div class="text-success"><p>Adding document Success</p></div>');
            $this->document->create_document_item($form_data,$id);
            $this->add_docs_item($doc_num);
        }
    }

    public function add_location() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        $form_data = $this->input->post();
        $user_details = $this->user->get_user_id($current_user_id);
        $result = $this->document->validate_loc($form_data);
        $id = $form_data['id'];
        $check_duplicate = $this->document->check_duplicate($form_data);

        if($form_data['status'] === 'empty' || $form_data['status'] === 'empty' ){
            $this->session->set_flashdata('location_errors', '<p class="text-danger">Please select location and status</p>');
            $this->session->set_userdata(array('page'=> 'Form'));
            redirect("documents/edit/$id");
        }
        elseif($result!='success')
        {
            $this->session->set_flashdata('location_errors', $result);
            $this->session->set_userdata(array('page'=> 'Form'));
            redirect("documents/edit/$id");
        }
        // elseif(count($check_duplicate) > 0){
        //     $this->session->set_flashdata('location_errors', '<p class="text-danger">Duplicate Movement</p>');
        //     $this->session->set_userdata(array('page'=> 'Form'));
        //     redirect("documents/edit/$id");
        // }
        else
        {
            $this->document->setnew_location($form_data);
            $user_details = $this->user->get_user_id($this->session->userdata('user_id'));
            $this->email->add_location($form_data,$user_details);
            $this->session->set_flashdata('location_errors', '<p class="text-success">Document add new movement successfully</p>');
            $this->session->set_userdata(array('page'=> 'Form'));
            redirect("documents/edit/$id");
        }
    }

    public function view($id) 
    {   
        $docs = $this->document->get_all_docs_by_id($id);
        $loc = $this->document->get_all_loc_by_id($id);
        $list = array('doc'=> $docs, 'loc'=> $loc);
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) {
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'Logs'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/view_docs', $list);
            $this->load->view('templates/footer');
        }
        
    }

    public function edit($id) 
    {   
        $docs = $this->document->get_all_docs_by_id($id);
        $loc = $this->document->get_all_loc_by_id($id);
        $list = array('doc'=> $docs, 'loc'=> $loc);
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
        redirect('/dashboards/history');
    }

    public function return_document($id){
        // $this->document->return_docs($id);
        // redirect('/dashboards/history');
        $docs = $this->document->get_all_docs_by_id($id);
        $loc = $this->document->get_all_loc_by_id($id);
        $list = array('doc'=> $docs, 'loc'=> $loc);
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) {
            redirect("users");
        } 
        else {
            $this->session->set_userdata(array('page'=> 'Logs'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/return_docs',$list);
            $this->load->view('templates/footer');
        }
    }

    public function return_validation() 
    { 
        $result = $this->document->return_validation();
        $form_data = $this->input->post();
        $id = $form_data['id'];
        if($result!='success')
        {
            $this->session->set_flashdata('input_errors', $result);
            redirect("documents/return/$id");
        }
        else
        {
            $this->document->return_docs($form_data);
            $this->session->set_flashdata('input_errors', 'Document Return successfully');
            redirect("documents/return/$id");
        }
    }
    
    public function release() 
    {  
        $form_data = $this->input->post();
        $id = $form_data['document_id'];
        $this->document->release_loc($form_data);
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