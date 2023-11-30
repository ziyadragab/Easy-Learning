<!doctype html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">


<head>

    <meta charset="UTF-8" />

    <!-- Include the appropriate meta tag for video MIME type -->
    <meta http-equiv="Content-Type" content="video/mp4">
    <title>Admin & Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />


    @include('admin.layouts.header')

</head>

<body data-topbar="dark">
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src={{ asset("adminAssets/images/logo-sm.png") }} alt="logo-sm" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src={{ asset("adminAssets/images/logo-dark.png") }} alt="logo-dark" height="20">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src={{ asset("adminAssets/images/logo-sm.png") }} alt="logo-sm-light" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src={{ asset("adminAssets/images/logo-light.png") }} alt="logo-light" height="20">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="ri-menu-2-line align-middle"></i>
                    </button>
                    <!-- App Search-->

                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="ri-search-line"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="mb-3 m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="ri-search-line"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img class="" src={{ asset("adminAssets/images/flags/us.jpg") }} alt="Language" height="16">
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">



                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)


                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item notify-item" onclick="setLocaleAndSubmit('{{ $localeCode }}');">
                                <span class="align-middle">{{ $properties['native'] }}</span>
                            </a>
                        @endforeach



                        </div>
                    </div>



                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="ri-fullscreen-line"></i>
                        </button>
                    </div>


                    <div class="dropdown d-inline-block user-dropdown">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{ asset('Images/users/'.auth()->user()->photo) }}">
                            <span class="d-none d-xl-inline-block ms-1">{{ auth()->user()->first_name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ri-user-line align-middle me-1"></i>
                                Profile</a>
                            <a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle me-1"></i> My
                                Wallet</a>
                            <a class="dropdown-item d-block" href="{{ route('admin.setting.index') }}"><span
                                    class="badge bg-success float-end mt-1">11</span><i
                                    class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                            <a class="dropdown-item" href=""><i class="ri-lock-unlock-line align-middle me-1"></i> Lock
                                screen</a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                            <button class="dropdown-item text-danger" href=""><i
                                    class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</button>
                                </form>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        @include('admin.layouts/left-sidebar')

        @yield('content')


    </div>
    @include('admin.layouts/right-sidebar')


    <div class="rightbar-overlay"></div>

    @include('admin.layouts/footer')


</body>

</html>
