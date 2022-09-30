<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Application Form</h6>
              </div>
            </div>
            <div class="card-body p-3">
                <?=$this->session->flashdata('input_errors');?>
                <form action="/users/validate" method="post" class="text-start">
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Amount</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 offset-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Date of Application</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Purpose</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4 offset-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Date Needed</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                    </div>
                    <h4 class="text-center">Client Information</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Firstname</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Middlename</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Lastname</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Age</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Occupation</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Tin Number</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                    </div>
                    <p class="fw-bold col-md-12 mt-3 border-bottom">Contact Details</p>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Street/Unit/Bldg/Village</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Cellphone Number</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                    </div>
                    <p class="fw-bold col-md-12 mt-3 border-bottom">Family Background</p>
                    <p>Spouse:</p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Firstname</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Middlename</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Lastname</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                    </div>
                    <p>Dependents:</p>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Below 6 years old</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Elementary</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">High School</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">College</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                    </div>
                    <p class="fw-bold col-md-12 mt-3 border-bottom">Employment / Business Details</p>
                    <div class="row">
                        <p>Source of Income</p>
                        <div class="row">
                            <div class="col-md-3 form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Farming</label>
                            </div>
                            <div class="col-md-3 form-check ">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">Business</label>
                            </div>
                            <div class="col-md-3 form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Salary</label>
                            </div>
                            <div class="col-md-3 form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">Others</label>
                            </div>
                        </div>
                        <p>Anual Gross Income</p>
                        <div class="row">
                            <div class="col-md-3 form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Up to 200,000</label>
                            </div>
                            <div class="col-md-3 form-check ">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">400,001 to 500,000</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">200,001 to 300,000</label>
                            </div>
                            <div class="col-md-3 form-check ">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">500,001 to 1,000,000</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">300,001 to 400,000</label>
                            </div>
                            <div class="col-md-3 form-check ">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">More than 1,000,000</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Business/Company Name</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Business/Company Address</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                    </div>
                    <h4 class="text-center">Loan Purpose/s</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Specific purpose</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Amount</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="col-md-4 input-group input-group-outline my-1">
                                <label class="form-label">Date Needed</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success w-100">Add Purpose/s</button>
                        </div>
                        <div class="col-md-2">
                            <button class="btn bg-gradient-primary w-100">Delete</button>
                        </div>
                    </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success w-100 my-4 mb-2">Add Client</button>
                        </div>
                </form>
            </div>
          </div>
        </div>
      </div>