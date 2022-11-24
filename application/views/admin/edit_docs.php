<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Manila");
$curr_timestamp = date('Y-m-d');
$type = $loc[0]['loan_type'];
// var_dump($loc);
// var_dump($doc);
// var_dump($_SESSION);
?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-inline-block"></h6>
                <a class="text-white d-inline-block float-end me-3" href="/dashboards/form" data-bs-toggle="tooltip" data-bs-placement="top" title="Create"><i class="fas fa-plus"></i></a>
                <a class="text-white d-inline-block float-end me-3" href="/documents/view/<?=$loc[0]['id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Back"><i class="fas fa-arrow-left"></i></a>
              </div>
            </div>
            <div class="card-body p-3">
                <div class="view_docs">
                  <div class="details mt-3">
                    <p class="text-sm font-weight-bold mb-4">System Generated #: <?=$loc[0]['doc_number']?></p>
                    <p class="text-sm font-weight-bold">Date Created: <?= date('M-d-Y', strtotime($loc[0]['document_created'])) ?></p>
                    <p class="text-sm font-weight-bold">Borrower's Name: <?=$loc[0]['fullname']?></p>
                    <p class="text-sm font-weight-bold">Type of loan: <?=($type === '0' ? 'Agricultural Loan':($type === '1' ? 'Commercial Loan':($type === '2' ? 'Todo-Ani Loan':($type === '3' ? 'Farm Machienery Loan': ''))))?></p>
                    <hr class="horizontal dark mt-0 mb-2">
                  </div>
					
					<h6>Attached Document</h6>
					<div class="table-striped table-responsive p-0">
						<table class="table table-bordered bordered table-striped table-hover ">
							<thead>
								<tr>
									<th class="text-uppercase text-dark text-sm font-weight-bolder ps-3">Physical Document No.</th>
									<th class="text-uppercase text-dark text-sm font-weight-bolder ps-2">Document Type</th>
								</tr>
							</thead>
							<tbody>
<?php						if(count($doc) < 1){
?>								<tr>
									<td colspan="2" class="text-center fw-bold">No Records Found</td>
								</tr>
<?php						}
							else{
								foreach($doc as $data){
?>                        		<tr>
									<td>
										<p class="text-sm font-weight-bold mb-0"><?=$data['doc_number']?></p>
									</td>
									<td >
										<p class="text-sm font-weight-bold mb-0"><?=($data['document_type'] === '0'? 'Land Title':'OR/CR')?></p>
									</td>
								</tr>
<?php							}
							}
?>                            </tbody>
						</table>
						<hr class="horizontal dark mt-0 mb-2">
					</div>
                  <h6>Document Movements <button id="show_form" class="bg-success rounded text-white"  data-bs-toggle="tooltip" data-bs-placement="top" title="Add Movement"><i class="fas fa-plus"></i></button><button id="hide_form" class="bg-danger rounded text-white"  data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel"><i class="fas fa-x"></i></button></h6>
                  <?=$this->session->flashdata('location_errors');?>
				  <div class="movement_form">
					<form action="/documents/add_location" id="add_docs" method="post">
                    	<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
						<div class="row">
							<div class="col-md">
								<div class="col-md input-group input-group-outline my-1">
									<select name="location" class="form-control" aria-label="Default select example">
										<option value="empty" selected>Select location</option>
										<option value="1">Office</option>
										<option value="2">ROD</option>
										<option value="3">Treasury</option>
										<option value="4">LTO</option>
									</select>
								</div>
							</div>
							<div class="col-md">
								<div class="col-md-4 input-group input-group-outline my-1">
									<label class="form-label">Personnel</label>
									<input type="text" name="recieved_by" class="form-control">
								</div>
							</div>
							<div class="col-md">
								<div class="col-md-4 input-group input-group-outline my-1">
									<label class="form-label">Position</label>
									<input type="text" name="position" class="form-control">
								</div>
							</div>
							<div class="col-md">
								<div class="col-md-4 input-group input-group-outline my-1 focused is-focused">
                  <select name="status" class="form-control" aria-label="Default select example">
										<option value="empty" selected>Select Status</option>
										<option value="0">Recieve</option>
										<option value="1">Release</option>
										<option value="2">Deliver</option>
									</select>
								</div>
							</div>
							<div class="col-md">
								<div class="col-md-4 input-group input-group-outline my-1 focused is-focused">
									<label class="form-label">Date</label>
									<input type="date" name="created_at" class="form-control" value="<?= $curr_timestamp?>">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md">
								<input type="hidden" name="id" class="form-control" value="<?=$loc[0]['id']?>">
								<input type="hidden" name="doc_number" class="form-control" value="<?=$loc[0]['doc_number']?>">
								<input type="hidden" name="current_loc" class="form-control" value="<?=$loc[0]['location']?>">
                				<button type="submit" id="add_docsbtn" class="btn btn-success float-end"><span class="spinner-border spinner-border-sm" id="spin1" role="status" aria-hidden="true"></span><i class="fas fa-save"></i></button>
							</div>
						</div>
					</form>
				  </div>
                  <div class="table-striped table-responsive p-0">
                    <table class="table table-bordered bordered table-striped table-hover ">
                      <thead>
                        <tr>
                        <th class="text-uppercase text-dark text-sm font-weight-bolder ps-3">Location</th>
                        <th class="text-uppercase text-dark text-sm font-weight-bolder ps-2">Staff</th>
                        <th class="text-uppercase text-dark text-sm font-weight-bolder ps-2">Position</th>
                        <th class="text-uppercase text-dark text-sm font-weight-bolder ps-2">Status</th>
                        <th class="text-uppercase text-dark text-sm font-weight-bolder ps-2">Date</th>
                        </tr>
                      </thead>
                      <tbody>
<?php						if(count($loc) < 1){
?>								<tr>
									<td colspan="2" class="text-center fw-bold">No Records Found</td>
								</tr>
<?php						}
							else{
								foreach($loc as $data){
?>                        		<tr>
									<td>
										<div class="d-flex px-2">
											<div class="my-auto">
												<h6 class="mb-0 text-sm">
													<?=($data['location'] === '1'? 'Office':($data['location'] === '2'? 'RDO':($data['location'] === '3'? 'Treasury':($data['location'] === '4'? 'LTO':''))))?>
								  				</h6>
											</div>
										</div>
									</td>
									<td>
										<p class="text-sm font-weight-bold mb-0"><?=$data['staff_name']?></p>
									</td>
									<td>
										<p class="text-sm font-weight-bold mb-0"><?=$data['position']?></p>
									</td>
									<td>
										<p class="text-sm font-weight-bold mb-0"><?=($data['location_status'] === '0' ? 'Recieve': ($data['location_status'] === '1' ? 'Release': ($data['location_status'] === '2' ? 'Deliver': '')))?></p>
									</td>
									<td >
										<p class="text-sm font-weight-bold mb-0"><?=date('M-d-Y', strtotime($data['document_history']))?></p>
									</td>
								</tr>
<?php							}
							}
?>                            </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>