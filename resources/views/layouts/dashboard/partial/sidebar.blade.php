<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Photo <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="@route('home')">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    
    @isset(auth()->user()->role->permission['permission']['service']['list'])
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i> 
            <span>Services</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @isset(auth()->user()->role->permission['permission']['service']['list'])
                <a class="collapse-item" href="@route('services.index')">List Of Service</a>
                @endisset
                @isset(auth()->user()->role->permission['permission']['service']['add'])
                <a class="collapse-item" href="@route('services.create')">Create Of Service</a>
                @endisset
            </div>
        </div> 
    </li>
    @endisset


    @isset(auth()->user()->role->permission['permission']['gig']['list'])
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-cog"></i>
            <span>Gig</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @isset(auth()->user()->role->permission['permission']['gig']['list'])
                <a class="collapse-item" href="@route('gigs.index')">List Of Gig</a>
                @endisset
            </div>
        </div> 
    </li>
    @endisset


    @isset(auth()->user()->role->permission['permission']['gallery']['list'])
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour"
            aria-expanded="true" aria-controls="collapsefour">
            <i class="fas fa-fw fa-cog"></i>
            <span>Gallery </span>
        </a>
        @isset(auth()->user()->role->permission['permission']['gallery']['list'])
        <div id="collapsefour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="@route('gallery.index')">List Of Gallery</a>
            </div>
        </div>
        @endisset
        @isset(auth()->user()->role->permission['permission']['gallery']['add'])
        <div id="collapsefour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="@route('gallery.create')">Create Of Gallery</a>
            </div>
        </div>
        @endisset 
    </li>
    @endisset

    @isset(auth()->user()->role->permission['permission']['request']['list'])
    <li class="nav-item">
        <a class="nav-link" href="@route('hire.list')">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Hire Photographer Request</span></a>
    </li>
    @endisset
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Settings
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @isset(auth()->user()->role->permission['permission']['permission']['list'])
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Permission</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="@route('permission.index')">Permission List</a>
                <a class="collapse-item" href="@route('permission.create')">Permission Create</a>
            </div>
        </div>
    </li>
    @endisset

    
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="@route('profiles.index')">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Profiles</span></a>
    </li>

       <!-- Nav Item - Charts -->
       @isset(auth()->user()->role->permission['permission']['contact']['list'])
       <li class="nav-item">
        <a class="nav-link" href="@route('contact')">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Contact's</span></a>
        </li>
        @endisset


            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Reset Password</span></a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{ url('dashboard/logout') }}">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Loguts</span></a>
                    </li>
</ul>