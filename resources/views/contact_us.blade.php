@extends('app')
 @section('main-content')
      
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                        <h4 class="card-title">How may we help you??</h4>
                        <p class="card-category">Please lodge your complain here!!</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('contact_us_process') }}" method="POST">
                            @csrf
                            <input type="text" name="user_id" value="{{ $user_information->user_id }}" hidden>
                            <input type="text" name="email_id" value="{{ $user_information->email_id }}" hidden>
                            <input type="text" name="user_name" value="{{ $user_information->first_name." ".$user_information->middle_name." ".$user_information->last_name }}" hidden>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email ID</label>
                                        <input type="text" class="form-control" value="{{ $user_information->email_id }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        <input type="text" class="form-control" value="{{ $user_information->first_name." ".$user_information->middle_name." ".$user_information->last_name }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Subject</label>
                                        <input type="text" class="form-control" name="subject" value="{{ old('subject') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Your Message</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" rows="5">{{ old('message') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Send</button>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                @include('includes.messages')
                            </div>
                        </form>
                    </div>
                    
                </div>
                </div>
            </div>
        </div>
    </div>


    @endsection
    <!-- footer -->  