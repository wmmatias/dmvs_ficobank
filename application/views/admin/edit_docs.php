<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-inline-block"><?=$list[0]['fullname'] .' ' . $list[0]['loan_type'] . ' Application'?></h6>
                <a class="text-white d-inline-block float-end me-3" href="/dashboards/form"><i class="fas fa-plus"></i></a>
                <a class="text-white d-inline-block float-end me-3" href="/dashboards/history"><i class="fas fa-arrow-left"></i></a>
              </div>
            </div>
            <div class="card-body p-3">
                <div class="view_docs col-md-10 offset-md-1 border">
                    <div class="row">
                        <div class="form-group col-md-4 offset-md-8 border">
                            <label class="fw-bold text-dark" for="date_created">Date: <?= date('M d'.','.' Y', strtotime($list[0]['created_at'])) ?></label>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>