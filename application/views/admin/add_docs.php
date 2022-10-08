<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-inline-block">Add Documents</h6>
                <a class="text-white d-inline-block float-end me-3" href="/dashboards/history"><i class="fas fa-list"></i></a>
                <a class="text-white d-inline-block float-end me-3" href="/"><i class="fas fa-arrow-left"></i></a>
              </div>
            </div>
            <div class="card-body p-3">
                <?=$this->session->flashdata('input_errors');?>
                <form action="/documents/create" method="post" class="text-start">
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Applicant fullname</label>
                                <input type="text" name="fullname" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Type of loan</label>
                                <input type="text" name="typeofloan" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Type of Document</label>
                                <input type="text" name="typeofdocs" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <input type="hidden" name="created_by" value="<?=$this->session->userdata('fullname')?>">
                                <button type="submit" class="btn btn-success w-100 my-4 mb-2">Add Docs</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>