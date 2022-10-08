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
                <a class="text-white d-inline-block float-end me-3" href="/documents/edit/"><i class="fas fa-print"></i></a>
                <a class="text-white d-inline-block float-end me-3" href="/documents/edit/"><i class="fas fa-pen"></i></a>
                <a class="text-white d-inline-block float-end me-3" href="/dashboards/logs"><i class="fas fa-arrow-left"></i></a>
              </div>
            </div>
            <div class="card-body p-3">
                <p>details</p>
            </div>
          </div>
        </div>
      </div>