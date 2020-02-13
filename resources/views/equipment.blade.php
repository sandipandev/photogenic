@extends('app')
@section('main-content')     
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Equipment</h4>
                            <p class="card-category">Complete your Equipment profile</p>
                        </div>
                            <div class="card-body">
                                <form action="/update_equipment_profile" method="POST">
                                @csrf 
                                @if (!empty($equipment))
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label class="bmd-label-floating">Body</label>
                                        <input type="text" class="form-control" name="body" value=" {{$equipment->body}} ">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                            <div class="form-group">
                                            <label class="bmd-label-floating">Lens</label>
                                                <input type="text" class="form-control" name="lens" value=" {{$equipment->lens}} ">
                                            </div>
                                        </div>
                                        
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Gimble</label>
                                                <input type="text" class="form-control" name="gimble" value="{{$equipment->gimble}}">
                                            </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Drone</label>
                                            <input type="text" class="form-control" name="drone" value="{{$equipment->drone}}">
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label class="bmd-label-floating">Body</label>
                                        <input type="text" class="form-control" name="body">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label class="bmd-label-floating">Lens</label>
                                            <input type="text" class="form-control" name="lens">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Gimble</label>
                                                <input type="text" class="form-control" name="gimble">
                                            </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Drone</label>
                                            <input type="text" class="form-control" name="drone">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                                <div class="clearfix"></div>
                            </form>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <!-- footer -->