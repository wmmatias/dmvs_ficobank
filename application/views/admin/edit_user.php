<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-inline-block">Edit User</h6>
                <a class="text-white d-inline-block float-end me-3" href="/dashboards/users"><i class="fas fa-arrow-left"></i></a>
              </div>
            </div>
            <div class="card-body p-3">
                <?=$this->session->flashdata('input_errors');?>
                <form action="/dashboards/edit/(:any)/validate" method="post" class="text-start">
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1 focused is-focused">
                                <label class="form-label">Firstname</label>
                                <input type="text" name="firstname" value="<?=$list['first_name']?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1 is-focused">
                                <label class="form-label">Lastname</label>
                                <input type="text" name="lastname" value="<?=$list['last_name']?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1 is-focused">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" value="<?=$list['user_name']?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <select name="userlevel" class="form-control" aria-label="Default select example">
                                    <option value="0" <?=($list['user_level'] === '0' ? 'selected' : '')?>>Manager</option>
                                    <option value="1" <?=($list['user_level'] === '1' ? 'selected' : '')?>>Assistant Manager</option>
                                    <option value="2" <?=($list['user_level'] === '2' ? 'selected' : '')?>>Bookeeper</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <input type="hidden" name="id" value="<?=$list['id']?>">
                                <button type="submit" class="btn btn-success w-100 my-4 mb-2">Add User</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>