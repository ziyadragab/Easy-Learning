
<!doctype html>
<html lang="en">

<head>
  @include('admin.layouts.header')
    <meta charset="utf-8" />
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />


</head>

<title>
    {{trans('admin/auth/login.page')}}
</title>
<body data-topbar="dark">

    <div class="auth-container d-flex mt-5">
        <div class="container mx-auto align-self-center">
            <div class="row">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            @if(session()->has('invalid'))
                                <div class="alert alert-danger">
                                    {{ session()->get('invalid') }}
                                </div>
                            @endif
                            <form method="POST"  action="{{ route('admin.login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">

                                        <h2>
                                        Login
                                        </h2>
                                        <p>
                                            Admin  Login
                                        </p>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">

                                                Email
                                            </label>
                                            <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label">
                                               Password
                                            </label>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <div class="mb-4">
                                            <button type="submit" class="btn btn-secondary w-100">
                                               Sign In
                                            </button>
                                        </div>
                                    </div>
                        </div>
                            </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>


</body>

</html>
