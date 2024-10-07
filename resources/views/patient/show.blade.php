<x-app-layout>
<div class="container-xxl flex-grow-1 container-p-y">    
          <div class="app-ecommerce">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        </div>
  <div class="row">
   <div class="col-12 col-lg-8">
    <div class="nav-align-top nav-tabs-shadow mb-6">
      <ul class="nav nav-tabs nav-fill" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#nav_home" aria-controls="navs-justified-home" aria-selected="true">
            <span class="d-none d-sm-block">
              <i class="tf-icons bx bx-home bx-sm me-1_5 align-text-bottom"></i> 
              Bio Info 
            </span>
            <i class="bx bx-home bx-sm d-sm-none"></i>
          </button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#nav_sponsor" aria-controls="navs-justified-profile" aria-selected="false">
              <span class="d-none d-sm-block">
                <i class="tf-icons bx bx-user bx-sm me-1_5 align-text-bottom"></i> 
                Patient Sponsor
              </span>
              <i class="bx bx-user bx-sm d-sm-none"></i>
            </button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#nav_attendance" aria-controls="navs-justified-messages" aria-selected="false">
            <span class="d-none d-sm-block">
              <i class="tf-icons bx bx-message-square bx-sm me-1_5 align-text-bottom"></i> Attendance History
            </span>
            <i class="bx bx-message-square bx-sm d-sm-none"></i>
          </button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#nav_medications" aria-controls="navs-justified-messages" aria-selected="false">
            <span class="d-none d-sm-block">
              <i class="tf-icons bx bx-message-square bx-sm me-1_5 align-text-bottom"></i> Medications
            </span>
            <i class="bx bx-message-square bx-sm d-sm-none"></i>
          </button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="nav_home" role="tabpanel">
          <p>
              <!-- <div class="card-header">
                  <h5 class="card-tile mb-0 text-primary"><b>BIO-INFORMATION</b></h5>
              </div> -->
                <table class="table">
                   <tr>
                        <td colspan="2">
                          <h5 class="text-primary"><b>BIO-INFORMATION</b></h5>
                        </td>
                      </tr>
                    <tr>
                      <td><b>Fullname</b></td>
                      <td>{{ $patients->fullname }}</td>
                    </tr>
                    <tr>
                      <td><b>Gender</b></td>
                      <td>{{ $patients->gender }}</td>
                    </tr>
                    <tr>
                      <td><b>Age</b></td>
                      <td>{{ $patients->age }}</td>
                    </tr>
                    
                   <tr>
                       <td colspan="2">
                          <h5 class="text-primary"><b>CONTACT</b></h5>
                       </td>
                    </tr>
                      <tr>
                        <td><b>Email</b></td>
                        <td>{{ $patients->email }}</td>
                      </tr>
                      <tr>
                        <td><b>Address</b></td>
                        <td>{{ $patients->address }}</td>
                      </tr>
                      <tr>
                        <td><b>Telephone</b></td>
                        <td>{{ $patients->telephone }}</td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <h5 class="text-primary"><b>EMERGENCY CONTACT PERSON</b></h5>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Fullname</b></td>
                        <td>{{ $patients->contact_person }}</td>
                      </tr>
                      <tr>
                        <td><b>Telephone</b></td>
                        <td>{{ $patients->contact_telephone }}</td>
                      </tr>
                      <tr>
                        <td><b>Relationship</b></td>
                        <td>{{ $patients->contact_relationship}}</td>
                      </tr>
                    </table>
          </p>
        </div>
        <div class="tab-pane fade" id="nav_sponsor" role="tabpanel">
          <p>
            <div>
              <h5>Sponsors</h5>
            </div>
            <table class="table table-hover" id="data_table">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Type</th>
                  <th>Member #</th>
                  <th>Effect Date</th>
                  <th>Expiry Date</th>
                  <th># Status</th>
                  <th>Active?</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @php
                    $counter = 1;
                     @endphp
                     @foreach($sponsor as $pat_sponsor)
                <tr>
                  <td>{{ $counter++ }}</td>
                  <td>{{ $pat_sponsor->sponsor_name}}</td>
                  <td>{{ $pat_sponsor->member_no}}</td>
                  <td>{{ \Carbon\Carbon::parse($pat_sponsor->start_date)->format('d-m-Y') }}</td>
                  <td>{{ \Carbon\Carbon::parse($pat_sponsor->end_date)->format('d-m-Y') }}</td>
                  <td> @if($pat_sponsor->status === 'Active')
                          <span class="badge bg-label-success me-1">Active</span>
                           @elseif ($pat_sponsor->status === 'Inactive')
                          <span class="badge bg-label-primary me-1">Inactive</span>
                       @endif
                  </td>
                  <td></td>
                  <td>
                  <div class="dropdown" align="center">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                              <i class="bx bx-dots-vertical-rounded"></i>
                                          </button>
                                              <div class="dropdown-menu">
                                                  <a class="dropdown-item"  href="#">
                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                  </a>
                                                  <a class="dropdown-item" href="#">
                                                    <i class="bx bx-lock-alt me-1"></i> Details 
                                                  </a>
                                                  <!-- <a class="dropdown-item" href="javascript:void(0);">
                                                      <i class="bx bx-trash me-1"></i> Delete
                                                  </a> -->
                                            </div>
                                  </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>S/N</th>
                  <th>Type</th>
                  <th>Member #</th>
                  <th>Effect Date</th>
                  <th>Expiry Date</th>
                  <th># Status</th>
                  <th>Active?</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </p>
        </div>
        <div class="tab-pane fade" id="nav_attendance" role="tabpanel">
        <p>
            <div>
              <h5>Attendance History</h5>
            </div>
            <table class="table table-hover" id="employee_details">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Type</th>
                  <th>Member #</th>
                  <th>Effect Date</th>
                  <th>Expiry Date</th>
                  <th># Status</th>
                  <th>Active?</th>
                  <th></th>
                </tr>
              </thead>
             
              <tfoot>
                <tr>
                  <th>S/N</th>
                  <th>Type</th>
                  <th>Member #</th>
                  <th>Effect Date</th>
                  <th>Expiry Date</th>
                  <th># Status</th>
                  <th>Active?</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </p>
        </div>
        <div class="tab-pane fade" id="nav_medications" role="tabpanel">
        <p>
            <div>
              <h5>Appointments History</h5>
            </div>
            <table class="table table-hover" id="app_list">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Type</th>
                  <th>Member #</th>
                  <th>Effect Date</th>
                  <th>Expiry Date</th>
                  <th># Status</th>
                  <th>Active?</th>
                  <th></th>
                </tr>
              </thead>
             
              <tfoot>
                <tr>
                  <th>S/N</th>
                  <th>Type</th>
                  <th>Member #</th>
                  <th>Effect Date</th>
                  <th>Expiry Date</th>
                  <th># Status</th>
                  <th>Active?</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </p>
        </div>
       
      </div>
    </div>
  </div>
    <div class="col-12 col-lg-4">
      <div class="card mb-4">
        <div class="card-body">
          <div class="row mb 3">
                <!-- <h5 class="card-tile mb-0"><b>Sponsorship Details</b></h5> -->
          </div>
          <!-- <br> -->
           <div class="mb-3 col ecommerce-select2-dropdown" align="center">
            <img src="{{$patients->gender==='Female' ? asset('img/avatars/female.jpg') : asset('img/avatars/male.jpg') }}" alt="Patient Image" class="rounded-pill" style="border:1px;border-color:black; box-shadow:10px ">
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown" align="center">
            <h5 class="card-tile mb-0"><b>{{ $patients->title}} {{$patients->fullname}}</b></h5>
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
           <table class="table">
            <tr>
              <td><b>Folder #</b>:</td>
              <td>{{ $patients->title}}</td>
            </tr>
            <tr>
              <td><b>Date Registered</b>:</td>
              <td>{{ \Carbon\Carbon::parse($patients->added_date)->format('d-m-Y') }}</td>
            </tr>
            <tr>
              <td><b>Blood Group</b>:</td>
              <td></td>
            </tr>
            <tr>
              <td><b>Sickling</b>:</td>
              <td>Negative</td>
            </tr>
            <tr>
              <td><b>Allergy</b>:</td>
              <td>Negative</td>
            </tr>
            <tr>
              <td><b>Registered By</b>:</td>
              <td>{{ $patients->user_fullname}}</td>
            </tr>
            <tr>
              <td colspan="2">
                  <a href="#" class="btn btn-secondary">
                    Generate ID
                  </a>
                  <a href="#" class="btn btn-warning">
                    Edit 
                  </a>
                  <!-- <a href="{{ route('attendance.index', ['patient_id' => $patients->patient_id]) }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> 
                    Add Visit
                  </a> -->
                  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewAddress"> Show </button> -->
                  <a href="" class="btn btn-primary" data-bs-toggle='modal' data-bs-target="#addattendance">
                    Add visit
                  </a>
                </td>
            </tr>
           </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
      <div class="app-ecommerce-category">
                  <div class="card">
                    <div class="card-datatable table-responsive">
                      <div style="margin:15px">
                        <h5>Patient Attendance History</h5>
                      </div>
                      <table class="datatables-category-list table border-top" id="product_list">
                        <thead>
                          <tr class="" align="center">
                            <th>S/N</th>  
                            <th>Att ID</th>
                            <th>Attendate Date</th>
                            <th>Clinic</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Sponsor &nbsp;</th>
                            <th>Service Fee</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                       
                        </tbody>
                        <tfoot>
                          <tr class="" align="center">
                              <th>S/N</th>  
                              <th>Att ID</th>
                              <th>Attendate Date</th>
                              <th>Clinic</th>
                              <th>Gender</th>
                              <th>Age</th>
                              <th>Sponsor &nbsp;</th>
                              <th>Service Fee</th>
                              <th>Status</th>
                              <th>Actions</th>
                            </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>   
             </div>
