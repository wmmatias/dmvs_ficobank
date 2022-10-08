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
        $query = "SELECT documents.id, documents.doc_number, documents.fullname, documents.loan_type, documents.document_type, locations.location, locations.status, locations.recieved_by, locations.position, locations.delivered_at, documents.created_at
        FROM documents
        LEFT JOIN locations
        ON documents.id=locations.document_id;";
        return $this->db->query($query)->result_array();
    }

    function get_all_docs_by_id($id)
    {
        $query = "SELECT documents.id, documents.doc_number, documents.fullname, documents.loan_type, documents.document_type, locations.location, locations.status, locations.recieved_by, locations.position, locations.delivered_at, documents.created_at
        FROM documents
        LEFT JOIN locations
        ON documents.id=locations.document_id
        WHERE documents.id = ?;";
        return $this->db->query($query, $this->security->xss_clean($id))->result_array();
    } 

    function get_all_loc_by_id($id)
    {
        $query = "SELECT *
        FROM locations
        WHERE locations.document_id = ?;";
        return $this->db->query($query, $this->security->xss_clean($id))->result_array();
    }

    function validate_doc_num($docnum) 
    {
        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('fullname', 'Fullname', 'required');
        $this->form_validation->set_rules('typeofloan', 'Type of loan', 'required');   
        $this->form_validation->set_rules('typeofdocs', 'Type of documents', 'required');  
        $this->form_validation->set_rules('email', 'Email', 'required|valid_emails');      
        
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else if($this->get_doc_num($docnum)) {
            return "Sorry try to refresh your browser the assign doc number is not available";
        }
    }

    function create_document($form_data,$docnum)
    {

        $query = "INSERT INTO documents (doc_number, fullname, loan_type, document_type, email, created_by, created_at, update_at) VALUES (?,?,?,?,?,?,?,?)";

        $current_user_id = $this->session->userdata('user_id');

        $values = array(
            $this->security->xss_clean($docnum), 
            $this->security->xss_clean($form_data['fullname']), 
            $this->security->xss_clean($form_data['typeofloan']), 
            $this->security->xss_clean($form_data['typeofdocs']),
            $this->security->xss_clean($form_data['email']), 
            $this->security->xss_clean($form_data['created_by']), 
            $this->security->xss_clean(date("Y-m-d, H:i:s")),
            $this->security->xss_clean(date("Y-m-d, H:i:s"))
        ); 
        
        // var_dump($_SESSION['user_id']);
        var_dump($this->session->userdata('user_id'));
        return $this->db->query($query, $values);
    }

    function initialized_location($id)
    {
        $id = $id;
        $location = 'Cauayan Branch';
        $status = 'New Document';
        $recieved = 'New Document';
        $position = 'Bookeeper';
        $query = "INSERT INTO locations (document_id, location, status, recieved_by, position, recieved_at, delivered_at, created_at, update_at) VALUES (?,?,?,?,?,?,?,?,?)";
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
}