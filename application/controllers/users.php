<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    
    public function index() 
    {   
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) {
            $this->load->view('users/sign-in');
        } 
        else {
            redirect("dashboards");
        }
    }

    public function register() 
    {
        $current_user_id = $this->session->userdata('user_id');
        if(!$current_user_id) { 
            $this->load->view('templates/header');
            $this->load->view('users/register');
        } 
        else {
            redirect("dashboard");
        }
    }

    public function logoff() 
    {
        $this->session->set_userdata('activity', ''.$this->session->userdata('fullname').' successfully logged out');
        $this->user->log($this->session->userdata('user_id'));
        $this->session->sess_destroy();
        redirect("/");   
    }
  
    public function process_signin() 
    {
        $result = $this->user->validate_signin_form();
        if($result != 'success') {
            $this->session->set_flashdata('input_errors', $result);
            redirect("/");
        } 
        else 
        {
            $username = $this->input->post('username');
            $user = $this->user->get_user($username);
            $fullname = $user['first_name'].' '.$user['last_name'];
            $level = '';
            if($user['user_level'] === '0'){
                $level = 'Admin';
            }
            elseif($user['user_level'] === '1'){
                $level = 'Manager / Asst. Manager';
            }
            elseif($user['user_level'] === '2'){
                $level = 'Bookeeper';
            }
            
            $result = $this->user->validate_signin_match($user, $this->input->post('password'));
            
            if($result == "success") 
            {   
                $is_admin = $this->user->validate_is_admin($username);
                if(!empty($is_admin)){
                    if($is_admin['user_level'] === '0'){
                        $this->session->set_userdata(array('user_id'=>$user['id'], 'level'=>$level, 'fullname'=>$fullname, 'page' => 'Dashboard', 'auth'=> TRUE));
                        $this->session->set_userdata('activity', ''.$fullname.' successfully logged in');
                        $this->user->log($user['id']);
                        redirect("dashboards");
                    }
                    elseif($is_admin['user_level'] === '1'){
                        $this->session->set_userdata(array('user_id'=>$user['id'], 'level'=>$level, 'fullname'=>$fullname, 'page' => 'Dashboard', 'mgr'=> TRUE));
                        $this->session->set_userdata('activity', ''.$fullname.' successfully logged in');
                        $this->user->log($user['id']);
                        redirect("dashboards");
                    }
                    elseif($is_admin['user_level'] === '2'){
                        $this->session->set_userdata(array('user_id'=>$user['id'], 'level'=>$level, 'fullname'=>$fullname, 'page' => 'Dashboard', 'bkpr'=> TRUE));
                        $this->session->set_userdata('activity', ''.$fullname.' successfully logged in');
                        $this->user->log($user['id']);
                        redirect("dashboards");
                    }
                }
                else{
                    redirect("/");
                }
            }
            else 
            {
                $this->session->set_flashdata('input_errors', $result);
                redirect("/");
            }
        }

    }
    
    public function process_creation() 
    {   
        $username = $this->input->post('username');
        $result = $this->user->validate_registration($username);
        if($result!=null)
        {
            $this->session->set_flashdata('input_errors', $result);
            $this->session->set_userdata(array('page'=> 'User'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/add_user');
            $this->load->view('templates/footer');
            
        }
        else
        {
            $form_data = $this->input->post();
            $this->user->create_user($form_data);
            

            $result = $this->user->get_all_user();
            $list = array('listp' => $result);
            $this->session->set_userdata(array('page'=> 'User'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/userlist',$list);
            $this->load->view('templates/footer');
            
        }
        
    }

    public function process_registration() 
    {   
        $form_data = $this->input->post();
        $username = $this->input->post('username');
        $result = $this->user->validate_registration($username);
        if($result!=null)
        {
            $this->session->set_flashdata('input_errors', $result);
            $this->session->set_userdata(array('page'=> 'User'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/add_user');
            $this->load->view('templates/footer');
        }
        else
        {
            $form_data = $this->input->post();
            $this->user->create_user($form_data);
            $this->email->creation_account($form_data);

            $this->session->set_flashdata('input_errors', 'User created Sucessfully');
            $this->session->set_userdata(array('page'=> 'User'));
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/add_user');
            $this->load->view('templates/footer');
        }
    }

    public function profile() 
    {   
        $user_id = $this->session->user_id;
        $user = $this->user->get_user_id($user_id);
        $details = array('details'=>$user);
        $this->load->view('templates/header');
        $this->load->view('users/edit',$details); 
    }

    public function edit_information_process() 
    {   
        $result = $this->user->validate_information();
        if($result != 'success') {
            $this->session->set_flashdata('input_errors', $result);
            redirect("users/edit");
        } 
        else
        {
            $form_data = $this->input->post();
            $this->user->update_userinformation($form_data);
            $this->session->set_flashdata('success','The user information successfully modified');
            redirect("users/edit");
        }
    }

    public function edit_credentials() 
    {   
        $checkpassword = $this->input->post();
        $result = $this->user->validate_change_password($checkpassword);
        // var_dump($result);
        if(!empty($result)) {
            $this->session->set_flashdata('input_errors', $result);
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/user_update');
            $this->load->view('templates/footer');
        } 
        else
        {  
            $form_data = $this->input->post();
            $this->user->update_credentials($form_data);
            $this->session->set_flashdata('input_errors','your password successfully update');
            $this->load->view('templates/header');
            $this->load->view('templates/aside');
            $this->load->view('templates/topbar');   
            $this->load->view('admin/user_update');
            $this->load->view('templates/footer');
        }
    }
    
}