</div>   
  
<!-- Add New Address Modal -->
<div class="modal fade" id="addattendance" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-6">
          <h4 class="address-title mb-2">Patient Attendance Registration</h4>
          <p class="address-subtitle">Add new patient attendance registration</p>
        </div>
        <form id="addNewAddressForm" class="row g-6" onsubmit="return false">
          <div class="col-12 col-md-6">
            <label class="form-label" for="clinics">Service Category</label>
             <select name="clinics" id="clinics" class="form-control">
                <option>-Select-</option>
                @foreach($clinic as $clinics)                                        
                  <option value="{{ $clinics->clinic_id }}">{{ $clinics->clinic }}</option>
                 @endforeach
             </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="specialty">Service Type</label>
            <select name="specialty" id="specialty" class="form-control">
                <option>-Select-</option>
            </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="credit_amount">Credit Fee</label>
            <input type="text" id="credit_amount" name="credit_amount" class="form-control" placeholder="0.00" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="cash_amount">Cash Fee</label>
            <input type="text" id="cash_amount" name="cash_amount" class="form-control" placeholder="0.00"/>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="gdrg_code"> Service G-DRG</label>
            <input type="text" id="gdrg_code" name="gdrg_code" class="form-control" placeholder="0.00" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalAddressZipCode">Zip Code</label>
            <input type="text" id="modalAddressZipCode" name="modalAddressZipCode" class="form-control" placeholder="0.00" />
          </div>
          <div class="col-12">
            <div class="form-check form-switch my-2 ms-2">
              <!-- <input type="checkbox" class="form-check-input" id="billingAddress" /> -->
              <!-- <label for="billingAddress" class="switch-label">Use as a billing address?</label> -->
            </div>
          </div>
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary me-3">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Add New Address Modal -->

       
</x-app-layout>