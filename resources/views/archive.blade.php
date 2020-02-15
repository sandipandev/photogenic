@extends('app')
 @section('main-content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add New Photos</h4>
                  <p class="card-category">You can add upto 10 photos!!</p>
                </div>
                <div class="card-body">
                  <form class="md-form" action="/store_archive_picture" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                            <input type="file" class="alert alert-success" name="archive_picture" style="width: 100%;cursor:pointer;">
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Image Title</label>
                          <input type="text" class="form-control" name="archive_title">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Image Description</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Maximum 240 chartecters.</label>
                            <textarea class="form-control" rows="5" name="archive_description"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-9">
                          @include('includes.messages')
                      </div>
                      <div class="col-md-3">
                        <button type="submit" class="btn btn-primary pull-right">Add Image</button>
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
                  <h4 class="card-title">My Gallery</h4>
                  <p class="card-category">No of photos {{count($archives)}} /{{ $plan->no_of_picture_in_personal_gallery }}</p>
                </div>
                <div class="card-body gallery" style="min-height: 358px;max-height: 358px;overflow-y: scroll;">
                  <div class="row">
                    @foreach ($archives as $archive)
                        <div class="col-md-6 archive-image">
                          @if ($archive->archive_image_link)
                            <img src="{{ asset('storage/'.$archive->archive_image_link) }}" style="width: 100%"> 
                            <div class="top-right-archive">
                              @include('_archive_delete_form')
                            </div>
                          @else
                            <img src="{{ asset('assets/img/default_archive.png') }}">
                            <div class="top-right-archive">
                              @include('_archive_delete_form')
                            </div> 
                          @endif
                          
                          <h6 class="text-muted">{{ $archive->archive_title }}</h6>
                          <p class="text-muted">{{ $archive->archive_description }}</p>
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