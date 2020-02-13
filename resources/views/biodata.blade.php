@extends('app')
  @section('main-content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Bio-Data</h4>
                <p class="card-category">Complete your Bio-Data</p>
              </div>
              <div class="card-body">
                <form action="{{ route('biodata_store') }}" method="POST">
                  @csrf
                  <input type="text" name="customer_id" value="{{ Auth::user()->customer_id }}" hidden>
                  <div class="row">
                    <div class="col-md-12">
                      <h2 class="alert alert-info text-center">Contact Info</h2>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first_name" value="{{ $user_biodata->first_name }}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middle_name" value="{{ $user_biodata->middle_name }}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{ $user_biodata->last_name }}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" name="dob" value="{{ $user_biodata->dob }}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="first">Gender</label><BR>
                        <label><input type="radio" name="gender" value="Male" @if( $user_biodata->gender=="Male") checked @endif> Male </label>
                        <label><input type="radio" name="gender" value="Female" @if( $user_biodata->gender=="Female") checked @endif> Female </label>
                        <label><input type="radio" name="gender" value="Others" @if( $user_biodata->gender=="Others") checked @endif> Others </label> 
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" cols="1" rows="1" >{{ $user_biodata->address}}</textarea>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Contact No 1</label>
                        <input type="text" class="form-control" name="contact_no_1" value="{{ $user_biodata->contact_no_1 }}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Contact No 2</label>
                        <input type="text" class="form-control" name="contact_no_2" value="{{ $user_biodata->contact_no_2 }}">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="text" class="form-control" name="email_address" value="{{ $user_biodata->email_address }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <h2 class="alert alert-info text-center">Personal Info</h2>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-8">
                        <div class="form-group">
                          <label>Weight</label>
                          <input type="number" name="weight" class="form-control" value="{{ $user_biodata->weight }}">
                        </div>
                      </div>
                      <div class="col-xl-1 col-lg-1 col-md-1 col-sm-4">
                        <div class="form-group">
                          <select class="form-control" name="weight_unit">
                            <option value="">select</option>
                            <option value="KG" @if( $user_biodata->weight_unit=="KG") selected @endif>KG</option>
                            <option value="Pound"@if( $user_biodata->weight_unit=="Pound") selected @endif>Pound</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-8 col-xs-8">
                        <div class="form-group">
                          <label>Height</label>
                          <select class="form-control" name="height">
                            <option value="">select</option>
                            @for ($i = 1; $i <= 200; $i++)
                              <option value="{{ $i }}" @if( $user_biodata->height==$i) selected @endif>{{ $i }}</option>
                            @endfor
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4">
                        <div class="form-group">
                          <select class="form-control" name="height_unit">
                            <option value="">select</option>
                            <option value="CM" @if( $user_biodata->height_unit=="CM") selected @endif>CM</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Hair Length</label>
                          <select class="form-control" name="hair_length">
                            <option value="">select</option>
                            <option value="Long" @if( $user_biodata->hair_length=="Long") selected @endif>Long</option>
                            <option value="Short" @if( $user_biodata->hair_length=="Short") selected @endif>Short</option>
                            <option value="Medium" @if( $user_biodata->hair_length=="Medium") selected @endif>Medium</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Compelxion</label>
                          <select class="form-control" name="complexion">
                            <option value="">select</option>
                            <option value="Fair">Fair</option>
                            <option value="Dark">Dark</option>
                            <option value="Medium">Medium</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-8 col-xs-8">
                        <div class="form-group">
                          <label>Breast</label>
                          <select class="form-control" name="breast_size">
                            <option value="select">select</option>
                            @for ($i = 26; $i <= 44; $i++)
                              <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4">
                        <div class="form-group">
                          <select class="form-control" name="breast_unit">
                            <option value="">select</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-8 col-xs-8">
                        <div class="form-group">
                          <label>Waist</label>
                          <select class="form-control" name="waist">
                            <option value="">select</option>
                            @for ($i = 24; $i <= 40; $i++)
                              <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4">
                        <div class="form-group">
                          <select class="form-control" name="waist_unit">
                            <option value="">select</option>
                            <option value="CM">CM</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-8 col-xs-8">
                        <div class="form-group">
                          <label>Hips</label>
                          <select class="form-control" name="hips">
                            <option value="">select</option>
                            @for ($i = 24; $i <= 40; $i++)
                              <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4">
                        <div class="form-group">
                          <select class="form-control" name="hips_unit">
                            <option value="">select</option>
                            <option value="CM">CM</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Body Pattern</label>
                          <select class="form-control" name="body_pattern">
                            <option value="">select</option>
                            <option value="Slim">Slim</option>
                            <option value="Medium">Medium</option>
                            <option value="Heavy">Heavy</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Tatto</label>
                          <select class="form-control" name="tatto">
                            <option value="">select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Marital Status</label>
                          <select class="form-control" name="marital_status">
                            <option value="">select</option>
                            <option value="Married">Married</option>
                            <option value="Single">Single</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Separated">Separated</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Skin Tone</label>
                          <select class="form-control" name="skin_tone">
                                <option value="">Select</option>
                                <option value="Albino">Albino</option>
                                <option value="Black">Black</option>
                                <option value="Dark">Dark</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Dark Brown">Dark Brown</option>
                                <option value="Fair">Fair</option>
                                <option value="Light">Light</option>
                                <option value="Light Brown">Light Brown</option>
                                <option value="Medium">Medium</option>
                                <option value="Medium Brown">Medium Brown</option>
                                <option value="Olive">Olive</option>
                                <option value="Ruddy">Ruddy</option>
                                <option value="Sallow">Sallow</option>
                                <option value="Other">Other</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-8 col-xs-8">
                        <div class="form-group">
                          <label>Shoe Size</label>
                          <select class="form-control" name="shoe_size">
                            <option value="">select</option>
                            @for ($i = 18; $i <= 34; $i++)
                              <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-1 col-md-1 col-sm-4 col-xs-4">
                        <div class="form-group">
                          <select class="form-control" name="shoe_size_unit">
                            <option value="">select</option>
                            <option value="CM">CM</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Eye Color</label>
                          <select class="form-control" name="eye_color">
                              <option value="Select">Select</option>
                              <option value="Black">Black</option>
                              <option value="Blue">Blue</option>
                              <option value="Brown">Brown</option>
                              <option value="Gray">Gray</option>
                              <option value="Green">Green</option>
                              <option value="Hazel">Hazel</option>
                              <option value="Maroon">Maroon</option>
                              <option value="Pink">Pink</option>
                              <option value="Multicolored">Multicolored</option>
                              <option value="Other">Other</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Hair Color</label>
                          <select class="form-control" name="hair_color">
                              <option value="Select">Select</option>
                              <option value="Brown">Brown</option>
                              <option value="Black">Black</option>
                              <option value="White">White</option>
                              <option value="Sandy">Sandy</option>
                              <option value="Gray">Gray</option>
                              <option value="Red">Red</option>
                              <option value="Blond/Strawberry">Blond/Strawberry</option>
                              <option value="Blue">Blue</option>
                              <option value="Green">Green</option>
                              <option value="Orange">Orange</option>
                              <option value="Pink">Pink</option>
                              <option value="Purple">Purple</option>
                              <option value="Other">Other</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3"></div>
                      <div class="col-md-3">
                        <label>Dress comfortable</label><br>
                          <label><input type="radio" name="dress_comfortable" value="Traditional"> Traditional </label>
                          <label><input type="radio" name="dress_comfortable" value="Western">  Western </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Bridal Shoot</label><br>
                          <label><input type="radio" name="bridal_shoot" value="Yes"> Yes </label>
                          <label><input type="radio" name="bridal_shoot" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Western Shoot</label><br>
                          <label><input type="radio" name="western_shoot" value="Yes"> Yes </label>
                          <label><input type="radio" name="western_shoot" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Body Paint  Shoot</label><br>
                          <label><input type="radio" name="body_paint_shoot" value="Yes"> Yes </label>
                          <label><input type="radio" name="body_paint_shoot" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Designer Shoot</label><br>
                          <label><input type="radio" name="designer_shoot" value="Yes"> Yes </label>
                          <label><input type="radio" name="designer_shoot" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Ethnic Wear</label><br>
                          <label><input type="radio" name="ethnic_wear" value="Yes"> Yes </label>
                          <label><input type="radio" name="ethnic_wear" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Western Wear</label><br>
                          <label><input type="radio" name="western_wear" value="Yes"> Yes </label>
                          <label><input type="radio" name="western_wear" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Bikini</label><br>
                          <label><input type="radio" name="bikini" value="Yes"> Yes </label>
                          <label><input type="radio" name="bikini" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Lingeries</label><br>
                          <label><input type="radio" name="lingeries" value="Yes"> Yes </label>
                          <label><input type="radio" name="lingeries" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Swim Suits</label><br>
                          <label><input type="radio" name="swim_suits" value="Yes"> Yes </label>
                          <label><input type="radio" name="swim_suits" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Calender Shoot</label><br>
                          <label><input type="radio" name="calender_shoot" value="Yes"> Yes </label>
                          <label><input type="radio" name="calender_shoot" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Video Shoot </label><br>
                          <label><input type="radio" name="video_shoot" value="Yes"> Yes </label>
                          <label><input type="radio" name="video_shoot" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Nude</label><br>
                          <label><input type="radio" name="nude" value="Yes"> Yes </label>
                          <label><input type="radio" name="nude" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Semi Nude</label><br>
                          <label><input type="radio" name="semi_nude" value="Yes"> Yes </label>
                          <label><input type="radio" name="semi_nude" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Bridal</label><br>
                          <label><input type="radio" name="bridal" value="Yes"> Yes </label>
                          <label><input type="radio" name="bridal" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Sharee </label><br>
                          <label><input type="radio" name="sharee" value="Yes"> Yes </label>
                          <label><input type="radio" name="sharee" value="No">  No </label> 
                      </div>
                      {{-- <div class="col-md-3">
                        <label>Compromise </label><br>
                          <label><input type="radio" name="compromise " value="Yes"> Yes </label>
                          <label><input type="radio" name="compromise " value="No">  No </label> 
                      </div> --}}
                      <div class="col-md-3">
                        <label>Smoking</label><br>
                          <label><input type="radio" name="smoking" value="Yes"> Yes </label>
                          <label><input type="radio" name="smoking" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Drinking</label><br>
                          <label><input type="radio" name="drinking" value="Yes"> Yes </label>
                          <label><input type="radio" name="drinking" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Acting</label><br>
                          <label><input type="radio" name="acting" value="Yes"> Yes </label>
                          <label><input type="radio" name="acting" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                        <label>Music Album </label><br>
                          <label><input type="radio" name="music_album" value="Yes"> Yes </label>
                          <label><input type="radio" name="music_album" value="No">  No </label> 
                      </div>
                      <div class="col-md-3">
                          <label>Short Film</label><br>
                          <label><input type="radio" name="short_film" value="Yes"> Yes </label>
                          <label><input type="radio" name="short_film" value="No">  No </label> 
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <h2 class="alert alert-info text-center">Education Info</h2>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Secondary</label>
                        <input type="text" class="form-control" name="secondary_education">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Higher Secondary</label>
                        <input type="text" class="form-control" name="higher_secondary_education">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Graduation</label>
                        <input type="text" class="form-control" name="graduation">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Post Graduation</label>
                        <input type="text" class="form-control" name="post_graduation">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Others</label>
                        <input type="text" class="form-control" name="education_others">
                      </div>
                    </div>
                  </div> 
                  <div class="row">
                    <div class="col-md-12">
                      <h2 class="alert alert-info text-center">Professional Info</h2>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Profession Type</label>
                        <select name="present_profession" class="form-control">
                          <option value="Select">Select</option>
                          <option value="Salaried">Salaried</option>
                          <option value="Self Employeed">Self Employeed</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Working Experience</label>
                        <input type="text" class="form-control" name="working_experience" id="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Designation</label>
                        <input type="text" class="form-control" name="designation" id="">
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                  <div class="clearfix"></div> 
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  @endsection