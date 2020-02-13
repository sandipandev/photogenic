@extends('app')
 @section('main-content')
      
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  
                    
                      <label for="file-input" style="cursor: pointer;position: relative;min-width: 130px;min-height: 130px;">
                      <img src="{{ asset('storage/'.$user_information->profile_picture) }}"/>
                        <div class="centered"><i class="material-icons">add_a_photo</i></div>
                      </label>

                      
                    
                </div>
                <div class="card-body">
                  <form action="/store_profile_picture" method="POST" enctype="multipart/form-data">
                    @csrf
                      <input id="file-input" style="display: none;" type="file" name="profile_picture" required/>
                    @foreach ($user_details as $user_detail )
                        
                    
                  <h6 class="card-category">{{ $user_entity }}</h6>
                <h4 class="card-title">{{ $user_detail->name }}</h4>
                  <p class="card-description">
                    {{ $user_information->about_me }}
                  </p>
                  <input type="submit" class="btn btn-primary btn-round" value="Upload">
                </form> 
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form action="/update_user_profile" method="POST">
                    @csrf 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">{{ $user_detail->email }}</label>
                          <input type="text" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" value="{{ $user_detail->email }}" class="form-control" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{ $user_information->first_name }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Middle Name</label>
                          <input type="text" name="middle_name" class="form-control"value="{{ $user_information->middle_name }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" name="last_name" class="form-control" value="{{ $user_information->last_name }}">
                        </div>
                      </div>
                    </div>
                    {{-- <div class="row">
                      <div class="col-md-12">
                        <label class="bmd-label-floating">Display Name Preference</label><br>
                        <input type="radio" name="display_name" value="registration_name" checked> Registration Name<br>
                        <input type="radio" name="display_name" value="profile_name"> Profile Name
                      </div>
                    </div> --}}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" name="address" class="form-control" value="{{ $user_information->address }}">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Country</label>
                            <select name="country" class="form-control country" id="country">
                              <option value="0">select</option>
                              @foreach ($countries as $country )
                              @if ($user_information->country!=$country->id)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @else
                                <option value="{{$country->id}}" selected>{{$country->name}}</option>      
                              @endif
                                
                              @endforeach
                              
                            </select>
                          </div>
                        </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">State</label>
                          <select name="state" class="form-control state" id="state">
                            @if ($user_information->state==0)
                            <option value="0">Select</option>    
                            @else
                            <option value="{{$state->id}}">{{ $state->name }}</option>      
                            @endif
                            
                          
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">City</label>
                            <select name="city" class="form-control" id="city">
                              @if ($user_information->city==0)
                              <option value="0">Select</option>
                              @else
                              <option value="{{$city->id}}">{{ $city->name }}</option>
                              @endif
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label class="bmd-label-floating">Pincode</label>
                              <input type="text" name="pincode" class="form-control" value="{{ $user_information->pincode }}">
                          </div>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                              <label class="bmd-label-floating">Gender</label><br>                              
                              <input type="radio" name="gender" value="Male" @if( $user_information->gender=="Male") checked @endif> Male &nbsp &nbsp &nbsp
                              <input type="radio" name="gender" value="Female" @if( $user_information->gender=="Female") checked @endif> Female &nbsp &nbsp &nbsp
                              <input type="radio" name="gender" value="Trans-Gender" @if( $user_information->gender=="Trans-Gender") checked @endif> Trans-Gender &nbsp &nbsp &nbsp
                              <input type="radio" name="gender" value="Others" @if( $user_information->gender=="Others") checked @endif> Others &nbsp &nbsp &nbsp
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>About Me</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Maximum 240 chartecters.</label>
                          <textarea class="form-control" name="about_me" rows="5">{{$user_information->about_me}}</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                  
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $(document).on('change','.country',function(){
            var value = $("#country").val();
            //alert(value);
            $.ajax({
              type:'get',
              url:'/get_state',
              data:{'country_id':value},
              success:function(data){

                //console.log('success');
                //console.log(data);

                $("#state").html(data.state);
                $("#city").html(data.city);
              },
              error:function(){

              }
            });
          });
        });
      </script>



      <script type="text/javascript">
        $(document).ready(function(){
          $(document).on('change','.state',function(){
            var value = $("#state").val();
            //alert(value);
            $.ajax({
              type:'get',
              url:'/get_city',
              data:{'state_id':value},
              success:function(data){

                //console.log('success');
                //console.log(data);

                $("#city").html(data.city);
              },
              error:function(){

              }
            });
          });
        });
      </script>

          @endsection
    <!-- footer -->  
          