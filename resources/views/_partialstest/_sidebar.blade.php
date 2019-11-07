<!-- Sidebar  -->
<nav id="sidebar" style="background:#343a40;">
    <div class="sidebar-header p-0 m-0">
        <img src="{{asset('images/logo_main.png')}}" alt="Logo" height="120px" width="120px" class="side_profile" />
        <strong><img src="{{asset('images/logo_raw.png')}}" alt="Logo" height="50px" width="50px"
                class="mb-3" /></strong>
        <div class="row pl-5">
            <h5 class="float-left m-0 text-info side_profile text-center"> <small> Welcome{{Auth::user()->name}} </small></h5>
        </div>

    </div>
    <ul class="list-unstyled components">
        <li class="dr">
            <a href="#sidebar_dashboard" data-toggle="collapse" aria-expanded="false" data-parent="#sidebar"
                class="dropdown-toggle">
                <i class="fas fa-home"></i>
                <b>Dashboard</b>
            </a>
            <ul class="drm collapse list-unstyled m-0" id="sidebar_dashboard">
                <li>
                    <a href="{{route('dashboard')}}">Home</a>
                </li>

            </ul>
        </li>

        {{----------------------------------------------- start of JOB SEEKER ----------------------------------------------}}
        @if(auth()->user()->role === 1)
        <li class="dr">
            <a href="#sidebar_class" data-toggle="collapse" aria-expanded="false" data-parent="#sidebar"
                class="dropdown-toggle">
                <i class="fas fa-user"></i>
                <b>Profile</b>
            </a>
            <ul class="drm collapse list-unstyled m-0" id="sidebar_class">
                <li>
                    <a href="{{route('seeker_profile',auth()->user()->name)}}">My Profile</a>
                </li>

            </ul>
        </li>

        <li class="dr">
            <a href="#sidebar_exam" data-toggle="collapse" aria-expanded="false" data-parent="#sidebar"
                class="dropdown-toggle">
                <i class="fas fa-marker"></i>
                <b>Jobs</b>
            </a>
            <ul class="drm collapse list-unstyled m-0" id="sidebar_exam">
                <li>
                    <a href="{{route('all_jobs')}}">All Jobs</a>
                </li>
                <li>
                    <a href="{{route('my_jobs')}}">My Jobs</a>
                </li>

                <li>
                    <a href="{{route('my_bookmarks')}}">My Bookmarks</a>
                </li>
            </ul>
        </li>

        @endif
        {{----------------------------------------------- end of JOB SEEKER ----------------------------------------------}}

        {{----------------------------------------------- start of JOB PROVIDER ----------------------------------------------}}
        @if(auth()->user()->role === 2)
        <li class="dr">
            <a href="#sidebar_routine" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-calendar-week"></i>
                <b>Profile</b>
            </a>
            <ul class="drm collapse list-unstyled m-0" id="sidebar_routine">
                <li>
                    <a href="{{route('provider_company',auth()->user()->name)}}">My Profile</a>
                </li>

            </ul>
        </li>

        <li class="dr">
            <a href="#sidebar_fee" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-briefcase"></i>
                <b>Jobs</b>
            </a>
            <ul class="drm collapse list-unstyled m-0" id="sidebar_fee">
                <li>
                    <a href="{{route('jobs.index')}}">Posted Jobs</a>
                </li>
            </ul>
        </li>
        @endif

        {{----------------------------------------------- end of JOB PROVIDER ----------------------------------------------}}
        {{----------------------------------------------- start of ADMIN ----------------------------------------------}}
        @if(auth()->user()->admin)
        <li class="dr">
            <a href="#sidebar_accounting" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-users"></i>
                <b>Users</b>
            </a>
            <ul class="drm collapse list-unstyled m-0" id="sidebar_accounting">
                <li>
                    <a href="{{route('admin.all_users')}}">Manage Users</a>
                </li>

            </ul>
        </li>
        <li class="dr">
            <a href="#sidebar_inventory" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-dolly"></i>
                <b>Blogs</b>
            </a>
            <ul class="drm collapse list-unstyled m-0" id="sidebar_inventory">
                <li>
                    <a href="#">All Blogs</a>
                </li>
                <li>
                    <a href="#">Add Inventory</a>
                </li>
            </ul>
        </li>

        <li class="dr">
            <a href="#sidebar_notices" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-sticky-note"></i>
                <b>Notices</b>
            </a>
            <ul class="drm collapse list-unstyled m-0" id="sidebar_notices">
                <li>
                    <a href="#">All Notices</a>
                </li>
                <li>
                    <a href="#">Add Notices</a>
                </li>
            </ul>
        </li>

        <li class="dr">
                <a href="#sidebar_users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-users"></i>
                    <b>TO B FILLED</b>
                </a>
                <ul class="drm collapse list-unstyled m-0" id="sidebar_users">
                    <li>
                        <a href="#">All Notices</a>
                    </li>
                    <li>
                        <a href="#">Add Users</a>
                    </li>
                </ul>
            </li>

        <li class="dr">
            <a href="#sidebar_library" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-book-reader"></i>
                <b>TO B FILLED</b>
            </a>
            <ul class="drm collapse list-unstyled m-0" id="sidebar_library">
                <li>
                    <a href="#">All Library</a>
                </li>
                <li>
                    <a href="#">Add Library</a>
                </li>
            </ul>
        </li>
        <li class="dr">
            <a href="#sidebar_setting" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-cogs"></i>
                <b>TO B FILLED</b>
            </a>
            <ul class="drm collapse list-unstyled m-0" id="sidebar_setting">
                <li>
                    <a href="#">All Settings</a>
                </li>
                <li>
                    <a href="#">General Settings</a>
                </li>
                <li>
                    <a href="#">Profile Settings</a>
                </li>
                <li>
                    <a href="#">Privacy Settings</a>
                </li>
            </ul>
        </li>
        <li class="dr">
            <a href="#sidebar_appreance" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-pallet"></i>
                <b>TO B FILLED</b>
            </a>
            <ul class="drm collapse list-unstyled m-0" id="sidebar_appreance">
                <li>
                    <a href="#">Theme</a>
                </li>
            </ul>
        </li>
        <li class="dr">
            <a href="#sidebar_feedback" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-comments"></i>
                <b>TO B FILLED</b>
            </a>
            <ul class="drm collapse list-unstyled m-0" id="sidebar_feedback">
                <li>
                    <a href="#">All Feedback</a>
                </li>
                <li>
                    <a href="#">Add Feedback</a>
                </li>
            </ul>
        </li>
        <li class="dr">
            <a href="/index.html">
                <i class="fas fa-briefcase"></i>
                <b>TO B FILLED</b>
            </a>
        </li>
        <li class="dr">
            <a href="#">
                <i class="fas fa-question"></i>
                <b>TO B FILLED</b>
            </a>
        </li>
        <li class="dr">
            <a href="#">
                <i class="fas fa-paper-plane"></i>
                <b>TO B FILLED</b>
            </a>
        </li>
        @endif  {{----------------------------------------------- end of ADMIN ----------------------------------------------}}
    </ul>

    <div class="sidebar-footer">
        <ul class="p-0 m-0">
            <li class="" data-toggle="tooltip" data-html="true" data-placement="right" title="Settings">
                <a href="#">
                    <i class="fas fa-cog"></i>
                </a>
            </li>
            <li id="full" class="" data-toggle="tooltip" data-html="true" title="Screen Size"
                onclick="$('body').fullScreenHelper('toggle');">
                <a>
                    <i id="i_full" class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="" data-toggle="tooltip" data-html="true" title="Help">
                <a>
                    <i class="fas fa-question-circle"></i>
                </a>
            </li>
            <li class="" data-toggle="tooltip" data-html="true" title="Log-out">
                <a href="#">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </div>

</nav>
