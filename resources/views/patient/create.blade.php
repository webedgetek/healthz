<x-app-layout>
<div class="container-xxl flex-grow-1 container-p-y">    
          <div class="app-ecommerce">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="d-flex flex-column justify-content-center">
          <h4 class="mb-1 mt-3">Patient Registration</h4>
          <p class="text-muted">Add new patient to the system</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-3">
          <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdoal_form" >Search Patient</button>
          <button class="btn btn-primary">Service Request</button>
          <button type="submit" class="btn btn-primary">Sponsorship</button>
        </div>
      </div>
  <div class="row">
   <!-- First column-->
   <div class="col-12 col-lg-8">
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-tile mb-0"><b>Bio-information</b></h5>
        </div>
        <div class="card-body">
          <form id="patient_info" enctype="multipart/form-data" method="post">
           @csrf
          <div class="row mb-3">
            <div class="col">
              <input type="text" class="form-control" id="pat_id" name="pat_id" hidden>
              <label class="form-label" for="title">Title <a style="color: red;">*</a></label>
              <select name="title" id="title" class="form-control">
                <option disabled selected>-Select-</option>
                @foreach($title as $patient_title)                                        
                  <option value="{{ $patient_title->title_id }}">{{ $patient_title->title }}</option>
                 @endforeach
              </select>
              @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
              <label class="form-label" for="firstname">Firstname <a style="color: red;">*</a></label>
              <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" autocomplete="off">
              @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
              <label class="form-label" for="middlename">Middlename</label>
              <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middlename" autocomplete="off">
              @error('middlename') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="lastname">Lastname <a style="color: red;">*</a></label>
              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname">
              @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
              <label class="form-label" for="birth_date">Date of Birth <a style="color: red;">*</a></label>
              <input type="date" class="form-control" id="birth_date" name="birth_date" autocomplete="off">
              @error('birth_date') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
              <label class="form-label" for="age">Age</label>
              <input type="text" class="form-control" id="age" name="age" autocomplete="off" disabled>
              @error('birth_date') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="row mb-3">
             <div class="col">
              <label class="form-label" for="gender">Gender <a style="color: red;">*</a></label>
              <select name="gender" id="gender" class="form-control" wire:model="gender">
                <option value="" disabled selected>-Select-</option>
                @foreach($gender as $patient_gender)                                        
                  <option value="{{ $patient_gender->gender_id }}">{{ $patient_gender->gender }}</option>
                 @endforeach
              </select>
              @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
              <label class="form-label" for="occupation">Occupation <a style="color: red;">*</a></label>
              <select name="occupation" id="occupation" class="form-control">
                <option disabled selected>-Select-</option>
                <option value="Trader">Trader</option>
              </select>
              @error('occupation') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
              <label class="form-label" for="education">Education <a style="color: red;">*</a></label>
              <select name="education" id="education" class="form-control">
                <option value="" disabled selected>-Select-</option>
                <option value="None">None</option>
              </select>
              @error('education') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="religion">Religion <a style="color: red;">*</a></label>
               <select name="religion" id="religion" class="form-control">
                <option value="" disabled selected>-Select-</option>
                @foreach($religion as $u_u)                                        
                  <option value="{{ $u_u->religion_id }}">{{ $u_u->religion }}</option>
                 @endforeach
               </select>
               @error('religion') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
              <label class="form-label" for="nationality">Nationality <a style="color: red;">*</a></label>
              <select name="nationality" id="nationality" class="form-control">
                <option disabled selected>-Select-</option>
                <option value="GHANAIAN">Ghanaian</option>
                <option value="NON GHANAIAN">Non-Ghanaian</option>
              </select>
              @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
              <label class="form-label" for="old_folder">Old Folder Number</label>
              <input type="text" class="form-control" id="old_folder" name="old_folder" placeholder="Old Folder Number" autocomplete="off">
              @error('old_folder') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="row mb 3">
                <h5 class="card-tile mb-0"><b>Contact Information</b></h5>
          </div>
          <br>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="telephone">Cell phone</label>
              <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" autocomplete="off">
              @error('telephone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
              <label class="form-label" for="work_telephone">Work Telephone</label>
              <input type="text" class="form-control" id="work_telephone" name="work_telephone" placeholder="Work Telephone" autocomplete="off">
              @error('telephone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
              <label class="form-label" for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
              @error('address') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
           
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="address">Home Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Address" autocomplete="off">
              @error('address') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
              <label class="form-label" for="town">Town</label>
              <select name="town" id="town" class="form-control">
                <option value="" disabled selected>-Select-</option>
                @foreach($region as $ur)                                        
                  <option value="{{ $ur->region_id }}">{{ $ur->region }}</option>
                 @endforeach
              </select>
              @error('region') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
              <label class="form-label" for="region">Region</label>
              <select name="region" id="region" class="form-control">
                <option value="" disabled selected>-Select-</option>
                @foreach($region as $ur)                                        
                  <option value="{{ $ur->region_id }}">{{ $ur->region }}</option>
                 @endforeach
              </select>
              @error('region') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <br>
          <div class="row mb 3">
                <h5 class="card-tile mb-0"><b>Emergency Contact</b></h5>
          </div>
          <br>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="e_fullname">Fullname</label>
              <input type="text" class="form-control" id="e_fullname" name="e_fullname" placeholder="Name" autocomplete="off">
              @error('e_fullname') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
              <label class="form-label" for="e_relationship">Relationship</label>
              <select name="e_relationship" id="e_relationship" class="form-control">
                <option disabled selected>-Select-</option>
                @foreach($relation as $rel)                                        
                  <option value="{{ $rel->relation_id }}">{{ $rel->relation }}</option>
                 @endforeach
              </select>
              @error('e_relationship') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col">
              <label class="form-label" for="e_telephone">Telephone</label>
              <input type="text" class="form-control" id="e_telephone" name="e_telephone" placeholder="Telephone" autocomplete="off">
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
               <option value="Cash">Cash</option> 
              <option value="NHIS">Public NHIS</option>
              <option value="Company">Co-operate Company</option>
              <option value="Private Insurance">Private Insurance</option>
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
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="start_date">
              <span>Start Date</span></label>
            <input type="date" name="start_date" id="start_date" class="form-control">
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="end_date">
              <span>End Date</span></label>
            <input type="date" name="end_date" id="end_date" class="form-control">
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="end_date">
              <span style="color: red;">Active</span></label>
            <!-- <input type="date" name="end_date" id="end_date" class="form-control"> -->
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
                            <th>Product</th>
                            <th>Categories</th>
                            <th>Barcode</th>
                            <th class="text-nowrap text-sm-end">Stocked &nbsp;</th>
                            <th class="text-nowrap text-sm-end">Expirable</th>
                            <th>Status</th>
                            <th class="text-lg-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sn</th>
                            <th>Product</th>
                            <th>Categories</th>
                            <th>Barcode</th>
                            <th class="text-nowrap text-sm-end">Stocked &nbsp;</th>
                            <th class="text-nowrap text-sm-end">Expirable </th>
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