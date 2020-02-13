@extends('app')
@section('main-content')     
  <div class="content">
    <div class="container-fluid">
      <!-- Model-->
      @can('isModel')
      <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add_a_photo</i>
              </div>
              <p class="card-category">No Of Photographer</p>
              <h3 class="card-title">0/0
                <small></small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-warning">warning</i>
                <a class="warning-link" href="{{ route('price_chart') }}">Get More Contact</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons text-format-paint">format_paint</i>
              </div>
              <p class="card-category">No of Makeup Artist</p>
              <h3 class="card-title">0/0</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-warning">warning</i>
                <a class="warning-link" href="{{ route('price_chart') }}">Get More Contact</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">storage</i>
              </div>
              <p class="card-category">Personal Gallery</p>
              <h3 class="card-title">0/0</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-warning">warning</i> 
                <a class="warning-link" href="{{ route('price_chart') }}">Get More Space</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endcan
      <!-- Model -->

      <!-- Photographer-->
      @can('isPhotographer')
      <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">nature_people</i>
              </div>
              <p class="card-category">No Of Model</p>
              <h3 class="card-title">0/5
                <small></small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-warning">warning</i>
                <a class="warning-link" href="{{ route('price_chart') }}">Get More Contact</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons text-format-paint">format_paint</i>
              </div>
              <p class="card-category">No of Makeup Artist</p>
              <h3 class="card-title">0/0</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-warning">warning</i>
                <a class="warning-link" href="{{ route('price_chart') }}">Get More Contact</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">storage</i>
              </div>
              <p class="card-category">Personal Gallery</p>
              <h3 class="card-title">0/10</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-warning">warning</i> 
                <a class="warning-link" href="{{ route('price_chart') }}">Get More Space</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endcan
        <!-- Photographer -->

      <!-- MakeupArtist -->
      @can('isMakeupArtist')
      <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add_a_photo</i>
              </div>
              <p class="card-category">No Of Photographer</p>
              <h3 class="card-title">0/3
                <small></small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-warning">warning</i>
                <a class="warning-link" href="{{ route('price_chart') }}">Get More Contact</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons text-format-paint">nature_people</i>
              </div>
              <p class="card-category">No of Model</p>
              <h3 class="card-title">0/3</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-warning">warning</i>
                <a class="warning-link" href="{{ route('price_chart') }}">Get More Contact</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">storage</i>
              </div>
              <p class="card-category">Personal Gallery</p>
              <h3 class="card-title">0/10</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-warning">warning</i> 
                <a class="warning-link" href="{{ route('price_chart') }}">Get More Contact</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endcan
      <!-- MakeupArtist-->


      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title">Timeline</h4>
            </div>
            <div class="card-body">
              <div class="row">
                @foreach ($all_users as $all_user)
                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="profile">
                      <div class="profile-header">
                        {{-- <img src="assets/img/faces/avatar.jpg" class="responsive" alt="Profile Picture"> --}}
                        @if ($all_user->profile_picture=="")
                            @if ($all_user->gender=="Male")
                                <img src="assets/img/faces/noface_male.png" class="responsive" alt="Profile Picture"> 
                            @elseif($all_user->gender=="Female")
                                <img src="assets/img/faces/noface_female.png" class="responsive" alt="Profile Picture"> 
                            @else
                                <img src="assets/img/faces/no_face_others.png" class="responsive" alt="Profile Picture"> 
                            @endif
                            
                            
                        @else
                            <img src="{{ asset('storage/'.$all_user->profile_picture) }}" class="responsive" alt="Profile Picture">
                        @endif
                        
                        
                      </div>
                      <div class="profile-body">
                        <div class="table-responsive">
                          <table class="table">
                            <thead class="text-primary">
                              <tr>
                                <th colspan="2">
                                  <p class=" alert alert-primary text-center">{{ App\model\UserArchive::FindUserEnityByUserID($all_user->user_id) }}</p>
                                </th>
                              </tr>
                              <tr>
                                <th>User Code</th>
                                <th>{{ $all_user->user_id }}</th>
                              </tr>
                              <tr>
                                <th>Location</th>
                                <th>{{ App\model\city_master::find_city_name($all_user->city) }}</th>
                              </tr>
                              <tr>
                                <th>Gender:</th>
                                <th>{{ $all_user->gender }}</th>
                              </tr>
                            </thead>
                          </table>
                        </div>    
                      </div>
                      <div class="profile-footer">
                        <a class="btn btn-primary" href="profile.html">View Profile</a>
                      </div>
                    </div>
                  </div>
                @endforeach
                              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
    <!-- footer --> 