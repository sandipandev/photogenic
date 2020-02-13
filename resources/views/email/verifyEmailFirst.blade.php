@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enter Your OTP</div>

                <div class="card-body">
                    <form action="/Verify" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="otp">Enter Your OTP Here</label>
                            <input type="text" name="OTP" id="otp" class="form-control" required>
                            
                        </div>
                        <input type="submit" value="Submit" class="btn btn-success">
                        @if (Session::get('message'))
                        <div class="alert alert-danger">
                            <?php echo Session::get('message');?>
                        </div>
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection