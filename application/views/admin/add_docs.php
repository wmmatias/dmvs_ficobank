<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-inline-block">Borrower's Details</h6>
                <a class="text-white d-inline-block float-end me-3" href="/dashboards/history" data-bs-toggle="tooltip" data-bs-placement="top" title="Document List"><i class="fas fa-list"></i></a>
                <!-- <a class="text-white d-inline-block float-end me-3" href="/"><i class="fas fa-arrow-left"></i></a> -->
              </div>
            </div>
            <div class="card-body p-3">
            <!-- <img id="loaderIcon" style="visibility:hidden; display:none" 
            src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif" alt="..."/> -->
                <?=$this->session->flashdata('input_errors');?>
                <form action="/documents/create" id="add_docs" method="post" class="text-start">
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                    <div class="row">
                        <div class="col-6">
                            <div class="col-md-4 input-group input-group-outline my-1 focused is-focused">
                                <label class="form-label">Date</label>
                                <input type="text" name="date" class="form-control" value="<?=date('m-d-Y')?>" readonly> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Borrowers fullname</label>
                                <input type="text" name="fullname" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <select name="typeofloan" class="form-control" aria-label="Default select example">
                                    <option value="empty" selected>-- Type of loan --</option>
                                    <option value="0">Agricultural Loan</option>
                                    <option value="1">Commercial Loan</option>
                                    <option value="2">Todo-Ani Loan</option>
                                    <option value="3">Farm Machienery Loan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <input type="hidden" name="user_id" value="<?=$this->session->userdata('user_id')?>">
                                <button type="submit" id="add_docsbtn" class="btn btn-success w-100 my-4 mb-2">
                                <span class="spinner-border spinner-border-sm" id="spin" role="status" aria-hidden="true"></span>
                                    Add document 
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>