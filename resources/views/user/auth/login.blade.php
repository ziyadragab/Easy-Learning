<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset("adminAssets/images/favicon.ico") }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset("adminAssets/css/bootstrap.min.css") }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset("adminAssets/css/icons.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset("adminAssets/css/app.min.css") }}" id="app-style" rel="stylesheet" type="text/css" />
    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="{{ asset ("adminAssets/images/logo-dark.png") }}" height="30" class="logo-dark mx-auto" alt="">
                                    <img src="{{ asset("adminAssets/images/logo-light.png") }}" height="30" class="logo-light mx-auto" alt="">
                                </a>
                            </div>
                        </div>

                        <h4 class="text-muted text-center font-size-18"><b>Login</b></h4>

                        <div class="p-3">
                            <form class="form-horizontal mt-3" action="{{ route('login') }}" method="POST">
                              @csrf
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" placeholder="Email" value="{{ old('email') }}">
                                        @error('email')
                                           <span class="text-danger">{{ $message }}</span>
                                          @enderror
                                    </div>
                                </div>


                                <div class="form-group mb-3 row">
                                    <div class="col-12">

                                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Login</button>
                                    </div>
                                </div>

                                <div class="form-group mt-2 mb-0 row">
                                    <div class="col-12 mt-3 text-center">
                                        <a href="{{ route('registerForm') }}" class="text-muted">Create New Account </a>
                                    </div>
                                </div>
                            </form>
                            <!-- end form -->
                        </div>
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->



        <!-- JAVASCRIPT -->
        <script src="{{ asset("adminAssets/libs/jquery/jquery.min.js") }}"></script>
        <script src="{{ asset("adminAssets/libs/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
        <script src="{{ asset("adminAssets/libs/metismenu/metisMenu.min.js") }}"></script>
        <script src="{{ asset("adminAssets/libs/simplebar/simplebar.min.js") }}"></script>
        <script src="{{asset("adminAssets/libs/node-waves/waves.min.js")}}"></script>

        <script src="{{ asset("adminAssets/js/app.js") }}"></script>
        @include('sweetalert::alert')

    </body>
</html>
