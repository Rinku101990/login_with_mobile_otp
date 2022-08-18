@extends('layouts.app-admin')
@section('content')
<!-- [ Layout content ] Start -->
<div class="layout-content">
   <!-- [ content ] Start -->
   <div class="container-fluid flex-grow-1 container-p-y">
      <h4 class="font-weight-bold py-3 mb-0">Dashboard</h4>
      <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="#!">Admin</a></li>
            <li class="breadcrumb-item active"><a href="#!">Dashboard</a></li>
         </ol>
      </div>
      <div class="row">
         <!-- customar project  start -->
         <div class="col-xl-12 col-md-12">
            <div class="card">
                <center><h4 style="margin-top: 15px !important;">Welcome To Upsquare Technologies</h4></center>
            </div>
         </div>

      </div>
   </div>
</div>
<!-- [ content ] End -->
<!-- [ Layout footer ] Start -->
<nav class="layout-footer footer footer-light">
   <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
      <div class="pt-3">
         <span class="float-md-right d-none d-lg-block">&copy; {{ config('app.name', 'Laravel') }} &amp; Made with <i class="fas fa-heart text-danger mr-2"></i></span>
      </div>
   </div>
</nav>
<!-- [ Layout footer ] End -->
</div>
<!-- [ Layout content ] Start -->
@endsection