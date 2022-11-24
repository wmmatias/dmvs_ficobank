<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-inline-block">Users Logs</h6>
                <!-- <a class="text-white d-inline-block float-end me-3" href="/dashboards/add_user"><i class="fas fa-plus"></i></a> -->
              </div>
            </div>
            <div class="card-body p-3">
              <div class="table-responsive p-0">
                <table class="table table-bordered bordered table-striped table-hover align-items-center justify-content-center mb-0" id="userlist">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Activity</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">By</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Created at</th>
                        </tr>
                    </thead>
                    <tbody>
<?php                   for($i=0; $i<count($list); $i++){
?>                        <tr>
                            <td>
                                <div class="d-flex px-2">
                                    <div class="my-auto">
                                        <h6 class="mb-0 text-sm"><?=$list[$i]['activity']?></h6>
                                    </div>
                                </div>
                            </td>
                            <td >
                                <p class="text-sm font-weight-bold mb-0"><?=$list[$i]['created_by'].' '.$list[$i]['first_name'].' '.$list[$i]['last_name']?></p>
                            </td>
                            <td>
                                <p class="text-sm font-weight-bold mb-0"><?=$list[$i]['created_at']?></p> 
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