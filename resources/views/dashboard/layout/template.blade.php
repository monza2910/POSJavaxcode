@include('dashboard.layout.partials.header')
@include('dashboard.layout.partials.sidebar')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            @yield('content')
        </div> 
        <!-- content -->

        <footer class="footer">
            2016 © Adminto.
        </footer>

    </div>
    <!-- End content-page -->


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

@include('dashboard.layout.partials.footer')

            