<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $level = $this->session->userdata('level');
$type = $loc[0]['loan_type'];
$dnone = $this->session->userdata('location');
?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 id="type" class="text-white text-capitalize ps-3 d-inline-block"></h6>
				<a class="text-white d-inline-block float-end me-3" href="#"><img class="logo img-fluid" src="../../../assets/images/logo.png" alt="logo"></a>
                <a class="text-white d-inline-block float-end me-3" onclick="window.print()" data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i class="fas fa-print"></i></a>
<?php			if($dnone === 'block' || $dnone === 'return'){
				}
				else{
?>
				<a class="text-white d-inline-block float-end me-3" href="/documents/return/<?=$loc[0]['id']?>" onclick="return confirm('Are you sure you want to Return this Document?')"><i class="fa-solid fa-boxes-packing" data-bs-toggle="tooltip" data-bs-placement="top" title="Return Document"></i></a>
				<a class="text-white d-inline-block float-end me-3" href="/documents/delete/<?=$loc[0]['id']?>"onclick="return confirm('Are you sure you want to Block this Document?')"><i class="fa-solid fa-ban" data-bs-toggle="tooltip" data-bs-placement="top" title="Block"></i></a>
				<a class="text-white d-inline-block float-end me-3" href="/documents/edit/<?=$loc[0]['id']?>"><i class="fas fa-truck-fast" data-bs-toggle="tooltip" data-bs-placement="top" title="Move Document"></i></a>
<?php			}
?>                <a class="text-white d-inline-block float-end me-3" href="/dashboards/history" data-bs-toggle="tooltip" data-bs-placement="top" title="Back"><i class="fas fa-arrow-left"></i></a>
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
					<h6>Document Movements</h6>
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