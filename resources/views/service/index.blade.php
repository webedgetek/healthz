<x-app-layout>
<div class="container-xxl flex-grow-1 container-p-y">    
          <div class="app-ecommerce">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="d-flex flex-column justify-content-center">
          <h4 class="mb-1 mt-3">Service Requisition</h4>
          <p class="text-muted">Add New Service</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-3">
          <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdoal_form" >Search Patient</button>
          <!-- <button class="btn btn-primary">Service Request</button> -->
          <!-- <button type="submit" class="btn btn-primary">Sponsorship</button> -->
        </div>
      </div>
  <div class="row">
   <!-- First column-->
   <div class="col-12 col-lg-8">
      <div class="card mb-4">
        <div class="card-header">
          <!-- <h5 class="card-tile mb-0"><b>Search</b></h5> -->
        </div>
        <div class="card-body">
          <form id="patient_info" enctype="multipart/form-data" method="post">
           @csrf
          <div class="row mb-3">
            <div class="col">
              <input type="text" class="form-control" id="pat_id" name="pat_id" hidden>
              <label class="form-label" for="pat_search">Patient Search</label>
              <input type="text" class="form-control" id="pat_search" name="pat_search" placeholder="Name / Telephone/OPD #">
            </div>
          </div>
          <div class="row mb 3">
                <h5 class="card-tile mb-0"><b>Patient Information</b></h5>
          </div>
          <!-- <br> -->
          <div class="row mb-3">
            <div class="col">
              <input type="text" class="form-control" id="pat_id" name="pat_id" hidden>
              <label class="form-label" for="pat_search">Patient Name</label>
              <input type="text" class="form-control" id="pat_search" name="pat_search" disabled>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="firstname">Gender</label>
              <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Gender" autocomplete="off" disabled>
              <!-- @error('telephone') <span class="text-danger">{{ $message }}</span> @enderror -->
            </div>
            <div class="col">
              <label class="form-label" for="middlename">Age</label>
              <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Age" autocomplete="off" disabled>
              <!-- @error('telephone') <span class="text-danger">{{ $message }}</span> @enderror -->
            </div>
            <div class="col">
              <label class="form-label" for="surname">OPD #</label>
              <input type="email" class="form-control" id="surname" name="surname" autocomplete="off" disabled>
              <!-- @error('address') <span class="text-danger">{{ $message }}</span> @enderror -->
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="address">Service</label>
              <select name="clinic" id="clinic" class="form-control">
                <option value=""disable selected>-Select-</option>
              </select>
            </div>
            <div class="col">
              <label class="form-label" for="town">Service Fee</label>
             <input type="text" class="form-control" id="service_amount" name="service_amount" placeholder="0.00">
            </div>
            <div class="col">
              <label class="form-label" for="region">Cash Amount</label>
               <input type="text" class="form-control" id="cash_amount" name="cash_amount" placeholder="0.00">
            </div>
        </div>
          <!-- <br> -->
          <!-- <div class="row mb 3">
                <h5 class="card-tile mb-0">Emergency Contact</h5>
          </div> -->
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="card mb-4">
        <div class="card-body">
          <div class="row mb 3">
                <h5 class="card-tile mb-0"><b>Sponsorship Details</b></h5>
          </div>
          <br>
        <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="sponsor_type">Sponsor Type</label>
             <select name="sponsor_type" id="sponsor_type" class="form-control sponsorship_type">
                 <option disable selected>-Select sponsor-</option>
                  @foreach($sponsors as $sponsor)                                        
                  <option value="{{ $sponsor->sponsor_type_id }}">{{ $sponsor->sponsor_type }}</option>
                 @endforeach
            </select>
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="sponsor_name">Sponsor Name </label>
            <select id="sponsor_name" name="sponsor_name" class="select2 form-select sponsor_name">
              <option value="" disabled selected>-Select-</option>
              <option value="National Health Insurance">NHIS</option>
              <option value="Aacacia">Acacia</option>
            </select>
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="member_no">Membership Number</label>
             <input type="text" name="member_no" id="member_no" class="form-control" >
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="dependant">Dependant</label>
             <select class="form-control" class="form-control" id="dependant" name="dependant">
              <option value="NO" selected>NO</option>
              <option value="YES">YES</option>
             </select>
          </div>
         
         
         
        </div>
      </div>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-label-secondary">clear</button>
    </div>
  </form>
  </div>
</div>
<br>
      <div class="app-ecommerce-category">
                  <div class="card">
                    <div class="card-datatable table-responsive">
                      <div style="margin:15px">
                      </div>
                      <table class="datatables-category-list table border-top" id="product_list">
                        <thead>
                          <tr>
                            <th>Sn</th>
                            <th>Patient</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th class="text-nowrap text-sm-end">Clinic &nbsp;</th>
                            <th class="text-nowrap text-sm-end">Category</th>
                            <th>Status</th>
                            <th class="text-lg-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sn</th>
                            <th>Patient</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th class="text-nowrap text-sm-end">Clinic &nbsp;</th>
                            <th class="text-nowrap text-sm-end">Category</th>
                            <th>Status</th>
                            <th class="text-lg-center">Actions</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>   
             </div>
</div>   
          <!-- add Modal -->
          <div class="modal fade" id="mdoal_form" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
          <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
              <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                  <h3>Patient Search Criteria</h3>
                  <!-- <p>Enter Search criteria <b style="color:red">All fields marked (*) are mandatory.</b></p> -->
                </div>
                <form id="employee_add" class="row g-3" onsubmit="return false" method="post">
                  <div class="col-12 col-md-6">
                    <label class="form-label" for="telephone">Search Criteria <label class="text-danger" style="font-size: 15px;">*</label></label>
                     <select name="search_name" id="search_name" class="form-control">
                      <option selected disabled>-Select-</option>
                      <option value="opd_number">OPD #</option>
                      <option value="membership_number">Membership #</option>
                      <option value="firstname">Firstname</option>
                      <option value="surname">Surname</option>
                      <option value="middlename">Middlename</option>
                      <option value="telephone">Telephone</option>
                     </select>
                  </div>
                  <!-- <div class="col-12 col-md-6">
                    <label class="form-label" for="ssnit_number">Registration Date</label>
                    <input type="date" id="data_search" name="data_search" class="form-control modal-edit-tax-id" placeholder="123 456 7890" />
                  </div> -->
                  <!-- <div class="col-12 col-md-6">
                    <label class="form-label" for="gh_card">Date of Birth</label>
                    <input type="date" id="gh_card" name="gh_card" class="form-control modal-edit-tax-id" placeholder="123 456 7890" />
                  </div> -->
                  <div class="col-12 col-md-6">
                    <label class="form-label" for="staff_type">Criteria<label class="text-danger" style="font-size: 15px;">*</label></label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Firstname/Middlename/Surname">
                  </div>
                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Search</button>
                    <button type="reset" class="btn btn-label-warning me-sm-3 me-1">Clear</button>
                    <button type="reset" class="btn btn-label-danger" data-bs-dismiss="modal" aria-label="Close">close</button>
                  </div>
                </form>
              </div>
              <div class="table table-hover">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Sn</th>
                      <th>Patient Name</th>
                      <th>Date of Birth</th>
                      <th>Category</th>
                      <th>Member #</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="6" align="center">No Data Available</td>
                    </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>Sn</th>
                      <th>Patient Name</th>
                      <th>Date of Birth</th>
                      <th>Category</th>
                      <th>Member #</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- end modal -->
</x-app-layout>