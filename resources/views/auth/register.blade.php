@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header registration-header">
                    <h1>{{ __('Please Signup') }}</h1>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8" style="border-right:1px solid #eee;">
                                <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group row">
                                                <label for="as" class="col-md-4 col-form-label text-md-right">{{ __('Signup As') }}</label>
                    
                                                <div class="col-md-6">
                                                    <select name="as" id="as" class="form-control @error('as') is-invalid @enderror" required>
                                                            
                                                                <option value="0">select</option>
                                                            @foreach($client_entities as $client_entity)
                                                                <option value="{{ $client_entity->id  }}" {{(old('as') == $client_entity->id?'selected':'')}}>{{ $client_entity->name }}</option>
                                                                
                                                            @endforeach
                                                    </select>
                                                    @error('as')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label for="phno" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="phno" type="number" class="form-control @error('phno') is-invalid @enderror" name="phno" value="{{ old('phno') }}" required autocomplete="phno">
                    
                                                    @error('phno')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-grad">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                        </div>
                        <div class="col-md-4 social-signup">
                        <a href="{{ route('login/google') }}" id="google-button" style="display:none;" class="btn btn-grad google"><i class="fa fa-google"></i>Signup with Google</a><br><br>   
                                {{-- href="{{ route('login/google') }}" --}}
                        <a href='#' onclick="check_as();" class="btn btn-grad google"><i class="fa fa-google"></i>Signup with Google</a><br><br>
                                <p style="text-align:center;color:#ddd;font-weight:bold">Or</p>
                                <button class="btn btn-grad facebook"><i class="fa fa-facebook"></i>Signup with Facebook</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<form action="{{ route('login/google')}}" method="POST">
    @csrf
    <input type="text" id="as-post" name="as" style="display:none">
    <button type="submit" id="as-btn" class="btn btn-grad" style="display:none">
            {{ __('Register') }}
    </button>
    
</form>
<script>
    function check_as(){
        
        var sel = document.getElementById('as').value;
        if(sel!=0){
            document.getElementById("as-post").value = sel;
            document.getElementById('as-btn').click();
            
        }
        else{
            alert('Please select any role you want to signup as!!');
        }
    }
</script>
