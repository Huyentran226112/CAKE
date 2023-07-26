@include('admin.include.header')
<body>
    <!-- Left Panel -->
    @include('admin.include.sidebar')
    <!-- /#left-panel -->
    <!-- Left Panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('admin.include.nav')
        <!-- /header -->
        <!-- Content-->
        @yield('content')
        <!-- .content -->
        <div class="clearfix"></div>    
        @include('admin.include.footer')
    </div>
    <!-- /#right-panel -->
    <!-- Right Panel -->
    <!-- Scripts -->
</body>
</html>
