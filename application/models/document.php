<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends CI_Model {
    function get_doc_num($docnum)
    { 
        $query = "SELECT * FROM documents WHERE doc_number = ?";
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
        $query = "SELECT *
        FROM documents
        WHERE DATE(created_at) = CURDATE()
        ORDER BY created_at DESC";
        return $this->db->query($query)->result_array();
    }

    function get_all_docs_offices()
    {
        $id = '0';
        $query = "SELECT documents.id, documents.doc_number, documents.fullname, documents.loan_type, documents.document_type, locations.location, locations.status, locations.recieved_by, locations.position, locations.released_at, documents.created_at
        FROM documents
        LEFT JOIN locations
        ON documents.id=locations.document_id
        WHERE locations.location = ?
        ORDER BY documents.created_at DESC";
        return $this->db->query($query, $this->security->xss_clean($id))->result_array();
    }

    function get_all_docs_rod()
    {
        $id = '1';
        $query = "SELECT documents.id, documents.doc_number, documents.fullname, documents.loan_type, documents.document_type, locations.location, locations.status, locations.recieved_by, locations.position, locations.released_at, documents.created_at
        FROM documents
        LEFT JOIN locations
        ON documents.id=locations.document_id
        WHERE locations.location = ?
        ORDER BY documents.created_at DESC";
        return $this->db->query($query, $this->security->xss_clean($id))->result_array();
    }

    function get_all_docs_treasury()
    {
        $id = '2';
        $query = "SELECT documents.id, documents.doc_number, documents.fullname, documents.loan_type, documents.document_type, locations.location, locations.status, locations.recieved_by, locations.position, locations.released_at, documents.created_at
        FROM documents
        LEFT JOIN locations
        ON documents.id=locations.document_id
        WHERE locations.location = ?
        ORDER BY documents.created_at DESC";
        return $this->db->query($query, $this->security->xss_clean($id))->result_array();
    }

    function get_all_docs_lto()
    {
        $id = '3';
        $query = "SELECT documents.id, documents.doc_number, documents.fullname, documents.loan_type, documents.document_type, locations.location, locations.status, locations.recieved_by, locations.position, locations.released_at, documents.created_at
        FROM documents
        LEFT JOIN locations
        ON documents.id=locations.document_id
        WHERE locations.location = ?
        ORDER BY documents.created_at DESC";
        return $this->db->query($query, $this->security->xss_clean($id))->result_array();
    }

    function get_all_docs_by_id($id)
    {
        $query = "SELECT documents.id, documents.doc_number, documents.fullname, documents.loan_type, documents.document_type, locations.location, locations.status, locations.recieved_by, locations.position, locations.recieved_at, locations.released_at, documents.created_at
        FROM documents
        LEFT JOIN locations
        ON documents.id=locations.document_id
        WHERE documents.id = ?
        ORDER BY documents.created_at DESC";
        return $this->db->query($query, $this->security->xss_clean($id))->result_array();
    } 

    function get_all_loc_by_id($id)
    {
        $query = "SELECT *
        FROM locations
        WHERE locations.document_id = ?
        ORDER BY locations.id DESC";
        return $this->db->query($query, $this->security->xss_clean($id))->result_array();
    }

    public function delete_doc_by_id($id) {
        return $this->db->query("DELETE FROM documents WHERE id = ?", 
        array(
            $this->security->xss_clean($id)));
    }

    public function delete_loc_by_docid($id) {
        return $this->db->query("DELETE FROM locations WHERE document_id = ?", 
        array(
            $this->security->xss_clean($id)));
    }

    function validate_doc_num($docnum) 
    {
        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('fullname', 'Fullname', 'required');
        $this->form_validation->set_rules('typeofloan', 'Type of loan', 'required');   
        $this->form_validation->set_rules('typeofdocs', 'Type of documents', 'required');      
        
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else if($this->get_doc_num($docnum)) {
            return "Sorry try to refresh your browser the assign doc number is not available";
        }
    }

    function validate_loc() 
    {
        $this->form_validation->set_error_delimiters('<div class="loc_rule">','</div>');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('recieved_by', 'Recieved By', 'required');   
        $this->form_validation->set_rules('position', 'Position', 'required');  
        $this->form_validation->set_rules('recieved_at', 'Recieved At', 'required'); 
        $this->form_validation->set_rules('released_at', 'Released At', 'required');     
        
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else {
            return "success";
        }
    }

    function create_document($form_data,$docnum)
    {
        $query = "INSERT INTO documents (user_id, doc_number, fullname, loan_type, document_type, created_at, update_at) VALUES (?,?,?,?,?,?,?)";

        // $current_user_id = $this->session->userdata('user_id');

        $values = array(
            $this->security->xss_clean($form_data['user_id']), 
            $this->security->xss_clean($docnum), 
            $this->security->xss_clean($form_data['fullname']), 
            $this->security->xss_clean($form_data['typeofloan']), 
            $this->security->xss_clean($form_data['typeofdocs']),
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean(date("Y-m-d, H:i:s"))
        ); 
        
        return $this->db->query($query, $values);
    }

    function initialized_location($id)
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

    function setnew_location($form_data)
    {
        $status = 'On Moving';
        $query = "INSERT INTO locations (document_id, location, status, recieved_by, position, recieved_at, released_at, created_at, update_at) VALUES (?,?,?,?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($form_data['id']), 
            $this->security->xss_clean($form_data['location']), 
            $this->security->xss_clean($status),
            $this->security->xss_clean($form_data['recieved_by']),
            $this->security->xss_clean($form_data['position']),
            $this->security->xss_clean($form_data['recieved_at']),
            $this->security->xss_clean($form_data['released_at']),
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean(date("Y-m-d, H:i:s"))
        ); 
        
        return $this->db->query($query, $values);
    }

    function release_loc($form_data) 
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