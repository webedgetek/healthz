<x-app-layout>
<div class="container-xxl flex-grow-1 container-p-y">    
          <div class="app-ecommerce">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        </div>
  <div class="row">
   <!-- First column-->
   <div class="col-12 col-lg-8">
   <!-- <h6 class="text-muted">Filled Tabs</h6> -->
    <div class="nav-align-top nav-tabs-shadow mb-6">
      <ul class="nav nav-tabs nav-fill" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
            <span class="d-none d-sm-block"><i class="tf-icons bx bx-home bx-sm me-1_5 align-text-bottom"></i> Bio Info 
            <!-- <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1_5 pt-50">3</span> -->
            </span><i class="bx bx-home bx-sm d-sm-none"></i></button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false">
              <span class="d-none d-sm-block"><i class="tf-icons bx bx-user bx-sm me-1_5 align-text-bottom"></i> Profile</span>
              <i class="bx bx-user bx-sm d-sm-none"></i>
            </button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages" aria-selected="false">
            <span class="d-none d-sm-block"><i class="tf-icons bx bx-message-square bx-sm me-1_5 align-text-bottom"></i> Messages</span>
            <i class="bx bx-message-square bx-sm d-sm-none"></i>
          </button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
          <p>
            Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps powder. Bear
            claw
            candy topping.
          </p>
          <p class="mb-0">
            Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon jelly-o
            jelly-o ice
            cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow jujubes sweet.
          </p>
        </div>
        <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
          <p>
            Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice cream. Gummies
            halvah
            tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream cheesecake fruitcake.
          </p>
          <p class="mb-0">
            Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah cotton candy
            liquorice caramels.
          </p>
        </div>
        <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
          <p>
            Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies cupcake gummi
            bears
            cake chocolate.
          </p>
          <p class="mb-0">
            Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet roll icing
            sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly jelly-o tart brownie
            jelly.
          </p>
        </div>
      </div>
    </div>
      <!-- <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-tile mb-0"><b>Bio-information</b></h5>
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <table class="table">
              <tr>
                <td><b>Fullname</b></td>
                <td>{{ $patients->fullname}}</td>
              </tr>
              <tr>
                <td><b>Gender</b></td>
                <td>{{ $patients->gender}}</td>
              </tr>
              <tr>
                <td><b>Age</b></td>
                <td>{{ $patients->age}}</td>
              </tr>
              <tr>
                <td><b>Blood Group</b></td>
                <td></td>
              </tr>
            </table>
          </div>
         <br>
          
          <div class="row mb 3">
                <h5 class="card-tile mb-0"><b>Contact Information</b></h5>
          </div>
          <br>
          <div class="row mb-3">
            <table class="table table-hover">
              <tr>
                <td><b>Email</b></td>
                <td>{{ $patients->email}}</td>
              </tr>
              <tr>
                <td><b>Address</b></td>
                <td>{{ $patients->address}}</td>
              </tr>
              <tr>
                <td><b>Telephone</b></td>
                <td>{{ $patients->telephone}}</td>
              </tr>
            </table>
          </div>
          <br>
          <div class="row mb 3">
                <h5 class="card-tile mb-0"><b>Emergency Contact</b></h5>
          </div>
          <br>
          <div class="row mb-3">
            <table class="table" align="left">
              <tr>
                <td><b>Fullname</b></td>
                <td>{{ $patients->contact_person}}</td>
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
          </div>
        </div>
      </div> -->
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
              <td><b>Registered By</b>:</td>
              <td>{{ $patients->user_fullname}}</td>
            </tr>
            <tr>
              <td colspan="2">
                <a href="#" class="btn btn-warning"><i class="fa fa-edit"></i>Edit </a>
               
                <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Visits</a>
              </td>
            </tr>
           </table>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="d-flex align-content-center flex-wrap gap-3">
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-label-secondary">clear</button>
    </div> -->
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