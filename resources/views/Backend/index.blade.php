@include('Backend.partials.header')
<body class="fixed-navbar">
<div class="page-wrapper">
    <!-- START Navbar HEADER-->
@include('Backend.partials.navbar')
<!-- END HEADER-->
    <!-- START SIDEBAR-->
@include('Backend.partials.sidebar')
<!-- END SIDEBAR-->
    <div class="content-wrapper">

    {{--  main-contact-section--}}
    @yield('contact')
    {{--   end--}}

    <!-- START PAGE CONTENT-->
    @include('Backend.partials.pagContent')
    <!-- END PAGE CONTENT-->
        {{-- footer--}}
        @include('Backend.partials.footer')
    </div>
</div>
<!-- BEGIN THEME CONFIG PANEL-->
{{--    setting-and-colour-bar-cut--}}
@include('Backend.partials.setting_bar')
<!-- END THEME CONFIG PANEL-->
<!-- BEGIN PAGA BACKDROPS-->

<!-- END PAGA BACKDROPS-->
<!-- CORE PLUGINS-->
{{--   script--}}
@include('Backend.partials.script')
</body>

</html>
