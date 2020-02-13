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
                          <input type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Image Description</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Maximum 240 chartecters.</label>
                            <textarea class="form-control" rows="5"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Add Image</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">My Gallery</h4>
                  <p class="card-category">No of photos 5/10</p>
                </div>
                <div class="card-body gallery" style="min-height: 358px;max-height: 358px;overflow-y: scroll;">
                  <div class="row">
                    <div class="col-md-6">
                      <img src="assets/img/user_gallery/1.jpg" style="width: 100%">
                      <h6>Image Title</h6>
                      <p class="text-muted">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>
                    <div class="col-md-6">
                      <img src="assets/img/user_gallery/2.jpg" style="width: 100%">
                      <h6>Image Title</h6>
                      <p class="text-muted">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>
                    <div class="col-md-6">
                      <img src="assets/img/user_gallery/3.jpg" style="width: 100%">
                      <h6>Image Title</h6>
                      <p class="text-muted">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>
                    <div class="col-md-6">
                      <img src="assets/img/user_gallery/4.jpg" style="width: 100%">
                      <h6>Image Title</h6>
                      <p class="text-muted">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>
                    <div class="col-md-6">
                      <img src="assets/img/user_gallery/5.jpg" style="width: 100%">
                      <h6>Image Title</h6>
                      <p class="text-muted">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection