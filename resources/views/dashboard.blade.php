<x-app-layout>
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                             <h5 class="card-title text-primary">Welcome, {{ Auth::user()->fullname }} 🎉</h5>
                          <!-- <p class="mb-4">
                            You have done <span class="fw-medium">72%</span> more sales today. Check your new badge in
                            your profile.
                          </p> -->
                          <p class="mb-4">
                            The way to get started is to quit talking and begin doing.
                          </p>
                          <a href="{{ url('profile-details') }}" class="btn btn-sm btn-outline-primary">View Profile</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="{{ asset('img/illustrations/man-with-laptop-light.png') }}"
                            height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="{{ asset('img/icons/unicons/chart-success.png') }}" alt="chart success"
                                class="rounded" /> 
                              </div>
                          </div>
                          <span class="fw-medium d-block mb-1">Admissions</span>
                             <h3 class="card-title mb-2">200</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="{{ asset('img/icons/unicons/chart-success.png') }}" alt="chart success"
                                class="rounded" /> 
                              </div>
                          </div>
                          <span class="fw-medium d-block mb-1">Out Patient</span>
                             <h3 class="card-title mb-2">150</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
              </div>
              <div class="row">
                <div class="card">
                    <div class="card-body">
                        
                    </div>
                </div>
             </div>
            </div>
    </x-app-layout>