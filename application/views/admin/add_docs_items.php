<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-inline-block">Add Document Details</h6>
                <!-- <a class="text-white d-inline-block float-end me-3" href="/dashboards/history"><i class="fas fa-list"></i></a> -->
                <a class="text-white d-inline-block float-end me-3" href="/documents/cancel/<?=$details['doc_number']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Back to Cancel"><i class="fas fa-arrow-left"></i></a>
              </div>
            </div>
            <div class="card-body p-3">
            <!-- <img id="loaderIcon" style="visibility:hidden; display:none" 
            src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif" alt="..."/> -->
                <div class="row">
                    <div class="col-6">
                        <div class="col-md-4 input-group input-group-outline my-1 focused is-focused">
                            <label class="form-label">Borrowers fullname</label>
                            <input type="text" name="date" class="form-control" value="<?=date('m-d-Y', strtotime($details['created_at']))?>" readonly> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="col-md-4 input-group input-group-outline my-1 focused is-focused">
                            <label class="form-label">Borrowers fullname</label>
                            <input type="text" name="fullname" class="form-control" value="<?=$this->encrypt->decode($details['fullname'])?>" readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="col-md-4 input-group input-group-outline my-1">
                            <select name="typeofloan" class="form-control" aria-label="Default select example" readonly>
                                <option value="empty" selected>-- Type of loan --</option>
                                <option value="0" <?=($details['loan_type'] === '0' ? 'selected' : '')?>>Agricultural Loan</option>
                                <option value="1" <?=($details['loan_type'] === '1' ? 'selected' : '')?>>Commercial Loan</option>
                                <option value="2" <?=($details['loan_type'] === '2' ? 'selected' : '')?>>Todo-Ani Loan</option>
                                <option value="3" <?=($details['loan_type'] === '3' ? 'selected' : '')?>>Farm Machienery Loan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <h4 class="text-dark border-bottom mt-3">Document Details</h4>
                <?=$this->session->flashdata('document');?>
                <form action="/documents/validate_item" id="add_docs" method="post" class="text-start">
                    <div class="row">
                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                        <div class="col">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Physical Document#</label>
                                <input type="text" name="physicalnumber" class="form-control" maxlength="12">
                            </div>
                        </div>
                        <div class="col">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <select name="doctype" class="form-control" aria-label="Default select example">
                                    <option value="empty" selected>-- Document type --</option>
                                    <option value="0">Land Title</option>
                                    <option value="1">OR/CR</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center">
                                <button type="submit" id="add_docsbtn" class="btn btn-success w-100 mt-1">
                                <span class="spinner-border spinner-border-sm" id="spin" role="status" aria-hidden="true"></span>
                                    Add to list
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="card col-md-10 offset-md-1">
                        <div class="card-body p-3">
                            <div class="table-responsive p-0">
                                <table class="table table-bordered bordered table-striped table-hover  align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Document#</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Type</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php                                   if(count($document) < 1){
?>                                        <tr>
                                            <td colspan="3" class="text-center fw-bold">No Record Found</td>
                                        </tr>
<?php                                   }
                                        else{
                                            foreach($document as $data){
?>                                        <tr>
                                            <td><?=$data['document_no']?></td>
                                            <td><?=($data['document_type'] === '0'? 'Land Title' : 'OR/CR')?></td>
                                            <td><a class="btn btn-danger" href="/documents/delete_item/<?=$data['id']?>"><i class="fas fa-trash"></i></a></td>
                                        </tr>
<?php                                       }
                                        }
?>                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6 offset-md-6">
                        <a id="cancel" class="col text-white btn btn-danger" href="/documents/cancel_process/<?=$details['id']?>">Cancel Proccess</a>
                        <form action="/documents/save_process" method="post" id="add_docs1" class="float-end">
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                            <input type="hidden" name="id" value="<?=$details['id']?>">
                            <button type="submit" id="add_docsbtn1" class="btn btn-success">
                                <span class="spinner-border spinner-border-sm" id="spin1" role="status" aria-hidden="true"></span>
                                Save Proccess
                            </button>
                        </form>
                        <!-- <a id="add" class="col text-white btn btn-success" href="/documents/save_process/<?=$details['id']?>">
                            <span class="spinner-border spinner-border-sm" id="spin" role="status" aria-hidden="true"></span>
                            Save Proccess
                        </a> -->
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>