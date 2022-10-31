<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<div class="container-fluid py-4">
		<div class="row">
			<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
				<div class="card">
					<div class="card-header p-3 pt-2">
						<div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
							<i class="fas fa-file"></i>
						</div>
						<div class="text-end pt-1">
							<p class="text-sm mb-0 text-capitalize">New Documents</p>
							<h4 class="mb-0"><?=count($offices)?></h4>
						</div>
						</div>
						<hr class="dark horizontal my-0">
						<div class="card-footer p-3">
						<p class="mb-0"><a href="/dashboards/offices" class="text-success text-sm font-weight-bolder">View Details</a></p>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
				<div class="card">
					<div class="card-header p-3 pt-2">
						<div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
							<i class="fas fa-file"></i>
						</div>
						<div class="text-end pt-1">
							<p class="text-sm mb-0 text-capitalize">ROD</p>
							<h4 class="mb-0"><?=count($rod)?></h4>
						</div>
						</div>
						<hr class="dark horizontal my-0">
						<div class="card-footer p-3">
						<p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="/dashboards/rod" class="text-success text-sm font-weight-bolder">View Details</a></p>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
				<div class="card">
					<div class="card-header p-3 pt-2">
						<div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
							<i class="fas fa-file"></i>
						</div>
						<div class="text-end pt-1">
							<p class="text-sm mb-0 text-capitalize">Treasury</p>
							<h4 class="mb-0"><?=count($treasury)?></h4>
						</div>
						</div>
						<hr class="dark horizontal my-0">
						<div class="card-footer p-3">
						<p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="/dashboards/treasury" class="text-success text-sm font-weight-bolder">View Details</a></p>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6">
				<div class="card">
					<div class="card-header p-3 pt-2">
						<div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
							<i class="fas fa-file"></i>
						</div>
						<div class="text-end pt-1">
							<p class="text-sm mb-0 text-capitalize">LTO</p>
							<h4 class="mb-0"><?=count($lto)?></h4>
						</div>
						</div>
						<hr class="dark horizontal my-0">
						<div class="card-footer p-3">
						<p class="mb-0"><span class="text-success text-sm font-weight-bolder"><a href="/dashboards/lto" class="text-success text-sm font-weight-bolder">View Details</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid p-3">
      <div class="row">
        <div class="col-12">
          <div class="card p-3">
			<h6>Document Created Today</h6>
            <div class="card-body">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0" id="userlist">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Document #</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Applicant</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Loan Type</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Document Type</th>
                        </tr>
                    </thead>
                    <tbody>
<?php                   for($i=0; $i<count($list); $i++){
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
                            <td >
                                <p class="text-sm font-weight-bold mb-0"><?=$list[$i]['document_type']?></p>
                            </td>
                        </tr>
<?php                   }
?>                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>