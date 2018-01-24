
@include('adgoldfish185.inc.header')

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap" >
        
        @include('adgoldfish185.inc.topbar')
        
        @include('adgoldfish185.inc.leftbar')

        <!--PAGE CONTENT -->
        @yield('content')
        <!--END PAGE CONTENT -->
        @if(!empty($active) && $active=='index')
            @include('adgoldfish185.inc.rightbar')
        @endif
    </div>

    <!--END MAIN WRAPPER -->

    @include('adgoldfish185.inc.footer')


</body>

    <!-- END BODY -->
</html>
