<x-app-layout>
<div class="container-xxl flex-grow-1 container-p-y">    
          <div class="app-ecommerce">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <!-- <div class="d-flex flex-column justify-content-center">
          <h4 class="mb-1 mt-3">Patient Registration</h4>
          <p class="text-muted">Add new patient to the system</p>
        </div> -->
        <!-- <div class="d-flex align-content-center flex-wrap gap-3">
          <a href="{{ url('search-patient') }}" class="btn btn-primary">Search Patient</a>
         
        </div> -->
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
            <table class="table" border="2">
              <tr>
                <td><b>Fullname</b></td>
                <td>Mohammed Alhassan</td>
              </tr>
              <tr>
                <td><b>Gender</b></td>
                <td>Male</td>
              </tr>
              <tr>
                <td><b>Age</b></td>
                <td>56</td>
              </tr>
              <tr>
                <td><b>Blood Group</b></td>
                <td>O+</td>
              </tr>
            </table>
          </div>
         <br>
          <div class="row mb 3">
                <h5 class="card-tile mb-0"><b>Contact Information</b></h5>
          </div>
          <br>
          <div class="row mb-3">
            <table class="table" border="2">
              <tr>
                <td><b>Email</b></td>
                <td>bigboss200535@gmail.com</td>
              </tr>
              <tr>
                <td><b>Address</b></td>
                <td>Santasi Roundabout</td>
              </tr>
              <tr>
                <td><b>Blood Group</b></td>
                <td>O+</td>
              </tr>
            </table>
          </div>
          <br>
          <div class="row mb 3">
                <h5 class="card-tile mb-0"><b>Emergency Contact</b></h5>
          </div>
          <br>
          <div class="row mb-3">
            <table class="table" border="2">
              <tr>
                <td><b>Fullname</b></td>
                <td>Alhassan Mohammed</td>
              </tr>
              <tr>
                <td><b>Telephone</b></td>
                <td>0245340461</td>
              </tr>
              <tr>
                <td><b>Relationship</b></td>
                <td>Brother</td>
              </tr>
            </table>
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
                <!-- <h5 class="card-tile mb-0"><b>Sponsorship Details</b></h5> -->
          </div>
          <!-- <br> -->
           <div class="mb-3 col ecommerce-select2-dropdown" align="center" style="">
            <img src="{{Auth::user()->gender==='female' ? asset('img/avatars/female.jpg') : asset('img/avatars/male.jpg') }}" alt="Patient Image" class="rounded-pill" style="border:1px;border-color:black; box-shadow:10px ">
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown" align="center">
            <h5 class="card-tile mb-0"><b>Alhassan Mohammed</b></h5>
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
           <table class="table">
            <tr>
              <td><b>Folder #</b></td>
              <td>G00001/21</td>
            </tr>
            <tr>
              <td><b>Date Registered</b></td>
              <td>20-03-2024</td>
            </tr>
            <tr>
              <td colspan="2">
                <a href="#" class="btn btn-warning"><i class="fa fa-edit"></i>Edit </a>
                <!-- <a href="#" class="btn btn-primary">Edit</a> -->
                <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Visits</a>
              </td>
            </tr>
           </table>
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
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th class="text-nowrap text-sm-end">Sponsor &nbsp;</th>
                            <th class="text-nowrap text-sm-end">Telephone</th>
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