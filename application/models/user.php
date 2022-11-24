<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
    function get_user($username)
    { 
        $query = "SELECT * FROM users WHERE user_name = ?";
        return $this->db->query($query, $this->security->xss_clean($username))->result_array()[0];
    }

    function get_user_add($username)
    { 
        $query = "SELECT * FROM users WHERE user_name = ?";
        return $this->db->query($query, $this->security->xss_clean($username))->result_array();
    }
    
    function get_all_user()
    { 
        $query = "SELECT * FROM users";
        return $this->db->query($query)->result_array();
    }

    function get_all_userlogs()
    { 
        $query = "SELECT logs.id, logs.activity, logs.created_by, logs.created_at, users.first_name, users.last_name
        FROM dmvs_ficobank.logs
        LEFT JOIN dmvs_ficobank.users
        ON logs.created_by = users.id
        ORDER BY logs.created_by DESC";
        return $this->db->query($query)->result_array();
    }

    public function delete_user_id($id) {
        return $this->db->query("DELETE FROM users WHERE id = ?", 
        array(
            $this->security->xss_clean($id)));
    }

    function create_user($user)
    {
        $year = date('Y');
        $password = 'Ficobank@'.$year;
        $query = "INSERT INTO Users (first_name, last_name, user_name, email, password, user_level,created_at,updated_at) VALUES (?,?,?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean(ucwords(strtolower($user['firstname']))), 
            $this->security->xss_clean(ucwords(strtolower($user['lastname']))), 
            $this->security->xss_clean($user['username']), 
            $this->security->xss_clean($user['email']), 
            md5($this->security->xss_clean($password)),
            $this->security->xss_clean($user['userlevel']), 
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean(date("Y-m-d, H:i:s"))); 
        
        return $this->db->query($query, $values);
    }

    function validate_signin_form() {
        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('username', 'UserName', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if(!$this->form_validation->run()) {
            return validation_errors();
        } 
        else {
            return "success";
        }
    }
    
    function validate_signin_match($user, $password) 
    {
        $hash_password = md5($this->security->xss_clean($password));

        if($user && $user['password'] == $hash_password) {
            return "success";
        }
        else {
            return "Incorrect username/password.";
        }
    }
    function validate_is_admin($user_name) 
    {
        $query = "SELECT user_level FROM users WHERE user_name = ?";
        return $this->db->query($query, $this->security->xss_clean($user_name))->result_array()[0];
    }

    function validate_registration($username) 
    {
        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');   
        $this->form_validation->set_rules('username', 'User Name', 'required');  
        $this->form_validation->set_rules('email', 'Email', 'required|valid_emails');        
        $this->form_validation->set_rules('userlevel', 'User Level', 'required|in_list[0,1,2]');
        
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else if($this->get_user_add($username)) {
            return "User name already taken.";
        }
    
    }

    public function validate_registration_user() {
        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');   
        $this->form_validation->set_rules('username', 'User Name', 'required');  
        $this->form_validation->set_rules('email', 'Email', 'required|valid_emails');        
        $this->form_validation->set_rules('userlevel', 'User Level', 'required');

        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else {
            return 'success';
        }
    }

    function get_user_id($id)
    {
        $query = "SELECT id, first_name, last_name, email, user_name, user_level FROM users WHERE id=?";
        return $this->db->query($query, $this->security->xss_clean($id))->result_array()[0];
    }

    function validate_information() 
    {
        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('first_name', 'First Name', 'required|alpha');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha');   
        $this->form_validation->set_rules('email', 'Email', 'required|valid_emails'); 
        
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else{
            return 'success';
        }
    }

    function update_userinformation($form_data) 
    {
        return $this->db->query("UPDATE users SET first_name = ?, last_name = ?, user_name = ?, user_level = ? WHERE id = ?", 
        array(
            $this->security->xss_clean($form_data['firstname']), 
            $this->security->xss_clean($form_data['lastname']),
            $this->security->xss_clean($form_data['username']), 
            $this->security->xss_clean($form_data['userlevel']),
            $this->security->xss_clean($form_data['id'])
        ));
        
    }

    function validate_change_password($password = NULL) 
    {
        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('old_password', 'Old Password', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');   
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');  
        
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else if(empty($this->check_password($password))){
                return 'incorrect old password';
        }
    }

    function check_password($password){
         return $this->db->query("SELECT password FROM users WHERE id=? and password = ?", 
        array(
            $this->security->xss_clean($password['id']),
            md5($this->security->xss_clean($password['old_password']))))->row_array(); 
    }

    function update_credentials($form_data) 
    {
        return $this->db->query("UPDATE users SET password = ?, updated_at = ? WHERE id = ?", 
        array(
            md5($this->security->xss_clean($form_data['password'])), 
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean($form_data['id'])));
    }

    public function log($id)
    { 
        $query = "INSERT INTO logs (activity, created_by, created_at) VALUES (?,?,?)";
        $values = array(
            $this->security->xss_clean($this->session->userdata('activity')), 
            $this->security->xss_clean($id), 
            $this->security->xss_clean(date("Y-m-d, H:i:s"))); 
        
        return $this->db->query($query, $values);
    }

    
}

?>