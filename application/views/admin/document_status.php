<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-inline-block">Document List <?=$this->session->userdata('location')?></h6>
                <a class="text-white d-inline-block float-end me-3" href="/dashboards/form" data-bs-toggle="tooltip" data-bs-placement="top" title="Create"><i class="fas fa-plus"></i></a>
              </div>
            </div>
            <div class="card-body p-3">
              <div class="docslist table-responsive p-0">
                <table class="table table-bordered bordered table-striped table-hover align-items-center justify-content-center mb-0" id="docslist">
                    <thead>
                        <tr>
                        <!-- <th class="sticky-col first-col text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Actions</th> -->
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">System Generated#</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Full Name</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Type of Loan</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">In charge</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
<?php                   if(count($list) < 1){
?>                            <tr>
                                <td colspan="10" class="text-center fw-bold">No Records Found</td>
                            </tr>
<?php                   }
                        else{
                            foreach($list as $data){    
?>                       <tr class="sticky-col first-col">
                            <td>
                                <div class="d-flex px-2">
                                    <div class="my-auto">
                                        <a href="/documents/view/<?=$data['id']?>" class="text-xxsm" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <h6 class="mb-0 text-sm"><?=$data['doc_number']?></h6>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?=$this->encrypt->decode($data['fullname'])?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0">
<?php                               if($data['loan_type'] === '0'){
?>                                      Agricultural Loan
<?php                               }
                                    elseif($data['loan_type'] === '1'){
?>                                      Commercial Loan
<?php                               }
                                    elseif($data['loan_type'] === '2'){
?>                                      Todo-Ani Loan
<?php                               }
                                    elseif($data['loan_type'] === '3'){
?>                                      Farm Machienery Loan
<?php                               }
?>							    </p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?=$data['first_name'].' '.$data['last_name']?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?=date('m-d-Y', strtotime($data['created_at']))?></p> 
                            </td>
                        </tr>
<?php                       }
                        }
?>                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>