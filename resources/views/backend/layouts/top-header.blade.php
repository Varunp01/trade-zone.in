<div class="nav-header">
    <a href="#" class="brand-logo">
        <img class="" src="{{ URL::asset('public/assets/img/icon-1.png') }}" height="50" width="70">
        <!-- <img class="logo-compact" src="{{asset('public/backend/images/logo-text.png')}}" alt="">
        <img class="brand-title" src="{{asset('public/backend/images/logo-text.png')}}" alt=""> -->
    </a>
    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<!--**********************************
    Header start
***********************************-->
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="search_bar dropdown">
                        <!-- <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                            <i class="mdi mdi-magnify"></i>
                        </span> -->
                        <div class="dropdown-menu p-0 m-0">
                            <form method="post" action="{{ URL('/search') }}">
                              @csrf
                                <!-- <input class="form-control" type="search" name="search" placeholder="Search" aria-label="Search"> -->
                            </form>
                        </div>
                    </div>
                </div>

                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown notification_dropdown">
                        <!-- <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <i class="mdi mdi-bell"></i>
                            <div class="pulse-css"></div>
                        </a> -->
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- <ul class="list-unstyled">
                                <li class="media dropdown-item">
                                    <span class="success"><i class="ti-user"></i></span>
                                    <div class="media-body">
                                        <a href="#">
                                            <p><strong>Martin</strong> has added a <strong>customer</strong> Successfully
                                            </p>
                                        </a>
                                    </div>
                                    <span class="notify-time">3:20 am</span>
                                </li>
                            </ul> -->
                            <!-- <a class="all-notification" href="#">
                                See all notifications
                                <i class="ti-arrow-right"></i>
                            </a> -->
                        </div>
                    </li>
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <i class="mdi mdi-account"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- <a href="./app-profile.php" class="dropdown-item">
                                <i class="icon-user"></i>
                                <span class="ml-2">Profile </span>
                            </a> -->
                            @if(session()->has('getuid'))
                            <a href="{{route('logout')}}" class="dropdown-item">
                                <i class="icon-key"></i>
                                <span class="ml-2">Logout </span>
                            </a>
                            @else
                            <a href="{{route('user.logout')}}" class="dropdown-item">
                                <i class="icon-key"></i>
                                <span class="ml-2">Logout </span>
                            </a>
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
