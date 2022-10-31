<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Manila");
$curr_timestamp = date('Y-m-d H:i:s');
?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3 d-inline-block"><?=$list[0]['doc_number']?></h6>
                <a class="text-white d-inline-block float-end me-3" href="/dashboards/form"><i class="fas fa-plus"></i></a>
                <a class="text-white d-inline-block float-end me-3" href="/dashboards/history"><i class="fas fa-arrow-left"></i></a>
              </div>
            </div>
            <div class="card-body p-3">
                <div class="view_docs">
                  <?=$this->session->flashdata('input_errors');?>
                  <form action="/documents/update" method="post" class="text-start">
                      <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                      
                      <div class="row">
                          <div class="col-md-4">
                              <div class="col-md-4 input-group input-group-outline my-1 focused is-focused">
                                  <label class="form-label">Applicant fullname</label>
                                  <input type="text" name="fullname" class="form-control" value="<?=$list[0]['fullname']?>">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                              <div class="col-md-4 input-group input-group-outline my-1 focused is-focused">
                                  <label class="form-label">Type of loan</label>
                                  <input type="text" name="typeofloan" class="form-control" value="<?=$list[0]['loan_type']?>">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4">
                              <div class="col-md-4 input-group input-group-outline my-1 focused is-focused">
                                  <label class="form-label">Type of Document</label>
                                  <input type="text" name="typeofdocs" class="form-control" value="<?=$list[0]['document_type']?>">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="my-1">
                                  <input type="hidden" name="id" value="<?=$list[0]['id']?>">
                                  <button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button>
                              </div>
                          </div>
                      </div>
                  </form>
                  <h6>Document Movements <button id="show_form" class="bg-success rounded text-white"><i class="fas fa-plus"></i></button><button id="hide_form" class="bg-danger rounded text-white"><i class="fas fa-trash"></i></button></h6>
                  <?=$this->session->flashdata('location_errors');?>
				  <div class="movement_form">
					<form action="/documents/add_location" method="post">
                    	<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
						<div class="row">
							<div class="col-md">
								<div class="col-md input-group input-group-outline my-1">
									<select name="location" class="form-control" aria-label="Default select example">
										<option value="empty" selected>Select location</option>
										<option value="0">Office</option>
										<option value="1">ROD</option>
										<option value="2">Treasury</option>
										<option value="3">LTO</option>
									</select>
								</div>
							</div>
							<div class="col-md">
								<div class="col-md-4 input-group input-group-outline my-1">
									<label class="form-label">Recieved By</label>
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
									<label class="form-label">Recieved At</label>
									<input type="text" name="recieved_at" class="form-control" value="<?= $curr_timestamp?>">
								</div>
							</div>
							<div class="col-md">
								<div class="col-md-4 input-group input-group-outline my-1 focused is-focused">
									<label class="form-label">Released At</label>
									<input type="text" name="released_at" class="form-control" value="<?= $curr_timestamp?>">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md">
								<input type="hidden" name="id" class="form-control" value="<?=$list[0]['id']?>">
								<input type="hidden" name="doc_number" class="form-control" value="<?=$list[0]['doc_number']?>">
                                <button type="submit" class="btn btn-success float-end"><i class="fas fa-save"></i></button>
							</div>
						</div>
					</form>
				  </div>
                  <div class="table-striped table-responsive p-0">
                    <table class="table border">
                      <thead>
                        <tr>
                        <th class="text-uppercase text-dark text-sm font-weight-bolder ps-3">Location</th>
                        <th class="text-uppercase text-dark text-sm font-weight-bolder ps-2">Recieved By</th>
                        <th class="text-uppercase text-dark text-sm font-weight-bolder ps-2">Position</th>
                        <th class="text-uppercase text-dark text-sm font-weight-bolder ps-2">Recieved at</th>
                        <th class="text-uppercase text-dark text-sm font-weight-bolder ps-2">Release</th>
                        </tr>
                      </thead>
                      <tbody>
<?php                   	for($i=0; $i<count($loc); $i++){
                        	$recieved = date('m-d-Y, H:i:s', strtotime($loc[$i]['recieved_at']));
                        	$released = date('m-d-Y, H:i:s', strtotime($loc[$i]['released_at']));
?>                		  <tr class="<?=($recieved !== $released? 'bg-success bg-gradient' : 'bg-danger bg-gradient') ?>">
                          <td>
                            <div class="d-flex px-2">
                              <div class="my-auto">
                                <h6 class="mb-0 text-sm">
<?php 						if($loc[$i]['location'] === '0'){
								echo('Office');
							}
							elseif($loc[$i]['location'] === '1'){
								echo('ROD');
							}
							elseif($loc[$i]['location'] === '2'){
								echo('Treasury');
							}
							elseif($loc[$i]['location'] === '3'){
								echo('LTO');
							}
?>								  </h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="text-sm font-weight-bold mb-0"><?=$loc[$i]['recieved_by']?></p>
                          </td>
                          <td>
                            <p class="text-sm font-weight-bold mb-0"><?=$loc[$i]['position']?></p>
                          </td>
                          <td >
                            <p class="text-sm font-weight-bold mb-0"><?=$released?></p>
                          </td>
                          <td >
                            <form action="/documents/release" method="post">
								<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
								<input type="hidden" name="location_id" value="<?=$loc[$i]['id']?>">
								<input type="hidden" name="document_id" value="<?=$list[$i]['id']?>">
								<input type="hidden" name="doc_number" value="<?=$list[$i]['doc_number']?>">
								<input type="hidden" name="fullname" value="<?=$list[$i]['fullname']?>">
								<input type="hidden" name="location" value="<?=$loc[$i]['location']?>">
								<button id="release" onclick="return confirm('Are you sure you want to Release this document?')" class="bg-secondary rounded text-white"><i class="fas fa-share"></i></button>
							</form>
                          </td>
                        </tr>
        <?php                   		}
        ?>                            </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>