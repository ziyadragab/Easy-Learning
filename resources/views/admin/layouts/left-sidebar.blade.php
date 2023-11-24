  <!-- ========== Left Sidebar Start ========== -->
  <div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ asset('Images/users/'.auth()->user()->photo) }}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ auth()->user()->first_name.' '. auth()->user()->last_name }}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.index') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>{{ __('messages.dashboard') }}</span>
                    </a>
                </li>

                <li>
                    <a href="calendar.html" class="waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Calendar</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.showUsers') }}" class="waves-effect">
                        <i class="ri-user-line"></i>
                        <span>Users</span>
                    </a>
                </li>


                <!-- Slides Section -->
                <li>
                    <a class="waves-effect" data-bs-toggle="collapse" href="#slides" role="button" aria-expanded="false">
                        <i class="ri-slideshow-2-line"></i>
                        <span>Slides</span>
                    </a>
                    <div class="collapse" id="slides">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.slide.create') }}">Create New Slide</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.slide.index') }}">Display Slides</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="waves-effect" data-bs-toggle="collapse" href="#abouts" role="button" aria-expanded="false">
                        <i class="fas fa-info-circle"></i> <!-- Replace with your 'About' icon class -->
                        <span>About</span>
                    </a>
                    <div class="collapse" id="abouts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.about.create') }}">Create New About</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.about.index') }}">Display Abouts</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>

        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
