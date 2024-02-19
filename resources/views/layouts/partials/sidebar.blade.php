<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('/')}}images/logo-img.jpg" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h6>St.Lawrence School of jewels</h6>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('dashboard')}}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{route('profile.edit')}}">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">User Profile</div>
            </a>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-lock"></i>
                </div>
                <div class="menu-title">Authentication</div>
            </a>
            <ul>
                <li> <a href="{{route('register')}}"><i class="bx bx-right-arrow-alt"></i>User SignUp</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">UI Elements</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Institute</div>
            </a>
            <ul>
                <li> <a href="{{ route('manageInstitute') }}"><i class="bx bx-right-arrow-alt"></i>Manage Institute</a></li>
                <li> <a href="{{route('manageClasses')}}"><i class="bx bx-right-arrow-alt"></i>Manage Classes</a></li>
                <li> <a href="{{route('manageFacility')}}"><i class="bx bx-right-arrow-alt"></i>Manage Facility</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Members</div>
            </a>
            <ul>
                <li> <a href="{{ route('boardMembers') }}"><i class="bx bx-right-arrow-alt"></i>Board Members</a></li>
                {{-- <li> <a href="{{ route('teacherIndex') }}"><i class="bx bx-right-arrow-alt"></i>Teacher</a></li> --}}
                <li> <a href="{{ route('messageIndex') }}"><i class="bx bx-right-arrow-alt"></i>Testimonial</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Menus</div>
            </a>
            <ul>
                <li> <a href="{{route('manageMenu')}}"><i class="bx bx-right-arrow-alt"></i>Manage Menu</a></li>
                <li> <a href="{{route('manageSubMenu')}}"><i class="bx bx-right-arrow-alt"></i>Manage SubMenu</a></li>
                <li> <a href="{{route('menuPageIndex')}}"><i class="bx bx-right-arrow-alt"></i>Menu Page</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Slider</div>
            </a>
            <ul>
                <li> <a href="{{route('manageSlider')}}"><i class="bx bx-right-arrow-alt"></i>Manage Slider</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home'></i>
                </div>
                <div class="menu-title">Notices</div>
            </a>
            <ul>
                <li> <a href="{{route('manageNotice')}}"><i class="bx bx-right-arrow-alt"></i>Manage Notice</a></li>

                {{-- <li> <a href="{{route('manageEvents')}}"><i class="bx bx-right-arrow-alt"></i>Manage Events</a></li>
                <li> <a href="{{route('manageInotice')}}"><i class="bx bx-right-arrow-alt"></i>Important Notice</a></li> --}}
            </ul>
        </li>

    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
