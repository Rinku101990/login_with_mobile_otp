<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('admin/assets/fonts/fontawesome.css') }}" rel="stylesheet">
      <style>
         .login-form {
         z-index: 2;
         /* width: 340px; */
         width: 100%;
         /* margin: 50px auto; */
         font-size: 15px;
         }
         .login-form form {
         border-top: 4px solid #111;
         border-radius: 10px;
         margin-bottom: 15px;
         background: #fff;
         box-shadow:0px 8px 14px rgb(0 0 0 / 45%);
         padding: 30px;
         }
         .login-form h2 {
         margin: 0 0 15px;
         }
         .form-control, .btn {
         min-height: 38px;
         border-radius: 2px;
         }
         .btn {        
         font-size: 15px;
         font-weight: bold;
         }
         section{
         /*background-image: url('{{ asset('admin/assets/img/jan-sendereks.jpg') }}');*/
         /* background-image: linear-gradient(to right,#000000 , #8c1b1d,#c9c8c8 , #961c1d); */
         background: #e9ecef;
         background-size: cover;
         background-position: 50%;
         display: block;
         width: 100%; 
         min-height: 100vh;
         display: -webkit-box;
         display: -webkit-flex;
         display: -moz-box;
         display: -ms-flexbox;
         flex-wrap: wrap;
         justify-content: center;
         align-items: center;
         padding: 15px;
         z-index: 1;
         }
         section:after {
         position: absolute;
         z-index: 1;
         width: 100%;
         height: 100%;
         display: block;
         left: 0;
         top: 0;
         content: "";
         /* background-color: rgba(0,0,0,.7); */
         }
         @media only screen and (max-width: 720px) {
         .hidden {
         display:none;
         }
         .col-md-4{
         padding-left: 15px !important;
         }
         }
      </style>
   </head>
   <body>
      <section>
         <div class="container" style="z-index:2;">
            <div class="row"style=" margin-top:0px;display: flex;
               align-items: center;
               justify-content: center; " >
               <div class="col-md-4" style="padding-left: 0px;">
                  <div class="login-form">
                     <form action="{{ route('adminLoginPost') }}" method="post">
                        <center>
                           <h2 style="color:#111"><b>Login Panel</b></h2>
                        </center>
                        {!! csrf_field() !!}
                        <hr>
                        <hr style="margin-top: -20px;">
                        <br>
                        @if(\Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           {{ \Session::get('success') }}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">×</span>
                           </button>
                        </div>
                        @endif
                        {{ \Session::forget('success') }}
                        @if(\Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                           {{ \Session::get('error') }}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">×</span>
                           </button>
                        </div>
                        @endif       
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i class="fas fa-user nc-single-02"></i>
                              </span>
                           </div>
                           <input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
                           @if ($errors->has('email'))
                           <span class="help-block font-red-mint">
                           <strong>{{ $errors->first('email') }}</strong>
                           </span>
                           @endif
                        </div>
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                              <span class="input-group-text">
                              <i class="fas fa-key nc-single-02"></i>
                              </span>
                           </div>
                           <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                           @if ($errors->has('password'))
                           <span class="help-block font-red-mint">
                           <strong>{{ $errors->first('password') }}</strong>
                           </span>
                           @endif
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <br>&nbsp;
                     </form>
                     <br>
                     <p class="copyright" align="center">Copyright © <?php echo date('Y');?> <a href="{{url('/')}}">UpSquare</a>. All Rights Reserved.</p>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </body>
</html>