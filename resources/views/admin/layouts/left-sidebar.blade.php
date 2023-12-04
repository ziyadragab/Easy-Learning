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
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.index') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>{{ __('messages.dashboard') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('endUser.index') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>User Interface</span>
                    </a>
                </li>
                <li>
                    @php
                    $unreadMessagesCount = App\Models\Contact::where('is_read', false)->count()??null;
                    @endphp
                    <a href="{{ route('admin.contact.index') }}" class="waves-effect">
                        <i class="ri-message-line"></i>
                        <span class="badge rounded-pill bg-success float-end">{{ $unreadMessagesCount > 0 ?
                            $unreadMessagesCount : 0 }}</span>
                        <span>{{ __('messages.messages') }}</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('admin.showUsers') }}" class="waves-effect">
                        <i class="ri-user-line"></i>
                        <span>{{ __('messages.users') }}</span>
                    </a>
                </li>


                <!-- Slides Section -->
                <li>
                    <a class="waves-effect" data-bs-toggle="collapse" href="#slides" role="button"
                        aria-expanded="false">
                        <i class="ri-slideshow-2-line"></i>
                        <span>{{ __('messages.slides') }}</span>
                    </a>
                    <div class="collapse" id="slides">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.slide.create') }}">Create New Slide</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.slide.index') }}">{{ __('messages.display').' '. __('messages.slides') }} </a>
                            </li>
                        </ul>
                    </div>
                <li>
                    <a class="waves-effect" data-bs-toggle="collapse" href="#images" role="button"
                        aria-expanded="false">
                        <i class="fas fa-image"></i> <!-- FontAwesome class for image icon -->
                        <span>{{ __('messages.images') }}</span>
                    </a>
                    <div class="collapse" id="images">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.image.create') }}">Create New Image</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.image.index') }}">{{ __('messages.display').' '. __('messages.images') }} </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a class="waves-effect" data-bs-toggle="collapse" href="#portfolios" role="button"
                        aria-expanded="false">
                        <i class="fas fa-briefcase"></i>
                        <span>{{ __('messages.portFolio') }}</span>
                    </a>
                    <div class="collapse" id="portfolios">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.portfolio.create') }}">Create New Portfolio</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.portfolio.index') }}">{{ __('messages.display').' '. __('messages.portFolio') }} </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a class="waves-effect" data-bs-toggle="collapse" href="#category" role="button"
                        aria-expanded="false">
                        <i class="fas fa-folder"></i>
                        <span>{{ __('messages.category') }}</span>
                    </a>
                    <div class="collapse" id="category">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.category.create') }}">Create New Category</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.category.index') }}">{{ __('messages.display').' '. __('messages.category') }} </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>

                <li>
                    <a class="waves-effect" data-bs-toggle="collapse" href="#blog" role="button" aria-expanded="false">
                        <i class="fas fa-blog"></i>
                        <span>{{ __('messages.blog') }}</span>
                    </a>
                    <div class="collapse" id="blog">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.blog.create') }}">Create New Blog</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.blog.index') }}">{{ __('messages.display').' '. __('messages.blog') }} </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a class="waves-effect" data-bs-toggle="collapse" href="#service" role="button" aria-expanded="false">
                        <i class="fas fa-cogs"></i>
                        <span>{{ __('messages.service') }}</span>
                    </a>
                    <div class="collapse" id="service">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.service.create') }}"> {{ __('messages.create').' '.__('messages.new').' '. __('messages.service') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.service.index') }}">{{ __('messages.display').' '. __('messages.service') }} </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="waves-effect" data-bs-toggle="collapse" href="#abouts" role="button"
                        aria-expanded="false">
                        <i class="fas fa-info-circle"></i> <!-- Replace with your 'About' icon class -->
                        <span>{{ __('messages.about') }}</span>
                    </a>
                    <div class="collapse" id="abouts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.about.create') }}">Create New About</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.about.index') }}">{{ __('messages.display').' '. __('messages.about') }} </a>
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
