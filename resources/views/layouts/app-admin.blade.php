<!DOCTYPE html>
<html lang="en" class="default-style layout-fixed layout-navbar-fixed">
   <head>
      <title>{{ config('app.name', 'Laravel') }}</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
      <meta name="description" content="{{ config('app.name', 'Laravel') }}" />
      <meta name="keywords" content="{{ config('app.name', 'Laravel') }}">
      <meta name="author" content="rinku101990@gmail.com" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link name="favicon" type="image/x-icon" href="{{url('assets/img/favicon.jpg')}}" rel="shortcut icon" />  
      <!-- Google fonts -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
      <!-- Icon fonts -->
      <link rel="stylesheet" href="{{url('admin/assets/fonts/fontawesome.css')}}">
      <link rel="stylesheet" href="{{url('admin/assets/fonts/ionicons.css')}}">
      <link rel="stylesheet" href="{{url('admin/assets/fonts/linearicons.css')}}">
      <link rel="stylesheet" href="{{url('admin/assets/fonts/open-iconic.css')}}">
      <link rel="stylesheet" href="{{url('admin/assets/fonts/pe-icon-7-stroke.css')}}">
      <link rel="stylesheet" href="{{url('admin/assets/fonts/feather.css')}}">
      <!-- Core stylesheets -->
      <link rel="stylesheet" href="{{url('admin/assets/css/bootstrap-material.css')}}">
      <link rel="stylesheet" href="{{url('admin/assets/css/shreerang-material.css')}}">
      <link rel="stylesheet" href="{{url('admin/assets/css/uikit.css')}}">
      <!-- Libs -->
      <link rel="stylesheet" href="{{url('admin/assets/libs/perfect-scrollbar/perfect-scrollbar.css')}}">
      <link rel="stylesheet" href="{{url('admin/assets/libs/datatables/datatables.css')}}">
      <link rel="stylesheet" href="{{url('admin/assets/libs/bootstrap-markdown/bootstrap-markdown.css')}}">
      <link rel="stylesheet" href="{{url('admin/assets/libs/quill/editor.css')}}">
      <style>
         .error {color: red;}
         .modal-body{
         /* border: 4px solid #62d493;*/   
         padding: 0.5rem;
         }
         .bootbox-confirm .modal-body{
         padding: 1.5625rem;
         }
         .alert-success {
         border:none;
         border-left: 5px solid #178344;
         border-radius: 5px;
         }
         .sidenav-divider {
    width: 100% !important;
    border: 0;
    border-top: 1px solid;
    margin: 0 0px !important;
}
.sidenav.logo-dark .app-brand {
    border-right: 1px solid;
  
}
.card-header  .btn-success {
    color: #111 !important;
    background: #fff;
}
      </style>
   </head>
   <body>
      <!-- [ Preloader ] Start -->
      <div class="page-loader">
         <div class="bg-primary"></div>
      </div>
      <!-- [ Preloader ] End -->
      <!-- [ Layout wrapper ] Start -->
      <div class="layout-wrapper layout-2">
         <div class="layout-inner">
            <!-- [ Layout sidenav ] Start -->
            <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark logo-dark" >
               <div class="app-brand demo">
                  <span class="app-brand-logo demo">
                  <img src="{{url('admin/assets/logo.png')}}" alt="Brand Logo" class="img-fluid" style="background:#fff;padding: 5px;width: 110px;">
                  </span>
                  <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
                  <i class="ion ion-md-menu align-middle"></i>
                  </a>
               </div>
               <div class="sidenav-divider mt-0"></div>
               <!-- Links -->
               <ul class="sidenav-inner py-1">
                
                  <!-- Dashboards -->
                 
                  <li class="sidenav-item @if(\Request::route()->getName() == 'admin.dashboard') active @endif">
                     <a href="{{route('admin.dashboard')}}" class="sidenav-link">
                        <i class="sidenav-icon feather icon-home"></i>
                        <div>Dashboard</div>
                     </a>
                  </li>
                
                  <li class="sidenav-item">
                     <a href="{{url('admin/category')}}" class="sidenav-link">
                        <i class="sidenav-icon feather icon-layers"></i>
                        <div>Categories</div>
                     </a>
                  </li>
               
                  <li class="sidenav-item">
                     <a href="{{url('admin/products')}}" class="sidenav-link">
                        <i class="sidenav-icon feather icon-codepen"></i>
                        <div>Products</div>
                     </a>
                  </li>
               </ul>
            </div>
            <!-- [ Layout sidenav ] End -->
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
               <!-- [ Layout navbar ( Header ) ] Start -->
               <nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-dark container-p-x" id="layout-navbar" >                <a href="{{url('admin/dashboard')}}" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
                  <span class="app-brand-logo demo">
                  <img src="{{url('assets/img/logo-white.png')}}" alt="{{ config('app.name', 'Laravel') }}" class="img-fluid" style="width: 100px;">
                  </span>
                  </a>
                  <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
                     <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:">
                     <i class="ion ion-md-menu text-large align-middle"></i>
                     </a>
                  </div>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="navbar-collapse collapse" id="layout-navbar-collapse">
                  <center><h4 style="padding-top: 16px;color: #ffff;text-align: center;">Upsquare Technologies</h4></center>
                     <!-- Divider -->
                     <hr class="d-lg-none w-100 my-2">
                     <div class="navbar-nav align-items-lg-center ml-auto">
                      
                        <div class="demo-navbar-notifications nav-item dropdown mr-lg-3">
                           <div class="dropdown-menu dropdown-menu-right">
                              <div class="bg-primary text-center text-white font-weight-bold p-3">
                                 1 New Notifications
                              </div>
                           </div>
                        </div>
                        <!-- Divider -->
                        <div class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">|</div>
                        <div class="demo-navbar-user nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                           <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                               @if(auth()->guard('admin')->user()->profileImage)
                               <img src="{{url('media/profile_img/'.auth()->guard('admin')->user()->profileImage)}}" style="height:30px;" alt class="d-block ui-w-30 rounded-circle">

                               @else
                           <img src="{{url('admin/assets/img/avatars/1.png')}}" alt class="d-block ui-w-30 rounded-circle">
                           @endif
                           <span class="px-1 mr-lg-2 ml-2 ml-lg-0">{{auth()->guard('admin')->user()->name}}</span>
                           </span>
                           </a>
                           <div class="dropdown-menu dropdown-menu-right">
                              <a href="{{ url('admin/logout') }}" class="dropdown-item">
                              <i class="feather icon-power text-danger"></i> &nbsp; Log Out</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </nav>
               <!-- [ Layout navbar ( Header ) ] End -->
               @yield('content')
            </div>
            <!-- [ Layout container ] End -->
         </div>
         <!-- Overlay -->
         <div class="layout-overlay layout-sidenav-toggle"></div>
      </div>
      <!-- Core scripts -->
      <script src="{{url('admin/assets/js/pace.js')}}"></script>
      <script src="{{url('admin/assets/js/jquery-3.2.1.min.js')}}"></script>
      <script src="{{url('admin/assets/libs/popper/popper.js')}}"></script>
      <script src="{{url('admin/assets/js/bootstrap.js')}}"></script>
      <script src="{{url('admin/assets/js/sidenav.js')}}"></script>
      <script src="{{url('admin/assets/js/layout-helpers.js')}}"></script>
      <script src="{{url('admin/assets/js/material-ripple.js')}}"></script>
      <!-- Libs -->
      <script src="{{url('admin/assets/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
      <script src="{{url('admin/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
      <script src="{{url('admin/assets/libs/markdown/markdown.js')}}"></script>
      <script src="{{url('admin/assets/libs/bootstrap-markdown/bootstrap-markdown.js')}}"></script>
      <!-- Demo -->
      <script src="{{url('admin/assets/js/demo.js')}}"></script>
      <script src="{{url('admin/assets/libs/datatables/datatables.js')}}"></script>
      <script src="{{url('admin/assets/js/pages/tables_datatables.js')}}"></script>
      <script src="{{url('admin/assets/js/bootbox.min.js') }}"></script>  
      <script src="{{url('admin/assets/js/pages/forms_editors.js') }}"></script>  
      @yield('script')
      <script>
         function deletePopupMessageAjax(title, message, record_id, url){
                 bootbox.confirm({
                     size: "small",
                     title: title,
                     message: "<i class=\"fa fa-exclamation-triangle\" style=\"color:red\"></i> " + message,
                     buttons: {
                         confirm: {
                             label: 'Confirm',
                             className: 'btn-danger',
                         },
                         cancel: {
                             label: 'No',
                         }
                     },
                     callback: function (result) {
                         if (result) {
                             $.ajax({
                                 url: url,
                                 type: 'delete',
                                 data: {id: record_id,_token:"{{ csrf_token() }}"},
                                 dataType: 'json',
                                 beforeSend: function () {
                                     $(".overlay").show();
                                 },
                                 success: function (res) {
                                   
                                     if (res.status == true)
                                     {
                                         $(".overlay").hide();
                                         showAlert(res.message,'reload');
                                         
                                     } else {
                                         $(".overlay").hide();
                                         showAlert(res.messagem,'reload');
                                     }
                                 }
                             });
                         }
                     }
                 });
             }
          
         
             function showAlert(msg,reload) {
               
                 var dialog = bootbox.dialog({
                 message: ' <div class="alert alert-success alert-dismissible fade show" style="margin-bottom: 0;"><button type="button" class="close" data-dismiss="alert">×</button>  '+msg+'      </div>  ',
                 closeButton: false,
                 size: 'small',
                 });
                 if(reload == 'reload'){
                     setTimeout(function() {
                     location.reload();
                     }, 1500);
                 }else{
         
                     setTimeout(function() {
                         dialog.modal('hide');
                     }, 1500);
                     
                 }
                
             }
         
         
             setTimeout(function () {
                 $(".alert").fadeOut();
             }, 3000);
      </script>
      @if(session()->has('success'))
      <script>
         showAlert("{{ session()->get('success') }}",'notReload');
      </script>
      @endif
      @if(session()->has('error'))
      <script>
  showAlert1("{{ session()->get('error') }}",'notReload');
function showAlert1(msg,reload) {
               
               var dialog = bootbox.dialog({
               message: ' <div class="alert alert-danger alert-dismissible fade show" style="margin-bottom: 0;"><button type="button" class="close" data-dismiss="alert">×</button>  '+msg+'      </div>  ',
               closeButton: false,
               size: 'small',
               });
               if(reload == 'reload'){
                   setTimeout(function() {
                   location.reload();
                   }, 1500);
               }else{
       
                   setTimeout(function() {
                       dialog.modal('hide');
                   }, 1500);
                   
               }
              
           }
       
       
      </script>
      @endif
      <script>
         function slug_url(get,id){
            var  data=$.trim(get);
            var string = data.replace(/[^A-Z0-9]/ig, '-')
                            .replace(/\s+/g, '-') // collapse whitespace and replace by -
                            .replace(/-+/g, '-'); // collapse dashes;
            var finalvalue=string.toLowerCase();
            document.getElementById(id).value=finalvalue;
        }
        </script>
   </body>
</html>