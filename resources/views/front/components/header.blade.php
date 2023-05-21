<!-- Navbar STart -->
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <div>
            <a class="logo" href="{{route('index')}}">
                <img src="{{asset($setting['logo']??"")}}" class="l-dark"  alt="">
                <img src="{{asset($setting['logo_footer']??"")}}" class="l-light"  alt="">
            </a>
        </div>
        <ul class="buy-button list-inline mb-0">
            @if(Auth::check())
                <a href="{{route('dashboard')}}" id="dashboard" class="btn btn-primary m-1"> Dashboard</a>
            @else
                <a href="{{route('login')}}"  id="login_button"  class="btn login-popup-show btn-primary m-1"> Login </a>
            @endif
        </ul><!--end login button-->
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-light float-end">
                <li><a href="{{route('index')}}" class="sub-menu-item">Home</a></li>
                <li><a href="{{route('search')}}" class="sub-menu-item">Jobs</a></li>
                <li><a href="{{route('about')}}" class="sub-menu-item">About</a></li>
                <li><a href="{{route('contact')}}" class="sub-menu-item">Contact</a></li>
                <li class="has-submenu parent-parent-menu-item ">
                    <a href="javascript:void(0)" class="sub-menu-item">Explore</a>
                    <span class="menu-arrow"></span>
                    <ul class="submenu mt-0 p-2" >
                        <li><a href="{{route('event')}}" class="sub-menu-item py-2">Event</a></li>
                        <li><a href="{{route('blog')}}" class="sub-menu-item  py-2">Blog</a></li>
                        <li><a href="{{route('companies')}}" class="sub-menu-item  py-2">Companies</a></li>



                    </ul>


                </li>

            </ul><!--end navigation menu-->
            @if(Auth::check())

            @else
                <div class="buy-menu-btn d-none">
                    <a href="javascript:void(0)" class="btn btn-primary m-1"> Login</a>
                </div>
        @endif
        <!--end login button-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->
