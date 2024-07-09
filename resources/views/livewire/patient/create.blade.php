
         <div class="container-xxl flex-grow-1 container-p-y">    
              <!-- <h4 class="py-3 mb-4">
                 <span class="text-muted fw-light">Product Category/</span> List
               </h4> -->
          <div class="app-ecommerce">
      <!-- Add Product -->
      <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="d-flex flex-column justify-content-center">
          <h4 class="mb-1 mt-3">Patient Registration</h4>
          <p class="text-muted">Add new patient to the system</p>
        </div>
        <!-- <div class="d-flex align-content-center flex-wrap gap-3">
          <button class="btn btn-label-secondary">Discard</button>
          <button class="btn btn-label-primary">Save draft</button>
          <button type="submit" class="btn btn-primary">Publish product</button>
        </div> -->
      </div>
  <div class="row">
   <!-- First column-->
   <div class="col-12 col-lg-8">
      <!-- Product Information -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-tile mb-0">Patient Bio-information</h5>
        </div>
        <div class="card-body">
          <form id="product_save" enctype="multipart/form-data" method="post"> 
          @csrf
          <!-- <div class="mb-3">
            <label class="form-label" for="product_name">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                    <input type="text" name="product_id" id="product_id" hidden>
          </div> -->
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
              <label class="form-label" for="manufacturer">Firstname</label>
              <input type="text" class="form-control" id="manufacturer" name="manufacturer" placeholder="Manufacturer">
            </div>
            <div class="col">
              <label class="form-label" for="manufacturer">Middlename</label>
              <input type="text" class="form-control" id="manufacturer" name="manufacturer" placeholder="Manufacturer">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="product_description">Lastname</label>
              <input type="text" class="form-control" id="product_description" name="product_description" placeholder="Other Descrption" >
            </div>
            <div class="col">
              <label class="form-label" for="manufacturer">Date of Birth</label>
              <input type="date" class="form-control" id="manufacturer" name="manufacturer" placeholder="Manufacturer">
            </div>
            <div class="col">
              <label class="form-label" for="manufacturer">Gender</label>
              <select name="gender" id="gender" class="form-control">
                <option value="" disabled selected>-Select-</option>
                <option value="">Male</option>
                <option value="">Female</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="telephone">Telephone</label>
              <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Other Descrption" autocomplete="off">
            </div>
            <div class="col">
              <label class="form-label" for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Address" autocomplete="off">
            </div>
            <div class="col">
              <label class="form-label" for="manufacturer">Region</label>
              <select name="gender" id="gender" class="form-control">
                <option value="" disabled selected>-Select-</option>
                <option value="">Male</option>
                <option value="">Female</option>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="product_description">Religion</label>
              <!-- <input type="text" class="form-control" id="relationship" name="relationship" > -->
               <select name="religion" id="religion" class="form-control">
                <option value="" disabled selected>-Select-</option>
                <!-- <option value=""></option> -->
               </select>
            </div>
            <div class="col">
              <label class="form-label" for="manufacturer">Email</label>
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
              <label class="form-label" for="contact_name">Fullname</label>
              <input type="text" class="form-control" id="contact_name" name="product_description" placeholder="Name" autocomplete="off">
            </div>
            <div class="col">
              <label class="form-label" for="relationship">Relationship</label>
              <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Relationship" autocomplete="off">
            </div>
            <div class="col">
              <label class="form-label" for="telephone">Telephone</label>
              <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" autocomplete="off">
            </div>
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
        <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="expirable">
              Sales Type
            </label>
            <select name="sales_type" id="sales_type" class="form-control">
              <option disable selected>-Select-</option>
              <option value="All">All</option>
              <option value="Wholesale">Wholesale</option>
              <option value="Resale">Resale</option>
            </select>
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="expirable">
              Expirable
            </label>
            <select id="expirable" name="expirable" class="select2 form-select">
              <option value="" disabled selected>-Select-</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="stockable">
              Stockable
            </label>
            <select id="stockable" name="stockable" class="select2 form-select">
              <option value="" disabled selected>-Select-</option>
              <option value="101">Yes</option>
              <option value="404">No</option>
            </select>
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="status">
              <span>Status</span>
            </label>
            <select id="status" name="status" class="select2 form-select">
              <option disabled selected>-Select-</option>
              <option value="Active">Publish</option>
              <option value="Inactive">Disable</option>
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
        
