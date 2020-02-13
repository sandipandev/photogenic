@extends('app')
 @section('main-content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Awards</h4>
                  <p class="card-category">You can add upto 6 Awards!!</p>
                </div>
                <div class="card-body">
                  <form class="md-form" action="{{ route('award_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                            <input type="file" class="alert alert-success" style="width: 100%;cursor:pointer;" name="award">
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Award Title</label>
                          <input type="text" class="form-control" name="award_title">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Award Description</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Maximum 240 chartecters.</label>
                            <textarea class="form-control" rows="5" name="award_description"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-9">
                          @include('includes.messages')
                      </div>
                      <div class="col-md-3">
                        <button type="submit" class="btn btn-primary pull-right">Add Award</button>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">My Awards</h4>
                  <p class="card-category">No of photos {{count($awards)}} /{{ $plan->no_of_picture_in_award }}</p>
                </div>
                <div class="card-body gallery" style="min-height: 358px;max-height: 358px;overflow-y: scroll;">
                  <div class="row">
                    @foreach ($awards as $award)
                        <div class="col-md-6 award-image">
                          @if ($award->award_image_link)
                            <img src="{{ asset('storage/'.$award->award_image_link) }}" style="width: 100%"> 
                            <div class="top-right-award">
                              @include('_award_delete_form')
                            </div>
                          @else
                            <img src="{{ asset('assets/img/default_award.png') }}">
                            <div class="top-right-award">
                              @include('_award_delete_form')
                            </div> 
                          @endif
                          
                          <h6 class="text-muted">{{ $award->award_title }}</h6>
                          <p class="text-muted">{{ $award->award_description }}</p>
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