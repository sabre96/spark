<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Spark')</title>
    <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="/assets/images/logo.png">
    <meta name="apple-mobile-web-app-title" content="Flatkit">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="/assets/images/logo.png">

    <!-- CSS -->
    <link href="/css/sweetalert.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    <!-- style -->
    <link rel="stylesheet" href="/assets/animate.css/animate.min.css" type="text/css"/>
    <link rel="stylesheet" href="/assets/glyphicons/glyphicons.css" type="text/css"/>
    <link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="/assets/material-design-icons/material-design-icons.css" type="text/css"/>

    <link rel="stylesheet" href="/assets/bootstrap/dist/css/bootstrap.min.css" type="text/css"/>
    <!-- build:css /assets/styles/app.min.css -->
    <link rel="stylesheet" href="/assets/styles/app.css" type="text/css"/>
    <!-- endbuild -->
    <link rel="stylesheet" href="/assets/styles/font.css" type="text/css"/>

    <!-- Scripts -->
@yield('scripts', '')

<!-- Global Spark Object -->
    <script>
        window.Spark = <?php echo json_encode(array_merge(
                Spark::scriptVariables(), []
        )); ?>
    </script>
</head>
<body>
<div class="app" id="spark-app">
    <!-- ############ LAYOUT START-->
    <!-- aside -->
    <div id="aside" class="app-aside modal fade folded md nav-expand" ng-class="{'folded': app.setting.folded}">
        <div class="left navside light-green-200 dk" layout="column">
            <div class="navbar navbar-md no-radius">
                <div ui-include="'../views/blocks/navbar.brand.html'"></div>
            </div>
            <div flex class="hide-scroll">
                <nav class="scroll">
                    <div ui-include="'../views/blocks/nav.html'"></div>
                </nav>
            </div>
            <div flex-no-shrink>
                <div ui-include="'../views/blocks/aside.bottom.0.html'"></div>
            </div>
        </div>
    </div>
    <!-- / aside -->

    <!-- content -->
    <div id="content" class="app-content box-shadow-z0" role="main">
        <div class="app-header white box-shadow navbar-md">
            <div ui-include="'../views/blocks/header.html'"></div>
        </div>

        <!-- Main Content -->
            <div class="row">
                <div class="custom-padding">
                    <div class="span5">
                        @yield('content')
                    </div>
            </div>
        </div>

    <!-- Application Level Modals -->
        @if (Auth::check())
            @include('spark::modals.notifications')
            @include('spark::modals.support')
            @include('spark::modals.session-expired')
        @endif

        <div class="app-footer">
            <div ui-include="'../views/blocks/footer.html'"></div>
        </div>
        <div ui-view class="app-body" id="view"></div>
    </div>
    <!-- / -->
    <!-- / -->
    <!-- ############ LAYOUT END-->
<!-- ############ PAGE START-->

<div id="spark-app">
<!-- JavaScript -->
    <script src="/js/app.js"></script>
    <script src="/js/sweetalert.min.js"></script>
</div>

<!-- ############ PAGE END-->
<!-- build:js scripts/app.html.js -->
<!-- Bootstrap -->
<script src="/libs/jquery/tether/dist/js/tether.min.js"></script>
<script src="/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>

<!-- jQuery -->
<script src="/libs/jquery/jquery/dist/jquery.js"></script>
<!-- core -->
<script src="/libs/jquery/underscore/underscore-min.js"></script>
<script src="/libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
<script src="/libs/jquery/PACE/pace.min.js"></script>

<script src="/js/scripts/config.lazyload.js"></script>

<script src="/js/scripts/palette.js"></script>
<script src="/js/scripts/ui-load.js"></script>
<script src="/js/scripts/ui-jp.js"></script>
<script src="/js/scripts/ui-include.js"></script>
<script src="/js/scripts/ui-device.js"></script>
<script src="/js/scripts/ui-form.js"></script>
<script src="/js/scripts/ui-nav.js"></script>
<script src="/js/scripts/ui-screenfull.js"></script>
<script src="/js/scripts/ui-scroll-to.js"></script>
<script src="/js/scripts/ui-toggle-class.js"></script>


<script src="/js/scripts/app.js"></script>

<!-- ajax -->
<script src="/libs/jquery/jquery-pjax/jquery.pjax.js"></script>
<script src="/js/scripts/ajax.js"></script>
<!-- endbuild -->
</body>
</html>