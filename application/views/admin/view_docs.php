<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$level = $this->session->userdata('level');
?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 id="type" class="text-white text-capitalize ps-3 d-inline-block"><?=$list[0]['loan_type']?></h6>
				<a class="text-white d-inline-block float-end me-3" href="#"><img class="logo img-fluid" src="../../../assets/images/logo.png" alt="logo"></a>
                <a class="text-white d-inline-block float-end me-3" onclick="window.print()"><i class="fas fa-print"></i></a>
<?php       	if($level === 'Admin' || $level === 'Bookeeper') {
?> 				  <a class="text-white d-inline-block float-end me-3" href="/documents/edit/<?=$list[0]['id']?>"><i class="fas fa-pen"></i></a>
<?php			}
?>                <a class="text-white d-inline-block float-end me-3" href="/dashboards/history"><i class="fas fa-arrow-left"></i></a>
              </div>
            </div>
            <div class="card-body p-3">
                <div class="view_docs">
					<div class="details mt-3">
						<p class="text-sm font-weight-bold mb-4"><?=$list[0]['doc_number']?></p>
						<p class="text-sm font-weight-bold">Date: <?= date('M d'.','.' Y', strtotime($list[0]['created_at'])) ?></p>
						<p class="text-sm font-weight-bold">Client Name: <?=strtoupper($list[0]['fullname'])?></p>
						<p class="text-sm font-weight-bold">Type of loan: <?=strtoupper($list[0]['loan_type'])?></p>
						<p class="text-sm font-weight-bold">Type of document: <?=strtoupper($list[0]['document_type'])?></p>
						<hr class="horizontal dark mt-0 mb-2">
					</div>
					<h6>Document Movements</h6>
					<div class="table-striped table-responsive p-0">
						<table class="table border">
							<thead>
								<tr>
								<th class="text-uppercase text-dark text-sm font-weight-bolder ps-3">Location</th>
								<th class="text-uppercase text-dark text-sm font-weight-bolder ps-2">Recieved By</th>
								<th class="text-uppercase text-dark text-sm font-weight-bolder ps-2">Position</th>
								<th class="text-uppercase text-dark text-sm font-weight-bolder ps-2">Recieved at</th>
								<th class="text-uppercase text-dark text-sm font-weight-bolder ps-2">Release at</th>
								</tr>
							</thead>
							<tbody>
<?php                   		for($i=0; $i<count($loc); $i++){
								$recieved = date('m-d-Y', strtotime($list[$i]['recieved_at']));
								$release = date('m-d-Y', strtotime($list[$i]['released_at']));
?>                        		  <tr>
									<td>
										<div class="d-flex px-2">
											<div class="my-auto">
												<h6 class="mb-0 text-sm">
<?php 											if($loc[$i]['location'] === '0'){
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
?>								  				  </h6>
											</div>
										</div>
									</td>
									<td>
										<p class="text-sm font-weight-bold mb-0"><?=$list[$i]['recieved_by']?></p>
									</td>
									<td>
										<p class="text-sm font-weight-bold mb-0"><?=$list[$i]['position']?></p>
									</td>
									<td >
										<p class="text-sm font-weight-bold mb-0"><?=$recieved?></p>
									</td>
									<td >
										<p class="text-sm font-weight-bold mb-0"><?=$release?></p>
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