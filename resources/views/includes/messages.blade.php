@if (count($errors)>0)
    <p class="alert alert-danger" id="disappear">
        @foreach ($errors->all() as $error)
    <strong><i class="fa fa-warning text-white"></i></strong>  {{ $error }}<br>
        @endforeach
    </p>    
@endif

@if (session()->has('message'))
    <p class="alert alert-success" id="disappear">{{ session('message') }}</p>
@endif