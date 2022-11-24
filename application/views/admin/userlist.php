<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-inline-block">Users list</h6>
                <a class="text-white d-inline-block float-end me-3" href="/dashboards/add_user" data-bs-toggle="tooltip" data-bs-placement="top" title="Create"><i class="fas fa-plus"></i></a>
              </div>
            </div>
            <div class="card-body p-3">
              <div class="table-responsive p-0">
                <table class="table table-bordered bordered table-striped table-hover align-items-center justify-content-center mb-0" id="userlist">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Full Name</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">User Level</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Status</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Created at</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Updated at</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php                   for($i=0; $i<count($list); $i++){
                        $create = date('m-d-Y', strtotime($list[$i]['created_at']));
                        $update = date('m-d-Y', strtotime($list[$i]['updated_at']));
?>                        <tr>
                            <td>
                                <div class="d-flex px-2">
                                    <div class="my-auto">
                                        <h6 class="mb-0 text-sm"><?=$list[$i]['first_name'] .' '. $list[$i]['last_name']?></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?=($list[$i]['user_level'] === '2' ? 'Bookeeper' : ($list[$i]['user_level'] === '1' ? 'Manager / Asst Manager' : 'Admin'))?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?=($list[$i]['status'] === '1' ? 'Active' : 'Not Active')?></p>
                            </td>
                            <td >
                                <p class="text-sm font-weight-bold mb-0"><?=$create?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?=$update?></p> 
                            </td>
                            <td>
                                <a href="/dashboards/edit/<?=$list[$i]['id']?>" class="text-xxsm btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-pen"></i></a>
                                <a href="/users/delete/<?=$list[$i]['id']?>" onclick="return confirm('Are you sure you want to DELETE this?')" class="text-xxsm btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fas fa-trash"></i></a>
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