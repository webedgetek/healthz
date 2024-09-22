<x-app-layout>
<div class="container-xxl flex-grow-1 container-p-y">    
    <!-- Invoice List Widget -->

<div class="card mb-6">
  <div class="card-widget-separator-wrapper">
    <div class="card-body card-widget-separator">
      <div class="row gy-4 gy-sm-1">
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-center card-widget-1 border-end pb-4 pb-sm-0">
            <div align="center" style="border:4px;border-color:teal; box-shadow:50px;">
                <!-- <p align="center" >PATIENT PROFILE</p> -->
                <h6>PATIENT PROFILE</h6>
                  <img src="{{$patients->gender==='Female' ? asset('img/avatars/female.jpg') : asset('img/avatars/male.jpg') }}" alt="Patient Image" class="rounded-pill" style="border:1px;border-color:black; box-shadow:10px; width:70%" align="center">
                 <br>
                  <h6 class="mb-0">
                    <span class="badge bg-label-primary">Triage</span>
                </h6>
                <p class="mb-0">Mohammed Alhassan</p>
            </div>
          </div>
          <hr class="d-none d-sm-block d-lg-none me-6">
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-center card-widget-2 border-end pb-4 pb-sm-0">
            <div>
              <!-- <h4 class="mb-0">165</h4> -->
              <p class="mb-0">Patient Info</p>
            </div>
            <!-- <div class="avatar me-lg-6">
              <span class="avatar-initial rounded bg-label-secondary text-heading">
                <i class="bx bx-file bx-26px"></i>
              </span>
            </div> -->
          </div>
          <hr class="d-none d-sm-block d-lg-none me-6">
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-center border-end pb-4 pb-sm-0 card-widget-3">
            <div>
              <h4 class="mb-0">$2.46k</h4>
              <p class="mb-0">Paid</p>
            </div>
            <div class="avatar me-sm-6">
              <span class="avatar-initial rounded bg-label-secondary text-heading">
                <i class="bx bx-check-double bx-26px"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="mb-0">$876</h4>
              <p class="mb-0">Unpaid</p>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-secondary text-heading">
                <i class="bx bx-error-circle bx-26px"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- 
<div class="card card-action mb-12">
  <div class="card-alert"></div>
  <div class="card-header">
    <h5 class="card-action-title mb-0">Cards Action</h5>
    <div class="card-action-element">
      <ul class="list-inline mb-0">
        <li class="list-inline-item">
          <a href="javascript:void(0);" class="card-collapsible"><i class="tf-icons bx bx-chevron-up"></i></a>
        </li>
        <li class="list-inline-item">
          <a href="javascript:void(0);" class="card-reload"><i class="tf-icons bx bx-rotate-left scaleX-n1-rtl"></i></a>
        </li>
      </ul>
    </div>
  </div>
  <div class="collapse show">
        <table class="table table-hover">
        <thead>
            <tr>
            <th>Action</th>
            <th class="text-center">Icon</th>
            <th>Details</th>
            </tr>
        </thead>
        
        </table>
  </div>
</div> -->
<!-- <br> -->
<!-- <h6 class="pb-1 mb-6 text-muted">Examples</h6> -->
<!--/ Cards Action -->

</div>        
</x-app-layout>