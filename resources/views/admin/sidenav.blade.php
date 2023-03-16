<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

        </div>
        <div class="info">
            <a href="" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->




            <li class="nav-header">Customer</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-link"></i>
                    <p>
                        Booking
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.customeradvancebooking') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Advance Booking</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{ route('admin.customerbooking') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Current Booking</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.customeroldbooking') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Old Booking</p>
                        </a>
                    </li>

                </ul>
            </li>


            <li class="nav-header">Barbers</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Barbar scheduling
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.barberuser') }}" class="nav-link">
                            <i class="nav-icon fa-solid fa-circle-check"></i>
                            <p>
                                Confirm

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.barbarindex') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Set Schedul</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.barbarschedulshow') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Show Schedul</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.bookingreschedul') }}" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Re-Schedul

                            </p>
                        </a>
                    </li>

                </ul>
            </li>













            <li class="nav-item">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
                    <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                    <p>
                        Logout
                    </p>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
