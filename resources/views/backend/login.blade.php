<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/backend/images/favicon.png')}}">
    <link href="{{asset('public/backend/css/style.css')}}" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    @if(\Session::has('error'))
                                        <h4 class="text-center mb-4 text-danger">{{\Session::get('error')}}</h4>
                                    @endif
                                    <div class="form-validation">
                                    <form class="form-valide" action="{{route('admin.login')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Username
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Enter a username..">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-password">Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="password" class="form-control" id="val-password" name="val-password" placeholder="password">
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <div class="col-lg-6 ml-auto">
                                                        <button type="submit" class="btn btn-primary">Login</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                   <!--  <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="{{url('admin/register')}}">Sign up</a></p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('public/backend/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('public/backend/js/quixnav-init.js')}}"></script>
    <script src="{{asset('public/backend/js/custom.min.js')}}"></script>
    



    <!-- Jquery Validation -->
    <script src="{{asset('public/backend/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <!-- Form validate init -->
    <script src="{{asset('public/backend/js/plugins-init/jquery.validate-init.js')}}"></script>

</body>

</html>