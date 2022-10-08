<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-inline-block">Document list</h6>
                <a class="text-white d-inline-block float-end me-3" href="/dashboards/form"><i class="fas fa-plus"></i></a>
              </div>
            </div>
            <div class="card-body p-3">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0" id="userlist">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Doc #</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Client's Name</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Type of Loan</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Type of Document</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Location of Document</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Recieved by</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Position</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Status</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Docs Recieved date</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Docs Created date</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
<?php                   for($i=0; $i<count($list); $i++){
                        $create = date('m-d-Y', strtotime($list[$i]['created_at']));
                        $recieved = date('m-d-Y', strtotime($list[$i]['delivered_at']));
?>                        <tr>
                            <td>
                                <div class="d-flex px-2">
                                    <div class="my-auto">
                                        <h6 class="mb-0 text-sm"><?=$list[$i]['doc_number']?></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?=$list[$i]['fullname']?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?=$list[$i]['loan_type']?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?=$list[$i]['document_type']?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?=$list[$i]['location']?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?=$list[$i]['recieved_by']?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?=$list[$i]['position']?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?=$list[$i]['status']?></p>
                            </td>
                            <td >
                                <p class="text-sm font-weight-bold mb-0"><?=$recieved?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?=$create?></p> 
                            </td>
                            <td>
                                <a href="/documents/view/<?=$list[$i]['id']?>" class="text-xxsm btn btn-success"><i class="fas fa-eye"></i></a>
                                <a href="/dashboards/edit/<?=$list[$i]['id']?>" class="text-xxsm btn btn-info"><i class="fas fa-pen"></i></a>
                                <a href="/users/delete/<?=$list[$i]['id']?>" onclick="return confirm('Are you sure you want to DELETE this?')" class="text-xxsm btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
<?php                   }
?>                                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>