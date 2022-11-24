<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Model {

    function get_doc_num($docnum)
    { 
        $query = "SELECT * FROM folders WHERE doc_number = ?";
        return $this->db->query($query, $this->security->xss_clean($docnum))->result_array();
    }

    function get_lastdoc_id()
    {
        $query = "SELECT id From documents ORDER BY id DESC LIMIT 1";
        return $this->db->query($query)->result_array()[0];
    }
    
    function get_all_docs()
    {
        $query = "SELECT documents.id, documents.doc_number, documents.fullname, documents.loan_type, documents.document_type, locations.location, locations.status, locations.recieved_by, locations.position, locations.released_at, documents.created_at
        FROM documents
        LEFT JOIN locations
        ON documents.id=locations.document_id
        ORDER BY documents.created_at DESC";
        return $this->db->query($query)->result_array();
    }
    
    function get_all_docs_today()
    {
        $location ='1';
        $status = '0';
        return $this->db->query("SELECT folders.id, folders.doc_number, folders.fullname, folders.loan_type, users.first_name, users.last_name, folders.created_at
        FROM dmvs_ficobank.folders 
        LEFT JOIN dmvs_ficobank.users
        ON folders.user_id = users.id 
        WHERE folders.location = ? AND folders.status = ? AND DATE(folders.created_at) = CURDATE()
        GROUP BY folders.doc_number
        ORDER BY folders.created_at DESC",
        array(
            $this->security->xss_clean($location),
            $this->security->xss_clean($status)
        ))->result_array();
    }

    public function get_count_office()
    {
        $location = '1';
        $status = '0';
        return $this->db->query("SELECT count(*) as document_count 
        FROM folders
        WHERE location = ? AND status = ?",
        array(
            $this->security->xss_clean($location),
            $this->security->xss_clean($status)
        ))->result_array();
    }

    public function get_count_rod()
    {
        $location = '2';
        $status = '0';
        return $this->db->query("SELECT count(*) as document_count 
        FROM folders
        WHERE location = ? AND status = ?",
        array(
            $this->security->xss_clean($location),
            $this->security->xss_clean($status)
        ))->result_array();
    }

    public function get_count_treasury()
    {
        $location = '3';
        $status = '0';
        return $this->db->query("SELECT count(*) as document_count 
        FROM folders
        WHERE location = ? AND status = ?",
        array(
            $this->security->xss_clean($location),
            $this->security->xss_clean($status)
        ))->result_array();
    }

    public function get_count_lto()
    {
        $location = '4';
        $status = '0';
        return $this->db->query("SELECT count(*) as document_count 
        FROM folders
        WHERE location = ? AND status = ?",
        array(
            $this->security->xss_clean($location),
            $this->security->xss_clean($status)
        ))->result_array();
    }

    public function get_all_docs_offices()
    {
        $location = '1';
        $status = '0';
        return $this->db->query("SELECT folders.id, folders.doc_number, documents.document_no as physical_no, documents.document_type, folders.fullname, folders.loan_type, folders.location, folder_logs.staff_name, 
        folder_logs.position, folders.status, folder_logs.created_at as document_history, folders.created_at as document_created
        FROM dmvs_ficobank.folders 
        LEFT JOIN dmvs_ficobank.documents
        ON folders.id = documents.folder_id 
        LEFT JOIN dmvs_ficobank.folder_logs
        ON folders.id = folder_logs.folder_id 
        WHERE folders.location = ? AND folder_logs.location = ? AND folders.status = ? AND folder_logs.status = ?
        GROUP BY documents.document_no
        ORDER BY folder_logs.created_at DESC",
        array(
            $this->security->xss_clean($location),
            $this->security->xss_clean($location),
            $this->security->xss_clean($status),
            $this->security->xss_clean($status)
        ))->result_array();
    }

    function get_all_docs_rod()
    {
        $location = '2';
        $status = '0';
        return $this->db->query("SELECT folders.id, folders.doc_number, documents.document_no as physical_no, documents.document_type, folders.fullname, folders.loan_type, folders.location, folder_logs.staff_name, 
        folder_logs.position, folders.status, folder_logs.created_at as document_history, folders.created_at as document_created
        FROM dmvs_ficobank.folders 
        LEFT JOIN dmvs_ficobank.documents
        ON folders.id = documents.folder_id 
        LEFT JOIN dmvs_ficobank.folder_logs
        ON folders.id = folder_logs.folder_id 
        WHERE folders.location = ? AND folder_logs.location = ? AND folders.status = ? AND folder_logs.status = ?
        GROUP BY documents.document_no
        ORDER BY folder_logs.created_at DESC",
        array(
            $this->security->xss_clean($location),
            $this->security->xss_clean($location),
            $this->security->xss_clean($status),
            $this->security->xss_clean($status)
        ))->result_array();
    }

    function get_all_docs_treasury()
    {
        
        $location = '3';
        $status = '0';
        return $this->db->query("SELECT folders.id, folders.doc_number, documents.document_no as physical_no, documents.document_type, folders.fullname, folders.loan_type, folders.location, folder_logs.staff_name, 
        folder_logs.position, folders.status, folder_logs.created_at as document_history, folders.created_at as document_created
        FROM dmvs_ficobank.folders 
        LEFT JOIN dmvs_ficobank.documents
        ON folders.id = documents.folder_id 
        LEFT JOIN dmvs_ficobank.folder_logs
        ON folders.id = folder_logs.folder_id 
        WHERE folders.location = ? AND folder_logs.location = ? AND folders.status = ? AND folder_logs.status = ?
        GROUP BY documents.document_no
        ORDER BY folder_logs.created_at DESC",
        array(
            $this->security->xss_clean($location),
            $this->security->xss_clean($location),
            $this->security->xss_clean($status),
            $this->security->xss_clean($status)
        ))->result_array();
    }

    function get_all_docs_lto()
    {
        
        $location = '4';
        $status = '0';
        return $this->db->query("SELECT folders.id, folders.doc_number, documents.document_no as physical_no, documents.document_type, folders.fullname, folders.loan_type, folders.location, folder_logs.staff_name, 
        folder_logs.position, folders.status, folder_logs.created_at as document_history, folders.created_at as document_created
        FROM dmvs_ficobank.folders 
        LEFT JOIN dmvs_ficobank.documents
        ON folders.id = documents.folder_id 
        LEFT JOIN dmvs_ficobank.folder_logs
        ON folders.id = folder_logs.folder_id 
        WHERE folders.location = ? AND folder_logs.location = ? AND folders.status = ? AND folder_logs.status = ?
        GROUP BY documents.document_no
        ORDER BY folder_logs.created_at DESC",
        array(
            $this->security->xss_clean($location),
            $this->security->xss_clean($location),
            $this->security->xss_clean($status),
            $this->security->xss_clean($status)
        ))->result_array();
    }
    
    function get_all_docs_return()
    {
        $status = '1';
        return $this->db->query("SELECT folders.id, folders.doc_number, folders.fullname, folders.loan_type, users.first_name, users.last_name, folders.created_at
        FROM dmvs_ficobank.folders 
        LEFT JOIN dmvs_ficobank.users
        ON folders.user_id = users.id 
        WHERE folders.status = ?
        GROUP BY folders.doc_number
        ORDER BY folders.created_at DESC",
        array(
            $this->security->xss_clean($status)
        ))->result_array();
    }

    
    function get_all_docs_block()
    {
        $status = '3';
        return $this->db->query("SELECT folders.id, folders.doc_number, folders.fullname, folders.loan_type, users.first_name, users.last_name, folders.created_at
        FROM dmvs_ficobank.folders 
        LEFT JOIN dmvs_ficobank.users
        ON folders.user_id = users.id 
        WHERE folders.status = ?
        GROUP BY folders.doc_number
        ORDER BY folders.created_at DESC",
        array(
            $this->security->xss_clean($status)
        ))->result_array();
    }


    function get_all_docs_by_id($id)
    {   
        return $this->db->query("SELECT folders.id, folders.doc_number, documents.document_no as physical_no, documents.document_type
        FROM dmvs_ficobank.folders 
        LEFT JOIN dmvs_ficobank.documents
        ON folders.id = documents.folder_id 
        WHERE folders.id = ?
        GROUP BY documents.document_no
        ORDER BY id ASC",
        array(
            $this->security->xss_clean($id)
        ))->result_array();
    } 

    function get_all_loc_by_id($id)
    {
        return $this->db->query("SELECT folders.id, folders.doc_number, folders.fullname, folders.loan_type, folder_logs.staff_name, folder_logs.position, folders.status as folder_status, folder_logs.location, folder_logs.status as location_status, folder_logs.created_at as document_history, folders.created_at as document_created
        FROM dmvs_ficobank.folders 
        LEFT JOIN dmvs_ficobank.folder_logs
        ON folders.id = folder_logs.folder_id 
        WHERE folders.id = ?
        ORDER BY folder_logs.created_at DESC",
        array(
            $this->security->xss_clean($id)
        ))->result_array();
    }

    public function delete_doc_by_id($id) {
        return $this->db->query("DELETE FROM documents WHERE id = ?", 
        array(
            $this->security->xss_clean($id)));
    }

    public function delete_loc_by_docid($id) {
        $status = '3';
        $uid = $this->session->userdata('user_id');
        return $this->db->query("UPDATE folders SET status = ?, user_id = ?, update_at = ? WHERE id = ?", 
        array(
            $this->security->xss_clean($status),
            $this->security->xss_clean($uid),
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean($id)));
    }

    public function return_docs($id) {
        $status = '1';
        $uid = $this->session->userdata('user_id');
        return $this->db->query("UPDATE folders SET status = ?, user_id = ?, update_at = ? WHERE id = ?", 
        array(
            $this->security->xss_clean($status),
            $this->security->xss_clean($uid),
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean($id)));
    }

    function validate_doc_num($docnum) 
    {
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        $this->form_validation->set_rules('fullname', 'Fullname', 'required');
        $this->form_validation->set_rules('typeofloan', 'Type of loan', 'required');        
        
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else if($this->get_doc_num($docnum)) {
            return "Sorry try to refresh your browser the assign doc number is not available";
        }
    }

    
    function validate_item() 
    {
        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        $this->form_validation->set_rules('physicalnumber', 'Physical Document Number', 'required');
        $this->form_validation->set_rules('doctype', 'Document Type', 'required');        
        
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else {
            return 'success';
        }
    }

    function validate_loc() 
    {
        $this->form_validation->set_error_delimiters('<div class="loc_rule text-danger">','</div>');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('recieved_by', 'Personnel', 'required');   
        $this->form_validation->set_rules('position', 'Position', 'required');  
        $this->form_validation->set_rules('status', 'Status', 'required'); 
        $this->form_validation->set_rules('created_at', 'Released At', 'required');     
        
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else {
            return "success";
        }
    }

    function create_document($form_data,$docnum)
    {
        $query = "INSERT INTO folders (user_id, doc_number, fullname, loan_type, created_at, update_at) VALUES (?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($form_data['user_id']), 
            $this->security->xss_clean($docnum), 
            $this->security->xss_clean(ucwords(strtolower($form_data['fullname']))), 
            $this->security->xss_clean($form_data['typeofloan']), 
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean(date("Y-m-d, H:i:s"))
        ); 
        $this->db->query($query, $values);
        return $docnum;
    }

    public function create_document_item($form_data,$id){
        $query = "INSERT INTO documents (user_id, folder_id, document_no, document_type, created_at, update_at) VALUES (?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($this->session->userdata('user_id')), 
            $this->security->xss_clean($id), 
            $this->security->xss_clean($form_data['physicalnumber']), 
            $this->security->xss_clean($form_data['doctype']), 
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean(date("Y-m-d, H:i:s"))
        ); 
        $this->db->query($query, $values);
    }

    public function select_specific($docnum)
    { 
        $query = "SELECT * FROM folders WHERE doc_number = ?";
        return $this->db->query($query, $this->security->xss_clean($docnum))->result_array()[0];
    }

    public function check_item($id)
    { 
        $query = "SELECT * FROM documents WHERE folder_id = ?";
        return $this->db->query($query, $this->security->xss_clean($id))->result_array();
    }

    public function user_details($user_id){
        $query = "SELECT first_name, last_name, email, user_level FROM users WHERE id = ?";
        return $this->db->query($query, $this->security->xss_clean($user_id))->result_array()[0];
    }

    public function update($id)
    { 
        $user_id = $this->session->userdata('user_id');
        $user_details = $this->user_details($user_id);
        $location = '1';
        $fullname = $user_details['first_name'].' '.$user_details['last_name'];
        $position = ($user_details['user_level'] === '0' ? 'Admin' : ($user_details['user_level'] === '2' ? 'Manager/Asst Manager' : 'Bookeeper'));

        $this->db->query("UPDATE folders SET location = ?, update_at = ? WHERE id = ?", 
        array(
            $this->security->xss_clean($location),
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean($id)
        ));

        $query = "INSERT INTO folder_logs (folder_id, staff_name, position, location, user_id, created_at, updated_at) VALUES (?,?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($id), 
            $this->security->xss_clean($fullname), 
            $this->security->xss_clean($position), 
            $this->security->xss_clean($location),
            $this->security->xss_clean($user_id),
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean(date("Y-m-d, H:i:s"))
        ); 
        $this->db->query($query, $values);

    }

    public function select_specific_document($id)
    { 
        $query = "SELECT * FROM documents WHERE folder_id = ?";
        return $this->db->query($query, $this->security->xss_clean($id))->result_array();
    }
    public function delete_item($id){
        return $this->db->query("DELETE FROM documents WHERE id = ?",
        array(
            $this->security->xss_clean($id)
        ));
    }

    public function cancel_creation($id){
        $this->db->query("DELETE FROM folders WHERE doc_number = ?",
        array(
            $this->security->xss_clean($id)
        ));
    }
    
    public function cancel_process($id){
        $this->db->query("DELETE FROM folders WHERE id = ?",
        array(
            $this->security->xss_clean($id)
        ));
        $this->db->query("DELETE FROM documents WHERE folder_id = ?",
        array(
            $this->security->xss_clean($id)
        ));
    }

    public function initialized_location($id)
    {
        $id = $id;
        $location = '0';
        $status = 'New Document';
        $recieved = 'Cauayan Branch';
        $position = 'Bookeeper';
        $query = "INSERT INTO locations (document_id, location, status, recieved_by, position, recieved_at, released_at, created_at, update_at) VALUES (?,?,?,?,?,?,?,?,?)";
        $values = array(
            $id,
            $this->security->xss_clean($location), 
            $this->security->xss_clean($status), 
            $this->security->xss_clean($recieved),
            $this->security->xss_clean($position),
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean(date("Y-m-d, H:i:s"))
        ); 
        
        return $this->db->query($query, $values);
    }

    public function check_duplicate($form_data){
        return $this->db->query("SELECT location, status 
        FROM folder_logs
        WHERE location = ? AND status = ? AND folder_id = ?",
        array(
            $this->security->xss_clean($form_data['location']),
            $this->security->xss_clean($form_data['status']),
            $this->security->xss_clean($form_data['id'])
        ))->result_array();
    }

    public function setnew_location($form_data)
    {
        $loc = $this->session->userdata('location');
        $id = $this->session->userdata('user_id');
        $current = ($loc === 'office'? '1' :($loc === 'rod'? '2' :($loc === 'treasury'? '3' :($loc === 'lto'? '4' : ''))));
        if($current != $form_data['location'] && $form_data['status'] === '0'){

            $this->db->query("INSERT INTO folder_logs (folder_id, staff_name, position, status, location, user_id, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?)",
            array(
                $this->security->xss_clean($form_data['id']), 
                $this->security->xss_clean(ucwords(strtolower($form_data['recieved_by']))), 
                $this->security->xss_clean(ucwords(strtolower($form_data['position']))),
                $this->security->xss_clean($form_data['status']),
                $this->security->xss_clean($form_data['location']),
                $this->security->xss_clean($id),
                $this->security->xss_clean(date("Y-m-d, H:i:s")),
                $this->security->xss_clean(date("Y-m-d, H:i:s"))
            )); 
            return $this->db->query("UPDATE folders SET location = ?, update_at = ? WHERE id = ?", 
            array(
                $this->security->xss_clean($form_data['location']),
                $this->security->xss_clean(date("Y-m-d, H:i:s")),
                $this->security->xss_clean($form_data['id'])));
            }
        else{
            return $this->db->query("INSERT INTO folder_logs (folder_id, staff_name, position, status, location, user_id, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?)",
            array(
                $this->security->xss_clean($form_data['id']), 
                $this->security->xss_clean(ucwords(strtolower($form_data['recieved_by']))), 
                $this->security->xss_clean(ucwords(strtolower($form_data['position']))),
                $this->security->xss_clean($form_data['status']),
                $this->security->xss_clean($form_data['location']),
                $this->security->xss_clean($id),
                $this->security->xss_clean(date("Y-m-d, H:i:s")),
                $this->security->xss_clean(date("Y-m-d, H:i:s"))
            )); 
        }
    }

    public function release_loc($form_data) 
    {
        return $this->db->query("UPDATE locations SET released_at = ?, update_at = ? WHERE id = ?", 
        array(
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean($form_data['location_id'])));
    }

    function update_validation(){
        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('fullname', 'Fullname', 'required');
        $this->form_validation->set_rules('typeofloan', 'Type of loan', 'required');   
        $this->form_validation->set_rules('typeofdocs', 'Type of documents', 'required');    
        
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else {
            return "success";
        }
    }

    function update_doc($form_data) 
    {
        return $this->db->query("UPDATE documents SET fullname = ?, loan_type = ?, document_type = ?, update_at = ? WHERE id = ?", 
        array(
            $this->security->xss_clean($form_data['fullname']),
            $this->security->xss_clean($form_data['typeofloan']),
            $this->security->xss_clean($form_data['typeofdocs']),
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean($form_data['id'])
        ));
    }

}