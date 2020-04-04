


<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.element.head')
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            @include('admin.element.sidebar')
           @include('admin.element.top_navigation')
            <!-- page content -->
            <div class="right_col" role="main">
              @yield('content');
                <!--end-box-pagination-->
            </div>
            <!-- /page content -->
            <!-- footer -->
            @include('admin.element.footer')
            <!-- /footer -->
        </div>
    </div>
    @include('admin.element.script')
</body>


</html>