<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.head')
    <body>
        <div class="container-scroller">
            @include('admin.layouts.topnav')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
                @include('admin.layouts.sidenav')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('admin.layouts.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
            @include('admin.layouts.script')
        <!-- End custom js for this page-->
    </body>
</html>
