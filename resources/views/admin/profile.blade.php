@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Update My Profile</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">My Profile</li>
                <li class="breadcrumb-item active">Add My Profile</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Update My Profile</h6>
            <div class="card-body">

                <form class="form-horizontal form-label-left" action="{{ url('admin/profile_update') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Name  <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{auth()->guard('admin')->user()->name }}">
                            <div class="clearfix"></div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Email Id</label>
                            <input type="email" class="form-control" placeholder="Enter Email Id" name="email" value="{{auth()->guard('admin')->user()->email }}" disabled>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                  
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-label">Contact No.</label>
                                   
                                <input type="number" class="form-control" placeholder="Enter Contact No." name="mobile" value="{{auth()->guard('admin')->user()->mobile }}" >
                                <div class="clearfix"></div>
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                            <label class="form-label">Upload Profile Img <span class="error"></span></label>
                            <input type="file" class="form-control" placeholder="Upload Profile Img" name="profileImage" accept="image/x-png,image/jpeg">
                            <div class="clearfix"></div> 
                            <input type="hidden" name="profileImage" value="{{ $user=auth()->guard('admin')->user()->profileImage}}" />

                            <div class="col-md-6" > 
                                <div class="form-group">
                                    <img src="{{url('media/profile_img/'.auth()->guard('admin')->user()->profileImage)}}" height="120px;" width="140px;">
                                </div>
                                </div> 

                            @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                   
                    </div>
                  
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- [ content ] End -->
<!-- [ content ] End -->
@endsection