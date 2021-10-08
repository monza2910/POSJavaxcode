<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!-- User -->
        <div class="user-box">
            <div class="user-img">
                <img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
            </div>
            <h5><a href="#">Mat Helme</a> </h5>
            <ul class="list-inline">
                <li>
                    <a href="#" >
                        <i class="zmdi zmdi-settings"></i>
                    </a>
                </li>

                <li>
                    <a href="#" class="text-custom">
                        <i class="zmdi zmdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End User -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation</li>

                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                </li>

                <li>
                    <a href="{{route('category.index')}}" class="waves-effect"><i class="zmdi zmdi-format-underlined"></i> <span> Category </span> </a>
                </li>

                <li>
                    <a href="{{route('subcategory.index')}}" class="waves-effect"><i class="zmdi zmdi-format-underlined"></i> <span> Sub Category </span> </a>
                </li>
                
                <li>
                    <a href="{{route('menu.index')}}" class="waves-effect"><i class="zmdi zmdi-format-underlined"></i> <span> Menu </span> </a>
                </li>
               
                <li>
                    <a href="{{route('outlet.index')}}" class="waves-effect"><i class="zmdi zmdi-format-underlined"></i> <span> Outlet </span> </a>
                </li>
               
                <li>
                    <a href="{{route('outletmenu.index')}}" class="waves-effect"><i class="zmdi zmdi-format-underlined"></i> <span> Menu in Outlet </span> </a>
                </li>


            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
<!-- Left Sidebar End -->