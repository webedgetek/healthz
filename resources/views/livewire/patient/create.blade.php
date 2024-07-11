
         <div class="container-xxl flex-grow-1 container-p-y">    
              <!-- <h4 class="py-3 mb-4">
                 <span class="text-muted fw-light">Product Category/</span> List
               </h4> -->
          <div class="app-ecommerce">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="d-flex flex-column justify-content-center">
          <h4 class="mb-1 mt-3">Patient Registration</h4>
          <p class="text-muted">Add new patient to the system</p>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-3">
          <button class="btn btn-label-secondary">Discard</button>
          <button class="btn btn-label-primary">Save draft</button>
          <button type="submit" class="btn btn-primary">Publish product</button>
        </div>
      </div>
  <div class="row">
   <!-- First column-->
   <div class="col-12 col-lg-8">
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-tile mb-0">Patient Bio-information</h5>
        </div>
        <div class="card-body">
          <form id="product_save" enctype="multipart/form-data" method="post"> 
          @csrf
          <div class="mb-3">
            <label class="form-label" for="product_name">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                    <input type="text" name="product_id" id="product_id" hidden>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="product_description">Title</label>
              <select name="title" id="title" class="form-control">
                <option disabled selected>-Select-</option>
                @foreach($title as $patient_title)                                        
                  <option value="{{ $patient_title->title_id }}">{{ $patient_title->title }}</option>
                 @endforeach
              </select>
            </div>
            <div class="col">
              <label class="form-label" for="firstname">Firstname</label>
              <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" autocomplete="off">
            </div>
            <div class="col">
              <label class="form-label" for="middlename">Middlename</label>
              <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middlename" autocomplete="off">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="lastname">Lastname</label>
              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" >
            </div>
            <div class="col">
              <label class="form-label" for="birth_date">Date of Birth</label>
              <input type="date" class="form-control" id="birth_date" name="birth_date" autocomplete="off">
            </div>
            <div class="col">
              <label class="form-label" for="gender">Gender</label>
              <select name="gender" id="gender" class="form-control">
                <option value="" disabled selected>-Select-</option>
                @foreach($gender as $patient_gender)                                        
                  <option value="{{ $patient_gender->gender_id }}">{{ $patient_gender->gender }}</option>
                 @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="telephone">Telephone</label>
              <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" autocomplete="off">
            </div>
            <div class="col">
              <label class="form-label" for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Address" autocomplete="off">
            </div>
            <div class="col">
              <label class="form-label" for="region">Region</label>
              <select name="region" id="region" class="form-control">
                <option value="" disabled selected>-Select-</option>
                @foreach($region as $ur)                                        
                  <option value="{{ $ur->region_id }}">{{ $ur->region }}</option>
                 @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="religion">Religion</label>
               <select name="religion" id="religion" class="form-control">
                <option value="" disabled selected>-Select-</option>
                @foreach($religion as $u_u)                                        
                  <option value="{{ $u_u->religion_id }}">{{ $u_u->religion }}</option>
                 @endforeach
               </select>
            </div>
            <div class="col">
              <label class="form-label" for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
            </div>
            <div class="col">
              <label class="form-label" for="old_folder">Old Folder Number</label>
              <input type="text" class="form-control" id="old_folder" name="old_folder" placeholder="Old Folder Number" autocomplete="off">
            </div>
          </div>
          <br>
          <div class="row mb 3">
                <h5 class="card-tile mb-0">Emergency Contact</h5>
          </div>
          <br>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="e_fullname">Fullname</label>
              <input type="text" class="form-control" id="e_fullname" name="e_fullname" placeholder="Name" autocomplete="off">
            </div>
            <div class="col">
              <label class="form-label" for="e_relationship">Relationship</label>
              <select name="e_relationship" id="e_relationship" class="form-control">
                <option disabled selected>-Select-</option>
                @foreach($relation as $rel)                                        
                  <option value="{{ $rel->relation_id }}">{{ $rel->relation }}</option>
                 @endforeach
              </select>
            </div>
            <div class="col">
              <label class="form-label" for="e_telephone">Telephone</label>
              <input type="text" class="form-control" id="e_telephone" name="e_telephone" placeholder="Telephone" autocomplete="off">
            </div>
          </div>
          <br>
          <div class="row mb 3">
                <h5 class="card-tile mb-0">Emergency Contact</h5>
          </div>
          <!-- <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="category">Category</label>
            <select name="category" id="category" class="form-control">
                   <option value="" disabled selected>-Select-</option>
                
            </select>
            </div>
            <div class="col">
              <label class="form-label" for="sub_category"> Sub Category</label>
             <select name="sub_category" id="sub_category" class="form-control">
              <option disable selected>-Select-</option>
              <option value="All">All</option>
              <option value="Wholesale">Wholesale</option>
              <option value="Resale">Resale</option>
             </select>
            </div>
          </div> -->
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="card mb-4">
        <div class="card-body">
          <div class="row mb 3">
                <h5 class="card-tile mb-0">Sponsorship Details</h5>
          </div>
          <br>
        <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="sponsorship_type">Sponsor Type</label>
             <select name="sponsorship_type" id="sponsorship_type" class="form-control">
              <option disable selected>-Select sponsor-</option>
              <!-- <option value="All">All</option>
              <option value="Wholesale">Wholesale</option>
              <option value="Resale">Resale</option> -->
            </select>
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="sponsor_name">Sponsor Name </label>
            <select id="sponsor_name" name="sponsor_name" class="select2 form-select">
              <option value="" disabled selected>-Select-</option>
              <!-- <option value="Yes">Yes</option>
              <option value="No">No</option> -->
            </select>
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="stockable">Membership Number</label>
             <input type="text" name="membership" id="membership" class="form-control" >
            <!-- <select id="stockable" name="stockable" class="select2 form-select">
              <option value="" disabled selected>-Select-</option>
              <option value="101">Yes</option>
              <option value="404">No</option>
            </select> -->
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="status">
              <span>Start Date</span></label>
            <input type="date" name="start_date" id="start_date" class="form-control">
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="status">
              <span>End Date</span></label>
            <input type="date" name="start_date" id="start_date" class="form-control">
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
                        <!-- <a class="btn btn-primary me-sm-3 me-1" href="{{ url('add-product') }}">Add New Product</a> -->
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
        
